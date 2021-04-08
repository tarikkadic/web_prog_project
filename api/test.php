<?php
require_once dirname(__FILE__)."/dao/UserDao.class.php";

$user_dao = new UserDao();

//$user = $user_dao->get_user_by_id(1);

$user1 = [
  "password" => "password123"
];


$user = $user_dao->update_user_by_email("user123@gmail.com", $user1);

//get_user_by_email("tarik.kadic@gmail.com");

//print_r($user);
?>
