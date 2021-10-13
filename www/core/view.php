<?php 
namespace Core;
class View
{
	public $var = [];
    /**
     * Render a view file
     *
     * @param string $path  The view file path
     *
     * @return void
     */
    public static function render($path,$params)
    {  
        $file = dirname(__DIR__) . "/app/views/$path";  
        if (is_readable($file)) {
            require $file;
        } else {
			$file = dirname(__DIR__) . "/app/views/404.php";  
			if(is_readable($file)) {
				require $file;
			}else{
                //\Core\classes\header::head("application/json",404,json_encode(["html"=>"404 Page Not Found"]));
                throw new \Exception("View Error: $file not found");
			}
		}
    }
	public static function returnHTML($path,$params)
    {  
        $file = dirname(__DIR__) . "/app/views/$path";  
        if (is_readable($file)) { 
            ob_start();
            require $file;
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        } else {
            \Core\classes\header::head("application/json",404,json_encode(["html"=>"404 Page Not Found"]));
            //throw new \Exception("View Error: $file not found");
        }
        
    }
}