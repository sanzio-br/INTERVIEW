<?php
session_start();
require('../app/app.php');

if (is_user_allowed($_SESSION['role'])) {
    // $items = Data::get_users();
    if (isset($_GET['search'])) {
        $items = Data::get_users_search($_GET['search']);
    } else {
        $items = Data::get_users();
    }
    view('users', $items);
} else {
    redirect('../index.php');
}