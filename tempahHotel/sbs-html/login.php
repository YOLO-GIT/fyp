<?php // Sekiranya button submit diklik

// isset = is setted to ?
if (isset($_GET["cmdlogin"])) {
    $username = $_GET["txtname"];
    $password = hash("sha512", $_GET["txtpwd"]);

    //Create Connection to the database
    include 'conn.php';

    //Define SQL Statements for comparison
    $sql = "SELECT * FROM `tblstudent` WHERE stud_username='$username' AND stud_pwd='$password'";

    //Execute SQL Statement
    $res = mysqli_query($con, $sql);

    //Check returning value dalam $res or validation
    if (mysqli_num_rows($res) > 0) {
        //Redirecting
        echo "<script>window.location.href='index.php';</script>";
    } else {

        echo "error";
    }

    //Close Con
    mysqli_close($con);
}

?>

<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Login</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- custom style css -->
    <link rel="stylesheet" href="css/custom_style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout inner_page">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->

    <!-- Login -->
    <div class="contact1">
        <div class="col-md-12">
            <div class="new_title text_align_center">
                <h2>Login Form</h2>
            </div>
        </div>
        <div class="container">
            <div class="row custom-background">
                <div class="col-md-12">
                    <form id="request" class="main_form_login" action="" method="get">
                        <br><br>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Name*" type="text" name="txtname" maxlength="10">
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Password*" type="password" name="txtpwd">
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="send_btn1" name="cmdlogin" value="Login">
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="titlepage text_align_left">
                        <h3>Not Register?</h3>
                        <h3>Click <a href="register.php">here for registration</a></h3>
                        <h3>Click <a href="logout.php">here for logout</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/custom.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>