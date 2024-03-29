<?php
include 'conn.php';

session_start();

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
    $profile = "profile/profile.php";
    $confirmation_logout = "";
    $userLoggedIn = false;
}

if (isset($_GET['advance'])) {
    $statement = "advance";
    $search = "Advanced Search";
    $search_link = "advance_booking.php";
} else {
    $statement = "";
    $search = "Default";
    $search_link = "index.php";
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
    <title>Library Pro | Advance Search</title>
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
    <!-- custom style css for booking -->
    <link rel="stylesheet" href="css/custom_booking.css">
    <!-- Icon here -->
    <link rel="icon" type="image/x-icon" href="images/icon.png">
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
                                    <a class="nav-link" href="booking.php?simple"><i class="fa fa-search"></i> Search</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="advance_booking.php?advance"><i class="fa fa-search-plus"></i> Advanced Search</a>
                                </li>
                                <li class="nav-item">
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

    <!-- Booking Start -->
    <header id="header_book">
        <h1>Books</h1>
        <br>
        <!-- Button Search -->
        <button class="open-button-popup" onclick="openForm()">Search Book Details</button>
    </header>

    <!-- Start Book Search -->
    <div class="form-popup" id="myForm">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header style_card">
                    <h4>Book Details</h4>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <!-- CARI JUDUL -->
                            <div class="col-md-6 mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Search Title">
                            </div>
                            <!-- CARI PENERBIT -->
                            <div class="col-md-6 mb-3">
                                <input type="text" name="penerbit" class="form-control" placeholder="Search Publisher">
                            </div>
                            <!-- CARI ISBN -->
                            <div class="col-md-12 mb-3">
                                <input type="text" name="isbn" class="form-control" placeholder="Search ISBN">
                            </div>
                            <!-- CARI KATEGORI -->
                            <div class="col-md-6 mb-3">
                                <select name="genre" class="form-control">
                                    <option value="">Search Category</option>
                                    <option value="Fiction">Fiction</option>
                                    <option value="Science">Science</option>
                                    <option value="History">History</option>
                                    <option value="Action">Action</option>
                                </select>
                            </div>
                            <!-- CARI BAHASA -->
                            <div class="col-md-6 mb-3">
                                <select name="language" class="form-control">
                                    <option value="">Search Languange</option>
                                    <option value="Bahasa Melayu">Bahasa Melayu</option>
                                    <option value="Bahasa Inggeris">English</option>
                                    <option value="Bahasa Cina">Chinese</option>
                                    <option value="Bahasa Tamil">Tamil</option>
                                </select>
                            </div>
                            <!-- CARI ILLUSTRASI -->
                            <div class="col-md-12 mb-3">
                                <select name="illustration" class="form-control">
                                    <option value="">Illustrated Books</option>
                                    <option value="Ya">Yes</option>
                                    <option value="Tidak">No</option>
                                </select>
                            </div>
                            <!-- SAVE BUTTON -->
                            <div class="col-md-12 text_align_center">
                                <button type="submit" class="btn btn-primary">Create a Search</button>
                                <button type="button" class="btn btn-secondary cancel" onclick="closeForm()">Close Search</button>
                            </div>
                            <input type="hidden" name="advance" value="<?= $statement ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Book Search -->

    <!-- Breadcrumbs Start -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Advance Search</li>
        </ol>
    </nav>
    <!-- Breadcrumbs Ends -->

    <!-- Booking -->
    <div class="container_book">
        <form action="" method="GET">
            <!-- Sorting Function -->
            <div class="input-group mb-3">
                <select name="sort_alphabet" class="form-control" required>
                    <option value="">-- Select Option --</option>
                    <option value="a-z">A-Z (Ascending Order)</option>
                    <option value="z-a">Z-A (Descending Order)</option>
                    <option value="penerbit">Penerbit</option>
                    <option value="genre">Genre</option>
                    <option value="illustration">Illustration</option>
                </select>
                <input type="hidden" name="advance" value="<?= $statement ?>">
                <button type="submit" class="btn btn-primary ml-2">
                    Sort
                </button>
            </div>
        </form>

        <?php
        // Search
        $filtertitle = isset($_GET['search']) ? $_GET['search'] : '';
        $filtercategory = isset($_GET['genre']) ? $_GET['genre'] : '';
        $filterpublisher = isset($_GET['penerbit']) ? $_GET['penerbit'] : '';
        $filterisbn = isset($_GET['isbn']) ? $_GET['isbn'] : '';
        $filterlanguage = isset($_GET['language']) ? $_GET['language'] : '';
        $filterilustrasi = isset($_GET['illustration']) ? $_GET['illustration'] : '';

        $resultsPerPage = isset($_GET['result_count']) ? $_GET['result_count'] : 5;

        // Sorting
        $sort_option = isset($_GET['sort_alphabet']) ? $_GET['sort_alphabet'] : '';

        // Base query
        $query = "SELECT * FROM tblbook";

        // Check for each filter and append to the query
        if (!empty($filtertitle) || !empty($filtercategory) || !empty($filterpublisher) || !empty($filterisbn) || !empty($filterlanguage) || !empty($filterilustrasi)) {
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

            if (!empty($filterlanguage)) {
                if (!empty($filtertitle) || !empty($filtercategory) || !empty($filterpublisher) || !empty($filterisbn)) {
                    $query .= " AND";
                }
                $query .= " `book_language` = '$filterlanguage'";
            }

            if (!empty($filterilustrasi)) {
                if (!empty($filtertitle) || !empty($filtercategory) || !empty($filterpublisher) || !empty($filterisbn) || !empty($filterlanguage)) {
                    $query .= " AND";
                }
                $query .= " `book_illustration` = '$filterilustrasi'";
            }
        }

        // Apply sorting
        if (isset($sort_option)) {
            switch ($sort_option) {
                case "a-z":
                    $order_column = "book_title";
                    $order_direction = "ASC";
                    break;
                case "z-a":
                    $order_column = "book_title";
                    $order_direction = "DESC";
                    break;
                case "penerbit":
                    $order_column = "publisher";
                    $order_direction = "ASC";
                    break;
                case "genre":
                    $order_column = "book_category";
                    $order_direction = "ASC";
                    break;
                case "illustration":
                    $order_column = "book_illustration";
                    $order_direction = "ASC";
                    break;
                default:
                    $order_column = "book_title";
                    $order_direction = "ASC";
            }

            $query .= " ORDER BY `$order_column` $order_direction";
        }

        // Pagination logic
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $resultsPerPage;

        $queryCount = "SELECT COUNT(*) as total FROM tblbook";
        $totalResult = $con->query($queryCount)->fetch_assoc()['total'];
        $totalPages = ceil($totalResult / $resultsPerPage);

        $query .= " LIMIT $start, $resultsPerPage";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="card_book mb-3">
                    <!-- rest of the code remains unchanged -->
                    <div class="row g-0">
                        <div class="col-md-3 mb-3">
                            <img src="./admin/admin_panel/controller/<?= $row['book_image'] ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title"><?= $row["book_title"] ?></h2>
                                <table>
                                    <tr>
                                        <td class="bold-text">Author:&nbsp;&nbsp;<?= $row["book_author"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">ISBN Number:&nbsp;&nbsp;<?= $row["book_ISBN"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Publisher:&nbsp;&nbsp;<?= $row["publisher"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Calling Number:&nbsp;&nbsp;<?= $row["book_dewey"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Category:&nbsp;&nbsp;<?= $row["book_category"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Description:&nbsp;&nbsp;<?= $row["book_desc"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class='bold-text'>Book Condition:&nbsp;&nbsp;<?= $row['book_status'] ?></td>
                                    </tr>
                                    <?php
                                    $transc_name = "SELECT * FROM `tbltransaction` WHERE `book_ID` = '$row[book_ID]'";
                                    $check_transc = mysqli_query($con, $transc_name);
                                    $transc = mysqli_fetch_assoc($check_transc);
                                    if ($transc) {
                                    ?>
                                        <tr>
                                            <td class='bold-text'>Availability:&nbsp;&nbsp; <?= $transc['transc_name'] ?></td>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <td class='bold-text'>Availability:&nbsp;&nbsp; Available</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <?php
                        $bookCondition = "SELECT `book_status` FROM tblbook WHERE `book_ID` = '$row[book_ID]' AND `book_status` = 'Broken'";
                        $checkCondition = mysqli_query($con, $bookCondition);

                        $returnCondition = "SELECT `return_approval` FROM tblreturning WHERE `book_ID` = '$row[book_ID]' AND `return_approval` = 0";
                        $checkReturn = mysqli_query($con, $returnCondition);

                        if (mysqli_num_rows($checkCondition) > 0) {
                        ?>
                            <div class="ml-auto mr-5 mb-3">
                                <a class="btn btn-danger" style="color: #fff;">Cannot Be Selected (This Book is not in Good Condition)</a>
                            </div>
                        <?php
                        } elseif (mysqli_num_rows($checkReturn) > 0) {
                        ?>
                            <div class="ml-auto mr-5 mb-3">
                                <a class="btn btn-warning" style="color: black;">Cannot Be Selected (This Book is still not Returned yet)</a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="ml-auto mr-5 mb-3">
                                <a href="display_book.php?book_ID=<?= $row['book_ID'] ?>&search" class="btn btn-primary">Select Book</a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- ... -->
                </div>
            <?php
            }
        } else {
            ?>
            <tr>
                <td>Book not existed.</td>
            </tr>
        <?php
        }
        ?>
        <!-- PHP Ends -->

        <!-- Pagination Start -->
        <?php
        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $page) {
                echo "<span>$i</span>";
            } else {
                $params = array('page' => $i);

                if (isset($_GET['result_count'])) {
                    $params['result_count'] = $_GET['result_count'];
                }

                if (isset($_GET['sort_alphabet'])) {
                    $params['sort_alphabet'] = $_GET['sort_alphabet'];
                }

                $url = '?' . http_build_query($params);

                echo "<a href='$url'>$i</a>";
            }
        }
        echo '</div>';
        ?>
        <!-- Pagination End -->
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