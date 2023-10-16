<?php
    include 'conn.php';

    $id = $_GET["id"];
    $type = $_GET["type"];

    if ($type == "book"){
        $sql = "DELETE FROM tblbook WHERE id=$id";
    } else {
        $sql = "DELETE FROM tblcustomer WHERE id=$id";
    }
    
    $result = mysqli_query($conn, $sql);

    if ($result){
        header("Location: dashboard.php");
    } 

    mysqli_close($conn);
?>