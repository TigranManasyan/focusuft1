<?php
define('debug', 1);
class ErrorHandler {
    
    public function __construct() {
        if (debug) {
            error_reporting(-1);
            ob_start();
            set_error_handler([$this, 'errorHandler']);
            register_shutdown_function([$this, 'fatalErrorHandler']);
        }else{
            error_reporting(0);
        }
        
    }
    public function errorHandler(){
        echo 1;
    }
    public function fatalErrorHandler(){
        $error = error_get_last();
        if (!empty($error) && ($error['type'] == E_ERROR || $error['type'] == E_PARSE || $error['type'] == E_COMPILE_ERROR || $error['type'] == E_CORE_ERROR)) {
            ob_end_clean();
            include 'fatalError.php';
        }else{
            ob_end_flush();
        }
    }
}
