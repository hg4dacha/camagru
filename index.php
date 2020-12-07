<?php

session_start();

if(isset($_SESSION['id']) || isset($_SESSION['lastname']) || isset($_SESSION['firstname']) || isset($_SESSION['email']) || isset($_SESSION['username']) || isset($_SESSION['passwordUsr']) || isset($_SESSION['notif']))
{
    header('location: /camagru/view/home.php');
    exit;
}

if(isset($_SESSION['idPASS']))
{
    unset($_SESSION['idPASS']);
}
if(isset($_SESSION['pass']))
{
    unset($_SESSION['pass']);
}

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/connexion.php");
require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/users_pictures.php");

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
                        <p><a id="f_pass" href="view/pswrd_forgot.php">Mot de passe oublié ?</a></p>
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
        <div id="site-pictures">
            <h1 id="user-tittle">Photos des utilisateurs Camagru</h1>
            <div id="pictures-div">
                <?php
                foreach($pictures as $pict) { ?>
                    <div class="img-and-username">
                        <div class="picture-div">
                            <img class="user-pictures" id="<?= $pict['picture_id'] ?>" src="<?= '/camagru/public/'.$pict['picture_path'] ?>" alt="image">
                        </div>
                        <div class="username-username">
                            <div class="user-2">
                                <img class="logo-username" src="/camagru/public/pictures/logo-username.png" alt="logo-username">
                                <span class="user-name"><?php $usrName = idUsername($pict['id_user']); echo($usrName[0]);?></span>
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
                            echo ('<a class="number" href="/camagru/index.php?page='.($currentPage - 1).'#user-tittle">«</a> ');
                        }
                        for ($i = 1; $i <= $totalPage; $i++) {
                            if ($i == $currentPage) {
                                echo ('<span class="number" id="this-number">'.$i.'</span>');
                            }
                            else {
                                echo ('<a class="number" href="/camagru/index.php?page='.$i.'#user-tittle">'.$i.'</a> ');
                            }
                        }
                        if ($currentPage == $totalPage) {
                            echo ('<span class="number">»</span>');
                        }
                        else {
                            echo ('<a class="number" href="/camagru/index.php?page='.($currentPage + 1).'#user-tittle">»</a> ');
                        }
                    }
                ?>
            </div>
        </div>
        <footer>
            <p id="rights">© <?= date('Y'); ?> CAMAGRU BY HG4DACHA</p>
        </footer>
    </div>
</body>
</html>