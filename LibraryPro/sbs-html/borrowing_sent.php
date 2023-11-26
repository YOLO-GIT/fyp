<?php

session_start();

if (isset($_SESSION["IDStud"]) || isset($_SESSION["IDTeachers"])) {
    echo "<script>alert('Booking Process...');</script>";
} else {
    echo "<script>alert('Sila Login Dahulu.');</script>";
    echo "<script>window.location.href='auth/login.php';</script>";
}

if (isset($_GET['search'])) {
    $search_link = "booking.php?simple";
} elseif (isset($_GET['ad_search'])) {
    $search_link = "advance_booking.php?advance";
}

if (isset($_GET["cmdbooking"])) {
    $user_ID = $_GET["txtuserID"];
    $user_Name = $_GET["txtuserName"];
    $book_ID = $_GET["txtbookID"];
    $book_title = $_GET["txtbookName"];
    $masa_booking = $_GET["masabooking"];
    $tarikh_booking_start = $_GET["dtstartbooking"];
    $tarikh_booking_end = $_GET["dtendbooking"];
}

include 'conn.php';

// Create ID Transaction
$tahun = substr($tarikh_booking_start, 0, 4);

$new_status = "Borrowing";

$isBooked = 0;

$icnum = substr($user_ID, 8, 4);

$idtransc = "BR" . $icnum . $book_ID . $tahun;

// TO CHECK USER ID START
$check_user_query = "SELECT * FROM tbltransaction WHERE user_ID='$user_ID' AND isBooked = 0";
$check_user = mysqli_query($con, $check_user_query);
// TO CHECK USER ID END

// TO CHECK TEACHER START
$check_teacher_query = "SELECT * FROM tblteachers WHERE teachers_ID='$user_ID'";
$check_teacher = mysqli_query($con, $check_teacher_query);
// TO CHECK TEACHER END

if (mysqli_num_rows($check_teacher) > 0) {
    if (mysqli_num_rows($check_user) >= 3) {
        // Validation if the content is the same
        echo "<script>alert('Anda hanya boleh pinjam tiga buku sahaja');</script>";
        // Close the DB to ensure it will not be updated.
        mysqli_close($con);

        echo "<script>window.location.href=$search_link;</script>";
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

        $get_teachers_sql = "SELECT `teachers_ID` FROM `tblteachers` WHERE `teachers_ID` = '$user_ID'";
        $result_teachers = mysqli_query($con, $get_teachers_sql);

        if ($result_teachers) {
            // Create ID Record
            $tahun = substr($tarikh_booking_start, 2, 2);

            // Define SQL Statement
            $sqlrecord = "SELECT COUNT(*) as total FROM tblrecord WHERE LEFT(record_ID, 2) = '$tahun'";

            $data = mysqli_query($con, $sqlrecord);
            $num = mysqli_fetch_assoc($data);

            //create id Record (Last 4 Char)
            $total = (int)$num["total"];
            $total = sprintf("%04s", ++$total);

            $idrecord = $tahun . $total;

            $current_time = date('H:i:s');

            // For saving record
            $save_record = "INSERT INTO `tblrecord`(`record_ID`, `transc_ID`, `transc_name`, `book_ID`, `book_title`, `user_ID`, `user_name`, `record_date`, `record_time`) 
            VALUES ('$idrecord','$idtransc','$new_status','$book_ID','$book_title','$user_ID','$user_Name',NOW(),'$current_time')";

            mysqli_query($con, $save_record);
        }
    }
} else {
    if (mysqli_num_rows($check_user) > 0) {
        // Validation if the content is the same
        echo "<script>alert('Anda hanya boleh pinjam satu buku sahaja');</script>";
        // Close the DB to ensure it will not be updated.
        mysqli_close($con);

        echo "<script>window.location.href='$search_link';</script>";
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

        $get_student_sql = "SELECT `stud_ID` FROM `tblstudent` WHERE `stud_ID` = '$user_ID'";
        $result_student = mysqli_query($con, $get_student_sql);

        if ($result_student) {

            // Create ID Record
            $tahun = substr($tarikh_booking_start, 2, 2);

            // Define SQL Statement
            $sqlrecord = "SELECT COUNT(*) as total FROM tblrecord WHERE LEFT(record_ID, 2) = '$tahun'";

            $data = mysqli_query($con, $sqlrecord);
            $num = mysqli_fetch_assoc($data);

            //create id Record (Last 4 Char)
            $total = (int)$num["total"];
            $total = sprintf("%04s", ++$total);

            $idrecord = $tahun . $total;

            $current_time = date('H:i:s');

            // For saving record
            $save_record = "INSERT INTO `tblrecord`(`record_ID`, `transc_ID`, `transc_name`, `book_ID`, `book_title`, `user_ID`, `user_name`, `record_date`, `record_time`) 
            VALUES ('$idrecord','$idtransc','$new_status','$book_ID','$book_title','$user_ID','$user_Name',NOW(),'$current_time')";

            mysqli_query($con, $save_record);
        }
    }
}

echo "<script>alert('Anda Telah berjaya Borrowing');</script>";
echo "<script>window.location.href='buku_saya.php';</script>";

mysqli_close($con);
