<?php

/*
 * Controller Comment V1
 */

/**
 * Controlador para la manipulacion de Comentarios
 *
 * @author sistemas01
 */
class CommentController extends Controller {

    public function index() {
        
    }

    public static function add() {
        $date = date("Y-m-d H:i:s");
        $idarticle = URLVariablesClass::get('article');
        if (strtoupper($_POST['captcha']) == $_SESSION['captcha']) {
            if (CommentModel::add($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['comment'], $date, $idarticle)) {
                print json_encode(array('contentSuccess' => get_include_contents('site/views/comment/envoy.php')));
            } else {
                print json_encode(array('systemError' => 'Ocurrio un error al enviar el comentario por intente de nuevo'));
            }
        } else {
            print json_encode(array('errorCaptcha' => 'El texto de verificacion es Invalido'));
        }
    }

    public static function search($idcomment) {
        require(MODELS . 'comment_model.php');
        $results = CommentModel::search($idcomment);
        require 'site/views/comment/index.php';
    }

}

?>
