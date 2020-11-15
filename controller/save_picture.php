<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");


    if (isset($_POST['imgData']) && isset($_POST['imgID']) && isset($_POST['imgHour']) && isset($_POST['imgDate']))
    {
        if(!(empty($_POST['imgData']))) $imgHour = htmlspecialchars($_POST['imgHour']);
        if(!(empty($_POST['imgData']))) $imgData = htmlspecialchars($_POST['imgData']);
        if(!(empty($_POST['imgData']))) $imgDate = htmlspecialchars($_POST['imgDate']);
        if(!(empty($_POST['imgID']))) $imgID = htmlspecialchars($_POST['imgID']);
        $imgPath = '../public/users_pictures/'.$imgID.'.jpeg';
        $idUsr = intval($_SESSION['id']);

        // creation of the picture
        $imgData = str_replace('data:image/jpeg;base64,', '', $imgData);
        $imgData = base64_decode($imgData);
        $newImg = imagecreatefromstring($imgData);
        imagejpeg($newImg, $imgPath);
        imagedestroy($newImg);
        chmod('../public/users_pictures/'.$imgID.'.jpeg', 0777); // line to delete if not necessary
        
        insertNewImage($idUsr, $imgID, $imgPath, $imgHour, $imgDate);
    }

?>