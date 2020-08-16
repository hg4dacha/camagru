<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sql_functions.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['submit_connexion']))
    {
        if(!(empty($_POST['identification']))) $identification = htmlspecialchars($_POST['identification']);
        if(!(empty($_POST['password']))) $password = htmlspecialchars($_POST['password']);

        $error = NULL;
        if(!(empty($_POST['identification'])) && !(empty($_POST['password'])))
        {
            $usernameExist = UsrCheckExist(strtolower($identification));
            $emailExist = MailCheckExist(strtolower($identification));
            if($usernameExist != 0 || $emailExist != 0)
            {
                $identification = strtolower($identification);
                $pswrdVerif = pswrd_ctrlU(strtolower($identification));
                password_verify($password, $pswrdVerif);
                if($pswrdVerif === TRUE)
                {
                    $userinfo = recupUsrInfo($identification);
                    $_SESSION['id'] = $userinfo['id'];
                    $_SESSION['lastname'] = $userinfo['lastname'];
                    $_SESSION['firstname'] = $userinfo['firstname'];
                    $_SESSION['email'] = $userinfo['email'];
                    $_SESSION['username'] = $userinfo['username'];
                    $_SESSION['passwordUsr'] = $userinfo['passwordUsr'];
                    $_SESSION['notif'] = $userinfo['notif'];
                    header('location: /camagru/view/home.php');
                }
                else
                {
                    $error = "L'identifiant et le mot de passe ne correspondent pas. Veuillez vérifier et réessayer.";
                }
            }
            else
            {
                $error = "L'identifiant et le mot de passe ne correspondent pas. Veuillez vérifier et réessayer.";
            }
        }
        else
        {
            $error = "Tous les champs doivent être complétés !";
        }
    }
}

?>