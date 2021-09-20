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
 *  path="/reported_comments", tags={"reported_comments"},
 *     @OA\Response(response="200", description="Fetch all reported comments")
 * )
 */
Flight::route('GET /reported_comments', function(){
  Flight::json(Flight::reportedcommentService()->get_reported_comments());
});

Flight::route('DELETE /reported_comments/approve/@id', function($id){
  Flight::json(Flight::reportedcommentService()->on_action($id));
});
?>
