<?php
include_once "../config/dbconnect.php";

session_start();

if (!isset($_SESSION["IDStaff"])) {
  echo "<script>alert('Please Login First.');</script>";
  echo "<script>window.location.href='../../../auth/login.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Staff || Book</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/custom_validation_Books.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <!-- Icon here -->
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
        <h2 class="text-center mb-3">Book List</h2>
        <div class="table-responsive">
          <!-- Books -->
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th class="text-center">Acquisition Number</th>
                <th class="text-center">Book Title</th>
                <th class="text-center">Author</th>
                <th class="text-center">Publisher</th>
                <th class="text-center">ISBN Number</th>
                <th class="text-center">Calling Number</th>
                <th class="text-center">Date Register</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
              </tr>
            </thead>
            <!-- PHP Starts -->
            <?php
            $query = "SELECT * FROM tblbook ";
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
                  <td><button class="btn btn-danger" style="height:40px" onclick="bookDelete('<?= $row['book_ID'] ?>')">Remove</button></td>
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

          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-info btn-add-book assistant-hover rounded" style="height:40px;" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-book"></i>
          </button>

          <!-- Add Book Starts -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style="background-color: antiquewhite;">
                  <h4 class="modal-title">New Book</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form enctype='multipart/form-data' name="frmAddBooks" class="adding_section" action="../controller/addBookController.php" method="post" onsubmit="return validated()">
                    <div class=" form-group">
                      <label for="id">Acquisition Number:*</label>
                      <div id="perolehan_error" class="form-control">Please fill the Acquisition Number Correctly (No Words)</div>
                      <input type="text" name="txtnoperolehan" class="form-control" placeholder="Acquisition Number" maxlength="5">
                    </div>
                    <div class="form-group">
                      <label for="title">Book Title:*</label>
                      <div id="judul_error" class="form-control">Please fill the Books`s title</div>
                      <input type="text" name="txttitle" class="form-control" placeholder="Book`s Title" maxlength="25">
                    </div>
                    <div class="form-group">
                      <label for="author">Author:*</label>
                      <div id="pengarang_error" class="form-control">Please fill the Author (Words Only)</div>
                      <input type="text" name="txtauthor" class="form-control" placeholder="Author" maxlength="25">
                    </div>
                    <div class="form-group">
                      <label for="category">ISBN Number:*</label>
                      <div id="isbn_error" class="form-control">Please fill the ISBN Number Correctly</div>
                      <input type="text" name="txtISBN" id="isbn" class="form-control" placeholder="ISBN Number" maxlength="17">
                    </div>
                    <div class="form-group">
                      <label for="description">Publisher:*</label>
                      <div id="penerbit_error" class="form-control">Please fill the publisher (No Numbers or Special keywords)</div>
                      <input name="txtpublisher" type="text" class="form-control" placeholder="Publisher" maxlength="25">
                    </div>
                    <div class="form-group">
                      <label for="dewey">Calling Number:*</label>
                      <div id="dewey_error" class="form-control">Please fill the calling number Correctly</div>
                      <input type="text" name="txtdewey" class="form-control" placeholder="Calling Number" maxlength="12">
                    </div>
                    <div class="form-group">
                      <label for="category">Category:*</label>
                      <div id="category_error" class="form-control">Please choose a category</div>
                      <select name="cbokategori" class="form-control" id="categorySelect">
                        <option value="">Please choose category</option>
                        <option value="Action">Action</option>
                        <option value="History">History</option>
                        <option value="Fiction">Fiction</option>
                        <option value="Science">Science</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="description">Book Description:*</label>
                      <div id="sinopsis_error" class="form-control">Please fill the Book`s Description</div>
                      <textarea name="txtdescription" class="form-control" placeholder="Description" maxlength="15"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="language">Book Language:*</label>
                      <div id="language_error" class="form-control">Please choose a Language</div>
                      <select name="cbolanguage" class="form-control">
                        <option value="">Please choose the Book`s language</option>
                        <option value="Bahasa Melayu">Bahasa Melayu</option>
                        <option value="Bahasa Inggeris">Bahasa Inggeris</option>
                        <option value="Bahasa Cina">Bahasa Cina</option>
                        <option value="Bahasa Tamil">Bahasa Tamil</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="illustartion">Book Illustration:*</label>
                      <div id="illustartion_error" class="form-control">Please choose a Language</div>
                      <select name="cboillustrasi" class="form-control">
                        <option value="">Please choose if the book is illustrated or not</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="matter1">Book Matter 1:</label>
                      <input type="text" name="txtmatter1" class="form-control" placeholder="Book Matter 1">
                    </div>
                    <div class="form-group">
                      <label for="matter2">Book Matter 2:</label>
                      <input type="text" name="txtmatter2" class="form-control" placeholder="Book Matter 2">
                    </div>
                    <div class="form-group">
                      <label for="matter3">Book Matter 3:</label>
                      <input type="text" name="txtmatter3" class="form-control" placeholder="Book Matter 3">
                    </div>
                    <div class="form-group">
                      <label for="status">Book Condition:*</label>
                      <div id="condition_error" class="form-control">Please choose the Book's Condition</div>
                      <select name="cboistatus" class="form-control">
                        <option value="">Please Choose the Condition</option>
                        <option value="Good">Good</option>
                        <option value="Normal">Normal</option>
                        <option value="Broken">Broken</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="image">Please pick a picture:*</label>
                      <div id="image_error" class="form-control">Please choose the Book's Picture (Use "default image" if not found)</div>
                      <input class="form-control" type="file" name="my_image" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="cmdadd" class="btn btn-primary">Save</button>
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