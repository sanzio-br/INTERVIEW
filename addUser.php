<?php
session_start();
require('app/app.php');

ensure_user_is_authenticated();

if (is_post()) {
    $id_number = sanitize($_POST['id_number']);
    $name = sanitize($_POST['name']);
    $pnum = sanitize($_POST['phone']);
    $phone = "+254$pnum";
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (empty($name) || empty($id_number) || empty($pnum) || empty($email)) {
        $add_item_error = "please enter valid details";
    } else {
        Data::add_user($id_number,$name,$phone,$email);
        redirect('users.php');
    }
}


view('addUser');