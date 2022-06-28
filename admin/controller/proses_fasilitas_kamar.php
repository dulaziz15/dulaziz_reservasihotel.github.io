<?php
include '../config/koneksi.php';

@$aksi = $_POST['aksi'];
if($aksi == null){
    $aksi = $_GET['aksi'];
}
if($aksi == "tambah"){
    $nama = $_POST['nama'];
    $keadaan = $_POST['keadaan'];
    $type = $_POST['type'];
    $sql = mysqli_query($conn, "insert into fasilitas_kamar (type_kamar,fasilitas,keadaan) values ('$type','$nama','$keadaan')");
    if($sql){
        ?><script>
            alert("data berhasil ditambahkan");
            window.location.href = '../index.php?halaman=data_fasilitas_kamar';
        </script><?php
    }
}else if($aksi == "update"){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $keadaan = $_POST['keadaan'];
    $type = $_POST['type'];
    $sql = mysqli_query($conn, "update fasilitas_kamar set id='$id', type_kamar='$type',fasilitas='$nama',keadaan='$keadaan' where id='$id'");
    if($sql){
        ?><script>
            alert("data berhasil diupdate");
            window.location.href = '../index.php?halaman=data_fasilitas_kamar';
        </script><?php
    }
}else if($aksi == "delete"){
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "delete from fasilitas_kamar where id='$id'");
    if($sql){?>
        <script>
            alert("data berhasil dihapus");
            window.location.href = '../index.php?halaman=data_fasilitas_kamar';
        </script><?php
    }
}
?>