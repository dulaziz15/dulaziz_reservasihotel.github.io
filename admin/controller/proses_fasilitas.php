<?php
include '../config/koneksi.php';
@$aksi = $_POST['aksi'];
if($aksi == null){
    $aksi = $_GET['aksi'];
}
if($aksi == "tambah"){
$id_fasilitas = $_POST['id_fasilitas'];
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$keadaan = $_POST['keadaan'];
$lokasi = $_POST['lokasi'];
$sql = mysqli_query($conn, "insert into fasilitas values ('$id_fasilitas','$nama','$jumlah','$keadaan','$lokasi')");
if($sql){?>
    <script>
        alert("data berhasil ditambahkan");
        window.location.href = '../index.php?halaman=data_fasilitas';
    </script>
    <?php
}else{
    header("location: ../index.php?halaman=tambah_fasilitas");
}
}else if($aksi == "update"){
    $id_fasilitas = $_POST['id_fasilitas'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $keadaan = $_POST['keadaan'];
    $lokasi = $_POST['lokasi'];
    $sql = mysqli_query($conn, "update fasilitas set id_fasilitas='$id_fasilitas',nama='$nama',jumlah='$jumlah',keadaan='$keadaan',lokasi='$lokasi'
    where id_fasilitas='$id_fasilitas'");
    if($sql){
        ?><script>
            alert ("data berhasil di update");
            window.location.href = '../index.php?halaman=data_fasilitas';
        </script><?php
    }else{
        ?><script>
            alert("data gagal untuk di update");
            window.location.href = '../index.php?halaman=edit_fasilitas&id=<?= $id_fasilitas ?>';
        </script><?php
    }

}else if($aksi == "delete"){
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "delete from fasilitas where id_fasilitas='$id'");
    if($sql){
        ?><script>
            alert("data berhasil dihapus");
            window.location.href = '../index.php?halaman=data_fasilitas';
        </script><?php
    }
}
