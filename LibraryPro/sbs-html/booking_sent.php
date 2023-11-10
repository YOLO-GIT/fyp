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

// TO CHECK BOOK ID START
$check_id_query = "SELECT * FROM tblbooking WHERE book_title='$book_ID'";
$check_id = mysqli_query($con, $check_id_query);
// TO CHECK BOOK ID END

// TO CHECK STUDENT ID START
$check_user_query = "SELECT * FROM tblbooking WHERE user_ID='$user_ID'";
$check_user = mysqli_query($con, $check_user_query);
// TO CHECK STUDENT ID END

if (mysqli_num_rows($check_id) > 0) {
    // Validation if the content is same
    echo "<script>alert('Buku ini telah di booking oleh pengguna lain. Sila booking buku lain');</script>";
    // Close the DB to ensure it will not updated.
    mysqli_close($con);
    // Sending back to the Teacher Panel.
    echo "<script>window.location.href='booking.php';</script>";
} elseif (mysqli_num_rows($check_user) >= 5) {
    // Validation if the content is same
    echo "<script>alert('Anda hanya boleh booking buku lima kali sahaja');</script>";
    // Close the DB to ensure it will not updated.
    mysqli_close($con);
    // Sending back to the Teacher Panel.
    echo "<script>window.location.href='booking.php';</script>";
} else {
    $sql = "INSERT INTO `tblbooking`(`booking_ID`, `book_title`, `user_Name`, `user_ID`, `date_booked`, `time_booked`, `status`) 
    VALUES ('$idbooking','$book_ID','$user_Name','$user_ID','$tarikh_booking', '$masa_booking','$new_status')";

    mysqli_query($con, $sql);

    // Fetch the current count from the database
    $get_count_sql = "SELECT `book_count` FROM `tblstudent` WHERE `stud_ID` = '$user_ID'";
    $result_count = mysqli_query($con, $get_count_sql);

    if ($result_count) {
        $row = $result_count->fetch_assoc();
        $count = $row['book_count']; // Fetch the current count from the database

        // Increment the count
        $count++;

        $count_sql = "UPDATE `tblstudent` SET `book_count`='$count' WHERE `stud_ID` = '$user_ID'";
        // Execute the query
        mysqli_query($con, $count_sql);
    }

    echo "<script>alert('Anda Telah berjaya Booking');</script>";
    echo "<script>window.location.href='buku_saya.php';</script>";
}

mysqli_close($con);
