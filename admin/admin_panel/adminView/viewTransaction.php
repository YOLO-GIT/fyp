<?php
include_once "../config/dbconnect.php";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Admin | Transaction</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/custom_validation_Books.css">
  </link>
</head>

<body>

  <div id="main-content" class="allContent-section">
    <?php
    include "../adminHeader.php";
    include "../sidebar.php";
    ?>
    <div class="container">

      <h2>Transaction</h2>
      <div class="row">

        <!-- Start Search -->
        <div class="col-md-6 mb-3 mt-3">
          <form action="" method="GET">
            <div class="input-group mb-3">
              <input type="text" name="search" class="form-control custom-form-control" placeholder="Search Book Title">
              <button type="submit" class="btn btn-primary ml-2" style="color: white;">Search</button>
            </div>
          </form>
        </div>
        <!-- End Search -->

        <!-- Sorting Start -->
        <div class="col-md-6 mb-3 mt-3">
          <form action="" method="GET">
            <div class="input-group mb-3">
              <select name="sort_alphabet" class="form-control custom-form-control">
                <option value="">-- Sorting --</option>
                <option value="a-z">Book (Ascending Order)</option>
                <option value="z-a">Book (Descending Order)</option>
                <option value="borrowing">Borrowing</option>
                <option value="booking">Booking</option>
              </select>
              <button type="submit" class="btn btn-primary ml-2">
                Sort
              </button>
            </div>
          </form>
        </div>
        <!-- Sorting End -->

        <!-- Transaction -->
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">Transaction ID</th>
              <th class="text-center">Judul Buku</th>
              <th class="text-center">Transaction Name</th>
              <th class="text-center">ID Pengguna</th>
              <th class="text-center">Nama Pengguna</th>
              <th class="text-center">User's Role</th>
              <th class="text-center">Tarikh Booking</th>
              <th class="text-center">Masa Booking</th>
              <th class="text-center">Tolak</th>
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
          $query = "SELECT * FROM tbltransaction ";
          if (!empty($filtervalues)) {
            $query .= "WHERE `book_title` LIKE '%$filtervalues%' ";
          }

          // Sorting Function PHP
          if (!empty($sort_option)) {
            if ($sort_option === "a-z") {
              $query .= "ORDER BY book_title ASC";
            } elseif ($sort_option === "z-a") {
              $query .= "ORDER BY book_title DESC";
            } elseif ($sort_option === "borrowing") {
              $query .= "ORDER BY transc_name DESC";
            } elseif ($sort_option === "booking") {
              $query .= "ORDER BY transc_name ASC";
            }
          }

          // Pagination logic
          $page = isset($_GET['page']) ? $_GET['page'] : 1;
          $start = ($page - 1) * $resultPage;

          $queryCount = "SELECT COUNT(*) as total FROM tbltransaction";
          $totalResult = $conn->query($queryCount)->fetch_assoc()['total'];
          $totalPages = ceil($totalResult / $resultPage);

          $query .= " LIMIT $start, $resultPage";
          $result = $conn->query($query);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <!-- rest of the row code remains unchanged -->
              <tr>
                <td><?= $row["transc_ID"] ?></td>
                <td class="book-title"><?= $row["book_title"] ?></td>
                <td><?= $row["transc_name"] ?></td>
                <td><?= $row["user_ID"] ?></td>
                <td><?= $row["user_Name"] ?></td>
                <td><?= $row["user_role"] ?></td>
                <td><?= $row["start_date"] ?></td>
                <td><?= $row["time"] ?></td>
                <td><button class="btn btn-danger" style="height:40px" onclick="transcDelete('<?= $row['transc_ID'] ?>')">Remove</button></td>
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

        <?php
        // Display pagination links
        echo '<div class="pagination mb-5">';
        for (
          $i = 1;
          $i <= $totalPages;
          $i++
        ) {
          if ($i == $page) {
            echo "<span>$i</span>";
          } else {
            $params = array('page' => $i);

            if (isset($_GET['result_count'])) {
              $params['result_count'] = $_GET['result_count'];
            }

            if (isset($_GET['sort_alphabet'])) {
              $params['sort_alphabet'] = $_GET['sort_alphabet'];
            }

            $url = '?' . http_build_query($params);

            echo "<a href='$url'>$i</a>";
          }
        }
        echo '</div>';

        mysqli_close($conn);
        ?>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/ajaxWork.js"></script>
        <script type="text/javascript" src="../assets/js/script.js"></script>
      </div>
    </div>
  </div>
</body>

</html>