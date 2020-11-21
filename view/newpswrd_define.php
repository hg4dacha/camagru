<?php

session_start();

if(!(isset($_SESSION['pass'])))
{
    header('location: /camagru/index.php');
    exit;
}

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/submit_rst_pswrd.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/newpswrd_define.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/camagru/public/pictures/logo_camagru.png" />
    <title>Réinitialiser le mot de passe - Camagru</title>
</head>
<body>
    <div id="contenu">
        <div id="on_frame">
            <div id="frame">
                <img id="logo" src="../public/pictures/Camagru.png" alt="logo"/>
                <img id="locked" src="../public/pictures/unlocked.png" alt="locked"/>    
                <p id="phrase">Saisissez un nouveau mot de passe,<br>
                vous pourrez ensuite vous connecter avec.</p>
                <form method="post" action="newpswrd_define.php">
                    <input id="password1" type="password" name="password1" id="email"
                    placeholder="Entrez un nouveau mot de passe" 
                    size="30" maxlength="255"
                    value="<?php if(isset($password1)) { echo $password1; } ?>"/>
                    <small class="error1"><?php if(isset($error1)) { echo $error1; } ?></small>
                    <input id="password2" type="password" name="password2" id="email"
                    placeholder="Confirmez le mot de passe" 
                    size="30" maxlength="255"
                    value="<?php if(isset($password2)) { echo $password2; } ?>"/>
                    <small class="error1"><?php if(isset($error2)) { echo $error2; } ?></small>
                    <button type="submit" name="submit_rst_pswrd">Réinitialiser le mot de passe</button>
                    <p><a href="../index.php">Annuler</a></p>
                    <small id="error2"><?php if(isset($error3)) { echo $error3; } ?></small>
                </form>
            </div>
        </div>
        <footer>
            <p id="rights">© <?= date('Y'); ?> CAMAGRU BY HG4DACHA</p>
        </footer>
    </div>
</body>
</html>