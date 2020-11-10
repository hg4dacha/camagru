<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0) {
    $_GET['page'] = intval($_GET['page']);
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

$idUsr = intval($_SESSION['id']);
$picturesInPage = 6;
$beginning = ($currentPage - 1) * $picturesInPage;
$picturesNmbr = pictNmbr($idUsr);
$pictures = usr_pictr_recup($idUsr, $beginning, $picturesInPage);





// echo '<pre>';
// echo($pictures[0]['picture_id']);
// echo '</pre>';
?>