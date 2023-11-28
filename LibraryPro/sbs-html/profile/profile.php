<?php
session_start();
include '../conn.php';

// Check if session dah wujud atau belum
if (!isset($_SESSION["IDStud"])) {
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location.href='../auth/login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Student Profile</title>
    <link rel="stylesheet" href="./profile_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="py-5 my-5">
        <div class="container light-style flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-4">
                Account settings
            </h4>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-report">Report</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-terms">Terms & Conditions</a>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="tab-content">
                            <!-- GENERAL -->
                            <div class="tab-pane fade active show" id="account-general">
                                <div class="card-body media align-items-center">
                                    <img src="./profile.png" alt="#" class="d-block ui-w-80">
                                </div>
                                <hr class="border-light m-0">
                                <form method="get" action="update_profile.php">
                                    <div class="card-body">
                                        <?php
                                        $stud_ID = $_SESSION["IDStud"]; // Fetch the ID of the logged-in student
                                        $query = "SELECT * FROM tblstudent WHERE stud_ID = '$stud_ID'"; // Fetch data only for the logged-in student
                                        $result = $con->query($query);
                                        if ($result && $result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                        ?>
                                            <div class="form-group">
                                                <label class="form-label">ID</label>
                                                <input type="text" class="form-control mb-1" name="txtID" value="<?= $row['stud_ID'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="txtname" value="<?= $row['stud_Name'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Role</label>
                                                <input type="text" class="form-control" name="txtrole" value="<?= $row['stud_roles'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Kelas</label>
                                                <input type="text" class="form-control mb-1" name="txtkelas" value="<?= $row['stud_Class'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control mb-1" name="txtusername" value="<?= $row['stud_username'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Tarikh Masuk</label>
                                                <input type="text" class="form-control mb-1" value="<?= $row['date'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Borrowing Count:</label>
                                                <input type="text" class="form-control mb-1" value="<?= $row['book_count'] ?>" readonly>
                                            </div>
                                            <div class="alert alert-success mt-3">
                                                Your data is safely stored here.<br>
                                            </div>
                                        <?php
                                        } else {
                                            echo "No data found for this student.";
                                        }
                                        ?>
                                        <button class="btn btn-primary" name="cmdsave" onclick="return confirm('Adakah anda pasti untuk mengemaskini info anda?');">Simpan</button>
                                    </div>
                                </form>
                            </div>
                            <!-- CHANGE PASSWORD -->
                            <div class="tab-pane fade" id="account-change-password">
                                <div class="card-body pb-2">
                                    <form method="get" action="change_pwd.php">
                                        <div class="form-group">
                                            <label class="form-label">Katalaluan Kini</label>
                                            <input type="password" class="form-control" name="current_password" required maxlength="9" placeholder="Sila letak katalaluan anda.">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Katalaluan Baharu</label>
                                            <input type="password" class="form-control" name="new_password" required maxlength="9" placeholder="Sila letak katalaluan baru anda.">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Ulang Katalaluan Baharu</label>
                                            <input type="password" class="form-control" name="repeat_new_password" required maxlength="9" placeholder="Sila letak semula katalaluan baru anda.">
                                        </div>
                                        <button class="btn btn-primary" name="cmdchange" onclick="return confirm('Adakah anda pasti untuk mengemaskini katalaluan anda?');">Simpan</button>
                                    </form>
                                </div>
                            </div>
                            <!-- INFO -->
                            <div class="tab-pane fade" id="account-info">
                                <div class="card-body pb-2">
                                    <?php
                                    $stud_ID = $_SESSION["IDStud"]; // Fetch the ID of the logged-in student
                                    $query = "SELECT * FROM tblstudent WHERE stud_ID = '$stud_ID'"; // Fetch data only for the logged-in student
                                    $result = $con->query($query);
                                    if ($result && $result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                    ?>
                                        <form method="get" action="user_profile.php">
                                            <div class="form-group" hidden>
                                                <label class="form-label">ID</label>
                                                <input type="text" class="form-control" name="profile_id" value="<?= $stud_ID ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Bio</label>
                                                <textarea class="form-control" rows="5" name="profile_bio" placeholder="Sila tulis bio anda. (50 patah perkataan sahaja)" maxlength="50"><?= $row['bio'] ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Tarikh Lahir</label>
                                                <input type="date" class="form-control" name="profile_bday" value="<?= $row['birthday'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Negeri</label>
                                                <select class="custom-select" name="cbonegeri" value="<?= $row['negeri'] ?>">
                                                    <option value="Kelantan">Kelantan</option>
                                                    <option value="Terengganu" selected>Terengganu</option>
                                                    <option value="Perak">Perak</option>
                                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                    <option value="Johor">Johor</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-primary" name="cmdprofile" onclick="return confirm('Adakah anda pasti untuk mengemaskini profil anda?');">Simpan</button>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- REPORT -->
                            <div class="tab-pane fade" id="account-report">
                                <div class="card-body pb-2">
                                    <?php
                                    $stud_ID = $_SESSION["IDStud"];
                                    ?>
                                    <form method="get" action="user_profile.php">
                                        <div class="form-group" hidden>
                                            <label class="form-label">ID</label>
                                            <input type="text" class="form-control" name="report_id" value="<?= $stud_ID ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Apakah yang anda ingin laporkan?</label>
                                            <textarea class="form-control" rows="5" name="txtreport" placeholder="Sila tulis masalah yang anda hadapi." required></textarea>
                                        </div>
                                        <button class="btn btn-primary" name="cmdreport">Simpan</button>
                                    </form>
                                </div>
                            </div>
                            <!-- TERMS & CONDITION -->
                            <div class="tab-pane fade" id="account-terms">
                                <div class="card-body pb-2">
                                    <div class="form-control">
                                        <label class="alert alert-primary bold-text">Terma dan kondisi</label>
                                    </div>
                                    <label class="form-control">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                        numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                                        optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                                        obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                                        nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
                                        tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-left mt-3">
                <button type="button" class="btn btn-primary"><a href="../index.php" style="color:#fff;">Return to Home Page</a></button>
            </div>
        </div>
    </section>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>