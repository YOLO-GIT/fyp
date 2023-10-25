<?php

session_start();
// isset = is setted to ?
if (isset($_GET["cmdlogin"])) {
    $username = $_GET["txtusername"];
    $pwd = $_GET["txtpwd"];

    // Create Connection to the database
    include "./config/dbconnect.php";

    // Define SQL Statements for comparison
    $sql = "SELECT * FROM `tbllibrarians` WHERE librarians_name='$username' AND librarians_password='$pwd'";

    echo $sql;
    // Execute SQL Statement
    $res = mysqli_query($conn, $sql);

    // Check returning value in $res or validation
    if (mysqli_num_rows($res) > 0) {
        $validate = mysqli_fetch_assoc($res);
        // Create a session with a name IDCUST
        $_SESSION["valid"] = $validate["librarians_ID"];

        echo "<script>alert('Katalaluan Betul');</script>";
        // Redirecting
        echo "<script>window.location.href='./index.php';</script>";
    } else {
        echo "<script>alert('Katalaluan Salah');</script>";
    }

    // Close Connection
    mysqli_close($conn);
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
                    <h3>Login Form</h3>
                </div>
            </div>
            <div class="col-md-12">
                <br>
                <form id="request" class="main_form" action="" method="get">
                    <div class="row">
                        <div class="col-md-12">
                            <input class="custom_input" placeholder="Username*" type="text" name="txtusername" maxlength="10">
                        </div>
                        <div class="col-md-12">
                            <input class="custom_input" placeholder="Password*" type="password" name="txtpwd">
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="send_btn" name="cmdlogin" value="Login">
                        </div>
                    </div>
                </form>
                <br>
            </div>
            <div class="col-md-12">
                <div class="bottompage">
                    <h3>Not Register?</h3>
                    <p>Click<a href="register.php"> here for registeration</a></p>
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