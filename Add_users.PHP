<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            text-align: center;
        }

        .welcome-text {
            font-size: 24px;
            color: white;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .register-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        .register-container h2 {
            color: white;
            margin-bottom: 15px;
        }

        .input-box {
            width: 100%;
            margin: 10px 0;
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
            background:rgb(55, 238, 9);
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn:hover {
            background:rgb(0, 0, 0);
        }

        .login-link {
            margin-top: 15px;
            color: white;
        }

        .login-link a {
            color: #ffeb3b;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
<body>

<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'webproject') or die("No Connection");

if (isset($_POST["submit"])) {
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    $user_id = $_POST["user_id"];

    // SQL Insert Query
    $query = "INSERT INTO users (user_id, user_name, password) VALUES ($user_id, '$uname', '$pass')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        echo "User added successfully!";
        header('location: login.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!-- Form -->
<form method="POST">
    
    <h1>Sign Up Now!</h1>
<div class="register-container">
        <div class="input-box">
            
            <input type="text" placeholder="User ID" name="user_id" required>
        </div>
        <div class="input-box">
         
            <input type="text" placeholder="User Name" name="uname" required>
        </div>
        <div class="input-box">
            
            <input type="password" placeholder="PassWord" name="pass" required>
        </div>
        <button class="btn" name="submit">Add User</button>
    </div>
</form>

</body>
</html>
