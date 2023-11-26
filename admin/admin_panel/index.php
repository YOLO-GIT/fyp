<?php
session_start();

if (!$_SESSION["IDAdmin"]) {
    echo "<script>window.location.href='../../LibraryPro/sbs-html/login.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        </link>
    </head>
</head>

<body>

    <?php
    include "./Main_Header.php";
    include "./main_sidebar.php";

    include_once "./config/dbconnect.php";
    ?>


    <div id="main-content" class="container allContent-section py-4">
        <div class="row">

            <!-- Starts Student -->
            <div class="col-sm-4">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Student</h4>
                    <h5 style="color:white;">
                        <?php
                        $sql = "SELECT * from tblstudent";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?></h5>
                </div>
            </div>
            <!-- Ends Student -->

            <!-- Starts Books  -->
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Books</h4>
                    <h5 style="color:white;">
                        <?php

                        $sql = "SELECT * from tblbook";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            <!-- Ends Books -->

            <!-- Starts Borrowed -->
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Borrowed</h4>
                    <h5 style="color:white;">
                        <?php

                        $sql = "SELECT * from tbltransaction WHERE transc_name = 'Borrowing'";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            <!-- Ends Borrowed -->

            <!-- Starts Booking -->
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Booking</h4>
                    <h5 style="color:white;">
                        <?php

                        $sql = "SELECT * from tbltransaction WHERE transc_name = 'Booking'";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            <!-- Ends Booking -->

            <!-- Starts Teacher -->
            <div class="col-sm-7">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Teachers</h4>
                    <h5 style="color:white;">
                        <?php
                        $sql = "SELECT * from tblteachers";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?></h5>
                </div>
            </div>
            <!-- Ends Teacher -->

        </div>

    </div>

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>