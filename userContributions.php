<?php
session_start();
require('app/app.php');

ensure_user_is_authenticated();
$view_bag =[
    'title' => 'userContributions',
    'user'=> $_SESSION['email']
];

view('userContributions', $view_bag);