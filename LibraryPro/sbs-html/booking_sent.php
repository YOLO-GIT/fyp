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
    $book_ID = $_GET["txtbookID"];
    $book_title = $_GET["txtbookName"];
    $user_ID = $_GET["txtuserID"];
    $book_title = $_GET["txtbookName"];
    $tarikh_booking_start = $_GET["dtstartbooking"];
}

include 'conn.php';

// Create ID Transaction
$tahun = substr($tarikh_booking_start, 0, 4);

$new_status = "Booking";

$isBooked = 1;

$tarikh_booking_end = 0;

$icnum = substr($user_ID, 8, 4);

$idtransc = "BK" . $tahun . $icnum;

// TO CHECK USER ID START
$check_user_query = "SELECT * FROM tbltransaction WHERE user_ID='$user_ID' AND isBooked = 1";
$check_user = mysqli_query($con, $check_user_query);
// TO CHECK USER ID END

// TO CHECK TEACHER START
$check_teacher_query = "SELECT * FROM tblteachers WHERE teachers_ID='$user_ID'";
$check_teacher = mysqli_query($con, $check_teacher_query);
// TO CHECK TEACHER END

if (mysqli_num_rows($check_teacher) > 0) {
    if (mysqli_num_rows($check_user) >= 3) {
        // Validation if the content is the same
        echo "<script>alert('Anda hanya boleh booking tiga buku sahaja');</script>";
        // Close the DB to ensure it will not be updated.
        mysqli_close($con);

        echo "<script>window.location.href='booking.php';</script>";
    } else {
        $user_role = "Teacher";

        $sql = "INSERT INTO `tbltransaction`(`transc_ID`, `transc_name`, `isBooked`, `book_ID`, `book_title`, `user_ID`, `user_Name`, `user_role`, `start_date`, `end_date`, `time`) 
        VALUES ('$idtransc','$new_status','$isBooked','$book_ID','$book_title','$user_ID','$user_Name','$user_role','$tarikh_booking_start','$tarikh_booking_end',NOW())";

        mysqli_query($con, $sql);

        // Fetch the current count from the teachers table
        $get_count_teachers_sql = "SELECT `book_count` FROM `tblteachers` WHERE `teachers_ID` = '$user_ID'";
        $result_count_teachers = mysqli_query($con, $get_count_teachers_sql);

        if ($result_count_teachers) {
            // Fetch and update count for teachers
            $row_teachers = $result_count_teachers->fetch_assoc();
            $count_teachers = $row_teachers['book_count'];
            $count_teachers++;

            $count_sql_teachers = "UPDATE `tblteachers` SET `book_count`='$count_teachers' WHERE `teachers_ID` = '$user_ID'";
            mysqli_query($con, $count_sql_teachers);
        }
    }
} else {
    if (mysqli_num_rows($check_user) > 0) {
        // Validation if the content is the same
        echo "<script>alert('Anda hanya boleh booking satu buku sahaja');</script>";
        // Close the DB to ensure it will not be updated.
        mysqli_close($con);

        echo "<script>window.location.href='booking.php';</script>";
    } else {
        $user_role = "Student";

        $sql = "INSERT INTO `tbltransaction`(`transc_ID`, `transc_name`, `isBooked`, `book_ID`, `book_title`, `user_ID`, `user_Name`, `user_role`, `start_date`, `end_date`, `time`) 
        VALUES ('$idtransc','$new_status','$isBooked','$book_ID','$book_title','$user_ID','$user_Name','$user_role','$tarikh_booking_start','$tarikh_booking_end',NOW())";
        mysqli_query($con, $sql);

        // Fetch the current count from the student table
        $get_count_student_sql = "SELECT `book_count` FROM `tblstudent` WHERE `stud_ID` = '$user_ID'";
        $result_count_student = mysqli_query($con, $get_count_student_sql);

        if ($result_count_student) {
            // Fetch and update count for students
            $row_student = $result_count_student->fetch_assoc();
            $count_student = $row_student['book_count'];
            $count_student++;

            $count_sql_student = "UPDATE `tblstudent` SET `book_count`='$count_student' WHERE `stud_ID` = '$user_ID'";
            mysqli_query($con, $count_sql_student);
        }
    }
}

echo "<script>alert('Anda Telah berjaya Booking');</script>";
echo "<script>window.location.href='buku_saya.php';</script>";

mysqli_close($con);
