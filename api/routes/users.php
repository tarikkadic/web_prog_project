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
 * @OA\Get(
 *     path="/users",
 *     @OA\Response(response="200", description="List all users from DB")
 * )
 */
Flight::route('GET /users', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
  $search = Flight::query('search');
  $order = Flight::query('order', "-id");

  Flight::json(Flight::userService()->get_users($search, $offset, $limit, $order));
});

/**
 * @OA\Get(
 *  path="/users/{id}", tags={"user"},
 *     @OA\Parameter(type="integer", in="path", allowReserved=true, name="id", example=1),
 *     @OA\Response(response="200", description="Fetch individual user")
 * )
 */
Flight::route('GET /users/@id', function($id){
  Flight::json(Flight::userService()->get_by_id($id));
});

/**
 * @OA\Post(
 *     path="/users", tags={"user"},
 *     @OA\Response(response="200", description="List all users from DB with set id")
 * )
 */
Flight::route('POST /users', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->add($data));
});

/**
 * @OA\Put(
 *     path="/users/{id}", tags={"user"},
 *     @OA\Parameter(@OA\Schema(type="integer"), in="path", allowReserved=true, name="id", example=1),
 *     @OA\Response(response="200", description="Update user based on id")
 * )
 */
// Flight::route('PUT /users/@id', function($id){
//   $data = Flight::request()->data->getData();
//   Flight::json(Flight::userService()->update($id, $data));
// });

Flight::route('PUT /users/@id', function($id){
  Flight::json(Flight::userService()->update_account(Flight::get('user'), $id, Flight::request()->data->getData()));
});

Flight::route('PUT /users/suspend/@id', function($id){
  Flight::json(Flight::userService()->user_suspend($id));
});

/**
 * @OA\Post(
 *     path="/users/register",
 *     @OA\Parameter(@OA\Schema(type="integer"), in="path", allowReserved=true, name="id", example=1),
 *     @OA\Response(response="200", description="Add user")
 * )
 */
Flight::route('POST /register', function(){
  $data = Flight::request()->data->getData();
  Flight::userService()->register($data);
  Flight::json(["message" => "Confirmation email is sent to you, please confirm the account."]);
});

Flight::route('GET /confirm/@token', function($token){
  Flight::userService()->confirm($token);
  Flight::json(["message" => "Your account has been activated!"]);
});

Flight::route('POST /login', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->login($data));
});

Flight::route('POST /forgot', function(){
  $data = Flight::request()->data->getData();
  Flight::userService()->forgot($data);
  Flight::json(["message" => "Recovery link has been sent"]);
});

Flight::route('POST /reset', function(){
  $data = Flight::request()->data->getData();
  Flight::userService()->reset($data);
  Flight::json(["message" => "Password has been changed!"]);
});

?>
