<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
<?php
// بدء الجلسة
session_start();

// حذف جميع بيانات الجلسة
session_unset();

// تدمير الجلسة
session_destroy();

// توجيه المستخدم إلى صفحة تسجيل الدخول
header('location: login.php');
exit();
?>

</body>
</html>