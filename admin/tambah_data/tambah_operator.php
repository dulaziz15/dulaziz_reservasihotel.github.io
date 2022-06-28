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
              <a href="?halaman=data_operator" type="button" class="btn btn-warning "><i class="fas fa-angle-double-left"></i>Kembali</a>
            </div>
    </div>
    <!-- /.content-header -->
    
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Data Kamar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form TEMBAH OPERATOR -->
              <form action="controller/proses_operator.php" method="post">
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Operator</label>
                    <?php
                    // MEMBUAT ID OPERATOR OTOMATIS
                        $sql = mysqli_query($conn, "select max(substr(id_operator,3)) as id from operator");
                         while ($data = mysqli_fetch_array($sql)) {
                               $no = (int)$data['id'];
                            $no = $no + 1;
                            $no = "O-" . sprintf("%03s", $no); ?>
                              <input type="text" value="<?php echo $no;
                                                      } ?>" class="form-control" id="id_operator" name="id_operator" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Operator</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Operator">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                  </div>
                  
                  <div class="card-footer">
                  <input type="submit" class="btn btn-success" name="aksi" value="tambah">
                </div>
              </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
</section>