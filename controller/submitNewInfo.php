<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['submit_new_info']))
    {
        if(!(empty($_POST['usr_lastname']))) $usr_lastname = htmlspecialchars($_POST['usr_lastname']);
        if(!(empty($_POST['usr_firstname']))) $usr_firstname = htmlspecialchars($_POST['usr_firstname']);
        if(!(empty($_POST['usr_username']))) $usr_username = htmlspecialchars($_POST['usr_username']);
        if(!(empty($_POST['usr_email']))) $usr_email = htmlspecialchars($_POST['usr_email']);
        if(!(empty($_POST['old_pswrd']))) $old_pswrd = htmlspecialchars($_POST['old_pswrd']);
        
        $error_lastname = NULL;
        $error_firstname = NULL;
        $error_username = NULL;
        $error_email = NULL;

        if(!(empty($_POST['usr_lastname'])))
        {
            if(preg_match("#^.{1,30}$#", $usr_lastname))
            {
                replaceLastname($usr_lastname, $_SESSION['username']);
                $_SESSION['lastname'] = $usr_lastname;
            }
            else
            {
                $error_lastname = "Le nom doit contenir 30 caractères maximum.";
            }
        }
        if(!(empty($_POST['usr_firstname'])))
        {
            if(preg_match("#^.{1,30}$#", $usr_firstname))
            {

            }
            else
            {
                $error_firstname = "Le prénom doit contenir 30 caractères maximum.";
            }
        }
        if(!(empty($_POST['usr_username'])))
        {
            if(preg_match("#^[a-zA-Z0-9._-]{1,15}$#", $usr_username))
            {

            }
            else
            {
                $error_username = "Le nom d’utilisateur ne peut contenir que des lettres (sans accents), des chiffres, des tirets et des points. (Pas d'espaces | 15 caractères max.)";
            }
        }
        if(!(empty($_POST['usr_email'])))
        {
            if((filter_var($usr_email, FILTER_VALIDATE_EMAIL)) || (preg_match("#^.{5,254}$#", $usr_email)))
            {

            }
            else
            {
                $error_email = "L'adresse e-mail n'est pas valide.";
            }
        }
        if(empty($error_lastname) && empty($error_firstname) && empty($error_username) && empty($error_email))
        {
            
        }
    }
}

?>