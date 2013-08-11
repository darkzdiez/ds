<?php

/*
 * Model Comment V1
 */

/**
 * Modelo para la manipulacion de Comentarios
 *
 * @author sistemas01
 */
class CommentModel extends Model {

    public static function add($name, $email, $phone, $comment, $date, $article_idarticle) {
        $query = "INSERT INTO `comment`(`name`, `email`, `phone`, `comment`, `date`, `article_idarticle`) VALUES ('" . $name . "','" . $email . "','" . $phone . "','" . $comment . "','" . $date . "','" . $article_idarticle . "')";
        if (database::queryold($query, self::link())) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function search($idcomment) {
        $query = "SELECT * FROM `comment` WHERE `article_idarticle`='" . $idcomment . "' AND `state` = 1 ORDER BY `idcomment` DESC";
//        exit($query);
        if ($result = database::queryold($query, self::link())) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public static function search_for_img($idimg) {
        $query = "SELECT `comment`.`date`,`comment`.`name`,`comment`.`comment` FROM `comment`
LEFT JOIN `article` ON `comment`.`article_idarticle` = `article`.`idarticle` 
LEFT JOIN `file` ON `article`.`main_idfile` = `file`.`idfile` WHERE `file`.`idfile`='" . $idimg . "' AND `state` = 1";
        if ($result = database::queryold($query, self::link())) {
            return $result;
        } else {
            return FALSE;
        }
    }

}

?>
