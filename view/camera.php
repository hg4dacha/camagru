<?php

session_start();

// if(!isset($_SESSION['id']) || !isset($_SESSION['lastname']) || !isset($_SESSION['firstname']) || !isset($_SESSION['email']) || !isset($_SESSION['username']) || !isset($_SESSION['passwordUsr']) || !isset($_SESSION['notif']))
// {
//     header('location: /camagru/index.php');
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/camera.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/camagru/public/pictures/logo_camagru.png" />
    <title>Camera - Camagru</title>
</head>
<body>
    <div id="contenu">
        <?php include("includes/header.php") ?>
        <nav>
            <ul>
                <li class="first"><a href="/camagru/view/home.php" class="first"><img id="home" src="/camagru/public/pictures/home_black.png" alt="Acceuil">Acceuil</a></li>
                <div class="border"></div>
                <li class="other"><a href="/camagru/view/gallery.php" class="other"><img id="gallery" src="/camagru/public/pictures/gallery_black.png" alt="Galerie">Galerie</a></li>
                <div class="border"></div>
                <li class="this"><a href="/camagru/view/camera.php" class="this"><img id="camera" src="/camagru/public/pictures/camera_red.png" alt="Camera">Camera</a></li>
                <div class="border"></div>
                <li class="other"><a href="/camagru/view/profile.php" class="other"><img id="profile" src="/camagru/public/pictures/profile_black.png" alt="Profile">Profil</a></li>
                <div class="border"></div>
            </ul>
        </nav>
        <section>
            <video id="video"></video>
            <button id="button-Cam">Activer la caméra</button>
            <button id="take-picture">Prendre en photo</button>
            <canvas id="canvas" width="640" height="480"></canvas>
            <p id="filters-tittle">Filtres</p>
            <ul id="filters-cont">
                <?php
                    
                    $pathDir = '../public/filters/';
                    $filtersArr = scandir($pathDir);
                    $i = 1;
                    foreach ($filtersArr as $filter){
                        $expArr = explode('.', $filter);
                        if ($expArr[1] == 'png') {
                ?>
                <li class="filters-png"><img onclick="add_filter('fltr<?= $i ?>');" id="fltr<?= $i ?>" class="filters-img" src='<?= $pathDir.$filter ?>'></li>
                <?php
                    $i++;
                        }
                    }
                ?>
            </ul>
        </section>
        <?php include("includes/footer.php") ?>
    </div>
    <script src="/camagru/public/js/camera.js"></script>
</body>
</html>