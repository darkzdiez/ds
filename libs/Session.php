<?php

class Session {
    public $_nameSession;
    public $_timeSession;

    function __construct() {
        $this->_nameSession = "ADMINSESSION";
        $this->_timeSession = 24*60*60;
    }

    public static function init($recordar=false)
    {

        $Session = new Session;
        session_name($Session->_nameSession);
        if ($recordar==true) {
            session_set_cookie_params($Session->_timeSession);
        }
        if (isset($_COOKIE['recordarme']) and $_COOKIE['recordarme']=='ab') {
            session_set_cookie_params($Session->_timeSession);
        }
        @session_start();
    }
    
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key)
    {
        if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    }
    
    public static function destroy()
    {
        $Session = new Session;
        session_name($Session->_nameSession);
        $time=time()+60*60*24;
        setcookie('recordarme','ac', $time, '/');
        /**
        * (PHP >=5.4.0)
        * session_status()==PHP_SESSION_NONE
        **/
        $a = session_id();
        if(empty($a)) {
            session_start();
        }
        session_destroy();
    }
    
}