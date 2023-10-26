<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
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
        $user_id = $_SESSION['idcust'];
        $sql = "SELECT * FROM users WHERE id = '$user_id'";
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
