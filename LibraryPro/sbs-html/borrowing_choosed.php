<?php
include 'conn.php';

//Timezone
date_default_timezone_set("Asia/Kuala_Lumpur");

session_start();

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
    echo "<script>alert('Sila Login Dahulu.');</script>";
    echo "<script>window.location.href='auth/login.php';</script>";
    $confirmation_logout = "";
}
if (isset($_GET['stud_ID'])) {
    $stud_ID = $_GET['stud_ID'];
} elseif (isset($_GET['teachers_ID'])) {
    $teachers_ID = $_GET['teachers_ID'];
} else {
    echo "Error";
}

if (isset($_GET['book_ID'])) {
    $book_ID = $_GET['book_ID'];
} else {
    echo "No book selected.";
}

if (isset($_GET['search'])) {
    $statement_search = 'search';
    $search = "Carian";
    $search_link = "booking.php?simple";
} elseif (isset($_GET['ad_search'])) {
    $statement_search = 'ad_search';
    $search = "Carian Terperinci";
    $search_link = "advance_booking.php?advance";
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
    <title>Library Pro | Buku</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- custom style css -->
    <link rel="stylesheet" href="css/custom_style.css">
    <link rel="stylesheet" href="css/display_book.css">
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

<body class="main-layout display_page" onload="startTime()">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
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
                                    <a class="nav-link" href="booking.php?simple"><i class="fa fa-search"></i> Carian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="advance_booking.php?advance"><i class="fa fa-search-plus"></i> Carian Terperinci</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="buku_saya.php"><i class="fa fa-book"></i> Buku Saya</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php"><i class="fa fa-universal-access"></i> Berkaitan Kami</a>
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
                        <li class="nav-item"><a href="<?= $profile ?>"><i class="fa fa-user" aria-hidden="true"></i></a>&nbsp;&nbsp;<?= $statement_res ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end header inner -->

    <!-- Breadcrumbs Start -->
    <nav aria-label="breadcrumb">
        <?php
        $query = "SELECT * FROM tblbook WHERE book_ID = $book_ID";
        $result = $con->query($query);
        $book = $result->fetch_assoc()
        ?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $search_link ?>"><?= $search ?></a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="display_book.php?book_ID=<?= $book_ID ?>&<?= $statement_search ?>"><?= $book["book_title"] ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Pilihan Buku: <?= $book["book_title"] ?></li>
        </ol>
    </nav>
    <!-- Breadcrumbs Ends -->

    <!-- Pilihan Buku Start -->
    <div class="container_book">
        <form method="get" action="borrowing_sent.php">
            <div id="clock" class="form-control bold-text text_align_center"></div>
            <?php
            // Retrieve the book_ID from the URL parameters
            $book_ID = $_GET['book_ID'] ?? '';

            if ($stud_ID = $_GET['stud_ID'] ?? '') {
                // Use prepared statements to prevent SQL injection
                $studentQuery = "SELECT * FROM tblstudent WHERE stud_ID = ?";
                $stmt = $con->prepare($studentQuery);
                $stmt->bind_param("s", $stud_ID);
                $stmt->execute();
                $studentResult = $stmt->get_result();
                $student = $studentResult->fetch_assoc();
                $stmt->close();

                // Display student details
                echo "<h2>Student Information</h2>";
                echo "<input name='txtuserID' value= '" . $student['stud_ID'] . "' hidden>";
                echo "<input name='txtuserName' value= '" . $student['stud_Name'] . "' hidden>";
                echo "<div class='alert alert-primary'>";
                echo "<p>Name: " . $student['stud_ID'] . "</p>";
                echo "<p>Name: " . $student['stud_Name'] . "</p>";
                echo "<p>Kelas: " . $student['stud_Class'] . "</p>";
                echo "</div>";
                // Display other student details...
            } elseif ($teachers_ID = $_GET['teachers_ID'] ?? '') {
                // Use prepared statements for teachers to prevent SQL injection
                $teachersQuery = "SELECT * FROM tblteachers WHERE teachers_ID = ?";
                $stmt = $con->prepare($teachersQuery);
                $stmt->bind_param("s", $teachers_ID);
                $stmt->execute();
                $teachersResult = $stmt->get_result();
                $teachers = $teachersResult->fetch_assoc();
                $stmt->close();

                // Display teachers details
                echo "<h2>Teachers Information</h2>";
                echo "<input name='txtuserID' value= '" . $teachers['teachers_ID'] . "' hidden>";
                echo "<input name='txtuserName' value= '" . $teachers['teachers_Name'] . "' hidden>";
                echo "<div class='alert alert-primary'>";
                echo "<p>Name: " . $teachers['teachers_ID'] . "</p>";
                echo "<p>Name: " . $teachers['teachers_Name'] . "</p>";
                echo "</div>";
                // Display other teacher details...
            }
            // Use prepared statements for the book query
            $bookQuery = "SELECT * FROM tblbook WHERE book_ID = ?";
            $stmt = $con->prepare($bookQuery);
            $stmt->bind_param("s", $book_ID);
            $stmt->execute();
            $bookResult = $stmt->get_result();
            if ($bookResult->num_rows > 0) {
                $book = $bookResult->fetch_assoc();

                // Display book details
                echo "<h2>Book Information</h2>";
                // Display book details as before
            ?>
                <!-- Pilihan Buku Start -->
                <div class="card_book_display mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../../admin/admin_panel/controller/<?= $book['book_image'] ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <input name="txtbookID" value="<?= $book["book_ID"] ?>" hidden>
                                <input name="txtbookName" value="<?= $book["book_title"] ?>" hidden>
                                <h2 class="card-title"><?= $book["book_title"] ?></h2>
                                <p class="bold-text">Pengarang:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <p><?= $book["book_author"] ?></p>
                                </div>
                                <p class="bold-text">No. ISBN:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <p><?= $book["book_ISBN"] ?></p>
                                </div>
                                <p class="bold-text">Penerbit:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <p><?= $book["publisher"] ?></p>
                                </div>
                                <p class="bold-text">Status:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <p><?= $book["book_status"] ?></p>
                                </div>
                                <p class="bold-text">Masa Booking:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <input class="form-control" type="text" name="masabooking" value="<?php echo date("h:i:s a") ?>" readonly>
                                </div>
                                <p class="bold-text">Start Tarikh Pinjam:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <input class="form-control" type="date" name="dtstartbooking" value="<?php echo date('Y-m-d'); ?>" readonly>
                                </div>
                                <p class="bold-text">End Tarikh Pinjam:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <input class="form-control" type="date" name="dtendbooking" value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" readonly>
                                    <small class="form-text text-muted">You should return the book after a week has passed.</small>
                                </div>
                            </div>
                            <br>
                            <div class="text-right mr-3 mb-3">
                                <button type="submit" name="cmdbooking" class="btn btn-primary">Simpan</button>
                                &nbsp;
                                <a href="<?= $search_link ?>" class="btn btn-primary">Kembali Semula</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ... -->
            <?php
            } else {
                echo "No book found.";
            }
            ?>

        </form>
    </div>
    <!-- Pilihan Buku End -->

    <?php
    mysqli_close($con);
    ?>

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
    <script>
        AOS.init();
    </script>
</body>

</html>