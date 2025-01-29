<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Registration</title>
</head>
<body>

<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'webproject');

// Check if the connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $pname = mysqli_real_escape_string($con, $_POST["pname"]); // Prevent SQL Injection

    // SQL Insert Query (assuming 'pno' is auto-increment)
    $query = "INSERT INTO projects (pname) VALUES ('$pname')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        echo "Project added successfully!";
    } else {
        echo "Error adding project: " . mysqli_error($con);
    }
}
?>

<!-- Corrected form -->
<form method="POST">
    <table border="3px">
        <tr><td>Project Name</td><td><input type="text" name="pname" required></td></tr>
        <tr><td colspan="2"><input type="submit" value="Add Project" name="submit"></td></tr>
    </table>
</form>

</body>
</html>
