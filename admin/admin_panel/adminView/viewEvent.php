<?php
include_once "../config/dbconnect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin | Buku</title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/custom_validation_Books.css">
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

            <h2>Event's List</h2>
            <div class="row">
                <!-- Book Search -->
                <div class="col-md-6 mb-3 mt-3">
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control custom-form-control" placeholder="Carian Buku">
                            <button type="submit" class="btn btn-primary ml-2" style="color: white;">Cari</button>
                        </div>
                </div>
                <!-- End Book Search -->

                <!-- Sorting Start -->
                <div class="col-md-6 mb-3 mt-3">
                    <div class="input-group mb-3">
                        <select name="sort_alphabet" class="form-control custom-form-control">
                            <option value="">-- Pilih Jenis Susunan --</option>
                            <option value="a-z">A-Z (Ascending Order)</option>
                            <option value="z-a">Z-A (Descending Order)</option>
                        </select>
                        <button type="submit" class="btn btn-primary ml-2">
                            Sort
                        </button>
                    </div>
                    </form>
                </div>
                <!-- Sorting End -->

                <!-- Events -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Event ID</th>
                            <th class="text-center">Event Name</th>
                            <th class="text-center">Event Description</th>
                            <th class="text-center">Event Picture</th>
                            <th class="text-center">Remove</th>
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
                    $query = "SELECT * FROM tblevents ";
                    if (!empty($filtervalues)) {
                        $query .= "WHERE `event_name` LIKE '%$filtervalues%' ";
                    }

                    // Sorting Function PHP
                    if (!empty($sort_option)) {
                        if ($sort_option === "a-z") {
                            $query .= "ORDER BY event_name ASC";
                        } elseif ($sort_option === "z-a") {
                            $query .= "ORDER BY event_name DESC";
                        }
                    }

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
                                <td><button class="btn btn-danger" style="height:40px" onclick="eventDelete('<?= $row['event_id'] ?>')">Delete</button></td>
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
                <button type="button" class="btn btn-secondary ml-auto" style="height:40px;" data-toggle="modal" data-target="#myModal">
                    Add Events
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
                                        <input type="text" name="txttitle" class="form-control" placeholder="Event's Name" maxlength="25" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Event's Description:*</label>
                                        <input type="text" name="txtdesc" class="form-control" placeholder="Event's Description (Max 50 Words)" maxlength="50" required>
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

            <script type="text/javascript" src="../assets/js/custom_script_Book.js"></script>
            <script type="text/javascript" src="../assets/js/ajaxWork.js"></script>
            <script type="text/javascript" src="../assets/js/script.js"></script>
            <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
        </div>
    </div>
</body>

</html>