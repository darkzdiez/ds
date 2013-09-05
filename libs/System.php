<?php

class System {

    public function path($listSYSTEM) {
        $domain=$_SERVER["HTTP_HOST"];
        if ($domain == 'localhost' OR !array_key_exists($domain, $listSYSTEM)) {

            define('DOMAIN', 'http://' . $domain  . '/'.PROJECTNAME.'/');
            if(!isset($_GET['url'])){
                $_GET['url']=SYSTEMDEFAULT;
            };
            $url = explode('/', rtrim($_GET['url'], '/'), 3);
            define('_pathActiveSYSTEM',_pathSYSTEM . $url[0]);
            require _pathActiveSYSTEM . '/config.php';
            if (isset($url[1]) && in_array($url[1], $MODULE)) {
                if (isset($url[2])) {
                    define('_URLPath', $url[2]);
                } else {
                    define('_URLPath', '');
                }
                define('_pathMODULE', _pathSYSTEM . $url[0] . '/' . $url[1]);
            } else {
                $url = explode('/', rtrim($_GET['url'], '/'), 2);
                if (isset($url[1])) {
                    define('_URLPath', $url[1]);
                } else {
                    define('_URLPath', '');
                }
                define('_pathMODULE', _pathSYSTEM . $url[0] . '/' . $DEFAULT_MODULE);
            }
        } elseif(array_key_exists($domain, $listSYSTEM)) {
            define('DOMAIN', 'http://' . $domain  . '/w/');
            if (isset($_GET['url'])) {
                $url = explode('/', rtrim($_GET['url'], '/'), 2);
            }
            if(is_array($listSYSTEM[$domain])){
                if(array_key_exists($url[0], $listSYSTEM[$domain])){

                }
            }else{
                $system=$listSYSTEM[$domain];
                define('_pathActiveSYSTEM',_pathSYSTEM . $system);
                require _pathActiveSYSTEM . '/config.php';
                if (isset($url[0]) && in_array($url[0], $MODULE)) {
                    if (isset($url[1])) {
                        define('_URLPath', $url[1]);
                    } else {
                        define('_URLPath', '');
                    }
                    define('_pathMODULE', _pathSYSTEM . $system . '/' . $url[0]);
                } else {
                    if (isset($_GET['url'])) {
                        $url = explode('/', rtrim($_GET['url'], '/'), 1);
                    }
                    if (isset($url[0])) {
                        define('_URLPath', $url[0]);
                    } else {
                        define('_URLPath', '');
                    }
                    define('_pathMODULE', _pathSYSTEM . $system . '/' . $DEFAULT_MODULE);
                }
            }
      }else{
            exit('Dominio:' . $domain . ' no definido');
        }
//        print $domain . ' | ';
//        print_r($listSYSTEM) . ' | ';
//        print _URLPath . ' | ';
//        print _pathMODULE . ' | ';
    }

}

?>
