
<?php
include 'conn.php';
include 'function.php';

if(isset($_POST['submit2'])){
    $judul = $_POST['judul'];
    $headline = $_POST['headline'];
    $isi1 = $_POST['isi1'];
    $subjudul = $_POST['subjudul'];
    $isi2 = $_POST['isi2'];
    $id_berita = $_POST['id_berita'];
    $gambar = $_FILES['gambar2'];
    $gambarLama = $_POST['gambarLama2'];

    if($_FILES['gambar2']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload2();
    }
    
    $sql = "UPDATE berita SET judul ='$judul', headline = '$headline', isi1 = '$isi1', subjudul = '$subjudul', isi2 = '$isi2', gambar = '$gambar' WHERE id_berita='$id_berita'";
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
