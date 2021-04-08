<?php
require_once dirname(__FILE__)."/dao/UserDao.class.php";

$user_dao = new UserDao();

//$user = $user_dao->get_user_by_id(1);

$user1 = [
  "username" => "user123",
  "email" => "user123@gmail.com",
  "password" => "12345",
];


$user = $user_dao->update_user(4, $user1);

//get_user_by_email("tarik.kadic@gmail.com");

//print_r($user);
?>
