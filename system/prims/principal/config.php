<?php

/* * Definidas las Constantes * */
define('TITLE_WEBSITE', '.: SMC :.')
/* * $php_errormsg * */;
if ($_SERVER['REMOTE_ADDR'] == '::1' OR $_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    define('PATH_NAV', DOMAIN . 'prims/');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'ordenes');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    $this->view->cssPpal='<link rel="stylesheet/less" type="text/css" href="' . PATH_FILE . 'public/less/bootstrap.less" />';
} else {
    define('PATH_NAV', DOMAIN . 'prims/');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'ordenes');
    define('DB_USER', 'root');
    define('DB_PASS', 'dbadmin$yara$2010');
    $this->view->cssPpal='<link rel="stylesheet/css" type="text/css" href="' . PATH_FILE . 'public/css/styles.css" />';
}
define('PATH_SYSTEM', DOMAIN . 'system/prims/');
define('PATH_FILE', PATH_SYSTEM . 'principal/');
// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'HashGENERAL$Gobernacion$2012$Security');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'HashPASSWORD$Gobernacion$2012$Security');
