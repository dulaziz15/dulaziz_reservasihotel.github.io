<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Tamu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
            
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="col-sm-1">
              <a href="?halaman=tambah_tamu" type="button" class="btn btn-primary "><i class="fas fa-plus"></i>Tambah</a>
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
                <h3 class="card-title">Berikut adalah data tamu yang telah berkunjung</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- TABLE DATA TAMU -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id Tamu</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- MENGAMBIL DATA DARI TABLE PENGUNJUNG -->
                <?php
                $sql = mysqli_query($conn, "select * from pengunjung");
                while($data = mysqli_fetch_array($sql)){
                ?>
                  <tr>
                    <td><?= $data['id_tamu'] ?></td>
                    <td><?= $data['nama_lengkap'] ?></td>
                    <td><?= $data['tempat_lahir'] ?></td>
                    <td><?= $data['tanggal_lahir'] ?></td>
                    <td><?= $data['jenis_kelamin'] ?></td>
                    <td><?= $data['agama'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td>
                      <!-- ACTION -->
                        <a href="?halaman=edit_tamu&id=<?php echo $data['id_tamu'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="controller/proses_tamu.php?aksi=delete&id=<?= $data['id_tamu']?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php
                }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id Tamu</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
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