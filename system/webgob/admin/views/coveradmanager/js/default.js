/* Conjunto de Scripts
 * Copyright (c) 2013 - Alfonzo Diez (+58 416 753 1889 - alfonzodiez@gmail.com)
 * http://www.diezsoluciones.com/
 * Utilizando en la librería default
 * Created on : 10/01/2013 09:12:26 AM
 * Author     : alfonzo
 * Revision   : 01
 * La reproducción, utilización, venta y copia no autorizada de alguno de los scripts en este archivo esta prohibida totalmente.
 * The reproduction, use, sell unauthorized copies of any of the scripts in this file is prohibited entirely.
*/

/*
 * Description:
 * 
 */

$(document).ready( function(){
    $('.toptitle').contarCaracteres();
    $('.title').contarCaracteres();
    $('.description').contarCaracteres();
    $(".state").on({
        click: function(){
            pointer=this;
            var id=$(pointer).attr('ref');
            ajaxLoader();
            if($(pointer).hasClass('disable')){
                url=PATH_NAV+'coveradmanager/disable/'+id;
                text='Activar';
                addClass='enable';
                removeClass='disable';
            }else if($(pointer).hasClass('enable')){
                url=PATH_NAV+'coveradmanager/enable/'+id;
                text='Desactivar';
                addClass='disable';
                removeClass='enable';
            }
            $.ajax({ 
                type: "GET",
                dataType: 'json',
                url: url,
                success: function(data){
                    ajaxLoaderClose();
                    if(typeof data.result_error == "undefined" || data.result_error==false){
                        $(pointer).text(text);
                        $(pointer).removeClass(removeClass);
                        $(pointer).addClass(addClass);
                        fdialog(null,data.messageAction,'success');
                        tableContent();
                    }else{
                        fdialog(null,data.result_error,'message');
                    }
                }
            });
        }
    });
    var count = 0;
    $(".edit").on({
        click: function(){
            pointer=this;
            var id=$(pointer).attr('ref');
            if($(pointer).hasClass('close')){
                resetButtonEdit();
                ajaxLoader();
                url=PATH_NAV+'coveradmanager/edit/'+id;
                text='Cerrar';
                addClass='open';
                removeClass='close';
                $.ajax({ 
                    type: "GET",
                    dataType: 'html',
                    url: url,
                    success: function(data){
                        ajaxLoaderClose();
                        $('.addedTr').remove();
                        $(pointer.parentNode.parentNode).after('<tr class="addedTr"><td colspan="5">'+data+'</td></tr>');
                        $("#list-coveradmanager .buttonbar_close").on({
                            click: function(){
                                if($(this).attr("type")==="submit"){
                                    ajaxLoader();
                                    var url = $(this).parents("form").attr('action');
                                    var data = $(this).parents("form").serialize();
                                    $.ajax({ 
                                        type: "POST",
                                        url: url,
                                        dataType: 'json',
                                        enctype: 'multipart/form-data',
                                        data: data,
                                        success: function(data){
                                            ajaxLoaderClose();
                                            if(typeof data.result_error == "undefined" || data.result_error==false){
                                                fdialog(null,data.messageAction,'success');
                                                $(pointer.parentNode).prev().prev().text(data.titulo);
                                                $(pointer.parentNode).prev().text(data.denominacion);
                                            }else{
                                                fdialog(null,data.result_error,'message');
                                            }
                                        }
                                    });
                                }
                                text='Editar';
                                addClass='close';
                                removeClass='open';
                                $(pointer).text(text);
                                $(pointer).removeClass(removeClass);
                                $(pointer).addClass(addClass);
                                var nextPointer=pointer.parentNode.parentNode.nextSibling;
                                if($(nextPointer).hasClass('addedTr')){
                                    $(nextPointer).remove();
                                }
                            }
                        });
                    }
                });
            }else{
                url=PATH_NAV+'coveradmanager/enable/'+id;
                text='Editar';
                addClass='close';
                removeClass='open';
                var nextPointer=pointer.parentNode.parentNode.nextSibling;
                if($(nextPointer).hasClass('addedTr')){
                    $(nextPointer).remove();
                }
            }
            $(pointer).text(text);
            $(pointer).removeClass(removeClass);
            $(pointer).addClass(addClass);
        }
    });
})
function resetButtonEdit(){
    var text='Editar';
    var addClass='close';
    var removeClass='open';
    var pointer=$('.edit.open');
    $(pointer).text(text);
    $(pointer).removeClass(removeClass);
    $(pointer).addClass(addClass);
}
function resultSubmitCoverAd(data){
    ajaxLoaderClose();
    if(typeof data.result_error == "undefined" || data.result_error==false){
        fdialog(null,data.messageAction,'success');
        $(pointer.parentNode).prev().prev().text(data.titulo);
        $(pointer.parentNode).prev().text(data.denominacion);
    }else{
        fdialog(null,data.result_error,'message');
    }
    var nextPointer=pointer.parentNode.parentNode.nextSibling;
}
