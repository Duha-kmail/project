<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Projects</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        .container {
            width: 60%;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 50px;
        }

        .display-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }

        .display-btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: #007BFF;
            text-decoration: none;
            font-size: 18px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    session_start();
    if (!isset($_SESSION["user_name"])) {
        header('location: login.php');
        exit();
    }

    $con = mysqli_connect('localhost', 'root', '') or die("No Connection");
    mysqli_select_db($con, "webproject") or die("Database Error");

    if (isset($_POST["sub"])) {
        $query1 = "SELECT * FROM employee;";
        $query2 = mysqli_query($con, $query1);
        echo "<table>";
        echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Salary</th></tr>";
        while ($q = mysqli_fetch_array($query2)) {
            echo "<tr><td>$q[0]</td><td>$q[1]</td><td>$q[2]</td></tr>";
        }
        echo "</table>";
    }
    ?>

    <form method="post">
        <input type="submit" name="sub" value="Display Employee" class="display-btn">
    </form>

    <a href="webproject.php" class="back-link">Return to The Main Page</a>
</div>

</body>
</html>
