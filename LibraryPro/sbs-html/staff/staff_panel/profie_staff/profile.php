<?php
include "../config/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff | Profile</title>
    <link rel="stylesheet" href="./style.css">
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
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">
                                <div class="card-body media align-items-center">
                                    <img src="profile.png" alt="#" class="d-block ui-w-80">
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <?php
                                    $query = "SELECT * FROM tblstaff";
                                    $result = $conn->query($query);
                                    ?>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <div class="form-group">
                                            <label class="form-label">ID</label>
                                            <input type="text" class="form-control mb-1" value="<?= $row['staff_ID'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" value="<?= $row['staff_name'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control mb-1" value="<?= $row['staff_uname'] ?>" readonly>
                                        </div>
                                        <div class="alert alert-success mt-3">
                                            Your data is safely stored here.<br>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-left mt-3">
                <button type="button" class="btn btn-primary"><a href="../index.php" style="color:#fff;">Return to Home Page</a></button>;
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