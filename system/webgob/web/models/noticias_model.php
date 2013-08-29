<?php

define('ARTICLE_CHILDREN_CATEGORY', 1);
define('ARTICLE_EXCLUDE_ARRAY', 2);

class noticias_Model extends Model {

    public function searchArticleOld($parameter, $looking = ARTICLE_CHILDREN_CATEGORY) {
        if ($looking == 1) {
            $query = "SELECT `article`.`idarticle`,`article`.`title`,`article`.`summary`,`article`.`date`,`article_has_category`.`category_idcategory`,`file_location`.`location`,`file`.`idfile` ,`file`.`filename` ,`file`.`mark` FROM article
LEFT JOIN `file` ON `article`.`main_idfile` = `file`.`idfile`
LEFT JOIN `article_has_category` ON `article`.`idarticle` = `article_has_category`.`article_idarticle`
LEFT JOIN `file_location` ON `file`.`file_location_idfile_location` = `file_location`.`idfile_location` WHERE `article`.`status`=1 AND `category_idcategory`='" . $parameter . "' ORDER BY `article`.`idarticle` DESC LIMIT 0,3";
        } elseif ($looking == 2) {
            $parameter = implode("' AND `article`.`idarticle`<>'", $parameter);
            $parameter = "`article`.`idarticle`<>'" . $parameter . "'";
            $query = "SELECT `article`.`idarticle`,`article`.`title`,`article`.`summary`,`article`.`date`,`article_has_category`.`category_idcategory`,`file_location`.`location`,`file`.`idfile` ,`file`.`filename` ,`file`.`mark`
                FROM `article`
LEFT JOIN `file` ON `article`.`main_idfile` = `file`.`idfile`
LEFT JOIN `article_has_category` ON `article`.`idarticle` = `article_has_category`.`article_idarticle`
LEFT JOIN `file_location` ON `file`.`file_location_idfile_location` = `file_location`.`idfile_location` WHERE `article`.`status`=1 AND " . $parameter . " AND (`article_has_category`.`category_idcategory`=14 OR `article_has_category`.`category_idcategory`=15 OR `article_has_category`.`category_idcategory`=16) GROUP BY `article`.`idarticle` ORDER BY `article`.`idarticle` DESC LIMIT 0,3";
        }
        if (isset($query) AND $result = $this->db->select($query)) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function search_category($parameter) {
        $query = "SELECT `category`.`name` FROM category
LEFT JOIN `article_has_category` ON `category`.`idcategory` = `article_has_category`.`category_idcategory` WHERE `article_has_category`.`article_idarticle`='" . $parameter . "'";
        if ($result['result'] = database::queryold($query, self::link())) {
            $result['num'] = mysql_num_rows(database::queryold($query, self::link()));
            return $result;
        } else {
            return FALSE;
        }
    }
public function busquedaSimple($idarticle){
    $result = $this->db->select("SELECT `article`.`idarticle`, `article`.`release_date`,`article`.`title`,`article`.`summary`,`article`.`content`,`article`.`date`,
    `category`.`idcategory` as 'categoryIdLocation',`category`.`name` as 'categoryLocation',
    (SELECT `category`.`idcategory`
    FROM `category`,`article_has_category` ahc
    WHERE `category`.`idcategory`=ahc.`category_idcategory`
    AND `category`.`idparent_category`=4
    AND ahc.`article_idarticle`=`article`.`idarticle`
    LIMIT 0,1) as 'categoryIdTipe',
     (SELECT `category`.`name`
    FROM `category`,`article_has_category` ahc
    WHERE `category`.`idcategory`=ahc.`category_idcategory`
    AND `category`.`idparent_category`=4
    AND ahc.`article_idarticle`=`article`.`idarticle`
    LIMIT 0,1) as 'categoryTipe'
    FROM `article`,`article_has_category`,`category`
    WHERE `article`.`idarticle`=`article_has_category`.`article_idarticle`
    AND `category`.`idcategory`=`article_has_category`.`category_idcategory`
    AND `article`.`idarticle`=:idarticle
    AND `article`.`status`=1
    LIMIT 1,1",array(':idarticle'=>$idarticle));
        return $result;
}
    public function buscarDestacada($category = 14) {
        $limit = ' LIMIT 0,1';
        $result = $this->db->select("SELECT `article`.`idarticle`, `article`.`release_date`,`article`.`title`,`article`.`summary`,
        `category`.`idcategory` as 'categoryIdLocation',`category`.`name` as 'categoryLocation',
        `file`.`filename`,
        `file_location`.`location`,
        (SELECT `category`.`idcategory`
        FROM `category`,`article_has_category` ahc
        WHERE `category`.`idcategory`=ahc.`category_idcategory`
        AND `category`.`idparent_category`=4
        AND ahc.`article_idarticle`=`article`.`idarticle`
        LIMIT 0,1) as 'categoryIdTipe',
         (SELECT `category`.`name`
        FROM `category`,`article_has_category` ahc
        WHERE `category`.`idcategory`=ahc.`category_idcategory`
        AND `category`.`idparent_category`=4
        AND ahc.`article_idarticle`=`article`.`idarticle`
        LIMIT 0,1) as 'categoryTipe'
        FROM `article`,`article_has_category`,`category`,`file`,`file_location`
        WHERE `article`.`idarticle`=`article_has_category`.`article_idarticle`
        AND `category`.`idcategory`=`article_has_category`.`category_idcategory`
        AND `article_has_category`.`category_idcategory`=:idcategory
        AND `article`.`main_idfile`=`file`.`idfile`
        AND `file`.`file_location_idfile_location`=`file_location`.`idfile_location`
        AND `article`.`status`=1
        AND `article`.`prominent`=1
        ORDER BY `article`.`idarticle` DESC" . $limit,array(':idcategory'=>$category));
        return $result;
    }
    public function buscarPorCategoria($category, $limit = 3, $arrayExclude) {
        $exclude = implode("' AND `article`.`idarticle`<>'", $arrayExclude);
        $exclude = " AND `article`.`idarticle`<>'" . $exclude . "'";
        $bcategory = implode("' OR `article_has_category`.`category_idcategory`='", $category);
        $bcategory = " AND (`article_has_category`.`category_idcategory`='" . $bcategory . "')";
        $limit = ' LIMIT 0,' . $limit;
        $result = $this->db->select("SELECT `article`.`idarticle`, `article`.`release_date`,`article`.`title`,`article`.`summary`,
        `category`.`idcategory` as 'categoryIdLocation',`category`.`name` as 'categoryLocation',
        `file`.`filename`,
        `file_location`.`location`,
        (SELECT `category`.`idcategory`
        FROM `category`,`article_has_category` ahc
        WHERE `category`.`idcategory`=ahc.`category_idcategory`
        AND `category`.`idparent_category`=4
        AND ahc.`article_idarticle`=`article`.`idarticle`
        LIMIT 0,1) as 'categoryIdTipe',
         (SELECT `category`.`name`
        FROM `category`,`article_has_category` ahc
        WHERE `category`.`idcategory`=ahc.`category_idcategory`
        AND `category`.`idparent_category`=4
        AND ahc.`article_idarticle`=`article`.`idarticle`
        LIMIT 0,1) as 'categoryTipe'
        FROM `article`,`article_has_category`,`category`,`file`,`file_location`
        WHERE `article`.`idarticle`=`article_has_category`.`article_idarticle`
        AND `category`.`idcategory`=`article_has_category`.`category_idcategory`
        ".$exclude."
        ".$bcategory."
        AND `article`.`main_idfile`=`file`.`idfile`
        AND `file`.`file_location_idfile_location`=`file_location`.`idfile_location`
        AND `article`.`status`=1
        ORDER BY `article`.`idarticle` DESC" . $limit);
        return $result;
    }

    public function buscarMasExclude($arrayExclude, $limit = 3){
        $exclude = implode("' AND `article`.`idarticle`<>'", $arrayExclude);
        $exclude = " AND `article`.`idarticle`<>'" . $exclude . "'";
        $limit = ' LIMIT 0,' . $limit;
        $result = $this->db->select("SELECT `article`.`idarticle`,`article`.`title`,`article`.`summary`,
        `category`.`idcategory` as 'categoryIdLocation',`category`.`name` as 'categoryLocation',
        `file`.`filename`,
        `file_location`.`location`,
        (SELECT `category`.`idcategory`
        FROM `category`,`article_has_category` ahc
        WHERE `category`.`idcategory`=ahc.`category_idcategory`
        AND `category`.`idparent_category`=4
        AND ahc.`article_idarticle`=`article`.`idarticle`
        LIMIT 0,1) as 'categoryIdTipe',
         (SELECT `category`.`name`
        FROM `category`,`article_has_category` ahc
        WHERE `category`.`idcategory`=ahc.`category_idcategory`
        AND `category`.`idparent_category`=4
        AND ahc.`article_idarticle`=`article`.`idarticle`
        LIMIT 0,1) as 'categoryTipe'
        FROM `article`,`article_has_category`,`category`,`file`,`file_location`
        WHERE `article`.`idarticle`=`article_has_category`.`article_idarticle`
        AND `category`.`idcategory`=`article_has_category`.`category_idcategory`
        ".$exclude."
        AND `article`.`main_idfile`=`file`.`idfile`
        AND `file`.`file_location_idfile_location`=`file_location`.`idfile_location`
        AND `article`.`status`=1
        GROUP BY `article`.`idarticle`
        ORDER BY `article`.`idarticle` DESC" . $limit);
        return $result;
    }

    public function listadoSimple() {
        $limit = ' LIMIT ' . implode(',', Pagination::extract(10));
        $result['array'] = $this->db->select("SELECT `article`.`idarticle`, `article`.`release_date`,`article`.`title`,`article`.`summary`,
`user`.`nameuser`,
`file`.`filename`,
`file_location`.`location`,
(SELECT `category`.`idcategory`
FROM `category`,`article_has_category` ahc
WHERE `category`.`idcategory`=ahc.`category_idcategory`
AND `category`.`idparent_category`=5
AND ahc.`article_idarticle`=`article`.`idarticle`
LIMIT 0,1) as 'categoryIdLocation',
 (SELECT `category`.`name`
FROM `category`,`article_has_category` ahc
WHERE `category`.`idcategory`=ahc.`category_idcategory`
AND `category`.`idparent_category`=5
AND ahc.`article_idarticle`=`article`.`idarticle`
LIMIT 0,1) as 'categoryLocation',
(SELECT `category`.`idcategory`
FROM `category`,`article_has_category` ahc
WHERE `category`.`idcategory`=ahc.`category_idcategory`
AND `category`.`idparent_category`=4
AND ahc.`article_idarticle`=`article`.`idarticle`
LIMIT 0,1) as 'categoryIdTipe',
 (SELECT `category`.`name`
FROM `category`,`article_has_category` ahc
WHERE `category`.`idcategory`=ahc.`category_idcategory`
AND `category`.`idparent_category`=4
AND ahc.`article_idarticle`=`article`.`idarticle`
LIMIT 0,1) as 'categoryTipe'
FROM `article`,`file`,`file_location`,`user`
WHERE `article`.`main_idfile`=`file`.`idfile`
AND `article`.`user_iduser`=`user`.`iduser`
AND `file`.`file_location_idfile_location`=`file_location`.`idfile_location`
AND `article`.`status`=1
GROUP BY `article`.`idarticle` DESC" . $limit);
        $count = $this->db->select('SELECT COUNT(`idarticle`) as cantidad FROM `article`');
        $result['num'] = $count[0]['cantidad'];
        return $result;
    }
    public function test(){
        $tabla=array(
            'article' => array('title','summary','content'),
            'category' => array('name'),
            'ccontrataciones' => array('articulo','denominacion','lugar','info','lugarsobres'),
            );
        foreach ($tabla as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                $sql="UPDATE `$key1` SET `$value2` = CONVERT(BINARY CONVERT(`$value2` USING latin1) USING utf8)";
                $this->db->select($sql);
            }
        }
    }

}
?>