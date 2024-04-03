<?php
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
    case 'logout':
        session_destroy();
        header('Location: index.php');
        break;
    default:
        require_once 'View/admin/dashboard.php';
        break;
}