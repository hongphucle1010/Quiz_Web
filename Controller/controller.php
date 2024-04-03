<?php
// Description: Controller for the application

if (isset($_POST['action']))
{
    $action = $_POST['action'];
}
else
{
    $action = '';
}

switch ($action)
{
    case 'login':
        require_once 'View/general/login.php';
        break;
    case 'signup':
        require_once 'View/general/signup.php';
        break;
    case 'signup_check':   
        if ($database -> check_if_email_existed($_POST['email'])) {
            echo "<script>alert('Email đã tồn tại!');</script>";
            require_once 'View/general/signup.php';
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $database -> create_user($email, $password, $fullname);
            echo "<script>alert('Đăng ký thành công!');</script>";
            require_once 'View/general/login.php';
        }
        break;
    case 'login_check':
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($database -> check_login($email, $password)) {
            $result = $database -> fetch();
            set_user_session($result);
            echo "<script>alert('Đăng nhập thành công!');</script>";
            header('Location: index.php');
        } else {
            echo "<script>alert('Sai email hoặc mật khẩu!');</script>";
            require_once 'View/general/login.php';
        }
        break;
    default:
        require_once 'View/general/home.php';
        break;
}