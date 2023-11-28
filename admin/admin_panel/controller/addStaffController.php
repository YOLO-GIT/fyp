<?php
include_once "../config/dbconnect.php";

if (isset($_POST["cmdadd"])) {
    $staff_ID = $_POST["txtic"];
    $staff_name = $_POST["txtname"];
    $staff_uname = $_POST["txtuname"];
    $staff_pwd = hash("sha512", $_POST["txtpwd"]);

    // Check if the content already exist:
    // CHECKING START

    //NO IC
    $check_ic_query = "SELECT * FROM tblstaff WHERE staff_ID='$staff_ID'";
    $check_ic = mysqli_query($conn, $check_ic_query);
    //Username
    $check_uname_query = "SELECT * FROM tblstaff WHERE staff_uname='$staff_uname'";
    $check_uname = mysqli_query($conn, $check_uname_query);
    //Password
    $check_pwd_query = "SELECT * FROM tblstaff WHERE staff_pwd='$staff_pwd'";
    $check_pwd = mysqli_query($conn, $check_pwd_query);

    // CHECKING END

    if (mysqli_num_rows($check_ic) > 0) {
        // Validation if the content is same
        echo "<script>alert('Cannot use the same IC Number.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($conn);
        // Sending back to the Staff Panel.
        echo "<script>window.location.href='../adminView/viewStaff.php';</script>";
    } elseif (mysqli_num_rows($check_uname) > 0) {
        echo "<script>alert('Cannot use the same Username.');</script>";
        mysqli_close($conn);
        echo "<script>window.location.href='../adminView/viewStaff.php';</script>";
    } elseif (mysqli_num_rows($check_pwd) > 0) {
        echo "<script>alert('Cannot use the same Password.');</script>";
        mysqli_close($conn);
        echo "<script>window.location.href='../adminView/viewStaff.php';</script>";
    } else {
        //Timezone
        date_default_timezone_set("Asia/Kuala_Lumpur");

        $sql = "INSERT INTO `tblstaff`(`staff_ID`, `staff_name`, `staff_uname`, `staff_pwd`, `date_join`) 
        VALUES ('$staff_ID','$staff_name','$staff_uname','$staff_pwd',NOW())";

        $insert = mysqli_query($conn, $sql);
        mysqli_close($conn);

        if (!$insert) {
            echo mysqli_error($conn);
        } else {
            //Prompt to the user.
            echo "<script>alert('Staff successfully added.');</script>";

            //Redirect to page ---> Login.php
            echo "<script>window.location.href='../adminView/viewStaff.php';</script>";
        }
    }
}
