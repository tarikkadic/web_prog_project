<?php
require_once dirname(__FILE__)."/BaseDao.class.php";
require_once dirname(__FILE__)."/UserDao.class.php";

class CommentDao extends BaseDao{

  // protected $user = new UserDao();

  public function add_comment($comment){
    return $this->insert("comments", $comment);
  }

  public function get_comments_by_user_email($email){
    $user = new UserDao();
    $user = $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
    return $this->query("SELECT * FROM comments WHERE user_id = ".$user["id"]."", []);
  }

  public function get_comments_by_article(){
    return $this->query("SELECT * FROM accounts", []);
  }
}
 ?>
