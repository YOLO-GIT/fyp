<?php
include_once "../config/dbconnect.php";

session_start();

if (!isset($_SESSION["IDAdmin"])) {
  echo "<script>alert('Please Login First.');</script>";
  echo "<script>window.location.href='../../../auth/login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">


<title>Admin || Student</title>

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <link rel="icon" type="image/x-icon" href="../icon/icon.png">
</head>
  <?php
  include "../adminHeader.php";
  include "../sidebar.php";
  ?>
<body id="main-content" class="allContent-section">

  <div class="container py-4 col-12 col-md-9 col-xs-6 mb-2">
    <h2 class="text-center mb-3">Students</h2>

    <div class="table-responsive">
      <table class="table" id="myTable">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Class</th>
            <th class="text-center">Date Joined</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <!-- PHP -->
        <?php
        $query = "SELECT * FROM tblstudent ";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
              <td><?= $row["stud_ID"] ?></td>
              <td><?= $row["stud_Name"] ?></td>
              <td><?= $row["stud_Class"] ?></td>
              <td><?= $row["date"] ?></td>
              <td>
                <button class="btn btn-danger btn-sm" style="height:40px" onclick="studentDelete('<?= $row['stud_ID'] ?>')">Remove</button>
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
    </div>
  </div>

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