<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['submit_rst_pswrd']))
    {
        if(!(empty($_POST['password1']))) $password1 = htmlspecialchars($_POST['password1']);
        if(!(empty($_POST['password2']))) $password2 = htmlspecialchars($_POST['password2']);

        if(!(empty($_POST['password1'])) && !(empty($_POST['password2'])))
        {
            if(preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9\W]).{6,255}$#", $password1))
            {
                if($password1 == $password2)
                {
                    $new_pswrd = password_hash($password1, PASSWORD_BCRYPT);
                    replacePswrd($new_pswrd, $_SESSION['idPASS']);
                    $_SESSION['messVald'] = "Votre mot de passe a été réinitialisé.";
                    header('location: /camagru/index.php');
                    exit;
                }
                else
                {
                    $error2 = "Les 2 mots de passe ne correspondent pas";
                }
            }
            else
            {
                $error1 = "Le mot de passe doit au moins contenir 1 majuscule, 1 miniscule, 1 chiffre et/ou 1 caractère spécial (6 caractères min. 255 max.)";
            }
        }
        else
        {
            $error3 = "Tous les champs doivent être complétés !";
        }
        
    }
}

?>