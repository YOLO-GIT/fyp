<?php
    include 'conn.php';

    $id = $_GET["id"];
    $type = $_GET["type"];

    if ($type == "book"){
        $sql = "DELETE FROM tblbook WHERE book_id=$id";
    } else {
        $sql = "DELETE FROM users WHERE book_id=$id";
    }
    
    $result = mysqli_query($conn, $sql);

    if ($result){
        header("Location: dashboard.php");
    } 

    mysqli_close($conn);
?>