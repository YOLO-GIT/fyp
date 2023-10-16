<?php
    if (isset($_GET["cmdregister"])){
        $username = $_GET["txtusername"];
        $name = $_GET["txtname"];
        $address = $_GET["txtaddress"];
        $password = $_GET["txtpassword"];
        $ic = $_GET["txticnum"];

        // assign gender using the last ic num
        if (intval(substr($ic, 11, 1)) % 2 == 1){
            $gender = "L";
        } else {
            $gender = "W";
        }

        // taking the last 4 digits from ic
        $icnum = substr($ic, 8, 4);

        // concatenate to create idcustomer
        $id = $gender . $icnum;

        include 'conn.php';
        $sqllogin = "INSERT INTO tbllogin (idcustomer, username, password)
            VALUES ('$id', '$username', '$password')";
        $sqlcustomer = "INSERT INTO tblcustomer (name, password, icnum, gender)
            VALUES ('$name', '$password', '$ic', '$gender')";
        
        mysqli_query($conn, $sqllogin);
        mysqli_query($conn, $sqlcustomer);

        mysqli_close($conn);    
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h2 {
            text-align: center;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        input[type="text"],
        input[type="password"] {
            width: 92%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
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
    <form action="" method="get" name="frmregistration">
        <h2>Registration Form</h2>
        <input type="text" name="txtusername" id="" placeholder="Username*" required><br>
        <input type="text" name="txtname" id="" placeholder="Name*" required><br>
        <input type="password" name="txtpassword" id="" placeholder="Password*" required><br>
        <input type="text" name="txtaddress" id="" placeholder="Address*" required><br>
        <input type="text" name="txticnum" id="" placeholder="IC Number*" required><br>
        <button type="submit" name="cmdregister">Register</button>
    </form>
</body>
</html>
