<?php

session_start();

include_once "conn.php";

// Check if session exist
if (isset($_SESSION["IDStud"])) {
    $log = "Logout";
    $func_todo = "auth/logout.php";
    $profile = "profile/profile.php";
    $stud_ID = $_SESSION["IDStud"];

    $studentQuery = "SELECT * FROM tblstudent WHERE stud_ID = ?";
    $stmt = $con->prepare($studentQuery);
    $stmt->bind_param("s", $stud_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $statement_res = "Welcome Back, " . $user['stud_Name'];
    $stmt->close();
} elseif (isset($_SESSION["IDTeachers"])) {
    $log = "Logout";
    $func_todo = "auth/logout.php";
    $profile = "profile/teacher_profile.php";

    $teachers_ID = $_SESSION["IDTeachers"];

    $teachersQuery = "SELECT * FROM tblteachers WHERE teachers_ID = ?";
    $stmt = $con->prepare($teachersQuery);
    $stmt->bind_param("s", $teachers_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $statement_res = "Welcome Back, " . $user['teachers_Name'];
    $stmt->close();
} else {
    $statement_res = null;
    $log = "Login";
    $func_todo = "auth/login.php";
}

if (isset($_GET['book_ID'])) {
    $book_ID = $_GET['book_ID'];
} else {
    echo "No book selected.";
    exit();
}

if (isset($_GET['transc_ID'])) {
    $transc_ID = $_GET['transc_ID'];
} else {
    echo "No user selected.";
    exit();
}

$checkAvailability = "SELECT * FROM tbltransaction WHERE `book_ID` = '$book_ID' AND isBooked = 0";
$result_availability = mysqli_query($con, $checkAvailability);

if (!$result_availability || mysqli_num_rows($result_availability) == 0) {
    $deleteQuery = "DELETE FROM tbltransaction WHERE transc_ID='$transc_ID'";
    if (mysqli_query($con, $deleteQuery)) {
        echo "<script>alert('You can borrow this book. Redirecting you to the borrowing Page.');</script>";
        echo "<script>window.location.href='display_book.php?book_ID=" . $book_ID . "';</script>";
    } else {
        echo "<script>alert('There is something wrong with the page. Please try again.');</script>";
        mysqli_close($con);
        echo "<script>window.location.href='buku_saya.php';</script>";
    }
} else {
    echo "<script>alert('The Book is still not available yet. Please try again later.');</script>";
    echo "<script>window.location.href='buku_saya.php';</script>";
}


// Close the database connection
mysqli_close($con);
