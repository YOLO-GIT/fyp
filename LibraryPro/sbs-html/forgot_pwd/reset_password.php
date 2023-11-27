<?php
if (isset($_GET['stud'])) {
    // Assign the breadcrumbs
    $user_register = "Reset Password Student";
} elseif (isset($_GET['teacher'])) {
    // Assign the breadcrumbs
    $user_register = "Reset Password Teacher";
} else {
    // Assign the breadcrumbs
    $user_register = "Reset Password";
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
    <title>LibraryPro | Password Reset</title>
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
                                    <a class="nav-link" href="login.php"><i class="fa fa-sign-out"></i> Login</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2">
                    <ul class="email text_align_right">
                        <li class="d_none"><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
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
            <li class="breadcrumb-item"><a href="forgotpwd.php">Forgot Password</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $user_register ?></li>
        </ol>
    </nav>
    <!-- Breadcrumbs Ends -->

    <!-- Forgot Password Start -->
    <div class="contact1">
        <div class="col-md-12">
            <div class="new_title text_align_center">
                <h2>New Password Form</h2>
            </div>
        </div>
        <div class="container">
            <div class="row custom-background">
                <div class="col-md-12">
                    <form name="frmresetpwd" method="post" action="update_password.php" class="main_form_reg" onsubmit="return validated()">
                        <br><br>
                        <div class="col-md-12">
                            <label for="token" class="custom_label_login">Enter Your Forgot Password Token:</label>
                            <input class="contactus" type="text" name="token" required>
                        </div>
                        <div class="col-md-12">
                            <label for="new_password" class="custom_label_login">Enter a new password:</label>
                            <div id="newpwd_error" class="form-control">Please enter your new Password first</div>
                            <input class="contactus" type="password" name="new_password" id="myInputPWD" maxlength="9" pattern=".{9,}" placeholder="Maximum 9 numbers/words">
                            <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;<label class="show_style">Show Password</label>
                        </div>
                        <div class="col-md-12">
                            <label for="confirm_password" class="custom_label_login">Confirm the new password:</label>
                            <div id="confirmpwd_error" class="form-control">Please confirm your password</div>
                            <input class="contactus" type="password" name="confirm_password" id="myConfirmPWD" maxlength="9" pattern=".{9,}" placeholder="Maximum 9 numbers/words">
                            <input type="checkbox" onclick="myConfirm()">&nbsp;&nbsp;<label class="show_style">Show Password</label>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary" name="cmdupdate">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Forgot Password End -->

    <!--  footer -->
    <div class="copyright-custom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>© 2023 Hak Cipta Terpelihara.</a></p>
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
    <script src="custom_script.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>