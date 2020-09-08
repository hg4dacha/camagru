<?php

session_start();

if(!empty($_SESSION['id']) || !empty($_SESSION['lastname']) || !empty($_SESSION['firstname']) || !empty($_SESSION['email']) || !empty($_SESSION['username']) || !empty($_SESSION['passwordUsr']) || !empty($_SESSION['notif']))
{
    header('location: /camagru/view/home.php');
    exit;
}

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/connexion.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/index.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="public/pictures/logo_camagru.png" />
    <title>Camagru</title>
</head>
<body>
    <div id="contenu">
        <div id="central"> 
            <img id="poster" src="public/pictures/poster.png" alt="poster">
            <div id="bloc">
                <div id="connexion_frame">
                    <img id="logo" src="public/pictures/Camagru.png" alt="logo"/>    
                    <p id="phrase">Connectez-vous pour commenter,<br/>liker ou poster des images.</p>
                    <form method="post" action="index.php">
                        <input id="first" type="text" name="identification" id="identification"
                        placeholder="Adresse e-mail ou nom d'utilisateur" 
                        size="30" maxlength="75" value="<?php if(isset($identification)) { echo $identification; } ?>"/>
                        <input id="second" type="password" name="password" id="password"
                        placeholder="Mot de passe" size="30" maxlength="75" value="<?php if(isset($password)) { echo $password; } ?>"/>
                        <button type="submit" name="submit_connexion">Connexion</button>
                        <p><a id="f_pass" href="view/psswrd_forgot.php">Mot de passe oublié ?</a></p>
                        <p id="error">
                        <?php
                            if(isset($error))
                            {
                                echo $error;
                            }
                        ?>
                        </p>
                        <p id="messVald">
                        <?php
                            if(isset($_SESSION['messVald']))
                            {
                                echo $_SESSION['messVald'];
                                unset($_SESSION['messVald']);
                            }
                        ?>
                        </p>
                    </form>
                </div>
                <div id="inscription_frame">
                    <p id="inscription">Vous n'avez pas de compte ? <a href="view/inscription.php">Inscrivez-vous</a></p>
                </div>
            </div>
        </div>
        <footer>
            <p id="rights">© 2020 CAMAGRU BY HG4DACHA</p>
        </footer>
    </div>
</body>
</html>