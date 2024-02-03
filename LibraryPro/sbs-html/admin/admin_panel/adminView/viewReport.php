<?php
include_once "../config/dbconnect.php";

session_start();

if (!isset($_SESSION["IDAdmin"])) {
    echo "<script>alert('Please Login First.');</script>";
    echo "<script>window.location.href='../../../auth/login.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin || Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom_validation_Books.css">
    </link>

    <link rel="icon" type="image/x-icon" href="../icon/icon.png">

</head>

<body>

    <div id="main-content" class="allContent-section">
        <?php
        include "../adminHeader.php";
        include "../sidebar.php";
        ?>
        <div class="container">

            <h2>Report List</h2>
            <div class="row">

                <!-- Start Search -->
                <div class="col-md-12 mb-3 mt-3">
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control custom-form-control" placeholder="Search User's ID">
                            <button type="submit" class="btn btn-primary ml-2" style="color: white;">Search</button>
                        </div>
                    </form>
                </div>
                <!-- End Search -->

                <!-- Report -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Report's ID</th>
                            <th class="text-center">User's ID</th>
                            <th class="text-center" colspan="2">User's Report</th>
                            <th class="text-center">Report's Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <!-- PHP Starts -->
                    <?php

                    // Search
                    $filtervalues = isset($_GET['search']) ? $_GET['search'] : '';
                    //Result Page
                    $resultPage = 5;

                    // Searching Function PHP
                    $query = "SELECT * FROM tblreport ";
                    if (!empty($filtervalues)) {
                        $query .= "WHERE `users_ID` LIKE '%$filtervalues%' ";
                    }

                    // Pagination logic
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $resultPage;

                    $queryCount = "SELECT COUNT(*) as total FROM tblreport";
                    $totalResult = $conn->query($queryCount)->fetch_assoc()['total'];
                    $totalPages = ceil($totalResult / $resultPage);

                    $query .= " LIMIT $start, $resultPage";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <!-- rest of the row code remains unchanged -->
                            <tr>
                                <td><?= $row["report_ID"] ?></td>
                                <td><?= $row["users_ID"] ?></td>
                                <td colspan="2"><?= $row["report_desc"] ?></td>
                                <td><?= $row["report_date"] ?></td>
                                <td><button class="btn btn-danger" style="height:40px" onclick="reportDelete('<?= $row['report_ID'] ?>')">Remove</button></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">No Report Found</td>
                        </tr>
                    <?php
                    }
                    ?>
                    <!-- PHP Ends -->
                </table>

                <?php
                // Display pagination links
                echo '<div class="pagination mb-5">';
                for (
                    $i = 1;
                    $i <= $totalPages;
                    $i++
                ) {
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

                mysqli_close($conn);
                ?>

                <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="../assets/js/ajaxWork.js"></script>
                <script type="text/javascript" src="../assets/js/script.js"></script>
            </div>
        </div>
    </div>
</body>

</html>