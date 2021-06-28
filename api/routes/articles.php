<?php

Flight::route('POST /articles', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::articleService()->add_article($data));
});

Flight::route('PUT /articles/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::articleService()->update($id, $data));
});
?>
