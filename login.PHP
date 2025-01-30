<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'webproject');

// Check if the connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    // Check if user exists
    $query = "SELECT * FROM users WHERE user_name='$username' AND password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color:green;'>Login successful!</p>";
        
        // Redirect to dashboard or another page
    } else {
        echo "<p style='color:red;'>Invalid username or password! <a href='register.php'>Register here</a></p>";
    }
}
?>

<!-- Login Form -->
<form method="POST">
    <table border="3px">
        <tr><td>Username</td><td><input type="text" name="username" required></td></tr>
        <tr><td>Password</td><td><input type="password" name="password" required></td></tr>
        <tr><td colspan="2"><input type="submit" value="Login" name="login"></td></tr>
    </table>
</form>

<p>Don't have an account? <a href="Add_users.php">Register here</a></p>

</body>
</html>
