<?php
include '../config/koneksi.php';
// PROSES DAFTAR USER
@$aksi = $_POST['aksi'];
if($aksi=="daftar"){
    $id_user = $_POST['id_user'];
    $id_tamu = $_POST['id_tamu'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    // MEMASUKAN DATA KE TABLE USER DAN PENGUNJUNG
    $sql = mysqli_query($conn, "insert into user (id_user,email,password,id_pengguna) values ('$id_user','$email','$password','$id_tamu')");
    $sql1 = mysqli_query($conn, "insert into pengunjung (id_tamu,nama_lengkap,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,alamat) values ('$id_tamu','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat')");
    if($sql && $sql1){
        ?><script>alert("selamat anda telah mendaftar");
        window.location.href = '../login.php';
        </script><?php
        
    }else{
        return false;
    }
}
?>