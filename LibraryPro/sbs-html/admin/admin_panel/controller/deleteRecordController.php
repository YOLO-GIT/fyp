<?php

include_once "../config/dbconnect.php";

$id = $_POST['record'];

$deleteQuery = "DELETE FROM tblrecord WHERE record_ID='$id'";
mysqli_query($conn, $deleteQuery);

// Close the database connection
mysqli_close($conn);
