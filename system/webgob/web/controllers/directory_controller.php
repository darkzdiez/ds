<?php

class DirectoryController extends Controller {

    public function index() {
        $_POST['TITLE_WEBSITE'] = 'Directorio Ejecutivo en ' . TITLE_WEBSITE;
        $this->view->render('directory/index.php');
    }

}

?>