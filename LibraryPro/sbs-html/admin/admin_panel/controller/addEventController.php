<?php
include_once "../config/dbconnect.php";

if (isset($_POST["cmdadd"])) {
    $event_name = $_POST["txttitle"];
    $event_desc = $_POST["txtdesc"];

    $name = $_FILES['my_image']['name'];
    $temp = $_FILES['my_image']['tmp_name'];

    $location = "./uploads/";
    $image = $location . $name;

    $target_dir = "uploads/";
    $finalImage = $target_dir . $name;

    // Create ID Record
    $year = date("Y");

    $id = $year . bin2hex(random_bytes(3));

    move_uploaded_file($temp, $finalImage);
    //Timezone
    date_default_timezone_set("Asia/Kuala_Lumpur");

    $sql = "INSERT INTO `tblevents`(`event_id`, `event_name`, `event_pic`, `event_desc`) 
    VALUES ('$id','$event_name','$finalImage','$event_desc')";

    $insert = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (!$insert) {
        echo mysqli_error($conn);
    } else {
        //Prompt to the user.
        echo "<script>alert('Event Successfully added.');</script>";

        //Redirect to page ---> Login.php
        echo "<script>window.location.href='../adminView/viewEvent.php';</script>";
    }
}
