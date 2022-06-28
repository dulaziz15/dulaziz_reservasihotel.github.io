<?php
include '../config/koneksi.php';
// PROSES PENGUMPULAN DATA ATAU VARIABLE DARI FORM TAMBAH KAMAR
$id_kamar = @$_POST['id_kamar'];
$type = @$_POST['type'];
$lantai = @$_POST['lantai'];
$jumlah = @$_POST['jumlah'];
$harga = @$_POST['harga'];
$gambar = @$_FILES['gambar']['tmp_name'];
    $target = '../img/';
    $nama_gambar = @$_FILES['gambar']['name'];

    $tambah_kamar = @$_POST['tambah'];
    
    if($tambah_kamar){
        // PROSES UPLOAD ATAU PINDAH GAMBAR
            $destination_path = getcwd().DIRECTORY_SEPARATOR;
            $target_path = $destination_path. $target . basename($_FILES['gambar']['name']);
            $pindah = move_uploaded_file($_FILES['gambar']['tmp_name'], $target_path);
            if($pindah){
                // MEMASUKAN DATA KE TABLE KAMAR
                mysqli_query($conn, "insert into kamar values ('$id_kamar','$type','$lantai', '$jumlah' ,'$harga','$nama_gambar')");
                header("location: ../index.php?halaman=data_kamar");
            }else{?><script>
                alert("upload gagal");</script><?php
            }
                
            }
            // PROSES UPDATA KAMAR
            $update_kamar = @$_POST['update'];
            if($update_kamar){
                $id_kamar = $_POST['id_kamar'];
                // MENGAMBIL DATA DARI TABLE KAMAR
                $sql = mysqli_query($conn,"select * from kamar where id_kamar='$id_kamar'");
                while($data = mysqli_fetch_array($sql)){
                    $gambar = $data['gambar'];
                }
                // PROSES PENYAMAAN GAMBAR YANG SUDAH ADA
                if($gambar = $gambar){
                    // UPDATE DATA DAN QUERY UPDATE
                    mysqli_query($conn, "update kamar set id_kamar='$id_kamar',
                   type='$type',lantai='$lantai',jumlah='$jumlah',harga='$harga'
                   where id_kamar='$id_kamar'");
                    header("location: ../index.php?halaman=data_kamar");
                }else{
                    // MEMINDAH ATAU MENGUPLOAD GAMBAR
                $destination_path = getcwd().DIRECTORY_SEPARATOR;
                $target_path = $destination_path. $target . basename($_FILES['gambar']['name']);
                $pindah = move_uploaded_file($_FILES['gambar']['tmp_name'], $target_path);
                if($pindah){
                    // UPDATE GAMBAR DAN DATA DAN QUERY UPDATE
                    mysqli_query($conn, "update kamar set id_kamar='$id_kamar',
                   type='$type',lantai='$lantai',jumlah='$jumlah',harga='$harga',gambar='$nama_gambar'
                   where id_kamar='$id_kamar'");
                    header("location: ../index.php?halaman=data_kamar");
                }else{?><script>
                    alert("upload gagal");</script><?php
                }
                    
                }  
            }   
                // PROSES DELETE DATA KAMAR
                @$aksi = $_GET['aksi'];
                if($aksi == "delete"){
                    $id_kamar = $_GET['id'];
                    // QUERY DELETE
                    $sql = mysqli_query($conn,
                    "delete from kamar where id_kamar = '$id_kamar'");
                    if($sql){
                        header('location: ../index.php?halaman=data_kamar');
                    }else{
                        echo "Kode error: ".mysqli_errno($conn);
                        echo "<br />";
                        echo "Pesan error: ".mysqli_error($conn);
                    }
                }



        
?>