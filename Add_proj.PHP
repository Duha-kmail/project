<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Registration</title>
</head>
<body>
<?php
// بدء الجلسة
session_start();

// التحقق من وجود الجلسة (إذا لم يكن المستخدم مسجل الدخول، يتم توجيهه إلى صفحة تسجيل الدخول)
if (!isset($_SESSION["user_name"])) {
    header('location: login.php');
    exit();
}?>
<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'webproject');

// Check if the connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $pno = mysqli_real_escape_string($con, $_POST["pno"]);
    $pname = mysqli_real_escape_string($con, $_POST["pname"]);

    // SQL Insert Query
    $query = "INSERT INTO projects (pno, pname) VALUES ('$pno', '$pname')";

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
        <tr><td>Project ID</td><td><input type="text" name="pno" required></td></tr>
        <tr><td>Project Name</td><td><input type="text" name="pname" required></td></tr>
        <tr><td colspan="2"><input type="submit" value="Add Project" name="submit"></td></tr>
    </table>
</form>
<a href="webproject.php">Return to The Main page</a>
</body>
</html>
