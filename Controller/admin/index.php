<?php
require_once 'View/general/navbar.php';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
    case 'add-quiz':
        if (isset($_POST['quiz-name']) && isset($_POST['teacher-id'])) {
            $quiz_name = $_POST['quiz-name'];
            $teacher_id = $_POST['teacher-id'];

            // Find if the quiz already exists
            $database->query("SELECT * FROM quiz_list WHERE quizname = '$quiz_name' AND teacherid = '$teacher_id'");
            if ($database->num_rows() > 0) {
                echo "<script>alert('Quiz already exists!')</script>";
            } else {
                $database->query("INSERT INTO quiz_list(quizname, teacherid) VALUES ('$quiz_name', '$teacher_id')");
            }   
        }
        require_once 'View/admin/add-quiz.php';
        break;
    case 'remove-quiz':
        if (isset($_POST['quiz-id'])) {
            $quiz_id = $_POST['quiz-id'];
            $database->query("DELETE FROM quiz_list WHERE id = '$quiz_id'");
        }
        require_once 'View/admin/remove-quiz.php';
        break;
    case 'edit-quiz':
        if (isset($_POST['quiz-id']) && isset($_POST['new-quiz-name']) && isset($_POST['teacher-id'])) {
            // Check if the quiz new name already exists
            $new_quiz_name = $_POST['new-quiz-name'];
            $teacher_id = $_POST['teacher-id'];
            $quiz_id = $_POST['quiz-id'];
            $database->query("SELECT * FROM quiz_list WHERE quizname = '$new_quiz_name' AND teacherid = '$teacher_id'");
            if ($database->num_rows() > 0) {
                echo "<script>alert('Quiz already exists!')</script>";
            } else {
                $database->query("UPDATE quiz_list SET quizname = '$new_quiz_name', teacherid = '$teacher_id' WHERE id = '$quiz_id'");
            }
        }
        require_once 'View/admin/edit-quiz.php';
        break;
    case 'remove-user':
        if (isset($_POST['user-id'])) {
            $user_id = $_POST['user-id'];
            $database->query("DELETE FROM user_list WHERE id = '$user_id'");
        }
        require_once 'View/admin/remove-user.php';
        break;
    case 'edit-user':
        if (isset($_POST['user-id']))
        {
            $user_id = $_POST['user-id'];
            if (remove_space($_POST['email']) != '')
            {
                $email = $_POST['email'];
                $database->query("UPDATE user_list SET email = '$email' WHERE id = '$user_id'");
            }
            if ($_POST['password'] != '')
            {
                $password = $_POST['password'];
                $database->query("UPDATE user_list SET password = '$password' WHERE id = '$user_id'");
            }
            if (remove_space($_POST['fullname']) != '')
            {
                $fullname = $_POST['fullname'];
                $database->query("UPDATE user_list SET fullname = '$fullname' WHERE id = '$user_id'");
            }
            if (remove_space($_POST['role']) != '')
            {
                $role = $_POST['role'];
                $database->query("UPDATE user_list SET role = '$role' WHERE id = '$user_id'");
            }
        }
        require_once 'View/admin/edit-user.php';
        break;
    case 'add-teacher':
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['fullname'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $role = 'teacher';
            $database->query("INSERT INTO user_list(email, password, fullname, role) VALUES ('$email', '$password', '$fullname', '$role')");
        }
        require_once 'View/admin/add-teacher.php';
        break;
    default:
        require_once 'View/admin/dashboard.php';
        break;
}
