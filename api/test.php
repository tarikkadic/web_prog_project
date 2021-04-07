<?php
require_once dirname(__FILE__)."/dao/UserDao.class.php";

$user_dao = new UserDao();

//$user = $user_dao->get_user_by_id(1);

$user1 = [
  "username" => "user1",
  "email" => "user1@gmail.com",
  "password" => "1234",
  "account_id" => 1
];

$user = $user_dao->add_user($user1);

//get_user_by_email("tarik.kadic@gmail.com");

print_r($user);
?>
