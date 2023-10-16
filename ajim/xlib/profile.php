<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
        }
        .profile-info {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <?php
        include 'conn.php';

        $user_id = 0;

        $sql = "SELECT * FROM tblcustomer WHERE id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo '<div class="profile-info">';
            echo '<p><strong>Name:</strong> ' . $row['name'] . '</p>';
            echo '<p><strong>IC Number:</strong> ' . $row['icnum'] . '</p>';
            echo '<p><strong>Gender:</strong> ' . $row['gender'] . '</p>';
            echo '</div>';
        } else {
            echo '<p>User not found.</p>';
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
