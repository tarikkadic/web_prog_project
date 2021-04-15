<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__).'/services/UserService.class.php';

/* Utility function for reading query parameters from URL */
Flight::map('query', function($name, $default_val = NULL){
  $request = Flight::request();

  $query_param = @$request->query->getData()[$name];
  $query_param = $query_param ? $query_param : $default_val;

  return $query_param;
});

/* Register Business logic layer services */
Flight::register('userService', 'UserService');

/* Include all routes */
require_once dirname(__FILE__)."/routes/users.php";

Flight::start();

?>
