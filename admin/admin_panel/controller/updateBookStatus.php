<?php

include_once "../config/dbconnect.php";

$booking_ID = $_POST['record'];
//echo $order_id;
$sql = "SELECT status_ID FROM tblbooking where booking_ID='$booking_ID'";
$result = $conn->query($sql);
//  echo $result;

$row = $result->fetch_assoc();

// echo $row["pay_status"];

if ($row["status_ID"] == 0) {
    $update = mysqli_query($conn, "UPDATE tblbooking SET status_ID=1, status='Borrowing' where booking_ID='$booking_ID'");
} else if ($row["status_ID"] == 1) {
    $update = mysqli_query($conn, "UPDATE tblbooking SET status_ID=0, status='Booking' where booking_ID='$booking_ID'");
}
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
