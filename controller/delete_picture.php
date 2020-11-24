<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

    if (isset($_POST['imgID']) && !empty($_POST['imgID']))
    {
        if(!(empty($_POST['imgID']))) $imgID = htmlspecialchars($_POST['imgID']);

        if ((strlen($imgID) <= 12) && (intval($imgID) != 0))
        {
            $id_user = intval($_SESSION['id']);
            $img_exist = image_and_id_control($imgID, $id_user);
            if ($img_exist == 1)
            {
                $idUsr = intval($_SESSION['id']);
                delete_img($idUsr, $imgID);
                unlink('../public/users_pictures/'.$_POST['imgID'].'.jpeg');
            }
        }
    }

?>