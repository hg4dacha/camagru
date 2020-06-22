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
        if(!(preg_match(, $lastname))
        {
            $error_lastname = "Le nom ne doit contenir que des lettres et 75 caractères au maximum";
        }
        if(!(preg_match(, $firstname))
        {
            $error_firstname = "Le prénom ne doit contenir que des lettres et 75 caractères au maximum";
        }
        if(!(filter_var($email, FILTER_VALIDATE_EMAIL)))
        {
            $error_email = "L'adresse e-mail n'est pas valide";
        }
        if(!(preg_match(, $username_length))
        {
            $error_username = "";
        }
        if(!(preg_match(, $password_length))
        {
            $error_password = "";
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