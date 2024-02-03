<?php
session_start();
include '../conn.php';

// Check if session "idcust" dah wujud atau belum
if (!isset($_SESSION["IDTeachers"])) {
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
    <link rel="icon" type="image/x-icon" href="../images/icon.png">
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
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="txtTname" value="<?= $row['teachers_Name'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Role</label>
                                                <input type="text" class="form-control" name="txtTrole" value="<?= $row['teacher_roles'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control mb-1" name="txtTuname" value="<?= $row['teachers_username'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Date Joined</label>
                                                <input type="text" class="form-control mb-1" value="<?= $row['date_teachers'] ?>" readonly>
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
                                            echo "No data found for this teacher.";
                                        }
                                        ?>
                                        <button class="btn btn-primary" name="cmdTsave" onclick="return confirm('Are you sure you want to update your profile?');">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- CHANGE PASSWORD -->
                            <div class="tab-pane fade" id="account-change-password">
                                <div class="card-body pb-2">
                                    <form method="get" action="change_pwd.php">
                                        <div class="form-group">
                                            <label class="form-label">Katalaluan Kini</label>
                                            <input type="password" class="form-control" name="current_passwordT" required maxlength="9" placeholder="Please input your current password.">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Katalaluan Baharu</label>
                                            <input type="password" class="form-control" name="new_passwordT" required maxlength="9" placeholder="Please input your new password.">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Ulang Katalaluan Baharu</label>
                                            <input type="password" class="form-control" name="repeat_new_passwordT" required maxlength="9" placeholder="Please confirm your password.">
                                        </div>
                                        <button class="btn btn-primary" name="cmdchangeT" onclick="return confirm('Are you sure you want to update your password?');">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <!-- INFO -->
                            <div class="tab-pane fade" id="account-info">
                                <div class="card-body pb-2">
                                    <?php
                                    $teachers_ID = $_SESSION["IDTeachers"]; // Fetch the ID of the logged-in student
                                    $query = "SELECT * FROM tblteachers WHERE teachers_ID = '$teachers_ID'"; // Fetch data only for the logged-in student
                                    $result = $con->query($query);
                                    if ($result && $result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                    ?>
                                        <form method="get" action="user_profile.php">
                                            <div class="form-group" hidden>
                                                <label class="form-label">ID</label>
                                                <input type="text" class="form-control" name="Tprofile_id" value="<?= $teachers_ID ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Bio</label>
                                                <textarea class="form-control" rows="5" name="Tprofile_bio" maxlength="50"><?= $row['bio'] ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" name="Tprofile_bday" value="<?= $row['birthday'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">State</label>
                                                <select class="custom-select" name="Tcbonegeri" value="<?= $row['negeri'] ?>">
                                                    <option value="Kelantan">Kelantan</option>
                                                    <option value="Terengganu" selected>Terengganu</option>
                                                    <option value="Perak">Perak</option>
                                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                    <option value="Johor">Johor</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-primary" name="Tcmdprofile" onclick="return confirm('Are you sure you want to update your info?');">Submit</button>
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
                                    $teachers_ID = $_SESSION["IDTeachers"]; // Fetch the ID of the logged-in student
                                    $query = "SELECT * FROM tblteachers WHERE teachers_ID = '$teachers_ID'"; // Fetch data only for the logged-in student
                                    $result = $con->query($query);
                                    if ($result && $result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                    ?>
                                        <form method="get" action="user_profile.php">
                                            <div class="form-group" hidden>
                                                <label class="form-label">ID</label>
                                                <input type="text" class="form-control" name="Treport_id" value="<?= $teachers_ID ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">What kind of report that you want to make?</label>
                                                <textarea class="form-control" rows="4" name="Ttxtreport" placeholder="Please inform any report that you want to apply. (Max 50 words)" required maxlength="50"></textarea>
                                            </div>
                                            <button class="btn btn-primary" name="Tcmdreport">Submit</button>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- TERMS & CONDITION -->
                            <div class="tab-pane fade" id="account-terms">
                                <div class="card-body pb-2">
                                    <div class="form-control">
                                        <div class="form-group">
                                            <h4 class="text-center font-weight-bold">Terms and Conditions</h4>
                                        </div>
                                        <div class="form-group">
                                            <p class="font-weight-bold">1. Return Problem:</p>
                                            <ul>
                                                <li>Users are responsible for returning borrowed books on or before the specified due date.</li>
                                                <li>Late returns may result in fines or other penalties, as outlined in the library's policies.</li>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <p class="font-weight-bold">2. Book Lost:</p>
                                            <ul>
                                                <li>In the event of a lost book, the user is required to report the loss immediately to the library staff.</li>
                                                <li>The user will be responsible for replacing the lost book or reimbursing the library for the cost of the book.</li>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <p class="font-weight-bold">3. Misunderstood Registration:</p>
                                            <ul>
                                                <li>Users are responsible for providing accurate and complete registration information.</li>
                                                <li>Any misunderstanding or misinformation provided during the registration process is the user's responsibility to rectify.</li>
                                            </ul>
                                        </div>
                                        <!-- 4 to 8 -->
                                        <div class="form-group">
                                            <p class="font-weight-bold">4. Book Ruined:</p>
                                            <ul>
                                                <li>Users must handle library materials with care to prevent damage.</li>
                                                <li>In the case of damaged books, the user may be held responsible for repair or replacement costs.</li>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <p class="font-weight-bold">5. Book Stolen:</p>
                                            <ul>
                                                <li>Users are responsible for the security of borrowed materials.</li>
                                                <li>In the event of a stolen book, the user must report the incident promptly to the library staff.</li>
                                                <li>Users may be held responsible for the replacement cost of the stolen book.</li>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <p class="font-weight-bold">6. General Responsibilities:</p>
                                            <ul>
                                                <li>Users are expected to adhere to all library policies and guidelines.</li>
                                                <li>The library reserves the right to take appropriate action in the event of non-compliance with these terms and conditions.</li>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <p class="font-weight-bold">7. Human Error:</p>
                                            <ul>
                                                <li>The library acknowledges that certain situations, including but not limited to those resulting from human error, may occur.</li>
                                                <li>The library will work with users to address issues arising from such errors, and resolutions will be determined on a case-by-case basis.</li>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <p class="font-weight-bold">8. Liability:</p>
                                            <ul>
                                                <li>The school, including its staff and administration, shall not be held liable for circumstances arising from user actions, including those outlined above.</li>
                                                <li>Users accept responsibility for their interactions with the library and the consequences of any actions or omissions.</li>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <p class="font-weight-bold">By using the library services, users agree to abide by these terms and conditions. The library reserves the right to modify these terms as needed and will communicate any changes to users.</p>
                                        </div>
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