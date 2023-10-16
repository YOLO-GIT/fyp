<?php
include_once "../config/dbconnect.php";

if (isset($_GET["cmdadd"])) {
    $ic = $_GET["txtIC"];
    $fname = $_GET["txtfname"];
    $lname = $_GET["txtlname"];
    $uname = $_GET["txtuname"];
    $password = $_GET["txtpwd"];

    $clean_name = $fname . "&nbsp;" . $lname;

    if (intval(substr($ic, 11, 1)) % 2 == 1) {
        $jantina = "J";
    } else {
        $jantina = "B";
    }

    $icnum = substr($ic, 8, 4);

    $id = $jantina . $icnum;

    $check_username_query = "SELECT * FROM tblteachers WHERE teachers_username='$uname'";
    $check_username = mysqli_query($conn, $check_username_query);

    $check_password_query = "SELECT * FROM tblteachers WHERE teachers_Password='$password'";
    $check_password = mysqli_query($conn, $check_password_query);

    if (mysqli_num_rows($check_username) > 0) {
        echo "<script>alert('This username already has been used.'); window.location.href = window.location.href;</script>";
    } elseif (mysqli_num_rows($check_password) > 0) {
        echo "<script>alert('This password already has been used.'); window.location.href = window.location.href;</script>";
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
