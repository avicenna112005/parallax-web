<?php
include 'conn.php';

if(isset($_POST['submit'])){
    $judul = $_POST['judul'];
    $headline = $_POST['headline'];
    $tanggalUp = $_POST['tanggalUp'];
    $isi1 = $_POST['isi1'];
    $isi2 = $_POST['isi2'];
    
    $sql = "INSERT INTO berita VALUES ('','$judul','$tanggalUp','$headline','$isi1','$isi2','')";
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
