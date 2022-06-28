<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Failitas Kamar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="col-sm-1">
              <a href="?halaman=data_fasilitas_kamar" type="button" class="btn btn-warning "><i class="fas fa-angle-double-left"></i>Kembali</a>
            </div>
    </div>
    <!-- /.content-header -->
    
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Tambah Fasilitas Kamar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form TAMBAH TAMU -->
              <form action="controller/proses_fasilitas_kamar.php" method="post">
              <div class="card-body">
              <div class="form-group">
              <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $data1['id'] ?>" placeholder="">
                  </div>
                  <label>Type Kamar</label>
                  <select class="form-control select2" style="width: 100%;" name="type">
                  <?php
                  $id = $_GET['id'];
                  $sql1 = mysqli_query($conn, "select * from fasilitas_kamar where id='$id'");
                  while($data1 = mysqli_fetch_array($sql1)){
                  ?>
                    <option class="selected"><?= $data1['type_kamar'] ?></option>
                  <?php
                  $sql = mysqli_query($conn, "select * from kamar");
                  while($data = mysqli_fetch_array($sql)){
                  ?>
                    <option><?= $data['id'] ?></option>
                    <?php
                  }
                
                  ?>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Fasilitas</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data1['fasilitas'] ?>" placeholder="Nama Fasilitas">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keadaan</label>
                    <input type="text" class="form-control" id="jumlah" name="keadaan" value="<?= $data1['keadaan'] ?>" placeholder="Keadaan Fasilitas">
                  </div>
                  <div class="card-footer">
                  <input type="submit" class="btn btn-warning" name="aksi"  value="update">
                </div>
              </div>
              <?php
                  }
              ?>
              </form>
            </div>
            <!-- /.card -->
          </div>
</section>