<?php // Sekiranya button submit diklik

//Create Connection to the database
include 'conn.php';

// isset = is setted to ?
if (isset($_GET["cmdregister"])) {
    // receive submitted value
    $ic = $_GET["txtic"];
    $fname = $_GET["txtfnama"];
    $lname = $_GET["txtlnama"];
    $uname = $_GET["txtuname"];
    $kelas = $_GET["txtkelas"];
    $password = hash("sha512", $_GET["txtpwd"]);

    $clean_name = $fname . " " . $lname; // Replaced "&nbsp;" with a space
    $clean_name = strip_tags($clean_name); // Remove any remaining tags

    $email = "user@gmail.com";

    if (intval(substr($ic, 11, 1)) % 2 == 1) {
        $jantina = "J";
    } else {
        $jantina = "B";
    }

    $icnum = substr($ic, 8, 4);

    $id = "S" . $jantina . $icnum;

    // CHeck if the content already exist:
    // CHECKING START

    //USERNAME
    $check_username_query = "SELECT * FROM tblstudent WHERE stud_username='$uname'";
    $check_username = mysqli_query($con, $check_username_query);
    //PASSWORD
    $check_password_query = "SELECT * FROM tblstudent WHERE stud_pwd='$password'";
    $check_password = mysqli_query($con, $check_password_query);

    // CHECKING END

    if (mysqli_num_rows($check_username) > 0) {
        // Validation if the content is same
        echo "<script>alert('This username already has been used.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='register.php';</script>";
    } elseif (mysqli_num_rows($check_password) > 0) {
        // Validation if the content is same
        echo "<script>alert('This password already has been used.');</script>";
        // Close the DB to ensure it will not updated.
        mysqli_close($con);
        // Sending back to the Teacher Panel.
        echo "<script>window.location.href='register.php';</script>";
    } else {
        // SQL Login For Student
        $sql_login = "INSERT INTO `tblstudent`(`stud_ID`, `stud_Name`, `stud_username`, `stud_Class`, `email`, `stud_pwd`, `date`) 
        VALUES ('$id','$clean_name','$uname','$kelas','$email','$password',NOW())";

        //Execute SQL Login Statement
        $res = mysqli_query($con, $sql_login);

        //Close Con
        mysqli_close($con);

        //Prompt to the user.
        echo "<script>alert('Your registration is successful. Please proceed to the login page');</script>";

        //Redirect to page ---> Login.php
        echo "<script>window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>sbs</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- custom style css -->
    <link rel="stylesheet" href="css/custom_style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout inner_page">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->

    <!-- Registration Form Start -->
    <div class="contact1">
        <div class="col-md-12">
            <div class="new_title text_align_center">
                <h2>Register</h2>
            </div>
        </div>
        <div class="container">
            <div class="row custom-background">
                <div class="col-md-12">
                    <form name="frmregisteration" class="main_form_reg" action="" method="get">
                        <br><br>
                        <div class="row">
                            <!-- IC -->
                            <div class="col-md-12">
                                <input class="contactus" placeholder="IC Number*" type="text" name="txtic" required maxlength="12" pattern=".{12,}>
                            </div>
                            <!-- NAMA PERTAMA -->
                            <div class=" col-md-6">
                                <input class="contactus" placeholder="Nama Depan Anda: Ahmad (Maksimum 10 Perkataan)" type="text" name="txtfnama" required maxlength="10">
                            </div>
                            <!-- NAMA KEDUA -->
                            <div class="col-md-6">
                                <input class="contactus" placeholder="Nama Belakang Anda: Aziz (Maksimum 10 Perkataan)" type="text" name="txtlnama" required maxlength="10">
                            </div>
                            <!-- NAMA SAMARAN -->
                            <div class="col-md-6">
                                <input class="contactus" placeholder="Username anda (Maksimum 10 Perkataan)" type="text" name="txtunama" required maxlength="10">
                            </div>
                            <!-- KELAS -->
                            <div class="col-md-6">
                                <input class="contactus" placeholder="Kelas*" type="text" name="txtkelas" required>
                            </div>
                            <!-- EMAIL -->
                            <div class="col-md-6">
                                <input class="contactus" value="user@gmail.com" type="text" name="txtEmail" disabled>
                            </div>
                            <!-- PASSWORD -->
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Password (Maksimum 8 nombor)*" type="password" name="txtpwd" required maxlength="8" pattern=".{8,}">
                            </div>
                            <!-- SUBMIT -->
                            <div class=" col-md-12">
                                <button class="send_btn1" name="cmdregister">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="titlepage text_align_left">
                        <h3>Already Register?</h3>
                        <h3>Click <a href="login.php">here for login</a></h3>
                        <h3>Click <a href="logout.php">here for logout</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Registration Form End -->

    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2024 Hak Cipta Terpelihara. Stolen By Archon Daun</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/custom.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>