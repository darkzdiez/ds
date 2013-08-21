<?php

class news_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function singleList() {
        $limit = ' LIMIT ' . implode(',', Pagination::extract(10));
        $result['array'] = $this->db->select("SELECT `article`.`idarticle`,`article`.`title`,`article`.`summary`,`article`.`release_date`,`user`.`nameuser`,`article`.`status`, SUM(c.`idcategory`) as 'category', SUM( l.`idcategory`) as 'location'
            FROM article
LEFT JOIN `user` ON `article`.`user_iduser` = `user`.`iduser`
LEFT JOIN `article_has_category` ON `article`.`idarticle` = `article_has_category`.`article_idarticle` 
LEFT JOIN (
SELECT DISTINCT *
FROM `category`
WHERE `category`.`idparent_category`=4
) c
ON `article_has_category`.`category_idcategory` = c.`idcategory`
LEFT JOIN (
SELECT DISTINCT *
FROM `category`
WHERE `category`.`idparent_category`=5
) l
ON `article_has_category`.`category_idcategory` = l.`idcategory`
GROUP BY `article`.`idarticle`
ORDER BY `article`.`idarticle` DESC" . $limit);
        $count = $this->db->select('SELECT COUNT(`idarticle`) as cantidad FROM `article`');
        $result['num'] = $count[0]['cantidad'];
        return $result;
    }

    public function singleSearch($id) {
        return $this->db->select("SELECT `article`.`idarticle`,`article`.`title`,`article`.`summary`,`article`.`content`,DATE(`article`.`date`) as date,`user`.`nameuser`,`article`.`prominent`,`article`.`status`, SUM(c.`idcategory`) as 'category', SUM( l.`idcategory`) as 'location'
FROM article
LEFT JOIN `user` ON `article`.`user_iduser` = `user`.`iduser`
LEFT JOIN `article_has_category` ON `article`.`idarticle` = `article_has_category`.`article_idarticle` 
LEFT JOIN (
SELECT DISTINCT *
FROM `category`
WHERE `category`.`idparent_category`=4
) c
ON `article_has_category`.`category_idcategory` = c.`idcategory`
LEFT JOIN (
SELECT DISTINCT *
FROM `category`
WHERE `category`.`idparent_category`=5
) l
ON `article_has_category`.`category_idcategory` = l.`idcategory`
WHERE `idarticle` = :id
GROUP BY `article`.`idarticle`
ORDER BY `article`.`idarticle` DESC", array(':id' => $id));
    }

    public function listIdCategory($id) {
        return $this->db->select('SELECT `category_idcategory` FROM `article_has_category` WHERE `article_idarticle` = :id', array(':id' => $id));
    }

    public function create($data) {
        $data['status'] = 0;
        $dataNews['title'] = $data['title'];
        $dataNews['summary'] = $data['summary'];
        //$dataNews['content'] = $data['content'];
        $dataNews['date'] = $data['date'];
        $dataNews['release_date'] = date("Y-m-d H:i:s");
        $dataNews['user_iduser'] = Session::get('iduser');
        $dataNews['prominent'] = $data['prominent'];
        $dataNews['status'] = '0';
        if ($this->db->insert('article', $dataNews)) {
            $idNews = $this->db->lastInsertId();
            $category['article_idarticle'] = $idNews;
            $category['category_idcategory'] = $data['category'];
            $location['article_idarticle'] = $idNews;
            $location['category_idcategory'] = $data['location'];
            if ($this->db->insert('article_has_category', $category) AND $this->db->insert('article_has_category', $location)) {
                $data = array('id' => $idNews, 'title' => $dataNews['title'], 'summary' => $dataNews['summary'], 'date' => $dataNews['release_date'], 'user' => Session::get('nameuser'));
                $data['mensaje'] = 'Se a Agregado Correctamente esta Noticia, Procesa a cargar el Cuerpo.';
                $data['idnews']=$idNews;
                $data['fn'] = 'savedNews';
            } else {
                $data = array('result_error' => 'Se ha producido un error al asignar las categorias a la Noticia.');
            }
        } else {
            $data = array('result_error' => 'Se a producido un error al guardar la noticia.');
        }
        echo json_encode($data);
    }
    public function addcontent($data){
        $dataNews['content'] = $data['content'];
        $this->db->update('article', $dataNews, "`idarticle` = {$data['idnews']}");
    }
    public function editSave($data, $id) {
        $dataNews['title'] = $data['title'];
        $dataNews['summary'] = $data['summary'];
        $dataNews['content'] = $data['content'];
        $dataNews['date'] = $data['date'];
        $dataNews['prominent'] = $data['prominent'];
        if ($this->db->update('article', $dataNews, "`idarticle` = {$id}")) {
            $idNews = $id;
            $category['article_idarticle'] = $idNews;
            $category['category_idcategory'] = $data['category'];
            $location['article_idarticle'] = $idNews;
            $location['category_idcategory'] = $data['location'];
            /* Elimino las categorias anteriores */
            $this->db->delete('article_has_category', "`article_idarticle`=$idNews", 10);
            /* Asigno las nuevas categorias */
            if ($this->db->insert('article_has_category', $category) AND $this->db->insert('article_has_category', $location)) {
                $data = array('id' => $idNews, 'title' => $dataNews['title'], 'summary' => $dataNews['summary']);
                $data['messageAction'] = 'Se a Editado Correctamente esta Noticia';
            } else {
                $data = array('result_error' => 'Se ha producido un error al asignar las categorias a la Noticia.');
            }
        } else {
            $data = array('result_error' => 'Se a producido un error al Editar.');
        }
        echo json_encode($data);
    }

    public function disable($id) {
        $postData = array(
            'status' => '0'
        );
        if ($this->db->update('article', $postData, "`idarticle` = $id")) {
            $data = array('messageAction' => 'Se a Desactivado Correctamente esta Noticia');
        } else {
            $data = array('result_error' => 'Se a producido un error al Desactivar.');
        }
        echo json_encode($data);
    }

    public function enable($id) {
        $postData = array(
            'status' => '1'
        );
        if ($this->db->update('article', $postData, "`idarticle` = $id")) {
            $data = array('messageAction' => 'Se a Activado Correctamente esta Noticia');
        } else {
            $data = array('result_error' => 'Se a producido un error al Activar.');
        }
        echo json_encode($data);
    }

}