<?php
/* index.php */
date_default_timezone_set('America/Caracas');
ini_set('zlib.output_compression', 'On');
ini_set('zlib.output_compression_level', '9');
ini_set('session.gc_maxlifetime', 5400);
$version = (float) phpversion();
if($_SERVER['REMOTE_ADDR'] == '::1' OR $_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
	ini_set('track_errors', 1);
    if($version <= (float) 5.4){
        ini_set('error_reporting', E_ALL);
    }else{
        ini_set('error_reporting', E_ALL ^ E_STRICT);
    }
	ini_set('display_errors', true);
}else{
	ini_set('track_errors', 0);
	ini_set('error_reporting', 0);
	ini_set('display_errors', false);
}
require 'generalConfig.php';
require 'util/Auth.php';
require LIBS . 'System.php';

// Also spl_autoload_register (Take a look at it if you like)

$path = new System();
$path->path($listSYSTEM);

// Load the Bootstrap!
require _pathMODULE . '/config.php';
/*exit(print_r(get_defined_constants(true)));*/
function __autoload($class) {
    if (!defined('BASE')) {
        define('BASE', 'tema1');
    }
    $file = LIBS . $class . ".php";
    $file2 = 'system/base/' . BASE . '/controllers/' . $class . ".php";
    $file3 = 'system/base/' . BASE . '/models/' . $class . ".php";
    if (file_exists($file)) {
        require $file;
    }elseif(file_exists($file2)){
        require $file2;
    }elseif(file_exists($file3)){
        require $file3;
    }
}
function gestor_excepciones($excepcion) {
    print 'Error: ' . DS::logERROR($excepcion->getMessage());
}
set_exception_handler('gestor_excepciones');

$bootstrap = new Bootstrap(_pathMODULE);
// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();
$bootstrap->init();
?>