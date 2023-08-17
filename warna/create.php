<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$prodi = mysqli_query($connection, "SELECT * FROM prodi");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Warna</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>Nama Warna</td>
                <td><input class="form-control" type="text" name="nama_warna" required></td>
              </tr>
              <tr>
                <td>Kategori 1</td>
                <td><input class="form-control" type="text" name="kategori_1" required></td>
              </tr>
              <tr>
                <td>Kategori 2</td>
                <td><input class="form-control" type="text" name="kategori_2" required></td>
              </tr>
              <tr>
                <td>Kategori 3</td>
                <td><input class="form-control" type="text" name="kategori_3" required></td>
              </tr>
              <tr>
                <td>Warna 1</td>
                <td><input class="form-control" type="text" name="warna_1" required></td>
              </tr>
              <tr>
                <td>Warna 2</td>
                <td><input class="form-control" type="text" name="warna_2" required></td>
              </tr>
              <tr>
                <td>Warna 3</td>
                <td><input class="form-control" type="text" name="warna_3" required></td>
              </tr>
              <tr>
                <td>Warna 4</td>
                <td><input class="form-control" type="text" name="warna_4" required></td>
              </tr>
              <tr>
                <td>Warna 5</td>
                <td><input class="form-control" type="text" name="warna_5" required></td>
              </tr>
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>