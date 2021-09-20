<?php


Flight::route('POST /comments', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::commentService()->post_comment($data));
});

Flight::route('PUT /comments/delete/@id', function($id){
  Flight::json(Flight::commentService()->on_action($id));
});

Flight::route('PUT /comments/report/@id', function($id){
  Flight::json(Flight::commentService()->report($id));
});

?>
