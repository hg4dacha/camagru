<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

$picturesInPage = 6;
$picturesNmbr = pictNmbr();
$totalPage = ceil($picturesNmbr / $picturesInPage);


if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPage) {

    $_GET['page'] = intval($_GET['page']);
    $currentPage = $_GET['page'];
}
else {

    $currentPage = 1;
}


$beginning = ($currentPage - 1) * $picturesInPage;
$pictures = pictr_recup($beginning, $picturesInPage);

?>