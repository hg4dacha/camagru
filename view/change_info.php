<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/change_info.css" />
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
                <form method="post" action="inscription.php">
                    <div id="formBloc">
                        <div id="lineBlocTh">
                            <label for="pseudo">Nom</label>                
                            <div class="columnWidth">
                                <input type="text" id="firstLine" value="Gaddacha" autofocus>
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                        </div>
                        <div class="lineBlocOth">
                            <label for="email">Prénom</label>                
                            <div class="columnWidth">
                                <input type="text" id="secondLine" value="Onss">
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                        </div>
                        <div class="lineBlocOth">
                            <label for="notif">Nom d'utilisateur</label>
                            <div class="columnWidth">
                                <input type="text" id="thirdLine" value="User-93400">
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                        </div>
                        <small id="comment1">Le nom d'utilisateur est unique, si vous le changez, l'ancien nom pourra être adopté<br/>par d'autres utilisateurs.</small>
                        <div class="lineBlocOth">
                            <label for="notif">E-mail</label>
                            <div class="columnWidth">
                                <input type="text" id="fourthLine" value="e-mail@exemple.com">
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                        </div>
                        <div class="lineBlocOth">
                            <p id="notifComm">Notification de commentaire</p>
                            <div id="radioAyn">
                                <input id="yes" type="radio" name="notif" value="yes" checked/>
                                <label class="labelRadio" for="yes">Activée</label>
                                <input id="no" type="radio" name="notif" value="no">
                                <label class="labelRadio" for="no">Désactivée</label>
                            </div>
                        </div>
                        <small id="comment2">Recevez un e-mail lorsqu'une de vos photos est commentée par un autre utilisateur.</small>
                    </div>
                    <div id="butt">
                        <a href="/camagru/view/change_password.html">
                            <div id="buttOne1">
                                <img id="lock" src="/camagru/public/pictures/lock.png">
                                <p id="buttOne2">Actualiser mes informations</p>
                            </div>
                        </a>
                        <a href="/camagru/view/home.php">
                            <p id="retHome">Retour à l'acceuil</p>
                        </a>
                    </div>
                </form>
            </div>
        </section>
        <?php include("includes/footer.php") ?>
    </div>
</body>
</html>