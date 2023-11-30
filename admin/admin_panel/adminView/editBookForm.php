<div class="container p-2">

    <h4>Edit Variation Detail</h4>
    <br>
    <button class="btn btn-primary"><a href="../adminView/viewBooks.php" style="color: #fff;">Return To Book List</a></button>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * from tblbook Where book_ID='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
    ?>
            <form id="update-Items" onsubmit="updateBook()" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="text" class="form-control" id="v_id" value="<?= $row1['book_ID'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="qty">Update Book's Title:</label>
                    <input type="text" class="form-control" id="qty" value="<?= $row1['book_title'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="qty">Update ISBN Number:</label>
                    <input type="text" class="form-control" id="isbn" value="<?= $row1['book_ISBN'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="author">Update Author:</label>
                    <input type="text" class="form-control" id="author" value="<?= $row1['book_author'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="publish">Update Publisher:</label>
                    <input type="text" class="form-control" id="publish" value="<?= $row1['publisher'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="publish">Update Calling Number:</label>
                    <input type="text" class="form-control" id="dewey" value="<?= $row1['book_dewey'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="publish">Update Book's Description:</label>
                    <input type="text" class="form-control" id="desc" value="<?= $row1['book_desc'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="category">Update Book's Category:</label>
                    <select name="cbokategori" class="form-control" id="category" required>
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
                    <select name="cbolanguage" class="form-control" id="language" required>
                        <option value="<?= $row1['book_language'] ?>"><?= $row1['book_language'] ?></option>
                        <option value="Bahasa Melayu">Bahasa Melayu</option>
                        <option value="Bahasa Inggeris">Bahasa Inggeris</option>
                        <option value="Bahasa Cina">Bahasa Cina</option>
                        <option value="Bahasa Tamil">Bahasa Tamil</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="illustration">Update Book's Illustration:</label>
                    <select name="cboillustrasi" class="form-control" id="illustration" required>
                        <option value="<?= $row1['book_illustration'] ?>"><?= $row1['book_illustration'] ?></option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="info1">Update Book's Info 1:</label>
                    <input type="text" class="form-control" id="info1" value="<?= $row1['book_matter1'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="info2">Update Book's Info 2:</label>
                    <input type="text" class="form-control" id="info2" value="<?= $row1['book_matter2'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="info3">Update Book's Info 3:</label>
                    <input type="text" class="form-control" id="info3" value="<?= $row1['book_matter3'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="condition">Update Book's Condition:</label>
                    <select name="cboillustrasi" class="form-control" id="condition" required>
                        <option value="<?= $row1['book_status'] ?>"><?= $row1['book_status'] ?></option>
                        <option value="Good">Good</option>
                        <option value="Normal">Normal</option>
                        <option value="Broken">Broken</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Update Book's Picture</label>
                    <input class="form-control" type="file" id="gmbr" name="my_image" accept="image/x-png,image/gif,image/jpeg" value="<?= $row1['book_image'] ?>">
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-primary">Save</button>
                </div>
            </form>
    <?php
        }
    }
    ?>
</div>