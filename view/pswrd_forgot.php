<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/pswrd_rst_mail.php");

if(isset($_SESSION['id']) || isset($_SESSION['lastname']) || isset($_SESSION['firstname']) || isset($_SESSION['email']) || isset($_SESSION['username']) || isset($_SESSION['passwordUsr']) || isset($_SESSION['notif']))
{
    header('location: /camagru/view/home.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/psswrd_forgot.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/camagru/public/pictures/logo_camagru.png" />
    <title>Mot de passe oublié - Camagru</title>
</head>
<body>
    <div id="contenu">
        <div id="on_frame">
            <div id="frame">
                <img id="logo" src="../public/pictures/Camagru.png" alt="logo"/>
                <img id="locked" src="../public/pictures/locked.png" alt="locked"/>    
                <p id="phrase">Entrez votre adresse e-mail,
                vous recevrez<br/>un lien pour récuperer votre compte.</p>
                <form method="post" action="pswrd_forgot.php">
                    <input id="email" type="email" name="emailUsr" id="email"
                    placeholder="Entrez votre adresse e-mail"
                    size="30" maxlength="254" value="<?php if(isset($emailUsr)) { echo $emailUsr; } ?>"/>
                    <p id="error">
                        <?php
                            if(isset($error))
                            {
                                echo $error;
                            }
                        ?>
                    </p>
                    <button name="reset_email" type="submit">Envoyer un mail de réinitialisation</button>
                    <p><a href="../index.php">Revenir à l'écran de connexion</a></p>
                </form>
            </div>
        </div>
        <footer>
            <p id="rights">© <?= date('Y'); ?> CAMAGRU BY HG4DACHA</p>
        </footer>
    </div>
</body>
</html>