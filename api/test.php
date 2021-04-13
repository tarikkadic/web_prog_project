<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/dao/UserDao.class.php";
require_once dirname(__FILE__)."/dao/CommentDao.class.php";
require_once dirname(__FILE__)."/dao/ArticleDao.class.php";

$dao = new UserDao();

 // $dao->add_article([
 //    "title" => "newnews",
 //    "subtitle"  => "subtitle12",
 //    "body" => "this is a second article",
 //    "created" => date("Y-m-d H:i:s"),
 //    "category" => "COVID-19"
 // ]);

 $dao->update(4, [
   "username" => "test11",
   "email" => "test@test.com",
   "password" => "test12345",
   "created" => date("Y-m-d H:i:s")
 ])

// $articles = $dao->get_article_comments(3);
//
// print_r($articles);



?>
