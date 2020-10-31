<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");


    if (isset($_POST['imgData']) && isset($_POST['imgID']))
    {
        if(!(empty($_POST['imgData']))) $imgData = htmlspecialchars($_POST['imgData']);
        if(!(empty($_POST['imgID']))) $imgID = htmlspecialchars($_POST['imgID']);
        
        // $idUsr = $_SESSION['id'];
        $imgData = str_replace('data:image/jpeg;base64,', '', $imgData);
        $imgData = base64_decode($imgData);
        $newImg = imagecreatefromstring($imgData);
        imagejpeg($newImg, '../public/users_pictures/'.$imgID.'.jpeg');
        imagedestroy($newImg);
        chmod('../public/users_pictures/'.$imgID.'.jpeg', 0777);
    }

?>