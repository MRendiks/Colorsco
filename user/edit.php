<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_user = $_GET['id_user'];
$query = mysqli_query($connection, "SELECT * FROM users WHERE id_user='$id_user'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Users</h1>
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
              <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
                <tr>
                  <td>Nama</td>
                  <td><input class="form-control" type="text" name="nama" required value="<?= $row['nama'] ?>"></td>
                </tr>
                <tr>
                  <td>username</td>
                  <td><input class="form-control" type="text" name="username" required value="<?= $row['username'] ?>"></td>
                </tr>
                <tr>
                  <td>password</td>
                  <td><input class="form-control" type="text" name="password" required value="<?= $row['password'] ?>"></td>
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