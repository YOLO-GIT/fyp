<?php
include_once "../config/dbconnect.php";

$v_id = $_POST['v_id'];
$ic = $_POST['ic'];
$qty = $_POST['qty'];

// Start a transaction
mysqli_begin_transaction($conn);

if (intval(substr($ic, 11, 1)) % 2 == 1) {
    $jantina = "J";
} else {
    $jantina = "B";
}

$icnum = substr($ic, 8, 4);

$id = "T" . $icnum . $jantina;

// Update the tbltransaction table
$updateTransaction = mysqli_query($conn, "UPDATE tblteachers SET 
        teachers_Name = '$qty'
        WHERE teachers_ID = '$v_id'");

$updateIC = mysqli_query($conn, "UPDATE tblteachers SET 
        teachers_ID = '$id'
        WHERE teachers_ID = '$v_id'");

if ($updateTransaction || $updateIC) {
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
