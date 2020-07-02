<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/db_connexion.php");

function UsrCheckExist($usr)
{
    $dbc = db_connex();
    $reqField = $dbc->prepare('SELECT LOWER(username) FROM users WHERE LOWER(username)  = :usr');
    $reqField->bindValue(':usr', $usr, PDO::PARAM_STR);
    $reqField->execute();
    return $reqField->rowCount();
}

function MailCheckExist($mail)
{
    $dbc = db_connex();
    $reqField = $dbc->prepare('SELECT email FROM users WHERE email  = :mail');
    $reqField->bindValue(':mail', $mail, PDO::PARAM_STR);
    $reqField->execute();
    return $reqField->rowCount();
}

function insertMbr($lastname, $firstname, $email, $username, $passwordUsr)
{
    $dbi = db_connex();
    $reqIns = $dbi->prepare("INSERT INTO users (lastname, firstname, email, username, passwordUsr) VALUES (:lastname, :firstname, :email, :username, :passwordUsr)");
    $reqIns->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $reqIns->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $reqIns->bindValue(':email', $email, PDO::PARAM_STR);
    $reqIns->bindValue(':username', $username, PDO::PARAM_STR);
    $reqIns->bindValue(':passwordUsr', $passwordUsr, PDO::PARAM_STR);
    $reqIns->execute();
}

?>