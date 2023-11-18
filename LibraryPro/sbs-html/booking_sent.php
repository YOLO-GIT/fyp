<?php

session_start();

if (isset($_SESSION["IDStud"]) || isset($_SESSION["IDTeachers"])) {
    echo "<script>alert('Booking Process...');</script>";
} else {
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location.href='login.php';</script>";
}

if (isset($_GET["cmdbooking"])) {
    $user_Name = $_GET["txtuserName"];
    $user_ID = $_GET["txtuserID"];
    $book_ID = $_GET["txtbookName"];
    $tarikh_booking_start = $_GET["dtstartbooking"];
}

include 'conn.php';

// Create ID Transaction
$tahun = substr($tarikh_booking_start, 2, 2);

$sqlbook = "SELECT COUNT(*) as total FROM tbltransaction WHERE LEFT(transc_ID, 2) = '$tahun'";

$data = mysqli_query($con, $sqlbook);
$num = mysqli_fetch_assoc($data);

//create id booking (Last 4 Char)
$total = (int)$num["total"];
$total = sprintf("%04s", ++$total);

$new_status = "Booking";

$idtransc = $tahun . $total;

// TO CHECK TRANSACTION START
$check_id_query = "SELECT * FROM tbltransaction WHERE user_ID='$user_ID' AND transc_name='Borrowing'";
$check_id = mysqli_query($con, $check_id_query);

$check_booking_query = "SELECT * FROM tbltransaction WHERE user_ID='$user_ID' AND transc_name='Booking'";
$check_booking = mysqli_query($con, $check_booking_query);
// TO CHECK TRANSACTION ID END

// TO CHECK USER ID START
$check_user_query = "SELECT * FROM tbltransaction WHERE user_ID='$user_ID'";
$check_user = mysqli_query($con, $check_user_query);
// TO CHECK USER ID END

// TO CHECK TEACHERS ID START
// $check_teacher_query = "SELECT * FROM tblteachers WHERE teachers_ID='$user_ID'";
// $check_teacher = mysqli_query($con, $check_teacher_query);
// TO CHECK TEACHERS ID END

if (mysqli_num_rows($check_id) > 0) {
    // Validation if the content is the same
    echo "<script>alert('Anda telah pinjam buku ini.');</script>";
    // Close the DB to ensure it will not be updated.
    mysqli_close($con);

    echo "<script>window.location.href='booking.php';</script>";
} elseif (mysqli_num_rows($check_booking) > 0) {

    echo "<script>alert('Anda telah booking buku ini.');</script>";

    mysqli_close($con);

    echo "<script>window.location.href='booking.php';</script>";
} elseif (mysqli_num_rows($check_user) > 4) {

    echo "<script>alert('Anda hanya boleh pinjam atau booking tiga buku sahaja');</script>";

    mysqli_close($con);

    echo "<script>window.location.href='booking.php';</script>";
} /*elseif (mysqli_num_rows($check_teacher) > 0) {
    // Additional checks for teachers if needed
    if (mysqli_num_rows($check_user) >= 3) {
        // Validation if the content is the same
        echo "<script>alert('Anda hanya boleh pinjam tiga buku sahaja');</script>";
        // Close the DB to ensure it will not be updated.
        mysqli_close($con);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='booking.php';</script>";
    }
} */ else {
    $sql = "INSERT INTO `tbltransaction`(`transc_ID`, `transc_name`, `book_title`, `user_ID`, `user_Name`, `start_date`, `time`) 
    VALUES ('$idtransc','$new_status','$book_ID','$user_ID','$user_Name','$tarikh_booking_start',NOW())";

    mysqli_query($con, $sql);

    echo "<script>alert('Anda Telah berjaya Booking');</script>";
    echo "<script>window.location.href='buku_saya.php';</script>";
}

mysqli_close($con);
