<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class ArticleDao extends BaseDao{

  public function __construct(){
    parent::__construct("articles");
  }

  public function add_article($article){
    return $this->insert("articles", $article);
  }

  public function update_article($id, $article){
    $this->update("articles", $id, $article);
  }

  public function get_article_by_category($category){
    return $this->query("SELECT * FROM articles WHERE category = :category ORDER BY created DESC", ["category" => $category]);
  }

  public function get_all_recent_articles(){
    return $this->query("SELECT * FROM articles ORDER BY created DESC", []);
  }

  public function get_unique_article($id){
    return $this->query_unique("SELECT * FROM articles WHERE id = :id", ["id" => $id]);
  }

  public function get_article_comments($id){
    return $this->query("SELECT user_id, body, created FROM article_comments ac JOIN comments c ON ac."."comment_id="."c."."id WHERE ac."."article_id=".$id."", []);
  }
}

?>
