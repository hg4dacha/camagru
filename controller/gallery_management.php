<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if (isset($_SESSION['id'])) {

    $idUsr = intval($_SESSION['id']);
    $picturesInPage = 6;
    $picturesNmbr = usrPictNmbr($idUsr);
    $totalPage = ceil($picturesNmbr / $picturesInPage);


    if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPage) {
        $_GET['page'] = intval($_GET['page']);
        $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
    }


    $beginning = ($currentPage - 1) * $picturesInPage;
    $pictures = usr_pictr_recup($idUsr, $beginning, $picturesInPage);
}

?>