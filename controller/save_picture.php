<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");


    if ((isset($_POST['imgData']) && isset($_POST['imgID'])) && (!empty($_POST['imgData']) && !empty($_POST['imgID'])))
    {
        if(!(empty($_POST['imgData']))) $imgData = htmlspecialchars($_POST['imgData']);
        if(!(empty($_POST['imgID']))) $imgID = htmlspecialchars($_POST['imgID']);

        //  Removed the addition, otherwise error
        //  see : https://www.php.net/manual/fr/function.imagecreatefromstring.php#124517
        $imgData = str_replace('data:image/jpeg;base64,', '', $imgData);
        //  Decoding of base 64 for the type verification and then for the picture creation afterwards
        $imgData = base64_decode($imgData);
        //  Determine the type of the file
        $f = finfo_open();
        $mime_type = finfo_buffer($f, $imgData, FILEINFO_MIME_TYPE);

        if ($mime_type == 'image/jpeg') {

            if ((strlen($imgID) <= 12) && (intval($imgID) != 0)) {

                setlocale(LC_TIME, "fr_FR");
                $imgDate = strftime("%d %b %Y");
                $imgHour = strftime("%Hh%M");
                $imgPath = '../public/users_pictures/'.$imgID.'.jpeg';
                $idUsr = intval($_SESSION['id']);
        
                // creation of the picture
                $newImg = imagecreatefromstring($imgData);
                imagejpeg($newImg, $imgPath);
                imagedestroy($newImg);
                chmod('../public/users_pictures/'.$imgID.'.jpeg', 0777); // line to delete if not necessary
                
                insertNewImage($idUsr, $imgID, $imgPath, $imgHour, $imgDate);
            }
            
        }

    }

?>