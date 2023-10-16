<?php
    include 'conn.php';
    if (isset($_GET["cmdcart"])){
        $book = $_GET["isbn"];
        $available = $_GET["available"];


        echo "<script>alert('Borrow successfull');</script>";
        
        if ($available > 0){
            $sql = "INSERT INTO tblborrow()
                    VALUES ()";

            mysqli_query($conn, $sql);
            echo "<script>alert('Borrow successfull');</script>";
            header("location: index.php");
        } else {
            echo "<script>alert('Book isnt available');</script>";
        }
    }
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
        .add-to-cart {
            text-align: center;
            margin-top: 20px;
        }
        .add-to-cart button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Book Detail</h1>
    </header>
    <div class="container">
        <div class="book-info">
            <h2>Book Title</h2>
            <p><strong>Author:</strong> Author Name</p>
            <p><strong>Category:</strong> Fiction</p>
            <p><strong>Description:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget leo euismod, venenatis arcu eget, aliquam metus. Sed id fringilla justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
            <p><strong>ISBN:</strong> 1234567890</p>
            <p><strong>Published Year:</strong> 2023</p>
            <p><strong>Availability:</strong> In Stock</p>
        </div>
        <div class="add-to-cart">
            <button name="cmdcart">Add to Cart</button>
        </div>
    </div>

</body>
</html>
