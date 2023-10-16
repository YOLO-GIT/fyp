<?php
    include 'conn.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
    }

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>

</body>
</html>
