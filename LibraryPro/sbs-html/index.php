<?php
// Start the session
session_start();

// Call the SQL
include 'conn.php';

// Check if session exist
if (isset($_SESSION["IDStud"])) {
    $log = "Logout";
    $func_todo = "auth/logout.php";
    $profile = "profile/profile.php";
    $stud_ID = $_SESSION["IDStud"];
    $confirmation_logout = "onclick='return confirm(\"Adakah anda ingin $log?\");'";

    $studentQuery = "SELECT * FROM tblstudent WHERE stud_ID = ?";
    $stmt = $con->prepare($studentQuery);
    $stmt->bind_param("s", $stud_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $statement_res = "Welcome Back, " . $user['stud_Name'];
    $stmt->close();
} elseif (isset($_SESSION["IDTeachers"])) {
    $log = "Logout";
    $func_todo = "auth/logout.php";
    $profile = "profile/teacher_profile.php";
    $confirmation_logout = "onclick='return confirm(\"Adakah anda ingin $log?\");'";

    $teachers_ID = $_SESSION["IDTeachers"];

    $teachersQuery = "SELECT * FROM tblteachers WHERE teachers_ID = ?";
    $stmt = $con->prepare($teachersQuery);
    $stmt->bind_param("s", $teachers_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $statement_res = "Welcome Back, " . $user['teachers_Name'];
    $stmt->close();
} else {
    $statement_res = null;
    $log = "Login";
    $func_todo = "auth/login.php";
    $confirmation_logout = "";
}
?>

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
    <title>LibraryPro | Home</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom_style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <div class="header">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class=" col-md-2 col-sm-2 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <!-- Logo -->
                                <a href="index.php"><img src="images/new_logo.png" alt="#" /></a>
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
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="booking.php"><i class="fa fa-search"></i> Carian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="advance_booking.php"><i class="fa fa-search-plus"></i> Carian Terperinci</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="buku_saya.php"><i class="fa fa-book"></i> Buku Saya</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-universal-access"></i> Berkaitan Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $func_todo ?>" <?= $confirmation_logout ?>><i class="fa fa-sign-out"></i> <?= $log ?></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2">
                    <ul class="text_align_right">
                        <li class="nav-item">
                            <a href="<?= $profile ?>"><i class="fa fa-user" aria-hidden="true"></i></a>&nbsp;&nbsp;<?= $statement_res ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- top -->
    <div class="full_bg">

        <div class="slider_main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- carousel code -->
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <!-- first slide -->
                                <div class="carousel-item active">
                                    <div class="carousel-caption relative">
                                        <div class="row d_flex mb-3">
                                            <div class="col-md-5">
                                                <div class="board">
                                                    <i><img src="images/top_icon.png" alt="#" /></i>
                                                    <h3>
                                                        Library<br> Pro<br> SMK Tok Dor
                                                    </h3>
                                                    <div class="link_btn">
                                                        <a class="read_more" href="Javascript:void(0)">Read More <span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="banner_img">
                                                    <figure><img class="img_responsive" src="images/pic1.jpg"></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- second slide -->
                                <div class="carousel-item">
                                    <div class="carousel-caption relative">
                                        <div class="row d_flex">
                                            <div class="col-md-5">
                                                <div class="board">
                                                    <i><img src="images/top_icon.png" alt="#" /></i>
                                                    <h3>
                                                        Library<br> Pro<br> SMK Tok Dor
                                                    </h3>
                                                    <div class="link_btn">
                                                        <a class="read_more" href="Javascript:void(0)">Read More <span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="banner_img">
                                                    <figure><img class="img_responsive" src="images/pic2.jpg"></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- third slide-->
                                <div class="carousel-item">
                                    <div class="carousel-caption relative">
                                        <div class="row d_flex">
                                            <div class="col-md-5">
                                                <div class="board">
                                                    <i><img src="images/top_icon.png" alt="#" /></i>
                                                    <h3>
                                                        Library<br> Pro<br> SMK Tok Dor
                                                    </h3>
                                                    <div class="link_btn">
                                                        <a class="read_more" href="Javascript:void(0)">Read More <span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="banner_img">
                                                    <figure><img class="img_responsive" src="images/pic3.jpg"></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- controls -->
                            <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end banner -->

    <!-- Event Start -->
    <div class="full_bg" data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000">
        <div class="slider_main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- carousel code -->
                        <div id="carouselForEvents" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselForEvents" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselForEvents" data-slide-to="1"></li>
                                <li data-target="#carouselForEvents" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <!-- first slide -->
                                <div class="carousel-item active">
                                    <div class="carousel-caption relative">
                                        <div class="row d-flex flex-row-reverse mb-3">
                                            <div class="col-md-5">
                                                <div class="board">
                                                    <h3>
                                                        Library<br> Pro<br> SMK Tok Dor
                                                    </h3>
                                                    <div class="link_btn">
                                                        <a class="read_more" href="Javascript:void(0)">Read More <span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="banner_img">
                                                    <figure><img class="img_responsive" src="images/new_event1.jpg"></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- second slide -->
                                <div class="carousel-item">
                                    <div class="carousel-caption relative">
                                        <div class="row d-flex flex-row-reverse mb-3">
                                            <div class="col-md-5">
                                                <div class="board">
                                                    <h3>
                                                        Library<br> Pro<br> SMK Tok Dor
                                                    </h3>
                                                    <div class="link_btn">
                                                        <a class="read_more" href="Javascript:void(0)">Read More <span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="banner_img">
                                                    <figure><img class="img_responsive" src="images/pic2.jpg"></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- third slide-->
                                <div class="carousel-item">
                                    <div class="carousel-caption relative">
                                        <div class="row d-flex flex-row-reverse mb-3">
                                            <div class=" col-md-5">
                                                <div class="board">
                                                    <h3>
                                                        Library<br> Pro<br> SMK Tok Dor
                                                    </h3>
                                                    <div class="link_btn">
                                                        <a class="read_more" href="Javascript:void(0)">Read More <span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="banner_img">
                                                    <figure><img class="img_responsive" src="images/pic3.jpg"></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- controls -->

                        </div>
                        <a class="carousel-control-prev" href="#carouselForEvents" role="button" data-slide="prev">
                            <i class="fa fa-arrow-left" aria-hidden="true" style="color: black;"></i>
                        </a>
                        <a class="carousel-control-next" href="#carouselForEvents" role="button" data-slide="next">
                            <i class="fa fa-arrow-right" aria-hidden="true" style="color: black;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event end -->

    <!-- testimonial -->
    <div class="testimonial" data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="titlepage text_align_center">
                        <h2>Testimonial</h2>
                    </div>
                </div>
            </div>
            <!-- start slider section -->
            <div class="row">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container-fluid">
                                    <div class="carousel-caption relative">
                                        <div class="row d_flex">
                                            <div class="col-md-3">
                                                <div class="test_box text_align_center">
                                                    <span><img src="images/test1.png" alt="#" /></span>
                                                    <h4>Jone Lo</h4>
                                                    <img class="img_responsive" src="images/te.png" alt="#" />
                                                    <p>humour, or randomised words which don't look even slightly believable. If you
                                                        are</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="test_box white_bg text_align_center">
                                                    <span><img src="images/test2.png" alt="#" /></span>
                                                    <h4>Michale</h4>
                                                    <img class="img_responsive" src="images/te2.png" alt="#" />
                                                    <p>humour, or randomised words which don't look even slightly believable. If you
                                                        are going to use a passage of Lorem Ipsum, you need to be sure</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="test_box text_align_center">
                                                    <span><img src="images/test3.png" alt="#" /></span>
                                                    <h4>Disol</h4>
                                                    <img class="img_responsive" src="images/te.png" alt="#" />
                                                    <p>humour, or randomised words which don't look even slightly believable. If you
                                                        are</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container-fluid">
                                    <div class="carousel-caption relative">
                                        <div class="row d_flex">
                                            <div class="col-md-3">
                                                <div class="test_box text_align_center">
                                                    <span><img src="images/test2.png" alt="#" /></span>
                                                    <h4>Michale</h4>
                                                    <img class="img_responsive" src="images/te.png" alt="#" />
                                                    <p>humour, or randomised words which don't look even slightly believable. If you
                                                        are</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="test_box white_bg text_align_center">
                                                    <span><img src="images/test3.png" alt="#" /></span>
                                                    <h4>Disol</h4>
                                                    <img class="img_responsive" src="images/te2.png" alt="#" />
                                                    <p> humour, or randomised words which don't look even slightly believable. If you
                                                        are going to use a passage of Lorem Ipsum, you need to be sure</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="test_box text_align_center">
                                                    <span><img src="images/test1.png" alt="#" /></span>
                                                    <h4>Jone Lo</h4>
                                                    <img class="img_responsive" src="images/te.png" alt="#" />
                                                    <p>humour, or randomised words which don't look even slightly believable. If you
                                                        are</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container-fluid">
                                    <div class="carousel-caption relative">
                                        <div class="row d_flex">
                                            <div class="col-md-3">
                                                <div class="test_box text_align_center">
                                                    <span><img src="images/test3.png" alt="#" /></span>
                                                    <h4>Disol</h4>
                                                    <img class="img_responsive" src="images/te.png" alt="#" />
                                                    <p>humour, or randomised words which don't look even slightly believable. If you
                                                        are</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="test_box  white_bg text_align_center">
                                                    <span><img src="images/test1.png" alt="#" /></span>
                                                    <h4>Jone Lo</h4>
                                                    <img class="img_responsive" src="images/te2.png" alt="#" />
                                                    <p> humour, or randomised words which don't look even slightly believable. If you
                                                        are going to use a passage of Lorem Ipsum, you need to be sure</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="test_box text_align_center">
                                                    <span><img src="images/test2.png" alt="#" /></span>
                                                    <h4>Michale</h4>
                                                    <img class="img_responsive" src="images/te.png" alt="#" />
                                                    <p>humour, or randomised words which don't look even slightly believable. If you
                                                        are</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonial -->
    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="infoma">
                            <h3>Contact Us</h3>
                            <ul class="conta">
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Locations
                                </li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call +01 1234567890</li>
                                <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)">
                                        demo@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row border_left">
                            <div class="col-md-12">
                                <div class="infoma">
                                    <h3>Newsletter</h3>
                                    <form class="form_subscri">
                                        <div class="row">
                                            <div class="col-md-12">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="newsl" placeholder="Enter your email" type="text" name="Enter your email">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="newsl" placeholder="Enter your email" type="text" name="Enter your email">
                                            </div>
                                            <div class="col-md-4">
                                                <button class="subsci_btn">subscribe</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="infoma">
                                    <h3>Useful Link</h3>
                                    <ul class="fullink">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="skating.html">Skating</a></li>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="infoma text_align_left">
                                    <ul class="social_icon">
                                        <li><a href="Javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="Javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="Javascript:void(0)"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                        <li><a href="Javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </li>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/custom.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>