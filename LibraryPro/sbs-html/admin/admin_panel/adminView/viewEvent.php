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
<title>Admin || Event</title>

<head>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-3">Event List</h2>
                <div class="table-responsive">
                    <!-- Events -->
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center">Event ID</th>
                                <th class="text-center">Event Name</th>
                                <th class="text-center">Event Description</th>
                                <th class="text-center">Event Picture</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <!-- PHP Starts -->
                        <?php

                        // Searching Function PHP
                        $query = "SELECT * FROM tblevents ";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <!-- rest of the row code remains unchanged -->
                                <tr>
                                    <td><?= $row["event_id"] ?></td>
                                    <td><?= $row["event_name"] ?></td>
                                    <td class="book-title"><?= $row["event_desc"] ?></td>
                                    <td><?= $row["event_pic"] ?></td>
                                    <td><button class="btn btn-danger" style="height:40px" onclick="eventDelete('<?= $row['event_id'] ?>')">Remove</button></td>
                                </tr>
                                <!-- ... -->
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
                    <!-- Events End -->

                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info assistant-hover rounded" style="height:40px;" data-toggle="modal" data-target="#myModal">
                       <i class="fa fa-calendar"></i>
                    </button>

                    <!-- Add Book Starts -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: antiquewhite;">
                                    <h4 class="modal-title">New Events</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form enctype='multipart/form-data' name="frmAddBooks" class="adding_section" action="../controller/addEventController.php" method="post">
                                        <div class="form-group">
                                            <label for="title">Event's Name:*</label>
                                            <input type="text" name="txttitle" class="form-control" placeholder="Event's Name (Max 20 Word)" maxlength="20" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="author">Event's Description:*</label>
                                            <input type="text" name="txtdesc" class="form-control" placeholder="Event's Description (Max 20 Words)" maxlength="20" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Event's Picture*</label>
                                            <input class="form-control" type="file" name="my_image" accept="image/x-png,image/gif,image/jpeg" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="cmdadd" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Book Ends -->
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../assets/js/custom_script_Book.js"></script>
    <script type="text/javascript" src="../assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>