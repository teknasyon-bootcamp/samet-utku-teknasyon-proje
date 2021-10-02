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
$router->add("GET",["url"=>"/","controller"=>"index","action"=>"index"]);
$router->add("GET",["url"=>"/test","controller"=>"index","action"=>"index"]);


/* dynamic param = "dynamic"=>1 */
$router->add("GET",["url"=>"/dinamic/id","controller"=>"index","action"=>"dynamicroute","dynamic"=>1]);

/* CallBack */
$router->add("GET",["url"=>"/haberler","callback"=>function(){ echo "Haberler"; }]);
$router->add("GET",["url"=>"/uyelik","callback"=>function(){ echo "Üyelik"; }]);
$router->add("GET",["url"=>"/uyelik/profil","callback"=>function(){ echo "PROFİL"; }]);
$router->add("GET",["url"=>"/selam","callback"=>function(){ echo "SELAM"; }]);


$router->run();