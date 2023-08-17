<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM warna");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Warna</h1>
    <a href="./create.php" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Nama Warna</th>  
                  <th>Jenis Iklan</th>
                  <th>Jenis Produk</th>
                  <th>Target Pasar</th>
                  <th>Warna 1</th>
                  <th>Warna 2</th>
                  <th>Warna 3</th>
                  <th>Warna 4</th>
                  <th>Warna 5</th>
                  <th style="width: 150">Aksi</th>
                </tr>
              </thead>
              <tbody style="text-align: center;">
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($result)) :
                ?>
                  <tr>
                    <td><?= $data['id_warna'] ?></td>
                    <td><?= $data['nama_warna'] ?></td>
                    <td><?= $data['kategori_1'] ?></td>
                    <td><?= $data['kategori_2'] ?></td>
                    <td><?= $data['kategori_3'] ?></td>
                    <td><?= $data['warna_1'] ?></td>
                    <td><?= $data['warna_2'] ?></td>
                    <td><?= $data['warna_3'] ?></td>
                    <td><?= $data['warna_4'] ?></td>
                    <td><?= $data['warna_5'] ?></td>
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?id_warna=<?= $data['id_warna'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?id_warna=<?= $data['id_warna'] ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                    </td>
                  </tr>

                <?php
                $no++;
                endwhile;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>