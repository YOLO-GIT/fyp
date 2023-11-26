<?php
include_once "../config/dbconnect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/custom_validation_Teacher.css">
        </link>
    </head>
</head>

<body>

    <div id="main-content" class="allContent-section">
        <?php
        include "../adminHeader.php";
        include "../sidebar.php";
        ?>
        <div class="container">
            <h2>Teachers</h2>
            <div class="row">

                <!-- Start Teacher Search -->
                <div class="col-md-12 mb-3 mt-3">
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                    echo $_GET['search'];
                                                                                } ?>" class="form-control custom-form-control" placeholder="Cari guru">
                            <button type="submit" class="btn btn-primary ml-2" style="color: white;">Cari</button>
                        </div>
                    </form>
                </div>
                <!-- End Teacher Search -->

                <!-- Teachers -->
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Tarikh daftar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <!-- PHP -->
                    <?php
                    include_once "../config/dbconnect.php";

                    // Search
                    $filtervalues = isset($_GET['search']) ? $_GET['search'] : '';
                    //Result Page
                    $resultPage = 5;

                    // Searching Function PHP
                    $query = "SELECT * FROM tblteachers ";
                    if (!empty($filtervalues)) {
                        $query .= "WHERE `teachers_Name` LIKE '%$filtervalues%' ";
                    }

                    // Pagination logic
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $resultPage;

                    $queryCount = "SELECT COUNT(*) as total FROM tblteachers";
                    $totalResult = $conn->query($queryCount)->fetch_assoc()['total'];
                    $totalPages = ceil($totalResult / $resultPage);

                    $query .= " LIMIT $start, $resultPage";

                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $row["teachers_ID"] ?></td>
                                <td><?= $row["teachers_Name"] ?></td>
                                <td><?= $row["teachers_username"] ?></td>
                                <td><?= $row["date_teachers"] ?></td>
                                <td>
                                    <button class="btn btn-danger" style="height:40px" onclick="teacherDelete('<?= $row['teachers_ID'] ?>')">Tolak</button>
                                </td>
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
                </table>
                <?php
                // Display pagination links
                echo '<div class="pagination mb-5">';
                for (
                    $i = 1;
                    $i <= $totalPages;
                    $i++
                ) {
                    if (
                        $i == $page
                    ) {
                        echo "<span>$i</span>";
                    } else {
                        echo "<a href='?page=$i'>$i</a>";
                    }
                }
                echo '</div>';
                ?>
                <!-- PHP Ends -->
            </div>

            <script type="text/javascript" src="../assets/js/custom_script_Teacher.js"></script>
            <script type="text/javascript" src="../assets/js/ajaxWork.js"></script>
            <script type="text/javascript" src="../assets/js/script.js"></script>
            <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
        </div>
    </div>
</body>

</html>