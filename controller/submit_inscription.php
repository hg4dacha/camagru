<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/mailFunction.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['submit_inscription']))
    {
        if(!(empty($_POST['lastname']))) $lastname = htmlspecialchars($_POST['lastname']);
        if(!(empty($_POST['firstname']))) $firstname = htmlspecialchars($_POST['firstname']);
        if(!(empty($_POST['email']))) $email = htmlspecialchars($_POST['email']);
        if(!(empty($_POST['username']))) $username = htmlspecialchars($_POST['username']);
        if(!(empty($_POST['password']))) $password = htmlspecialchars($_POST['password']);
        if(!(empty($_POST['password2']))) $password2 = htmlspecialchars($_POST['password2']);

        if(!(empty($_POST['lastname'])) && !(empty($_POST['firstname'])) && !(empty($_POST['email'])) && !(empty($_POST['username'])) && !(empty($_POST['password'])) && !(empty($_POST['password2'])))
        {
            $error_lastname = NULL;
            $error_firstname = NULL;
            $error_email = NULL;
            $error_username = NULL;
            $error_password = NULL;
            $error_password2 = NULL;
            $error = NULL;

            if(!(preg_match("#^.{1,30}$#", $lastname)))
            {
                $error_lastname = "Le nom doit contenir 30 caractères maximum.";
            }
            if(!(preg_match("#^.{1,30}$#", $firstname)))
            {
                $error_firstname = "Le prénom doit contenir 30 caractères maximum.";
            }
            if(!(filter_var($email, FILTER_VALIDATE_EMAIL)) || !(preg_match("#^.{5,254}$#", $email)))
            {
                $error_email = "L'adresse e-mail n'est pas valide.";
            }
            if(!(preg_match("#^[a-zA-Z0-9._-]{1,15}$#", $username)))
            {
                $error_username = "Le nom d’utilisateur ne peut contenir que des lettres (sans accents), des chiffres, des tirets et des points. (Pas d'espaces | 15 caractères max.)";
            }
            if(!(preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9\W]).{6,255}$#", $password)))
            {
                $error_password = "Le mot de passe doit au moins contenir 1 majuscule, 1 miniscule, 1 chiffre et/ou 1 caractère spécial (6 caractères min. 255 max.)";
            }
            
            if(empty($error_lastname) && empty($error_firstname) && empty($error_email) && empty($error_username) && empty($error_password) && empty($error))
            {
                if($password == $password2)
                {
                    $usernameExist = UsrCheckExist(strtolower($username));
                    if($usernameExist != 0)
                    {
                        $error_username = "Le nom d'utilisateur est déjà utilisé. Veuillez insérer un autre nom d'utilisateur.";
                    }
    
                    $emailExist = MailCheckExist(strtolower($email));
                    if($emailExist != 0)
                    {
                        $error_email = "L'adresse e-mail est déjà utilisée. Veuillez insérer une autre adresse e-mail.";
                    }
    
                    if(empty($error_username) && empty($error_email))
                    {
                        $lastname = ucfirst(strtolower($lastname));
                        $firstname = ucfirst(strtolower($firstname));
                        $email = strtolower($email);
                        $password = password_hash($password, PASSWORD_BCRYPT);
                        $notif = TRUE;
                        $keyUsr = random_int(9547114, 735620051642661202).uniqid().random_int(635418, 866261402008688409);
                        $tokenUsr = FALSE;
                        $idCTRL = uniqid().random_int(55197, 9976834851452);
                        $subject = "Confirmation de création de votre compte.";
                        $body = "
                        <img src=\"cid:logo\" alt=\"logo\" style=\"display:block;margin-left:auto;margin-right:auto;width:30%;\">
                        <br><br>
                        <p style=\"color:#1e272e;font-weight:bold;font-size:17px;border:0;\">".$username.", plus qu'une étape pour finaliser votre inscription !
                        <br>
                        Cliquez sur le lien ci-dessous et validez votre compte pour<br>vous connectez avec votre identifiant et votre mot de passe.
                        <br>
                        <a style=\"color:#0095f6\" href=\"http://localhost:8080/camagru/controller/registr_confirm.php?idCTRL=".urlencode($idCTRL)."&amp;usn=".urlencode($username)."&amp;keyID=".urlencode($keyUsr)."\">>>>>>Je valide mon compte et je finalise mon inscription<<<<<</a>
                        </p>
                        <br><br><br><br>
                        <p style=\"color:#b33939;font-weight:bold;font-size:13px;border:0;\">_____________________________
                        <br>
                        © 2020 CAMAGRU BY HG4DACHA
                        <br>
                        ********Tous droits réservés********
                        </p>";
                        sendmail($email, $subject, $body, NULL);
                        insertMbr($lastname, $firstname, $email, $username, $password, $notif, $keyUsr, $tokenUsr, $idCTRL);
                        $_SESSION['messVald'] = "Votre compte a bien été crée.</br>Un email de validation vous a été envoyé.";
                        header('location: /camagru/index.php');
                        exit;
                    }
                }
                else
                {
                    $error_password2 = "Les mots de passe ne correspondent pas";
                }

            }
        }
        else
        {
            $error = "Tous les champs doivent être complétés !";
        }
    }
}

?>