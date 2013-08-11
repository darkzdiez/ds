/* Conjunto de Scripts
 * Copyright (c) 2013 - Alfonzo Diez (+58 416 753 1889 - alfonzodiez@gmail.com)
 * http://www.diezsoluciones.com/
 * Utilizando en la librería cargarRecursos
 * Created on : 09/01/2013 03:54:14 PM
 * Author     : darkzdiez
 * Revision   : 01
 * La reproducción, utilización, venta y copia no autorizada de alguno de los scripts en este archivo esta prohibida totalmente.
 * The reproduction, use, sell unauthorized copies of any of the scripts in this file is prohibited entirely.
 */

/*
 * Description:
 * 
 */
var cargarObjetos="";
function cargarRecursos() {
    if (!document.getElementById) {
        return;
    }
    var i = 0;
    for (i = 0; i < arguments.length; i++) {
        var archivo = arguments[i];
        var archivoref = "";
        if (cargarObjetos.indexOf(archivo) == -1) {
            if (archivo.indexOf(".js") != -1) {
                archivoref = document.createElement('script');
                archivoref.setAttribute("type", "text/javascript");
                archivoref.setAttribute("src", archivo);
            } else if (archivo.indexOf(".css") != -1) {
                archivoref = document.createElement("link");
                archivoref.setAttribute("rel", "stylesheet");
                archivoref.setAttribute("type", "text/css");
                archivoref.setAttribute("href", archivo);
            }
        }
        if (archivoref != "") {
            document.getElementsByTagName("head").item(0).appendChild(archivoref);
            cargarObjetos += archivo + " ";
        }
    }
}