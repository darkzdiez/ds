<?php

/* * Definidas las Constantes * */
define('TITLE_WEBSITE', '.: SMC :.');
define('APINAME', 'sisordenes');
/* * $php_errormsg * */;
if ($_SERVER['REMOTE_ADDR'] == '::1' OR $_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    define('PATH_NAV', DOMAIN . 'ordenes/');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'ordenes');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('_SERVER', 'local');
    define('SESSIONPATH','/webt/ordenes/');
} else {
    ini_set('track_errors', 0);
    ini_set('error_reporting', 0);
    ini_set('display_errors', false);
    define('PATH_NAV', 'http://yaracuy.gob.ve/' . 'ordenes/');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'ordenes');
    define('DB_USER', 'root');
    define('DB_PASS', 'dbadmin$yara$2010');
    define('_SERVER', 'server');
    define('SESSIONPATH','/ordenes/');
}
define('TEMPLATE', 'LOCAL');
define('PATH_SYSTEM', DOMAIN . 'system/ordenes/');
define('PATH_FILE', PATH_SYSTEM . 'principal/');
define('PATH_ORDENES',dirname($_SERVER['SCRIPT_FILENAME']).'/system/ordenes');
// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'HashGENERAL$Gobernacion$2012$Security');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'HashPASSWORD$Gobernacion$2012$Security');
