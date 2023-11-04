<?php

include_once "../config/dbconnect.php";

$id = $_POST['record'];
$query = "DELETE FROM tblbooking where booking_ID='$id'";

mysqli_query($conn, $query);
