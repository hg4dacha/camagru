<?php

session_start();

// if(isset($_SESSION['pass']))
// {
//     unset($_SESSION['pass']);
// }
// else
// {
//     header('location: /camagru/index.php');
//     exit;
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/camagru/public/css/newPsswrd_define.css" />
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
                <form method="post" action="newPsswrd_define.php">
                    <input id="email" type="password" name="password1" id="email"
                    placeholder="Entrez un nouveau mot de passe" 
                    size="30" maxlength="255"
                    value="<?php if(isset($password1)) { echo $password1; } ?>"/>
                    <input id="email" type="password" name="password2" id="email"
                    placeholder="Confirmez le mot de passe" 
                    size="30" maxlength="255"
                    value="<?php if(isset($password2)) { echo $password2; } ?>"/>
                    <button type="submit">Réinitialiser le mot de passe</button>
                    <p><a href="../index.php">Annuler</a></p>
                </form>
            </div>
        </div>
        <footer>
            <p id="rights">© 2020 CAMAGRU BY HG4DACHA</p>
        </footer>
    </div>
</body>
</html>