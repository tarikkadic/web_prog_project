<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once dirname(__FILE__)."/dao/UserDao.class.php";


$user_dao = new UserDao();

//$user = $user_dao->get_user_by_id(1);

$user1 = [
  "username" => "newest user1",
  "email" => "newestuser1@gmail.com",
  "account_id" => 1,
  "password" => "sifra123"
];

$user = $user_dao->add_user($user1);

//get_user_by_email("tarik.kadic@gmail.com");

print_r($user);
?>
