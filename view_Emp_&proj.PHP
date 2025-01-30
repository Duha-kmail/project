<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees and Projects</title>
</head>
<body>

    <?php
    // اتصال بقاعدة البيانات
    $con = mysqli_connect('localhost', 'root', '') or die("Connection failed: " . mysqli_connect_error());
    mysqli_select_db($con, "webproject") or die("Database Error: " . mysqli_error($con));

    // التحقق إذا كان المستخدم قد ضغط على الزر
    if (isset($_POST["sub"])) {

        // الاستعلام لجلب الموظفين والبروجكتات
        $query = "
            SELECT * FROM `works_on`
        ";

        // تنفيذ الاستعلام
        $query_result = mysqli_query($con, $query);

        // التحقق إذا كان هناك نتائج
        
            echo "<table border='2'>";
            echo "<tr><th>Employee_ID</th><th>Project_ID</th></tr>";

            // عرض النتائج في الجدول
            while ($q = mysqli_fetch_array($query_result)) {
                echo "<tr><td>" . $q[0] . "</td><td>" . $q[1] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No employees or projects found.";
        }
    
    ?>

    <!-- نموذج لعرض البيانات -->
    <form method="post">
        <input type="submit" name="sub" value="Display Employees and Projects">
    </form>

</body>
</html>
