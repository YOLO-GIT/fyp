<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "dbopac";

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Database failed");
}

// Connection mg lah jim
