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
            if($usernameExist != 0)
            {
                $pswrdVerif = pswrd_ctrlU(strtolower($identification));
                password_verify($password, $pswrdVerif);
                if($pswrdVerif === TRUE)
                {
                    echo "COOL!";
                }
                else
                {
                    $error = "L'identifiant et le mot de passe ne correspondent pas. Veuillez vérifier et réessayer.";
                }
            }
            else if($emailExist != 0)
            {
                $pswrdVerif = pswrd_ctrlM(strtolower($identification));
                password_verify($password, $pswrdVerif);
                if($pswrdVerif === TRUE)
                {
                    echo "COOL!";
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