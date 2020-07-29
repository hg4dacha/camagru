<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/change_password.css" />
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
                <form method="post" action="inscription.php">
                    <div id="formBloc">
                        <div id="lineBlocTh">
                            <label for="pseudo" id="thLabel">Mot de passe actuel</label>                
                            <div class="columnWidth">
                                <input type="password" id="firstLine" autofocus>
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                        </div>
                        <div class="lineBlocOth">
                            <label for="email">Nouveau mot de passe</label>                
                            <div class="columnWidth">
                                <input type="password" id="secondLine">
                                <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                            </div>
                        </div>
                        <div class="lineBlocOth">
                                <label for="notif">Confirmez le nouveau<br/>mot de passe</label>
                                <div class="columnWidth">
                                    <input type="password" id="thirdLine">
                                    <img class="pen" src="/camagru/public/pictures/edit.png" alt="Edit">
                                </div>
                        </div>
                    </div>
                    <div id="butt">
                        <a href="/camagru/view/change_password.php">
                            <div id="buttOne1">
                                <img id="lock" src="/camagru/public/pictures/lock.png">
                                <p id="buttOne2">Réinitialiser le mot de passe</p>
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