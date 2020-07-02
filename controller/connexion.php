<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sql_functions.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['submit_connexion']))
    {
        if(!(empty($_POST['username']))) $username = htmlspecialchars($_POST['username']);
        if(!(empty($_POST['password']))) $password = htmlspecialchars($_POST['password']);

        if(!(empty($_POST['username'])) && !(empty($_POST['password'])))
        {
            $error = NULL;

            $usernameExist = UsrCheckExist(strtolower($username));
            $emailExist = MailCheckExist($email);
            if($usernameExist != 0 || $emailExist != 0)
            {
                
            }
            else
            {
                $error = "L'identifiant et le mot de passe ne correspondent pas. Veuillez vérifier et réessayer.";
            }
        }
    }
}

?>