<?php

$host = "smtp.gmail.com";
$port = "587";
$checkconn = fsockopen($host, $port, $errno, $errstr, 5);

if(!$checkconn) {

    echo "($errno) $errstr";
}
else {
    
    echo 'OK';
}

?>