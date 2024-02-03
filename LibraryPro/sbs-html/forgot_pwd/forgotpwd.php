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
    <title>LibraryPro | Forgot Password</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- custom style css -->
    <link rel="stylesheet" href="../css/custom_style.css">
    <link rel="stylesheet" href="forgotpwd_style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Icon here -->
    <link rel="icon" type="image/x-icon" href="../images/icon.png">
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
                                <a href="../index.php"><img src="../images/new_logo.png" alt="#" /></a>
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
                                    <a class="nav-link" href="../booking.php"><i class="fa fa-search"></i> Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../advance_booking.php"><i class="fa fa-search-plus"></i> Advanced Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../buku_saya.php"><i class="fa fa-book"></i> My Book</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../about.php"><i class="fa fa-universal-access"></i> About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../login.php"><i class="fa fa-sign-out"></i> Login</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2">
                    <ul class="email text_align_right">
                        <li class="d_none"><a href="../profile.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- Breadcrumbs Start -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../auth/login.php">Login</a></li>
            <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
        </ol>
    </nav>
    <!-- Breadcrumbs Ends -->

    <!-- Forgot Password Start -->
    <div class="forgotpwd mt-5">
        <div class="col-md-12">
            <div class="new_title text_align_center">
                <h2>Password Forgot Form</h2>
            </div>
        </div>
        <div class="container">
            <div class="row custom-background">
                <div class="col-md-12">
                    <form method="post" action="send_reset_link.php" class="main_form_login">
                        <br><br>
                        <div class="col-md-12">
                            <label for="email" class="custom_label_login">Enter your email address:</label>
                            <input class="contactus" type="email" id="email" name="email" required autocomplete="off">
                        </div>
                        <div class="col-md-12">
                            <input class="btn btn-primary" type="submit" value="Submit" name="cmdreset">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Forgot Password End -->

    <!--  footer -->
    <div class="custom_footer">
        <div class="copyright-custom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>© 2023 Hak Cipta Terpelihara.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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