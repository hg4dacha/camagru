<?php

session_start();

if(!isset($_SESSION['id']) || !isset($_SESSION['lastname']) || !isset($_SESSION['firstname']) || !isset($_SESSION['email']) || !isset($_SESSION['username']) || !isset($_SESSION['passwordUsr']) || !isset($_SESSION['notif']))
{
    header('location: /camagru/index.php');
}

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/submit_newpswrd.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/pswrd_modification.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/camagru/public/pictures/logo_camagru.png" />
    <title>Modification du mot de passe - Camagru</title>
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
                <li class="other"><a href="/camagru/view/profile.php" class="other"><img id="profile" src="/camagru/public/pictures/profile_black.png" alt="Profile">Profil</a></li>
                <div class="border"></div>
            </ul>
        </nav>
        <section>
            <div id="profileInfo">
                <h1>Modification du mot de passe</h1>
                <p id="expl">Insérez les informations relatives à vos mots de passe</p>
                <form method="post" action="pswrd_modification.php">
                    <div id="formBloc">
                        <div id="lineBlocTh">
                            <label for="pseudo" id="thLabel">Mot de passe actuel</label>                
                            <div class="columnWidth">
                                <input type="password" name="old_pswrd" id="firstLine" autofocus value="<?php if(isset($old_pswrd)) { echo $old_pswrd; } ?>">
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                        </div>
                        <small id="error"><?php if(isset($error_password2)) { echo $error_password2; } ?></small>
                        <div class="lineBlocOth">
                            <label for="email">Nouveau mot de passe</label>                
                            <div class="columnWidth">
                                <input type="password" name="new_pswrd" id="secondLine" value="<?php if(isset($new_pswrd)) { echo $new_pswrd; } ?>">
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                        </div>
                        <small id="error"><?php if(isset($error_password3)) { echo $error_password3; } ?></small>
                        <div class="lineBlocOth">
                                <label for="notif">Confirmez le nouveau<br/>mot de passe</label>
                                <div class="columnWidth">
                                    <input type="password" name="confirm_pswrd" id="thirdLine" value="<?php if(isset($confirm_pswrd)) { echo $confirm_pswrd; } ?>">
                                    <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                                </div>
                        </div>
                        <small id="error"><?php if(isset($error_password4)) { echo $error_password4; } ?></small>
                    </div>
                    <div id="butt">
                        <small id="error01"><?php if(isset($error_password1)) { echo $error_password1; } ?></small>
                        <div>
                            <button id="buttone" type="submit" name="submit_new_pswrd"><img id="lock" src="/camagru/public/pictures/lock.png">Réinitialiser le mot de passe</button>
                            <a href="/camagru/view/home.php">
                                <p id="retHome">Retour à l'acceuil</p>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <?php include("includes/footer.php") ?>
    </div>
</body>
</html>