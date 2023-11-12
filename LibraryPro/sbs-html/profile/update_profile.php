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
        echo "<script>alert('Sila jangan biar kosong pada nama anda.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } elseif ($kelas == "" || $kelas == null) {
        // Validation if the content is same
        echo "<script>alert('Sila jangan biar kosong pada kelas anda.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } elseif ($uname == "" || $uname == null) {
        // Validation if the content is same
        echo "<script>alert('Sila jangan biar kosong pada username anda.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } else {
        // Assuming you have a users table, replace 'users' with your table name
        $sql = "UPDATE tblstudent SET stud_Name = '$name', stud_username = '$uname', stud_Class = '$kelas' WHERE stud_ID = '$id'";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Info anda berjaya diubah.')</script>";
            echo "<script>window.location.href='./profile.php';</script>";
        } else {
            echo "<script>alert('Info anda tidak berjaya diubah.')</script>" . $con->error;
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
        echo "<script>alert('Sila jangan biar kosong pada nama anda.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } elseif ($Tuname == "" || $Tuname == null) {
        // Validation if the content is same
        echo "<script>alert('Sila jangan biar kosong pada username anda.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } else {
        // Assuming you have a users table, replace 'users' with your table name
        $sql = "UPDATE tblteachers SET teachers_Name = '$Tname', teachers_username = '$Tuname' WHERE teachers_ID = '$Tid'";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Info anda berjaya diubah.')</script>";
            echo "<script>window.location.href='./profile.php';</script>";
        } else {
            echo "<script>alert('Info anda tidak berjaya diubah.')</script>" . $con->error;
            echo "<script>window.location.href='./profile.php';</script>";
        }
    }
}

$con->close();
