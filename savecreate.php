<?php
include 'conn.php';

if(isset($_POST['submit'])){
    $nama = $_POST['namaProduk'];
    $harga = $_POST['harga'];
    $tanggalRilis = $_POST['tanggalRilis'];
    $stok = $_POST['stok'];
    
    $sql = "INSERT INTO produk_info VALUES ('','$nama','$harga','$tanggalRilis','$stok','');
    $query = mysqli_query($conn,$sql)";

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
