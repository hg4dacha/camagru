<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if((isset($_GET['username']) && isset($_GET['pictureID'])) && (!empty($_GET['username']) && !empty($_GET['pictureID'])))
{
    $username = htmlspecialchars($_GET['username']);    
    $pictureID = htmlspecialchars($_GET['pictureID']);

    $idUsr = recup_idUsr_byUsrname($username);
    $idUsr = intval($idUsr[0]);

    $match = id_and_username_verif($idUsr, $pictureID);

    if ($match === 1) {
        $picture = recup_pict_info($idUsr, $pictureID);
        $usrName = $username;
        $idPict = $pictureID;

        $comments = get_comments($pictureID);

        function idUsername($id_user) {

            $id_user = intval($id_user);
            return recup_username_byID($id_user);
        }
    }
    else {
        header('location: /camagru/view/404.html');
    }
}
else
{
    header('location: /camagru/view/home.php');
    exit;
}
?>