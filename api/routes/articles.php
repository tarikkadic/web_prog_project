<?php

/**
 * @OA\Info(title="NewsNow API", version="0.1")
 * @OA\OpenApi(
 *   @OA\Server(
 *       url="http://localhost/project/api/",
 *       description="Development environment"
 *   )
 * )
 * @OA\SecurityScheme(
 *  securityScheme="ApiKeyAuth",
 *  in="header",
 *  name="Authentication",
 *  type="apiKey"
 *  )
 */

/**
* @OA\Post(path="/articles", tags={"article"},
*   @OA\RequestBody(description="Article info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="title", required="true", type="string", example="Article title",	description="Title of the article" ),
*    				 @OA\Property(property="subtitle", type="string", example="Article subtitle",	description="Subtitle of the article" ),
*            @OA\Property(property="body", type="string", example="Article body",	description="The body of the article" ),
*            @OA\Property(property="category", type="string", example="Article category",	description="Category of the article" )
*          )
*       )
*     ),
*     @OA\Response(response="200", description="Add article to DB")
* )
*/
Flight::route('POST /articles', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::articleService()->add_article($data));
});

/**
* @OA\Put(path="/articles/{id}", tags={"article"},
*   @OA\Parameter(@OA\Schema(type="integer"), in="path", name="id", default=1),
*   @OA\RequestBody(description="Article info that is going to be updated", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="title", required="true", type="string", example="Article title",	description="Title of the article" ),
*    				 @OA\Property(property="subtitle", type="string", example="Article subtitle",	description="Subtitle of the article" ),
*            @OA\Property(property="body", type="string", example="Article body",	description="The body of the article" ),
*            @OA\Property(property="category", type="string", example="Article category",	description="Category of the article" )
*          )
*       )
*     ),
 *     @OA\Response(response="200", description="Update article in the DB")
 * )
 */
Flight::route('PUT /articles/@id', function($id){
  $data = Flight::request()->data->getData();
  print_r($data);die;
  Flight::json(Flight::articleService()->update($id, $data));
});

Flight::route('POST /articlex/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::articleService()->update($id, $data));
});

/**
 * @OA\Get(
 *  path="/articles/{id}", tags={"article"},
 *     @OA\Parameter(type="integer", in="path", allowReserved=true, name="id", example=1),
 *     @OA\Response(response="200", description="Fetch individual article")
 * )
 */
Flight::route('GET /articles/@id', function($id){
  Flight::json(Flight::articleService()->get_by_id($id));
});

Flight::route('GET /articles/@id/comments', function($id){
  Flight::json(Flight::articleService()->get_article_comments($id));
});

/**
 * @OA\Get(
 *  path="/articles", tags={"article"},
 *     @OA\Response(response="200", description="Fetch individual article")
 * )
 */
Flight::route('GET /articles', function(){
  Flight::json(Flight::articleService()->get_all_articles());
});

Flight::route('GET /articles/category/@category', function($category){
  Flight::json(Flight::articleService()->article_category($category));
});
?>
