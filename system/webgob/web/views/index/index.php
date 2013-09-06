<?php error_reporting(0); ?>
<section>
    <div id="containerNewsHome">
        <?php
        $categorySEARCH = array(14, 15);
        foreach ($categorySEARCH as $category) {
            $value=$this->news[$category];
            for ($i=1; $i<=3;$i++) {
                if ($i == 1) {
                    $filenameExplode=explode('/', $value[0]['filename']);
                    if(count($filenameExplode)>1){
                        $filename=$filenameExplode[1];
                    }else{
                        $filename=$value[0]['filename'];
                    }
                    $fileThumb='system/webgob/temp/thumbnail/' . $value[0]['idarticle'] . '-170x170-'.$filename;
                    if(!file_exists($fileThumb)){
                        $obj = new Thumbnail();
                        $thumbnail = $obj->generateThumbnail('system/webgob/'.$value[0]['location'] . $value[0]['idarticle'] . '/' . $filename, $fileThumb, 170, 160);
                    }else{
                        $thumbnail=$fileThumb;
                    }
                    $dia=Date::format_date($value[0]['release_date'], $format = DATETIME_ARRAY);
                    print '<article>'
                    . '<div class="noticias_inicio">'
                    . '<div class="der"></div>'
                    . '<div class="med">'
                    . '<header>'
                    . '<div class="fecha cufon_gudea">' . $dia['day'] . ' ' . $dia['month_compact'] . '<br>0 <a href="'.PATH_NAV.'noticias/more/'. $value[0]['idarticle'] . '-' . Text::CleanURL($value[0]['title']) . '">Comentario</a></div>'
                    . '<h3 class="titulo"><a href="'.PATH_NAV.'noticias/more/'. $value[0]['idarticle'] . '-' . Text::CleanURL($value[0]['title']) . '">' . $value[0]['title'] . '</a></h3>'
                    . '</header>'
                    . '<div class="linea"></div>'
                    . '<div class="foto">';
                    if($thumbnail) {
                        print '<img style="max-height: 170px; max-width: 170px;" alt="" src="'.DOMAIN.$thumbnail.'" class="img_min">';
                    }
                    print '</div>'
                    . '<div class="categoria"><a href="#">' . $value[0]['categoryTipe'] . '</a>, <a href="#">' . $value[0]['categoryLocation'] . '</a> por <a href="#">Prensa</a></div>'
                    . '<p class="descripcion">' . Text::cut(strip_tags($value[0]['summary']), 250, END) . '</p>'
                    . '<div class="leermas"><a href="'.PATH_NAV.'noticias/more/'. $value[0]['idarticle'] . '-' . Text::CleanURL($value[0]['title']) . '">Leer Mas...</a></div>'
                    . '</div>'
                    . '<div class="izq"></div>'
                    . '</div>'
                    . '</article>';
                }
                $filenameExplode=explode('/', $value[$i]['filename']);
                if(count($filenameExplode)>1){
                    $filename=$filenameExplode[1];
                }else{
                    $filename=$value[$i]['filename'];
                }
                $fileThumb1='system/webgob/temp/thumbnail/' . $value[$i]['idarticle'] . '-250x140'.$filename;
                if(!file_exists($fileThumb1[$i])){
                    $obj = new Thumbnail();
                    $thumbnail1 = $obj->generateThumbnail('system/webgob/'.$value[$i]['location'] . $value[$i]['idarticle'] . '/' . $filename, $fileThumb1, 250, 140);
                }else{
                    $thumbnail1 =$fileThumb1;
                }
                $filenameExplode=explode('/', $value[$i+1]['filename']);
                if(count($filenameExplode)>1){
                    $filename=$filenameExplode[1];
                }else{
                    $filename=$value[$i+1]['filename'];
                }
                $fileThumb2='system/webgob/temp/thumbnail/' . $value[$i+1]['idarticle'] . '-250x140'.$filename;
                if(!file_exists($fileThumb2[$i+1])){
                    $obj = new Thumbnail();
                    $thumbnail2 = $obj->generateThumbnail('system/webgob/'.$value[$i+1]['location'] . $value[$i+1]['idarticle'] . '/' . $filename, $fileThumb2, 250, 140);
                }else{
                    $thumbnail2 =$fileThumb2;
                }
                print '<div class="dualContainerTable">'
                . '<table>'
                . '<tbody>'
                . '<tr>'
                . '<td class="first">' . Date::format_date($value[$i]['release_date'], $format = DATE_EXTENDED) . ' en <a href="#">' . $value[$i]['categoryTipe'] . '</a>, <a href="#">' . $value[$i]['categoryLocation'] . '</a></td>'
                . '<td rowspan="5" class="separador"></td>'
                . '<td class="first">' . Date::format_date($value[$i+1]['release_date'], $format = DATE_EXTENDED) . ' en <a href="#">' . $value[$i+1]['categoryTipe'] . '</a>, <a href="#">' . $value[$i+1]['categoryLocation'] . '</a></td>'
                . '</tr>'
                . '<tr>'
                . '<td class="title"><a href="'.PATH_NAV.'noticias/more/'. $value[$i]['idarticle'] . '-' . Text::CleanURL($value[$i]['title']) . '">' . Text::cut(strip_tags(htmlspecialchars_decode($value[$i]['title'])), 60, END) . '</a></td>'
                . '<td class="title"><a href="'.PATH_NAV.'noticias/more/'. $value[$i+1]['idarticle'] . '-' . Text::CleanURL($value[$i+1]['title']) . '">' . Text::cut(strip_tags(htmlspecialchars_decode($value[$i+1]['title'])), 60, END) . '</a></td>'
                . '</tr>'
                . '<tr>'
                . '<td><img style="max-height: 140px; max-width: 250px;" alt="" src="'.DOMAIN.$thumbnail1.'" class="img_min" /></td>'
                . '<td><img style="max-height: 140px; max-width: 250px;" alt="" src="'.DOMAIN.$thumbnail2.'" class="img_min" /></td>'
                . '</tr>'
                . '<tr>'
                . '<td class="summary"><p>' . Text::cut(strip_tags($value[$i]['summary']), 180, END) . '</p></td>'
                . '<td class="summary"><p>' . Text::cut(strip_tags($value[$i+1]['summary']), 180, END) . '</p></td>'
                . '</tr>'
                . '<tr>'
                . '<td class="bottom">0 <a href="'.PATH_NAV.'noticias/more/'. $value[$i]['idarticle'] . '-' . Text::CleanURL($value[$i]['title']) . '">Comentarios</a>, <a href="'.PATH_NAV.'noticias/more/'. $value[$i]['idarticle'] . '-' . Text::CleanURL($value[$i]['title']) . '">Leer Mas...</a></td>'
                . '<td class="bottom">0 <a href="'.PATH_NAV.'noticias/more/'. $value[$i+1]['idarticle'] . '-' . Text::CleanURL($value[$i+1]['title']) . '">Comentarios</a>, <a href="'.PATH_NAV.'noticias/more/'. $value[$i+1]['idarticle'] . '-' . Text::CleanURL($value[$i+1]['title']) . '">Leer Mas...</a></td>'
                . '</tr>'
                . '</tbody>'
                . '</table>'
                . '</div>';
                $i+=1;
            }
        }
        ?>
    </div>
    <div class="ad_container">
        <a href="<?php print PATH_NAV; ?>rindiencuentas"><img src="<?php echo PATH_FILE; ?>public/images/anuncio/3-A-OS-DE-LOGROS.png" width="558" height="107" alt="3 a&ntilde;os de logros" /></a>
    </div>
    <div class="title_section cufon_myriad">Mas Noticias...</div>
    <div id="more_new_home">
        <?php
        $html = '<div class="triple_container new_triple_container">';
        foreach ($this->news['mas'] as $value) {
            $filenameExplode=explode('/', $value['filename']);
            if(count($filenameExplode)>1){
                $filename=$filenameExplode[1];
            }else{
                $filename=$value['filename'];
            }
            $fileThumb='system/webgob/temp/thumbnail/' . $value['idarticle'] . '-180x158'.$filename;
            if(!file_exists($fileThumb)){
                $obj = new Thumbnail();
                $thumbnail = $obj->generateThumbnail('system/webgob/'.$value['location'] . $value['idarticle'] . '/' . $filename, $fileThumb, 180, 158);
            }else{
                $thumbnail =$fileThumb;
            }
            $html .= '<div class="newsMoreHome">';
            $html .= '<a href="'.PATH_NAV.'noticias/more/'. $value['idarticle'].'-Cuba-promover-desde-CELAC-integracin-solidaridad-y-paz-regionales" style="background-image: url(' . "'" . DOMAIN . $thumbnail . "'" . '); display:block;">';
            $html .= '<div class="infoPanel"><span>'.$value['title'].'</span></div>';
            $html .= '</a>';
            $html .= '</div>';
        }
        $html .= '</div>';
        print $html;
        ?>
        
        <script type="text/javascript">
        idLastNews = <?php print $this->idLastNews; ?>;
        </script>
    </div>
    <div class="container_add_more_news_home triple_container active" id="add_more_new_home">
        <img id="loader_gif" src="<?php print PATH_FILE . 'public/images/loader.gif'; ?>" style=" display:none;" alt="Cargando..." />
        <span class="text">Cargar Mas</span>
    </div>
</section>