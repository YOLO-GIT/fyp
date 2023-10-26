<?php
    // Check if the edit form is submitted
    if (isset($_POST["cmdedit"])) {
        $id = $_POST["txtid"];
        $name = $_POST["txtname"];
        $username = $_POST["txtusername"];
        $address = $_POST["txtaddress"];
        $ic = $_POST["txticnum"];
        $password = $_POST["txtpassword"];

        if (intval(substr($ic, 11, 1)) % 2 == 1){
            $gender = "L";
        } else {
            $gender = "W";
        }
        $icnum = substr($ic, 8, 4);
        $idcustomer = $gender . $icnum;

        include 'conn.php';

        // Update data in tblcustomer
        $sqlcustomer = "UPDATE users SET name='$name', password='$password', icnum='$ic', gender='$gender' WHERE id='$id'";
        mysqli_query($conn, $sqlcustomer);

        // Update data in tbllogin
        $sqllogin = "UPDATE tbllogin SET username='$username', password='$password' WHERE idcustomer='$idcustomer'";
        mysqli_query($conn, $sqllogin);

        mysqli_close($conn);
        header("Location: dashboard.php");
    }
    // Fetch the data for the edit form
    elseif (isset($_GET["id"])) {
        $id = $_GET["id"];
        include 'conn.php';

        // Fetch data from tblcustomer based on the ID
        $sql = "SELECT * FROM tblcustomer WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        // Fetch data from tbllogin based on the ID
        $idcustomer = $row["gender"] . substr($row["icnum"], 8, 4);
        $sqllogin = "SELECT * FROM tbllogin WHERE idcustomer='$idcustomer'";
        $resultlogin = mysqli_query($conn, $sqllogin);
        $rowlogin = mysqli_fetch_assoc($resultlogin);

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
        <h1>Edit User</h1>
    </header>
    <div class="container">
        <form action="" method="post" name="frmedituser">
            <div class="form-group">
                <label for="txtid">ID:</label>
                <input type="text" name="txtid" value="<?php echo $row['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="txtname">Name:</label>
                <input type="text" name="txtname" placeholder="Enter name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="txtusername">Username:</label>
                <input type="text" name="txtusername" placeholder="Enter username" value="<?php echo $rowlogin['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="txtaddress">Address:</label>
                <input type="text" name="txtaddress" placeholder="Enter address" value="<?php echo $row['address']; ?>" required>
            </div>
            <div class="form-group">
                <label for="txticnum">IC Number:</label>
                <input type="text" name="txticnum" placeholder="Enter Identification Number" value="<?php echo $row['icnum']; ?>" required>
            </div>
            <div class="form-group">
                <label for="txtpassword">Password:</label>
                <input type="password" name="txtpassword" placeholder="Enter password" value="<?php echo $rowlogin['password']; ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="cmdedit">Save Changes</button>
            </div>
        </form>
    </div>
</body>
</html>
