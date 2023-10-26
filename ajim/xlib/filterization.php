<?php
    include 'conn.php';
    /*
    session_start();
    
    if (!isset($_SESSION['idcust'])) {
        header("Location: login.php");
        exit();
    }
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtered</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    $result = null;

    if(isset($_GET["author"])) {
        $author = $_GET['author']; 
        $sql = "SELECT * FROM tblbook WHERE book_author = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $author);
        $stmt->execute();
        $result = $stmt->get_result();
        $what = $author;
    }    

    if(isset($_GET["genre"])) {
        $genre = $_GET['genre'];
        $sql = "SELECT * FROM tblbook WHERE genre = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $genre);
        $stmt->execute();
        $result = $stmt->get_result();
        $what = $genre;
    }

    echo '<div class="container">';
    echo '<ul class="book-list">';

    if ($result !== null && $result->num_rows > 0) {
        echo "<h2>Search Results for $what</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<li><h4><a class='booklink' href='desc.php?book_id=" . $row['book_ID'] . "'>" . $row['book_title'] . "</a></h4>";
            echo "<p>" . $row['description'] . "</p>";
        }
    } else {
        echo "No results found.";
    }
    ?>
    </ul>
    </div>
</body>
</html>
