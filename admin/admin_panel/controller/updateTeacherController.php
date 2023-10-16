<?php
include_once "../config/dbconnect.php";

$v_id = $_POST['v_id'];
$qty = $_POST['qty'];

// Start a transaction
mysqli_begin_transaction($conn);

// Update the tbltransaction table
$updateTransaction = mysqli_query($conn, "UPDATE tblteachers SET 
        teachers_Name = '$qty'
        WHERE teachers_ID = '$v_id'");

if ($updateTransaction && $updateBorrowing) {
    // Both updates were successful, commit the transaction
    mysqli_commit($conn);
    echo "true";
} else {
    // At least one update failed, rollback the transaction
    mysqli_rollback($conn);
    echo "false";
}

// Close the database connection
mysqli_close($conn);
