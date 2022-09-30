<?php
include 'conn.php';

if(isset($_POST['submit'])){
    $id_produk = $_POST['id_produk'];
    $nama = $_POST['namaProduk'];
    $harga = $_POST['harga'];
    $tanggalRilis = $_POST['tanggalRilis'];
    $stok = $_POST['stok'];

    
    $sql = "UPDATE produk_info SET nama_produk ='$nama', harga = '$harga', tanggal_rilis='$tanggalRilis',stok = '$stok' WHERE id_produk='$id_produk'";
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
