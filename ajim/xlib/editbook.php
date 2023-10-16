<?php
    include 'conn.php';

    if (isset($_GET["cmdedit"])) {
        $id = $_GET["txtid"];
        $title = $_GET["txttitle"];
        $author = $_GET["txtauthor"];
        $category = $_GET["txtcategory"];
        $desc = $_GET["txtdescription"];
        $isbn = $_GET["txtisbn"];
        $published = $_GET["txtpublishyear"];
        $available = $_GET["txtavailability"];

        $sql = "UPDATE tblbook SET title='$title', author='$author', category='$category', descr='$desc', isbn='$isbn', pyear='$published', availability='$available' WHERE id='$id'";

        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location: dashboard.php");
    }
    // Fetch the data for the edit form
    elseif (isset($_GET["id"])) {
        $id = $_GET["id"];

        // Fetch data from tblbook based on the ID
        $sql = "SELECT * FROM tblbook WHERE id='$id'";
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
        <form action="" method="post" name="frmeditbook">
            <div class="form-group">
                <label for="txtid">ID:</label>
                <input type="text" name="txtid" value="<?php echo $row['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="txttitle">Title:</label>
                <input type="text" name="txttitle" placeholder="Enter book title" value="<?php echo $row['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="txtauthor">Author:</label>
                <input type="text" name="txtauthor" placeholder="Enter author name" value="<?php echo $row['author']; ?>" required>
            </div>
            <div class="form-group">
                <label for="txtcategory">Category:</label>
                <input type="text" name="txtcategory" placeholder="Enter book category" value="<?php echo $row['category']; ?>" required>
            </div>
            <div class="form-group">
                <label for="txtdescription">Description:</label>
                <textarea name="txtdescription" rows="4" placeholder="Enter book description" required><?php echo $row['descr']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="txtisbn">ISBN:</label>
                <input type="text" name="txtisbn" placeholder="Enter book ISBN" value="<?php echo $row['isbn']; ?>" required>
            </div>
            <div class="form-group">
                <label for="txtpublishyear">Published Year:</label>
                <input type="number" name="txtpublishyear" placeholder="Enter published year" value="<?php echo $row['pyear']; ?>" required>
            </div>
            <div class="form-group">
                <label for="txtavailability">Availability:</label>
                <input type="number" name="txtavailability" placeholder="Enter availability count" value="<?php echo $row['availability']; ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="cmdedit">Save Changes</button>
            </div>
        </form>
    </div>
</body>
</html>
