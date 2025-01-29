<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Projects</title>
</head>
<body>
    <?php
     $con=mysqli_connect('localhost','root','') or die("No Connection");
     mysqli_select_db($con,"webproject") or die("database Error");
     $query1="select * from projects;";
     $query2=mysqli_query($con,$query1);
     if(isset($_POST["sub"]))
     {
        echo "<table border='2'>";
        echo "<tr><td>Project_ID</td><td>Project_Name</td></tr>";
        while($q=mysqli_fetch_array($query2))
          echo "<tr><td>$q[0]</td><td>$q[1]</td></tr>";
        echo "</table>";
     }
    ?>
    <form method="post">
        <input type="submit" name="sub" value="display Project">
    </form>
</body>
</html>