<?php
// function begin_session()
// {
//     if (session_status() == PHP_SESSION_NONE) {
//         session_start();
//     }
// }

function set_user_session($result)
{
    $_SESSION['user_id'] = $result['id'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['fullname'] = $result['fullname'];
    $_SESSION['role'] = $result['role'];
}