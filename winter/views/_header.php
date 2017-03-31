<?php 
ini_set('error_reporting', E_ALL);
$db = new mysqli("oniddb.cws.oregonstate.edu","amidong-db","s7whrue6vvn8lbAP","amidong-db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
?>
