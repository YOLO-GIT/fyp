<?php
// Replace the connection details with your own
include '../conn.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// STUDENT PASSWORD
if (isset($_GET['cmdchange'])) {
    $currentPassword = hash("sha512", $_GET['current_password']);
    $newPassword = hash("sha512", $_GET['new_password']);
    $repeatNewPassword = hash("sha512", $_GET['repeat_new_password']);

    //PASSWORD
    $check_password_query = "SELECT * FROM tblstudent WHERE stud_pwd='$newPassword'";
    $check_password = mysqli_query($con, $check_password_query);

    // Perform necessary validation here
    if ($newPassword !== $repeatNewPassword) {
        echo "<script>alert('Katalaluan baharu dan kata laluan baharu berulang tidak sepadan');</script>";
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } elseif (mysqli_num_rows($check_password) > 0) {
        // Validation if the content is same
        echo "<script>alert('Katalaluan ini telah digunakan.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } else {
        // Assuming you have a users table, replace 'users' with your table name
        $sql = "UPDATE tblstudent SET stud_pwd = '$newPassword' WHERE stud_pwd = '$currentPassword'";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Katalaluan anda berjaya diubah.')</script>";
            echo "<script>window.location.href='./profile.php';</script>";
        } else {
            echo "<script>alert('Katalaluan anda tidak berjaya diubah.')</script>" . $con->error;
            echo "<script>window.location.href='./profile.php';</script>";
        }
    }
    // TEACHER PASSWORD
} elseif (isset($_GET['cmdchangeT'])) {
    $currentPasswordT = hash("sha512", $_GET['current_passwordT']);
    $newPasswordT = hash("sha512", $_GET['new_passwordT']);
    $repeatNewPasswordT = hash("sha512", $_GET['repeat_new_passwordT']);

    //PASSWORD
    $check_password_query = "SELECT * FROM tblteachers WHERE teachers_Password ='$currentPasswordT'";
    $check_password = mysqli_query($con, $check_password_query);

    // Perform necessary validation here
    if ($newPasswordT !== $repeatNewPasswordT) {
        echo "<script>alert('Katalaluan baharu dan kata laluan baharu berulang tidak sepadan);</script>";
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } elseif (mysqli_num_rows($check_password) > 0) {
        // Validation if the content is same
        echo "<script>alert('Katalaluan ini telah digunakan.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Profile Panel.
        echo "<script>window.location.href='./profile.php';</script>";
    } else {
        // Assuming you have a users table, replace 'users' with your table name
        $sql = "UPDATE tblteachers SET teachers_Password = '$newPasswordT' WHERE teachers_Password = '$currentPasswordT'";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Katalaluan anda berjaya diubah.')</script>";
            echo "<script>window.location.href='./profile.php';</script>";
        } else {
            echo "<script>alert('Katalaluan anda tidak berjaya diubah.')</script>" . $con->error;
            echo "<script>window.location.href='./profile.php';</script>";
        }
    }
}

$con->close();
