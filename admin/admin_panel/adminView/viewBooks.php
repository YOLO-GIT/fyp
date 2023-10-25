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

  <?php
  include "../adminHeader.php";
  include "../sidebar.php";

  include_once "../config/dbconnect.php";

  ?>

  <div id="main-content" class="container allContent-section">

    <form action="">
      <!-- Sorting Function -->
      <div class="input-group mb-3">
        <select name="sort_alphabet" class="form-control" required>
          <option value="">-- Pilih Jenis Susunan --</option>
          <option value="a-z" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z") {
                                echo "selected";
                              } ?>>A-Z (Ascending Order)</option>
          <option value="z-a" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a") {
                                echo "selected";
                              } ?>>Z-A (Descending Order)</option>
        </select>
        <button type="submit" class="btn btn-primary">
          Sort
        </button>
      </div>
      <!-- Sorting Function Ends -->
    </form>

    <h2>Senarai Buku</h2>
    <div class="row">
      <!-- Button Search -->
      <button class="open-button-popup" onclick="openForm()">Search Button</button>
      <!-- Start Book Search -->
      <div class="form-popup" id="myForm">
        <form action="" class="form-container-popup">
          <div class="col-md-12">
            <div class="card mt-4">
              <div class="card-header">
                <h4 style="color: white;">Search Books</h4>
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
                      <br><br><button type="button" class="btn btn-secondary cancel" onclick="closeForm()">Close</button>
                      <br><br><button type="button" class="btn btn-secondary refresh" onclick="resetForm()">Refresh Page</button>
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
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">No. Perolehan</th>
            <th class="text-center">Judul Buku</th>
            <th class="text-center">Pengarang</th>
            <th class="text-center">Nama Penerbit</th>
            <th class="text-center">ISBN/ISSN</th>
            <th class="text-center">Dewey Buku</th>
            <th class="text-center">Tarikh</th>
            <th class="text-center">Mengemaskini</th>
            <th class="text-center">Tolak</th>
          </tr>
        </thead>
        <!-- PHP Starts -->
        <?php
        include_once "../config/dbconnect.php";

        // Search
        $filtervalues = isset($_GET['search']) ? $_GET['search'] : '';
        // Sorting
        $sort_option = isset($_GET['sort_alphabet']) ? $_GET['sort_alphabet'] : '';
        //Result Page
        $resultPage = 5;

        // Searching Function PHP
        $query = "SELECT * FROM tblbook ";
        if (!empty($filtervalues)) {
          $query .= "WHERE `book_title` LIKE '%$filtervalues%' ";
        }

        // Sorting Function PHP
        if (!empty($sort_option)) {
          if ($sort_option === "a-z") {
            $query .= "ORDER BY book_title ASC";
          } elseif ($sort_option === "z-a") {
            $query .= "ORDER BY book_title DESC";
          }
        }

        // Pagination logic
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $resultPage;

        $queryCount = "SELECT COUNT(*) as total FROM tblbook";
        $totalResult = $conn->query($queryCount)->fetch_assoc()['total'];
        $totalPages = ceil($totalResult / $resultPage);

        $query .= " LIMIT $start, $resultPage";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <!-- rest of the row code remains unchanged -->
            <tr>
              <td><?= $row["book_ID"] ?></td>
              <td class="book-title"><?= $row["book_title"] ?></td>
              <td><?= $row["book_author"] ?></td>
              <td><?= $row["publisher"] ?></td>
              <td><?= $row["book_ISBN"] ?></td>
              <td><?= $row["book_dewey"] ?></td>
              <td><?= $row["book_added"] ?></td>
              <td><button class="btn btn-primary" style="height:40px" onclick="bookUpdate('<?= $row['book_ID'] ?>')">Edit</button></td>
              <td><button class="btn btn-danger" style="height:40px" onclick="bookDelete('<?= $row['book_ID'] ?>')">Delete</button></td>
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

      <?php
      // Display pagination links
      echo '<div class="pagination">';
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

      <!-- Trigger the modal with a button -->
      <button type="button" class="btn btn-secondary custom_btn" style="height:40px;" data-toggle="modal" data-target="#myModal">
        Tambahan Buku
      </button>

      <!-- Add Book Starts -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color: antiquewhite;">
              <h4 class="modal-title">Buku Baru</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form enctype='multipart/form-data' name="frmAddBooks" class="adding_section" action="../controller/addBookController.php" method="post" onsubmit="return validated()">
                <div class=" form-group">
                  <label for="id">No. Perolehan:</label>
                  <div id="perolehan_error" class="form-control">Tolong Isi Nombor Perolehan</div>
                  <input type="text" name="txtnoperolehan" class="form-control" placeholder="No. Perolehan" maxlength="5">
                </div>
                <div class="form-group">
                  <label for="title">Nama Buku:</label>
                  <div id="judul_error" class="form-control">Tolong Isi Judul</div>
                  <input type="text" name="txttitle" class="form-control" placeholder="Judul Buku" maxlength="25">
                </div>
                <div class="form-group">
                  <label for="author">Pengarang:</label>
                  <div id="pengarang_error" class="form-control">Tolong Isi Pengarang</div>
                  <input type="text" name="txtauthor" class="form-control" placeholder="Pengarang" maxlength="25">
                </div>
                <div class="form-group">
                  <label for="category">ISBN/ISSN:</label>
                  <div id="isbn_error" class="form-control">Tolong Isi ISBN/ISSN</div>
                  <input type="text" name="txtISBN" id="isbn" class="form-control" placeholder="ISBN/ISSN" maxlength="17">
                </div>
                <div class="form-group">
                  <label for="description">Nama Penerbit:</label>
                  <div id="penerbit_error" class="form-control">Tolong Isi Nama Penerbit</div>
                  <input name="txtpublisher" type="text" class="form-control" placeholder="Penerbit" maxlength="25">
                </div>
                <div class="form-group">
                  <label for="dewey">Dewey:</label>
                  <div id="dewey_error" class="form-control">Tolong Isi Dewey</div>
                  <input type="text" name="txtdewey" class="form-control" placeholder="Dewey Buku" maxlength="12">
                </div>
                <div class="form-group">
                  <label for="category">Kategori:</label>
                  <select name="cbokategori" class="form-control" required>
                    <option value="">Sila Pilih Kategori</option>
                    <option value="Action">Action</option>
                    <option value="History">History</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Science">Science</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="description">Sinopsis Buku:</label>
                  <div id="sinopsis_error" class="form-control">Tolong Isi Sinopsis</div>
                  <textarea name="txtdescription" class="form-control" placeholder="Sinopsis"></textarea>
                </div>
                <div class="form-group">
                  <label for="image">Sila Pilih Gambar</label>
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
</body>

</html>