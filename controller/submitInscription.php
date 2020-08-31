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
    
                    $emailExist = MailCheckExist($email);
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
                        insertMbr($lastname, $firstname, $email, $username, $password, $notif);
                        $keyUsr = mt_rand(10000, 1000000).uniqid().mt_rand(10000, 1000000);
                        $subject = "Confirmation de création de votre compte.";
                        $body = "<img src=\"cid:logo\" alt=\"logo\"></br>".$username.", plus q'une étape pour finaliser votre inscription !</br>Cliquez <a href=\"http://localhost:8080/camagru/index.php\"><b>ici</b></a> et connectez-vous.</br></br></br></br>_____________________________</br>© 2020 CAMAGRU BY HG4DACHA</br>*********Tous droits réservés*********";
                        sendmail($email, $subject, $body);
                        $_SESSION['messVald'] = "Votre compte a bien été crée.</br>Un email de validation vous a été envoyé.";
                        // header('location: /camagru/index.php');
                        // exit;
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