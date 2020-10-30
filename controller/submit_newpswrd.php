<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['submit_new_pswrd']))
    {
        if(!(empty($_POST['old_pswrd']))) $old_pswrd = htmlspecialchars($_POST['old_pswrd']);
        if(!(empty($_POST['new_pswrd']))) $new_pswrd = htmlspecialchars($_POST['new_pswrd']);
        if(!(empty($_POST['confirm_pswrd']))) $confirm_pswrd = htmlspecialchars($_POST['confirm_pswrd']);

        if(!(empty($_POST['old_pswrd'])) && !(empty($_POST['new_pswrd'])) && !(empty($_POST['confirm_pswrd'])))
        {
            $pswrdVerif = pswrd_ctrl(strtolower($_SESSION['username']));
            $pswrdPass = password_verify($old_pswrd, $pswrdVerif[0]);
            if($pswrdPass === TRUE)
            {
                if(preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9\W]).{6,255}$#", $new_pswrd))
                {
                    if($new_pswrd == $confirm_pswrd)
                    {
                        $new_pswrd = password_hash($new_pswrd, PASSWORD_BCRYPT);
                        replacePswrd($new_pswrd, strtolower($_SESSION['username']));
                        $_SESSION['success'] = "Votre mot de passe a bien été modifié !";
                        header('location: /camagru/view/profile.php');
                        exit;
                    }
                    else
                    {
                        $error_password4 = "Les 2 mots de passe ne correspondent pas";
                    }
                }
                else
                {
                    $error_password3 = "Le mot de passe doit au moins contenir 1 majuscule, 1 miniscule, 1 chiffre et/ou 1 caractère spécial (6 caractères min. 255 max.)";
                }
            }
            else
            {
                $error_password2 = "Le mot de passe ne correspond pas à votre mot de passe actuel";
            }
        }
        else
        {
            $error_password1 = "Tous les champs doivent être complétés !";
        }
    }
}

?>