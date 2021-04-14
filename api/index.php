<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__).'/dao/UserDao.class.php';

Flight::register('userDao', 'UserDao');

require_once dirname(__FILE__)."/routes/users.php";

Flight::route('/', function(){
    echo 'hello world!';
});



Flight::start();

?>
