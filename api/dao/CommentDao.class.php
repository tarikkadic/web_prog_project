<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class CommentDao extends BaseDao {

  public function __construct(){
    parent::__construct("comments");
  }

  public function post_article_comment($comment){
    return $this->insert("comments", $comment);
  }

  public function on_delete($id){
    return $this->query("UPDATE comments SET deleted=1 WHERE id = :id", ["id" => $id]);
  }

  public function on_report($id){
    return $this->query("UPDATE comments SET reported=1 WHERE id = :id", ["id" => $id]);
  }
}

?>
