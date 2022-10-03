<?php 
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistincTrends - About</title>
    <style>
        <?php include 'style.css'
    ?>
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?  family=Quicksand&display=swap" rel="stylesheet">
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
    <section class="section1">
        <a href=""><button>Discover The Exclusive & Unique Brand</button></a>
    </section>
    <section class="section2">
        <center>
            <p id="up">Explore various kinds of the latest fashion that is trending in the world.</p>
        </center>
        <div class="iklan">
            <?php 
            $i = 1;
            include 'conn.php';
            $sql = "SELECT * FROM produk_info ORDER BY id_produk DESC LIMIT 4";
            $query = mysqli_query($conn,$sql);
            while($value = mysqli_fetch_assoc($query)) :?>
            <div class="card">
                <div class="wrap">
                    <a href="">
                        <img src="image/<?= $value['gambar']?>" alt="">
                    </a>
                </div>
                <div class="bkus">
                    <a href="">
                        <p><?= $value['nama_produk']?></p>
                    </a>
                    <a href="">
                        <p style="margin-top: -15px;">Rp <?= $value['harga']?></p>
                    </a>
                </div>
            </div>
            <?php endwhile;?>
        <div class="btn">
            <a href=""><button>Discover More In Our Store</button></a>
        </div>
    </section>
    <section class="section3">
        <p id="story">Top Stories</p>             
        <div class="containernews">
            <?php 
            include 'conn.php';
            $sql = "SELECT * FROM berita ORDER BY id_berita DESC";
            $query = mysqli_query($conn,$sql);
            while($value = mysqli_fetch_assoc($query)):?>
            <div class="card">
                <div class="wrap">
                    <img src="image/<?=$value ['gambar'] ?>" alt="">
                </div>
                <div class="bkus">
                    <div class="batas">
                        <a href='berita.php?id_berita=<?=$value['id_berita']?>' ><?=$value ['judul'] ?></a>
                        <p style="margin-top: 20px;">Uploaded In <?=$value ['tanggal_upload'] ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
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
                    <a href="">Sitemap</a href="">
                </li>
            </ul>
        </div>
</footer>
</body>
</html>