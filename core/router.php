<?php 
namespace Core;

class router{ 
	public $routes = [];
	public $dynamicRoutes = [];
	public $query = [];
	
	public function add($method, $parameters=[]){
		if(!empty($parameters["dynamic"])){
		$this->dynamicRoutes[$parameters["url"]] = 1; 
		}
		$this->routes[$method][$parameters["url"]] = $parameters; 
	} 
	public function getRoutes()
	{
		return $this->routes;
	} 
	public function getQuery()
	{
		return $this->query;
	} 
	public function run()
	{
		$url = (!empty($_GET["url"]) ? "/".$_GET["url"] : "/");
		$method = (!empty($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : "");
		return $this->Match($method,$url);
	} 
	public function Match($method,$url)
	{
		$this->query = $this->getqueries($url);
		if(!empty($this->routes[$method][$this->query[0]])){
			$match = $this->routes[$method][$this->query[0]];
			return $this->call($match);
		}else{
			throw new \Exception('Page Not Found', 404);
		}
	}
	public function call($match)
	{ 
		if(!empty($match["callback"])){ 
			$match["callback"]();
		}elseif(!empty($match["controller"]) && !empty($match["action"])){
			$this->getNamespace($match);
		}
	}
	public function getNamespace($match)
	{ 
		$namespace = '\App\controllers\\';
		$namespace .= $match["controller"] . '';
		$action = $match["action"];
		if (class_exists($namespace)) { 
		$controller = new $namespace();
		$controller->params["query"] = $this->query[1];
		$controller->$action();
		}else{
		throw new \Exception("Class Not Found ($namespace)", 404);
		}
	}
	public function getqueries($url)
	{
		if(stristr($url, '/') && strlen($url)>1){
			$explode = explode("/",$url);
			$stringQuery = "";
			$arrayQuery = [];
			foreach($explode as $value){
			if($value==":::"){
				$stringQuery .= "/:::";
				break;
			}
			if($value==""){
				continue;
			}
			$stringQuery .= "/$value";
			$arrayQuery[] = $value;
			}
			// Dynamic Route Check  
			foreach($this->dynamicRoutes as $key => $val){
				 if(stristr($url, $key)) {
					$stringQuery = $key;
				 } 
			}
			return [$stringQuery,$arrayQuery];
		}else{
			return [$url,[$url]];
		}
	}
}