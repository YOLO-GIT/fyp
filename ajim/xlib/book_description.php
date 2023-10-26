<?php
// Establish a database connection (replace with your actual database credentials)
include("conn.php");
// Assume you have a book ID as a parameter (you should get this from the URL or user input)
$bookID = $_GET['book_id'];

// Define an SQL query to retrieve book information based on book ID
$sql = "SELECT * FROM tblbook WHERE book_ID = $bookID";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    
    $bookTitle = $row['book_title'];
    $bookAuthor = $row['book_author'];
    $bookISBN = $row['book_ISBN'];
    $bookPublisher = $row['publisher'];
    $bookCover = $row['cover_image_url']; // Replace with the actual column name
    $bookDescription = $row['description'];
    $publication_Year = $row['publication_year']; // Replace with the actual column name
} else {
    // Handle the case where the book is not found
    echo "Book not found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Book Title</title>
</head>
<body>
    <header>
        <h1><?php echo $bookTitle; ?></h1>
    </header>

    <main>
        <section id="book-details">
            <div id="book-cover">
                <img src="<?php echo $bookCover; ?>" alt="Book Cover">
            </div>
            <div id="book-info">
                <p>Author: <?php echo $bookAuthor; ?></p>
                <p>ISBN: <?php echo $bookISBN; ?></p>
                <p>Publisher: <?php echo $bookPublisher; ?></p>
                <p>Publication Date: <?php echo $publication_Year; ?></p>
            </div>
        </section>

        <section id="book-description">
            <h2>Description</h2>
            <p>
                <?php echo $bookDescription; ?>
            </p>
        </section>

        <section>
            <a href="<?php echo $booking; ?>"><button id="booking">Booking now</button></a>
        </section>
    </main>
</body>
</html>
