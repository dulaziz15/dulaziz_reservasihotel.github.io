<?php include 'header.php';?>

<div class="container">

<h1 class="title">VIP</h1>



 <!-- RoomDetails -->
            <div id="RoomDetails" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="../images/photos/11.JPG" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="../images/photos/ac.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="../images/photos/tv.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="../images/photos/kamar_mandi.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="../images/photos/lemari.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomDetails" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomDetails" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
  <!-- RoomCarousel-->

<div class="room-features spacer">
  <div class="row">
    <div class="col-sm-12 col-md-5"> 
    <p>VVIP merupakan type kamar yang terbaik karena memiliki fasilitas yang lengkap dan memuaskan</p>
    <p></p>
    </div>
    <div class="col-sm-6 col-md-3 amenitites"> 
    <h3>Fasilitas</h3>    
    <ul>
    <?php
      include '../../config/koneksi.php';
      $sql = mysqli_query($conn, "select * from fasilitas_kamar where type_kamar = 'vvip' ");
      while ($data = mysqli_fetch_array($sql)){
      ?>
      <li><?= $data['fasilitas'] ?></li>
      <?php
      }
      ?>
    </ul>
    

    </div>  
    <div class="col-sm-7 col-md-3">
      <div class="size-price">Harga<span>Rp.400.000,00</span></div>
    </div>
  </div>
</div>
                     


</div>
<?php include 'footer.php';?>