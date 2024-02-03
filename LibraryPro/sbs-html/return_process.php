<?php
session_start();

include "conn.php";

if (isset($_GET['cmdreturn'])) {
    // Record deleted successfully
    $transc_ID = $_GET['txttID'];
    $IC = $_GET['txtIC'];
    $Name = $_GET['txtname'];
    $book_ID = $_GET['txtbookID'];
    $book_title = $_GET['txtbname'];
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

    $sql = "INSERT INTO `tblreturning`(`return_ID`, `user_IC`, `user_name`, `book_ID`, `book_title`, `book_condition`, `date_returned`, `return_approval`) 
    VALUES ('$idreturn','$IC','$Name','$book_ID','$book_title','$book_condition',NOW(),0)";

    mysqli_query($con, $sql);

    $deleteQuery = "DELETE FROM tbltransaction WHERE transc_ID='$transc_ID'";
    mysqli_query($con, $deleteQuery);

    mysqli_close($con);
    echo "<script>alert('Return Success');</script>";
    echo "<script>window.location.href='buku_saya.php';</script>";
} else {
    // Error deleting record
    mysqli_close($con);
    echo "<script>alert('Error Returning');</script>";
    echo "<script>window.location.href='buku_saya.php';</script>";
}
