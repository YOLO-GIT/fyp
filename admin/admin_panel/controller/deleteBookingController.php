<?php

include_once "../config/dbconnect.php";

$id = $_POST['record'];

// Retrieve the timestamp of the record
$timestampQuery = "SELECT timestamp_column FROM tblbooking WHERE booking_ID='$id'";
$result = mysqli_query($conn, $timestampQuery);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $recordTimestamp = strtotime($row['timestamp_column']);

    // Check if the record is older than 1 hour (3600 seconds)
    if (time() - $recordTimestamp > 3600) {
        $deleteQuery = "DELETE FROM tblbooking WHERE booking_ID='$id'";
        if (mysqli_query($conn, $deleteQuery)) {
            // Record deleted successfully
            echo "success";
        } else {
            // Error deleting record
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        // Cannot delete record. It has not been 1 hour since creation.
        echo "Cannot delete record. It has not been 1 hour since creation.";
    }
} else {
    // Error fetching timestamp
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
