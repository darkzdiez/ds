<h1>Bienes</h1>
<p class="buttonbar">
    <a href="#" class="ui-state-default button_ui buttonbar_show" alt="add_goods">
        <span class="ui-icon ui-icon-plus"></span>
        Agregar Bien
    </a>
</p>
<form id="add_goods" action="<?php echo URL; ?>goods/xhrInsert/" method="post" class="ajaxForm" style="display: none;">
    <fieldset>
        <legend>Datos del Bien:</legend>

        <div class="container_input_label">
            <label>Nombre del Articulo</label>
            <input type="text" name="name_article" />
        </div>
        <div class="container_input_label">
            <label>Codigo de Inventario</label>
            <input type="text" name="cod_inventory" />
        </div>
        <div class="container_input_label">
            <label>Marca</label>
            <input type="text" name="mark" />
        </div>
        <div class="container_input_label">
            <label>Modelo</label>
            <input type="text" name="model" />
        </div>
        <div class="container_input_label">
            <label>Serial</label>
            <input type="text" name="serial" />
        </div>
        <div class="container_input_label">
            <label>Color</label>
            <input type="text" name="color" />
        </div>
        <div class="container_input_label">
            <label>Categoria</label>
            <select name="category">
                <option value="1">Mobiliario</option>
                <option value="2">Equipo de Tecnologia</option>
            </select>
        </div>

    </fieldset>
    <fieldset>
        <legend>Datos del Proveedor:</legend>

        <div class="container_input_label">
            <label>Nombre</label>
            <input type="text" name="name_vendor" />
        </div>
        <div class="container_input_label">
            <label>Rif</label>
            <input type="text" name="rif" />    
        </div>
        <div class="container_input_label">
            <label>N&deg; de Orden de Compra</label>
            <input type="text" name="order_buy" />
        </div>

    </fieldset>
    <fieldset>
        <legend>Datos del Encargado y Ubicacion:</legend>

        <div class="container_input_label">
            <label>Departamento</label>
            <input type="text" name="department" />
        </div>
        <div class="container_input_label">
            <label>Dependencia</label>
            <input type="text" name="dependence" />
        </div>
        <div class="container_input_label">
            <label>Cedula Encargado</label>
            <input type="text" name="cedula" />
        </div>
        <div class="container_input_label">
            <label>Nombre Encargado</label>
            <input type="text" name="manager_name" />
        </div>

    </fieldset>
    <fieldset>
        <legend>Datos Contables:</legend>

        <div class="container_input_label">
            <label>Concepto de Adquisicion</label>
            <input type="text" name="concept_acquisition" />
        </div>
        <div class="container_input_label">
            <label>Fecha de Adquisicion</label>
            <input type="text" name="date_acquisition" />
        </div>
        <div class="container_input_label">
            <label>Precio Unitario</label>
            <input type="text" name="price" />
        </div>
        <div class="container_input_label">
            <label>Numero de Factura</label>
            <input type="text" name="num_bill" />
        </div>

    </fieldset>
    <div class="container-buttons">
        <div class="container-buttons">
            <label>&nbsp;</label>
            <button class="ui-state-default button_ui buttonbar_close" alt="add_goods" type="submit">
                <span class="ui-icon ui-icon-disk"></span>
                Agregar Bien
            </button>
            <button class="ui-state-default button_ui buttonbar_close" alt="add_goods" type="reset">
                <span class="ui-icon ui-icon-close"></span>
                Cerrar
            </button><br />
            <hr>
        </div>
    </div>
</form>
<form id="filter_goods" action="<?php echo URL; ?>goods/xhrSearch/" method="post" class="ajaxForm" style="display: inline-block; width: 100%;">
    <fieldset>
        <legend>Reportes:</legend>
        <div class="container_input_label">
            <label>Categoria</label>
            <select name="category">
                <option value="0">Todos</option>
                <option value="1">Mobiliario</option>
                <option value="2">Equipo de Tecnologia</option>
            </select>
        </div>
        <div class="container_input_label">
            <label>Status</label>
            <select name="status">
                <option value="1">Activo</option>
                <option value="admin">Desincorporado</option>
            </select>
        </div>
    </fieldset>
    <fieldset class="tblFooters">
            <button class="ui-state-default button_ui buttonbar_close" alt="add_goods" type="submit">
                <span class="ui-icon ui-icon-search"></span>
                Generar
            </button>
    </fieldset>
</form>
<table id="list-goods" class="ui-widget ui-widget-content table-content">
    <thead>
        <tr class="ui-widget-header ">
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th></th>
        </tr>
    </thead>
    <tbody><?php
foreach ($this->goodsList as $key => $value) {
   ?>
        <tr>
            <td><?php print $value['name_article']; ?></td>
            <td><?php print $value['mark']; ?></td>
            <td><?php print $value['model']; ?></td>
                <?php
                print '<td>
                        <a href="' . URL . 'goods/edit/' . $value['idgoods'] . '">Editar</a>
                        <a href="' . URL . 'goods/edit/' . $value['idgoods'] . '">Agregar Observacion</a>
                     <a href="' . URL . 'goods/del/' . $value['idgoods'] . '">Desincorporar</a></td>';
                print '</tr>';
            }
            ?></tbody>
</table>