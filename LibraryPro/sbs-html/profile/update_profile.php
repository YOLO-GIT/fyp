<?php
// Replace the connection details with your own
include '../conn.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// STUDENT PROFILE
if (isset($_GET['cmdsave'])) {
    $id = $_GET["txtID"];
    $name = $_GET["txtname"];
    $kelas = $_GET["txtkelas"];
    $uname = $_GET["txtusername"];

    // Perform necessary validation here
    if ($name == "" || $name == null) {
        // Validation if the content is same
        echo "<script>alert('Please do not leave the name empty.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } elseif ($kelas == "" || $kelas == null) {
        // Validation if the content is same
        echo "<script>alert('Please do not leave the class empty.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } elseif ($uname == "" || $uname == null) {
        // Validation if the content is same
        echo "<script>alert('Please do not leave the username empty.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } else {
        // Assuming you have a users table, replace 'users' with your table name
        $sql = "UPDATE tblstudent SET stud_Name = '$name', stud_username = '$uname', stud_Class = '$kelas' WHERE stud_ID = '$id'";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Your info successfully changed.')</script>";
            echo "<script>window.location.href='./profile.php';</script>";
        } else {
            echo "<script>alert('Your info unsuccessfully changed.')</script>" . $con->error;
            echo "<script>window.location.href='./profile.php';</script>";
        }
    }
    // TEACHER PROFILE
} elseif (isset($_GET['cmdTsave'])) {
    $Tid = $_GET["txtTid"];
    $Tname = $_GET["txtTname"];
    $Tuname = $_GET["txtTuname"];

    // Perform necessary validation here
    if ($Tname == "" || $Tname == null) {
        // Validation if the content is same
        echo "<script>alert('Please do not leave the name empty.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='teacher_profile.php';</script>";
    } elseif ($Tuname == "" || $Tuname == null) {
        // Validation if the content is same
        echo "<script>alert('Please do not leave the username empty.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='teacher_profile.php';</script>";
    } else {
        // Assuming you have a users table, replace 'users' with your table name
        $sql = "UPDATE tblteachers SET teachers_Name = '$Tname', teachers_username = '$Tuname' WHERE teachers_ID = '$Tid'";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Your info successfully changed.')</script>";
            echo "<script>window.location.href='teacher_profile.php';</script>";
        } else {
            echo "<script>alert('Your info unsuccessfully changed.')</script>" . $con->error;
            echo "<script>window.location.href='teacher_profile.php';</script>";
        }
    }
}

$con->close();
