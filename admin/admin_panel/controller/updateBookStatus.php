<?php

include_once "../config/dbconnect.php";

$return_ID = $_POST['record'];

// Retrieve current status before the update
$currentStatusQuery = "SELECT return_approval FROM tblreturning WHERE return_ID='$return_ID'";
$currentStatusResult = $conn->query($currentStatusQuery);

if ($currentStatusResult) {
    $currentStatusRow = $currentStatusResult->fetch_assoc();

    // Update the status
    if ($currentStatusRow["return_approval"] == 0) {
        $update = mysqli_query($conn, "UPDATE tblreturning SET return_approval=1 WHERE return_ID='$return_ID'");
    } elseif ($currentStatusRow["return_approval"] == 1) {
        $update = mysqli_query($conn, "UPDATE tblreturning SET return_approval=0 WHERE return_ID='$return_ID'");
    }

} else {
    echo "Error fetching current status: " . $conn->error;
}

// Close the database connection
$conn->close();
