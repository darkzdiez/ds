<?php
/* index.php */
date_default_timezone_set('America/Caracas');
ini_set('zlib.output_compression', 'On');
ini_set('zlib.output_compression_level', '9');
ini_set('session.gc_maxlifetime', 5400);
ini_set('track_errors', 1);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
require 'generalConfig.php';
require 'util/Auth.php';

// Also spl_autoload_register (Take a look at it if you like)

function __autoload($class) {
    $file = LIBS . $class . ".php";
    if (file_exists($file)) {
        require $file;
    }
}

$path = new System();
$path->path($listSYSTEM);

// Load the Bootstrap!
require _pathMODULE . '/config.php';
$bootstrap = new Bootstrap(_pathMODULE);
// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();
$bootstrap->init();
?>