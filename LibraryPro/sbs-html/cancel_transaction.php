<?php

session_start();

// Set the timezone to match your database
date_default_timezone_set("Asia/Kuala_Lumpur");

if (isset($_GET['transc_ID'])) {
    $transc_ID = $_GET['transc_ID'];
} else {
    echo "No user selected.";
    exit();
}

include_once "conn.php";

// Retrieve the timestamp of the record
$timestampQuery = "SELECT time FROM tbltransaction WHERE transc_ID='$transc_ID'";
$result = mysqli_query($con, $timestampQuery);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $recordTimestamp = strtotime($row['time']);

    // Debugging statements
    echo "Record Timestamp: " . date('Y-m-d H:i:s', $recordTimestamp) . "<br>";
    echo "Current Time: " . date('Y-m-d H:i:s', time()) . "<br>";
    echo "Time Difference: " . (time() - $recordTimestamp) . "<br>";

    if (time() - $recordTimestamp <= 3600) {
        // Delete the record
        $deleteQuery = "DELETE FROM tbltransaction WHERE transc_ID='$transc_ID'";
        if (mysqli_query($con, $deleteQuery)) {
            // Record deleted successfully
            echo "<script>alert('Cancel Success');</script>";
            // echo "<script>window.location.href='buku_saya.php';</script>";
        } else {
            // Error deleting record
            echo "<script>alert('Error cancel record');</script>";
            echo "<script>window.location.href='buku_saya.php';</script>";
        }
    } else {
        echo "<script>alert('Cannot cancel record. It already past 1 hour.');</script>";
        // echo "<script>window.location.href='buku_saya.php';</script>";
    }
} else {
    // Error fetching timestamp
    echo "<script>alert('Error cancel');</script>";
}

// Close the database connection
mysqli_close($con);
