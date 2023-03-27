<?php
session_start();
require('../app/app.php');

// ensure_user_is_authenticated();
// if (empty($_SESSION['email'])) {
//     redirect('login.php');
// } else {
//     $role = $_SESSION['email'];
//     is_user_authorised($role);
//     die();
// }

$total = Data::get_user_transactions_totals($_SESSION['id']);
$g_totals = Data::get_all_transactions_totals();
$data = Data::get_users_transactions();
// var_dump($transactions);
$view_bag =[
    'title' =>'user' ,
    'user'=> $_SESSION['name'],
    'total'=> $total->{"SUM(amount)"},
    'g_total'=> $g_totals[0]->{"SUM(amount)"}
];
view('index', $data);