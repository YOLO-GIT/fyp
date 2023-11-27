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

    // Define SQL Statement
    $sqlevent = "SELECT COUNT(*) as total FROM tblevents WHERE LEFT(event_id, 2) = '$year'";

    $data = mysqli_query($conn, $sqlevent);
    $num = mysqli_fetch_assoc($data);

    //create id Record (Last 4 Char)
    $total = (int)$num["total"];
    $total = sprintf("%04s", ++$total);

    $id = $year . $total;

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
