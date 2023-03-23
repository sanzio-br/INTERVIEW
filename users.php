<?php
session_start();
require('app/app.php');

ensure_user_is_authenticated();

$items = Data::get_users();

view('users', $items);