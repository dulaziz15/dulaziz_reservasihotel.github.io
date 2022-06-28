<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Kamar</h1>
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
              <a href="?halaman=data_kamar" type="button" class="btn btn-warning "><i class="fas fa-angle-double-left"></i>Kembali</a>
            </div>
    </div>
    <!-- /.content-header -->
    
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Data Kamar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="controller/proses_kamar.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Kamar</label>
                    <!-- MENAMPILKAN DATA DARI KAMAR SESUAI KAMAR YANG INGIN DIEDIT / DI UPDATE -->
                    <?php
                        $id_kamar = $_GET['id'];
                        $sql = mysqli_query($conn, "select * from kamar where id_kamar='$id_kamar'");
                        while($data = mysqli_fetch_array($sql)){
                        ?>
                              <input type="text" value="<?= $data['id_kamar'] ?>" class="form-control" id="id_kamar" name="id_kamar" readonly>
                  </div>
                  <div class="form-group">
                  <label>Type Kamar</label>
                  <select class="form-control select2" style="width: 100%;" name="type">
                    <option selected="selected"><?= $data['type'] ?></option>
                    <option>Golden</option>
                    <option>President Suite</option>
                    <option>Premium</option>
                    <option>Suite</option>
                    <option>Executive</option>
                    <option>VIP</option>
                    <option>VVIP</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Lantai</label>
                    <input type="text" class="form-control" id="lantai" name="lantai" placeholder="Lantai" value="<?= $data['lantai'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" value="<?= $data['jumlah'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?= $data['harga'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar Kamar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                        <label class="custom-file-label" for="gambar" name="gambar" ><?= $data['gambar'] ?></label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <?php
                        }
                  ?>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="update" value="update">
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
</section>