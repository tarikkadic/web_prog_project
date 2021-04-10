<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/dao/UserDao.class.php";
require_once dirname(__FILE__)."/dao/CommentDao.class.php";
require_once dirname(__FILE__)."/dao/ArticleDao.class.php";

$dao = new ArticleDao();

 $dao->add_article([
    "title" => "newnews",
    "subtitle"  => "subtitle12",
    "body" => "this is a second article",
    "created" => date("Y-m-d H:i:s"),
    "category" => "COVID-19"
 ]);

$articles = $dao->get_all_recent_articles();

print_r($articles);



?>
