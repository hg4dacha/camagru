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
            $emailExist = MailCheckExist(strtolower($emailUsr));
            if($emailExist != 0)
            {
                $emailUsr = strtolower($emailUsr);
                $keyReplace = uniqid().random_int(168729, 962334679821329875);
                replaceKeyUsr($keyReplace, $emailUsr);
                $idReplace = random_int(871200492, 680397568155960983).uniqid().random_int(2079995, 439836701916564316);
                replaceIdCtrl($idReplace, $emailUsr);
            }
            else
            {

            }
        }
    }
}

?>