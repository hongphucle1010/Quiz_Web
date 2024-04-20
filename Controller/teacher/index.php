<?php
require_once 'View/general/navbar.php';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = '';
}

switch ($action) {
    default:
        require_once 'View/teacher/dashboard.php';
        break;
}
