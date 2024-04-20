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
    <?php require_once "View/general/head-section.php"; ?>
    <style>
        #add-question{
            border-radius: 50%;
            background-color: orange;            
            border: none;
        }
        #add-question:hover{
            background-color: yellow;
        }   
    
        .hide{
            display: none;
        }

        #add-question-area{
            padding: 20px;
            border-radius: 10px;
            background-color: pink;
            margin: 20px 0;
        }
    </style>
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
    case 'logout':
        session_destroy();
        header('Location: index.php');
        break;
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