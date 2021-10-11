<?php 
require dirname(__DIR__)."/vendor/autoload.php";
/** 
 * Session
 */
\Core\classes\session::start();
/**
 * Error handling
 */
error_reporting(E_ALL);
set_error_handler('\Core\error::errorHandler');
set_exception_handler('\Core\error::exceptionHandler');
?>
<?php 
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

/* Signup */
$router->add("POST",["url"=>"/api/members/signup","controller"=>"signup_Controller","action"=>"Signup"]);
$router->add("POST",["url"=>"/api/members/signin","controller"=>"signin_Controller","action"=>"Signin"]);

/* Panel */
$router->add("POST",["url"=>"/panel","controller"=>"panel_Controller","action"=>"index","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permission"=>["membership"]]); } ]);



//$router->add("POST",["url"=>"/haber","controller"=>"index","action"=>"newsViewer","dynamic"=>1,"callback"=>function(){ echo "Haberler: ".rand(100,10000); }]);
/* CallBack */
$router->run();