<div class="filter">
    <div id="filter_article" class="ui-widget-content">
        <h3 class="ui-widget-header"><a href="#" id="hide_filter_article" class="ui-icon ui-icon-close"></a>Filtro de Busqueda Avanzada</h3>
        <form method="post" name="filter_date_article" id="filter_date_article" enctype="multipart/form-data" name="form1" action="<?php print URL . "noticias/filter"; ?>">
            <table style="text-align: center; width: 90%; margin-left: auto; margin-right: auto;">
                <tr>
                    <td colspan="2" style="font-weight: bold;">Rango de Fecha</td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Desde" id="filter_date_article_start" name="filter_date_article_start" class="filter_date_article calendar"></td>
                    <td><input type="text" placeholder="Hasta" id="filter_date_article_end" name="filter_date_article_end" class="filter_date_article calendar"></td>
                </tr>
                <tr>
                    <td colspan="2"><button class="btm_search" name="search_filter_article">Buscar</button></td>
                </tr>
            </table>
        </form>
    </div>
    <a href="#" id="show_filter_article" class="btm_desplegar">Mostrar Filtro</a>
</div>
<?php
foreach ($this->listadoSimple['array'] as $key => $value) {
    $filenameExplode=explode('/', $value['filename']);
    if(count($filenameExplode)>1){
        $filename=$filenameExplode[1];
    }else{
        $filename=$value['filename'];
    }
    $fileThumb='system/webgob/temp/thumbnail/' . $value['idarticle'] . '-110x70-'.$filename;
    if(!file_exists($fileThumb)){
        $obj = new Thumbnail();
        $thumbnail = $obj->generateThumbnail('system/webgob/'.$value['location'] . $value['idarticle'] . '/' . $filename, $fileThumb, 110, 70);
    }else{
        $thumbnail=$fileThumb;
    }
?>
<article>
    <div class="listado_noticias">
        <header>
            <div class="category" itemprop="author">
                <span class="estiloEnlace"><?php print Date::format_date($value['release_date'], $format = DATE_EXTENDED); ?></span>, <span class="estiloEnlace"><?php print $value['categoryTipe']; ?></span>, <span class="estiloEnlace"><?php print $value['categoryLocation']; ?></span> por <span class="estiloEnlace"><?php print $value['nameuser']; ?></span>
            </div>
            <h3 itemprop="name" class="title"><?php print '<a href="'.PATH_NAV.'noticias/more/'. $value['idarticle'] . '-' . Text::CleanURL($value['title']) . '">' . $value['title'] . '</a>'; ?></h3>
        </header>
        <div class="linea"></div>
        <table>
            <tr>
                <td><div class="foto"><img itemprop="file" src="<?php print DOMAIN.$thumbnail; ?>" alt="<?php @print $result['description']; ?>" /></div></td>
                <td><div class="description" itemprop="description"><?php echo strip_tags($value['summary']); ?></div></td>
            </tr>
        </table>
    </div>
</article>
<?php
}
?>
<div class="container_table_pagination">
<?php
print pagination::insert($this->listadoSimple['num'], 10);
?>
</div>