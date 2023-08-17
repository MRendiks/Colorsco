<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_warna = $_GET['id_warna'];
$query = mysqli_query($connection, "SELECT * FROM warna WHERE id_warna='$id_warna'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Warna</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <table cellpadding="8" class="w-100">
              <input type="hidden" name="id_warna" value="<?= $row['id_warna'] ?>">
                <tr>
                  <td>Nama Warna</td>
                  <td><input class="form-control" type="text" name="nama_warna"  value="<?= $row['nama_warna'] ?>"></td>
                </tr>
                <tr>
                  <td>Kategori 1</td>
                  <td><input class="form-control" type="text" name="kategori_1" value="<?= $row['kategori_1'] ?>"></td>
                </tr>
                <tr>
                  <td>Kategori 2</td>
                  <td><input class="form-control" type="text" name="kategori_2" value="<?= $row['kategori_2'] ?>"></td>
                </tr>
                <tr>
                  <td>Kategori 3</td>
                  <td><input class="form-control" type="text" name="kategori_3" required value="<?= $row['kategori_3'] ?>"></td>
                </tr>
                <tr>
                  <td>Warna 1</td>
                  <td><input class="form-control" type="text" name="warna_1" required value="<?= $row['warna_1'] ?>"></td>
                </tr>
                <tr>
                  <td>Warna 2</td>
                  <td><input class="form-control" type="text" name="warna_2" required value="<?= $row['warna_2'] ?>"></td>
                </tr>
                <tr>
                  <td>Warna 3</td>
                  <td><input class="form-control" type="text" name="warna_3" required value="<?= $row['warna_3'] ?>"></td>
                </tr>
                <tr>
                  <td>Warna 4</td>
                  <td><input class="form-control" type="text" name="warna_4" required value="<?= $row['warna_4'] ?>"></td>
                </tr>
                <tr>
                  <td>Warna 5</td>
                  <td><input class="form-control" type="text" name="warna_5" required value="<?= $row['warna_5'] ?>"></td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>