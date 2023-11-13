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
        echo "<script>alert('Profil anda sudah dikemaskini.')</script>";
        echo "<script>window.location.href='./profile.php';</script>";
    } else {
        echo "<script>alert('Ada masalah semasa mengemaskini data anda.')</script>";
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
        echo "<script>alert('Profil anda sudah dikemaskini.')</script>";
        echo "<script>window.location.href='./profile.php';</script>";
    } else {
        echo "<script>alert('Ada masalah semasa mengemaskini data anda.')</script>";
        echo "<script>window.location.href='./profile.php';</script>";
    }
}

// LAPORAN PELAJAR
if (isset($_GET['cmdreport'])) {
    $stud_ID = $_GET['report_id'];
    $report = $_GET['txtreport'];

    $sql_report = "UPDATE `tblstudent` 
    SET `report`='$report' WHERE `stud_ID` = '$stud_ID'";

    if (mysqli_query($con, $sql_report)) {
        echo "<script>alert('Laporan anda sudah dihantar.')</script>";
        echo "<script>window.location.href='./profile.php';</script>";
    } else {
        echo "<script>alert('Ada masalah semasa menghantar laporan anda.')</script>";
        echo "<script>window.location.href='./profile.php';</script>";
    }
}
// LAPORAN CIKGU
elseif (isset($_GET['Tcmdreport'])) {
    $teachers_ID = $_GET['Treport_id'];
    $Treport = $_GET['Ttxtreport'];

    $sql_report = "UPDATE `tblteachers` 
    SET `report`='$Treport' WHERE `teachers_ID` = '$teachers_ID'";

    if (mysqli_query($con, $sql_report)) {
        echo "<script>alert('Laporan anda sudah dihantar.')</script>";
        echo "<script>window.location.href='./profile.php';</script>";
    } else {
        echo "<script>alert('Ada masalah semasa menghantar laporan anda.')</script>";
        echo "<script>window.location.href='./profile.php';</script>";
    }
}


$con->close();
