<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/sqlFunctions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (isset($_POST['imgData']))
    {
        // $id_user = $_SESSION['id_user'];
        $image = htmlspecialchars($_POST['imgData']);
        print_r($image);
    }
    else{}
}

?>