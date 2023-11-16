<?php
// Inside update_password.php
include '../conn.php';
// Check if the reset token is provided
if (isset($_POST['token'])) {
    $token = $_POST['token'];

    // Example query (replace with your own database query)
    $check_stud_token = "SELECT * FROM tblstudent WHERE reset_token = '$token'";
    $result = mysqli_query($con, $check_stud_token);
    // Example query (replace with your own database query)
    $check_teachers_token = "SELECT * FROM tblteachers WHERE reset_token = '$token'";
    $result_teachers = mysqli_query($con, $check_teachers_token);

    if (mysqli_num_rows($result) > 0) {
        // Proceed with the password update process
        if (isset($_POST['cmdupdate'])) {
            $newPassword = hash("sha512", $_POST['new_password']);
            $confirmPassword = hash("sha512", $_POST['confirm_password']);
            //PASSWORD
            $check_password_query = "SELECT * FROM tblstudent WHERE stud_pwd='$newPassword'";
            $check_password = mysqli_query($con, $check_password_query);
            if (mysqli_num_rows($check_password) > 0) {
                // Validation if the content is same
                echo "<script>alert('This password already has been used.');</script>";
                echo "<script>window.location.href='reset_password.php';</script>";
            } else {
                if ($confirmPassword != $newPassword) {
                    echo "<script>alert('The new password and the confirmed password do not match.')</script>";
                    echo "<script>window.location.href='reset_password.php';</script>";
                } else {
                    $update_stud_password = "UPDATE tblstudent SET stud_pwd = '$newPassword', reset_token = NULL WHERE reset_token = '$token'";
                    if (mysqli_query($con, $update_stud_password)) {
                        echo "<script>alert('Password has been updated successfully.')</script>";
                        echo "<script>window.location.href='../login.php';</script>";
                    } else {
                        echo "<script>alert('Failed to update the password. Please try again.')</script>";
                        echo "<script>window.location.href='reset_password.php';</script>";
                    }
                }
            }
        }
    } elseif (mysqli_num_rows($result_teachers) > 0) {
        // Proceed with the password update process
        if (isset($_POST['cmdupdate'])) {
            $newPassword = hash("sha512", $_POST['new_password']);
            $confirmPassword = hash("sha512", $_POST['confirm_password']);

            // Verify that the new password and the confirmed password match
            if ($newPassword === $confirmPassword) {

                $update_teachers_password = "UPDATE tblteachers SET teachers_Password = '$newPassword', reset_token = NULL WHERE reset_token = '$token'";
                if (mysqli_query($con, $update_teachers_password)) {
                    echo "Password has been updated successfully.";
                    echo "<script>window.location.href='../login.php';</script>";
                } else {
                    echo "Failed to update the password. Please try again later.";
                }
            } else {
                echo "The new password and the confirmed password do not match.";
            }
        }
    } else {
        // Display an error message indicating that the token is invalid or has expired
        echo "The provided token is invalid or has expired.";
    }
}
