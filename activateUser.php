<?php
session_start();
require('app/app.php');

ensure_user_is_authenticated();
if (is_get()) {
    $key = sanitize($_GET['key']);

    if (empty($key)) {
        view('not_found');
        die();
    }

    $user = Data::get_user_by_id($key);

    if ($user === false) {
        view('not_found');
        die();
    }

    view('activateUser', $user);
}


if (is_post()) {
    $user = sanitize($_GET['key']);


    if (empty($user)) {
        // $add_item_error = "please enter valid details";
        //error handling
    } else {
        Data::activate_user($user);
        redirect('users.php');
    }
}