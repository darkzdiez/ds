<div class="more_article" style="padding: 10px;">
    <div class="title_section cufon_myriad">Directorio Ejecutivo</div>
    <?php
    //Llamar Directorios
    $results = $this->model->searchDirectory();
    foreach ($results['result'] as $key => $result) {
        ?>
        <div style="text-align: center; font-weight: bold; font-size: 18px;"><?php print ($result['name']); ?></div>
        <?php
        //Llamar departamentos
        $results2 = $this->model->searchDepartment($result['iddirectory']);
        foreach ($results2['result'] as $key => $result2) {
            ?>
            <div style="text-align: left; font-size: 16px; font-weight: bold;"><?php print ($result2['name']); ?></div>
            <?php
            //Llamar Encargados
            $results3 = $this->model->searchOffice($result2['iddirectory_department']);
            $inc = 1;
            foreach ($results3['result'] as $key => $result3) {
                if ($inc > 1) {
                    print '<br>';
                }
                $inc++;
                ?>
                <div style="text-align: left; font-size: 14px;">
                    <?php print ($result3['office']); ?> <span style="font-weight: bold;"><?php print ($result3['attendant']); ?></span>
                    <?php if ($result3['phone'] != NULL AND $result3['phone'] != '') { ?><br><strong>Telefono:</strong> <?php print ($result3['phone']);
            } ?>
                <?php if ($result3['email'] != NULL AND $result3['email'] != '') { ?><br><strong>Correo Electronico:</strong> <?php print ($result3['email']);
                } ?>
                </div>
            <?php } ?>
            <?php if ($result2['address'] != NULL AND $result2['address'] != '') { ?>
                <br><strong>Direccion:</strong> <?php
            print ($result2['address']);
        }
            ?>
            <hr>
    <?php } ?>
<?php } ?>
</div>