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
            SELECT 
                e.id AS employee_id, 
                e.name AS employee_name, 
                p.id AS project_id, 
                p.project_name 
            FROM employees e
            JOIN work_on w ON e.id = w.employee_id
            JOIN projects p ON w.project_id = p.id
            ORDER BY e.name
        ";

        // تنفيذ الاستعلام
        $query_result = mysqli_query($con, $query);

        // التحقق إذا كان هناك نتائج
        if (mysqli_num_rows($query_result) > 0) {
            echo "<table border='2'>";
            echo "<tr><th>Employee_ID</th><th>Employee_Name</th><th>Project_ID</th><th>Project_Name</th></tr>";

            // عرض النتائج في الجدول
            while ($q = mysqli_fetch_array($query_result)) {
                echo "<tr><td>" . $q[0] . "</td><td>" . $q[1] . "</td><td>" . $q[2] . "</td><td>" . $q[3] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No employees or projects found.";
        }
    }
    ?>

    <!-- نموذج لعرض البيانات -->
    <form method="post">
        <input type="submit" name="sub" value="Display Employees and Projects">
    </form>

</body>
</html>
