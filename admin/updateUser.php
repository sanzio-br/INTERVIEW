<?php

session_start();
require('../app/app.php');

if(is_user_allowed($_SESSION['role'])){
    if (is_get()) {
        $key = sanitize($_GET['key']);
    
        if (empty($key)) {
            view('../error/404.php');
            die();
        }
    
        $user = Data::get_user_by_id($key);
    
        if ($user === false) {
            view('not_found');
            die();
        }
        view('updateUser', $user);
    }
    
    
    if (is_post()) {
        $id = sanitize($_POST['id']);
        $id_number = sanitize($_POST['id_number']);
        $name = sanitize($_POST['name']);
        $pnum = sanitize($_POST['phone']);
        $phone = "+254$pnum";
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    
    
        if (empty($name) || empty($id_number) || empty($pnum) || empty($email) || empty($id)){
            // $add_item_error = "please enter valid details";
            //error handling
        } else {
            Data::update_user($id, $id_number, $name, $phone, $email);
            redirect('allUsers.php');
        }
    }
    
}else{
    redirect('../index.php');
}
