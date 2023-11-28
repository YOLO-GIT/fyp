<?php
include_once "../config/dbconnect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin | Staff</title>

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
            <h2>Staff List</h2>
            <div class="row">

                <!-- Start Staff Search -->
                <div class="col-md-12 mb-3 mt-3">
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" required class="form-control custom-form-control" placeholder="Search Name">
                            <button type="submit" class="btn btn-primary ml-2" style="color: white;">Search</button>
                        </div>
                    </form>
                </div>
                <!-- End Staff Search -->

                <!-- Staffs -->
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Staff ID</th>
                            <th class="text-center">Staff Name</th>
                            <th class="text-center">Staff Username</th>
                            <th class="text-center">Date Join</th>
                            <th class="text-center">Action</th>
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
                    $query = "SELECT * FROM tblstaff ";
                    if (!empty($filtervalues)) {
                        $query .= "WHERE `staff_name` LIKE '%$filtervalues%' ";
                    }

                    // Pagination logic
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $resultPage;

                    $queryCount = "SELECT COUNT(*) as total FROM tblstaff";
                    $totalResult = $conn->query($queryCount)->fetch_assoc()['total'];
                    $totalPages = ceil($totalResult / $resultPage);

                    $query .= " LIMIT $start, $resultPage";

                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $row["staff_ID"] ?></td>
                                <td><?= $row["staff_name"] ?></td>
                                <td><?= $row["staff_uname"] ?></td>
                                <td><?= $row["date_join"] ?></td>
                                <td>
                                    <button class="btn btn-danger" style="height:40px" onclick="staffDelete('<?= $row['staff_ID'] ?>')">Remove</button>
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
            <!-- Staffs End -->

            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-secondary ml-auto" style="height:40px;" data-toggle="modal" data-target="#myModal">
                Add Staff
            </button>

            <!-- Add Staff Starts -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: antiquewhite;">
                            <h4 class="modal-title">Staff Baru</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form enctype='multipart/form-data' name="frmAddStaff" class="adding_section" action="../controller/addStaffController.php" method="post">
                                <div class=" form-group">
                                    <label for="id">Staff IC:*</label>
                                    <input type="text" name="txtic" class="form-control" placeholder="Your IC" maxlength="12" pattern=".{12,}" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="title">Staff Name:*</label>
                                    <input type="text" name="txtname" class="form-control" placeholder="Your name (Max 25 words)" maxlength="25" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="author">Staff Username:*</label>
                                    <input type="username" name="txtuname" class="form-control" placeholder="Your username (Max 10 word)" maxlength="10" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="title">Password:*</label>
                                    <input type="password" name="txtpwd" class="form-control" placeholder="Your password (Max 9 words)" maxlength="9" pattern=".{9,}" id="myInputPWD" required autocomplete="off">
                                    <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;<label class="show_style mt-3">Show Password</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="cmdadd" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Staff Ends -->

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