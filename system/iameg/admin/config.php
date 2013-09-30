<?php

/* * Definidas las Constantes * */
define('TITLE_WEBSITE', '.: SMC :.');
define('APINAME', 'adminwebsitegob');
/* * $php_errormsg * */;
if ($_SERVER['REMOTE_ADDR'] == '::1' OR $_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    define('PATH_NAV', DOMAIN . 'iameg/admin/');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'diezsolu_iameg');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('SESSIONPATH','/w/iameg/admin/');
} else {
    define('PATH_NAV', DOMAIN . 'admin/');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'diezsolu_iameg');
    define('DB_USER', 'diezsolu_gminas');
    define('DB_PASS', 'qwe123');
    define('SESSIONPATH','/admin/');
}
/* DATOS DE LA BASE U TEMA A UTILIZAR */
define('TEMPLATE', 'tema1');
/* ... */
define('PATH_SYSTEM', DOMAIN . 'system/webgob/');
define('PATH_FILE', PATH_SYSTEM . 'admin/');
// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'HashGENERAL$Gobernacion$2012$Security');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'HashPASSWORD$Gobernacion$2012$Security');
