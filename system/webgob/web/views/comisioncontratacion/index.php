<?php
$resultado=$this->listado['result'];
foreach ($resultado as $key => $value) {
?>
<article>
    <div class="listado_noticias">
        <header>
            <div class="category" itemprop="author">
                <a href="<?php echo URL; ?>comisioncontratacion">Comisión de Contrataciones</a>.
            </div>
            <h3 itemprop="name" class="title"><a href="<?php print PATH_SYSTEM . 'media/ccontrataciones/' . $value['titulo'];?>.pdf"><?php print $value['titulo'];?></a></h3>
        </header>
        <div class="linea"></div>
        <table>
            <tr>
                <td><div class="description" itemprop="description"><?php print $value['denominacion'];?>.</div></td>
            </tr>
        </table>
    </div>
</article>
<?php } ?>