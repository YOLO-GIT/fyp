<?php
session_start();
$userIsLogged = false;
/*if (!isset($_SESSION['idcust'])) {
    header("Location: login.php");
    exit();
} else {
    $userIsLogged = true;
}*/

if (isset($_SESSION['idcust'])) {
    /*
    $isAdmin = checkAdminRole($_SESSION['user_id']);

    if ($isAdmin) {
        header("Location: dashboard.php");
        exit();
    }*/
    $userIsLogged = true;
} else {
    $userIsLogged = false;
}

/*
function checkAdminRole($userId) {
    $adminUser = ['A001','AK47'];
    return $adminUser[$userId];
}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Homepage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Library Homepage</h1>
    </header>
    <nav>
        <ul>
        <?php if ($userIsLogged): ?>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a></li>
            <?php // if($isAdmin):?>
            <li><a href="dashboard.php">Admin</a></li>
            <?php //endif; ?>
        <?php endif; ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="querySearch.php">Search</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Welcome to Our Library</h2>
        
        <h3>Featured Books</h3>
        <ul class="book-list">
            <?php
                include("conn.php");
                $query = "";
                $sql = "SELECT * FROM tblbook WHERE 1";
                $res = $conn->query($sql);

                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<li><h4><a class='booklink' href='desc.php?book_id=" . $row['book_ID'] . "'>" . $row['book_title'] . "</a></h4>";
                        echo "<p>Author: <a class='booklink' href='filterization.php?book_author=" . $row["book_author"] . "'>" . $row["book_author"] . "</a></p>";
                        echo "<p>Category: <a class='booklink' href='filterization.php?genre=" . $row["genre"] . "'>" . $row["genre"] . "</a></p></li>";                        
                    }
                }
            ?>
        </ul>
    </div>
</body>
</html>
