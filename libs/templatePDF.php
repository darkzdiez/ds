<?php
/*
    ESTE ES UN TEMPALTE DE EJEMPLO ESTE ARCHIVO DEBE SER GUARDADO EM LA CARPETA TEMPLATE LOCAL
*/
class templatePDF extends Tcpdf {

    public function Header() {
        $this->writeHTML('<table width="" cellspacing="0" cellpadding="0" style="margin: 0; padding: 0px">
    <tbody>
        <tr valign="TOP">
            <td width="80" style="text-align: left;"><img style="width: 60px;" src="libs/tcpdf/images/report_cucey/escudo-de-yaracuy-506x550.jpg"></td>
            <td style="vertical-align: middle; width: 420px;">
                <div style="height: 10px; line-height:1; color: #0000ff; color: #0000ff; text-align: center; margin: 0px; padding: 0px;">
                    <strong>REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
                    GOBIERNO BOLIVARIANO DEL ESTADO YARACUY<br>
                    COMISIÓN ÚNICA DE CONTRATACIONES DE OBRAS</strong>
                </div>
            </td>
            <td width="80" style="text-align: left;"><img style="width: 60px;" src="libs/tcpdf/images/report_cucey/iciNzg.png"></td>
        </tr>
    </tbody>
</table><hr>');
    }

    public function Footer() {
        $this->writeHTML('<hr><div style="height: 10px; line-height:1; color: #0000ff; color: #0000ff; text-align: center; margin: 0px; padding: 0px;">
Gobernación del Estado Yaracuy, Comisión Única de Contrataciones, Avenida Libertador con Av. Caracas.<br>
Edificio Administrativo, Piso 3. Teléfonos: 0254 – 2312591 / 2310744. Ext. 203<br>
Pagina '.$this->getAliasNumPage().' de '.$this->getAliasNbPages().'
</div>');
    }

}