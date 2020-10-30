<?php

session_start();

if(!isset($_SESSION['id']) || !isset($_SESSION['lastname']) || !isset($_SESSION['firstname']) || !isset($_SESSION['email']) || !isset($_SESSION['username']) || !isset($_SESSION['passwordUsr']) || !isset($_SESSION['notif']))
{
    header('location: /camagru/index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/profile.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/camagru/public/pictures/logo_camagru.png" />
    <title>Profil - Camagru</title>
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
                <li class="other"><a href="/camagru/view/camera.php" class="other"><img id="camera" src="/camagru/public/pictures/camera_black.png" alt="Camera">Camera</a></li>
                <div class="border"></div>
                <li class="this"><a href="/camagru/view/profile.php" class="this"><img id="profile" src="/camagru/public/pictures/profile_red.png" alt="Profile">Profil</a></li>
                <div class="border"></div>
            </ul>
        </nav>
        <section>
            <p id="success"><?php if(!(empty($_SESSION['success']))) { echo $_SESSION['success']; } ?></p>
            <?php unset($_SESSION['success']); ?>
            <div id="profileInfo">
                <h1>Informations personelles</h1>
                <p id="expl">Informations d'utilisateur de votre compte Camagru</p>
                <div id="line1">
                    <p class="label">Nom</p>
                    <p id="lastname"><?php if(isset($_SESSION['lastname'])){ echo $_SESSION['lastname']; } ?></p>
                </div>
                <div class="lines"></div>
                <div class="lineOther">
                    <p class="label">Prénom</p>
                    <p id="firstname"><?php if(isset($_SESSION['firstname'])){ echo $_SESSION['firstname']; } ?></p>
                </div>
                <div class="lines"></div>
                <div class="lineOther">
                    <p class="label">Nom d'utilisateur</p>                
                    <p id="pseudo"><?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?></p>
                </div>
                <div class="lines"></div>
                <div class="lineOther">
                    <p class="label">E-mail</p>                
                    <p id="email"><?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; } ?></p>
                </div>
                <div class="lines"></div>
                <div id="lineLast">
                    <p class="label">Notification<br/>de commentaire</p>
                    <div id="radioAyn">
                        <div id="activated">
                            <?php if(isset($_SESSION['notif'])){ if($_SESSION['notif'] == TRUE) { ?>
                            <img class="check" src="/camagru/public/pictures/check_green.png" alt="OK">
                            <?php } ?>
                            <p class="labelRadio">Activée</p>
                        </div>
                        <div id="deactivated">
                            <?php if($_SESSION['notif'] == FALSE) { ?>
                            <img class="check" src="/camagru/public/pictures/check_red.png" alt="OK">
                            <?php } } ?>
                            <p class="labelRadio">Désactivée</p>
                        </div>
                    </div>
                </div>
                <div class="lines"></div>
                    <div id="butt">
                        <a href="/camagru/view/pswrd_modification.php" id="marginA1">
                            <div id="buttOne1">
                                <img id="lock" src="/camagru/public/pictures/lock.png">
                                <p id="buttOne2">Modifier mon mot de passe</p>
                            </div>
                        </a>
                        <a href="/camagru/view/info_modification.php" id="marginA2">
                            <div id="buttTwo1">
                                <img id="settings" src="/camagru/public/pictures/settings.png">
                                <p id="buttTwo2">Modifier mes infos personelles</p>
                            </div>
                        </a>
                    </div>
                    <div>
                    <a id="delete" href="/camagru/view/account_deletion.php">
                        <img id="trash" src="/camagru/public/pictures/delete.png">
                        <p id="dlt">Supprimer mon compte</p>
                    </a>
                    </div>
                </div>
            </section>
        <?php include("includes/footer.php") ?>
    </div>
</body>
</html>