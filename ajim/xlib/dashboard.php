<?php
    $count = 1;
    $bookcount = 1;
    
    include 'conn.php';
    $sqlcust = "SELECT * FROM users ORDER BY userid DESC;";
    $sqlbook = "SELECT * FROM tblbook ORDER BY book_ID DESC;";
    
    $rescustomer = mysqli_query($conn, $sqlcust);
    $resbook = mysqli_query($conn, $sqlbook);     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        
        .form {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        .form p {
            margin: 0;
        }
        
        .form a {
            text-decoration: none;
            color: #007BFF;
        }
        
        .form h2 {
            margin-top: 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #007BFF;
            color: white;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
<div class="form">
    <p><a href="index.php">Homepage</a> 
    | <a href="adduser.php">Insert New User</a> 
    | <a href="addbook.php">Insert New Book</a> 
    | <a href="login.php">Logout</a></p><br>
    <h2>View Users</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($rescustomer)) {
            ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["password"]; ?></td>
                    <td>
                        <a href="edituser.php?id=<?php echo $row["userid"]; ?>">Edit</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $row["userid"]; ?>">Delete</a>
                    </td>
                </tr>
                <?php $count++;
            } ?>
        </tbody>
    </table><br>
    <h2>View Books</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Description</th>
                <th>ISBN</th>
                <th>Publisher</th>
                <th>Availability</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($resbook)) {
            ?>
                <tr>
                    <td><?php echo $bookcount; ?></td>
                    <td><?php echo $row["book_title"]; ?></td>
                    <td><?php echo $row["book_author"]; ?></td>
                    <td><?php echo $row["genre"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td><?php echo $row["book_ISBN"]; ?></td>
                    <td><?php echo $row["publisher"]; ?></td>
                    <td><?php echo $row["stock_availability"]; ?></td>
                    <td>
                        <a href="editbook.php?id=<?php echo $row["book_ID"]; ?>">Edit</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $row["book_ID"]; ?>&type=book">Delete</a>
                    </td>
                </tr>
                <?php $bookcount++;
            } ?>
        </tbody>
    </table><br>
</div>
</body>
</html>
