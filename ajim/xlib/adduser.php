<?php
    if (isset($_GET["cmdadd"])){
    $name = $_GET["txtname"];
    $username = $_GET["txtusername"];
    $address = $_GET["txtaddress"];
    $ic = $_GET["txticnum"];
    $password = $_GET["txtpassword"];

    if (intval(substr($ic, 11, 1)) % 2 == 1){
        $gender = "L";
    } else {
        $gender = "W";
    }
    $icnum = substr($ic, 8, 4);
    $id = $gender . $icnum;

    include 'conn.php';
    
    $sqlcustomer = "INSERT INTO tblcustomer (name, password, icnum, gender)
        VALUES ( '$name', '$password', '$ic', '$gender')";
    
    $sqllogin = "INSERT INTO tbllogin (idcustomer, username, password)
        VALUES ( '$id', '$username', '$password')";
    
    mysqli_query($conn, $sqlcustomer);
    mysqli_query($conn, $sqllogin);

    mysqli_close($conn);    
    header("Location: dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
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
        <h1>Add User</h1>
    </header>
    <div class="container">
        <form action="" method="get" name="frmadduser" >
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" name="txtname" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="txtusername" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="">Address:</label>
                <input type="text" name="txtaddress" placeholder="Enter address" required>
            </div>
            <div class="form-group">
                <label for="">IC Number:</label>
                <input type="text" name="txticnum" placeholder="Enter Identification Number" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="txtpassword" placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="cmdadd" >Add</button>
            </div>
        </form>
    </div>
</body>
</html>
