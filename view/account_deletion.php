<?php

session_start();

if(!isset($_SESSION['id']) || !isset($_SESSION['lastname']) || !isset($_SESSION['firstname']) || !isset($_SESSION['email']) || !isset($_SESSION['username']) || !isset($_SESSION['passwordUsr']) || !isset($_SESSION['notif']))
{
    header('location: /camagru/index.php');
}

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/submit_deletion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/account_deletion.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/camagru/public/pictures/logo_camagru.png" />
    <title>Supression de compte - Camagru</title>
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
                <h1>Supression de votre compte</h1>
                <p id="expl">Insérez votre e-mail suivi de votre mot de passe</p>
                <form method="post" action="account_deletion.php">
                    <p id="warning"><?php if(isset($_SESSION['username']))
                    {
                        $username = ucfirst(strtolower($_SESSION['username']));
                        echo $username;
                    } ?>, êtes-vous sûr(e) de vouloir supprimer votre compte Camagru ?<br>
                    La suppression de votre compte va supprimer vos informations de compte<br>
                    et la totalité de vos photos. Cette action est irréversible.<br>
                </p>
                    <div id="formBloc">
                        <div id="lineBlocTh">
                            <label for="pseudo" id="thLabel">E-mail</label>                
                            <div class="columnWidth">
                                <input type="email" name="email_usr" id="firstLine" placeholder="Saisissez votre e-mail" value="<?php if(isset($email_usr)) { echo $email_usr; } ?>">
                            </div>
                        </div>
                        <small class="error"><?php if(isset($error02)) { echo $error02; } ?></small>
                        <div class="lineBlocOth">
                            <label for="email">Mot de passe</label>                
                            <div class="columnWidth">
                                <input type="password" name="pswrd_usr" id="secondLine" placeholder="Saisissez votre mot de passe" value="<?php if(isset($pswrd_usr)) { echo $pswrd_usr; } ?>">
                            </div>
                        </div>
                        <small class="error"><?php if(isset($error03)) { echo $error03; } ?></small>
                    </div>
                    <div id="butt">
                        <small id="error01"><?php if(isset($error01)) { echo $error01; } ?></small>
                        <div>
                            <button id="buttone" type="submit" name="submit_deletion"><img id="lock" src="/camagru/public/pictures/trash.png">Supprimer définitivement mon compte</button>
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