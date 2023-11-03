<?php
// Create Connection to the database
include 'conn.php';

// Process verification form
if (isset($_POST["cmdverify"])) {
    $inputVerificationCode = $_POST['verification_code'];

    // Retrieve the stored verification code from the database
    $sql = "SELECT * FROM tblstudent WHERE verification_code = '$inputVerificationCode'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Update the user's account as verified
        $row = mysqli_fetch_assoc($result);
        $userId = $row['stud_ID'];
        $updateSql = "UPDATE tblstudent SET is_verified = 1 WHERE stud_ID = '$userId'";

        if (mysqli_query($con, $updateSql)) {
            echo "Account verified successfully!";
            //Redirect to page ---> Login.php
            echo "<script>window.location.href='login.php';</script>";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
        echo "Invalid verification code. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Verification</title>
</head>

<body>
    <form method="post" action="">
        <label for="verification_code">Verification Code:</label><br>
        <input type="text" id="verification_code" name="verification_code"><br><br>
        <input type="submit" name="cmdverify" value="Verify">
    </form>
</body>

</html>