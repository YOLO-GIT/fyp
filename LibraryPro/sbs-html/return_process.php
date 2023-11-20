<?php
session_start();

if (isset($_GET['cmdreturn'])) {
    // Record deleted successfully
    $transc_ID = $_GET['transc_ID'];
    $IC = $_GET['txtIC'];
    $Name = $_GET['txtname'];
    $book_title = $_GET['txtbook'];
    $book_condition = $_GET['cbocondition'];

    // Create ID Transaction
    $tahun = substr(date("Y"), 2, 2);

    $sqlreturn = "SELECT COUNT(*) as total FROM tblreturning WHERE LEFT(return_ID, 2) = '$tahun'";

    $data = mysqli_query($con, $sqlreturn);
    $num = mysqli_fetch_assoc($data);

    //create id booking (Last 4 Char)
    $total = (int)$num["total"];
    $total = sprintf("%04s", ++$total);

    $idreturn = $tahun . $total;

    $sql = "INSERT INTO `tblreturning`(`return_ID`, `user_IC`, `user_name`, `book_title`, `book_condition`, `date_returned`) 
    VALUES ('$idreturn','$IC','$Name','$book_title','$book_condition',NOW())";

    mysqli_query($con, $sql);

    $deleteQuery = "DELETE FROM tbltransaction WHERE transc_ID='$transc_ID'";
    mysqli_query($con, $deleteQuery);

    echo "<script>alert('Return Success');</script>";
    echo "<script>window.location.href='buku_saya.php';</script>";
} else {
    // Error deleting record
    echo "<script>alert('Error Returning');</script>";
    echo "<script>window.location.href='buku_saya.php';</script>";
}
