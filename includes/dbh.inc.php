<?php

$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "schoollibrary";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if (!$conn) {
    die("connection failed: " . mysqlii_connect_error());
}