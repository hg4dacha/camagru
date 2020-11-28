<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if ((isset($_POST['picture_id'])) && (!empty($_POST['picture_id']))) {

    if(!(empty($_POST['picture_id']))) $picture_id = htmlspecialchars($_POST['picture_id']);

    if ((strlen($picture_id) <= 12) && (intval($picture_id) != 0)) {

        $imgID_control = image_id_control($picture_id);
        if ($imgID_control == 1) {
        
            $id_user = intval($_SESSION['id']);

            insertNewLike($picture_id, $id_user);
        }
    }
}

?>