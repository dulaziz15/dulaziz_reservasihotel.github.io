<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <!-- MENGHITUNG BANYAK CUSTOMMER YANG SUDAH MELAKUKAN BOKING KAMAR -->
                  <?php
                  $sql = mysqli_query($conn, "select * from pemesanan where status = 1");
                  $j = mysqli_num_rows($sql);
                  echo $j;
                  ?>

                </h3>

                <p>Boking</p>
              </div>
              <div class="icon">
              <i class="fas fa-clipboard-list"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <!-- MENGHITUNG BANYAK CUSTOMMER YANG INGIN MELAKUKAN CHECKIN -->
                <?php
                  $sql = mysqli_query($conn, "select * from pemesanan where status = 2");
                  $j = mysqli_num_rows($sql);
                  echo $j;
                  ?>
                </h3>

                <p>Check In</p>
              </div>
              <div class="icon">
              <i class="fas fa-calendar-check"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>
                  <!-- MENGHITUNG BANYAK CUSTOMMER YANG SEDANG MENGINAP ATAU PROSES -->
                <?php
                  $sql = mysqli_query($conn, "select * from pemesanan where status = 3");
                  $j = mysqli_num_rows($sql);
                  echo $j;
                  ?>
                </h3>

                <p>Proses</p>
              </div>
              <div class="icon">
              <i class="fas fa-sync-alt"></i>
                          </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <!-- MENGHITUNG BANYAK CUSTOMMER YANG SUDAH CHECKOUT -->
                <?php
                  $sql = mysqli_query($conn, "select * from pemesanan where status = 4");
                  $j = mysqli_num_rows($sql);
                  echo $j;
                  ?>
                </h3>

                <p>Check Out</p>
              </div>
              <div class="icon">
              <i class="fas fa-sign-out-alt"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
</section>