
<?php
include 'conn.php';

if(isset($_POST['submit'])){
    $judul = $_POST['judul'];
    $headline = $_POST['headline'];
    $isi1 = $_POST['isi1'];
    $isi2 = $_POST['isi2'];
    $id_berita = $_POST['id_berita'];
    
    $sql = "UPDATE berita SET judul ='$judul', headline = '$headline', isi1 = '$isi1', isi2 = '$isi2' WHERE id_berita='$id_berita'";
    $query = mysqli_query($conn,$sql);

    if($query){
        echo "<script>
        alert('data berhasil diubah');
        document.location.href = 'dashboard2.php';
        </script>";
    }else{
        header('Location: editform2.php?status=failed');
    }
}
?>
