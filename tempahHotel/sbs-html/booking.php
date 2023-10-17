<?php
include 'conn.php';
// Fetch using isbn
// if (isset($_GET["book_ISBN"])) {
//     $isbn = $_GET["book_ISBN"];
//     include 'conn.php';
//     $sql = "SELECT * FROM tblbook WHERE book_ISBN = '$isbn'";
//     $result = $con->query($sql);

//     if ($result->num_rows > 0) {
//         $book = $result->fetch_assoc();
//     } else {
//         echo "Book not found.";
//     }
// } else {
//     echo "ISBN parameter is missing.";
// }

// mysqli_close($con);
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
                                <a href="index.html"><img src="" alt="#" /></a>
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
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Booking</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Clear Session</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Advance Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2">
                    <ul class="email text_align_right">
                        <li class="d_none"><a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
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
                        <div class="col-md-6">
                            <form action="" method="GET">
                                <!-- Search Bar -->
                                <div class="input-group mb-3 search_bar">
                                    <input type="text" name="search" value="<?php if (isset($_GET['search'])) {
                                                                                echo $_GET['search'];
                                                                            } ?>" class="form-control" placeholder="Search data">
                                </div>
                                <!-- Button -->
                                <br><button type="submit" class="btn btn-primary">Search</button>
                                <br><br><button type="button" class="btn btn-secondary cancel" onclick="closeForm()">Close</button>
                                <br><br><button type="button" class="btn btn-secondary refresh" onclick="resetForm()">Refresh Page</button>
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

        <form action="" method="GET">
            <!-- Sorting Function -->
            <div class="input-group mb-3">
                <select name="sort_alphabet" class="form-control">
                    <option value="">-- Select Option --</option>
                    <option value="a-z" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z") {
                                            echo "selected";
                                        } ?>>A-Z (Ascending Order)</option>
                    <option value="z-a" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a") {
                                            echo "selected";
                                        } ?>>Z-A (Descending Order)</option>
                </select>
                <button type="submit" class="btn btn-primary">
                    Sort
                </button>
            </div>
        </form>

        <?php
        $filtervalues = isset($_GET['search']) ? $_GET['search'] : '';

        $sort_option = "";
        if (isset($_GET['sort_alphabet'])) {
            if ($_GET['sort_alphabet'] === "a-z") { // Use === for strict comparison
                $sort_option = "ASC";
            } elseif ($_GET['sort_alphabet'] === "z-a") { // Use === for strict comparison
                $sort_option = "DESC";
            }
        }

        $query = "SELECT * FROM tblbook ";
        if (!empty($filtervalues)) {
            $query .= "WHERE `book_title` LIKE '%$filtervalues%' ";
        }

        if (!empty($sort_option)) {
            $query .= "ORDER BY book_title $sort_option";
        }

        $result = $con->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="card_book mb-3">
                    <!-- rest of the code remains unchanged -->
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="images/loading.gif">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title">Tajuk Buku:&nbsp;&nbsp;<?= $row["book_title"] ?></h2>
                                <table>
                                    <tr>
                                        <td class="bold-text">Pengarang:&nbsp;&nbsp;<?= $row["book_author"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">No. ISBN:&nbsp;&nbsp;<?= $row["book_ISBN"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Pengeluar:&nbsp;&nbsp;<?= $row["publisher"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">No. Dewey:&nbsp;&nbsp;<?= $row["book_dewey"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Kategori:&nbsp;&nbsp;<?= $row["book_category"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bold-text">Sinopsis Buku:&nbsp;&nbsp;<?= $row["book_desc"] ?></td>
                                    </tr>
                                    <tr>
                                        <td><br><br><a href="#" class="btn btn-primary">Booking</a>&nbsp;&nbsp;<a href="#" class="btn btn-primary">Borrowing</a></td>
                                    </tr>
                                </table>
                            </div>
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