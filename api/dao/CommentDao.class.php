<?php
require_once dirname(__FILE__)."/BaseDao.class.php";
require_once dirname(__FILE__)."/UserDao.class.php";
require_once dirname(__FILE__)."/ArticleDao.class.php";

class CommentDao extends BaseDao{

  public function __construct(){
    parent::__construct("comments");
  }

  // protected $user = new UserDao();

  // public function add_comment($comment){
  //   return $this->insert("comments", $comment);
  // }
  //
  // public function get_comments_by_user_email($email){
  //   $user = new UserDao();
  //   $user = $this->get_user_by_email($email);
  //   return $this->query("SELECT * FROM comments WHERE user_id = ".$user["id"]."", []);
  // }

  // public function get_comments_by_article($id){
  //   $article = new ArticleDao();
  //   $article = $this->get_unique_article($id)
  //   return $this->query("SELECT * FROM accounts", []);
  // }
}
 ?>
