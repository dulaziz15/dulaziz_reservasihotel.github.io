<?php 
    include "../config/koneksi.php";
    session_start();
    // PROSES LOGIN 
    if ($_GET['aksi']=="login") {
        $email = $_POST['email'];
        $password  = md5($_POST['password']);
        // PENCOCOKAN EMAIL DAN PASSWORD DENGAN YANG ADA DI DATABASE
        $sql = mysqli_query($conn,"
        select * from user where email='$email' and password='$password'");
        // MEMBUAT ROLE ADMIN DAN RESEPSIONIS
        $role = mysqli_query($conn,
        "SELECT SUBSTR(id_user,1,1) AS id_user FROM user 
        where email='$email' and password='$password'");
        $validasi = mysqli_num_rows($sql);
        while($data1 = mysqli_fetch_array($sql)){
            $_SESSION['email'] = $data1['email'];
            $_SESSION['id_pengguna'] = $data1['id_pengguna'];
            $id_pengguna = $data1['id_pengguna'];
            // MENGAMBIL NAMA DARI USER YANG TELAH LOGIN
            $sql1 = mysqli_query($conn, "select * from pengunjung where id_tamu='$id_pengguna'");
        }
            while($data2 = mysqli_fetch_array($sql1)){
            
                $_SESSION['nama'] = $data2['nama_lengkap'];
            }
        // PENGECEKAN DENGAN DATABASE
        if ($validasi >= 1) {
            $_SESSION['email']= $email;
            $_SESSION['password'] = $password;
            while($data = mysqli_fetch_array($role)){
                $_SESSION['role'] = $data['id_user'];
                
            }
            header("location: ../index.php?halaman=dashboard");
        }else{
            header("location: ../login.php");
        }
    }elseif($_GET['aksi']=="logout"){
        session_destroy();
        header("location: ../login.php");
    }
?>