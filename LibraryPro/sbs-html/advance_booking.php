<?php
include 'conn.php';

session_start();

// Check if session "idcust" dah wujud atau belum
if (isset($_SESSION["IDStud"])) {
    $log = "Logout";
    $func_todo = "logout.php";
    $profile = "profile/profile.php";
    $stud_ID = $_SESSION["IDStud"];

    $studentQuery = "SELECT * FROM tblstudent WHERE stud_ID = ?";
    $stmt = $con->prepare($studentQuery);
    $stmt->bind_param("s", $stud_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row1 = $result->fetch_assoc();
    $statement_res = "Welcome Back, " . $row1['stud_Name'];
    $stmt->close();
} elseif (isset($_SESSION["IDTeachers"])) {
    $log = "Logout";
    $func_todo = "logout.php";
    $profile = "profile/teacher_profile.php";

    $teachers_ID = $_SESSION["IDTeachers"];

    $teachersQuery = "SELECT * FROM tblteachers WHERE teachers_ID = ?";
    $stmt = $con->prepare($teachersQuery);
    $stmt->bind_param("s", $teachers_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row1 = $result->fetch_assoc();
    $statement_res = "Welcome Back, " . $row1['teachers_Name'];
    $stmt->close();
} else {
    $statement_res = null;
    $log = "Login";
    $func_todo = "login.php";
    echo "<script>alert('Sila Login Dahulu.');</script>";
    echo "<script>window.location.href='login.php';</script>";
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
                                    <a class="nav-link" href="booking.php"><i class="fa fa-search"></i> Carian</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="advance_booking.php"><i class="fa fa-search-plus"></i> Carian Terperinci</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="buku_saya.php"><i class="fa fa-book"></i> Buku Saya</a>
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
                    <ul class="text_align_right">
                        <li class="nav-item"><a href="<?= $profile ?>"><i class="fa fa-user" aria-hidden="true"></i></a>&nbsp;&nbsp;<?= $statement_res ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end header inner -->

    <!-- Booking Start -->
    <header id="header_book">
        <h1>Buku-Buku</h1>
        <br>
        <!-- Button Search -->
        <button class="open-button-popup" onclick="openForm()">Carian Judul Buku</button>
    </header>

    <!-- Start Book Search -->
    <div class="form-popup" id="myForm">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header style_card">
                    <h4>Judul Buku</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="GET">
                                <!-- Search Bar -->
                                <div>
                                    <input type="text" name="search" value="<?php if (isset($_GET['search'])) {
                                                                                echo $_GET['search'];
                                                                            } ?>" class="form-control col-md-12 mb-3" placeholder="Cari Judul">
                                </div>
                                <div>
                                    <input type="text" name="penerbit" value="<?php if (isset($_GET['penerbit'])) {
                                                                                    echo $_GET['penerbit'];
                                                                                } ?>" class="form-control col-md-12 mb-3" placeholder="Cari Penerbit">
                                </div>
                                <div>
                                    <input type="text" name="isbn" value="<?php if (isset($_GET['isbn'])) {
                                                                                echo $_GET['isbn'];
                                                                            } ?>" class="form-control col-md-12 mb-3" placeholder="Cari ISBN">
                                </div>
                                <!-- Category -->
                                <select name="genre" class="form-control col-md-3">
                                    <option value="">Cari Kategori</option>
                                    <option value="Fiction">Fiction</option>
                                    <option value="Science">Science</option>
                                    <option value="History">History</option>
                                    <option value="Action">Action</option>
                                </select>
                                <!-- Button -->
                                <br><button type="submit" class="btn btn-primary">Buat Carian</button>
                                <button type="button" class="btn btn-secondary cancel" onclick="closeForm()">Close</button>
                                <button type="button" class="btn btn-secondary refresh" onclick="resetForm()">Refresh Page</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Book Search -->

    <!-- Booking -->
    <div class="container_book">
        <?php
        //Search
        $filtertitle = isset($_GET['search']) ? $_GET['search'] : '';
        $filtercategory = isset($_GET['genre']) ? $_GET['genre'] : '';
        $filterpublisher = isset($_GET['penerbit']) ? $_GET['penerbit'] : '';
        $filterisbn = isset($_GET['isbn']) ? $_GET['isbn'] : '';

        // Base query
        $query = "SELECT * FROM tblbook";

        // Check for each filter and append to the query
        if (!empty($filtertitle) || !empty($filtercategory) || !empty($filterpublisher) || !empty($filterisbn)) {
            $query .= " WHERE";

            if (!empty($filtertitle)) {
                $query .= " `book_title` LIKE '%$filtertitle%'";
            }

            if (!empty($filtercategory)) {
                if (!empty($filtertitle)) {
                    $query .= " AND";
                }
                $query .= " `book_category` = '$filtercategory'";
            }

            if (!empty($filterpublisher)) {
                if (!empty($filtertitle) || !empty($filtercategory)) {
                    $query .= " AND";
                }
                $query .= " `publisher` LIKE '%$filterpublisher%'";
            }

            if (!empty($filterisbn)) {
                if (!empty($filtertitle) || !empty($filtercategory) || !empty($filterpublisher)) {
                    $query .= " AND";
                }
                $query .= " `book_ISBN` LIKE '%$filterisbn%'";
            }
        }

        $result = $con->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="card_book mb-3">
                    <!-- rest of the code remains unchanged -->
                    <div class="row g-0">
                        <div class="col-md-3 mb-3">
                            <img src="../../admin/admin_panel/controller/<?= $row['book_image'] ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title"><?= $row["book_title"] ?></h2>
                                <table>
                                    <tr>
                                        <td class="bold-text">Pengarang:&nbsp;&nbsp;<?= $row["book_author"] ?></td>
                                    </tr>
                                    <tr>
                                        <!-- <td class="bold-text">No. ISBN:&nbsp;&nbsp;<?= $row["book_ISBN"] ?></td> -->
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Penerbit:&nbsp;&nbsp;<?= $row["publisher"] ?></td>
                                    </tr>
                                    <tr>
                                        <!-- <td class="bold-text">No. Dewey:&nbsp;&nbsp;<?= $row["book_dewey"] ?></td> -->
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Kategori:&nbsp;&nbsp;<?= $row["book_category"] ?></td>
                                    </tr>
                                    <tr>
                                        <!-- <td class="bold-text">Sinopsis Buku:&nbsp;&nbsp;<?= $row["book_desc"] ?></td> -->
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="ml-auto mr-5 mb-3">
                            <a href="display_book.php?book_ID=<?= $row['book_ID'] ?>" class="btn btn-primary">Pilih Buku</a>
                        </div>
                    </div>
                    <!-- ... -->
                </div>
            <?php
            }
        } else {
            ?>
            <tr>
                <td>Record Tidak Wujud</td>
            </tr>
        <?php
        }
        ?>
        <!-- PHP Ends -->
    </div>
    <!-- Booking End -->

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
                            <p>© 2020 All Rights Reserved. Design by <a href="https://html.design/"> Free html Templates</a>
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