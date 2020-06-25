<?php

$bdd = new PDO ('mysql:host=localhost;dbname=camagru', 'root', 'MAMP93', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['submit_inscription']))
    {
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $password2 = htmlspecialchars($_POST['password2']);

        if(empty($_POST['lastname']) || empty($_POST['firstname']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2']))
        {
            $error = "Tous les champs doivent être complétés !";
        }
        if(!(preg_match("#^.{1,30}$#", $lastname))
        {
            $error_lastname = "Le nom doit contenir 30 caractères maximum";
        }
        if(!(preg_match("#^.{1,30}$#", $firstname))
        {
            $error_firstname = "Le prénom doit contenir 30 caractères maximum";
        }
        if(!(filter_var($email, FILTER_VALIDATE_EMAIL)))
        {
            $error_email = "L'adresse e-mail n'est pas valide";
        }
        if(!(preg_match("#^[a-zA-Z0-9._-]{1,15}$#", $username_length))
        {
            $error_username = "Le nom d’utilisateur ne peut contenir que des lettres sans accents, des chiffres, des tirets du bat ou du haut, des points et 15 caractères maximum";
        }
        if(!(preg_match("#^(A-Z)+(a-z)+(0-9)+$#", $password_length))
        {
            $error_password = "Le mot de passe doit au moins contenir 1 minuscule, 1 masujcule, un chiffre et ne pas dépasser 30 caractères maximum";
        }
        if($password == $password2)
        {
        $requsername = $bdd->prepare('SELECT username FROM users WHERE username = ?');
        $requsername->execute(array($username));
        $usernameExist = $requsername->rowcount();
        if($usernameExist == 0)
        {
        $reqmail = $bdd->prepare('SELECT email FROM users WHERE email = ?');
        $reqmail->execute(array($email));
        $emailExist = $reqmail->rowcount();
                            if($emailExist == 0)
                            {

                            }
                            else
                            {
                                $error = "L'adresse e-mail est déjà utilisée. Veuillez insérer une autre adresse e-mail";
                            }
                        }
                        else
                        {
                            $error = "Le nom d'utilisateur est déjà utilisé. Veuillez insérer un autre nom d'utilisateur";
                        }
                    }
                    else
                    {
                        $error = "Les mots de passe ne correspondent pas";
                    }
                }
}

?>