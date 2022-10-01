<?php
include 'conn.php';
include 'function.php';

if(isset($_POST['submit'])){
    $id_produk = $_POST['id_produk'];
    $nama = $_POST['namaProduk'];
    $harga = $_POST['harga'];
    $tanggalRilis = $_POST['tanggalRilis'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar'];
    $gambarLama = $_POST['gambarLama'];

    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }
    
    $sql = "UPDATE produk_info SET nama_produk ='$nama', harga = '$harga', tanggal_rilis='$tanggalRilis',stok = '$stok', gambar='$gambar', deskripsi='$deskripsi' WHERE id_produk='$id_produk'";
    $query = mysqli_query($conn,$sql);

    if($query){
        echo "<script>
        alert('data berhasil diubah');
        document.location.href = 'dashboard.php';
        </script>";
    }else{
        header('Location: editform.php?status=failed');
    }
}
?>
