<?php

session_start();

if(!isset($_SESSION['id']) || !isset($_SESSION['lastname']) || !isset($_SESSION['firstname']) || !isset($_SESSION['email']) || !isset($_SESSION['username']) || !isset($_SESSION['passwordUsr']) || !isset($_SESSION['notif']))
{
    header('location: /camagru/index.php');
}

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/picture_get.php");
require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/URL_current_page.php");

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
                <div id="usrname-and-likes">
                    <div>
                        <h1 id="picture-of">
                            <img id="logo-username" src="/camagru/public/pictures/logo-username.png" alt="logo-username">
                        <?= $usrName ?></h1>
                    </div>
                    <div id="likes-number">
                    <img id="likes-likes" src="/camagru/public/pictures/like02.png" alt="likes">
                    <p id="number-of-likes"><?php echo(checkNumbLikes($idPict)); ?></p>
                    </div>
                </div>
                <img id="<?= $idPict ?>" class="usr-image" src="<?= $picture['picture_path'] ?>" alt="Photo de <?= $usrName ?>">
                <div id="time-and-like">
                    <span id="time"><?=$picture['date_picture'].' - '.$picture['hour_picture'] ?></span>
                    <div id="liker-and-heart">
                        <p id="liker">J'aime</p>
                        <?php if (isset($_SESSION['id'])) {
                                $like_state = checkLike($_SESSION['id'], $idPict);
                                if ($like_state == 0) { ?>
                        <img id="heart" src="/camagru/public/pictures/like00.png" alt="like">
                        <?php   } else if ($like_state == 1) { ?>
                        <img id="heart" src="/camagru/public/pictures/like01.png" alt="like">
                        <?php   }
                            } ?>
                    </div>
                </div>
            </div>
            <form id="form-submit">
                <div id="form-div">
                    <label for="champs" id="comment-picture"><img id="comment-logo" src="/camagru/public/pictures/comments00.png" alt="commentaire">Commentez la photo !</label>
                    <textarea id="champs" name="comment" placeholder="Écrivez votre commentaire ici...  (250 caractères max.)" maxlength="250" required></textarea>
                    <button id="button">Poster</button>
                </div>
                <p id="success"></p>
            </form>
            <div id="users-comments">
                <h2 id="usrCom-tittle">Commentaires des utilisateurs<span id="number-of-com"><?php if ($numbComments > 0) { echo(' ('.$numbComments.')'); } ?></span> :</h2>
                <?php if ($comments == NULL) { ?>
                <p id="no-photo">Cette photo n'as pas encore de commentaires</p>
                <?php } else { ?>
                <div id="com-com">
                    <?php foreach($comments as $comm) { ?>
                        <div class="comment-div">
                            <div class="logo-user-div">
                                <img class="logo-username2" src="/camagru/public/pictures/logo-username2.png" alt="logo">
                                <h3 class="author-comm"><?php $autho_comment = idUsername($comm['author_id']); echo($autho_comment[0]); ?></h3>
                            </div>
                            <p class="comment_author"><?= $comm['comment'] ?></p>
                            <small class="comment-time"><?= $comm['date_comment'].' - '.$comm['hour_comment'] ?></small>
                        </div>
                    <?php } } ?>
                </div>
            </div>
        </section>
        <?php include("includes/footer.php") ?>
    </div>
    <script src="/camagru/public/js/picture.js"></script>
</body>
</html>