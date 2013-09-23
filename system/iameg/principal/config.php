<?php

/* * Definidas las Constantes * */
define('TITLE_WEBSITE', '.: SMC :.')
/* * $php_errormsg * */;
if ($_SERVER['REMOTE_ADDR'] == '::1' OR $_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    define('PATH_NAV', DOMAIN . 'iameg/');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'iameg');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
} else {
    define('PATH_NAV', DOMAIN . 'w/');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'iameg');
    define('DB_USER', 'root');
    define('DB_PASS', 'dbadmin$yara$2010');
}
define('PATH_SYSTEM', DOMAIN . 'system/iameg/');
define('PATH_FILE', PATH_SYSTEM . 'principal/');
// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'HashGENERAL$Gobernacion$2012$Security');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'HashPASSWORD$Gobernacion$2012$Security');
