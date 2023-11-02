<?php

session_start();

if (isset($_SESSION["IDStud"]) || isset($_SESSION["IDTeachers"])) {
    echo "<script>alert('Booking Process...');</script>";
} else {
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location.href='login.php';</script>";
}

if (isset($_GET["cmdbooking"])) {
    $stud_ID = $_GET["txtstudName"];
    $teachers_ID = $_GET["txtteachersName"];
    $book_ID = $_GET["txtbookName"];
    $masa_booking = $_GET["masabooking"];
    $tarikh_booking = $_GET["dtbooking"];
}

include 'conn.php';

// Create ID Booking
$tahun = substr($tarikh_booking, 2, 2);

// Define SQL Statement utk cari no booking yg terakhir dlm tblbooking
$sqlbook = "SELECT COUNT(*) as total FROM tblbooking WHERE LEFT(booking_ID, 2) = '$tahun'";

$data = mysqli_query($con, $sqlbook);
$num = mysqli_fetch_assoc($data);

//create id booking (Last 4 Char)
$total = (int)$num["total"];
$total = sprintf("%04s", ++$total);

$new_status = "isBooking";

$idbooking = $tahun . $total;

$check_id_query = "SELECT * FROM tblbooking WHERE book_title='$book_ID'";
$check_id = mysqli_query($con, $check_id_query);
$check_stud_query = "SELECT * FROM tblbooking WHERE stud_Name='$stud_ID'";
$check_stud = mysqli_query($con, $check_stud_query);
$check_teacher_query = "SELECT * FROM tblbooking WHERE teachers_Name='$teachers_ID'";
$check_teacher = mysqli_query($con, $check_teacher_query);

if (mysqli_num_rows($check_id) > 0) {
    // Validation if the content is same
    echo "<script>alert('Buku ini telah di booking oleh pengguna lain. Sila booking buku lain');</script>";
    // Close the DB to ensure it will not updated.
    mysqli_close($con);
    // Sending back to the Teacher Panel.
    echo "<script>window.location.href='booking.php';</script>";
} elseif (mysqli_num_rows($check_stud) > 0) {
    // Validation if the content is same
    echo "<script>alert('Anda hanya boleh booking buku sekali sahaja');</script>";
    // Close the DB to ensure it will not updated.
    mysqli_close($con);
    // Sending back to the Teacher Panel.
    echo "<script>window.location.href='booking.php';</script>";
} elseif (mysqli_num_rows($check_teacher)) {
    // Validation if the content is same
    echo "<script>alert('Anda hanya boleh booking buku sekali sahaja');</script>";
    // Close the DB to ensure it will not updated.
    mysqli_close($con);
    // Sending back to the Teacher Panel.
    echo "<script>window.location.href='booking.php';</script>";
} else {
    $sql = "INSERT INTO `tblbooking`(`booking_ID`, `book_title`, `stud_Name`, `teachers_Name`, `date_booked`, `time_booked`, `status`) 
    VALUES ('$idbooking','$book_ID','$stud_ID','$teachers_ID','$tarikh_booking','$masa_booking','$new_status')";

    mysqli_query($con, $sql);

    $_SESSION['booking_ID'] = $idbooking;
    echo "<script>alert('Anda Telah berjaya Booking');</script>";
    echo "<script>window.location.href='buku_saya.php';</script>";
}

mysqli_close($con);
