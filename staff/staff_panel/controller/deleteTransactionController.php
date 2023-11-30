<?php

include_once "../config/dbconnect.php";

$id = $_POST['record'];

// Retrieve the timestamp of the record
$timestampQuery = "SELECT time FROM tbltransaction WHERE transc_ID='$id'";
$result = mysqli_query($conn, $timestampQuery);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $recordTimestamp = strtotime($row['time']);

    // Check if the record is older than 1 day (86400 seconds)
    if (time() - $recordTimestamp > 86400) {
        $deleteQuery = "DELETE FROM tbltransaction WHERE transc_ID='$id'";
        mysqli_query($conn, $deleteQuery);
        echo "<script>alert('Delete success');</script>";
    } else {
        // Cannot delete record. It has not been 1 hour since creation.
        echo "Cannot delete record. It has not been 1 Day since creation.";
    }
} else {
    // Error fetching timestamp
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
