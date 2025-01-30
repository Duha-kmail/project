<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
</head>
<body>
<?php
// بدء الجلسة
session_start();

// التحقق من وجود الجلسة (إذا لم يكن المستخدم مسجل الدخول، يتم توجيهه إلى صفحة تسجيل الدخول)
if (!isset($_SESSION["user_name"])) {
    header('location: login.php');
    exit();
}
?>
<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'webproject');

// Check if the connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $eid = mysqli_real_escape_string($con, $_POST["eid"]);
    $ename = mysqli_real_escape_string($con, $_POST["ename"]);
    $salary = $_POST["salary"];

    // Validate salary input
    if (!is_numeric($salary)) {
        echo "Salary must be a number!";
    } else {
        // SQL Insert Query
        $query = "INSERT INTO employee (eid, ename, salary) VALUES ('$eid', '$ename', $salary)";

        // Execute the query
        if (mysqli_query($con, $query)) {
            echo "Employee added successfully!";
        } else {
            echo "Error adding employee: " . mysqli_error($con);
        }
    }
}
?>

<!-- Corrected form -->
<form method="POST">
    <table border="3px">
        <tr><td>Employee ID</td><td><input type="text" name="eid" required></td></tr>
        <tr><td>Employee Name</td><td><input type="text" name="ename" required></td></tr>
        <tr><td>Salary</td><td><input type="number" name="salary" required></td></tr>
        <tr><td colspan="2"><input type="submit" value="Add Employee" name="submit"></td></tr>
    </table>
</form>

<a href="webproject.php">Return to The Main page</a>
</body>
</html>
