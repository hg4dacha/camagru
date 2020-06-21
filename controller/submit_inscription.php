<?php

$bdd = new PDO ('mysql:host=localhost;dbname=camagru', 'root', 'MAMP93', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if(isset($_POST['submit_inscription']))
{
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);

    if(!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2']))
    {
        $lastname_length = strlen($lastname);
        $firstname_length = strlen($firstname);
        $email_length = strlen($email);
        $username_length = strlen($username);
        $password_length = strlen($password);
        $password2_length = strlen($password2);

        if($lastname_length <= 250 && $firstname_length <= 250 && $email_length <= 250 && $username_length <= 250 && $password_length <= 250 && $password2_length <= 250)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
            {
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
            else
            {
                $error = "L'adresse e-mail n'est pas valide. (L'adresse e-mail doit uniquement contenir des lettres sans accents, des \".\", des \"-\" et des \"_\")";
            }
        }
        else
        {
            $error = "Vous ne pouvez entrer que 250 caractères par champ maximum !";
        }
    }
    else
    {
        $error = "Tous les champs doivent être complétés !";
    }
}

?>