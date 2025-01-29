<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<?php
      $con=mysqli_connect('localhost','root','') or die("No Connection");
      mysqli_select_db($con,"web_project_database") or die("Error");
      if(isset($_POST["submit"]))
      {
        
        $pname=$_POST["pname"];
        $qurrey="insert into projects values('$pname')";
        mysqli_query($con,$qurrey);
      }
    ?>
    
<from method="POST">
        <table border="3px">
            <tr><td>Project_Name</td><td><input type="text" name="pname"></td></tr>
            <tr><td colspan="2"><input type="submit" value="Add Projects" name="submit"></td></tr>
            
            

        </table>
        
    </from>
    
    
</body>
</html>