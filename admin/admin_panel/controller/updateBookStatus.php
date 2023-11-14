<?php

include_once "../config/dbconnect.php";

$booking_ID = $_POST['record'];

// Retrieve current status before the update
$currentStatusQuery = "SELECT status_ID, status FROM tblbooking WHERE booking_ID='$booking_ID'";
$currentStatusResult = $conn->query($currentStatusQuery);

if ($currentStatusResult) {
    $currentStatusRow = $currentStatusResult->fetch_assoc();

    // Update the status
    if ($currentStatusRow["status_ID"] == 0) {
        $update = mysqli_query($conn, "UPDATE tblbooking SET status_ID=1, status='Borrowing' WHERE booking_ID='$booking_ID'");
        $newStatus = "Borrowing";
        //Main dgn fetch assoc
    } elseif ($currentStatusRow["status_ID"] == 1) {
        $update = mysqli_query($conn, "UPDATE tblbooking SET status_ID=0, status='Booking' WHERE booking_ID='$booking_ID'");
        $newStatus = "Booking";
    }

    // echo "Status updated successfully.";
    // Insert record into tblrecord
    $recordInsertQuery = "INSERT INTO tblrecord (record_ID, record_name) VALUES ('$booking_ID', '$newStatus')";
    mysqli_query($conn, $recordInsertQuery);
} else {
    echo "Error fetching current status: " . $conn->error;
}

// Close the database connection
$conn->close();
