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
    $results = $this->model->singleShow($this->idGaleria);
    $results2 = $this->model->singleShowMin($this->idGaleria);
    foreach ($results['result'] as $key => $result) {
        $result2 = $results2['result'][$key];
        ?>
        <a href="<?php print PATH_SYSTEM . $result['location'] . $result['filename']; ?>"><img src="<?php print PATH_SYSTEM . $result['location'] . $result2['filename']; ?>" alt="First" title="Adjudicación de cargos gobernación de Yaracuy." /></a>
        <?php
    }
    ?>
</div>
<?php $this->model->singleShow($this->idGaleria); ?>