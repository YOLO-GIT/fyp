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
    $confirmation_logout = "onclick='return confirm(\"Are you sure you want to $log?\");'";

    $studentQuery = "SELECT * FROM tblstudent WHERE stud_ID = ?";
    $stmt = $con->prepare($studentQuery);
    $stmt->bind_param("s", $stud_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $statement_res = "HI, " . $user['stud_Name'];
    $stmt->close();
} elseif (isset($_SESSION["IDTeachers"])) {
    $log = "Logout";
    $func_todo = "auth/logout.php";
    $profile = "profile/teacher_profile.php";
    $confirmation_logout = "onclick='return confirm(\"Are you sure you want to $log?\");'";

    $teachers_ID = $_SESSION["IDTeachers"];

    $teachersQuery = "SELECT * FROM tblteachers WHERE teachers_ID = ?";
    $stmt = $con->prepare($teachersQuery);
    $stmt->bind_param("s", $teachers_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $statement_res = "HI, " . $user['teachers_Name'];
    $stmt->close();
} else {
    $statement_res = null;
    $log = "Login";
    $func_todo = "auth/login.php";
    $profile = "profile/profile.php";
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
    <title>Library Pro | About Us</title>
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
    <!-- Icon here -->
    <link rel="icon" type="image/x-icon" href="images/icon.png">
    <style>
        /* ABOUT US */
/* About Us Section Styles */
.about_us {
    background: linear-gradient(109.6deg, rgb(245, 239, 249) 30.1%, rgb(207, 211, 236) 100.2%);
    padding: 40px 0; /* Adjust the padding as needed */
}

.about_us .title {
    text-align: center;
    color: #007bff; /* Set text color to blue */
    font-size: 36px;
    font-weight: 600;
    margin-bottom: 30px;
}

.about_us .form-control {
    background-color: #ffffff; /* Set background color to white */
    border: 1px solid #007bff; /* Set border color to blue */
    padding: 20px;
    border-radius: 10px;
}

.about_us h3 {
    color: #007bff; /* Set heading color to blue */
}

.about_us p {
    color: #343a40; /* Set paragraph text color to a dark color for better readability */
    font-size: 16px;
    line-height: 1.6;
}

/* Responsive Styles (Adjust as needed) */
@media (max-width: 767px) {
    .about_us .title {
        font-size: 28px;
    }

    .about_us p {
        font-size: 14px;
    }
}

    </style>
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout display_page">
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
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="booking.php?simple"><i class="fa fa-search"></i> Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="advance_booking.php?advance"><i class="fa fa-search-plus"></i> Advanced Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="buku_saya.php"><i class="fa fa-book"></i> My Book</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="about.php"><i class="fa fa-universal-access"></i> About Us</a>
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

    <!-- Breadcrumbs Start -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
    </nav>
    <!-- Breadcrumbs Ends -->

    <!-- About Us Start -->
    <div class="about_us mt-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">About Us</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-control">
                        <div class="vision_block">
                            <h3>Vision</h3>
                            <p>Our vision is to ensure that the user will receive the source of knowledge that they need to strive in the new world era.</p>
                        </div>
                        <div class="mission_block">
                            <h3>Mission</h3>
                            <p>Our mission is to providing a user-centric, comprehensive digital library platform that connects individuals with diverse and curated content. Through innovative technology and a passion for knowledge sharing, we strive to enhance the learning experience, promote inclusivity, and foster a love for reading among our users.</p>
                        </div>
                        <div class="purpose_block">
                            <h3>Purpose</h3>
                            <p>Library Pro existed for many reasons, to give access to information, promoting literacy, and nurturing a global community of thinkers. We believe in the transformative power of knowledge and seek to provide a platform that transcends boundaries, making learning a universal and enriching experience for all.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us End -->

    <!--  footer -->
    <footer>
        <div class="footer">
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
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="booking.php?simple">Search</a></li>
                                        <li><a href="advance_booking.php?advance">Advance Search</a></li>
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="auth/logout.php">Logout</a></li>
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