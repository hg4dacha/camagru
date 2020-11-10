<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

    if (isset($_POST['imgID']))
    {
        if(!(empty($_POST['imgID'])))
        $imgID = htmlspecialchars($_POST['imgID']);
        $idUsr = intval($_SESSION['id']);
        delete_img($idUsr, $imgID);
    }

?>