<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/mailFunction.php");

if (isset($_POST['picture_id']) && isset($_POST['comment'])) {

    if(!(empty($_POST['picture_id']))) $picture_id = htmlspecialchars($_POST['picture_id']);
    if(!(empty($_POST['comment']))) $comment = htmlspecialchars($_POST['comment']);

    if (!empty($comment)) {

        $author_id = intval($_SESSION['id']);
        $id_picture_user = get_user_id($picture_id);
        $id_picture_user = $id_picture_user[0];

        insertNewComment($picture_id, $author_id, $id_picture_user, $comment);
        // mail lors d'un commentaire
        $email = strtolower($email);
        $subject = "Vous avez reçu un nouveau commentaire";
        $body = "
        <img src=\"cid:logo\" alt=\"logo\" style=\"display:block;margin-left:auto;margin-right:auto;width:30%;\">
        <br><br>
        <p style=\"color:#1e272e;font-weight:bold;font-size:17px;border:0;\">".$username.", vous avec reçu un nouveau commentaire de ".$XXX.", sur votre photo-montage :
        <br>
        <img src=\"cid:user_image\" alt=\"user_image\" style=\"display:block;margin-left:auto;margin-right:auto;width:20%;\">
        <br>
        <span style=\"text-align:center;font-weight:normal;color:#192a56;\">".$comment."</span>
        </p>
        <br><br><br><br>
        <p style=\"color:#b33939;font-weight:bold;font-size:13px;border:0;\">_____________________________
        <br>
        © 2020 CAMAGRU BY HG4DACHA
        <br>
        ********Tous droits réservés********
        </p>";
        sendmail($email, $subject, $body, $picture_id);
    }
}

?>