<html>

<head></head>

<body>
    <!-- Inside reset_password.php -->
    <form method="post" action="update_password.php">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <label for="new_password">Enter a new password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>
        <label for="confirm_password">Confirm the new password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        <input type="submit" value="Reset Password" name="cmdupdate">
    </form>
</body>

</html>