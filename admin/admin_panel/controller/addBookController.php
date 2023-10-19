<?php
include_once "../config/dbconnect.php";

if (isset($_POST["cmdadd"])) {
    $bookID = $_POST["txtnoperolehan"];
    $title = $_POST["txttitle"];
    $author = $_POST["txtauthor"];
    $ISBN = $_POST["txtISBN"];
    $publisher = $_POST["txtpublisher"];
    $dewey = $_POST["txtdewey"];
    $categories = $_POST["cbokategori"];
    $desc = $_POST["txtdescription"];

    $name = $_FILES['my_image']['name'];
    $temp = $_FILES['my_image']['tmp_name'];

    $location = "./uploads/";
    $image = $location . $name;

    $target_dir = "uploads/";
    $finalImage = $target_dir . $name;

    move_uploaded_file($temp, $finalImage);
    //Timezone
    date_default_timezone_set("Asia/Kuala_Lumpur");

    $sql = "INSERT INTO `tblbook`(`book_ID`, `book_title`, `book_author`, `book_ISBN`, `publisher`, `book_dewey`, `book_category`, `book_desc`, `book_added`, `book_image`) 
        VALUES ('$bookID','$title','$author','$ISBN','$publisher','$dewey','$categories','$desc', NOW(), '$finalImage')";

    $insert = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (!$insert) {
        echo mysqli_error($conn);
    } else {
        //Prompt to the user.
        echo "<script>alert('Your book registration is successful. Please proceed to the home page');</script>";

        //Redirect to page ---> Login.php
        echo "<script>window.location.href='../index.php';</script>";
    }
}
