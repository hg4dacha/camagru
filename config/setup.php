<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/camagru/config/database.php");


$bdd = $db = db_connex();

$database_drop = "DROP DATABASE IF EXISTS camagru";
$database = "CREATE DATABASE IF NOT EXISTS camagru CHARACTER SET 'utf8' COLLATE = utf8_general_ci";

try 
{
    $bdd->prepare($database_drop)->execute();
    $bdd->prepare($database)->execute();
}
catch (PDOException $err)
{
    echo "Erreur lors de la création de la base de donnée ".$err->getMessage()."<br/>";
}

try {
    
    $bdd->prepare("USE camagru;")->execute();

}
catch(PDOException $err)
{
    echo "erreur de la creation de la base de donnée ".$err->getMessage()."<br/>";
}


/* creation of the 'users' table */

$table_drop = "DROP TABLE IF EXISTS users";
$table = "CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY  NOT NULL AUTO_INCREMENT,
    lastname VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    passwordUsr VARCHAR(255) NOT NULL,
    notif BOOLEAN NOT NULL,
    keyUsr VARCHAR(255) NOT NULL,
    tokenUsr BOOLEAN NOT NULL,
    idCTRL VARCHAR(255) NOT NULL)";

try 
{
    $bdd->prepare($table_drop)->execute();
    $bdd->prepare($table)->execute();
}
catch (PDOException $err)
{
    echo "Erreur de la requête sql ".$err->getMessage()."<br/>";
}




/* creation of the 'user_pictures' table */

$table_drop = "DROP TABLE IF EXISTS user_pictures";
$table = "CREATE TABLE IF NOT EXISTS user_pictures(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    picture_id VARCHAR(255) NOT NULL,
    picture_path VARCHAR(255) NOT NULL,
    hour_picture VARCHAR(255) NOT NULL,
    date_picture VARCHAR(255) NOT NULL)";
try 
{
    $bdd->prepare($table_drop)->execute();
    $bdd->prepare($table)->execute();
}
catch (PDOException $err)
{
    echo "Erreur de la requête sql ".$err->getMessage()."<br/>";
}




/* creation of the 'comments' table */

$table_drop = "DROP TABLE IF EXISTS comments";
$table = "CREATE TABLE IF NOT EXISTS comments(  
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    picture_id VARCHAR(255) NOT NULL,
    author_id INT NOT NULL,
    id_picture_user INT NOT NULL,
    comment varchar(255) NOT NULL,
    hour_comment varchar(255) NOT NULL,
    date_comment varchar(255) NOT NULL)";
try 
{
    $bdd->prepare($table_drop)->execute();
    $bdd->prepare($table)->execute();
}
catch (PDOException $err)
{
    echo "Erreur de la requête sql ".$err->getMessage()."<br/>";
}



/* creation of the 'likes' table */

$table_drop = "DROP TABLE IF EXISTS likes";
$table = "CREATE TABLE IF NOT EXISTS likes(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    picture_id VARCHAR(255) NOT NULL,
    id_user INT NOT NULL)";
try 
{
    $bdd->prepare($table_drop)->execute();
    $bdd->prepare($table)->execute();
}
catch (PDOException $err)
{
    echo "erreur de la requête sql ".$err->getMessage()."<br/>";
}


$bdd = NULL;

if (empty($_SESSION))
{
    header("location: /camagru/index.php");
    die();
}
else
{
    $_SESSION = array();
    session_destroy();

    if (session_status() === PHP_SESSION_NONE)
    {
        header("location: /camagru/index.php");
        exit;
    }
    else
    {
        header("location: /camagru/view/404.html");
        die();
    }
}

?>