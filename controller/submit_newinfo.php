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
        if(!(empty($_POST['notific']))) $notific = htmlspecialchars($_POST['notific']);
        
        $error_lastname = NULL;
        $error_firstname = NULL;
        $error_username = NULL;
        $error_email = NULL;

        if(!(empty($_POST['usr_lastname'])))
        {
            if(!(preg_match("#^.{1,30}$#", $usr_lastname)))
            {
                $error_lastname = "Le nom doit contenir 30 caractères maximum.";
            }
        }
        if(!(empty($_POST['usr_firstname'])))
        {
            if(!(preg_match("#^.{1,30}$#", $usr_firstname)))
            {
                $error_firstname = "Le prénom doit contenir 30 caractères maximum.";
            }
        }
        if(!(empty($_POST['usr_username'])))
        {
            if(!(preg_match("#^[a-zA-Z0-9._-]{1,15}$#", $usr_username)))
            {
                $error_username = "Le nom d’utilisateur ne peut contenir que des lettres (sans accents), des chiffres, des tirets et des points. (Pas d'espaces | 15 caractères max.)";
            }
        }
        if(!(empty($_POST['usr_email'])))
        {
            if(!(filter_var($usr_email, FILTER_VALIDATE_EMAIL)) || !(preg_match("#^.{5,254}$#", $usr_email)))
            {
                $error_email = "L'adresse e-mail n'est pas valide.";
            }
        }

        if(empty($usr_lastname))
        {
            $usr_lastname = NULL;
        }
        if(empty($usr_firstname))
        {
            $usr_firstname = NULL;
        }
        if(empty($usr_username))
        {
            $usr_username = NULL;
        }
        if(empty($usr_email))
        {
            $usr_email = NULL;
        }
        if(empty($notific))
        {
            $notific = NULL;
        }
        
        if(empty($error_lastname) && empty($error_firstname) && empty($error_username) && empty($error_email))
        {
            if(strtolower($usr_username) != strtolower($_SESSION['username']))
            {
                $usernameExist = UsrCheckExist(strtolower($usr_username));
                if($usernameExist != 0)
                {
                    $error_username = "Le nom d'utilisateur est déjà utilisé. Veuillez insérer un autre nom d'utilisateur.";
                }
            }
            if(strtolower($usr_email) != strtolower($_SESSION['email']))
            {
                $emailExist = MailCheckExist($usr_email);
                if($emailExist != 0)
                {
                    $error_email = "L'adresse e-mail est déjà utilisée. Veuillez insérer une autre adresse e-mail.";
                }
            }

            if(empty($error_username) && empty($error_email))
            {
                if($_SESSION['notif'] == TRUE)
                {
                    $notifSess = "yes";
                }
                elseif($_SESSION['notif'] == FALSE)
                {
                    $notifSess = "no";
                }
                if((($usr_lastname != NULL) && ((ucfirst(strtolower($usr_lastname)) != ucfirst(strtolower($_SESSION['lastname']))))) || (($usr_firstname != NULL) && ((ucfirst(strtolower($usr_firstname)) != ucfirst(strtolower($_SESSION['firstname']))))) || (($usr_username != NULL) && (($usr_username) != ($_SESSION['username']))) || (($usr_email != NULL) && ((strtolower($usr_email) != (strtolower($_SESSION['email']))))) || (($notific != NULL) && ($notific != $notifSess)))
                {
                    if(!(empty($_POST['usr_lastname'])) && ($usr_lastname != $_SESSION['lastname']))
                    {
                        $usr_lastname = ucfirst(strtolower($usr_lastname));
                        replaceLastname($usr_lastname, $_SESSION['id']);
                        $_SESSION['lastname'] = $usr_lastname;
                    }
                    if(!(empty($_POST['usr_firstname'])) && ($usr_firstname != $_SESSION['firstname']))
                    {
                        $usr_firstname = ucfirst(strtolower($usr_firstname));
                        replaceFirstname($usr_firstname, $_SESSION['id']);
                        $_SESSION['firstname'] = $usr_firstname;
                    }
                    if(!(empty($_POST['usr_username'])) && ($usr_username != $_SESSION['username']))
                    {
                        replaceUsername($usr_username, $_SESSION['id']);
                        $_SESSION['username'] = $usr_username;
                    }
                    if(!(empty($_POST['usr_email'])) && ($usr_email != $_SESSION['email']))
                    {
                        $usr_email = strtolower($usr_email);
                        replaceEmail($usr_email, $_SESSION['id']);
                        $_SESSION['email'] = $usr_email;
                    }
                    if(!(empty($_POST['notific'])) && ($notific != $notifSess))
                    {
                        if($notific == "yes")
                        {
                            $notific = TRUE;
                            replaceNotific($notific, $_SESSION['id']);
                            $_SESSION['notif'] = $notific;
                        }
                        elseif($notific == "no")
                        {
                            $notific = FALSE;
                            replaceNotific($notific, $_SESSION['id']);
                            $_SESSION['notif'] = $notific;
                        }
                    }

                    $_SESSION['success'] = "Vos informations ont bien été actualisés !";
                    header('location: /camagru/view/profile.php');
                    exit;
                }
                else
                {
                    header('location: /camagru/view/profile.php');
                    exit;
                }
            }
        }
    }
}

?>