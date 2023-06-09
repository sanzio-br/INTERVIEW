<?php

define('APP_PATH' , dirname(__FILE__) . '/../');

require('config.php');
require('data/data.class.php'); 
require('data/mysqldataprovider.class.php');
require('functions.php');

Data::initialize(new mysqlDataProvider(CONFIG['db']));