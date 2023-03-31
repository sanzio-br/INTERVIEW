<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();
if (isset($_GET['search'])) {
    $items = Data::search_user($_GET['search']);
} else {
    $items = Data::get_all_users();
}

view('allUsers', $items);