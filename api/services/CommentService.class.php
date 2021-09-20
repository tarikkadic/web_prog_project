<?php
require_once dirname(__FILE__).'/../dao/CommentDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class CommentService extends BaseService {

  public function __construct(){
    $this->dao = new CommentDao();
  }

  public function post_comment($comment){
    $comment = parent::add([
      "user_id" => $comment["user_id"],
      "article_id" => $comment["article_id"],
      "comment_body" => $comment["comment_body"],
      "created" => date(Config::DATE_FORMAT)
    ]);

    return $comment;
  }

  public function on_action($id){
    return $this->dao->on_delete($id);
  }

  public function report($id){
    return $this->dao->on_report($id);
  }
}
?>
