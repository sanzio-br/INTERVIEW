<?php
session_start();
require('app/app.php');

// ensure_user_is_authenticated();
if (empty($_SESSION['email'])) {
    redirect('login.php');
} else {
    $role = $_SESSION['email'];
    is_user_authorised($role);
    die();
}

$view_bag = [
    'title' => 'Home',
    'user' => $_SESSION['email']
];

view('index', $view_bag);