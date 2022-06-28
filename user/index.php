<?php
session_start();
include '../config/koneksi.php';
if($_SESSION['email'] && $_SESSION['password']){
  include 'header.php';
  
?>


<!-- banner -->
<div class="banner">    	   
    <img src="images/photos/banner.jpg"  class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1  class="animated fadeInDown">Hotel Terbaik Bintang 5</h1>
                <p class="animated fadeInUp">Anda akan terjamin kepuasannya dan kami siap melayani anda 24 jam</p>                
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>
<!-- banner-->


<div id="information" class="spacer reserve-info ">
<div class="container">
<?php
    // KAMAR YANG TELAH DIPESAN OLEH COSTUMMER
    include '../config/koneksi.php';
    $nama = $_SESSION['nama_lengkap'];
    $sql = mysqli_query($conn, "select * from pemesanan where nama_pemesan='$nama' and status != 4");
    $cek = mysqli_num_rows($sql);
    if($cek <= 0){
        ?><h1>Anda Belum memesan Kamar</h1><?php
    }else{
        ?>
        <form action="bukti_pesan.php" method="POST">
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
                    <th>Download Bukti</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                $sql = mysqli_query($conn, "select * from pemesanan where nama_pemesan='$nama' and status != 4");;
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
                            <a href="bukti_pesan.php?id=<?= $data['id_pemesanan'] ?>" class="btn btn-warning">Boking</a><?php
                        }else if($data['status']==2){
                            ?><a href="bukti_pesan.php?id=<?= $data['id_pemesanan']?>" class="btn btn-success">Check In</a><?php
                        }else if($data['status']==3){
                            ?><a href="bukti_pesan.php?id=<?= $data['id_pemesanan']?>" class="btn btn-primary">Proses</a><?php
                        }else{
                            ?><a href="bukti_pesan.php?id=<?= $data['id_pemesanan']?>" class="btn btn-danger">Check Out</a><?php
                        }
                       ?>
                    </td>
                    
                  </tr>
                  <?php
                }
                  ?>
                  </tbody>
            </table>
            </form>
        <?php
    }
    ?>
    <br>
<div class="row">
<div class="col-sm-7 col-md-8">
<!--  KAMAR YANG TELAH DIPESAN OLEH COSTUMMER -->
<!-- FORM PEMESANAN CUSTOMMER -->
    <div class="embed-responsive embed-responsive-16by9 wowload fadeInLeft"><iframe  class="embed-responsive-item" src="../images/musik.mp4" width="100%" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
</div>
<div class="col-sm-5 col-md-4">
<h3>Pemesanan</h3>
    <form action="proses.php" method="POST" class="wowload fadeInRight">
        <div class="form-group">
        <?php
    
        
      
                        $sql = mysqli_query($conn, "select max(substr(id_pemesanan,3)) as id from pemesanan");
                         while ($data = mysqli_fetch_array($sql)) {
                               $no = (int)$data['id'];
                            $no = $no + 1;
                            $no = "P-" . sprintf("%03s", $no); ?>
                              <input type="hidden" value="<?php echo $no;
                                                      } ?>" class="form-control" id="id_pemesanan" name="id_pemesanan" readonly>
        </div>
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Name" name="nama" value="<?php
            echo $_SESSION['nama_lengkap']; ?>">
        </div>
        <h4>Type Kamar</h4>
        <div class="form-group">
            <select class="form-control" name="id_kamar">
            <option value="K-001">President Suite</option>
            <option value="K-002">Premium</option>
            <option value="K-003">Suite</option>
            <option value="K-004">Executive</option>
            <option value="K-005">VIP</option>
            <option value="K-006">VVIP</option>
            </select>      
        </div>
        <div class="form-group">
            <input type="Phone" class="form-control"  name="no_telp" placeholder="Nomor Telepon">
        </div>      
        <div class="form-group">
            <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Kamar">
        </div>      
        <h4>Tanggal mulai</h4>
        <div class="form-group">
            <input type="date" class="form-control" name="tgl_mulai" placeholder="Tanggal Mulai">
        </div>
        <h4>Tanggal Selesai</h4>
        <div class="form-group">
            <input type="date" class="form-control" name="tgl_selesai" placeholder="Tanggal Selesai">
        </div>
        <button class="btn btn-default" name="aksi" value="pesan">pesan</button>
    </form>  

</div>
</div>  
</div>
</div>
<!-- FORM PEMESANAN CUSTOMMER -->



<!-- LAYANAN -->
<div class="spacer services wowload fadeInUp">
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <!-- CAROUSEL KAMAR -->
            <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/8.jpg" style="height:300px" class="img-responsive" alt="slide"></div>                
                <div class="item  height-full"><img src="images/photos/9.jpg" style="height:300px" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/10.jpg" style="height:300px" class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- CAROUSEL KAMAR-->
            <div class="caption">Kamar<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-6">
            <!-- CAROUSEL KAMAR -->
            <div id="TourCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="../images/photos/ac.jpg" style="height:300px" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="../images/photos/kamar_mandi.jpg" style="height:300px" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="../images/photos/lemari.jpg" style="height:300px" class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- CAROUSEL KAMAR-->
            <div class="caption">Fasilitas<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>

    </div>
</div>
</div>
<!-- LAYANAN -->


<?php include 'footer.php';

            }else{
                header("location: ../login.php");
            }
?>