<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sql_functions.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['submit_connexion']))
    {
        if(!(empty($_POST['identification']))) $identification = htmlspecialchars($_POST['identification']);
        if(!(empty($_POST['password']))) $password = htmlspecialchars($_POST['password']);

        if(!(empty($_POST['identification'])) && !(empty($_POST['password'])))
        {
            $error = NULL;
            $pswrdVerif = NULL;

            $usernameExist = UsrCheckExist(strtolower($identification));
            $emailExist = MailCheckExist($identification);
            if($usernameExist != 0)
            {
                if(pswrd_ctrlU(strtolower($identification), $password))
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
                if(pswrd_ctrlM(strtolower($identifiant), $password))
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
    }
}

?>