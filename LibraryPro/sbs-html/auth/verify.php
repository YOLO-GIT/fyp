<?php
// Create Connection to the database
include '../conn.php';

// Process verification form
if (isset($_POST["cmdverify"])) {
    $inputVerificationCode = $_POST['verification_code'];

    // Retrieve the stored verification code from the database
    $sql = "SELECT * FROM tblstudent WHERE verification_code = '$inputVerificationCode'";
    $result = mysqli_query($con, $sql);

    $teachers_sql = "SELECT * FROM tblteachers WHERE verification_code = '$inputVerificationCode'";
    $teacher_result = mysqli_query($con, $teachers_sql);

    if (mysqli_num_rows($result) > 0) {

        // Update the user's account as verified
        $row = mysqli_fetch_assoc($result);
        $userId = $row['stud_ID'];
        $updateSql = "UPDATE tblstudent SET is_verified = 1 WHERE stud_ID = '$userId'";

        if (mysqli_query($con, $updateSql)) {
            echo "<script>alert('Account verified successfully!');</script>";
            //Redirect to page ---> Login.php
            echo "<script>window.location.href='login.php';</script>";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } elseif (mysqli_num_rows($teacher_result) > 0) {

        $row = mysqli_fetch_assoc($teacher_result);
        $userId = $row['teachers_ID'];
        $TeacherupdateSql = "UPDATE tblteachers SET is_verified = 1 WHERE teachers_ID = '$userId'";

        if (mysqli_query($con, $TeacherupdateSql)) {
            echo "<script>alert('Account verified successfully!');</script>";

            echo "<script>window.location.href='login.php';</script>";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
        echo "Invalid verification code. Please try again.";
    }

    mysqli_close($con);
}

if (isset($_GET['stud'])) {
    // Assign the breadcrumbs
    $link_register = "register.php";
    $user_register = "Student Register";
} elseif (isset($_GET['teacher'])) {
    // Assign the breadcrumbs
    $link_register = "teacher_register.php";
    $user_register = "Teacher Register";
} else {
    // Assign the breadcrumbs
    $link_register = "register.php";
    $user_register = "Default";
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
    <title>Library Pro | Verification</title>
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
                                    <a class="nav-link" href="../booking.php?simple"><i class="fa fa-search"></i> Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../advance_booking.php?advance"><i class="fa fa-search-plus"></i> Advanced Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../about.php"><i class="fa fa-universal-access"></i> About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../buku_saya.php"><i class="fa fa-book"></i> My Book</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php"><i class="fa fa-sign-out"></i> Login</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- end header inner -->

    <!-- Breadcrumbs Start -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Login</li>
            <li class="breadcrumb-item"><?= $user_register ?></li>
            <li class="breadcrumb-item active" aria-current="page">Verification</li>
        </ol>
    </nav>
    <!-- Breadcrumbs Ends -->

    <!-- Verify -->
    <div class="verify_body mt-5">
        <div class="col-md-12">
            <div class="new_title text_align_center mt-5">
                <h2>Verification Form</h2>
            </div>
        </div>
        <div class="container">
            <div class="row custom-background">
                <div class="col-md-12">
                    <form class="main_form_login" action="" method="post">
                        <br><br>
                        <div class="col-md-12">
                            <label for="verification_code" class="custom_label_login">Verification Code:</label>
                            <input class="contactus" type="text" id="verification_code" name="verification_code" autocomplete="off" required>
                        </div>
                        <div class="col-md-12">
                            <input class="btn btn-primary" type="submit" name="cmdverify" value="Verify">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Verify -->

    <!--  footer -->
    <footer>
        <div class="custom_footer mt-5">
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