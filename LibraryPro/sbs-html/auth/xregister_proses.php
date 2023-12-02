<?php
// Include required PHPMailer files
require_once '../../../includes/PHPMailer.php';

// Define namespaces
use PHPMailer\PHPMailer\PHPMailer;

//Create Connection to the database
include '../conn.php';

// isset = is setted to ?
if (isset($_GET["cmdregister"])) {
    // receive submitted value
    $ic = $_GET["txtic"];
    $fname = $_GET["txtfnama"];
    $lname = $_GET["txtlnama"];
    $uname = $_GET["txtunama"];
    $kelas = $_GET["txtkelas"];
    $email = $_GET["txtEmail"];
    $password = hash("sha512", $_GET["txtpwd"]);

    $clean_name = $fname . " " . $lname; // Replaced "&nbsp;" with a space
    $clean_name = strip_tags($clean_name); // Remove any remaining tags

    $roles = "Student";

    // CHeck if the content already exist:
    // CHECKING START

    //IC
    $check_ic_query = "SELECT * FROM tblstudent WHERE stud_ID='$ic'";
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
        $verificationCode = "S" . bin2hex(random_bytes(3));

        // Store the verification code in the database
        $sql_register = "INSERT INTO `tblstudent`(`stud_ID`, `stud_roles`, `stud_Name`, `stud_username`, `stud_Class`, `email`, `stud_pwd`, `date`, `verification_code`, `is_verified`, `reset_token`, `book_count`, `bio`, `birthday`, `negeri`, `report`) 
        VALUES ('$ic','$roles','$clean_name','$uname','$kelas','$email','$password',NOW(), '$verificationCode',0,'xxxxxx',0,'xxxxxx',NOW(),'xxxxx','xxxxxx')";

        //Execute SQL Login Statement
        mysqli_query($con, $sql_register);

        //Create instance of phpmailer
        $mail = new PHPMailer();

        try {
            //Set PHPMailer to use the sendmail transport
            $mail->isSendmail();
            //Set who the message is to be sent from
            $mail->setFrom('ahmadsufi345@gmail.com', 'First Last');
            //Set who the message is to be sent to
            $mail->addAddress($email, 'John Doe');
            //Set the subject line
            $mail->Subject = 'PHPMailer sendmail test';
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            $mail->msgHTML(file_get_contents('contents.html'), __DIR__);

            // Content
            $mail->isHTML(true);
            $mail->Body = 'Your verification code is: ' . $verificationCode;

            //Finally send email
            if ($mail->send()) {
                //Prompt to the user.
                echo "<script>alert('Email Sent..! Proceed to the verfiy page');</script>";
                //Redirect to page ---> Verify.php
                echo "<script>window.location.href='verify.php?stud';</script>";
            } else {
                echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
                mysqli_close($con);
                echo "<script>window.location.href='register.php';</script>";
            }
            //Closing smtp connection
            $mail->smtpClose();
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
            mysqli_close($con);
            echo "<script>window.location.href='register.php';</script>";
        }
        //Close Con
        mysqli_close($con);
    }
} elseif (isset($_GET["cmdteacherregister"])) {
    // receive submitted value
    $Tic = $_GET["txtic"];
    $fname = $_GET["txtfnama"];
    $lname = $_GET["txtlnama"];
    $uname = $_GET["txtunama"];
    $email = $_GET["txtEmail"];
    $password = hash("sha512", $_GET["txtpwd"]);

    $clean_name = $fname . " " . $lname; // Replaced "&nbsp;" with a space
    $teachers_clean_name = strip_tags($clean_name); // Remove any remaining tags

    $roles = "Teacher";

    // Check if the content already exist:
    // CHECKING START

    //IC
    $check_ic_query = "SELECT * FROM tblteachers WHERE teachers_ID='$Tic'";
    $check_ic = mysqli_query($con, $check_ic_query);
    //USERNAME
    $check_username_query = "SELECT * FROM tblteachers WHERE teachers_username='$uname'";
    $check_username = mysqli_query($con, $check_username_query);
    //PASSWORD
    $check_password_query = "SELECT * FROM tblteachers WHERE teachers_Password='$password'";
    $check_password = mysqli_query($con, $check_password_query);

    // CHECKING END

    if (mysqli_num_rows($check_ic) > 0) {
        // Validation if the content is same
        echo "<script>alert('Cannot use the same IC.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='teacher_register.php';</script>";
    } elseif (mysqli_num_rows($check_username) > 0) {
        // Validation if the content is same
        echo "<script>alert('This username already has been used.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='teacher_register.php';</script>";
    } elseif (mysqli_num_rows($check_password) > 0) {
        // Validation if the content is same
        echo "<script>alert('This password already has been used.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='teacher_register.php';</script>";
    } elseif ($email == "" || $email == null) {
        // Validation if the content is same
        echo "<script>alert('Empty Email);</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='teacher_register.php';</script>";
    } else {
        // Generate a verification code
        $verificationCode = "T" . bin2hex(random_bytes(3));

        // Store the verification code in the database
        $sql_register_teachers = "INSERT INTO `tblteachers`(`teachers_ID`, `teacher_roles`, `teachers_Name`, `teachers_username`, `teachers_Password`, `email`, `date_teachers`, `verification_code`, `is_verified`, `reset_token`, `book_count`, `bio`, `birthday`, `negeri`, `report`) 
        VALUES ('$Tic','$roles','$teachers_clean_name','$uname','$password','$email',NOW(),'$verificationCode',0,'xxxxxx',0,'xxxxxx','yyyy-mm-dd','xxxxx','xxxxxx')";

        //Execute SQL Login Statement
        mysqli_query($con, $sql_register_teachers);

        //Create instance of phpmailer
        $mail = new PHPMailer();

        try {
            //Set PHPMailer to use the sendmail transport
            $mail->isSendmail();
            //Set who the message is to be sent from
            $mail->setFrom('ahmadsufi345@gmail.com', 'First Last');
            //Set who the message is to be sent to
            $mail->addAddress($email, 'John Doe');
            //Set the subject line
            $mail->Subject = 'PHPMailer sendmail test';
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            $mail->msgHTML(file_get_contents('contents.html'), __DIR__);

            // Content
            $mail->isHTML(true);
            $mail->Body = 'Your verification code is: ' . $verificationCode;

            //Finally send email
            if ($mail->send()) {
                //Prompt to the user.
                echo "<script>alert('Email Sent..! Proceed to the verfiy page');</script>";
                //Redirect to page ---> Verify.php
                echo "<script>window.location.href='verify.php?teacher';</script>";
            } else {
                echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
                mysqli_close($con);
                echo "<script>window.location.href='teacher_register.php';</script>";
            }
            //Closing smtp connection
            $mail->smtpClose();
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
            mysqli_close($con);
            echo "<script>window.location.href='teacher_register.php';</script>";
        }
        //Close Con
        mysqli_close($con);
    }
}
