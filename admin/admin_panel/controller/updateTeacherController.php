<?php
include_once "../config/dbconnect.php";

$v_id = $_POST['v_id'];
$ic = $_POST['ic'];
$qty = $_POST['qty'];
$uname = $_POST['uname'];

// Start a transaction
mysqli_begin_transaction($conn);

if (intval(substr($ic, 11, 1)) % 2 == 1) {
    $jantina = "J";
} else {
    $jantina = "B";
}

$icnum = substr($ic, 8, 4);

$id = "T" . $icnum . $jantina;

$updateQuery = "UPDATE tblteachers SET 
        teachers_Name = '$qty',
        teachers_ID = '$id',
        teachers_username = '$uname'
        WHERE teachers_ID = '$v_id'";

$updateResult = mysqli_query($conn, $updateQuery);

if ($updateResult) {
    // Update was successful, commit the transaction
    mysqli_commit($conn);
    echo "true";
} else {
    // Update failed, rollback the transaction
    mysqli_rollback($conn);
    echo "false";
}


// Close the database connection
mysqli_close($conn);
