<?php
include_once "../config/dbconnect.php";

$v_id = $_POST['v_id'];
$qty = $_POST['qty'];

$name = $_FILES['gmbr']['name'];
$temp = $_FILES['gmbr']['tmp_name'];

$location = "./uploads/";
$image = $location . $name;

$target_dir = "uploads/"; // Adjust the path as needed
$finalImage = $target_dir . $name; // Concatenate with 'uploads/' to get the final path

// Start a transaction
mysqli_begin_transaction($conn);

// Update the tbltransaction table
$updateTransaction = mysqli_query($conn, "UPDATE tblbook SET 
        book_title = '$qty'
        WHERE book_ID = '$v_id'");

if (move_uploaded_file($temp, $finalImage)) {
    $updateImage = mysqli_query($conn, "UPDATE tblbook SET 
        book_image= '$finalImage'
        WHERE book_ID = '$v_id'");
} else {
    echo "Error uploading the file.";
}

// Close the database connection
mysqli_close($conn);
