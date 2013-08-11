<?php
$results = InformacionModels::search('2');
$i = 1;
$j = 0;
while ($result = mysql_fetch_array($results, MYSQL_ASSOC)) {
    if ($result['cantidad'] > 0) {
        if ($i == 1) {
            $i = 2;
            $add_class = '';
        } else {
            $i = 1;
            $add_class = ' right';
        }
        ?>
        <div id="containerInformacion<?php print $result['idcategory']; ?>" class="mini_container<?php print $add_class; ?>">
            <div class="title_section cufon_myriad"><?php print ucfirst($result['name']); ?></div>
            <ul style="overflow:hidden;">
                <?php
                $results_more = ArticleModel::search($result['idcategory'], ARTICLE_CATEGORY);
                $j = 1;
                while ($result_more = mysql_fetch_array($results_more['result'], MYSQL_ASSOC)) {
                    if ($j <= 9) {
                        ?>
                        <li><div><a href="<?php echo URL; ?>noticias/more/<?php echo $result_more['idarticle'] . '-' . Text::CleanURL($result_more['title']); ?>"><?php print $result_more['title']; ?></a></div></li>
                        <?php
                        $j++;
                    }
                }
                ?>
            </ul>
            <div class="more"><a href="#mas" onclick="moreContent('containerInformacion<?php print $result['idcategory']; ?>')">Mas...</a></div>
        </div>
        <?php
    }
}
?>