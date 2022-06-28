<?php
include '../config/koneksi.php';
@$aksi = $_POST['aksi'];
// PROSES TAMBAH PEMESANAN
if($aksi == "tambah"){
    $id_pemesanan = $_POST['id_pemesanan'];
    $nama_pemesan = $_POST['nama'];
    $id_kamar = $_POST['id_kamar'];
    $jumlah_kamar = $_POST['jumlah_kamar'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    // MENGHITUNG SELISIH HARI ATAU JUMLAH HARI MENGINAP
    $datetime1 = new DateTime($tanggal_mulai);
    $datetime2 = new DateTime($tanggal_selesai);
    $jarak = $datetime1->diff($datetime2);
    $lama = $jarak->days;
    // MENGHITUNG STOK ATAU JUMLAH KAMAR YANG ADA
    $sql = mysqli_query($conn,"select * from kamar where id_kamar='$id_kamar'");
    while($data = mysqli_fetch_array($sql)){
        $harga = $data['harga'];
        $jumlah1 = $data['jumlah'];
    }
    $sisa_kamar = ($jumlah1 - $jumlah_kamar);
    // MENGHITUNG JUMLAH HARGA YANG HARUS DIBAYAR SESUAI HARGA KAMAR DAN LAMA MENGINAP
    $jumlah_harga = ($jumlah_kamar * $harga * $lama);
    $status = 1;
    // JIKA KAMAR TIDAK CUKUP
    if($jumlah_kamar >= $jumlah1){
        ?><script>alert("kamar tidak cukup mazzee")
        window.location.href = '../index.php?halaman=tambah_pemesanan';
        </script><?php
        
    } else {
    $sql = mysqli_query($conn, "insert into pemesanan values ('$id_pemesanan','$nama_pemesan','$id_kamar','$jumlah_kamar','$tanggal_mulai','$tanggal_selesai','$lama','$jumlah_harga','$status')");
    $sql1 = mysqli_query($conn, "update kamar set jumlah = '$sisa_kamar' where id_kamar='$id_kamar'");
    if($sql && $sql1){
        header("location: ../index.php?halaman=pemesanan");
    }
    }
}
// PROSES UPDATE PEMESANAN
if($aksi == "update"){
    $id_pemesanan = $_POST['id_pemesanan'];
    $nama_pemesan = $_POST['nama'];
    $id_kamar = $_POST['id_kamar'];
    $jumlah_kamar = $_POST['jumlah_kamar'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    // MENGHITUNG SELISIH HARI ATAU JUMLAH HARI MENGINAP
    $datetime1 = new DateTime($tanggal_mulai);
    $datetime2 = new DateTime($tanggal_selesai);
    $jarak = $datetime1->diff($datetime2);
    $lama = $jarak->days;
    // MENGHITUNG STOK ATAU JUMLAH KAMAR YANG ADA
    $sql = mysqli_query($conn,"select * from kamar where id_kamar='$id_kamar'");
    while($data = mysqli_fetch_array($sql)){
        $harga = $data['harga'];
        $jumlah1 = $data['jumlah'];
    }
    $sql = mysqli_query($conn,"select * from pemesanan where id_pemesanan='$id_pemesanan'");
    while($data = mysqli_fetch_array($sql)){
        $jumlah2 = $data['jumlah_kamar'];
    }
    $sisa_kamar = ($jumlah2 + $jumlah1);
    $awal_jumlah = ($sisa_kamar - $jumlah_kamar);
    // MENGHITUNG JUMLAH HARGA YANG HARUS DIBAYAR SESUAI HARGA KAMAR DAN LAMA MENGINAP
    $jumlah_harga = ($jumlah_kamar * $harga * $lama);
    $status = 1;
    // JIKA KAMAR TIDAK CUKUP
    if($jumlah_kamar >= $jumlah1){
        ?><script>alert("kamar tidak cukup mazzee")
        window.location.href = '../index.php?halaman=edit_pemesanan&id=<?= $id_pemesanan?>';
        </script><?php
        
    } else {
        // MEMASUKAN DATA PEMESANAN
    $sql = mysqli_query($conn, "update pemesanan set id_pemesanan='$id_pemesanan',
    nama_pemesan='$nama_pemesan',id_kamar='$id_kamar',jumlah_kamar='$jumlah_kamar',tgl_mulai='$tanggal_mulai',tgl_selesai='$tanggal_selesai',lama_tinggal='$lama',harga='$jumlah_harga'
    where id_pemesanan='$id_pemesanan'");
    $sql2 = mysqli_query($conn, "update kamar set jumlah = '$awal_jumlah' where id_kamar='$id_kamar'");
    
    if($sql && $sql2){
        header("location: ../index.php?halaman=pemesanan");
    }
    }
// PROSES DELETE ATAU HAPUS DATA PEMESANAN
}else if($aksi == "delete"){
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "delete from pemesanan where id_pemesanan='$id'");
    if($sql){
        header("location: ../index.php?halaman=pemesanan");
    }
    // PROSES MENYETUJUI CHECKIN YANG DILAKUKAN
}else if($aksi == "ya"){
        $id_pemesanan = $_POST['id_pemesanan'];
        $id_kamar = $_POST['id_kamar'];
        $sql2 = mysqli_query($conn, "update pemesanan set status = 3 where id_pemesanan = '$id_pemesanan'");
    if($sql && $sql2){
        return true;
    }else{
        return false;
    }
     // PROSES MENYETUJUI CHECKOUT YANG DILAKUKAN
    }else if($aksi == "checkout"){
        $id_pemesanan = $_POST['id_pemesanan'];
        $jumlah_kamar = $_POST['jumlah_kamar'];
        $id_kamar = $_POST['id_kamar'];
        $kamar = $_POST['kamar'];
        $data =  ($jumlah_kamar + $kamar);
        $sql1 = mysqli_query($conn, "update kamar set jumlah = '$data' where id_kamar = '$id_kamar'");
        $sql2 = mysqli_query($conn, "update pemesanan set status = 4 where id_pemesanan = '$id_pemesanan'");
    if($sql && $sql2){
        return true;
    }else{
        return false;
    }
     // PROSES MENYETUJUI BOKING YANG DILAKUKAN CUSTOMMER
    }else if($aksi == "checkin"){
        $id_pemesanan = $_POST['id_pemesanan'];
        $id_kamar = $_POST['id_kamar'];
        $sql2 = mysqli_query($conn, "update pemesanan set status = 2 where id_pemesanan = '$id_pemesanan'");
    if($sql && $sql2){
        return true;
    }else{
        return false;
    }
    }
?>