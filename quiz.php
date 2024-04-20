<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_GET['quiz_id'])) {
    header('Location: index.php');
}

if ($_SESSION['role'] == 'admin') {
    header('Location: admin/dashboard.php');
}

require_once 'View/general/navbar.php';

include 'Model/DBConfig.php';
include 'Model/function.php';

$database = new Database();
$database->connect();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "View/general/head-section.php"; ?>
</head>

<body>
</body>

</html>

<?php
if ($_SESSION['role'] == 'teacher') {
    $quiz_id = $_GET['quiz_id'];
    $teacher_id = $_SESSION['user_id'];
    if (!$database->check_match_teacher_quiz($teacher_id, $quiz_id)) {
        header('Location: index.php');
    }

    require_once 'Controller/teacher/quiz.php';
} else if ($_SESSION['role'] == 'student') {
    require_once 'Controller/student/quiz.php';
} else {
    header('Location: index.php');
}
?>