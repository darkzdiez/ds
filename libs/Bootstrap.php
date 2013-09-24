<?php

class Bootstrap {
    var $_url = null;
    private $_controller = null;
    private $_controllerPath = 'controllers/'; // Always include trailing slash
    private $_modelPath = 'models/'; // Always include trailing slash
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';

    function __construct($_pathMODULE=NULL) {
        if($_pathMODULE!=NULL){
            $this->_controllerPath = $_pathMODULE .'/'. $this->_controllerPath;
            $this->_modelPath = $_pathMODULE .'/'. $this->_modelPath;
        }
    }

    /**
     * Starts the Bootstrap
     * 
     * @return boolean
     */
    public function init() {
        // Sets the protected $_url
        $this->_getUrl();

        // Load the default controller if no URL is set
        // eg: Visit http://localhost it loads Default Controller
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }

        if($this->_loadExistingController()!=false){
            $this->_callControllerMethod();
        }
    }

    /**
     * (Optional) Set a custom path to controllers
     * @param string $path
     */
    public function setControllerPath($path) {
        $this->_controllerPath = trim($path, '/') . '/';
    }

    /**
     * (Optional) Set a custom path to models
     * @param string $path
     */
    public function setModelPath($path) {
        $this->_modelPath = trim($path, '/') . '/';
    }

    /**
     * (Optional) Set a custom path to the error file
     * @param string $path Use the file name of your controller, eg: error.php
     */
    public function setErrorFile($path) {
        $this->_errorFile = trim($path, '/');
    }

    /**
     * (Optional) Set a custom path to the error file
     * @param string $path Use the file name of your controller, eg: index.php
     */
    public function setDefaultFile($path) {
        $this->_defaultFile = trim($path, '/');
    }

    /**
     * Fetches the $_GET from 'url'
     */
    public function _getUrl() {
        //$url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim(_URLPath, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    /**
     * This loads if there is no GET parameter passed
     */
    private function _loadDefaultController() {
        require $this->_controllerPath . $this->_defaultFile;
        $this->_controller = new Index();
        $this->_controller->index();
    }

    /**
     * Load an existing controller if there IS a GET parameter passed
     * 
     * @return boolean|string
     */
    private function _loadExistingController() {
        $file = $this->_controllerPath . $this->_url[0] . '.php';
        //exit($file);
        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
            return true;
        } else {
            $this->_error();
            return false;
        }
    }

    /**
     * If a method is passed in the GET url paremter
     * 
     *  http://localhost/controller/method/(param)/(param)/(param)
     *  url[0] = Controller
     *  url[1] = Method
     *  url[2] = Param
     *  url[3] = Param
     *  url[4] = Param
     */
    private function _callControllerMethod() {
        $length = count($this->_url);

        // Make sure the method we are calling exists
        if($length>1){
            if ($this->_url[1]=='page') {
                $length=1;
            }
        }
        if ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->_error();
            }
        }

        // Determine what to load
        switch ($length) {
            case 5:
                //Controller->Method(Param1, Param2, Param3)
            $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
            break;

            case 4:
                //Controller->Method(Param1, Param2)
            $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
            break;

            case 3:
                //Controller->Method(Param1, Param2)
            $this->_controller->{$this->_url[1]}($this->_url[2]);
            break;

            case 2:
                //Controller->Method(Param1, Param2)
            $this->_controller->{$this->_url[1]}();
            break;

            default:
            $this->_controller->index();
            break;
        }
    }

    /**
     * Display an error page if nothing exists
     * 
     * @return boolean
     */
    private function _error() {
        $file = $this->_controllerPath . $this->_errorFile;
        $file2 = 'system/base/' . BASE . '/controllers/error.php';
        if (file_exists($file)) {
            require $file;
        }elseif (file_exists($file2)){
            require $file2;
        }else{
            throw new Exception("Imposible cargar lo requerido" . "\n: $file \n: $file2");
        }
        $this->_controller = new Error();
        $this->_controller->index();
        return false;
    }

}