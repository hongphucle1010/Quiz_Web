<?php
include 'Model/DBConfig.php';
include 'Model/function.php';

$database = new Database();
$database->connect();

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="Lib/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	
</body>
</html>

<?php

if (isset($_POST['controller'])) {
    $controller = $_POST['controller'];
} 
else if (isset($_SESSION['role'])) {
    $controller = $_SESSION['role'];
}
else {
    $controller = '';
}


switch ($controller) {
    case 'admin':
        require_once 'Controller/admin/index.php';
        break;
    case 'student':
        require_once 'Controller/student/index.php';
        break;
    case 'teacher':
        require_once 'Controller/teacher/index.php';
        break;
    default:
        require_once 'Controller/controller.php';
        break;
}
?>