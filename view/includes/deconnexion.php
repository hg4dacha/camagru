<?php

// Initialization of the session
session_start();

// Destroy all session variables
$_SESSION = array();

// Destroying the session
session_destroy();

// Redirection to index
header("Location: /camagru/index.php");
exit;

?>