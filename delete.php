<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

include 'conn.php';

if(isset($_GET['id_produk'])){
    header('Location: dashboard.php');
}

$id_produk = $_GET['id_produk'];

    $sql = "DELETE FROM produk_info WHERE id_produk='$id_produk'";
    $query = mysqli_query($conn,$sql);

    if($query){
        echo "<script>
        alert('data berhasil dihapus');
        document.location.href = 'dashboard.php';
        </script>";
        // pasang sweet alert
    }else{
        header('Location: delete.php?status=failed');
    }
 
?>