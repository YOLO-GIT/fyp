<?php

include_once "../config/dbconnect.php";

if (isset($_GET["cmdadd"])) {
    $ic = $_GET["txtIC"];
    $fname = $_GET["txtfname"];
    $lname = $_GET["txtlname"];
    $uname = $_GET["txtuname"];
    // SHA the password: 
    $password = hash('sha512', $_GET["txtpwd"]);

    $clean_name = $fname . " " . $lname; // Replaced "&nbsp;" with a space
    $clean_name = strip_tags($clean_name); // Remove any remaining tags

    if (intval(substr($ic, 11, 1)) % 2 == 1) {
        $jantina = "J";
    } else {
        $jantina = "B";
    }

    $icnum = substr($ic, 8, 4);

    $id = "T" . $jantina . $icnum;

    // Check if the content already exist:
    // CHECKING START

    //IC
    $check_ic_query = "SELECT * FROM tblteachers WHERE teachers_ID='$id'";
    $check_ic = mysqli_query($conn, $check_ic_query);

    //USERNAME
    $check_username_query = "SELECT * FROM tblteachers WHERE teachers_username='$uname'";
    $check_username = mysqli_query($conn, $check_username_query);
    //PASSWORD
    $check_password_query = "SELECT * FROM tblteachers WHERE teachers_Password='$password'";
    $check_password = mysqli_query($conn, $check_password_query);

    // CHECKING END

    if (mysqli_num_rows($check_ic) > 0) {
        // Validation if the content is same
        echo "<script>alert('Cannot use the same IC.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($conn);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='../adminView/viewTeachers.php';</script>";
    } elseif (mysqli_num_rows($check_username) > 0) {
        // Validation if the content is same
        echo "<script>alert('This username already has been used.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($conn);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='../adminView/viewTeachers.php';</script>";
    } elseif (mysqli_num_rows($check_password) > 0) {
        // Validation if the content is same
        echo "<script>alert('This password already has been used.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($conn);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='../adminView/viewTeachers.php';</script>";
    } else {
        $sql = "INSERT INTO `tblteachers`(`teachers_ID`, `teachers_Name`, `teachers_username`, `teachers_Password`, `date_teachers`) 
        VALUES ('$id','$clean_name','$uname','$password',NOW())";

        $insert = mysqli_query($conn, $sql);

        if (!$insert) {
            echo mysqli_error($conn);
        } else {
            // Prompt the user.
            echo "<script>alert('Your teacher registration is successful. Please proceed to the home page'); window.location.href='../index.php';</script>";
        }
    }

    mysqli_close($conn);
}
