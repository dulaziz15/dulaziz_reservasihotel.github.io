<?php
include '../config/koneksi.php';
@$aksi = $_POST['aksi'];
if($aksi == null){
    $aksi = $_GET['aksi'];
}
// PROSES TAMBAH TAMU
if($aksi == "tambah"){
    $id_tamu = $_POST['id_tamu'];
    $nama_lengkap = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $sql = mysqli_query($conn, "insert into pengunjung values ('$id_tamu','$nama_lengkap','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat')");
    if($sql){
        header("location: ../index.php?halaman=data_tamu");
    }
    // PROSES UPDATE TAMU
}else if($aksi == "update"){
    $id_tamu = $_POST['id_tamu'];
    $nama_lengkap = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $sql = mysqli_query($conn, "update pengunjung set id_tamu='$id_tamu',
    nama_lengkap = '$nama_lengkap',
    tempat_lahir = '$tempat_lahir',
    tanggal_lahir = '$tanggal_lahir',
    jenis_kelamin = '$jenis_kelamin',
    agama = '$agama',
    alamat = '$alamat' where id_tamu='$id_tamu'");
    if($sql){
        header("location: ../index.php?halaman=data_tamu");
    }
    // PROSES DELETE DATA TAMU
}else if($aksi == "delete"){
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "delete from pengunjung where id_tamu='$id'");
    if($sql){
        header("location: ../index.php?halaman=data_tamu");
    }
}

?>