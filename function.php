<?php 
include 'conn.php';

function register($data){
    global $conn;

    $name = $data["name"];
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

    mysqli_query($conn, "INSERT INTO admindb VALUES('','$name','$username','$password','$gmail') ");

    return mysqli_affected_rows($conn);
}
?>