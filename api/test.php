<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/dao/UserDao.class.php";
require_once dirname(__FILE__)."/dao/CommentDao.class.php";

$dao = new CommentDao();

// $dao->add_user([
//   "username" => "user",
//   "created" => date("Y-m-d H:i:s"),
//   "email" => "newuser@gmail.com",
//   "password" => "12345",
//   "reported" => 1
// ]);

// $user = $dao->get_reported_users();
// //
// print_r($user);

$comments = $dao->get_comments_by_user_email("user@gmail.com");

print_r($comments);

//$accounts = $dao->get_all_accounts();

//print_r($accounts);
?>
