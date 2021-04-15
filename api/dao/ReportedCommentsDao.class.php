<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

/**
 *
 */
class ReportedCommentsDao extends BaseDao {

  function __construct() {
      parent::__construct("reported_comments");
  }
}
?>
