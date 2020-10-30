<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['submit_deletion']))
    {
        if(!(empty($_POST['email_usr']))) $email_usr = htmlspecialchars($_POST['email_usr']);
        if(!(empty($_POST['pswrd_usr']))) $pswrd_usr = htmlspecialchars($_POST['pswrd_usr']);

        $error = NULL;
        if(!(empty($_POST['email_usr'])) && !(empty($_POST['pswrd_usr'])))
        {
            $id_usr = NULL;
            if(isset($_SESSION['id']))
            {
                $id_usr = $_SESSION['id'];
            }
            $mail_recup = mail_recuperation($id_usr);
            $mail_recup = $mail_recup[0];
            if((filter_var($email_usr, FILTER_VALIDATE_EMAIL)) && ($email_usr == $mail_recup))
            {
                $pswrdVerif = pswrd_recuperation($id_usr);
                $pswrdVerif = $pswrdVerif[0];
                $pswrdPass = password_verify($pswrd_usr, $pswrdVerif);
                if($pswrdPass === TRUE)
                {
                    delete_usr($id_usr);
                    $_SESSION = array();
                    session_destroy();
                    session_start();
                    $_SESSION['messVald'] = "Votre compte a bien été supprimé.";
                    header("Location: /camagru/index.php");
                    exit;
                }
                else
                {
                    $error03 = "Le mot de passe ne correspond pas.";
                }
            }
            else
            {
                $error02 = "L'adresse e-mail n'est pas valide.";
            }
        }
        else
        {
            $error01 = "Tous les champs doivent être complétés !";
        }
    }
}

?>