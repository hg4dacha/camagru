<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

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
                $pswrdVerif = pswrd_ctrl($identification);
                $pswrdPass = password_verify($password, $pswrdVerif[0]);
                if($pswrdPass === TRUE)
                {
                    $tokenUsr = tokenUsr_ctrl($identification);
                    if ($tokenUsr[0] == FALSE)
                    {
                        $idCTRLL = idf_id_take($identification);
                        $error = "Vous devez valider votre inscription via le lien dans<br>l'e-mail qui vous a été envoyé. <a href=\"http://localhost:8080/camagru/controller/resend_inscrp_mail.php?idf=".urlencode($identification)."&amp;id=".urlencode($idCTRLL[0])."\" style=\"font-weight:bold;color:#b33939;\">Renvoyer l'e-mail</a>";
                    }
                    elseif($tokenUsr[0] == TRUE)
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
                        exit;
                    }
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