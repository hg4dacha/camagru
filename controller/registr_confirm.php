<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if((isset($_GET['idCTRL']) && isset($_GET['keyID']) && isset($_GET['usn'])) && (!empty($_GET['idCTRL']) && !empty($_GET['keyID']) && !empty($_GET['usn'])))
{
    $idCTRL = htmlspecialchars($_GET['idCTRL']);    
    $usrname = htmlspecialchars($_GET['usn']);
    $keyID = htmlspecialchars($_GET['keyID']);

    $usrnameChecked = username_ctrl($idCTRL);
    if($usrnameChecked != NULL)
    {
        if($usrnameChecked[0] === $usrname)
        {
            $keyUsrChecked = keyUsr_ctrl($idCTRL);
            if($keyUsrChecked != NULL)
            {
                if($keyUsrChecked[0] === $keyID)
                {
                    $keyReplace = uniqid().random_int(583483, 962379835641329875);
                    replaceKeyUsr($keyReplace, $usrnameChecked[0]);
                    $idReplace = random_int(364729492, 689346897455960983).uniqid().random_int(7945947, 436923567916564316);
                    replaceIdCtrl($idReplace, $usrnameChecked[0]);
                    $newToken = TRUE;
                    replaceToken($newToken, $usrnameChecked[0]);
                    $_SESSION['messVald'] = "Félicitations ! Votre compte a été validé,<br> vous pouvez désormais vous connectez.";
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
}
else
{
    header('location: /camagru/view/404.html');
    exit;
}

?>