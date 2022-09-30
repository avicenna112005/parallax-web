<?php 
require 'function.php';
require 'conn.php';

if (isset($_POST["register"])) {
    if(register($_POST) > 0 ){
        echo "<script>
            alert('data succcess')
            document.href.location = 'signinpage.php'
        </script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>