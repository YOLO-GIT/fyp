<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Homepage</title>
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
        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav li {
            display: inline;
            margin-right: 20px;
        }
        a {
        color: #fff;
        text-decoration: none;
        }

        a:visited {
            color: #fff;
        }

        a:hover {
            color: #ff0; 
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .book-list {
            list-style-type: none;
            padding: 0;
        }
        .book-list li {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #fff;
        }
        .book-list a{
            color: black;
        }
    </style>
</head>
<body>
    <header>
        <h1>Library Homepage</h1>
    </header>
    <nav>
        <ul>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="dashboard.php">Admin</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="cart.php">Cart</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Welcome to Our Library</h2>
        <p>Lets it begin here.</p><br>
        
        <h3>Featured Books</h3>
        <ul class="book-list">
            <li>
                <h4><a class="booklink" href="desc.php?book=book1">Atomic Habit</a></h4>
                <p>Author: Author Name</p>
                <p>Category: Fiction</p>
            </li>
            <li>
                <h4><a class="booklink" href="desc.php?book=book2">Zero To One</h4>
                <p>Author: Author Name</p>
                <p>Category: Non-Fiction</p>
            </li>
            <li>
                <h4><a class="booklink" href="desc.php?book=book3">How to Win Friends & Influence People</h4>
                <p>Author: Author Name</p>
                <p>Category: Mystery</p>
            </li>
        </ul>
    </div>
</body>
</html>
