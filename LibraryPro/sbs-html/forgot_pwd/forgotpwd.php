<html>

<head></head>

<body>
    <!-- Step 1: Request for Email -->
    <!-- Inside forgotpwd.php -->
    <form method="post" action="send_reset_link.php">
        <label for="email">Enter your email address:</label><br>
        <input type="email" id="email" name="email" value="ahmadsufi345@gmail.com" required readonly><br><br>
        <input type="text" id="stud_ID" name="stud_ID" placeholder="Sila letak ID Anda" required><br><br>
        <input type="submit" value="Submit" name="cmdreset">
    </form>
</body>

</html>