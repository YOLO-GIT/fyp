<?php
    // Fetch using isbn
    if (isset($_GET["isbn"])) {
        $isbn = $_GET["isbn"];
        include 'conn.php';
        $sql = "SELECT * FROM tblbook WHERE isbn = '$isbn'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $book = $result->fetch_assoc();
        } else {
            echo "Book not found.";
        }
    } else {
        echo "ISBN parameter is missing.";
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        h1 {
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .book-info {
            padding: 20px;
        }
        .book-info h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Book Detail</h1>
    </header>
    <div class="container">
        <div class="book-info">
            <h2><?php echo $book['title']; ?></h2>
            <p><strong>Author:</strong> <?php echo $book['author']; ?></p>
            <p><strong>Category:</strong> <?php echo $book['category']; ?></p>
            <p><strong>Description:</strong> <?php echo $book['description']; ?></p>
            <p><strong>ISBN:</strong> <?php echo $book['isbn']; ?></p>
            <p><strong>Published Year:</strong> <?php echo $book['published_year']; ?></p>
            <p><strong>Availability:</strong> <?php echo $book['availability']; ?></p>
        </div>
    </div>
</body>
</html>
