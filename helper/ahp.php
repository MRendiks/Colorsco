<?php

class ahp {

    private $konek;
    private $idCookie;
    public $simpanNormalisasi=array();
    public function setconfig($konek,$idCookie){
        $this->konek=$konek;
        $this->idCookie=$idCookie;
    }
    public function getConnect(){
       return $this->konek;
    }
    //mendapatkan kriteria
    public function getKriteria(){
        $data=array();
        $querykriteria="SELECT namaKriteria FROM kriteria";//query tabel kriteria
        $execute=$this->getConnect()->query($querykriteria);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row['namaKriteria']);
        }
        return $data;
    }
    //mendapatkan alternative
    public function getAlternative(){
        $data=array();
        $queryAlternative="SELECT warna.namawarna AS namawarna,id_warna FROM nilai_warna INNER JOIN warna USING(id_warna) WHERE id_jenisbarang='$this->idCookie' GROUP BY id_warna ";
        $execute=$this->getConnect()->query($queryAlternative);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,array("namawarna"=>$row['namawarna'],"id_warna"=>$row['id_warna']));
        }
        return $data;
    }
    public function getNilaiMatriks($id_warna){
        $data=array();
        $queryGetNilai="SELECT nilai_kriteria.nilai AS nilai,kriteria.sifat AS sifat,nilai_warna.id_kriteria AS id_kriteria FROM nilai_warna JOIN kriteria ON kriteria.id_kriteria=nilai_warna.id_kriteria JOIN nilai_kriteria ON nilai_kriteria.id_nilaikriteria=nilai_warna.id_nilaikriteria WHERE (id_jenisbarang='$this->idCookie' AND id_warna='$id_warna')";
        $execute=$this->getConnect()->query($queryGetNilai);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,array(
                "nilai"=>$row['nilai'],
                "sifat"=>$row['sifat'],
                "id_kriteria"=>$row['id_kriteria']
            ));
        }
        return $data;
    }
    public function getArrayNilai($id_kriteria){
        $data=array();
        $queryGetArrayNilai="SELECT nilai_kriteria.nilai AS nilai FROM nilai_warna INNER JOIN nilai_kriteria ON nilai_warna.id_nilaikriteria=nilai_kriteria.id_nilaikriteria WHERE nilai_warna.id_kriteria='$id_kriteria' AND nilai_warna.id_jenisbarang='$this->idCookie'";
        $execute=$this->getConnect()->query($queryGetArrayNilai);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row['nilai']);
        }
        return $data;
    }
    //rumus normalisasai
    public function normalisasi($array,$sifat,$nilai){
        if ($sifat=='Benefit'){
            $result=$nilai/max($array);
        }elseif ($sifat=='Cost'){
            $result=min($array)/$nilai;
        }
        return round($result,3);
    }
    //mendapatkan bobot kriteria
    public function getBobot($id_kriteria){
        $queryBobot="SELECT bobot FROM bobot_kriteria WHERE id_jenisbarang='$this->idCookie' AND id_kriteria='$id_kriteria' ";
        $row=$this->getConnect()->query($queryBobot)->fetch_array(MYSQLI_ASSOC);
        return $row['bobot'];
    }
    //meyimpan hasil perhitungan
    public function simpanHasil($id_warna,$hasil){
        $queryCek="SELECT hasil FROM hasil WHERE id_warna='$id_warna' AND id_jenisbarang='$this->idCookie'";
        $execute=$this->getConnect()->query($queryCek);
        if ($execute->num_rows > 0) {
            $querySimpan="UPDATE hasil SET hasil='$hasil' WHERE id_warna='$id_warna' AND id_jenisbarang='$this->idCookie'";
        }else{
            $querySimpan="INSERT INTO hasil(hasil,id_warna,id_jenisbarang) VALUES ('$hasil','$id_warna','$this->idCookie')";
        }
        $execute=$this->getConnect()->query($querySimpan);

    }
    //Kmencari kesimpulan
    public function getHasil(){
    $queryHasil     =   "SELECT hasil.hasil AS hasil,jenis_barang.namaBarang,warna.namawarna AS namawarna FROM hasil JOIN jenis_barang ON jenis_barang.id_jenisbarang=hasil.id_jenisbarang JOIN warna ON warna.id_warna=hasil.id_warna WHERE hasil.hasil=(SELECT MAX(hasil) FROM hasil WHERE id_jenisbarang='$this->idCookie')";
    $execute        =   $this->getConnect()->query($queryHasil)->fetch_array(MYSQLI_ASSOC);
    echo "<p>Jadi rekomendasi pemilihan warna <i>$execute[namaBarang]</i> jatuh pada <i>$execute[namawarna]</i> dengan Nilai <b>".round($execute['hasil'],3)."</b></p>";
    }

}