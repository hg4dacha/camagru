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

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/controller/submit_inscription.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/inscription.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/camagru/public/pictures/logo_camagru.png" />
    <title>Inscription - Camagru</title>
</head>
<body>
    <div id="contenu">
        <div id="on_frame">
            <div id="frame">
                <img id="logo" src="../public/pictures/Camagru.png" alt="logo"/>    
                <p id="phrase">Inscrivez-vous pour pouvoir commenter,<br/>
                liker ou poster des images.</p>
                <form method="post" action="/camagru/view/inscription.php">
                    <input type="text" name="lastname" id="lastname"
                    placeholder="Nom" 
                    size="30" maxlength="250" value="<?php if(isset($lastname)) { echo $lastname; } ?>"/>
                    <small class="error"><?php if(isset($error_lastname)) { echo $error_lastname; } ?></small>
                    <input class="row" type="text" name="firstname" id="firstname"
                    placeholder="Prénom" 
                    size="30" maxlength="250" value="<?php if(isset($firstname)) { echo $firstname; } ?>"/>
                    <small class="error"><?php if(isset($error_firstname)) { echo $error_firstname; } ?></small>
                    <input class="row" type="email" name="email" id="email"
                    placeholder="Adresse e-mail" 
                    size="30" maxlength="250" value="<?php if(isset($email)) { echo $email; } ?>"/>
                    <small class="error"><?php if(isset($error_email)) { echo $error_email; } ?></small>
                    <input class="row" type="text" name="username" id="username"
                    placeholder="Nom d'utilisateur" 
                    size="30" maxlength="250" value="<?php if(isset($username)) { echo $username; } ?>"/>
                    <small class="error"><?php if(isset($error_username)) { echo $error_username; } ?></small>
                    <?php if(isset($error_username) && !isset($error_password)) { ?>
                        <script> 
                            if (screen.width <= 600) {
                                document.querySelector('#frame').style.height = '665px';
                            } else {
                                document.querySelector('#frame').style.height = '730px';
                            }
                        </script>
                    <?php } ?>
                    <input class="row" type="password" name="password" id="password"
                    placeholder="Mot de passe" size="30" maxlength="250"/>
                    <small class="error"><?php if(isset($error_password)) { echo $error_password; } ?></small>
                    <?php if(isset($error_password) && !isset($error_username)) { ?>
                        <script> 
                            if (screen.width <= 600) {
                                document.querySelector('#frame').style.height = '665px';
                            } else {
                                document.querySelector('#frame').style.height = '730px';
                            }
                        </script>
                    <?php } ?>
                    <?php if(isset($error_password) && isset($error_username)) { ?>
                        <script> 
                            if (screen.width <= 600) {
                                document.querySelector('#frame').style.height = '705px';
                            } else {
                                document.querySelector('#frame').style.height = '770px';
                            }
                        </script>
                    <?php } ?>
                    <input class="row" type="password" name="password2" id="password2"
                    placeholder="Confirmez le mot de passe" size="30" maxlength="250"/>
                    <small class="error"><?php if(isset($error_password2)) { echo $error_password2; } ?></small>
                    <button type="submit" name="submit_inscription">S'inscrire</button>
                    <p>Vous avez déjà un compte ? <a href="../index.php">Connectez-vous</a></p>
                    <p id="error2">
                        <?php
                        if (isset($error))
                        {
                            echo $error;
                        }
                        ?>
                    </p>
                </form>
            </div>
        </div>
        <footer>
            <p id="rights">© <?= date('Y'); ?> CAMAGRU BY HG4DACHA</p>
        </footer>
    </div>
</body>
</html>