<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
}
include 'Model/DBConfig.php';
include 'Model/function.php';

$database = new Database();
$database->connect();

if (isset($_POST['action']) && $_POST['action'] == 'change-password-check') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];
    if ($_SESSION['$email'] == $email) {
        $right_password = $database->get_password($email);
        if ($right_password == $password) {
            $database->change_password($email, $new_password);
            echo "<script>alert('Đổi mật khẩu thành công!');</script>";
            header('Location: index.php');
        }
        else {
            echo "<script>alert('Mật khẩu không đúng!');</script>";
            require_once 'View/general/setting.php';
        }
    }
    else {
        echo "<script>alert('Email không đúng!');</script>";
        require_once 'View/general/setting.php';
    }
}
else if (isset($_POST['action']) && $_POST['action'] == 'home') {
    header('Location: index.php');
}

require_once 'View/general/head-section.php';
require_once 'View/general/setting.php';