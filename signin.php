<?php 
require 'function.php';
require 'conn.php';

if (isset($_POST["register"])) {
    if(register($_POST) > 0 ){
        header("Location: dashboard.php");
    }else{
        echo mysqli_error($conn);
    }
}
?>