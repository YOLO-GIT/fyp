<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        </link>
    </head>
</head>

<body>

    <?php
    include "../adminHeader.php";
    include "../sidebar.php";

    include_once "../config/dbconnect.php";

    ?>

    <div id="main-content" class="container allContent-section py-4">

        <h2>Teachers</h2>
        <div class="container">
            <div class="row">
                <!-- Button Search -->
                <button class="open-button-popup" onclick="openForm()">Search Button</button>

                <!-- Start Teacher Search -->
                <div class="form-popup" id="myForm">
                    <form action="" class="form-container-popup">
                        <div class="col-md-12">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h4 style="color: white;">Search Students</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <form action="" method="GET">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                                            echo $_GET['search'];
                                                                                                        } ?>" class="form-control" placeholder="Search data">
                                                </div>
                                                <br><button type="submit" class="btn btn-primary" style="color: white;">Search</button>
                                                <br><br><button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                                <br><br><button type="button" class="btn refresh" onclick="resetForm()">Refresh Page</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Teacher Search -->

                <!-- Teachers -->
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama </th>
                            <th class="text-center">Tarikh semasa</th>
                        </tr>
                    </thead>
                    <!-- PHP -->
                    <?php
                    include_once "../config/dbconnect.php";

                    if (isset($_GET['search'])) {
                        $filtervalues = $_GET['search'];
                        $query = "SELECT * FROM tblteachers WHERE `teachers_Name` LIKE '%$filtervalues%'";
                        $result = $conn->query($query);
                        $count = 1;

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $row["teachers_ID"] ?></td>
                                    <td><?= $row["teachers_Name"] ?></td>
                                    <td><?= $row["date_teachers"] ?></td>
                                </tr>
                            <?php
                                $count = $count + 1;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5">No Record Found</td>
                            </tr>
                            <?php
                        }
                    } else {
                        $sql = "SELECT * from tblteachers";
                        $result = $conn->query($sql);
                        $count = 1;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $row["teachers_ID"] ?></td>
                                    <td><?= $row["teachers_Name"] ?></td>
                                    <td><?= $row["date_teachers"] ?></td>
                                </tr>
                    <?php
                                $count = $count + 1;
                            }
                        }
                    }
                    ?>
                    <!-- PHP Ends -->
                </table>
            </div>
        </div>


        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
            Add Teachers
        </button>


        <!-- Add Teachers Starts -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- CSS -->
                <style>
                    .container {
                        margin: 20px auto;
                        padding: 20px;
                        background-color: #fff;
                        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                    }

                    .form-group {
                        margin-top: 20px;
                    }

                    .form-group label {
                        display: block;
                        font-weight: bold;
                    }

                    .form-group input {
                        width: 100%;
                        padding: 10px;
                        margin-top: 5px;
                        border: 1px solid #ccc;
                        border-radius: 3px;
                        font-size: 16px;
                    }

                    .form-group button {
                        margin-top: 20px;
                        padding: 10px 20px;
                        background-color: #007BFF;
                        color: #fff;
                        border: none;
                        border-radius: 3px;
                        cursor: pointer;
                        font-size: 18px;
                    }
                </style>
                <!-- CSS -->

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Teacher Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form enctype='multipart/form-data' action="../controller/addTeacherController.php" method="get">

                            <div class="form-group">
                                <label for="IC">IC:</label>
                                <input type="number" name="txtIC" placeholder="Enter IC" required maxlength="12">
                            </div>
                            <div class="form-group">
                                <label for="First Name">Nama Depan:</label>
                                <input type="text" name="txtfname" placeholder="Masukkan Nama Depan: Mohd" required maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="Last Name">Nama Belakang:</label>
                                <input type="text" name="txtlname" placeholder="Masukkan Nama Belakang Selepas 'bin': Yahya" required maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="Username">Username:</label>
                                <input type="text" name="txtuname" placeholder="user123" required maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="Password">Passwords:</label>
                                <input type="password" name="txtpwd" id="myInputPWD" placeholder="Masukkan katalaluan anda: Maksima 8 nombor sahaja" required pattern=".{8,}" maxlength="8">
                            </div>
                            <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;Show Password
                            <div class="modal-footer">
                                <button type="submit" name="cmdadd" class="btn btn-secondary">Add Teacher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Teachers Ends -->
    </div>


    <script type="text/javascript" src="../assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>