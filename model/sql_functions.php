<?php


require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/db_connexion.php");

function UsrCheckExist($usr)
{
    $dbc = db_connex();
    $req_field = $dbc->prepare('SELECT username FROM users WHERE username  = :usr');
    $req_field->bindValue(':usr', $usr, PDO::PARAM_STR);
    $req_field->execute();
    return $req_field->rowCount();
}

function MailCheckExist($mail)
{
    $dbc = db_connex();
    $req_field = $dbc->prepare('SELECT email FROM users WHERE email  = :mail');
    $req_field->bindValue(':mail', $mail, PDO::PARAM_STR);
    $req_field->execute();
    return $req_field->rowCount();
}

?>