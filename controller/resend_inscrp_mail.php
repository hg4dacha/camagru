<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/mailFunction.php");

if((isset($_GET['idf']) && isset($_GET['id'])) && (!empty($_GET['idf']) && !empty($_GET['id'])))
{
    $identification = htmlspecialchars($_GET['idf']);    
    $idCTRLL = htmlspecialchars($_GET['id']);

    $nameTemp = username_ctrl($idCTRLL);
    if($nameTemp != NULL)
    {
        $nameUsr = ($nameTemp[0]);

        $mailTemp = mail_ctrl($idCTRLL);
        if($mailTemp != NULL)
        {
            $mailUsr = $mailTemp[0];

            if($identification == strtolower($nameUsr) || $identification == $mailUsr)
            {
                $keyUsr = random_int(1588514, 735691376820134202).uniqid().random_int(635418, 866261402008688409);
                replaceKeyUsr($keyUsr, $nameUsr);
                $idCTRL = uniqid().random_int(55197, 9976834851452);
                replaceIdCtrl($idCTRL, $nameUsr);
                $subject = "Confirmation de création de votre compte.";
                $body = "
                <img src=\"cid:logo\" alt=\"logo\" style=\"display:block;margin-left:auto;margin-right:auto;width:30%;\">
                <br><br>
                <p style=\"color:#1e272e;font-weight:bold;font-size:17px;border:0;\">".$nameUsr.", plus qu'une étape pour finaliser votre inscription !
                <br>
                Cliquez sur le lien ci-dessous et validez votre compte pour<br>vous connectez avec votre identifiant et votre mot de passe.
                <br>
                <a style=\"color:#0095f6\" href=\"http://localhost:8080/camagru/controller/registr_confirm.php?idCTRL=".urlencode($idCTRL)."&amp;usn=".urlencode($nameUsr)."&amp;keyID=".urlencode($keyUsr)."\">>>>>>Je valide mon compte et je finalise mon inscription<<<<<</a>
                </p>
                <br><br><br><br>
                <p style=\"color:#b33939;font-weight:bold;font-size:13px;border:0;\">_____________________________
                <br>
                © 2020 CAMAGRU BY HG4DACHA
                <br>
                ********Tous droits réservés********
                </p>";
                sendmail($mailUsr, $subject, $body, NULL);
                $_SESSION['messVald'] = "Un e-mail de validation vous a été renvoyé.";
                header('location: /camagru/index.php');
                exit;
            }
            else
            {
                header('location: /camagru/view/404.html');
                exit;
            }
        }
        else
        {
            header('location: /camagru/view/404.html');
            exit;
        }
    }
    else
    {
        header('location: /camagru/view/404.html');
        exit;
    }
}
else
{
    header('location: /camagru/view/404.html');
    exit;
}

?>