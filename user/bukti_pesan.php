<?php
// MENGAMBIL DATA PEMESANAN SESUAI DENGAN USER YANG TELAH LOGIN
  include "../config/koneksi.php";
  include "../config/timezone.php";
  $id_pemesanan = $_GET['id'];
  $sql = mysqli_query($conn, "select * from pemesanan where id_pemesanan='$id_pemesanan'");
  while($data = mysqli_fetch_array($sql)){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo "Anaya Hotel - ".$data['nama_pemesan']; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="hotel.png" />
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet">
  <link href="css/style_bukti_pesan.css" rel="stylesheet">
</head>
<body>

<body>
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <a href="index.php" class="btn btn-warning"><i class="fa fa-print"></i>Kembali</a>
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Print as PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="">
                        <img src="../images/9.png" class="rounded-circle" alt="" width="100" height="100">
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="">
                            Apita Hotel
                            </a>
                        </h2>
                        <div>Palimanan Cirebon, AZ 85004, INA</div>
                        <div>(123) 456-789</div>
                        <div>apitahotel@gmail.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <h2 class="to"> <?php echo "Apita Hotel" ?> </h2>
                        <div class="address">Cirebon, TX 79273, Indonesia</div>
                        <div class="email"><a href="mailto:<?php echo "dulaziz123@gmail.com" ?> "><?php echo $data['nomor_telepon'] ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Pemesanan</h1>
                        <div class="date">Date: <?php echo date("F j, Y, g:i a"); ?></div>
                    </div>
                </div>
                <!-- MEMBUAT KWITANSI ATAU TANDA BUKTI -->
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left"> NAMA PEMESAN</th>
                            <th class="text-left">KAMAR</th>
                            <th class="text-left"> STATUS</th>
                            <th class="text-center">CHEECK IN</th>
                            <th class="text-center">JUMLAH KAMAR</th>
                            <th class="text-center">HARGA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no">01</td>
                            <td class="text-left"><h2>
                                <?php echo $data['nama_pemesan']; ?>
                                </a>
                                </h2>
                               
                                   Sangat nyaman
                               </a> 
                               untuk istirahat beberapa hari kedepan serta membuat anda dapat berpikir </br>untuk rencana kedepan.
                            </td>
                            <td class="unit text-center">
                                <?php
                                if($data['id_kamar']=="K-001"){
                                    echo "President Suite";
                                }else if($data['id_kamar']=="K-002"){
                                    echo "Premium";
                                }else if($data['id_kamar']=="K-003"){
                                    echo "Suite";
                                }else if($data['id_kamar']=="K-004"){
                                    echo "Executive";
                                }else if($data['id_kamar']=="K-005"){
                                    echo "VIP";
                                }else if($data['id_kamar']=="K-006"){
                                    echo "VVIP";
                                }else{
                                    echo $data['id_kamar'];
                                }
                                ?>
                            </td>
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
                            <td class="qty text-center"><?php echo $data['tgl_mulai'] ?></td>
                            <td class="total text-center"> <?php echo $data['jumlah_kamar'];?> </td>
                            <td class="total text-center"> <?php
                     $hasil_rupiah = "Rp " . number_format($data['harga'],2,',','.');
                     echo $hasil_rupiah;
                      ?> </td>
                        </tr>                    
                    </tfoot>
                </table>
                <div class="mt-4 mb-2">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">Pastikan berada di hotel kami 30 menit sebelum check in.</div>
                </div>
            </main>
            <footer>
                Bukti pemesanan kamar Apita Hotel Palimanan- Cirebon - Jawa Barat - Indonesia.
            </footer>
        </div>
        <div></div>
    </div>
</div>

<!-- PANGGIL FILE JAVASCRIPT DARI FOLDER js -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap5.0.1.bundle.min.js"></script>

<script>
$(document).ready(function(){
  $('#printInvoice').click(function(){
    window.print();
        }); 
    });   
</script>

</body>
</html>
<?php
  }
?>

