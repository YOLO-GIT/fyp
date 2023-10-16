<?php
    include 'conn.php';
    if (isset($_GET["cmdadd"])){
        $title = $_GET["txttitle"];
        $author = $_GET["txtauthor"];
        $category = $_GET["txtcategory"];
        $desc = $_GET["txtdescription"];
        $isbn = $_GET["txtisbn"];
        $published = $_GET["txtpublishyear"];
        $available = $_GET["txtavailability"];

        $sql = "INSERT INTO tblbook (title, author, category, descr, isbn, pyear, availability)
                VALUES ('$title', '$author', '$category', '$descr', '$isbn', '$pyear', '$availability')";

        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location: dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
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
        .form-group {
            margin-top: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        .form-group button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Add New Book</h1>
    </header>
    <div class="container">
        <form action="" method="get" name="frmnewbook">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="txttitle" placeholder="Enter book title" required>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="txtauthor" placeholder="Enter author name" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" name="txtcategory" placeholder="Enter book category" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="txtdescription" rows="4" placeholder="Enter book description" required></textarea>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" name="txtisbn" placeholder="Enter book ISBN" required>
            </div>
            <div class="form-group">
                <label for="published_year">Published Year:</label>
                <input type="number" name="txtpublishyear" placeholder="Enter published year" required>
            </div>
            <div class="form-group">
                <label for="availability">Availability:</label>
                <input type="number" name="txtavailability" placeholder="Enter availability count" required>
            </div>
            <div class="form-group">
                <button type="submit" name="cmdadd">Add Book</button>
            </div>
        </form>
    </div>
</body>
</html>
