<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");


if((isset($_GET['idCTRL']) && isset($_GET['keyID']) && isset($_GET['usrname'])) && (!empty($_GET['idCTRL']) && !empty($_GET['keyID']) && !empty($_GET['usrname'])))
{
    $idCTRL = htmlspecialchars($_GET['idCTRL']);    
    $usrname = htmlspecialchars($_GET['usrname']);
    $keyID = htmlspecialchars($_GET['keyID']);

    $usrnameChecked = username_ctrl($idCTRL);
    echo($usrnameChecked[0]."<br>");
    if($usrnameChecked[0] == $usrname)
    {
        $keyUsrChecked = keyUsr_ctrl($idCTRL);
        echo($keyID."<br>");
        echo($keyUsrChecked[0]."<br>");
        if($keyUsrChecked[0] == $keyID)
        {
            echo("SALUT!");
        }
        else
        {
            echo("keyID no found");
        }
    }
    else
    {
        echo("username no found");
    }
}

?>