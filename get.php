<?php
require('app/app.php');
$item = Data::get_all_users();
// var_dump($item[0]->id);
echo $item[0]->id;