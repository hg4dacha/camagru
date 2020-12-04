<?php

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/config/database.php");

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

function insertNewImage($idUsr, $imgID, $imgPath, $imgHour, $imgDate) {
    $dbc = db_connex();
    $reqIns = $dbc->prepare("INSERT INTO user_pictures (id_user, picture_id, picture_path, hour_picture, date_picture) VALUES (:idUsr, :imgID, :imgPath, :imgHour, :imgDate)");
    $reqIns->bindValue(':idUsr', $idUsr, PDO::PARAM_INT);
    $reqIns->bindValue(':imgID', $imgID, PDO::PARAM_STR);
    $reqIns->bindValue(':imgPath', $imgPath, PDO::PARAM_STR);
    $reqIns->bindValue(':imgHour', $imgHour, PDO::PARAM_STR);
    $reqIns->bindValue(':imgDate', $imgDate, PDO::PARAM_STR);
    $reqIns->execute();
}

function insertNewComment($picture_id, $author_id, $id_picture_user, $comment, $hour_comment, $date_comment) {
    $dbc = db_connex();
    $reqIns = $dbc->prepare("INSERT INTO comments (picture_id, author_id, id_picture_user, comment, hour_comment, date_comment) VALUES (:picture_id, :author_id, :id_picture_user, :comment, :hour_comment, :date_comment)");
    $reqIns->bindValue(':picture_id', $picture_id, PDO::PARAM_STR);
    $reqIns->bindValue(':author_id', $author_id, PDO::PARAM_INT);
    $reqIns->bindValue(':id_picture_user', $id_picture_user, PDO::PARAM_INT);
    $reqIns->bindValue(':comment', $comment, PDO::PARAM_STR);
    $reqIns->bindValue(':hour_comment', $hour_comment, PDO::PARAM_STR);
    $reqIns->bindValue(':date_comment', $date_comment, PDO::PARAM_STR);
    $reqIns->execute();
}

function insertNewLike($picture_id, $id_user) {
    $dbc = db_connex();
    $reqIns = $dbc->prepare("INSERT INTO likes (picture_id, id_user) VALUES (:picture_id, :id_user)");
    $reqIns->bindValue(':picture_id', $picture_id, PDO::PARAM_STR);
    $reqIns->bindValue(':id_user', $id_user, PDO::PARAM_INT);
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

function mail_ctrl($idCTRL)
{ 
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT email FROM users WHERE idCTRL = :idCTRL");
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

function idf_id_take($idf)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT idCTRL FROM users WHERE LOWER(username) = :idf OR LOWER(email) = :idf");
    $reqCtrl->bindValue(':idf', $idf, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->fetch();
}

function mail_recuperation($id_usr)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT email FROM users WHERE id = :id_usr");
    $reqCtrl->bindValue(':id_usr', $id_usr, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->fetch();
}

function pswrd_recuperation($id_usr)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT passwordUsr FROM users WHERE id = :id_usr");
    $reqCtrl->bindValue(':id_usr', $id_usr, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->fetch();
}

function usrPictNmbr($id_user)
{
    $dbc = db_connex();
    $reqField = $dbc->prepare("SELECT id FROM user_pictures WHERE id_user = :id_user");
    $reqField->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $reqField->execute();
    return $reqField->rowCount();
}

function usr_pictr_recup($id_user, $beginning, $picturesInPage) {
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT * FROM user_pictures WHERE id_user = :id_user ORDER BY id DESC LIMIT :beginning, :picturesInPage");
    $reqCtrl->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $reqCtrl->bindValue(':beginning', $beginning, PDO::PARAM_INT);
    $reqCtrl->bindValue(':picturesInPage', $picturesInPage, PDO::PARAM_INT);
    $reqCtrl->execute();
    return $reqCtrl->fetchAll();
}

function PictNmbr()
{
    $dbc = db_connex();
    $reqField = $dbc->query("SELECT id FROM user_pictures");
    $reqField->execute();
    return $reqField->rowCount();
}

function pictr_recup($beginning, $picturesInPage) {
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT * FROM user_pictures ORDER BY id DESC LIMIT :beginning, :picturesInPage");
    $reqCtrl->bindValue(':beginning', $beginning, PDO::PARAM_INT);
    $reqCtrl->bindValue(':picturesInPage', $picturesInPage, PDO::PARAM_INT);
    $reqCtrl->execute();
    return $reqCtrl->fetchAll();
}

function recup_username_byID($id_user) {
    $dbc = db_connex();
    $reqID = $dbc->prepare("SELECT username FROM users WHERE id = :id_user");
    $reqID->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $reqID->execute();
    return $reqID->fetch();
}

function get_picture_id($id_user)
{
    $dbc = db_connex();
    $reqField = $dbc->prepare("SELECT picture_id FROM user_pictures WHERE id_user = :id_user");
    $reqField->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $reqField->execute();
    return $reqField->fetchAll();
}

function recup_idUsr_byUsrname($usrName) {
    $dbc = db_connex();
    $reqID = $dbc->prepare("SELECT id FROM users WHERE username = :usrName");
    $reqID->bindValue(':usrName', $usrName, PDO::PARAM_STR);
    $reqID->execute();
    return $reqID->fetch();
}

function id_and_username_verif($idUsr, $pictureID) {
    $dbc = db_connex();
    $reqField = $dbc->prepare("SELECT id FROM user_pictures WHERE id_user = :idUsr AND picture_id = :pictureID");
    $reqField->bindValue(':idUsr', $idUsr, PDO::PARAM_INT);
    $reqField->bindValue(':pictureID', $pictureID, PDO::PARAM_STR);
    $reqField->execute();
    return $reqField->rowCount();
}

function recup_pict_info($idUsr, $idPict) {
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT * FROM user_pictures WHERE id_user = :idUsr AND picture_id = :idPict");
    $reqCtrl->bindValue(':idUsr', $idUsr, PDO::PARAM_INT);
    $reqCtrl->bindValue(':idPict', $idPict, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->fetch();
}

function get_user_id($picture_id)
{
    $dbc = db_connex();
    $reqField = $dbc->prepare("SELECT id_user FROM user_pictures WHERE picture_id = :picture_id");
    $reqField->bindValue(':picture_id', $picture_id, PDO::PARAM_INT);
    $reqField->execute();
    return $reqField->fetch();
}

function mail_notif_and_username_recuperation($id_usr)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT notif, email, username FROM users WHERE id = :id_usr");
    $reqCtrl->bindValue(':id_usr', $id_usr, PDO::PARAM_INT);
    $reqCtrl->execute();
    return $reqCtrl->fetchAll();
}

function get_username($id_user)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT username FROM users WHERE id = :id_user");
    $reqCtrl->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $reqCtrl->execute();
    return $reqCtrl->fetch();
}

function image_and_id_control($imgID, $id_user)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT id FROM user_pictures WHERE picture_id = :imgID AND id_user = :id_user");
    $reqCtrl->bindValue(':imgID', $imgID, PDO::PARAM_STR);
    $reqCtrl->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $reqCtrl->execute();
    return $reqCtrl->rowCount();
}

