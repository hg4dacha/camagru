<?php

$bdd = new PDO ('mysql:host=localhost;dbname=camagru', 'root', 'MAMP93', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if(isset($_POST['submit_inscription']))
{
    if(!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2']))
    {
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $password2 = htmlspecialchars($_POST['password2']);

        $lastname_length = strlen($lastname);
        $firstname_length = strlen($firstname);
        $email_length = strlen($email);
        $username_length = strlen($username);
        $password_length = strlen($password);
        $password2_length = strlen($password2);

        if($lastname_length <= 250 && $firstname_length <= 250 && $email_length <= 250 && $username_length <= 250 && $password_length <= 250 && $password2_length <= 250)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if($password == $password2)
                {
                    $reqmail = $bdd->prepare('SELECT email FROM users WHERE email = ?');
                    $retreq = $reqmail->execute(array($email));
                    print_r($retreq);
                    if($retreq == 0)
                    {

                    }
                    else
                    {
                        $error = "L'adresse email est déjà utilisée";
                    }
                }
                else
                {
                    $error = "Les mots de passes ne correspondent pas";
                }
            }
            else
            {
                $error = "L'adresse e-mail n'est pas valide";
            }
        }
        else
        {
            $error = "Vous ne pouvez entrer que 250 caractères maximum";
        }
    }
    else
    {
        $error = "Tous les champs doivent être complétés !";
    }
}

?>