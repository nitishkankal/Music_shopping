<?php

$currency = '$'; //Currency sumbol or code

$db_username = 'root';
$db_password = '';
$db_name = 'lon29101273';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if (!$mysqli) {
    die('Could not connect: ' . mysql_error());
    echo 'no Connected ';
}
//echo 'Connected successfully';
?>