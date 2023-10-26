<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Search</h1>
    </header>
    
    <div class="container">
        <form action="searchAdv.php" method="GET">
            <input type="text" name="query" placeholder="Search">
            <input type="submit" value="Search" name="cmdsubmit">
        </form>
        <button><a href="index2.php">Advanced Search</a></button>
    </div>
</body>
</html>