<?php
include 'conn.php';
include 'function.php';

if(isset($_POST['submit'])){
    $judul = $_POST['judul'];
    $headline = $_POST['headline'];
    $tanggalUp = $_POST['tanggalUp'];
    $isi1 = $_POST['isi1'];
    $isi2 = $_POST['isi2'];

    $gambar = upload2();
    if (!$gambar){
        return false;
    }

    $sql = "INSERT INTO berita VALUES ('','$judul','$tanggalUp','$headline','$isi1','$isi2','$gambar')";
    $query = mysqli_query($conn,$sql);

    if($query){
        echo "<script>
        alert('data berhasil ditambahkan');
        document.location.href = 'dashboard2.php';
        </script>";
    }else{ 
        header('Location: create2.php?status=failed');
    }
}
?>
