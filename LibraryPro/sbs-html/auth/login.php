<?php // Sekiranya button submit diklik

// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION["IDStud"]) || isset($_SESSION["IDTeachers"]) || isset($_SESSION["IDAdmin"])) {
    echo "<script>window.location.href='../index.php';</script>";
    exit;
}

// isset = is setted to ?
if (isset($_POST["cmdlogin"])) {
    $username = $_POST["txtname"];
    $password = hash("sha512", $_POST["txtpwd"]);

    //Create Connection to the database
    include '../conn.php';

    // Define SQL Statement for comparison
    $sql = "SELECT * FROM `tblstudent` WHERE stud_username='$username' AND stud_pwd='$password'";
    // Define SQL Statement for comparison
    $teacher_sql = "SELECT * FROM `tblteachers` WHERE teachers_username='$username' AND teachers_Password='$password'";
    // Admin
    $admin_sql = "SELECT * FROM `tbllibrarians` WHERE librarians_uname='$username' AND librarians_password='$password'";

    // Execute SQL Statement
    $res = mysqli_query($con, $sql);
    // Execute SQL Statement
    $teacher_res = mysqli_query($con, $teacher_sql);
    // Execute SQL Statement
    $admin_res = mysqli_query($con, $admin_sql);

    // Check returning value in $res for validation
    if (mysqli_num_rows($res) > 0) {
        $student = mysqli_fetch_assoc($res);
        // Create a session with a name IDStud
        $_SESSION["IDStud"] = $student["stud_ID"];
        // Inform to the user
        echo "<script>alert('Login Success');</script>";
        // Redirect to index.php
        echo "<script>window.location.href='../index.php';</script>";
        exit;
    } elseif (mysqli_num_rows($teacher_res) > 0) {
        $teacher = mysqli_fetch_assoc($teacher_res);
        // Create a session
        $_SESSION["IDTeachers"] = $teacher["teachers_ID"];
        // Inform to the user
        echo "<script>alert('Login Success');</script>";
        // Redirect to index.php
        echo "<script>window.location.href='../index.php';</script>";
        exit;
    } elseif (mysqli_num_rows($admin_res) > 0) {
        $validate = mysqli_fetch_assoc($admin_res);
        // Create a session
        $_SESSION["IDAdmin"] = $validate["librarians_ID"];
        // Inform to the user
        echo "<script>alert('Login Success');</script>";
        // Redirect to index.php
        echo "<script>window.location.href='../../../admin/admin_panel/index.php';</script>";
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }

    // Close Connection
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- custom style css -->
    <link rel="stylesheet" href="../css/custom_style.css">
    <link rel="stylesheet" href="../css/custom_booking.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../images/fevicon.png" type="image/gif" />
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
        <div class="loader"><img src="../images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <div class="header">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class=" col-md-2 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <!-- Logo -->
                                <a href="index.php"><img src="../images/new_logo.png" alt="#" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="../index.php"><i class="fa fa-home"></i> Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../booking.php?simple"><i class="fa fa-search"></i> Carian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../advance_booking.php?advance"><i class="fa fa-search-plus"></i> Carian Terperinci</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../buku_saya.php"><i class="fa fa-book"></i> Buku Saya</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-universal-access"></i> Berkaitan Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php"><i class="fa fa-sign-out"></i> Login</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2">
                    <ul class="email text_align_right">
                        <li class="d_none"><a href="../profile/profile.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end header inner -->

    <!-- Breadcrumbs Start -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
    <!-- Breadcrumbs Ends -->

    <!-- Login -->
    <div class="login_page">
        <div class="col-md-12">
            <div class="new_title text_align_center mt-5">
                <h2>Login Form</h2>
            </div>
        </div>
        <div class="container">
            <div class="row custom-background">
                <div class="col-md-12">
                    <form name="frmlogin" class="main_form_login" action="" method="post">
                        <br><br>
                        <div class=" col-md-12">
                            <label class="custom_label_login">Username Anda:</label>
                            <input class="contactus" placeholder="Username*" type="text" name="txtname" maxlength="10" autocomplete="off" required>
                        </div>
                        <div class="col-md-12">
                            <label class="custom_label_login">Password Anda:</label>
                            <input class="contactus" placeholder="Password*" type="password" name="txtpwd" id="myInputPWD" maxlength="9" autocomplete="off" required>
                            <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;<label class="show_style">Show Password</label>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn_login" name="cmdlogin" value="Login">
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="titlepage text_align_left">
                        <h3>Not Register?</h3>
                        <h3>Click <a href="register.php">here for registration</a></h3>
                        <h3>Forgot Password?
                            <a href="../forgot_pwd/forgotpwd.php" onclick="return confirm('Adakah betul anda tidak ingat katalaluan anda?');">
                                Click Here
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->

    <!--  footer -->
    <footer>
        <div class="footer mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="infoma">
                            <h3>Contact Us</h3>
                            <ul class="conta">
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Sekolah Menengah Kebangsaan Tok Dor
                                    Kg Tok Dor, Jerteh, Malaysia
                                    Terengganu Darul Iman, Malaysia</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call +60 09-694 5011</li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i>smktd.ppdbesut@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row border_left">
                            <div class="col-md-12 mb-3">
                                <div class="infoma">
                                    <h3>Useful Link</h3>
                                    <ul class="fullink">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">Search</a></li>
                                        <li><a href="skating.html">Advance Search</a></li>
                                        <li><a href="shop.html">About Us</a></li>
                                        <li><a href="contact.html">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="infoma text_align_left">
                                    <h3>Socials</h3>
                                    <ul class="social_icon">
                                        <li><a href="https://www.facebook.com/semted/?locale=ms_MY"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="https://www.instagram.com/smktokdor/   "><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2023 PERPUSTAKAAN SMK TOK DOR</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Javascript files-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="../js/custom.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>