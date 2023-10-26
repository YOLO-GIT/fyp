<?php
    include 'conn.php';
    $book_id = $_GET['book_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Detail</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Book Detail</h1>
    </header>
    <div class="container">
        <div class="book-info">
            <?php
                $query = "";
                $sql = "SELECT * FROM tblbook WHERE book_ID = $book_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                }

                echo "<h2>". $row["book_title"] ."</h2>";
                echo "<p><strong>Author: ". $row["book_author"] ."</strong></p>";
                echo "<p><strong>Category: ". $row["genre"] ."</strong></p>";
                echo "<p><strong>Description: ". $row["description"] ."</strong></p>";
                echo "<p><strong>ISBN: ". $row["book_ISBN"] ."</strong></p>";
                echo "<p><strong>Published Year: ". $row["publication_year"] ."</strong></p>";
                echo "<p><strong>Availability: ". $row["stock_availability"] ."</strong></p>";
            ?>
        </div>
    </div>

</body>
</html>
