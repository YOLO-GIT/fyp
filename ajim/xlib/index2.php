<!DOCTYPE html>
<html>
<head>
    <title>Library Advanced Search</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Library Advanced Search</h1>
    </header>

    <div class="container">
        <form action="searchAdv.php" method="GET">
            <input type="text" name="query" placeholder="Search by title, author, ISBN...">
            <select name="genre">
                <option value="">Select Genre</option>
                <option value="Mystery">Mystery</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Drama">Drama</option>
            </select>
            <input type="text" name="publication_year" placeholder="Publication Year">
            <select name="language">
                <option value="">Select Language</option>
                <option value="English">English</option>
                <option value="Melayu">Melayu</option>
            </select>
            <input type="submit" value="Search">
        </form>
    </div>
</body>
</html>
