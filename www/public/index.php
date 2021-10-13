<?php 
/* Check website under maintenance */
if(file_exists("../block")){
    exit("Please Wait");
}

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
/**
 * Routing
*/
$router = new \Core\router;
/* Home */
$router->add("GET",["url"=>"/","controller"=>"index","action"=>"index","dynamic"=>1]);
/* DynamicPages */
$router->add("POST",["url"=>"/","controller"=>"index","action"=>"pageViewer","dynamic"=>1]);
$router->add("POST",["url"=>"/news","controller"=>"news_Controller","action"=>"index","dynamic"=>1]);
$router->add("POST",["url"=>"/category","controller"=>"news_Controller","action"=>"category","dynamic"=>1]);
/* Membership Signup or Signin */
$router->add("POST",["url"=>"/api/members/signup","controller"=>"signup_Controller","action"=>"Signup"]);
$router->add("POST",["url"=>"/api/members/signin","controller"=>"signin_Controller","action"=>"Signin"]);
/* Comment Add */
$router->add("POST",["url"=>"/api/comments/add","controller"=>"comments_Controller","action"=>"add"]);
/* Panel */
$router->add("POST",["url"=>"/panel","controller"=>"panel_Controller","action"=>"index","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["user"]]); } ]);
$router->add("POST",["url"=>"/logout","controller"=>"panel_Controller","action"=>"logout","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["user"]]); } ]);
/* Panel Editor */
$router->add("POST",["url"=>"/panel/news","controller"=>"panel_Controller","action"=>"editor","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["editor"]]); } ]);
/* Category Editor */
$router->add("POST",["url"=>"/panel/news/categoryAdd","controller"=>"panel_Controller","action"=>"categoryAdd","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["editor"]]); } ]);
$router->add("POST",["url"=>"/panel/news/categoryDelete","controller"=>"panel_Controller","action"=>"categoryDelete","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["editor"]]); } ]);
/* News Editor */
$router->add("POST",["url"=>"/panel/news/newsAdd","controller"=>"panel_Controller","action"=>"newsAdd","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["editor"]]); } ]);
$router->add("POST",["url"=>"/panel/news/newsDelete","controller"=>"panel_Controller","action"=>"newsDelete","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["editor"]]); } ]);
/* User Editor */
$router->add("POST",["url"=>"/panel/users","controller"=>"panel_Controller","action"=>"moderator_admin","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["moderator"]]); } ]);
$router->add("POST",["url"=>"/panel/user/update","controller"=>"panel_Controller","action"=>"userUpdate","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["moderator"]]); } ]);
$router->add("POST",["url"=>"/panel/user/delete","controller"=>"panel_Controller","action"=>"userDelete","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["moderator"]]); } ]);
/* Last Activities */
$router->add("POST",["url"=>"/panel/latest","controller"=>"panel_Controller","action"=>"latest","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["user"]]); } ]);
/* Router Test */
$router->add("GET",["url"=>"/test","callback"=>function(){ echo 'Teknasyon.Com GetContact Panteon.games '; }]);
/* CallBack */
$router->run();