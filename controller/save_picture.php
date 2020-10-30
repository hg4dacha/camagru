<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/dbConnexion.php");


    if (isset($_POST['imgData']))
    {

        // $id_user = $_SESSION['id_user'];
    print_r($_POST['imgData']);
    }

?>