<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/dbConnexion.php");


    if (isset($_POST['imgData']) && isset($_POST['imgID']))
    {
        // $idUsr = $_SESSION['id'];

        $imgData = str_replace('data:image/jpeg;base64,', '', $_POST['imgData']);
        $imgData = base64_decode($imgData);
        $newImg = imagecreatefromstring($imgData);
        imagejpeg($newImg, '../public/users_pictures/'.$_POST['imgID'].'.jpeg');
        imagedestroy($newImg);
    }

?>