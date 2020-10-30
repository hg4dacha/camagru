<?php

function db_connex()
{
    $dsn = 'mysql:host=localhost;dbname=camagru';
    $user = 'root';
    $password = 'MAMP93';
    $errmode = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try{
        $dbc = new PDO ($dsn, $user, $password, $errmode);
    }
    catch (Exception $err){
        die('ERREUR : ' . $err->getMessage());
    }
    return $dbc;
}

?>