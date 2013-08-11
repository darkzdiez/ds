<?php

class informacion_Model extends Model {

    public static function search($idsearch) {
        $query = "SELECT `category`.`idcategory`,`category`.`name`,`category`.`idparent_category`, COUNT(`article_has_category`.`article_idarticle`) as 'cantidad' FROM category
LEFT JOIN `article_has_category` ON `category`.`idcategory` = `article_has_category`.`category_idcategory` WHERE `category`.`idparent_category` = '" . $idsearch . "' GROUP BY `category`.`idcategory`";
        return database::queryold($query, self::link());
    }

}

?>
