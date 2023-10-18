   <?php
    include_once "../config/dbconnect.php";

    if (isset($_GET["cmdadd"])) {
        $bookID = $_GET["txtnoperolehan"];
        $title = $_GET["txttitle"];
        $author = $_GET["txtauthor"];
        $ISBN = $_GET["txtISBN"];
        $publisher = $_GET["txtpublisher"];
        $dewey = $_GET["txtdewey"];
        $categories = $_GET["cbokategori"];
        $desc = $_GET["txtdescription"];

        //Timezone
        date_default_timezone_set("Asia/Kuala_Lumpur");

        $sql = "INSERT INTO `tblbook`(`book_ID`, `book_title`, `book_author`, `book_ISBN`, `publisher`, `book_dewey`, `book_category`, `book_desc`, `book_added`) 
        VALUES ('$bookID','$title','$author','$ISBN','$publisher','$dewey','$categories','$desc', NOW())";

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
    ?>