<?php

session_start();

// Set the timezone to match your database
date_default_timezone_set("Asia/Kuala_Lumpur");

include_once "conn.php";

// Retrieve the timestamp of the record
$timestampQuery = "SELECT * FROM tbltransaction WHERE transc_ID='$transc_ID'";
$resultTime = mysqli_query($con, $timestampQuery);

if ($resultTime) {
    $row = mysqli_fetch_assoc($resultTime);
    $recordTimestamp = strtotime($row['time']);
    if (time() - $recordTimestamp >= 86400) {
        echo "<script>alert('Return Book Process');</script>";
        // echo "<script>window.location.href='returning_book.php';</script>";
    } else {
        echo "<script>alert('Cannot return record. It is not past 1 day.');</script>";
        echo "<script>window.location.href='buku_saya.php';</script>";
    }
} else {
    // Error fetching timestamp
    echo "<script>alert('Error return');</script>";
}
