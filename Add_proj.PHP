<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f3f4f6, #d1d5db);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 2px solid #007BFF;
            border-radius: 5px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: #007BFF;
            color: white;
        }
        td input {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        a {
            display: block;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Project Registration</h2>
    <?php
    session_start();
    if (!isset($_SESSION["user_name"])) {
        header('location: login.php');
        exit();
    }
    $con = mysqli_connect('localhost', 'root', '', 'webproject');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_POST["submit"])) {
        $pno = mysqli_real_escape_string($con, $_POST["pno"]);
        $pname = mysqli_real_escape_string($con, $_POST["pname"]);
        $query = "INSERT INTO projects (pno, pname) VALUES ('$pno', '$pname')";
        if (mysqli_query($con, $query)) {
            echo "<p style='color: green;'>Project added successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error adding project: " . mysqli_error($con) . "</p>";
        }
    }
    ?>
    <form method="POST">
        <table>
            <tr><th>Field</th><th>Input</th></tr>
            <tr><td>Project ID</td><td><input type="text" name="pno" required></td></tr>
            <tr><td>Project Name</td><td><input type="text" name="pname" required></td></tr>
            <tr><td colspan="2" style="text-align:center;"><input type="submit" value="Add Project" name="submit"></td></tr>
        </table>
    </form>
    <a href="webproject.php">Return to The Main Page</a>
</div>
</body>
</html>
