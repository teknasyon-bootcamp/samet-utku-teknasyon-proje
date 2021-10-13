<?php
namespace Core;
class Error
{
    public static function errorHandler($level, $message, $file, $line)
    {
		
        if (error_reporting() !== 0) {
			$error = [$message, 0, $level, $file, $line];
            // Logger
            \Core\classes\logger::write("$message ($file,$line)",$level);
        }
    }
    public static function exceptionHandler($exception)
    { 
        http_response_code(500);
		echo "<h1>Fatal error</h1>";
            echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            echo "<p>Message: '" . $exception->getMessage() . "'</p>";
            echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
            echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
		exit;
    }
}