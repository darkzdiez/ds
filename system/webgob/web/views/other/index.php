<?php
$results = ArticleModel::search($_POST['parameter'], ARTICLE_CATEGORY);
while ($result = mysql_fetch_array($results['result'], MYSQL_ASSOC)) {
    ?>
    <article>
        <div class="listado_noticias">
            <header>
                <div class="category" itemprop="author"><a href="<?php echo URL; ?>noticias/date/<?php
    $dia = explode(' ', $result['date']);
    print $dia[0];
    ?>"><?php print date::format_date($result['date']); ?></a>, <a href="<?php echo URL; ?>noticias/category/<?php print $result['name']; ?>"><?php print $result['name']; ?></a><?php if(array_key_exists('nameuser', $result)){ ?> por <a href="<?php echo URL; ?>noticias/user/<?php print $result['nameuser']; ?>"><?php print $result['nameuser']; ?></a><?php } ?></div>
                <h3 itemprop="name" class="title"><a href="<?php echo URL; ?>noticias/more/<?php echo $result['idarticle'] . '-' . Text::CleanURL($result['title']); ?>"><?php print $result['title']; ?></a></h3>
            </header>
            <div class="linea"></div>
            <table>
                <tr>
                    <?php if ($result['filename'] != NULL) { ?><td><div class="foto"><img itemprop="image" src="<?php print URL . 'img/other/100x100/media/images/news/' . $result['filename']; ?>" alt="<?php print $result['description']; ?>" /></div></td><?php } ?>
                    <td <?php if ($result['filename'] == NULL) {
                    print 'colspan="2"';
                } ?> ><div class="description" itemprop="description"><?php echo $result['summary']; ?></div></td>
                </tr>
            </table>
        </div>
    </article>
<?php } ?>
<div class="container_table_pagination">
<?php
print paginationClass::insert($results['num'], 10);
?>
</div>