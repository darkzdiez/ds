<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/default.js');
    }
    function index() {
        $this->view->coverAdShow=TRUE;
        $news=$this->distinctLoadModel('noticias');
        $pNews=$news->buscarDestacada(14);
        $this->view->news[14]=array_merge($pNews,$news->buscarPorCategoria(array(14), 4, array(0 => $pNews[0]['idarticle'])));
        $pNews=$news->buscarDestacada(15);
        $this->view->news[15]=array_merge($pNews,$news->buscarPorCategoria(array(15,16), 4, array(0 => $pNews[0]['idarticle'])));
        foreach ($this->view->news as $value) {
            foreach ($value as $newsVal) {
                $excludeNewsid[]=$newsVal['idarticle'];
            }
        }
        //print '<script type="text/javascript"> excludeNewsid=['.implode($excludeNewsid, ',').']; </script>';
        $this->view->news['mas']=$news->buscarMasExclude($excludeNewsid);
        foreach ($this->view->news['mas'] as $value) {
            $excludeNewsid[]=$value['idarticle'];
        }
        $this->view->idLastNews='['.implode(',', $excludeNewsid).']';
        $this->view->render('index/index');
    }
    function morenews(){
        $excludeNewsid=$_POST['idLastNews'];
        $news=$this->distinctLoadModel('noticias');
        $result=$news->buscarMasExclude($_POST['idLastNews']);
        foreach ($result as $key => $value) {
            $excludeNewsid[]=$value['idarticle'];
            $filenameExplode=explode('/', $value['filename']);
            if(count($filenameExplode)>1){
                $filename=$filenameExplode[1];
            }else{
                $filename=$value['filename'];
            }
            $fileThumb='system/webgob/temp/thumbnail/180x158'.$filename;
            if(!file_exists($fileThumb)){
                $obj = new Thumbnail();
                $result[$key]['filename'] = $obj->generateThumbnail('system/webgob/'.$value['location'] . $value['idarticle'] . '/' . $filename, $fileThumb, 180, 158);
            }else{
                $result[$key]['filename'] = $fileThumb;
            }
        }
        $return[0]=$excludeNewsid;
        $return[1]=$result;
        print json_encode($return);
    }
}
?>
