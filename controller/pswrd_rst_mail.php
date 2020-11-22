<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/mailFunction.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['reset_email']))
    {
        if(!(empty($_POST['emailUsr']))) $emailUsr = htmlspecialchars($_POST['emailUsr']);

        if(!(empty($_POST['emailUsr'])))
        {
            if(filter_var($emailUsr, FILTER_VALIDATE_EMAIL))
            {
                $emailExist = MailCheckExist(strtolower($emailUsr));
                if($emailExist != 0)
                {
                    $emailUsr = strtolower($emailUsr);
                    $keyReplace = uniqid().random_int(168729, 962334679821329875);
                    replaceKeyUsr($keyReplace, $emailUsr);
                    $idReplace = random_int(871200492, 680397568155960983).uniqid().random_int(2079995, 439836701916564316);
                    replaceIdCtrl($idReplace, $emailUsr);
                    $subject = "Réinitialisation de votre mot de passe.";
                    $body = "
                    <img src=\"cid:logo\" alt=\"logo\" style=\"display:block;margin-left:auto;margin-right:auto;width:30%;\">
                    <br><br>
                    <p style=\"color:#1e272e;font-weight:bold;font-size:17px;border:0;\">Votre demande de réinitialisation de mot de passe a bien été prise en compte.
                    <br>
                    Cliquez sur le lien ci-dessous pour définir un nouveau mot de passe.
                    <br>
                    <a style=\"color:#0095f6\" href=\"http://localhost:8080/camagru/controller/newpswrd_link.php?keyID=".urlencode($keyReplace)."&amp;idCTRL=".urlencode($idReplace)."&amp;ema=".urlencode($emailUsr)."\">>>>>>Réinitialisation du mot de passe<<<<<</a>
                    <br>
                    Une fois que vous aurez cliqué sur ce lien, il deviendra inutilisable.
                    <br><br>
                    <span style=\"font-weight:normal;color:#EA2027;\">Si vous n'êtes pas à l'origine de cette demande, ignorez cet e-mail<br>et la demande ne sera pas prise en compte.</span>
                    </p>
                    <br><br><br><br>
                    <p style=\"color:#b33939;font-weight:bold;font-size:13px;border:0;\">_____________________________
                    <br>
                    © 2020 CAMAGRU BY HG4DACHA
                    <br>
                    ********Tous droits réservés********
                    </p>";
                    sendmail($emailUsr, $subject, $body, NULL);
                    $_SESSION['messVald'] = "Un e-mail de réinitialisation a été envoyé<br>à l'adresse saisie.";
                    header('location: /camagru/index.php');
                    exit;
                }
                else
                {
                    $_SESSION['messVald'] = "Un e-mail de réinitialisation a été envoyé à l'adresse insérée.";
                    header('location: /camagru/index.php');
                    exit;
                }
            }
            else
            {
                $error = "Veuillez entrez une adresse e-mail valide";
            }
        }
        else
        {
            $error = "Veuillez entrez votre adresse e-mail";
        }
    }
}

?>