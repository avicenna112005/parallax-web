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
        .all
        
        img {
            width: 500px;
            height: 700px;
            position: relative;
            float: right;
            margin-right: 10px ;
            margin-top: 10px ;
            margin-bottom: 10px;
            border-radius: 15px;

        }
        .judul1{
            position: relative;
            top: 130px;
            left:555px;

        }
        .garis{
            border: 0.1px solid black;
            width: 125px;  
            position: absolute; 
        }
        .heading{
            position: relative;
            top: 180px;
            left: 463px; 
        }
     
        input{
            position: relative;
            top: 200px;
            left: 260px;
            width: 300px;
            height: 40px;
            border-radius: 15px;
            align-items: center;
            padding-left:  10px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.51);
            border-color: transparent;
            background-color: #D9D9D9;
        }
        h5{
            margin-top: 10px;
        }
        .input-data{
            margin-top: 50px;
            margin-left: 200px;
            align-items: center;
            
        }
        .button{
            background-color: #434CE7;
            position: relative;
            top: -100px;
            left: 260px;
            width: 100px;
            border-radius: 15px;
            height: 40px;
            border: none;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.51);
            border-color: transparent;
        }
        .background{
            height: 500px;
            width: 400px;
            background-color:rgb(201, 200, 200);
            margin-left: 220px;
            margin-top: -170px;
            border-radius: 15px;
        }
    </style>
</head>
<body>
    <!-- image -->
    <div class="all"> 
        <form action="" method="post">
            <div class="judul1">
                <h3>DistrictTrends</h3>
                <div class="garis"></div>
            </div>
            <div class="heading">
                <h4>Admin Dashboard</h4>
                <h1>Login</h1>
                <h5>You need to login first to access dashboard</h5>
                <a href="signinpage.php" style="position: absolute; left: 0px; top:95px;">Sign In</a>
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
        </form>
    </div>
</body>
</html>