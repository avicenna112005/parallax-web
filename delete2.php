<?php
include 'conn.php';

if(isset($_GET['id_berita'])){
    header('Location: dashboard2.php');
}

$id_berita = $_GET['id_berita'];

    $sql = "DELETE FROM berita WHERE id_berita='$id_berita'";
    $query = mysqli_query($conn,$sql);

    if($query){
        header('Location: dashboard2.php');
        // pasang sweet alert
    }else{
        header('Location: delete2.php?status=failed');
    }
 
?>