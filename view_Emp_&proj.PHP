<?php
// بدء الجلسة
session_start();

// التحقق من وجود الجلسة (إذا لم يكن المستخدم مسجل الدخول، يتم توجيهه إلى صفحة تسجيل الدخول)
if (!isset($_SESSION["user_name"])) {
    header('location: login.php');
    exit();
}

// اتصال بقاعدة البيانات
$con = mysqli_connect('localhost', 'root', '', 'webproject') or die("Connection failed: " . mysqli_connect_error());

// التحقق إذا كان المستخدم قد ضغط على الزر
if (isset($_POST["sub"])) {
    // الاستعلام لجلب الموظفين والبروجكتات
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

    // تنفيذ الاستعلام
    $query_result = mysqli_query($con, $query);

    // التحقق إذا كان هناك نتائج
    if ($query_result && mysqli_num_rows($query_result) > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Salary</th>
                <th>Project ID</th>
                <th>Project Name</th>
              </tr>";

        // عرض النتائج في الجدول
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
    } else {
        echo "No employees or projects found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees and Projects</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <!-- نموذج لعرض البيانات -->
    <form method="post">
        <input type="submit" name="sub" value="Display Employees and Projects">
    </form>
    <a href="webproject.php">Return to The Main page</a>
</body>
</html>