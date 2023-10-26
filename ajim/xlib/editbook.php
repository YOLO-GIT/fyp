<?php
    include 'conn.php';

    if (isset($_GET["cmdedit"])) {
        $id = $_GET["txtid"];
        $title = $_GET["txttitle"];
        $author = $_GET["txtauthor"];
        $genre = $_GET["txtgenre"];
        $descr = $_GET["txtdescription"];
        $isbn = $_GET["txtisbn"];
        $publisher = $_GET["txtpublisher"];
        $available = $_GET["txtavailability"];

        $sql = "UPDATE tblbook 
        SET book_title='$title', 
        book_author='$author', 
        genre='$genre', 
        description='$descr', 
        book_isbn='$isbn', 
        publisher='$publisher', 
        stock_availability='$available' 
        WHERE book_id='$id'";

        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location: dashboard.php");
    }

    elseif (isset($_GET["id"])) {
        $id = $_GET["id"];

        // Fetch data from tblbook based on the ID
        $sql = "SELECT * FROM tblbook WHERE book_id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
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
        .form-group input, .form-group textarea {
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
        <h1>Edit Book</h1>
    </header>
    <div class="container">
        <form action="" method="get" name="frmeditbook">
            <div class="form-group">
                <label for="">ID:</label>
                <input type="text" name="txtid" value="<?php echo $row['book_ID']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Title:</label>
                <input type="text" name="txttitle" placeholder="Enter book title" value="<?php echo $row['book_title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="">Author:</label>
                <input type="text" name="txtauthor" placeholder="Enter author name" value="<?php echo $row['book_author']; ?>" required>
            </div>
            <div class="form-group">
                <label for="">Genre:</label>
                <input type="text" name="txtgenre" placeholder="Enter book genre" value="<?php echo $row['genre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="">Description:</label>
                <textarea name="txtdescription" rows="4" placeholder="Enter book description" required><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="">ISBN:</label>
                <input type="text" name="txtisbn" placeholder="Enter book ISBN" value="<?php echo $row['book_ISBN']; ?>" required>
            </div>
            <div class="form-group">
                <label for="">Publisher:</label>
                <input type="text" name="txtpublisher" placeholder="Publisher" value="<?php echo $row['publisher']; ?>" required>
            </div>
            <div class="form-group">
                <label for="">Availability:</label>
                <input type="number" name="txtavailability" placeholder="Enter availability count" value="<?php echo $row['stock_availability']; ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="cmdedit">Save Changes</button>
            </div>
        </form>
    </div>
</body>
</html>
