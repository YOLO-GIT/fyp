<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
        }
        h1 {
            margin-top: 0;
        }
        .search-form {
            margin-bottom: 20px;
        }
        .result {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Book Search</h1>
        <form class="search-form" action="" method="GET" name="frmsearch">
            <input type="text" name="query" placeholder="Search for books" required>
            <button type="submit" name="cmdsearch">Search</button>
        </form>
        <?php
        include 'conn.php';

        $query = "";

        if (isset($_GET["cmdsearch"])) {
            $query = $_GET['query'];

            $sql = "SELECT * FROM tblbook WHERE title LIKE '%$query%'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="result">';
                    echo '<h3><a href="desc.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h3>';
                    echo '<p>Author: ' . $row['author'] . '</p>';
                    echo '<p>Category: ' . $row['category'] . '</p>';
                    echo '<p>Description: ' . $row['descr'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No results found for "' . $query . '".</p>';
            }
        }
        
        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
