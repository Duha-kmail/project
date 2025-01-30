<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>

<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'webproject') or die("No Connection");

if (isset($_POST["submit"])) {
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    $user_id = $_POST["user_id"];

    // SQL Insert Query
    $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$uname', '$pass')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        echo "User added successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!-- Form -->
<form method="POST">
    <table border="3px">
        <tr><td>User ID</td><td><input type="text" name="user_id" required></td></tr>
        <tr><td>User Name</td><td><input type="text" name="uname" required></td></tr>
        <tr><td>Password</td><td><input type="text" name="pass" required></td></tr>
        <tr><td colspan="2"><input type="submit" value="Add User" name="submit"></td></tr>
    </table>
</form>

</body>
</html>
