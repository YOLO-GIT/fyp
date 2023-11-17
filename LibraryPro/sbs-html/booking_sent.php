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
    $tarikh_booking_start = $_GET["dtstartbooking"];
    $tarikh_booking_end = $_GET["dtendbooking"];
}

include 'conn.php';

// Create ID Booking
$tahun = substr($tarikh_booking_start, 2, 2);

// Define SQL Statement utk cari no booking yg terakhir dlm tblbooking
$sqlbook = "SELECT COUNT(*) as total FROM tbltransaction WHERE LEFT(transc_ID, 2) = '$tahun'";

$data = mysqli_query($con, $sqlbook);
$num = mysqli_fetch_assoc($data);

//create id booking (Last 4 Char)
$total = (int)$num["total"];
$total = sprintf("%04s", ++$total);

$new_status = "Borrowing";

$idtransc = $tahun . $total;

// TO CHECK BOOK ID START
$check_id_query = "SELECT * FROM tbltransaction WHERE book_title='$book_ID'";
$check_id = mysqli_query($con, $check_id_query);
// TO CHECK BOOK ID END

// TO CHECK STUDENT ID START
$check_user_query = "SELECT * FROM tbltransaction WHERE user_ID='$user_ID'";
$check_user = mysqli_query($con, $check_user_query);
// TO CHECK STUDENT ID END

// TO CHECK TEACHERS ID START
$check_teacher_query = "SELECT * FROM tblteachers WHERE teachers_ID='$user_ID'";
$check_teacher = mysqli_query($con, $check_teacher_query);
// TO CHECK TEACHERS ID END

if (mysqli_num_rows($check_id) > 0) {
    // Validation if the content is the same
    echo "<script>alert('Buku ini telah di booking oleh pengguna lain. Sila booking buku lain');</script>";
    // Close the DB to ensure it will not be updated.
    mysqli_close($con);
    // Sending back to the Teacher Panel.
    echo "<script>window.location.href='booking.php';</script>";
} elseif (mysqli_num_rows($check_user) > 0) {
    // Validation if the content is the same
    echo "<script>alert('Anda hanya boleh pinjam satu buku sahaja');</script>";
    // Close the DB to ensure it will not be updated.
    mysqli_close($con);
    // Sending back to the Teacher Panel.
    echo "<script>window.location.href='booking.php';</script>";
} elseif (mysqli_num_rows($check_teacher) > 0) {
    // Additional checks for teachers if needed
    if (mysqli_num_rows($check_user) >= 3) {
        // Validation if the content is the same
        echo "<script>alert('Anda hanya boleh pinjam satu buku sahaja');</script>";
        // Close the DB to ensure it will not be updated.
        mysqli_close($con);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='booking.php';</script>";
    }
} else {
    $sql = "INSERT INTO `tbltransaction`(`transc_ID`, `transc_name`, `book_title`, `user_ID`, `user_Name`, `start_date`, `end_date`, `time`) 
    VALUES ('$idtransc','$new_status','$book_ID','$user_ID','$user_Name','$tarikh_booking_start','$tarikh_booking_end',NOW()";

    mysqli_query($con, $sql);

    // Fetch the current count from the student table
    $get_count_student_sql = "SELECT `book_count` FROM `tblstudent` WHERE `stud_ID` = '$user_ID'";
    $result_count_student = mysqli_query($con, $get_count_student_sql);

    // Fetch the current count from the teachers table
    $get_count_teachers_sql = "SELECT `book_count` FROM `tblteachers` WHERE `teachers_ID` = '$user_ID'";
    $result_count_teachers = mysqli_query($con, $get_count_teachers_sql);

    if ($result_count_student) {
        // Fetch and update count for students
        $row_student = $result_count_student->fetch_assoc();
        $count_student = $row_student['book_count'];
        $count_student++;

        $count_sql_student = "UPDATE `tblstudent` SET `book_count`='$count_student' WHERE `stud_ID` = '$user_ID'";
        mysqli_query($con, $count_sql_student);
    } elseif ($result_count_teachers) {
        // Fetch and update count for teachers
        $row_teachers = $result_count_teachers->fetch_assoc();
        $count_teachers = $row_teachers['book_count'];
        $count_teachers++;

        $count_sql_teachers = "UPDATE `tblteachers` SET `book_count`='$count_teachers' WHERE `teachers_ID` = '$user_ID'";
        mysqli_query($con, $count_sql_teachers);
    }


    echo "<script>alert('Anda Telah berjaya Borrowing');</script>";
    echo "<script>window.location.href='buku_saya.php';</script>";
}

mysqli_close($con);
