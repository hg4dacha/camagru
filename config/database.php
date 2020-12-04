<?php

function db_connex()
{
    $DB_DSN = 'mysql:host=localhost;dbname=camagru';
    $DB_USER = 'root';
    $DB_PASSWORD = 'MAMP93';
    $DB_ERROR_MODE = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try{
        $dbc = new PDO ($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_ERROR_MODE);
    }
    catch (Exception $err){
        die('ERREUR : ' . $err->getMessage());
    }
    return $dbc;
}

?>