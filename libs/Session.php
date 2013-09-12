<?php

class Session {
    public $_nameSession;
    public $_timeSession;
    public $_pathSession;
    function __construct() {
        @$this->_nameSession = APINAME;
        @$this->_timeSession = 24*60*60;
        @$this->_pathSession = '/';
    }

    public static function init($recordar=false) {
        $Session = new Session;
        session_name($Session->_nameSession);
        if ($recordar==true) {
            session_set_cookie_params($Session->_timeSession, $Session->_pathSession);
        }
        if (isset($_COOKIE['recordarme']) and $_COOKIE['recordarme']=='ab') {
            session_set_cookie_params($Session->_timeSession, $Session->_pathSession);
            setcookie($Session->_nameSession, $_COOKIE[$Session->_nameSession], time() + 24*60*60, $Session->_pathSession);
        }
        @session_start();
    }
    
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key) {
        if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    }
    
    public static function destroy() {
        @$Session = new Session;
        @session_name($Session->_nameSession);
        @$time=time()+60*60*24;
        @setcookie('recordarme','ac', $time, SESSIONPATH);
        @setcookie($Session->_nameSession, $_COOKIE[$Session->_nameSession], time()-3600, $Session->_pathSession);
        /**
        * (PHP >=5.4.0)
        * session_status()==PHP_SESSION_NONE
        **/
        $a = session_id();
        if(empty($a)) {
            @session_start();
        }
        session_destroy();
    }
    
}