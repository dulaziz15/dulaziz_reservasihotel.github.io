<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Pemesanan</h1>
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
              <a href="?halaman=pemesanan" type="button" class="btn btn-warning "><i class="fas fa-angle-double-left"></i>Kembali</a>
            </div>
    </div>
    <!-- /.content-header -->
    
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Data Pemesanan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form TAMBAH PEMESANAN -->
              <form action="controller/proses_pemesanan.php" method="post">
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Pemesanan</label>
                    <?php
                    // MEMBUAT ID PEMESANAN OTOMATIS
                        $sql = mysqli_query($conn, "select max(substr(id_pemesanan,3)) as id from pemesanan");
                         while ($data = mysqli_fetch_array($sql)) {
                               $no = (int)$data['id'];
                            $no = $no + 1;
                            $no = "P-" . sprintf("%03s", $no); ?>
                              <input type="text" value="<?php echo $no;
                                                      } ?>" class="form-control" id="id_pemesanan" name="id_pemesanan" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pemesan</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pemesan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Kamar</label>
                    <input type="text" class="form-control" id="id_kamar" name="id_kamar" placeholder="Id Kamar">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Kamar</label>
                    <input type="text" class="form-control" id="jumlah_kamar" name="jumlah_kamar" placeholder="Jumlah Kamar">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="Tanggal Selesai">
                  </div>
                  <div class="card-footer">
                  <input type="submit" class="btn btn-warning" name="aksi" value="tambah">
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
</section>