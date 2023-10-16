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

    <h2>Book List</h2>
    <div class="container">
      <div class="row">
        <!-- Button Search -->
        <button class="open-button-popup" onclick="openForm()">Search Button</button>

        <!-- Start Book Search -->
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
        <!-- End Book Search -->

        <!-- Books -->
        <table class="table ">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">No. Perolehan</th>
              <th class="text-center">Nama Buku</th>
              <th class="text-center">Pengarang</th>
              <th class="text-center">Nama Penerbit</th>
              <th class="text-center">ISBN</th>
              <th class="text-center">Dewey</th>
              <th class="text-center">Update</th>
              <th class="text-center">Delete</th>
            </tr>
          </thead>
          <!-- PHP Starts -->
          <?php
          include_once "../config/dbconnect.php";

          if (isset($_GET['search'])) {
            $filtervalues = $_GET['search'];
            $query = "SELECT * FROM tblbook WHERE `book_title` LIKE '%$filtervalues%'";
            $result = $conn->query($query);
            $count = 1;

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
          ?>
                <tr>
                  <td><?= $count ?></td>
                  <td><?= $row["book_ID"] ?></td>
                  <td><?= $row["book_title"] ?></td>
                  <td><?= $row["book_author"] ?></td>
                  <td><?= $row["publisher"] ?></td>
                  <td><?= $row["book_ISBN"] ?></td>
                  <td><?= $row["book_dewey"] ?></td>
                  <td><button class="btn btn-primary" style="height:40px" onclick="bookUpdate('<?= $row['book_ID'] ?>')">Edit</button></td>
                  <td><button class="btn btn-danger" style="height:40px" onclick="bookDelete('<?= $row['book_ID'] ?>')">Delete</button></td>
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
            $sql = "SELECT * from tblbook";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
              ?>
                <tr>
                  <td><?= $count ?></td>
                  <td><?= $row["book_ID"] ?></td>
                  <td><?= $row["book_title"] ?></td>
                  <td><?= $row["book_author"] ?></td>
                  <td><?= $row["publisher"] ?></td>
                  <td><?= $row["book_ISBN"] ?></td>
                  <td><?= $row["book_dewey"] ?></td>
                  <td><button class="btn btn-primary" style="height:40px" onclick="bookUpdate('<?= $row['book_ID'] ?>')">Edit</button></td>
                  <td><button class="btn btn-danger" style="height:40px" onclick="bookDelete('<?= $row['book_ID'] ?>')">Delete</button></td>
                </tr>
          <?php
                $count = $count + 1;
              }
            }
          }
          ?>
          <!-- PHP Ends -->
        </table>

        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
          Add Book
        </button>


        <!-- Add Book Starts -->
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
                <h4 class="modal-title">Buku Baru</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form enctype='multipart/form-data' action="../controller/addCatController.php" method="get">
                  <form action="" method="get" name="frmnewbook">
                    <div class="form-group">
                      <label for="id">No. Perolehan:</label>
                      <input type="text" name="txtnoperolehan" placeholder="Enter book title" required>
                    </div>
                    <div class="form-group">
                      <label for="title">Nama Buku:</label>
                      <input type="text" name="txttitle" placeholder="Enter book title" required>
                    </div>
                    <div class="form-group">
                      <label for="author">Pengarang:</label>
                      <input type="text" name="txtauthor" placeholder="Enter author name" required>
                    </div>
                    <div class="form-group">
                      <label for="category">ISBN:</label>
                      <input type="text" name="txtISBN" placeholder="Enter book ISBN" required>
                    </div>
                    <div class="form-group">
                      <label for="description">Nama Penerbit:</label>
                      <input name="txtpublisher" type="text" placeholder="Enter book publisher" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="dewey">Dewey:</label>
                      <input type="number" name="txtdewey" placeholder="Enter book dewey" required>
                    </div>
                    <div class="form-group">
                      <label for="category">Kategori:</label>
                      <select name="cbokategori" required>
                        <option value="">Sila Pilih Kategori</option>
                        <option value="Action">Action</option>
                        <option value="History">History</option>
                        <option value="Fiction">Fiction</option>
                        <option value="Science">Science</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="description">Sinopsis Buku:</label>
                      <textarea name="txtdescription" rows="4" placeholder="Enter book description" required></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="cmdadd">Simpan</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Add Book Ends -->
      </div>


      <script type="text/javascript" src="../assets/js/ajaxWork.js"></script>
      <script type="text/javascript" src="../assets/js/script.js"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>