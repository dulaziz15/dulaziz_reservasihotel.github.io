<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <?php
          if($_SESSION['role']=="R"){
          ?>
        <div class="col-sm-6">
            <h1 class="m-0">Data Pengunjung yang selesai menginap</h1>
          </div><!-- /.col -->
        <?php
        }
        if($_SESSION['role']=="A"){
        ?>
          <div class="col-sm-6">
            <h1 class="m-0">Data Pemesanan</h1>
          </div><!-- /.col -->
          <?php
        }
          ?>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
            
          </div><!-- /.col -->
        </div><!-- /.row -->
        <?php
        if($_SESSION['role']=="A"){
        ?>
        <div class="col-sm-1">
              <a href="?halaman=tambah_pemesanan" type="button" class="btn btn-primary "><i class="fas fa-plus"></i>Tambah</a>
            </div>
            <?php
        }
            ?>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id Pemesanan</th>
                    <th>Nama Pemesan</th>
                    <th>Nomor Telepon</th>
                    <th>Id kamar</th>
                    <th>Jumlah Kamar</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Lama Tinggal</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <!-- <th>Action</th> -->
                    <!-- <th>Setujui</th> -->
                  </tr>
                  </thead>
                  <tbody>
                <?php
                if($_SESSION['role']=="A"){ 
                $sql = mysqli_query($conn, "select * from pemesanan");
                while($data = mysqli_fetch_array($sql)){?>
                    <tr>
                    <td><?= $data['id_pemesanan'] ?></td>
                    <td><?= $data['nama_pemesan'] ?></td>
                    <td><?= $data['nomor_telepon'] ?></td>
                    <td><?= $data['id_kamar'] ?></td>
                    <td><?= $data['jumlah_kamar'] ?></td>
                    <td><?= $data['tgl_mulai'] ?></td>
                    <td><?= $data['tgl_selesai'] ?></td>
                    <td><?= $data['lama_tinggal']." Hari" ?></td>
                    <td><?= $data['harga'] ?></td>
                    <td><?php
                        if($data['status']==1){
                            ?>
                            <a class="btn btn-warning">Boking</a><?php
                        }else if($data['status']==2){
                            ?><a class="btn btn-success">Check In</a><?php
                        }else if($data['status']==3){
                            ?><a class="btn btn-primary">Proses</a><?php
                        }else{
                            ?><a class="btn btn-danger">Check Out</a><?php
                        }
                       ?>
                    </td>
                    </tr><?php
                }
              }
                if($_SESSION['role']=="R"){
                $sql = mysqli_query($conn, "select * from pemesanan where status = 4");
                while($data = mysqli_fetch_array($sql)){
                
                ?>
                  <tr>
                    <td><?= $data['id_pemesanan'] ?></td>
                    <td><?= $data['nama_pemesan'] ?></td>
                    <td><?= $data['nomor_telepon'] ?></td>
                    <td><?= $data['id_kamar'] ?></td>
                    <td><?= $data['jumlah_kamar'] ?></td>
                    <td><?= $data['tgl_mulai'] ?></td>
                    <td><?= $data['tgl_selesai'] ?></td>
                    <td><?= $data['lama_tinggal']." Hari" ?></td>
                    <td><?php
                     $hasil_rupiah = "Rp " . number_format($data['harga'],2,',','.');
                     echo $hasil_rupiah;
                      ?></td>
                    <td><?php
                        if($data['status']==1){
                            ?>
                            <a class="btn btn-warning">Boking</a><?php
                        }else if($data['status']==2){
                            ?><a class="btn btn-success">Check In</a><?php
                        }else if($data['status']==3){
                            ?><a class="btn btn-primary">Proses</a><?php
                        }else{
                            ?><a class="btn btn-danger">Check Out</a><?php
                        }
                       ?>
                    </td>
                  </tr>
                  <?php
                }}
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>jumlah</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                      <?php
                    $sql = mysqli_query($conn, "SELECT  SUM(harga) AS jmlh_harga FROM pemesanan");
                    if (mysqli_num_rows($sql) > 0) {
                      while($rowData = mysqli_fetch_array($sql)){
                        $hasil_rupiah = "Rp " . number_format($rowData['jmlh_harga'],2,',','.');
	                      echo $hasil_rupiah;
                         
                      }
                    }

                    ?>
                    </th>
                    <th></th>
                    <!-- <th>Action</th> -->
                    <!-- <th>Setujui</th> -->
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