<?php
class TemplateOrdenes extends Tcpdf {

    public function Header() {
        $this->writeHTML('<table width="" cellspacing="0" cellpadding="0" style="margin: 0; padding: 0px">
    <tbody>
        <tr valign="TOP">
            <td width="80" style="text-align: left;"><img style="width: 60px;" src="' . _pathMODULE . '/views/template/TemplateOrdenes/escudo-de-yaracuy-506x550.jpg"></td>
            <td style="vertical-align: middle; width: 636px;">
                <div style="height: 10px; line-height:1; color: #0000ff; color: #0000ff; text-align: center; margin: 0px; padding: 0px;">
                    <strong>REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
                    GOBIERNO BOLIVARIANO DEL ESTADO YARACUY<br>
                    CUERPO DE INSPECTORES</strong>
                </div>
            </td>
            <td width="80" style="text-align: left;"><img style="width: 60px;" src="' . _pathMODULE . '/views/template/TemplateOrdenes/logo_gob.gif"></td>
        </tr>
    </tbody>
</table><hr>');
    }

    public function Footer() {
        $this->writeHTML('<hr><div style="height: 10px; line-height:1; color: #0000ff; color: #0000ff; text-align: center; margin: 0px; padding: 0px;">
Gobernación del Estado Yaracuy, Cuerpo de Inspectores, 6ta Avenida entre Av. Caracas y calle 9.<br>
Palacio de Gobierno, Planta Baja. Teléfonos: 0254 – 2312591 / 2310744. Ext. 203<br>
Pagina '.$this->getAliasNumPage().' de '.$this->getAliasNbPages().'
</div>');
    }

}