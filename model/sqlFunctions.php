<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/model/dbConnexion.php");

//---------- Insertion ----------

function insertMbr($lastname, $firstname, $email, $username, $passwordUsr, $notif, $keyUsr, $tokenUsr, $idCTRL)
{
    $dbc = db_connex();
    $reqIns = $dbc->prepare("INSERT INTO users (lastname, firstname, email, username, passwordUsr, notif, keyUsr, tokenUsr, idCTRL) VALUES (:lastname, :firstname, :email, :username, :passwordUsr, :notif, :keyUsr, :tokenUsr, :idCTRL)");
    $reqIns->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $reqIns->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $reqIns->bindValue(':email', $email, PDO::PARAM_STR);
    $reqIns->bindValue(':username', $username, PDO::PARAM_STR);
    $reqIns->bindValue(':passwordUsr', $passwordUsr, PDO::PARAM_STR);
    $reqIns->bindValue(':notif', $notif, PDO::PARAM_BOOL);
    $reqIns->bindValue(':keyUsr', $keyUsr, PDO::PARAM_STR);
    $reqIns->bindValue(':tokenUsr', $tokenUsr, PDO::PARAM_BOOL);
    $reqIns->bindValue(':idCTRL', $idCTRL, PDO::PARAM_STR);
    $reqIns->execute();
}

//---------- Selection ----------

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


function pswrd_ctrl($idf)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT passwordUsr FROM users WHERE LOWER(username) = :idf OR LOWER(email) = :idf");
    $reqCtrl->bindValue(':idf', $idf, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->fetch();
}

function recupUsrInfo($idf)
{
    $dbc = db_connex();
    $requsr = $dbc->prepare("SELECT * FROM users WHERE LOWER(username) = :idf OR LOWER(email) = :idf");
    $requsr->bindValue(':idf', $idf, PDO::PARAM_STR);
    $requsr->execute();
    return $requsr->fetch();
}

function tokenUsr_ctrl($idf)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT tokenUsr FROM users WHERE LOWER(username) = :idf OR LOWER(email) = :idf");
    $reqCtrl->bindValue(':idf', $idf, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->fetch();
}

function username_ctrl($idCTRL)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT username FROM users WHERE idCTRL = :idCTRL");
    $reqCtrl->bindValue(':idCTRL', $idCTRL, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->fetch();

}

function keyUsr_ctrl($idCTRL)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT keyUsr FROM users WHERE idCTRL = :idCTRL");
    $reqCtrl->bindValue(':idCTRL', $idCTRL, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->fetch();
}

//---------- Replacement ----------

function replacePswrd($newPswrd, $idf)
{
    $dbc = db_connex();
    $reqPswrd = $dbc->prepare("UPDATE users SET passwordUsr = :newPswrd WHERE LOWER(username) = :idf");
    $reqPswrd->bindValue(':newPswrd', $newPswrd, PDO::PARAM_STR);
    $reqPswrd->bindValue(':idf', $idf, PDO::PARAM_STR);
    $reqPswrd->execute();
}

function replaceLastname($newElement, $idf)
{
    $dbc = db_connex();
    $reqPswrd = $dbc->prepare("UPDATE users SET lastname = :newElement WHERE id = :idf");
    $reqPswrd->bindValue(':newElement', $newElement, PDO::PARAM_STR);
    $reqPswrd->bindValue(':idf', $idf, PDO::PARAM_INT);
    $reqPswrd->execute();
}

function replaceFirstname($newElement, $idf)
{
    $dbc = db_connex();
    $reqPswrd = $dbc->prepare("UPDATE users SET firstname = :newElement WHERE id = :idf");
    $reqPswrd->bindValue(':newElement', $newElement, PDO::PARAM_STR);
    $reqPswrd->bindValue(':idf', $idf, PDO::PARAM_INT);
    $reqPswrd->execute();
}

function replaceUsername($newElement, $idf)
{
    $dbc = db_connex();
    $reqPswrd = $dbc->prepare("UPDATE users SET username = :newElement WHERE id = :idf");
    $reqPswrd->bindValue(':newElement', $newElement, PDO::PARAM_STR);
    $reqPswrd->bindValue(':idf', $idf, PDO::PARAM_INT);
    $reqPswrd->execute();
}

function replaceEmail($newElement, $idf)
{
    $dbc = db_connex();
    $reqPswrd = $dbc->prepare("UPDATE users SET email = :newElement WHERE id = :idf");
    $reqPswrd->bindValue(':newElement', $newElement, PDO::PARAM_STR);
    $reqPswrd->bindValue(':idf', $idf, PDO::PARAM_INT);
    $reqPswrd->execute();
}

function replaceNotific($newElement, $idf)
{
    $dbc = db_connex();
    $reqPswrd = $dbc->prepare("UPDATE users SET notif = :newElement WHERE id = :idf");
    $reqPswrd->bindValue(':newElement', $newElement, PDO::PARAM_BOOL);
    $reqPswrd->bindValue(':idf', $idf, PDO::PARAM_INT);
    $reqPswrd->execute();
}

function replaceKeyUsr($newElement, $pseudo)
{
    $dbc = db_connex();
    $reqPswrd = $dbc->prepare("UPDATE users SET keyUsr = :newElement WHERE username = :pseudo OR email = :pseudo");
    $reqPswrd->bindValue(':newElement', $newElement, PDO::PARAM_STR);
    $reqPswrd->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $reqPswrd->execute();
}

function replaceIdCtrl($newElement, $pseudo)
{
    $dbc = db_connex();
    $reqPswrd = $dbc->prepare("UPDATE users SET idCTRL = :newElement WHERE username = :pseudo OR email = :pseudo");
    $reqPswrd->bindValue(':newElement', $newElement, PDO::PARAM_STR);
    $reqPswrd->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $reqPswrd->execute();
}

function replaceToken($newElement, $pseudo)
{
    $dbc = db_connex();
    $reqPswrd = $dbc->prepare("UPDATE users SET tokenUsr = :newElement WHERE username = :pseudo");
    $reqPswrd->bindValue(':newElement', $newElement, PDO::PARAM_BOOL);
    $reqPswrd->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $reqPswrd->execute();
}

?>