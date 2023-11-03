<?php
//Create Connection to the database
include 'conn.php';

// isset = is setted to ?
if (isset($_GET["cmdregister"])) {
    // receive submitted value
    $ic = $_GET["txtic"];
    $fname = $_GET["txtfnama"];
    $lname = $_GET["txtlnama"];
    $uname = $_GET["txtunama"];
    $kelas = $_GET["txtkelas"];
    $password = hash("sha512", $_GET["txtpwd"]);

    $clean_name = $fname . " " . $lname; // Replaced "&nbsp;" with a space
    $clean_name = strip_tags($clean_name); // Remove any remaining tags

    $email = "ahmadsufi345@gmail.com";

    if (intval(substr($ic, 11, 1)) % 2 == 1) {
        $jantina = "J";
    } else {
        $jantina = "B";
    }

    $icnum = substr($ic, 8, 4);

    $id = "S" . $jantina . $icnum;

    // CHeck if the content already exist:
    // CHECKING START

    //IC
    $check_ic_query = "SELECT * FROM tblstudent WHERE stud_ID='$id'";
    $check_ic = mysqli_query($con, $check_ic_query);
    //USERNAME
    $check_username_query = "SELECT * FROM tblstudent WHERE stud_username='$uname'";
    $check_username = mysqli_query($con, $check_username_query);
    //PASSWORD
    $check_password_query = "SELECT * FROM tblstudent WHERE stud_pwd='$password'";
    $check_password = mysqli_query($con, $check_password_query);

    // CHECKING END

    if (mysqli_num_rows($check_ic) > 0) {
        // Validation if the content is same
        echo "<script>alert('Cannot use the same IC.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='register.php';</script>";
    } elseif (mysqli_num_rows($check_username) > 0) {
        // Validation if the content is same
        echo "<script>alert('This username already has been used.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='register.php';</script>";
    } elseif (mysqli_num_rows($check_password) > 0) {
        // Validation if the content is same
        echo "<script>alert('This password already has been used.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='register.php';</script>";
    } else {
        // Generate a verification code
        $verificationCode = bin2hex(random_bytes(3));

        // Store the verification code in the database
        $sql_login = "INSERT INTO `tblstudent`(`stud_ID`, `stud_Name`, `stud_username`, `stud_Class`, `email`, `stud_pwd`, `date`, `verification_code`) 
        VALUES ('$id','$clean_name','$uname','$kelas','$email','$password',NOW(), '$verificationCode')";

        //Execute SQL Login Statement
        $res = mysqli_query($con, $sql_login);

        //Close Con
        mysqli_close($con);

        // Send the verification code to the user's email
        $to = $email;
        $subject = 'Verification Code';
        $message = 'Your verification code is: ' . $verificationCode;
        $headers = 'From: ahmadsufi345@gmail.com' . "\r\n" .
            'Reply-To: ahmadsufi345@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Send the email
        mail($to, $subject, $message, $headers);

        //Prompt to the user.
        echo "<script>alert('Proceed to the verfiy page');</script>";

        //Redirect to page ---> Verify.php
        echo "<script>window.location.href='verify.php';</script>";
    }
}
