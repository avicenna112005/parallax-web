<?php
include 'conn.php';
include 'function.php';

if(isset($_POST['submit'])){
    $nama = $_POST['namaProduk'];
    $harga = $_POST['harga'];
    $tanggalRilis = $_POST['tanggalRilis'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = upload();
    if (!$gambar){
        return false;
    }
    
    $sql = "INSERT INTO produk_info (id_produk, nama_produk, harga, tanggal_rilis, stok, deskripsi, gambar)VALUES ('','$nama','$harga','$tanggalRilis','$stok','$deskripsi','$gambar')";
    $query = mysqli_query($conn,$sql);

    if($query){
        echo "<script>
        alert('data berhasil ditambahkan');
        document.location.href = 'dashboard.php';
        </script>";
    }else{
        header('Location: savecreate.php?status=failed');
    }

   
}
?>
 