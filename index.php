<?php
session_start();
require('app/app.php');

// ensure_user_is_authenticated();
if (empty($_SESSION['email'])) {
    redirect('login.php');
} else {
    $role = $_SESSION['role'];
    is_user_authorised($role);
    die();
}