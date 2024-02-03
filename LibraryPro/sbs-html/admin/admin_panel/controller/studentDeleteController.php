<?php

include_once "../config/dbconnect.php";

$c_id = $_POST['record'];
$query = "DELETE FROM tblstudent where stud_ID='$c_id'";

$data = mysqli_query($conn, $query);

if ($data) {
    echo "Student Deleted";
    echo "<script>window.location.href='../adminView/viewTeachers.php';</script>";
} else {
    echo "Not able to delete";
}
