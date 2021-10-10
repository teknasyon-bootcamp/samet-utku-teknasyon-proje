<?php 
require dirname(__DIR__)."/vendor/autoload.php";
/**
 * Error handling
 */
error_reporting(E_ALL);
set_error_handler('\Core\error::errorHandler');
set_exception_handler('\Core\error::exceptionHandler');
/**
 * Routing
*/
$router = new \Core\router;
$router->add("GET",["url"=>"/","controller"=>"index","action"=>"index","dynamic"=>1]);
// DynamicPage
$router->add("POST",["url"=>"/","controller"=>"index","action"=>"pageViewer","dynamic"=>1]);
/* 
,"controller"=>"index","action"=>"pageViewer"
*/
/* Signup Signin */
$router->add("POST",["url"=>"/members/signup","controller"=>"signupController","action"=>"Signup"]);
//$router->add("POST",["url"=>"/haber","controller"=>"index","action"=>"newsViewer","dynamic"=>1,"callback"=>function(){ echo "Haberler: ".rand(100,10000); }]);
/* CallBack */
$router->run();