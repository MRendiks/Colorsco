<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$users = mysqli_query($connection, "SELECT COUNT(*) FROM users");
$warna = mysqli_query($connection, "SELECT COUNT(*) FROM warna");


$total_users = mysqli_fetch_array($users)[0];
$total_warna = mysqli_fetch_array($warna)[0];
?>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="column">
    <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total users</h4>
              </div>
              <div class="card-body">
                <?= $total_users ?>
              </div>
            </div>
          </div>
        </div>
        
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Warna</h4>
            </div>
            <div class="card-body">
              <?= $total_warna ?>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>