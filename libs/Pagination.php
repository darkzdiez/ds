<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pagination
 *
 * @author sistemas01
 */
class Pagination {

//put your code here
    public static function insert($result, $quantity, $tBootstrap=false) {
        if ($result<20) {
            $result=20;
        }
        $array = explode('/', rtrim($_GET['url'], '/'));
        $bootstrap= new Bootstrap();
        $bootstrap->_getUrl();
        if (in_array('page', $array)) {
            $page = $bootstrap->_url[2];
        } else {
            $page = 1;
        }
        /*
         * si php es mayor a 5.3
         * $CountPage = round($result / $quantity, 0, PHP_ROUND_HALF_UP);
         */
        $CountPage = round($result / $quantity, 0);
        if ($page > 1) {
            $first = 1;
            $previous = $page - 1;
        }
        if ($page < $CountPage) {
            $following = $page + 1;
            $last = $CountPage;
        }
        if ($page > 4) {
            $start = $page - 4;
            $end = $page + 4;
        } else {
            $start = 1;
            $end = 9;
        }
        if ($page > $CountPage - 4) {
            $residue = $CountPage - $page;
            $start = $start - (4 - $residue);
            $end = $page + $residue;
        }
        if ($end > $CountPage) {
            $end = $CountPage;
        }
        if ($start < 1) {
            $start = 1;
        }
        /*if (SYSTEM != '') {
            unset($array[0]);
        }*/
        //exit(print_r($bootstrap->_url));
        if (in_array('page', $array)) {
            array_splice($array, array_search('page', $array));
            $url = PATH_NAV . $bootstrap->_url[0] . '/page/';
        } else {
            $url = PATH_NAV . $bootstrap->_url[0] . '/page/';
        }
        if ($tBootstrap==false) {
        $pagination = '<table class="table_pagination"><tr class="tr_pagination">';
        if ($page > 1) {
            $pagination = $pagination . '<td class="td_pagination_first"><a href="' . $url . $first . '"><<</a></td>';
            $pagination = $pagination . '<td class="td_pagination_previous"><a href="' . $url . $previous . '"><</a></td>';
        }
        for ($index = $start; $index <= $end; $index++) {
            if ($index != $page) {
                $pagination = $pagination . '<td class="td_pagination"><a href="' . $url . $index . '">' . $index . '</a></td>';
            } else {
                $pagination = $pagination . '<td class="td_pagination">' . $index . '</td>';
            }
        }
        if ($page < $end) {
            $pagination = $pagination . '<td class="td_pagination_following"><a href="' . $url . $following . '">></a></td>';
            $pagination = $pagination . '<td class="td_pagination_last"><a href="' . $url . $last . '">>></a></td>';
        }
        $pagination.= '</tr></table>';
        }else{
/*<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>*/
        }
        return $pagination;
    }

    public static function extract($results_per_page) {
        $array = explode('/', $_GET['url']);
        if (in_array('page', $array)) {
            $bootstrap= new Bootstrap();
            $bootstrap->_getUrl();
            $page = $bootstrap->_url[2];
        } else {
            $page = 1;
        }
        return array(($results_per_page * $page) - $results_per_page, $results_per_page);
    }

}

?>