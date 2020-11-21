<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if (isset($_POST['picture_id']) && isset($_POST['comment'])) {

    if(!(empty($_POST['picture_id']))) $picture_id = htmlspecialchars($_POST['picture_id']);
    if(!(empty($_POST['comment']))) $comment = htmlspecialchars($_POST['comment']);

    if (!empty($comment)) {

        $author_id = intval($_SESSION['id']);
        $id_picture_user = get_user_id($picture_id);
        $id_picture_user = $id_picture_user[0];

        insertNewComment($picture_id, $author_id, $id_picture_user, $comment);
        // mail lors d'un commentaire
    }
}

?>