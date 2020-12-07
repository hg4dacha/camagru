<?php

session_start();

if(!isset($_SESSION['id']) || !isset($_SESSION['lastname']) || !isset($_SESSION['firstname']) || !isset($_SESSION['email']) || !isset($_SESSION['username']) || !isset($_SESSION['passwordUsr']) || !isset($_SESSION['notif']))
{
    header('location: /camagru/index.php');
}

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/users_pictures.php");
require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/URL_current_page.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/home.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../public/pictures/logo_camagru.png" />
    <title>Acceuil - Camagru</title>
</head>
<body>
    <div id="contenu">
        <?php include("includes/header.php") ?>
        <nav>
            <ul>
                <li class="this"><a href="/camagru/view/home.php" class="this"><img id="home" src="/camagru/public/pictures/home_red.png" alt="Acceuil">Acceuil</a></li>
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
            <div id="site-pictures">
                <h1 id="user-tittle">Photos des utilisateurs Camagru</h1>
                <div id="pictures-div">
                    <?php
                    foreach($pictures as $pict) { ?>
                        <div class="img-and-username">
                            <div class="picture-div">
                                <a class="pict-link" href="/camagru/view/picture.php?username=<?php $usrName = idUsername($pict['id_user']); echo($usrName[0]);?>&amp;pictureID=<?= urlencode($pict['picture_id']) ?>">
                                <img class="user-pictures" id="<?= $pict['picture_id'] ?>" src="<?= '/camagru/public/'.$pict['picture_path'] ?>" alt="image">
                                </a>
                            </div>
                            <div class="username-username">
                                <div class="user-2">
                                    <img class="logo-username" src="/camagru/public/pictures/logo-username.png" alt="logo-username">
                                    <span class="user-name"><?php $usrName = idUsername($pict['id_user']); echo($usrName[0]);?></span>
                                </div>
                                <div class="likes-and-comments">
                                    <?php if(isset($_SESSION['id'])) {
                                            $like_state = checkLike($_SESSION['id'], $pict['picture_id']);
                                            if ($like_state == 0) { ?>
                                    <img class="like" src="/camagru/public/pictures/like00.png" alt="like">
                                    <?php   } else if ($like_state == 1) { ?>
                                    <img class="like" src="/camagru/public/pictures/like01.png" alt="like">
                                    <?php   }
                                          }?>
                                    <a class="comment-url" href="<?= $url.'#big-bloc-comment' ?>">
                                        <img class="comments" src="/camagru/public/pictures/comments.png" alt="commentaires">
                                    </a>
                                </div>
                                <span class='time-picture'><?= $pict['date_picture'].' - <br class="time-br">'.$pict['hour_picture'] ?></span>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div id="number-div">
                    <?php
                        if ($picturesNmbr > 8) {
                            if ($currentPage == 1) {
                                echo ('<span class="number" id="this-arrow">«</span>');
                            }
                            else {
                                echo ('<a class="number" href="/camagru/view/home.php?page='.($currentPage - 1).'">«</a> ');
                            }
                            for ($i = 1; $i <= $totalPage; $i++) {
                                if ($i == $currentPage) {
                                    echo ('<span class="number" id="this-number">'.$i.'</span>');
                                }
                                else {
                                    echo ('<a class="number" href="/camagru/view/home.php?page='.$i.'">'.$i.'</a> ');
                                }
                            }
                            if ($currentPage == $totalPage) {
                                echo ('<span class="number">»</span>');
                            }
                            else {
                                echo ('<a class="number" href="/camagru/view/home.php?page='.($currentPage + 1).'">»</a> ');
                            }
                        }
                    ?>
                </div>
                <p id="success"></p>
            </div>
            <div id="big-bloc-comment">
                <span id="cancel">Annuler<img id="logo-cancel" src="/camagru/public/pictures/cancel.png" alt="Annuler"></span>
                <div id="bloc-comment">
                    <img id="" class="usr-img00" src="" alt="photo utilisateur">
                    <form id="form-submit">
                        <div id="form-div">
                            <textarea id="champs" name="comment" placeholder="Écrivez votre commentaire ici...  (250 caractères max.)" maxlength="250" required></textarea>
                            <button id="button" name="button" formmethod="post">Poster</button>
                        </div>
                    </form>
                </div>
                <p id="error-comment"></p>
            </div>
        </section>
        <?php include("includes/footer.php") ?>
    </div>
    <script src="/camagru/public/js/home.js"></script>
</body>
</html>