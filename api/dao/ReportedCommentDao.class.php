<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

/**
 *
 */
class ReportedCommentDao extends BaseDao {

  function __construct() {
      parent::__construct("reported_comments");
  }

    public function get_all_reported_comments(){
      return $this->query("SELECT rc."."id, rc."."comment_id, rc."."comment_body, rc."."created, u."."username, a."."title FROM reported_comments rc JOIN comments c ON rc."."comment_id= c."."id JOIN users u ON c."."user_id = u."."id JOIN articles a ON a."."id=c."."article_id", []);
    }

    public function reported_comments_on_action($id){
      return $this->query("DELETE FROM reported_comments WHERE id = :id", ["id" => $id]);
    }
}
?>
