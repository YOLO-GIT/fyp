<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin || Updating</title>
    <link rel="icon" type="image/x-icon" href="../icon/icon.png">
</head>

<body>
    <div class="container p-2">
        <h4>Edit Variation Detail</h4>
        <br>
        <a href="../adminView/viewBooks.php" class="btn btn-primary" style="color: #fff;">Return To Book List</a>
        <?php
        include_once "../config/dbconnect.php";
        $ID = $_POST['record'];
        $qry = mysqli_query($conn, "SELECT * from tblbook Where book_ID='$ID'");
        $numberOfRow = mysqli_num_rows($qry);
        if ($numberOfRow > 0) {
            while ($row1 = mysqli_fetch_array($qry)) {
        ?>
                <form id="update-Items" enctype='multipart/form-data' method="POST" action="../controller/updateBookController.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="v_id" value="<?= $row1['book_ID'] ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label for="qty">Update Book's Title:</label>
                        <input type="text" class="form-control" name="qty" value="<?= $row1['book_title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="qty">Update ISBN Number:</label>
                        <input type="text" class="form-control" name="isbn" value="<?= $row1['book_ISBN'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="author">Update Author:</label>
                        <input type="text" class="form-control" name="author" value="<?= $row1['book_author'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="publish">Update Publisher:</label>
                        <input type="text" class="form-control" name="publish" value="<?= $row1['publisher'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="publish">Update Calling Number:</label>
                        <input type="text" class="form-control" name="dewey" value="<?= $row1['book_dewey'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="publish">Update Book's Description:</label>
                        <input type="text" class="form-control" name="desc" value="<?= $row1['book_desc'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="category">Update Book's Category:</label>
                        <select name="cbokategori" class="form-control">
                            <option value="<?= $row1['book_category'] ?>"><?= $row1['book_category'] ?></option>
                            <option value="Action">Action</option>
                            <option value="History">History</option>
                            <option value="Fiction">Fiction</option>
                            <option value="Science">Science</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="language">Update Book's Language:</label>
                        <select name="cbolanguage" class="form-control">
                            <option value="<?= $row1['book_language'] ?>"><?= $row1['book_language'] ?></option>
                            <option value="Bahasa Melayu">Bahasa Melayu</option>
                            <option value="Bahasa Inggeris">Bahasa Inggeris</option>
                            <option value="Bahasa Cina">Bahasa Cina</option>
                            <option value="Bahasa Tamil">Bahasa Tamil</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="illustration">Update Book's Illustration:</label>
                        <select name="cboillustrasi" class="form-control">
                            <option value="<?= $row1['book_illustration'] ?>"><?= $row1['book_illustration'] ?></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="info1">Update Book's Info 1:</label>
                        <input type="text" class="form-control" name="info1" value="<?= $row1['book_matter1'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="info2">Update Book's Info 2:</label>
                        <input type="text" class="form-control" name="info2" value="<?= $row1['book_matter2'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="info3">Update Book's Info 3:</label>
                        <input type="text" class="form-control" name="info3" value="<?= $row1['book_matter3'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="condition">Update Book's Condition:</label>
                        <select name="cbokondisi" class="form-control">
                            <option value="<?= $row1['book_status'] ?>"><?= $row1['book_status'] ?></option>
                            <option value="Good">Good</option>
                            <option value="Normal">Normal</option>
                            <option value="Broken">Broken</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Update Book's Picture</label>
                        <input class="form-control" type="file" name="gmbr" name="my_image" accept="image/x-png,image/gif,image/jpeg" value="<?= $row1['book_image'] ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" style="height:40px" class="btn btn-primary" name="cmdsubmit">Save</button>
                    </div>
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>