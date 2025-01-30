<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees and Projects</title>
</head>
<body>
    <?php
     $con = mysqli_connect('localhost', 'root', '') or die("No Connection");
     mysqli_select_db($con, "webproject") or die("Database Error");

     if (isset($_POST["sub"])) {
        // SQL Query to fetch employees with their associated projects
        $query = "SELECT * FROM `works_on` LIMIT 0, 30 ";
        
        
        // Execute the query
        $query_result = mysqli_query($con, $query);

        // Display the results in a table
        
            echo "<table border='2'>";
            echo "<tr><td>Employee_ID</td><td>Employee_Name</td><td>Project_ID</td><td>Project_Name</td></tr>";
            while ($q = mysqli_fetch_array($query_result)) {
                echo "<tr><td>$q[0]</td><td>$q[1]</td><td>$q[2]</td><td>$q[3]</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No employees or projects found.";
        }
    
    ?>

    <!-- Form to trigger the display -->
    <form method="post">
        <input type="submit" name="sub" value="Display Employees and Projects">
    </form>

</body>
</html>
