<?php
$dbHost = "localhost";
$dbUser = "id18426422_tvsvishnu";
$dbPass = "K1x?HMAuD)|H0ya5";
$dbName = "id18426422_database";

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if(!$conn) {
    die("Database Connection Failed");
}
?>