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
    <title>Admin || Record</title>

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

            <h2>Record List</h2>
            <div class="row">

                <!-- Start Search -->
                <div class="col-md-6 mb-3 mt-3">
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control custom-form-control" placeholder="Search Transaction">
                            <button type="submit" class="btn btn-primary ml-2" style="color: white;">Search</button>
                        </div>
                    </form>
                </div>
                <!-- End Search -->

                <!-- Sorting Start -->
                <div class="col-md-6 mb-3 mt-3">
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <select name="sort_alphabet" class="form-control custom-form-control">
                                <option value="">-- Sorting --</option>
                                <option value="a-z">Transaction (Ascending Order)</option>
                                <option value="z-a">Transaction (Descending Order)</option>
                            </select>
                            <button type="submit" class="btn btn-primary ml-2">
                                Sort
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Sorting End -->

                <!-- Record -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Record ID</th>
                            <th class="text-center">Transaction ID</th>
                            <th class="text-center">Transaction Name</th>
                            <th class="text-center">User ID</th>
                            <th class="text-center">User`s Name</th>
                            <th class="text-center">Recorded Date</th>
                            <th class="text-center">Recorded Time</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <!-- PHP Starts -->
                    <?php

                    // Search
                    $filtervalues = isset($_GET['search']) ? $_GET['search'] : '';
                    // Sorting
                    $sort_option = isset($_GET['sort_alphabet']) ? $_GET['sort_alphabet'] : '';
                    //Result Page
                    $resultPage = 5;

                    // Searching Function PHP
                    $query = "SELECT * FROM tblrecord ";
                    if (!empty($filtervalues)) {
                        $query .= "WHERE `transc_name` LIKE '%$filtervalues%' ";
                    }

                    // Sorting Function PHP
                    if (!empty($sort_option)) {
                        if ($sort_option === "a-z") {
                            $query .= "ORDER BY transc_name ASC";
                        } elseif ($sort_option === "z-a") {
                            $query .= "ORDER BY transc_name DESC";
                        }
                    }

                    // Pagination logic
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $resultPage;

                    $queryCount = "SELECT COUNT(*) as total FROM tblrecord";
                    $totalResult = $conn->query($queryCount)->fetch_assoc()['total'];
                    $totalPages = ceil($totalResult / $resultPage);

                    $query .= " LIMIT $start, $resultPage";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <!-- rest of the row code remains unchanged -->
                            <tr>
                                <td><?= $row["record_ID"] ?></td>
                                <td><?= $row["transc_ID"] ?></td>
                                <td><?= $row["transc_name"] ?></td>
                                <td><?= $row["user_ID"] ?></td>
                                <td><?= $row["user_name"] ?></td>
                                <td><?= $row["record_date"] ?></td>
                                <td><?= $row["record_time"] ?></td>
                                <td><button class="btn btn-danger" style="height:40px" onclick="recordDelete('<?= $row['record_ID'] ?>')">Remove</button></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">No Record Found</td>
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