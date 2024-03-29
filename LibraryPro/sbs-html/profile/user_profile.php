<?php
// Assuming you have a database connection already established
// Replace the connection details with your own
include '../conn.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// MENGEMASKINI PROFIL STUDENT
if (isset($_GET['cmdprofile'])) {
    $stud_ID = $_GET['profile_id'];
    $bio = $_GET['profile_bio'];
    $birthday = $_GET['profile_bday'];
    $negeri = $_GET['cbonegeri'];

    $sql_profile = "UPDATE `tblstudent` 
    SET `bio`='$bio',`birthday`='$birthday',`negeri`='$negeri' WHERE `stud_ID` = '$stud_ID'";

    if (mysqli_query($con, $sql_profile)) {
        echo "<script>alert('Your profile has been updated.')</script>";
        echo "<script>window.location.href='./profile.php';</script>";
    } else {
        echo "<script>alert('There was a problem updating your data.')</script>";
        echo "<script>window.location.href='./profile.php';</script>";
    }
}

// MENGEMASKINI PROFIL CIKGU
elseif (isset($_GET['Tcmdprofile'])) {
    $teachers_ID = $_GET['Tprofile_id'];
    $bio = $_GET['Tprofile_bio'];
    $birthday = $_GET['Tprofile_bday'];
    $negeri = $_GET['Tcbonegeri'];

    $sql_profile = "UPDATE `tblteachers` 
    SET `bio`='$bio',`birthday`='$birthday',`negeri`='$negeri' WHERE `teachers_ID` = '$stud_ID'";

    if (mysqli_query($con, $sql_profile)) {
        echo "<script>alert('Your profile has been updated.')</script>";
        echo "<script>window.location.href='teacher_profile.php';</script>";
    } else {
        echo "<script>alert('There was a problem updating your data')</script>";
        echo "<script>window.location.href='teacher_profile.php';</script>";
    }
}

// LAPORAN PELAJAR
if (isset($_GET['cmdreport'])) {
    $stud_ID = $_GET['report_id'];
    $report = $_GET['txtreport'];

    $icnum = substr($stud_ID, 8, 4);

    $year = date("y");

    $report_ID = "R" . $icnum . $year;

    $sql_report = "INSERT INTO `tblreport`(`report_ID`, `users_ID`, `report_desc`, `report_date`) 
    VALUES ('$report_ID','$stud_ID','$report',NOW())";

    if (mysqli_query($con, $sql_report)) {
        echo "<script>alert('Your report has been sent to the Staff.')</script>";
        echo "<script>window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('There was a problem sending your report.')</script>";
        echo "<script>window.location.href='profile.php';</script>";
    }
}

// LAPORAN CIKGU
elseif (isset($_GET['Tcmdreport'])) {
    $teachers_ID = $_GET['Treport_id'];
    $Treport = $_GET['Ttxtreport'];

    $sql_report = "INSERT INTO `tblreport`(`report_ID`, `users_ID`, `report_desc`, `report_date`) 
    VALUES ('$report_ID','$stud_ID','$report',NOW())";

    if (mysqli_query($con, $sql_report)) {
        echo "<script>alert('Your report has been sent to the Staff.')</script>";
        echo "<script>window.location.href='teacher_profile.php';</script>";
    } else {
        echo "<script>alert('There was a problem sending your report.')</script>";
        echo "<script>window.location.href='teacher_profile.php';</script>";
    }
}


$con->close();
