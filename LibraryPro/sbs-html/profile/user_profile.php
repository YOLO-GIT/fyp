<?php
// Assuming you have a database connection already established
// Replace the connection details with your own
include '../conn.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['cmdprofile'])) {
    $stud_ID = $_GET['profile_id'];
    $bio = $_GET['profile_bio'];
    $birthday = $_GET['profile_bday'];
    $negeri = $_GET['cbonegeri'];

    $sql_profile = "UPDATE `tblprofile` 
    SET `user_id`='$stud_ID',`bio`='$bio',`birthday`='$birthday',`negeri`='$negeri' WHERE `user_id` = '$stud_id'";

    if (mysqli_query($con, $sql_profile)) {
        echo "<script>alert('Profil anda sudah dikemaskini.')</script>";
    } else {
        echo "<script>alert('Ada masalah semassa mengemaskini data anda.')</script>";
    }
}

$con->close();
