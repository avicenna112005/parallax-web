<?php 
include 'conn.php';
$id_berita = $_GET['id_berita'];
$sql = "SELECT * FROM berita WHERE id_berita = '$id_berita'";
$query = mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'berita.css';?>
    </style>
    <title>DistinctTrends</title>


    <!-- font pacifico-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <!--font lora -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Pacifico&display=swap" rel="stylesheet">

</head>
<body>
<nav class="container">
        <!-- navbar -->
        <div class= navbar>
            <p>DistinctTrends</p>
            <div class="nav-link">
                <div><a href="inde.php">Home</a></div>
                <div><a href="http://">Brand</a></div>
                <div><a href="about.php">About</a></div>
                <div><a href="http://">Contact</a></div>
            </div>
        </div>

    </nav>
    <section>
        <div class="title">
            <h1 id="judul"><?= $value['judul']?></h1>
        </div>
        <center>    
            <div class="imagediv">
                <img src="image/<?= $value['gambar']?>" alt="">
            </div>
        </center>
        <p id="capt">Uploaded in <?= $value ['tanggal_upload']?></p>
        <div class="isi">
            <h2><?= $value['headline']?></h2>
            <div class="para1">
                <p><?= $value['isi1']?></p>
            </div>
            <h2><?= $value['subjudul']?></h2>
            <div class="para2">
                <p><?= $value['isi2']?></p>
            </div>
        </div>
    </section>
    <footer class="footer">
        <p style="color: #fff;">DistinctTrends</p>
        <div class="border1"></div>
        <div class="foot-link">
            <ul>
                <li>
                    <a href="">English</a>
                </li>
                <li>
                    <a href="">Contact</a>
                </li>
                <li>
                    <a href="">Stores</a>
                </li>
                <li>
                    <a href="">Apps</a>
                </li>
                <li>
                    <a href="">Follow Us</a>
                </li>
                <li>
                    <a href="">Legal & Privacy</a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
                <li>
                    <a href="">Sitemap</a>
                </li>
            </ul>
        </div>
    </footer>
</body>
</html>