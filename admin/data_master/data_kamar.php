<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Kamar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
            
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="col-sm-1">
              <a href="?halaman=tambah_kamar" type="button" class="btn btn-primary "><i class="fas fa-plus"></i>Tambah</a>
            </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-sm-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Berikut adalah data Kamar yang tersedia di Apita hotel</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- TABEL DATA KAMAR -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id Kamar</th>
                    <th>Type Kamar</th>
                    <th>Lantai</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                // MENGAMBIL DATA DARI TABLE KAMAR
                $sql = mysqli_query($conn, "select * from kamar");
                while($data = mysqli_fetch_array($sql)){
                ?>
                  <tr>
                    <td><?= $data['id_kamar'] ?></td>
                    <td><?= $data['type'] ?></td>
                    <td><?= $data['lantai'] ?></td>
                    <td><button class="btn btn-success"><?= $data['jumlah'] ?> Kamar</button></td>
                    <td><?= $data['harga'] ?></td>
                    <td><img src="img/<?= $data['gambar']?>" style="height:150px;width:200px;"></td>
                    <td>
                      <!-- ACTION -->
                        <a href="?halaman=edit_kamar&id=<?php echo $data['id_kamar'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="controller/proses_kamar.php?aksi=delete&id=<?= $data['id_kamar']?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php
                }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id Kamar</th>
                    <th>Type Kamar</th>
                    <th>Lantai</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</div>
            </div>
          </div>
</section>