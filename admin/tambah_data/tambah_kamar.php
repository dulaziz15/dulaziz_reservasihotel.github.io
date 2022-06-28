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
              <!-- form TAMBAH KAMAR -->
              <form action="controller/proses_kamar.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Kamar</label>
                    <?php
                    // MEMBUAT ID OTOMATIS
                        $sql = mysqli_query($conn, "select max(substr(id_kamar,3)) as id from kamar");
                         while ($data = mysqli_fetch_array($sql)) {
                               $no = (int)$data['id'];
                            $no = $no + 1;
                            $no = "K-" . sprintf("%03s", $no); ?>
                              <input type="text" value="<?php echo $no;
                                                      } ?>" class="form-control" id="id_kamar" name="id_kamar" readonly>
                  </div>
                  <div class="form-group">
                  <label>Type Kamar</label>
                  <select class="form-control select2" style="width: 100%;" name="type">
                    <option selected="selected">Golden</option>
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
                    <input type="text" class="form-control" id="lantai" name="lantai" placeholder="Lantai">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar Kamar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                        <label class="custom-file-label" for="gambar" name="gambar">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="tambah" id="tambah" value="tambah">
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
</section>