<?php

require_once dirname(__FILE__).'/../dao/ArticleDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class ArticleService extends BaseService {

  public function __construct(){
    $this->dao = new ArticleDao();
  }


  public function add_article($article){
    $article = parent::add([
      "title" => $article["title"],
      "subtitle" => $article["subtitle"],
      "body" => $article["body"],
      "created" => date(Config::DATE_FORMAT),
      "category" => $article["category"]
    ]);

    return $article;
  }

  //public function update_article($article)
}

?>
