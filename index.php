<?php
// INCLUDE KONEKSI KE DATABASE
session_start();
include 'config/koneksi.php';
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


<!-- FORM PEMESANAN -->
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
<div class="col-sm-7 col-md-8">
    <div class="embed-responsive embed-responsive-16by9 wowload fadeInLeft"><iframe  class="embed-responsive-item" src="images/musik.mp4" width="100%" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
</div>
<div class="col-sm-5 col-md-4">
<h3>Pemesanan</h3>
<form action="login.php" method="POST" class="wowload fadeInRight">
        <div class="form-group">
        <input type="hidden" class="form-control" id="id_pemesanan" name="id_pemesanan" readonly>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
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
<!-- FORM PEMESANAN -->



<!-- services -->
<div class="spacer services wowload fadeInUp">
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <!-- RoomCarousel -->
            <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/8.jpg" style='height:300px' class="img-responsive" alt="slide"></div>                
                <div class="item  height-full"><img src="images/photos/9.jpg"  style='height:300px' class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/10.jpg"  style='height:300px' class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Kamar<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-6">
            <!-- RoomCarousel -->
            <div id="TourCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/ac.jpg" style="height:300px" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/kamar_mandi.jpg" style="height:300px" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/lemari.jpg" style="height:300px" class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Fasilitas<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>
</div>
</div>
</div>
<!-- services -->


<?php include 'footer.php';


?>