function image_id_control($imgID)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT id FROM user_pictures WHERE picture_id = :imgID");
    $reqCtrl->bindValue(':imgID', $imgID, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->rowCount();
}

function get_comments($picture_id)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT author_id, comment, hour_comment, date_comment FROM comments WHERE picture_id = :picture_id ORDER BY id DESC");
    $reqCtrl->bindValue(':picture_id', $picture_id, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->fetchAll();
}

function get_comments_number($picture_id)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT id FROM comments WHERE picture_id = :picture_id");
    $reqCtrl->bindValue(':picture_id', $picture_id, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->rowCount();
}

function check_like_user($id_user, $picture_id)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT id FROM likes WHERE picture_id = :picture_id AND id_user = :id_user");
    $reqCtrl->bindValue(':picture_id', $picture_id, PDO::PARAM_STR);
    $reqCtrl->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $reqCtrl->execute();
    return $reqCtrl->rowCount();
}

function check_numb_like($picture_id)
{
    $dbc = db_connex();
    $reqCtrl = $dbc->prepare("SELECT id FROM likes WHERE picture_id = :picture_id");
    $reqCtrl->bindValue(':picture_id', $picture_id, PDO::PARAM_STR);
    $reqCtrl->execute();
    return $reqCtrl->rowCount();
}

//---------- Replacement ----------

function replacePswrd($newPswrd, $idf)
{
    $dbc = db_connex();
    $reqPswrd = $dbc->prepare("UPDATE users SET passwordUsr = :newPswrd WHERE LOWER(username) = :idf OR idCTRL = :idf");
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


//---------- Deletion ----------

function delete_usr($id_usr)
{
    $dbc = db_connex();
    $reqDelete = $dbc->prepare("DELETE FROM users WHERE id = :id_usr");
    $reqDelete->bindValue(':id_usr', $id_usr, PDO::PARAM_STR);
    $reqDelete->execute();
}

function delete_img($id_usr, $id_img) {
    $dbc = db_connex();
    $reqDelete = $dbc->prepare("DELETE FROM user_pictures WHERE id_user = :id_usr AND picture_id = :id_img");
    $reqDelete->bindValue(':id_usr', $id_usr, PDO::PARAM_INT);
    $reqDelete->bindValue(':id_img', $id_img, PDO::PARAM_STR);
    $reqDelete->execute();
}

function delete_all_usr_img($id_usr) {
    $dbc = db_connex();
    $reqDelete = $dbc->prepare("DELETE FROM user_pictures WHERE id_user = :id_usr");
    $reqDelete->bindValue(':id_usr', $id_usr, PDO::PARAM_INT);
    $reqDelete->execute();
}

function deleteLike($picture_id, $id_user) {
    $dbc = db_connex();
    $reqDelete = $dbc->prepare("DELETE FROM likes WHERE picture_id = :picture_id AND id_user = :id_user");
    $reqDelete->bindValue(':picture_id', $picture_id, PDO::PARAM_STR);
    $reqDelete->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $reqDelete->execute();
}

function delete_all_usr_com($author_id) {
    $dbc = db_connex();
    $reqDelete = $dbc->prepare("DELETE FROM comments WHERE author_id = :author_id");
    $reqDelete->bindValue(':author_id', $author_id, PDO::PARAM_INT);
    $reqDelete->execute();
}

function delete_all_usr_lik($id_user) {
    $dbc = db_connex();
    $reqDelete = $dbc->prepare("DELETE FROM likes WHERE id_user = :id_user");
    $reqDelete->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $reqDelete->execute();
}

?>