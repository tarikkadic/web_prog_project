<?php

require_once dirname(__FILE__).'/../dao/ArticleDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class ArticleService extends BaseService {

  public function __construct(){
    $this->dao = new ArticleDao();
  }


  public function add_article($article){
    $article = parent::add([
      "image" =>$article["image"],
      "title" => $article["title"],
      "subtitle" => $article["subtitle"],
      "article_body" => $article["article_body"],
      "created" => date(Config::DATE_FORMAT),
      "category" => $article["category"]
    ]);

    return $article;
  }

  public function article_category($category){
    return $this->dao->get_article_by_category($category);
  }


  public function get_all_articles(){
    return $this->dao->get_all_recent_articles();
  }

  public function get_article_comments($id){
    return $this->dao->get_all_article_comments($id);
  }

}
?>
