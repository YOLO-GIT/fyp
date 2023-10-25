<div class="container p-5">

    <h4>Mengemaskini Data</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * from tblteachers Where teachers_ID='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
    ?>
            <button class="btn btn-primary"><a href="../adminView/viewTeachers.php" style="color: #fff;">Kembali Semula</a></button>
            <form id="update-Items" onsubmit="updateTeacher()" enctype='multipart/form-data'>
                <br>
                <input type="text" class="form-control" id="v_id" value="<?= $row1['teachers_ID'] ?>" hidden>
                <div class="form-group">
                    <label for="v_id">Mengemaskini ID:</label>
                    <input type="text" class="form-control" id="ic" required>
                </div>
                <div class="form-group">
                    <label for="qty">Mengemaskini Nama:</label>
                    <input type="text" class="form-control" id="qty" value="<?= $row1['teachers_Name'] ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-primary">Simpan</button>
                </div>
        <?php
        }
    }
        ?>
            </form>


</div>