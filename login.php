<?php 
session_start();

if(isset($_SESSION["login"])){
    header("Location: dashboard.php");
    exit;
}

require 'function.php';
require 'conn.php';

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admindb WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_array($result);
        if (password_verify($password, $row["password"])){
            // set session
            $_SESSION["login"] = true;
            header("Location: dashboard.php");
            exit;
        }

        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login test</title>
    <link rel="stylesheet" href="style.css">

    <!-- link font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
       * {
    margin: 0;
    padding: 0;
    font-family: 'Quicksand', sans-serif;
}
.login{
    width: 400px;
    height: 500px;
    border-radius: 15px;
    background-color: rgb(201, 200, 200);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.judul1{
    text-align: center;
    padding-top: 30px;

}
.garis{
    border: 0.1px solid black;
    width: 127px;
    margin-left: 136px;
}
.heading{
    padding-top: 50px;
    padding-left: 45px;
}
input{
    width: 300px;
    height: 40px;
    border-radius: 15px;
    border-color: transparent;
    background-color: #D9D9D9;
    padding-left: 10px;
    box-shadow:  2px 2px 2px rgba(0, 0, 0, 0.51);
}
.input-data{
    padding-left: 45px;
    padding-top: 45px;
}
button{
    margin-top: 20px;
    background-color: #434CE7;
    color: white ;
    align-items: center;
    width: 100px;
    height:40px;
    left: 250px;
    padding-left: 0;
    border: none;
    border-radius:15px;
    box-shadow:  2px 2px 2px rgba(0, 0, 0, 0.51);
    
}
    </style>
</head>
<body>
    <!-- image -->
 
        <form action="" method="post">
            <div class="login">
            <div class="judul1">
                <h3>DistrictTrends</h3>
                <div class="garis"></div>
            </div>
            <div class="heading">
                <h4>Admin Dashboard</h4>
                <h1>Login</h1>
                <h5>You need to login first to access dashboard <br><a href="signinpage.php">Sign Up</a></h5>
            </div>
            <?php if(isset($error)) :?>
                <h2 style="color:red; position:absolute; top:320px; left:235px;">wrong password!</h2>
            <?php endif;?>
            <div class="input-data">
                <td><input type="text" name="username" placeholder="username" id="username"></td>
                <br>
                <br>
                <td><input type="password" name="password" placeholder="password" id="username"></td>
                <br>
                <div class="background"></div>    
                <td><a href="dashboard.php" ><button class="button" type="submit" name="login"> Login</button style="cursor: pointer;"></a></td>
            </div>
            </div>
        </form>
</body>
</html>