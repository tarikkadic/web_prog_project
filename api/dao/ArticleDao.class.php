<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class ArticleDao extends BaseDao{

  public function add_article($article){
    return $this->insert("articles", $article);
  }

  public function update_article($id, $article){
    $this->update("articles", $id, $article);
  }

  public function get_article_by_category($category){
    return $this->query("SELECT * FROM articles WHERE category = :category", ["category" => $category]);
  }

  public function get_all_recent_articles(){
    return $this->query("SELECT * FROM articles ORDER BY created DESC", []);
  }
}

?>
