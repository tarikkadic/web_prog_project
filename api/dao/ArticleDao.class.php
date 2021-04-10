<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class ArticleDao extends BaseDao{

  public function add_article($article){
    return $this->insert("articles", $article);
  }

  public function update_acc($id, $account){
    $this->update("accounts", $id, $account);
  }

  public function get_acc_by_id($id){
    return $this->query_unique("SELECT * FROM accounts WHERE id = :id", ["id" => $id]);
  }

  public function get_all_accounts(){
    return $this->query("SELECT * FROM accounts", []);
  }
}

?>
