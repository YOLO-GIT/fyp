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
    <title>Admin || Return</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom_validation_Books.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="icon" type="image/x-icon" href="../icon/icon.png">
</head>

<body id="main-content" class="allContent-section">

    <?php
    include "../adminHeader.php";
    include "../sidebar.php";
    ?>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-3">Return List</h2>
                <div class="table-responsive">
                    <!-- Returns -->
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center">Return ID</th>
                                <th class="text-center">User's ID</th>
                                <th class="text-center">User's Name</th>
                                <th class="text-center">Book's ID</th>
                                <th class="text-center">Book's Title</th>
                                <th class="text-center">Book's Condition</th>
                                <th class="text-center">Date Returned</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">Return Approval</th>
                            </tr>
                        </thead>
                        <!-- PHP Starts -->
                        <?php

                        $query = "SELECT * FROM tblreturning ";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <!-- rest of the row code remains unchanged -->
                                <tr>
                                    <td><?= $row["return_ID"] ?></td>
                                    <td><?= $row["user_IC"] ?></td>
                                    <td><?= $row["user_name"] ?></td>
                                    <td><?= $row["book_ID"] ?></td>
                                    <td><?= $row["book_title"] ?></td>
                                    <td><?= $row["book_condition"] ?></td>
                                    <td><?= $row["date_returned"] ?></td>
                                    <td><button class="btn btn-danger" style="height:40px" onclick="returnDelete('<?= $row['return_ID'] ?>')">Remove</button></td>
                                    <?php
                                    if ($row["return_approval"] == 0) {
                                    ?>
                                        <td><button class="btn btn-danger" onclick="ChangeReturnStatus('<?= $row['return_ID'] ?>')">Not Approved </button></td>
                                    <?php
                                    } else {
                                    ?>
                                        <td><button class="btn btn-success" onclick="ChangeReturnStatus('<?= $row['return_ID'] ?>')">Approved</button></td>
                                    <?php
                                    }
                                    ?>
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
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>