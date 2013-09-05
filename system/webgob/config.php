<?php

$DEFAULT_MODULE = 'web';
$MODULE = array('admin');
define('DIR_PATH_SYSTEM', dirname(__FILE__));
if (!$_SERVER['REMOTE_ADDR'] == '::1' OR !$_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
	ini_set('track_errors', 0);
	ini_set('error_reporting', 0);
	ini_set('display_errors', false);
}
?>
