/*function return_module(data) {
    ajaxLoaderClose();
    if(typeof data.result_error == "undefined" || data.result_error==false){
        fdialog(null,data.messageAction,'success', data.locationAction);
        $('#list-news tbody').prepend('<tr><td>' + data.title + '</td><td>' + data.summary + '</td><td>' + data.date + '</td><td>' + data.user + '</td><td><div ref="' + data.id + '" class="styleLink edit close">Editar</div> <div ref="' + data.id + '" class="styleLink images close">Imagenes</div> <div ref="' + data.id + '" class="styleLink state enable">Activar</div></td></tr>');
        tableContent();   
    }else{
        fdialog(null,data.result_error,'message');
    }
}*/
function listarPortadas(){
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: PATH_NAV + 'news/listarportadas',
        success : function(data){
            ihtml='';
            $.each(data, function(i, item){
                ihtml += '<tr>'
                    + '<td>' + item.titlecover + '</td>'
                    + '<td>' + item.titlearticle + '</td>'
                    + '<td><div class="btn btn-primary" onclick="asignarPortada(' + item.idcover + ')"><i class="icon icon-check"></i> Seleccionar</div></td>'
                + '</tr>';
            });
            $('#listaPortadas tbody').html(ihtml);
        }
    });
}
function asignarPortada(val){
    $.ajax({
        type: 'POST',
        data: {
            'idcover': val
        },
        dataType: 'json',
        url: PATH_NAV + 'news/asignarportada',
        success : function(data){
            alert(val+data.hola);
        }
    });
}
function setTinymce(){
    tinymce.init({
        selector: ".tinymce",
        language : "es",
        //relative_urls : false,
        //content_css : "",
        //convert_urls : false,
        plugins: [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime table contextmenu paste jbimages"
        ],
        toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages"
    });
}
$(document).ready(function() {
    listarPortadas();
    fecha_alt();
    setTinymce();
    $(".state").on({
        click: function(){
            pointer=this;
            var id=$(pointer).attr('ref');
            ajaxLoader();
            if($(pointer).hasClass('disable')){
                url=PATH_NAV+'news/disable/'+id;
                text='Activar';
                addClass='enable';
                removeClass='disable';
            }else if($(pointer).hasClass('enable')){
                url=PATH_NAV+'news/enable/'+id;
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
            resetButtonImages();
            var id=$(pointer).attr('ref');
            if($(pointer).hasClass('close')){
                resetButtonEdit();
                ajaxLoader();
                url=PATH_NAV+'news/edit/'+id;
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
                        setTinymce();
                        fecha_alt();
                        $("#list-news .buttonbar_close").on({
                            click: function(){
                                if($(this).attr("type")==="submit"){
                                    if(typeof tinyMCE == 'object'){
                                        tinyMCE.triggerSave();
                                    }else{
                                        console.log('tinyMCE: No Existe');
                                    }
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
                url=PATH_NAV+'news/enable/'+id;
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
    $(".images").on({
        click: function(){
            pointer=this;
            var id=$(pointer).attr('ref');
            resetButtonEdit();
            if($(pointer).hasClass('close')){
                resetButtonImages();
                ajaxLoader();
                url=PATH_NAV+'news/images/'+id;
                text='X Imagenes';
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
                        actionImg();
                        setTinymce();
                        fecha_alt();
                    }
                });
            }else{
                url=PATH_NAV+'news/enable/'+id;
                text='Imagenes';
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
function actionImg(){
    $(".deleteImg").on({
        click: function(){
            pointer=this;
            var id=$(pointer).attr('ref');
            url=PATH_NAV+'image/deleteImg/'+id;
            addClass='open';
            removeClass='close';
            $( "#dialog-confirm2" ).html('<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Esta Totalmente seguro de que quiere eliminar esta <strong>Imagen</strong>.').dialog({
                title: 'Confirmar Eliminar',
                resizable: false,
                //height:140,
                modal: true,
                buttons: {
                    "Borrar Imagen": function() {
                        ajaxLoader();
                        $.ajax({ 
                            type: "GET",
                            dataType: 'html',
                            url: url,
                            success: function(data){
                                ajaxLoaderClose();
                                $(pointer.parentNode).remove();
                            }
                        });
                        $( this ).dialog( "close" );
                    },
                    "Cancelar": function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        }
    });
    $(".defaultImg").on({
        click: function(){
            pointer=this;
            var id=$(pointer).attr('ref');
            url=PATH_NAV+'image/defaultImg/'+id;
            addClass='open';
            removeClass='close';
            $( "#dialog-confirm2" ).html('<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Esta Totalmente seguro de que quiere establecer como predeterminada esta <strong>Imagen</strong>.').dialog({
                title: 'Predeterminada',
                resizable: false,
                //height:140,
                modal: true,
                buttons: {
                    "Predeterminada": function() {
                        ajaxLoader();
                        $.ajax({ 
                            type: "GET",
                            dataType: 'html',
                            url: url,
                            success: function(data){
                                ajaxLoaderClose();
                                url=PATH_NAV+'news/images/'+id;
                                text='X Imagenes';
                                addClass='open';
                                removeClass='close';
                                ajaxLoader();
                                $.ajax({ 
                                    type: "GET",
                                    dataType: 'html',
                                    url: url,
                                    success: function(data){
                                        ajaxLoaderClose();
                                        $('.addedTr').html('<td colspan="5">'+data+'</td>');
                                        actionImg();
                                        setTinymce();
                                        fecha_alt();
                                    }
                                });
                            }
                        });
                        $( this ).dialog( "close" );
                    },
                    "Cancelar": function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        }
    });
}
});
function resetButtonEdit(){
    var text='Editar';
    var addClass='close';
    var removeClass='open';
    var pointer=$('.edit.open');
    $(pointer).text(text);
    $(pointer).removeClass(removeClass);
    $(pointer).addClass(addClass);
}
function resetButtonImages(){
    var text='Imagenes';
    var addClass='close';
    var removeClass='open';
    var pointer=$('.images.open');
    $(pointer).text(text);
    $(pointer).removeClass(removeClass);
    $(pointer).addClass(addClass);
}
function resultSubmitImages(data){
    ajaxLoaderClose();
    if(typeof data.result_error == "undefined" || data.result_error==false){
        fdialog(null,data.messageAction,'success');
        $(pointer.parentNode).prev().prev().text(data.titulo);
        $(pointer.parentNode).prev().text(data.denominacion);
    }else{
        fdialog(null,data.result_error,'message');
    }
    var nextPointer=pointer.parentNode.parentNode.nextSibling;
    $('.addedTr').remove();
    resetButtonImages();
}

function fecha_alt() {
    $( ".fecha_alt" ).datepicker({
        dateFormat: "yy-mm-dd",
        altField: ".fecha_alt_for",
        altFormat: "DD, d MM, yy"
    });
}