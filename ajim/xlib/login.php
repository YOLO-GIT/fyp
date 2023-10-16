<?php
    if (isset($_GET["cmdlogin"])){
        $username = $_GET["txtusername"];
        $password = $_GET["txtpassword"];
        
        include 'conn.php';

        $sql = "SELECT * FROM tbllogin
                WHERE username = '$username'
                AND password = '$password'";
                
        // finding result
        $res = mysqli_query($conn, $sql);

        // check if value exist
        if (mysqli_num_rows($res) > 0){
            $cust = mysqli_fetch_assoc($res);
            $_SESSION["idcust"] = $cust["idcustomer"];
        } else {
            echo "<script>alert('Login failed')</script>";
        }

        
        mysqli_close($conn);
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin: 0;
            text-align: center;
        }
        .form-group {
            margin-top: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input {
            width: 89%;
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
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="get" name="frmlogin" >
            <div class="form-group">
                <input type="text" name="txtusername" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="cmdlogin" >Login</button>
            </div>
            <div class="form-group">
                <a href="registration.php">Sign up now</a>
            </div>
        </form>
    </div>
</body>
</html>
