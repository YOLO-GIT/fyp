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
    $language = $_POST["cbolanguage"];
    $ilustrasi = $_POST["cboillustrasi"];
    $matter1 = $_POST["txtmatter1"];
    $matter2 = $_POST["txtmatter2"];
    $matter3 = $_POST["txtmatter3"];
    $status = $_POST["cboistatus"];

    $name = $_FILES['my_image']['name'];
    $temp = $_FILES['my_image']['tmp_name'];

    $location = "./uploads/";
    $image = $location . $name;

    $target_dir = "uploads/";
    $finalImage = $target_dir . $name;

    // Check if the content already exist:
    // CHECKING START

    //NO PEROLEHAN
    $check_perolehan_query = "SELECT * FROM tblbook WHERE book_ID='$bookID'";
    $check_perolehan = mysqli_query($conn, $check_perolehan_query);

    // CHECKING END

    if (mysqli_num_rows($check_perolehan) > 0) {
        // Validation if the content is same
        echo "<script>alert('Cannot use the same Acquisiton Number.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($conn);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='../adminView/viewBooks.php';</script>";
    } else {
        move_uploaded_file($temp, $finalImage);
        //Timezone
        date_default_timezone_set("Asia/Kuala_Lumpur");

        $sql = "INSERT INTO `tblbook`(`book_ID`, `book_title`, `book_author`, `book_ISBN`, `publisher`, `book_dewey`, `book_category`, `book_desc`, `book_language`, `book_illustration`, `book_matter1`, `book_matter2`, `book_matter3`, `book_status`, `book_added`, `book_image`) 
        VALUES ('$bookID','$title','$author','$ISBN','$publisher','$dewey','$categories ','$desc','$language','$ilustrasi ','$matter1','$matter2','$matter3','$status',NOW(),'$finalImage')";

        $insert = mysqli_query($conn, $sql);
        mysqli_close($conn);

        if (!$insert) {
            echo mysqli_error($conn);
        } else {
            //Prompt to the user.
            echo "<script>alert('Your book registration is successful.');</script>";

            //Redirect to page ---> Login.php
            echo "<script>window.location.href='../adminView/viewBooks.php';</script>";
        }
    }
}
