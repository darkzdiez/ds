<?php

/* * Definidas las Constantes * */
define('TITLE_WEBSITE', '.: SMC :.');
define('APINAME', 'adminwebsitegob');
/* * $php_errormsg * */;
if ($_SERVER['REMOTE_ADDR'] == '::1' OR $_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    define('PATH_NAV', DOMAIN . 'webgob/admin/');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'sitioweb2');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('SESSIONPATH','/webt/webgob/admin/');
} else {
    define('PATH_NAV', 'http://yaracuy.gob.ve/' . 'w/admin/');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'sitioweb2');
    define('DB_USER', 'root');
    define('DB_PASS', 'dbadmin$yara$2010');
    define('SESSIONPATH','/w/admin/');
}
define('PATH_SYSTEM', DOMAIN . 'system/webgob/');
define('PATH_FILE', PATH_SYSTEM . 'admin/');
// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'HashGENERAL$Gobernacion$2012$Security');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'HashPASSWORD$Gobernacion$2012$Security');
