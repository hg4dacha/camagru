<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if((isset($_GET['keyID']) && isset($_GET['idCTRL']) && isset($_GET['ema'])) && (!empty($_GET['keyID']) && !empty($_GET['idCTRL']) && !empty($_GET['ema'])))
{
    $idCTRL = htmlspecialchars($_GET['idCTRL']);    
    $keyID = htmlspecialchars($_GET['keyID']);
    $mailUsr = htmlspecialchars($_GET['ema']);

    $mailChecked = mail_ctrl($idCTRL);
    if($mailChecked != NULL)
    {
        if($mailChecked[0] === $mailUsr)
        {
            $keyUsrChecked = keyUsr_ctrl($idCTRL);
            if($keyUsrChecked != NULL)
            {
                if($keyUsrChecked[0] === $keyID)
                {
                    $keyReplace = uniqid().random_int(583483, 962379835641329875).random_int(4385, 96329875);
                    replaceKeyUsr($keyReplace, $mailChecked[0]);
                    $idReplace = random_int(7965, 8635870).uniqid().random_int(794, 4369566).uniqid();
                    replaceIdCtrl($idReplace, $mailChecked[0]);
                    $_SESSION['idPASS'] = $idReplace;
                    $_SESSION['pass'] = 1;
                    header('location: /camagru/view/newpswrd_define.php');
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
}
else
{
    header('location: /camagru/view/404.html');
    exit;
}

?>