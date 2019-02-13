<?php
namespace Core;
use App\Config;
use Core\View;

/**
 * Error Class
 * Handles the errors and the exceptions
 */
class Error{

    public static function errorHandler($level, $message, $file, $line){
        if(error_reporting() !== 0 ){
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /** 
     * Exception handler
     * @param Exception $exception 
     * @return viod
     */
    public static function exceptionHandler($exception){
        if (Config::SHOW_ERR) {
            echo "<h3>Fatal error</h3>";
            echo "<h4>Uncaught exception: ". get_class($exception) ."</h4>";
            echo "<p>Message: " . $exception->getMessage() . "</p>";
            echo "<p>Stach trace: ". $exception->getTraceAsString() ."</p>";
            echo "<p>Throw in " . $exception->getFile() . " on line ". $exception->getLine() ."</p>";
        }else{
            $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.txt' ;
            ini_set('error_log', $log);
            $message = "Uncaught exception: ". get_class($exception) ."\ ";
            $message .= "Message: " . $exception->getMessage()  ."\ ";
            $message .= "\nStack trace: ".  $exception->getTraceAsString() . "\ ";
            $message .= "\nThrow in " . $exception->getFile() . " on line ". $exception->getLine() . "\ ";
            error_log($message);
            $code = $exception->getCode();
            if($code != 404){
                $code = 500;
            }
            http_response_code($code);
            switch ($code) {
                case 404:
                    View::renderTemplate('Errors.404');
                    break;
                case 500:
                    View::renderTemplate('Errors.500');
                    break;
                default:
                    echo 'An error occurred';
                    break;
            }
            die();
        }
    }
}
