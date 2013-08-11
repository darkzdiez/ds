<?php

class Controller {

    function __construct() {
        //echo 'Main controller<br />';
        $this->view = new View();
    }

    /**
     * 
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadModel($name, $modelPath = 'models/') {
        $path = $modelPath . $name . '_model.php';
        if (file_exists($path)) {
            require_once $modelPath . $name . '_model.php';

            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }

    public function distinctLoadModel($name, $modelPath = '/models/') {
        $path = _pathMODULE . $modelPath . $name . '_model.php';
        if (file_exists($path)) {
            require_once $path;
            $modelName = $name . '_Model';
            return new $modelName();
        }
    }
    public function systemLoadModel($name, $modelPath = '/models/') {
        $path = _pathActiveSYSTEM . $modelPath . $name . '_model.php';
        if (file_exists($path)) {
            require_once $path;
            $modelName = $name . '_Model';
            return new $modelName();
        }
    }

}