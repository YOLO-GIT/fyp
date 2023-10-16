<div class="container p-5">

    <h4>Edit Variation Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * from tbltransaction Where transc_ID='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
    ?>
            <form id="update-Items" onsubmit="updateVariations()" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="text" class="form-control" id="v_id" value="<?= $row1['transc_ID'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="qty">Status:</label>
                    <input type="text" class="form-control" id="qty" value="<?= $row1['transc_name'] ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-primary">Update Variation</button>
                </div>
        <?php
        }
    }
        ?>
            </form>


</div>