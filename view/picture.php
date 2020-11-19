<?php

session_start();

if(!isset($_SESSION['id']) || !isset($_SESSION['lastname']) || !isset($_SESSION['firstname']) || !isset($_SESSION['email']) || !isset($_SESSION['username']) || !isset($_SESSION['passwordUsr']) || !isset($_SESSION['notif']))
{
    header('location: /camagru/index.php');
}

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/picture_get.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/picture.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../public/pictures/logo_camagru.png" />
    <title>photo - Camagru</title>
</head>
<body>
    <div id="contenu">
        <?php include("includes/header.php") ?>
        <nav>
            <ul>
                <li class="this"><a href="/camagru/view/home.php" class="this"><img id="home" src="/camagru/public/pictures/home_black.png" alt="Acceuil">Acceuil</a></li>
                <div class="border"></div>
                <li class="other"><a href="/camagru/view/gallery.php" class="other"><img id="gallery" src="/camagru/public/pictures/gallery_black.png" alt="Galerie">Galerie</a></li>
                <div class="border"></div>
                <li class="other"><a href="/camagru/view/camera.php" class="other"><img id="camera" src="/camagru/public/pictures/camera_black.png" alt="Camera">Camera</a></li>
                <div class="border"></div>
                <li class="other"><a href="/camagru/view/profile.php" class="other"><img id="profile" src="/camagru/public/pictures/profile_black.png" alt="Profile">Profil</a></li>
                <div class="border"></div>
            </ul>
        </nav>
        <section>
            <div id="left">
                <h1 id="picture-of">
                    <img id="logo-username" src="/camagru/public/pictures/logo-username.png" alt="logo-username">
                <?= $usrName ?></h1>
                <img id="<?= $idPict ?>" class="usr-image" src="<?= $picture['picture_path'] ?>" alt="Photo de <?= $usrName ?>">
                <span id="time"><?=$picture['date_picture'].' - '.$picture['hour_picture'] ?></span>
            </div>
            <form method="action" action="/camagru/view/picture.php">
                <div id="form-div">
                    <label for="champs" id="comment-picture"><img id="comment-logo" src="/camagru/public/pictures/comments00.png" alt="commentaire">Commentez la photo !</label>
                    <textarea id="champs" name="comment" placeholder="Écrivez votre commentaire ici..."></textarea>
                    <button id="button">Poster</button>
                </div>
            </form>
        </section>
        <?php include("includes/footer.php") ?>
    </div>
    <script src="/camagru/public/js/home.js"></script>
</body>
</html>