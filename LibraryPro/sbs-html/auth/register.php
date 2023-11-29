<?php // Sekiranya button submit diklik

// Check if session "idcust" dah wujud atau belum
if (isset($_SESSION["IDStud"]) || isset($_SESSION["IDTeachers"])) {
    $log = "Logout";
    $func_todo = "logout.php";
} else {
    $log = "Login";
    $func_todo = "login.php";
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
    <title>Library Pro | Registration</title>
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
                                    <a class="nav-link" href="<?= $func_todo ?>"><i class="fa fa-sign-out"></i> <?= $log ?></a>
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
            <li class="breadcrumb-item"><a href="login.php">Login</a></li>
            <li class="breadcrumb-item active" aria-current="page">Student Register</li>
        </ol>
    </nav>
    <!-- Breadcrumbs Ends -->

    <!-- Registration Form Start -->
    <div class="register_body">
        <div class="col-md-12">
            <div class="new_title text_align_center mt-5">
                <h2>Student Register</h2>
            </div>
        </div>
        <div class="container">
            <div class="row custom-background-reg">
                <div class="col-md-12">
                    <form name="frmregisteration" class="main_form_reg" action="register_proses.php" method="get" onsubmit="return validated()">
                        <br><br>
                        <div class="row">
                            <!-- IC -->
                            <div class="col-md-12">
                                <label class="custom_label_reg">Nombor IC*: IC Anda tanpa "-"</label>
                                <div id="ic_error" class="form-control">Tolong Isi IC Anda Dengan Betul (Letak Nombor Sahaja)</div>
                                <input class="contactus" placeholder="IC Number*" type="text" name="txtic" maxlength="12" pattern=".{12,}" autocomplete="off">
                            </div>
                            <!-- NAMA PERTAMA -->
                            <div class=" col-md-6">
                                <label class="custom_label_reg">Nama Depan Anda*, E.g.: Ahmad</label>
                                <div id="fname_error" class="form-control">Tolong Isi Nama Depan Anda Dengan Betul (Letak Huruf Sahaja)</div>
                                <input class="contactus" placeholder="Nama Depan Anda: Ahmad (Maksimum 10 Perkataan)" type="text" name="txtfnama" maxlength="10" autocomplete="off">
                            </div>
                            <!-- NAMA KEDUA -->
                            <div class="col-md-6">
                                <label class="custom_label_reg">Nama Belakang Anda*, E.g.: Sufi</label>
                                <div id="lname_error" class="form-control">Tolong Isi Nama Belakang Anda Dengan Betul (Letak Huruf Sahaja)</div>
                                <input class="contactus" placeholder="Nama Belakang Anda: Aziz (Maksimum 10 Perkataan)" type="text" name="txtlnama" maxlength="10" autocomplete="off">
                            </div>
                            <!-- NAMA SAMARAN -->
                            <div class="col-md-6">
                                <label class="custom_label_reg">Username Anda*, E.g.: user123</label>
                                <div id="uname_error" class="form-control">Tolong Isi Username Anda Dengan Betul</div>
                                <input class="contactus" placeholder="Username anda (Maksimum 10 Perkataan)" type="text" name="txtunama" maxlength="10" autocomplete="off">
                            </div>
                            <!-- KELAS -->
                            <div class="col-md-6">
                                <label class="custom_label_reg">Kelas Anda*, E.g.: 5 AB</label>
                                <div id="kelas_error" class="form-control">Tolong Isi Kelas Anda Dengan Betul</div>
                                <input class="contactus" placeholder="Kelas*" type="text" name="txtkelas" autocomplete="off" maxlength=10>
                            </div>
                            <!-- EMAIL -->
                            <div class="col-md-12">
                                <label class="custom_label_reg">Email Anda*, E.g.: m-12345678@moe-dl.edu.my</label>
                                <div id="email_error" class="form-control">Tolong Isi Email Anda Dengan Betul</div>
                                <input class="contactus" placeholder="Email*" type="text" name="txtEmail" autocomplete="off" maxlength="25">
                            </div>
                            <!-- PASSWORD -->
                            <div class="col-md-12">
                                <label class="custom_label_reg">Password Anda*:</label>
                                <div id="pwd_error" class="form-control">Tolong Isi Password Anda Dengan Betul (Hanya Huruf Atau/Dan Nombor Sahaja)</div>
                                <input class="contactus" placeholder="Password (Maksimum 9 nombor/perkataan)*" type="password" name="txtpwd" id="myInputPWD" maxlength="9" pattern=".{9,}" autocomplete="off">
                                <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;<label class="show_style">Show Password</label>
                            </div>
                            <!-- SUBMIT -->
                            <div class="col-md-12">
                                <button type="submit" class="btn_reg" name="cmdregister">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="titlepage text_align_left">
                        <h3>Already Register?</h3>
                        <h3>Click <a href="login.php">here for login</a></h3>
                        <h3>Click <a href="teacher_register.php">here for Teacher</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration Form End -->

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
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="booking.php?simple">Search</a></li>
                                        <li><a href="advance_booking.php?advance">Advance Search</a></li>
                                        <li><a href="about_us.php">About Us</a></li>
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
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="../js/custom.js"></script>
    <!-- Custom JS -->
    <script src="../js/validation_student.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>