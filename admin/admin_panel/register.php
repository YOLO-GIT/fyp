<?php
// Create Connection to the database
include "./config/dbconnect.php";

// isset = is setted to ?
if (isset($_GET["cmdregister"])) {
    // receive submitted value
    $ic = $_GET["txtic"];
    $fname = $_GET["txtfnama"];
    $lname = $_GET["txtlnama"];
    $uname = $_GET["txtunama"];
    $password = hash("sha512", $_GET["txtpwd"]);

    $clean_name = $fname . " " . $lname; // Replaced "&nbsp;" with a space
    $clean_name = strip_tags($clean_name); // Remove any remaining tags

    if (intval(substr($ic, 11, 1)) % 2 == 1) {
        $jantina = "J";
    } else {
        $jantina = "B";
    }

    $icnum = substr($ic, 8, 4);

    $id = "A" . $icnum . $jantina;

    // CHeck if the content already exist:
    // CHECKING START

    //IC
    $check_ic_query = "SELECT * FROM tbllibrarians WHERE librarians_ID='$id'";
    $check_ic = mysqli_query($conn, $check_ic_query);
    //USERNAME
    $check_username_query = "SELECT * FROM tbllibrarians WHERE librarians_uname='$uname'";
    $check_username = mysqli_query($conn, $check_username_query);
    //PASSWORD
    $check_password_query = "SELECT * FROM tbllibrarians WHERE librarians_password='$password'";
    $check_password = mysqli_query($conn, $check_password_query);

    // CHECKING END

    if (mysqli_num_rows($check_ic) > 0) {
        // Validation if the content is same
        echo "<script>alert('Cannot use the same IC.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($conn);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='register.php';</script>";
    } elseif (mysqli_num_rows($check_username) > 0) {
        // Validation if the content is same
        echo "<script>alert('This username already has been used.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($conn);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='register.php';</script>";
    } elseif (mysqli_num_rows($check_password) > 0) {
        // Validation if the content is same
        echo "<script>alert('This password already has been used.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($conn);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='register.php';</script>";
    } else {
        // SQL Login For Student
        $sql_login = "INSERT INTO `tbllibrarians`(`librarians_ID`, `librarians_name`, `librarians_uname`, `librarians_password`, `status_approved`, `status_declined`) 
        VALUES ('$id','$clean_name','$uname','$password','[value-5]','[value-6]')";

        //Execute SQL Login Statement
        $res = mysqli_query($conn, $sql_login);

        //Close Con
        mysqli_close($conn);

        //Prompt to the user.
        echo "<script>alert('Your registration is successful. Please proceed to the login page');</script>";

        //Redirect to page ---> Login.php
        echo "<script>window.location.href='./login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    </link>
    <link rel="stylesheet" href="./assets/css/login.css">
    </link>
</head>

<body>
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="titlepage">
                    <h3>Register Form</h3>
                </div>
            </div>
            <div class="col-md-12">
                <br>
                <form id="request" class="main_form" action="" method="get">
                    <div class="row">
                        <div class="col-md-12">
                            <input class="custom_input" placeholder="IC*" type="text" name="txtic" maxlength="12">
                        </div>
                        <div class="col-md-6">
                            <input class="custom_input" placeholder="Nama Depan*" type="text" name="txtfnama" maxlength="10">
                        </div>
                        <div class="col-md-6">
                            <input class="custom_input" placeholder="Nama Belakang*" type="text" name="txtlnama" maxlength="10">
                        </div>
                        <div class="col-md-6">
                            <input class="custom_input" placeholder="Username*" type="text" name="txtunama" maxlength="10">
                        </div>
                        <div class="col-md-6">
                            <input class="custom_input" placeholder="Katalaluan*" type="password" name="txtpwd">
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="send_btn" name="cmdregister" value="Login">
                        </div>
                    </div>
                </form>
                <br>
            </div>
            <div class="col-md-12">
                <div class="bottompage">
                    <h3>Already have an account?</h3>
                    <p>Click<a href="./login.php"> here for login</a></p>
                </div>
            </div>
        </div>
    </div>

    <?php
    // if (isset($_GET['category']) && $_GET['category'] == "success") {
    //     echo '<script> alert("Category Successfully Added")</script>';
    // } else if (isset($_GET['category']) && $_GET['category'] == "error") {
    //     echo '<script> alert("Adding Unsuccess")</script>';
    // }
    // if (isset($_GET['size']) && $_GET['size'] == "success") {
    //     echo '<script> alert("Size Successfully Added")</script>';
    // } else if (isset($_GET['size']) && $_GET['size'] == "error") {
    //     echo '<script> alert("Adding Unsuccess")</script>';
    // }
    // if (isset($_GET['variation']) && $_GET['variation'] == "success") {
    //     echo '<script> alert("Variation Successfully Added")</script>';
    // } else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
    //     echo '<script> alert("Adding Unsuccess")</script>';
    // }
    ?>


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>