<?php 
include 'conn.php';

function register($data){
    global $conn;

    $kode_permit = $data["kode_permit"];
    $username = strtolower(stripslashes($data["username"]));
    $password = $data["password"];
    $password2 = $data["password2"];
    $gmail = $data["gmail"];

    $result =mysqli_query($conn, "SELECT username FROM admindb WHERE username = '$username'");

    if (mysqli_fetch_array($result)) {
        echo "<script>
                alert('username already taken! ')
                document.href.location = 'signinpage.php'

            </script>";
            return false; 
    }

    if($password !== $password2){
        echo "<script>
                alert('password does not match! ')
                document.href.location = 'signinpage.php'
            </script>";
            return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO admindb VALUES('','$kode_permit','$username','$password','$gmail') ");

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_Name = $_FILES['gambar']['tmp_name'];

    // upload tanpa gambar
    if( $error === 4 ){
        echo "<script>
                alert('add image first! ')
                document.href.location = 'create.php'
            </script>";
        return false;
    }

    // ceka valid gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "<script>
                alert('not an image!')
                document.href.location = 'create.php'
            </script>";
        return false;
    }

    // cek ukuran gambar
    if($ukuran > 2000000){
        echo "<script>
                alert('file size too big!')
                document.href.location = 'create.php'
            </script>";
        return false;
    }

    // siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmp_Name, 'image/'. $namaFileBaru );
    return $namaFileBaru;
}


function upload2(){
    $namaFile = $_FILES['gambar2']['name'];
    $ukuran = $_FILES['gambar2']['size'];
    $error = $_FILES['gambar2']['error'];
    $tmp_Name = $_FILES['gambar2']['tmp_name'];

    // upload tanpa gambar
    if( $error === 4 ){
        echo "<script>
                alert('add image first! ')
                document.href.location = 'create2.php'
            </script>";
        return false;
    }

    // ceka valid gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "<script>
                alert('not an image!')
                document.href.location = 'create2.php'
            </script>";
        return false;
    }

    // cek ukuran gambar
    if($ukuran > 2000000){
        echo "<script>
                alert('file size too big!')
                document.href.location = 'create2.php'
            </script>";
        return false;
    }

    // siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmp_Name, 'image/'. $namaFileBaru );
    return $namaFileBaru;
}
?>