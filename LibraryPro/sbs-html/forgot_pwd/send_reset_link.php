<?php
// Include required PHPMailer files
require_once '../../../includes/Exception.php';
require_once '../../../includes/SMTP.php';
require_once '../../../includes/PHPMailer.php';

// Define namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Inside send_reset_link.php
include '../conn.php';
if (isset($_POST["cmdreset"])) {
    // Retrieve the submitted email address
    $email = $_POST['email'];

    // Check if the email exists in the database
    // Perform a database query to check if the email exists
    // Example query (replace with your own database query)
    $check_stud_query = "SELECT * FROM tblstudent WHERE email = '$email'";
    $result = mysqli_query($con, $check_stud_query);
    $check_teachers_query = "SELECT * FROM tblteachers WHERE teachers_ID = '$user_ID' AND email = '$email'";
    $result_teachers = mysqli_query($con, $check_teachers_query);

    // If the email exists, proceed with the "Forgot Password" process
    if (mysqli_num_rows($result) > 0) {

        // Generate a random reset token
        $resetToken = "S" . bin2hex(random_bytes(3)); // Generate a 64-character random string (adjust the length as needed)

        // Store the reset token in the database
        $updateTokenQuery = "UPDATE `tblstudent` SET reset_token = '$resetToken' WHERE email = '$email'";
        if (mysqli_query($con, $updateTokenQuery)) {
            //Create instance of phpmailer
            $mail = new PHPMailer(true);

            try {
                //Set mailer to use smtp
                $mail->isSMTP();
                //define smtp host
                $mail->Host = 'smtp.gmail.com';
                //enable smtp authentication
                $mail->SMTPAuth = true;
                //set type of encryption (ssl/tls)
                $mail->SMTPSecure = 'tls';
                //set port to connect smtp
                $mail->Port = 587;
                //set mail username
                $mail->Username = 'ahmadsufi345@gmail.com';
                //set gmail password
                $mail->Password = 'inke lhms enuv gsxe';
                //set email subject
                $mail->Subject = 'Verification';
                //Set sender email
                $mail->setFrom('ahmadsufi345@gmail.com');
                // Add recipient email address
                $mail->addAddress($email, 'Users'); // $to should contain the recipient's email address

                // Content
                $mail->isHTML(true);
                $mail->Body = "Your New Password token is: $resetToken";

                //Finally send email
                if ($mail->send()) {
                    echo "<script>alert('Email Sent..! Please Check your email.')</script>";
                    echo "<script>window.location.href='reset_password.php';</script>";
                } else {
                    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
                    echo "<script>window.location.href='forgotpwd.php';</script>";
                }
                //Closing smtp connection
                $mail->smtpClose();
            } catch (Exception $e) {
                echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
                echo "<script>window.location.href='forgotpwd.php';</script>";
            }
        } else {
            echo "Failed to generate the reset token. Please try again later.";
            echo "<script>window.location.href='./sbs-html/login.php';</script>";
        }
    } elseif (mysqli_num_rows($result_teachers) > 0) {
        // Proceed with the "Forgot Password" process
        // Inside send_reset_link.php (after verifying the email)

        // Generate a random reset token
        $resetToken = bin2hex(random_bytes(3)); // Generate a 64-character random string (adjust the length as needed)

        // Store the reset token in the database
        $updateTokenQuery = "UPDATE `tblteachers` SET reset_token = '$resetToken' WHERE teachers_ID = '$user_ID' AND email = '$email'";
        if (mysqli_query($con, $updateTokenQuery)) {
            //Create instance of phpmailer
            $mail = new PHPMailer(true);

            try {
                //Set mailer to use smtp
                $mail->isSMTP();
                //define smtp host
                $mail->Host = 'smtp.gmail.com';
                //enable smtp authentication
                $mail->SMTPAuth = true;
                //set type of encryption (ssl/tls)
                $mail->SMTPSecure = 'tls';
                //set port to connect smtp
                $mail->Port = 587;
                //set mail username
                $mail->Username = 'ahmadsufi345@gmail.com';
                //set gmail password
                $mail->Password = 'inke lhms enuv gsxe';
                //set email subject
                $mail->Subject = 'Verification';
                //Set sender email
                $mail->setFrom('ahmadsufi345@gmail.com');
                // Add recipient email address
                $mail->addAddress($email, 'Users'); // $to should contain the recipient's email address

                // Content
                $mail->isHTML(true);
                $mail->Body = "Please click the following link to reset your password: http://localhost:3000/LibraryPro/sbs-html/forgot_pwd/reset_password.php?token=$resetToken;";

                //Finally send email
                if ($mail->send()) {
                    echo "<script>alert('Email Sent..!')</script>";
                    echo "<script>window.location.href='reset_password.php?token=$resetToken';</script>";
                } else {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                //Closing smtp connection
                $mail->smtpClose();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Failed to generate the reset token. Please try again later.";
        }
    } else {
        // Display an error message indicating that the email is not registered
        echo "The provided ID does not exist.";
    }
}
