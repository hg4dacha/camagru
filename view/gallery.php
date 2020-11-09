<?php

session_start();

if(!isset($_SESSION['id']) || !isset($_SESSION['lastname']) || !isset($_SESSION['firstname']) || !isset($_SESSION['email']) || !isset($_SESSION['username']) || !isset($_SESSION['passwordUsr']) || !isset($_SESSION['notif']))
{
    header('location: /camagru/index.php');
}

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/gallery_management.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/gallery.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../public/pictures/logo_camagru.png" />
    <title>Galerie - Camagru</title>
</head>
<body>
    <div id="contenu">
        <?php include("includes/header.php") ?>
        <nav>
            <ul>
                <li class="first"><a href="/camagru/view/home.php" class="first"><img id="home" src="/camagru/public/pictures/home_black.png" alt="Acceuil">Acceuil</a></li>
                <div class="border"></div>
                <li class="this"><a href="/camagru/view/gallery.php" class="this"><img id="gallery" src="/camagru/public/pictures/gallery_red.png" alt="Galerie">Galerie</a></li>
                <div class="border"></div>
                <li class="other"><a href="/camagru/view/camera.php" class="other"><img id="camera" src="/camagru/public/pictures/camera_black.png" alt="Camera">Camera</a></li>
                <div class="border"></div>
                <li class="other"><a href="/camagru/view/profile.php" class="other"><img id="profile" src="/camagru/public/pictures/profile_black.png" alt="Profile">Profil</a></li>
                <div class="border"></div>
            </ul>
        </nav>
        <section>

        <h1 id="pictures-tittle">Ma galerie</h1>
        <div id="pictures-div">
            <?php
                foreach($pictures as $pict) { ?>
                    <div class="picture-div">
                        <img class="user-pictures" id="<?= $pict['picture_id'] ?>" src="<?= $pict['picture_path'] ?>" alt="image">
                        <img class="delete-img" src="/camagru/public/pictures/delete.png" alt="delete">
                    </div>
                <?php
                }
            ?>
        </div>

        </section>
        <?php include("includes/footer.php") ?>
    </div>
</body>
</html>