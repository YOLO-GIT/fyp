<?php
session_start();
include '../conn.php';

// Check if session "idcust" dah wujud atau belum
if (!$_SESSION["IDTeachers"]) {
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location.href='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Teacher Profile</title>
    <link rel="stylesheet" href="profile_style.css">
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
                    
                    <!-- GENERAL -->
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">
                                <div class="card-body media align-items-center">
                                    <img src="./profile.png" alt="#" class="d-block ui-w-80">
                                </div>
                                <hr class="border-light m-0">
                                <form method="get" action="update_profile.php">
                                    <div class="card-body">
                                        <?php
                                        $Teachers_ID = $_SESSION["IDTeachers"]; // Fetch the ID of the logged-in student
                                        $query = "SELECT * FROM tblteachers WHERE teachers_ID = '$Teachers_ID'"; // Fetch data only for the logged-in student
                                        $result = $con->query($query);
                                        if ($result && $result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                        ?>
                                            <div class="form-group">
                                                <label class="form-label">ID</label>
                                                <input type="text" class="form-control mb-1" name="txtTid" value="<?= $row['teachers_ID'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="txtTname" value="<?= $row['teachers_Name'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control mb-1" name="txtTuname" value="<?= $row['teachers_username'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Tarikh Masuk</label>
                                                <input type="text" class="form-control mb-1" value="<?= $row['date_teachers'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Booking Count:</label>
                                                <input type="text" class="form-control mb-1" value="<?= $row['book_count'] ?>" readonly>
                                            </div>
                                            <div class="alert alert-success mt-3">
                                                Your data is safely stored here.<br>
                                            </div>
                                        <?php
                                        } else {
                                            echo "No data found for this teacher.";
                                        }
                                        ?>
                                        <button class="btn btn-primary" name="cmdTsave" onclick="return confirm('Adakah anda pasti untuk mengemaskini info anda?');">Simpan</button>
                                    </div>
                                </form>
                            </div>
                            <!-- CHANGE PASSWORD -->
                            <div class="tab-pane fade" id="account-change-password">
                                <div class="card-body pb-2">
                                    <form method="get" action="change_pwd.php">
                                        <div class="form-group">
                                            <label class="form-label">Katalaluan Kini</label>
                                            <input type="password" class="form-control" name="current_passwordT" required maxlength="9" placeholder="Sila letak katalaluan anda.">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Katalaluan Baharu</label>
                                            <input type="password" class="form-control" name="new_passwordT" required maxlength="9" placeholder="Sila letak katalaluan baru anda.">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Ulang Katalaluan Baharu</label>
                                            <input type="password" class="form-control" name="repeat_new_passwordT" required maxlength="9" placeholder="Sila letak semula katalaluan baru anda.">
                                        </div>
                                        <button class="btn btn-primary" name="cmdchangeT" onclick="return confirm('Adakah anda pasti untuk mengemaskini katalaluan anda?');">Simpan</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-info">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label">Bio</label>
                                        <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Birthday</label>
                                        <input type="text" class="form-control" value="May 3, 1995">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Country</label>
                                        <select class="custom-select">
                                            <option>USA</option>
                                            <option selected>Canada</option>
                                            <option>UK</option>
                                            <option>Germany</option>
                                            <option>France</option>
                                        </select>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body pb-2">
                                    <h6 class="mb-4">Contacts</h6>
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" value="+0 (123) 456 7891">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Website</label>
                                        <input type="text" class="form-control" value>
                                    </div>
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