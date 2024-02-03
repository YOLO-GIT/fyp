<?php
include_once "../config/dbconnect.php";

$v_id = $_POST['v_id'];
$qty = $_POST['qty'];
$isbn = $_POST['isbn'];
$author = $_POST['author'];
$publish = $_POST['publish'];
$dewey = $_POST['dewey'];
$desc = $_POST['desc'];
$category = $_POST['category'];
$language = $_POST['language'];
$illustration = $_POST['illustration'];
$info1 = $_POST['info1'];
$info2 = $_POST['info2'];
$info3 = $_POST['info3'];
$condition = $_POST['condition'];

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
        book_title = '$qty',
        book_ISBN = '$isbn',
        book_author = '$author',
        publisher = '$publish',
        book_dewey = '$dewey',
        book_category = '$category', -- Added comma here
        book_desc = '$desc',
        book_language ='$language',
        book_illustration='$illustration',
        book_matter1 ='$info1',
        book_matter2 ='$info2',
        book_matter3 ='$info3',
        book_status ='$condition'
        WHERE book_ID = '$v_id'");

if (!$updateTransaction) {
    printf("Error: %s\n", mysqli_error($conn));
    mysqli_rollback($conn); // Rollback the transaction if there's an error
} else {
    if (move_uploaded_file($temp, $finalImage)) {
        $updateImage = mysqli_query($conn, "UPDATE tblbook SET 
            book_image= '$finalImage'
            WHERE book_ID = '$v_id'");

        if (!$updateImage) {
            printf("Error: %s\n", mysqli_error($conn));
            mysqli_rollback($conn); // Rollback the transaction if there's an error
        } else {
            // Commit the transaction if both updates are successful
            mysqli_commit($conn);
            echo "Update Success.";
        }
    } else {
        echo "Error uploading the file.";
        mysqli_rollback($conn); // Rollback the transaction if there's an error
    }
}

// Close the database connection
mysqli_close($conn);
