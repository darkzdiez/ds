<div class="more_article" style="padding: 10px;">
    <div class="title_section cufon_myriad">Directorio Ejecutivo</div>
    <?php
    //Llamar Directorios
    $results = DirectoryModel::searchDirectory();
    while ($result = mysql_fetch_array($results['result'], MYSQL_ASSOC)) {
        ?>
        <div style="text-align: center; font-weight: bold; font-size: 18px;"><?php print utf8_encode($result['name']); ?></div>
        <?php
        //Llamar departamentos
        $results2 = DirectoryModel::searchDepartment($result['iddirectory']);
        while ($result2 = mysql_fetch_array($results2['result'], MYSQL_ASSOC)) {
            ?>
            <div style="text-align: left; font-size: 16px; font-weight: bold;"><?php print utf8_encode($result2['name']); ?></div>
            <?php
            //Llamar Encargados
            $results3 = DirectoryModel::searchOffice($result2['iddirectory_department']);
            $inc = 1;
            while ($result3 = mysql_fetch_array($results3['result'], MYSQL_ASSOC)) {
                if ($inc > 1) {
                    print '<br>';
                }
                $inc++;
                ?>
                <div style="text-align: left; font-size: 14px;">
                    <?php print utf8_encode($result3['office']); ?> <span style="font-weight: bold;"><?php print utf8_encode($result3['attendant']); ?></span>
                    <?php if ($result3['phone'] != NULL AND $result3['phone'] != '') { ?><br><strong>Telefono:</strong> <?php print utf8_encode($result3['phone']);
            } ?>
                <?php if ($result3['email'] != NULL AND $result3['email'] != '') { ?><br><strong>Correo Electronico:</strong> <?php print utf8_encode($result3['email']);
                } ?>
                </div>
            <?php } ?>
            <?php if ($result2['address'] != NULL AND $result2['address'] != '') { ?>
                <br><strong>Direccion:</strong> <?php
            print utf8_encode($result2['address']);
        }
            ?>
            <hr>
    <?php } ?>
<?php } ?>
</div>