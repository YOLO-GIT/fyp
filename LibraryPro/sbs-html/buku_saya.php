<?php
include 'conn.php';

session_start();

// Set the timezone to match your database
date_default_timezone_set("Asia/Kuala_Lumpur");

// Check if session exist
if (isset($_SESSION["IDStud"])) {
    $log = "Logout";
    $func_todo = "auth/logout.php";
    $profile = "profile/profile.php";
    $stud_ID = $_SESSION["IDStud"];
    $confirmation_logout = "onclick='return confirm(\"Are you sure you want to $log?\");'";
    $userLoggedIn = true;

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
    $userLoggedIn = true;

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
    echo "<script>alert('Please Login First.');</script>";
    echo "<script>window.location.href='auth/login.php';</script>";
    $confirmation_logout = "";
    $userLoggedIn = false;
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
    <title>Library Pro | My Book</title>
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
                                    <a class="nav-link" href="booking.php?simple"><i class="fa fa-search"></i> Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="advance_booking.php?advance"><i class="fa fa-search-plus"></i> Advanced Search</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="buku_saya.php"><i class="fa fa-book"></i> My Book</a>
                                </li>
                                <li class="nav-item">
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
                        <?php if ($userLoggedIn) : ?>
                            <li class="nav-item">
                                <a href="<?= $profile ?>"><i class="fa fa-user" aria-hidden="true"></i></a>&nbsp;&nbsp;<?= $statement_res ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end header inner -->

    <!-- Breadcrumbs Start -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Book</li>
        </ol>
    </nav>
    <!-- Breadcrumbs Ends -->

    <!-- Display Buku yang dipilih -->
    <div class="container_book">
        <form action="" method="GET">
            <!-- Sorting Function -->
            <div class="input-group mb-3">
                <select name="sort_alphabet" class="form-control">
                    <option value="">Show All</option>
                    <option value="Borrowing">Borrowing</option>
                    <option value="Booking">Booking</option>
                </select>
                <button type="submit" class="btn btn-primary ml-2">
                    Sort
                </button>
            </div>
        </form>

        <?php
        $sort_option = isset($_GET['sort_alphabet']) ? $_GET['sort_alphabet'] : '';

        if (isset($_SESSION["IDStud"])) {
            $query = "SELECT * FROM tbltransaction WHERE user_ID = '$stud_ID'";
        } elseif (isset($_SESSION["IDTeachers"])) {
            $query = "SELECT * FROM tbltransaction WHERE user_ID = '$teachers_ID'";
        }

        if (!empty($sort_option)) {
            $query .= " AND transc_name = '$sort_option' ORDER BY `transc_name`";

            if ($sort_option === "Borrowing") {
                $query .= " ASC";
            } elseif ($sort_option === "Booking") {
                $query .= " DESC";
            }
        }
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <!-- Pilihan Buku Start -->
                <div class="card_book_display mb-3">
                    <!-- rest of the code remains unchanged -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h2 class="card-title"><?= $row["book_title"] ?></h2>
                                <p class="bold-text">Your name:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <p><?= $row["user_Name"] ?></p>
                                </div>
                                <p class="bold-text">Chosen Book:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <p><?= $row["book_title"] ?></p>
                                </div>
                                <p class="bold-text">Start Date:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <p><?= $row["start_date"] ?></p>
                                </div>
                                <p class="bold-text">End Date:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <p><?= $row["end_date"] ?></p>
                                </div>
                                <p class="bold-text">Time Picked:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <p><?= $row["time"] ?></p>
                                </div>
                                <p class="bold-text">Status:&nbsp;&nbsp;</p>
                                <div class="alert alert-primary">
                                    <p><?= $row["transc_name"] ?></p>
                                </div>
                                <div class='text_align_right'>
                                    <?php
                                    $transc_ID = $row['transc_ID'];
                                    $sql_transc = "SELECT * FROM tbltransaction WHERE transc_ID = '$transc_ID' AND transc_name = 'Borrowing'";
                                    $check_status = mysqli_query($con, $sql_transc);

                                    // Retrieve the timestamp of the record
                                    $timestampQuery = "SELECT transc_ID, book_ID, time FROM tbltransaction WHERE transc_ID='$transc_ID'";
                                    $timeResult = mysqli_query($con, $timestampQuery);

                                    if (mysqli_num_rows($check_status) > 0) {
                                        if ($timeResult) {
                                            $row = mysqli_fetch_assoc($timeResult);
                                            $recordTimestamp = strtotime($row['time']);

                                            if (time() - $recordTimestamp <= 3600) {
                                                // Cancellation
                                                echo "<a href='cancel_transaction.php?transc_ID=" . $row['transc_ID'] . "' class='btn btn-primary' onclick='return confirm(\"Are you sure you want to cancel this book?\");'>Cancel</a>";
                                                echo "<a href='return_transaction.php?transc_ID=" . $row['transc_ID'] . "' class='btn btn-danger ml-3' onclick='return confirm(\"Are you sure you want to Return this book?\");'>Return</a>";
                                            } else {
                                                if (time() - $recordTimestamp >= 86400) {
                                                    echo "<a href='cancel_transaction.php?transc_ID=" . $row['transc_ID'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to cancel this book?\");'>Cancel</a>";
                                                    echo "<a href='return_transaction.php?transc_ID=" . $row['transc_ID'] . "' class='btn btn-primary ml-3' onclick='return confirm(\"Are you sure you want to Return this book?\");'>Return</a>";
                                                } else {
                                                    echo "<a href='cancel_transaction.php?transc_ID=" . $row['transc_ID'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to cancel this book?\");'>Cancel</a>";
                                                    echo "<a href='return_transaction.php?transc_ID=" . $row['transc_ID'] . "' class='btn btn-danger ml-3' onclick='return confirm(\"Are you sure you want to Return this book?\");'>Return</a>";
                                                }
                                            }
                                        }
                                    } else {
                                        if ($timeResult) {
                                            $row = mysqli_fetch_assoc($timeResult);
                                            $recordTimestamp = strtotime($row['time']);

                                            if (time() - $recordTimestamp <= 3600) {
                                                echo "<a href='cancel_transaction.php?transc_ID=" . $row['transc_ID'] . "' class='btn btn-primary' onclick='return confirm(\"Are you sure you want to cancel this book?\");'>Cancel</a>";
                                                echo "<a href='check_availability.php?book_ID=" . $row['book_ID'] . "&" . "transc_ID=" . $row['transc_ID'] . "' class='btn btn-primary ml-3' onclick='return confirm(\"Are you sure you want to Borrow this book?\");'>Borrow Now</a>";
                                            } else {
                                                echo "<a href='cancel_transaction.php?transc_ID=" . $row['transc_ID'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to cancel this book?\");'>Cancel</a>";
                                                echo "<a href='check_availability.php?book_ID=" . $row['book_ID'] . "&" . "transc_ID=" . $row['transc_ID'] . "' class='btn btn-primary ml-3' onclick='return confirm(\"Are you sure you want to Borrow this book?\");'>Borrow Now</a>";
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <!-- ... -->
                </div>
            <?php
            }
        } else {
            ?>
            <tr>
                <td>Record Not Existed</td>
            </tr>
        <?php
        }
        ?>
        <div class="text-right mr-3 mb-3">
            <a href="booking.php" class="btn btn-primary">Return to Search</a>
        </div>
    </div>
    <!-- Display Buku yang dibooking tamat -->

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