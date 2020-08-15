<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/db_connexion.php");

function UsrCheckExist($usr)
{
    $dbc = db_connex();
    $reqField = $dbc->prepare("SELECT LOWER(username) FROM users WHERE LOWER(username)  = :usr");
    $reqField->bindValue(':usr', $usr, PDO::PARAM_STR);
    $reqField->execute();
    return $reqField->rowCount();
}

function MailCheckExist($mail)
{
    $dbc = db_connex();
    $reqField = $dbc->prepare("SELECT email FROM users WHERE email  = :mail");
    $reqField->bindValue(':mail', $mail, PDO::PARAM_STR);
    $reqField->execute();
    return $reqField->rowCount();
}

function insertMbr($lastname, $firstname, $email, $username, $passwordUsr, $notif)
{
    $dbc = db_connex();
    $reqIns = $dbc->prepare("INSERT INTO users (lastname, firstname, email, username, passwordUsr, notif) VALUES (:lastname, :firstname, :email, :username, :passwordUsr, :notif)");
    $reqIns->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $reqIns->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $reqIns->bindValue(':email', $email, PDO::PARAM_STR);
    $reqIns->bindValue(':username', $username, PDO::PARAM_STR);
    $reqIns->bindValue(':passwordUsr', $passwordUsr, PDO::PARAM_STR);
    $reqIns->bindValue(':notif', $notif, PDO::PARAM_BOOL);
    $reqIns->execute();
}

function pswrd_ctrlU($idf)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT passwordUsr FROM users WHERE LOWER(username) = :idf");
    $reqCtrl->bindValue(':idf', $idf, PDO::PARAM_STR);
    return $reqCtrl->execute();
}

function pswrd_ctrlM($idf)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT passwordUsr FROM users WHERE LOWER(email) = :idf");
    $reqCtrl->bindValue(':idf', $idf, PDO::PARAM_STR);
    return $reqCtrl->execute();
}

function recupUsrInfo_usr($idf)
{
    $dbc = db_connex();
    $requsr = $dbc->prepare("SELECT * FROM users WHERE LOWER(username) = :idf");
    $requsr->bindValue(':idf', $idf, PDO::PARAM_STR);
    $requsr->execute();
    return $requsr->fetch();
}

function recupUsrInfo_mail($idf)
{
    $dbc = db_connex();
    $requsr = $dbc->prepare("SELECT * FROM users WHERE LOWER(email) = :idf");
    $requsr->bindValue(':idf', $idf, PDO::PARAM_STR);
    $requsr->execute();
    return $requsr->fetch();
}

?>