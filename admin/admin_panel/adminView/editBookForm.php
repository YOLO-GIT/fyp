<div class="container p-2">

    <h4>Edit Variation Detail</h4>
    <br>
    <button class="btn btn-primary"><a href="../adminView/viewBooks.php" style="color: #fff;">Kembali Semula</a></button>
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
                    <label for="qty">Mengemaskini Tajuk Buku:</label>
                    <input type="text" class="form-control" id="qty" value="<?= $row1['book_title'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="qty">Mengemaskini ISBN:</label>
                    <input type="text" class="form-control" id="isbn" value="<?= $row1['book_ISBN'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="author">Mengemaskini Pengarang:</label>
                    <input type="text" class="form-control" id="author" value="<?= $row1['book_author'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="publish">Mengemaskini Penerbit:</label>
                    <input type="text" class="form-control" id="publish" value="<?= $row1['publisher'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="publish">Mengemaskini Dewey Buku:</label>
                    <input type="text" class="form-control" id="dewey" value="<?= $row1['book_dewey'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="publish">Mengemaskini Diskripsi Buku:</label>
                    <input type="text" class="form-control" id="desc" value="<?= $row1['book_desc'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="image">Mengemaskini Gambar</label>
                    <input class="form-control" type="file" id="gmbr" name="my_image" accept="image/x-png,image/gif,image/jpeg" value="<?= $row1['book_image'] ?>">
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-primary">Simpan</button>
                </div>
            </form>
    <?php
        }
    }
    ?>
    </form>


</div>