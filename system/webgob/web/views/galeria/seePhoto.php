<script type="text/javascript">
    $(document).ready(function(){
        $(".yoxview").yoxview({
            lang: "en",
            autoPlay: true
        });
    });
</script>
<div class="thumbnails yoxview">
    <?php
    $results = GaleriaModel::singleShow();
    $results2 = GaleriaModel::singleShowMin();
    while ($result = mysql_fetch_array($results['result'], MYSQL_ASSOC)) {
        $result2 = mysql_fetch_array($results2['result'], MYSQL_ASSOC)
        ?>
        <a href="<?php print URL . $result['location'] . $result['filename']; ?>"><img src="<?php print URL . $result['location'] . $result2['filename']; ?>" alt="First" title="Adjudicación de cargos gobernación de Yaracuy." /></a>
        <?php
    }
    ?>
</div>
<?php GaleriaModel::singleShow(); ?>