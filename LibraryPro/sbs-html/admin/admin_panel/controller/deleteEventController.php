<?php

include_once "../config/dbconnect.php";

$id = $_POST['record'];

$deleteQuery = "DELETE FROM tblevents WHERE event_id='$id'";
mysqli_query($conn, $deleteQuery);

// Close the database connection
mysqli_close($conn);
