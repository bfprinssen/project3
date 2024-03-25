


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>User Login</title>
    <style>
    </style>
</head>
<body>
<h2>User Login</h2>

<?php
session_start();
if (isset($_SESSION['error'])) {
    echo "<p>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>

<form action="login.php" method="POST">
    <label for="username" class="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password" class="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form>

<p>Don't have an account?<a href="register.php">Register here</a></p>
</body>
</html>