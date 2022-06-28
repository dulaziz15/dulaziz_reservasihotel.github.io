<?php
include '../config/koneksi.php';

// PROSES PEMESANAN KAMAR
@$aksi = $_POST['aksi'];
if($aksi == "pesan"){
    $id_pemesanan = $_POST['id_pemesanan'];
    $nama_pemesan = $_POST['nama'];
    $id_kamar = $_POST['id_kamar'];
    $nomor_telepon = $_POST['no_telp'];
    $jumlah_kamar = $_POST['jumlah'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $status = 1;
    // MENGHITUNG SELISIH HARI ATAU LAMA HARI
    $datetime1 = new DateTime($tgl_mulai);
    $datetime2 = new DateTime($tgl_selesai);
    $jarak = $datetime1->diff($datetime2);
    $lama = $jarak->days;
    // MENGHITUNG JUMLAH KAMAR YANG TERSEDIA
    $sql = mysqli_query($conn,"select * from kamar where id_kamar='$id_kamar'");
    while($data = mysqli_fetch_array($sql)){
        $harga = $data['harga'];
        $jumlah1 = $data['jumlah'];
    }
    $sisa_kamar = ($jumlah1 - $jumlah_kamar);
    $jumlah_harga = ($jumlah_kamar * $harga * $lama);
    $status = 1;
    // JUMLAH KAMAR TIDAK MENCUKUPI
    if($jumlah_kamar >= $jumlah1){
        ?><script>alert("kamar tidak cukup mazzee")
        window.location.href = 'index.php';
        </script><?php
        
    } else {
    // MEMBUAT PEMESANAN
    $sql = mysqli_query($conn, "insert into pemesanan values ('$id_pemesanan','$nama_pemesan', '$nomor_telepon' ,'$id_kamar','$jumlah_kamar','$tgl_mulai','$tgl_selesai','$lama','$jumlah_harga','$status')");
    $sql1 = mysqli_query($conn, "update kamar set jumlah = '$sisa_kamar' where id_kamar='$id_kamar'");
    if($sql && $sql1){
        ?><script>
            alert("selamat anda telah memesan kamar silahkan download tanda buktinya");
            window.location.href = 'index.php';
        </script>
    <?php
    }
    }
}
?>