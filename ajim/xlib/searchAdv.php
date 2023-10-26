<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Library Database</h1>
</header>
    <nav>
        <ul>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="dashboard.php">Admin</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="index2.php">Search</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
<?php
    require 'conn.php';

    $query = $_GET['query'];
    $genre = $_GET['genre'];
    $publication_year = $_GET['publication_year'];
    $language = $_GET['language'];

    $sql = "SELECT * FROM `tblbook` WHERE 
            (`book_title` LIKE '%$query%' OR
             `book_author` LIKE '%$query%' OR
             `book_ISBN` LIKE '%$query%')";

    if (!empty($genre)) {
        $sql .= " AND `genre` = '$genre'";
    }

    if (!empty($publication_year)) {
        $sql .= " AND `publication_year` = '$publication_year'";
    }

    if (!empty($language)) {
        $sql .= " AND `language` = '$language'";
    }

    $result = $conn->query($sql);
    ?>

    <div class="container">
        <ul class="book-list">
        <?php
            if ($result->num_rows > 0) {
                echo "<h2>Search Result for " . $query . ":</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li><h4><a class='booklink' href='desc.php?book_id='" . $row['book_ID'] . "'>" . $row['book_title'] . "</a></h4>";
                    echo "<p>" . $row['description'] . "</p>";
                }
            } else {
                echo "No results found.";
            }
        ?>
    </div>
</body>
</html>