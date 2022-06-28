<?php
include '../config/koneksi.php';
session_start();
// PROSES LOGIN USER
if($_GET['aksi']=="login"){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    // PENCOCOKAN DENGAN DATABASE
    $sql = mysqli_query($conn, "select * from user where email='$email' and password='$password'");
    $role = mysqli_query($conn,
    "SELECT SUBSTR(id_user,1,1) AS id_user FROM user 
    where email='$email' and password='$password'");
    $cek = mysqli_num_rows($sql);
    
    while($data1 = mysqli_fetch_array($sql)){
        $_SESSION['email'] = $data1['email'];
        $_SESSION['id_pengguna'] = $data1['id_pengguna'];
        $id_pengguna = $data1['id_pengguna'];
        // MENGISI FORM PENDAFTARAN OTOMATIS SESUAI LOGIN USER
        $sql1 = mysqli_query($conn, "select * from pengunjung where id_tamu='$id_pengguna'");
        while($data1 = mysqli_fetch_array($sql1)){
        $_SESSION['nama_lengkap'] = $data1['nama_lengkap'];
        $_SESSION['tempat_lahir'] = $data1['tempat_lahir'];
        $_SESSION['tanggal_lahir'] = $data1['tanggal_lahir'];
        $_SESSION['jenis_kelamin'] = $data1['jenis_kelamin'];
        $_SESSION['alamat'] = $data1['alamat'];
        }
    }
    if ($cek >= 1) {
        $_SESSION['email']= $email;
        $_SESSION['password'] = $password;
        while($data = mysqli_fetch_array($role)){
            $_SESSION['role'] = $data['id_user'];
            
        }
        ?>
        <script>
        alert('Selamat anda sudah Login');
        window.location.href='../user/index.php';
        </script>
        <?php
    }else{
        header("location: ../login.php");
    }
    // PROSES LOGOUT USER
}elseif($_GET['aksi']=="logout"){
    session_destroy();
    ?><script>alert("Anda Telah Logout");
    window.location.href='../index.php';
    </script> <?php
    
}
?>