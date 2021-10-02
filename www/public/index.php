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
$router->add("GET",["url"=>"/templates","controller"=>"index","action"=>"templateLoad"]);
$router->add("POST",["url"=>"/api","controller"=>"api","action"=>"index"]);


/* Pages */
$router->add("POST",["url"=>"/page/home","controller"=>"pages","action"=>"home"]);
$router->add("POST",["url"=>"/page/news/","controller"=>"pages","action"=>"news","dynamic"=>1]);

$router->add("POST",["url"=>"/page/signin","controller"=>"pages","action"=>"signin"]);
$router->add("POST",["url"=>"/page/signup","controller"=>"pages","action"=>"signup"]);
$router->add("POST",["url"=>"/page/categoriesdetail","controller"=>"pages","action"=>"signin"]);


$router->add("POST",["url"=>"/api","controller"=>"api","action"=>"index"]);


/* 
Dynamic 

$router->add("GET",["url"=>"/dinamic/id","controller"=>"index","action"=>"dynamicroute","dynamic"=>1]);

$router->add("GET",["url"=>"/haberler","callback"=>function(){ echo "Haberler"; }]);
$router->add("GET",["url"=>"/uyelik","callback"=>function(){ echo "Üyelik"; }]);
$router->add("GET",["url"=>"/uyelik/profil","callback"=>function(){ echo "PROFİL"; }]);
$router->add("GET",["url"=>"/selam","callback"=>function(){ echo "SELAM"; }]);
*/


/* CallBack */



$router->run();