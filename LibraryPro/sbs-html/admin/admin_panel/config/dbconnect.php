<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "dbopac";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database failed");
}
?>