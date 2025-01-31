<?php
session_start();

if (!isset($_SESSION["user_name"])) {
    header('location: login.php');
    exit();
}

$con = mysqli_connect('localhost', 'root', '', 'webproject') or die("Connection failed: " . mysqli_connect_error());

if (isset($_POST["sub"])) {
    $query = "
        SELECT 
            Employee.eid AS Employee_ID,
            Employee.ename AS Employee_Name,
            Employee.salary AS Salary,
            Projects.pno AS Project_ID,
            Projects.pname AS Project_Name
        FROM 
            Employee
        JOIN 
            Works_on ON Employee.eid = Works_on.eid
        JOIN 
            Projects ON Works_on.pno = Projects.pno;
    ";

    $query_result = mysqli_query($con, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees and Projects</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        .container {
            width: 70%;
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
    <h2>Employee and Project Details</h2>

    <form method="post">
        <input type="submit" name="sub" value="Display Employees and Projects" class="display-btn">
    </form>

    <?php
    if (isset($query_result) && mysqli_num_rows($query_result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Salary</th>
                <th>Project ID</th>
                <th>Project Name</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($query_result)) {
            echo "<tr>
                    <td>" . $row["Employee_ID"] . "</td>
                    <td>" . $row["Employee_Name"] . "</td>
                    <td>" . $row["Salary"] . "</td>
                    <td>" . $row["Project_ID"] . "</td>
                    <td>" . $row["Project_Name"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } elseif (isset($_POST["sub"])) {
        echo "<p>No employees or projects found.</p>";
    }
    ?>

    <a href="webproject.php" class="back-link">Return to The Main Page</a>
</div>

</body>
</html>
