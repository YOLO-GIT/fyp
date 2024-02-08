<?php
include_once "../config/dbconnect.php";

if (isset($_POST["cmdsubmit"])) {
    // Sanitize and validate input data
    $v_id = $_POST['v_id'];
    $qty = $_POST['qty'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $publish = $_POST['publish'];
    $dewey = $_POST['dewey'];
    $desc = $_POST['desc'];
    $category = $_POST['cbokategori'];
    $language = $_POST['cbolanguage'];
    $illustration = $_POST['cboillustrasi'];
    $info1 = $_POST['info1'];
    $info2 = $_POST['info2'];
    $info3 = $_POST['info3'];
    $condition = $_POST['cbokondisi'];

    // File upload handling
    $name = $_FILES['gmbr']['name'];
    $temp = $_FILES['gmbr']['tmp_name'];

    $target_dir = "uploads/";
    $finalImage = $target_dir . $name;

    // Update the tbltransaction table
    $updateTransaction = mysqli_query($conn, "UPDATE tblbook SET 
            book_title = '$qty',
            book_ISBN = '$isbn',
            book_author = '$author',
            publisher = '$publish',
            book_dewey = '$dewey',
            book_category = '$category',
            book_desc = '$desc',
            book_language ='$language',
            book_illustration='$illustration',
            book_matter1 ='$info1',
            book_matter2 ='$info2',
            book_matter3 ='$info3',
            book_status ='$condition'
            WHERE book_ID = '$v_id'");

    if (!$updateTransaction) {
        echo "<script>alert('error');</script>";
        mysqli_close($conn);
    } else {
        if (move_uploaded_file($temp, $finalImage)) {
            $updateImage = mysqli_query($conn, "UPDATE tblbook SET 
                book_image= '$finalImage'
                WHERE book_ID = '$v_id'");
        } else {
            echo "<script>alert('error file');</script>";
            mysqli_close($conn);
        }
    }

    echo "<script>alert('Update Success');</script>";
    echo "<script>window.location.href='../adminView/viewBooks.php';</script>";
    
    // Close the database connection
    mysqli_close($conn);
}
