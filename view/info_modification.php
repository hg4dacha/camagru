<?php

session_start();

if(!isset($_SESSION['id']) || !isset($_SESSION['lastname']) || !isset($_SESSION['firstname']) || !isset($_SESSION['email']) || !isset($_SESSION['username']) || !isset($_SESSION['passwordUsr']) || !isset($_SESSION['notif']))
{
    header('location: /camagru/index.php');
}

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/submit_newinfo.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/info_modification.css" />
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
                <h1>Modification des informations personelles</h1>
                <p id="expl">Insérez de nouvelles informations dans les champs que vous souhaitez modifier</p>
                <form method="post" action="info_modification.php">
                    <div id="formBloc">
                        <div id="lineBlocTh">
                            <label for="pseudo">Nom</label>                
                            <div class="columnWidth">
                                <input type="text" id="firstLine" name="usr_lastname"
                                value="<?php
                                            if(isset($usr_lastname))
                                            {
                                                echo $usr_lastname;
                                            }
                                            else
                                            {
                                                if(isset($_SESSION['lastname']))
                                                {
                                                    echo $_SESSION['lastname'];
                                                }
                                            }
                                        ?>" autofocus>
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                            <small id="error"><?php if(isset($error_lastname)) { echo $error_lastname; } ?></small>
                        </div>
                        <div class="lineBlocOth">
                            <label for="email">Prénom</label>                
                            <div class="columnWidth">
                                <input type="text" id="secondLine" name="usr_firstname"
                                value="<?php
                                            if(isset($usr_firstname))
                                            {
                                                echo $usr_firstname;
                                            }
                                            else
                                            {
                                                if(isset($_SESSION['firstname']))
                                                {
                                                    echo $_SESSION['firstname'];
                                                }
                                            }
                                        ?>">
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                            <small id="error"><?php if(isset($error_firstname)) { echo $error_firstname; } ?></small>
                        </div>
                        <div class="lineBlocOth">
                            <label for="notif">Nom d'utilisateur</label>
                            <div class="columnWidth">
                                <input type="text" id="thirdLine" name="usr_username"
                                value="<?php
                                            if(isset($usr_username))
                                            {
                                                echo $usr_username;
                                            }
                                            else
                                            {
                                                if(isset($_SESSION['username']))
                                                {
                                                    echo $_SESSION['username'];
                                                }
                                            }
                                        ?>">
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                            <small id="error"><?php if(isset($error_username)) { echo $error_username; } ?></small>
                        </div>
                        <small id="comment1">Le nom d'utilisateur est unique, si vous le changez, l'ancien nom pourra être adopté<br/>par d'autres utilisateurs.</small>
                        <div class="lineBlocOth">
                            <label for="notif">E-mail</label>
                            <div class="columnWidth">
                                <input type="email" id="fourthLine" name="usr_email"
                                value="<?php
                                            if(isset($usr_email))
                                            {
                                                echo $usr_email;
                                            }
                                            else
                                            {
                                                if(isset($_SESSION['email']))
                                                {
                                                    echo $_SESSION['email'];
                                                }
                                            }
                                        ?>">
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                            <small id="error"><?php if(isset($error_email)) { echo $error_email; } ?></small>
                        </div>
                        <div class="lineBlocOth">
                            <p id="notifComm">Notification de commentaire</p>
                            <div id="radioAyn">
                                <input id="yes" type="radio" name="notific" value="yes"
                                <?php if((isset($_SESSION['notif']) && $_SESSION['notif'] == TRUE && empty($notific)) || (!empty($notific) && $notific == "yes")) { ?> checked="checked"<?php } ?>/>
                                <label class="labelRadio" for="yes">Activée</label>
                                <input id="no" type="radio" name="notific" value="no"
                                <?php if((isset($_SESSION['notif']) && $_SESSION['notif'] == FALSE && empty($notific)) || (!empty($notific) && $notific == "no")) { ?> checked="checked"<?php } ?>/>
                                <label class="labelRadio" for="no">Désactivée</label>
                            </div>
                        </div>
                        <small id="comment2">Recevez un e-mail lorsqu'une de vos photos est commentée par un autre utilisateur.</small>
                    </div>
                    <div id="butt">
                        <div>
                            <button id="buttone" type="submit" name="submit_new_info"><img id="sttings" src="/camagru/public/pictures/settings.png">Actualiser mes informations</button>
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