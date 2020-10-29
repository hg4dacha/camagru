<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/dbConnexion.php");
    echo 1;
    $image = htmlspecialchars($_POST['imgData']);
    $bdd = db_connex();
    $req = $bdd->prepare("INSERT INTO img (img) value (?) ");
    $req ->execute(array($image));

?>