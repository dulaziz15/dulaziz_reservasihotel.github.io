<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Failitas</h1>
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
              <a href="?halaman=data_fasilitas" type="button" class="btn btn-warning "><i class="fas fa-angle-double-left"></i>Kembali</a>
            </div>
    </div>
    <!-- /.content-header -->
    
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Tambah Fasilitas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form TAMBAH TAMU -->
              <form action="controller/proses_fasilitas.php" method="post">
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Fasilitas</label>
                    <?php
                        $id_fasilitas = $_GET['id'];
                        $sql = mysqli_query($conn, "select * from fasilitas where id_fasilitas='$id_fasilitas'");
                         while ($data = mysqli_fetch_array($sql)) {
                               ?>
                              <input type="text" value="<?php echo $data['id_fasilitas'] ?>" class="form-control" id="id_fasilitas" name="id_fasilitas" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Fasilitas</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" placeholder="Nama Fasilitas">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Fasilitas</label>
                    <input type="number" class="form-control" id="jumlah" value="<?= $data['jumlah'] ?>" name="jumlah" placeholder="Jumlah Fasilitas">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keadaan</label>
                    <input type="text" class="form-control" id="keadaan" value="<?= $data['keadaan'] ?>" name="keadaan" placeholder="Keadaan">
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" value="<?= $data['lokasi'] ?>" name="lokasi" placeholder="Lokasi">
                  </div>
                  <div class="card-footer">
                  <input type="submit" class="btn btn-success" name="aksi" value="update">
                </div>
              </div>
              </form>
              <?php
                         }
              ?>
            </div>
            <!-- /.card -->
          </div>
</section>