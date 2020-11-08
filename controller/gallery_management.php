<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

$idUsr = intval($_SESSION['id']);

$pictures = usr_pictr_recup($idUsr);
print_r($pictures);

?>