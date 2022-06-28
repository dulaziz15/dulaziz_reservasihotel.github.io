<?php
include '../config/koneksi.php';
@$aksi = $_POST['aksi'];
if($aksi == null){
    $aksi = $_GET['aksi'];
}
// PROSES TAMBAH OPERATOR
if($aksi == "tambah"){
    $id_operator = $_POST['id_operator'];
    $nama_lengkap = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    // QUERY CREAT DATA
    $sql = mysqli_query($conn, "insert into operator values ('$id_operator','$nama_lengkap','$email','$alamat')");
    if($sql){
        header("location: ../index.php?halaman=data_operator");
    }
    // PROSES UPDATE OPERATOR
}else if($aksi == "update"){
    $id_operator = $_POST['id_operator'];
    $nama_lengkap = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    // QUERY UPDATE DATA
    $sql = mysqli_query($conn, "update operator set id_operator='$id_operator',
    nama_operator = '$nama_lengkap',
    email = '$email',
    alamat = '$alamat'
    where id_operator='$id_operator'");
    if($sql){
        header("location: ../index.php?halaman=data_operator");
    }
    // PROSES DELETE ATAU HAPUS DATA OPERATOR
}else if($aksi == "delete"){
    $id = $_GET['id'];
    // QUERY DELETE
    $sql = mysqli_query($conn, "delete from operator where id_operator='$id'");
    if($sql){
        header("location: ../index.php?halaman=data_operator");
    }
}

?>