<div class="filter">
    <div id="filter_article" class="ui-widget-content">
        <h3 class="ui-widget-header"><a href="#" id="hide_filter_article" class="ui-icon ui-icon-close"></a>Filtro de Busqueda Avanzada</h3>
        <form method="post" enctype="multipart/form-data" name="filter_date_article" id="filter_date_article_start" action="<?php print URL . "noticias/filter"; ?>">
            <table style="text-align: center; width: 90%; margin-left: auto; margin-right: auto;">
                <tr>
                    <td colspan="2" style="font-weight: bold;">Rango de Fecha</td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Desde" id="filter_date_article_start" name="filter_date_article_start" class="filter_date_article calendar" value="<?php @print $_POST['filter_date_article_start']; ?>"></td>
                    <td><input type="text" placeholder="Hasta" id="filter_date_article_end" name="filter_date_article_end" class="filter_date_article calendar" value="<?php @print $_POST['filter_date_article_end']; ?>"></td>
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
$results = ArticleModel::search('4-5', ARTICLE_IMG_CATEGORY);
while ($result = mysql_fetch_array($results['result'], MYSQL_ASSOC)) {
    ?>
    <article>
        <div class="listado_noticias">
            <header>
                <div class="category" itemprop="author">
                    <a href="<?php echo URL; ?>noticias/date/<?php
    $dia = explode(' ', $result['date']);
    print $dia[0];
    ?>"><?php print date::format_date($result['date']); ?></a>, <a href="<?php echo URL; ?>noticias/category/<?php print $result['name']; ?>"><?php print $result['name']; ?></a> por <a href="<?php echo URL; ?>noticias/user/<?php print $result['nameuser']; ?>"><?php print $result['nameuser']; ?></a>
                </div>
                <h3 itemprop="name" class="title"><a href="<?php echo URL; ?>noticias/more/<?php echo $result['idarticle'] . '-' . Text::CleanURL($result['title']); ?>"><?php print $result['title']; ?></a></h3>
            </header>
            <div class="linea"></div>
            <table>
                <tr>
                    <td><div class="foto"><img itemprop="file" src="<?php print URL . 'img/other/100x100/media/images/news/' . $result['filename']; ?>" alt="<?php print $result['description']; ?>" /></div></td>
                    <td><div class="description" itemprop="description"><?php echo $result['summary']; ?></div></td>
                </tr>
            </table>
        </div>
        <div class="noticia_social"><div class="google"><div class="g-plusone" data-size="medium"></div></div><a name="fb_share" href="<?php echo URL; ?>noticias/<?php echo $result['idarticle'] . '-' . str_replace(' ', '-', $result['title']); ?>">Compartir</a> </div>
    </article>
<?php } ?>
<div class="container_table_pagination">
    <?php
    print paginationClass::insert($results['num'], 10);
    ?>
</div>