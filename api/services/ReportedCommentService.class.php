<?php

require_once dirname(__FILE__).'/../dao/ReportedCommentDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class ReportedCommentService extends BaseService {

  public function __construct(){
    $this->dao = new ReportedCommentDao();
  }

  public function get_reported_comments(){
    return $this->dao->get_all_reported_comments();
  }

  public function on_action($id){
    return $this->dao->reported_comments_on_action($id);
  }
}

?>
