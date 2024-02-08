<?php

$host = "localhost";
$user = "id21576521_root";
$pass = "LibraryPro1234+5";
$db = "id21576521_dbopac";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database failed");
}
