<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: rgb(100, 11, 202);
}

.login-container {
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    width: 300px;
    text-align: center;
}

.login-container h2 {
    color: white;
    margin-bottom: 15px;
}

.input-box {
    width: 100%;
    margin: 10px 0;
    position: relative;
}

.input-box input {
    width: 100%;
    padding: 10px;
    border: none;
    outline: none;
    border-radius: 5px;
    font-size: 16px;
    background: rgba(255, 255, 255, 0.2);
    color: white;
}

.input-box input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.btn {
    width: 100%;
    padding: 10px;
    background: red;
    border: none;
    color: white;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
    transition: 0.3s;
}

.btn:hover {
    background: rgba(3, 185, 27, 0.2);
}

.register {
    margin-top: 15px;
    color: white;
}

.register a {
    color: green;
    text-decoration: none;
    font-weight: bold;
}

.register a:hover {
    text-decoration: underline;
}
    </style>

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
        header('location: webproject.php');
        // Redirect to dashboard or another page
    } else {
        echo "<p style='color:red;'>Invalid username or password! <a href='Add_users.php'>Register here</a></p>";
    }
}
?>

<!-- Login Form -->
<form method="POST">
    
    <h2 style="text-align: center;">Welcome!</h2>
<div class="login-container">
        <h2>Login</h2>
        <div class="input-box">
            <input type="text" placeholder="Username" name="username" required>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" name="password" required>
        </div>
        <button class="btn" value="Login" name="login">Login</button>
        <div class="register">
            Don't have an account? <a href="Add_users.php">Register here</a>
        </div>
    </div>
</form>



</body>
</html>
