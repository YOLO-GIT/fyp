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

  <div id="main-content" class="container allContent-section">


    <!-- Students -->
    <h2>Student</h2>
    <div class="row">

      <!-- Button Search -->
      <button class="open-button-popup" onclick="openForm()">Search Button</button>

      <!-- Start Student Search -->
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
      <!-- End Student Search -->

      <table class="table">
        <thead>
          <tr>
            <th class="text-center">No.</th>
            <th class="text-center">ID</th>
            <th class="text-center">Name </th>
            <th class="text-center">Class</th>
            <th class="text-center">Joining Date</th>
          </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";

        if (isset($_GET['search'])) {
          $filtervalues = $_GET['search'];
          $query = "SELECT * FROM tblstudent WHERE stud_Name LIKE '%$filtervalues%'";
          $result = $conn->query($query);
          $count = 1;

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
              <tr>
                <td><?= $count ?></td>
                <td><?= $row["stud_ID"] ?></td>
                <td><?= $row["stud_Name"] ?></td>
                <td><?= $row["stud_Class"] ?></td>
                <td><?= $row["date"] ?></td>
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
          $sql = "SELECT * from tblstudent";
          $result = $conn->query($sql);
          $count = 1;
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
              <tr>
                <td><?= $count ?></td>
                <td><?= $row["stud_ID"] ?></td>
                <td><?= $row["stud_Name"] ?></td>
                <td><?= $row["stud_Class"] ?></td>
                <td><?= $row["date"] ?></td>
              </tr>
        <?php
              $count = $count + 1;
            }
          }
        }
        ?>
      </table>
    </div>
  </div>


  <script type="text/javascript" src="../assets/js/ajaxWork.js"></script>
  <script type="text/javascript" src="../assets/js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>