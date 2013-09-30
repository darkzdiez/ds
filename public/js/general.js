function ajaxLoader() {
    $("#myModal").modal('hide');
    $('#ajaxLoader').modal({
        backdrop: 'static',
        keyboard: false
    });
}
function ajaxLoaderClose() {
    $('#ajaxLoader').modal('hide');
}
/* Result Submit Iframe */
function rsi(data){
    if(eval("typeof(" + data.fn + ") == typeof(Function)")) {
        window[data.fn](data);
    }else{
        console.log('Funcion de Retorno no Definida: '+data.fn);
    }
}
$(document).ready(function() {
    $('form.ajaxForm').on({
        submit: function(a) {
            a.preventDefault();
            /*if(eval("typeof(tinyMCE) == typeof(Function)")) {*/
            if(typeof tinyMCE == 'object'){
                tinyMCE.triggerSave();
            }else{
                console.log('tinyMCE: No Existe');
            }
            ajaxLoader();
            var url = $(this).attr('action');
            var data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                enctype: 'multipart/form-data',
                data: data,
                success: function(data) {
                    rsi(data);
                }
            });
            return false;
        }
    });

    $.fn.ocultarDesocultar = function(options){
        $.fn.ocultarDesocultar.defaults={
            preid : '#toggle-',
            input : 'radio'
        };
        var opts = $.extend({}, $.fn.ocultarDesocultar.defaults, options);
        var $anterior="";
        $(this).hide();
        $("input:"+opts.input).on("click",function(){
            $(opts.preid+$anterior).hide();
            var $id= $(this).attr('id');
            $(opts.preid+$id).show();
            $anterior=$id;
        });
    };

    $.fn.comboDinamico = function(options){
        $combo = $(this);
        $.fn.comboDinamico.defaults={
            validar: "estado",
            validar_function: "cargar_estado",
            id_change : 'municipio',
            function_change: 'cargar_municipio',
            modulo: 'visita/'

        };
        var opts = $.extend({}, $.fn.comboDinamico.defaults, options);
    //Cargar
    if($combo.attr("id") == opts.validar){
        ajax(opts.modulo+opts.validar_function,$combo,opts.validar);

        $combo.on('change',function(){
            ajax(opts.modulo+opts.function_change,$(this),opts.id_change);
        });
    }else{
        $combo.on('change',function(){
            ajax(opts.modulo+opts.function_change,$(this),opts.id_change);
        });
    }

    function ajax(url,$cmb,id_return){
        $.ajax({
            type:"POST",
            dataType:"html",
            url: PATH_NAV+url,
            data: {id: $cmb.val()},
            success: function(html){
                if(html != null){
                    $("#"+id_return).append(html);                                      
                }
            }
        });
    }
};
});
$(function() {
    /*$('.linkAjax').click(function(e) {
        $(".ajaxLoader img").removeClass('hidden');
        href = $(this).attr("href");
        loadContent(href);
        history.pushState('', 'New URL: '+href, href);
        e.preventDefault();
    });
    window.onpopstate = function(event) {
        $(".ajaxLoader img").removeClass('hidden');
        console.log("pathname: "+location.pathname);
        loadContent(location.pathname);
    };*/
});
function loadContent(url){
    $.ajax({
        type: "POST",
        url: url,
        dataType: 'html',
        enctype: 'multipart/form-data',
        data: { method: "ajax", other: "=)" },
    success: function(data) {
        $(".ajaxLoader img").addClass('hidden');
        $('#contentDATA').html(data);
    }
});
    $('li').removeClass('current');
    $('a[href="'+url+'"]').parent().addClass('current');
}
bootstrap_alert=function(id,mensaje){
    $("#"+id).html('<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>'+mensaje+'</div>');
};

/**** viejo ******/
function convertDataSerializeToArray(text) {
    var array1 = text.split('&');
    var array2 = new Array();
    var data = new Array();
    for (i in array1) {
        array2 = array1[i].split('=');
        data[array2[0]] = array2[1];
    }
    return data;
}
jQuery.fn.contarCaracteres = function(target) {
    $(this).keyup(function() {
        if (target === undefined) {
            target = $(this).attr('ref');
        }
        var text = $(this).val();
        $('#' + target).text(text.length);
        target = undefined;
    });
};
/*function ajaxLoaderClose() {
    $("#ui-modal-sys").hide();
    $('.ui-dialog').removeClass('ui-dialog2');
    $("#ajax-loader").dialog("close");
    $("#ajax-loader").dialog("destroy");
    //$(".ui-widget-overlay").remove();
    $("#container_dialog").html('');
    $(".ui-dialog-titlebar").show();
//$(".ui-dialog-titlebar").show();
    /*
     $("#ajax-loader").attr('onclick', '');
     $(".ui-widget-overlay").attr('onclick', ''); 
     setTimeout(function() {
     $("#ajax-loader").dialog("close");
 },500);
}*/
function fdialog(title, text, tipe, locationAction) {
    if (tipe == 'message') {
        if (title == null) {
            title = 'Aviso';
        }
        $("#container_dialog").html('<div id="dialog-message" title="' + title + '">' +
            '<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 50px 0;"></span>' +
            text +
            '</p>' +
            '</div>');
        $("#dialog-message").dialog({
            modal: true,
            resizable: false,
            show: {
                effect: 'drop',
                direction: "right"
            },
            hide: {
                effect: 'drop',
                direction: "left"
            },
            buttons: {
                Ok: function() {
                    $(this).dialog("close");
                }
            }
        });
    }
    if (tipe == 'success') {
        if (title == null) {
            title = 'Notificacion';
        }
        $("#container_dialog").html('<div id="dialog-success" title="' + title + '">' +
            '<p><span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>' +
            text +
            '</p>' +
            '</div>');
        $("#dialog-success").dialog({
            modal: true,
            resizable: false,
            show: {
                effect: 'drop',
                direction: "right"
            },
            hide: {
                effect: 'drop',
                direction: "left"
            },
            buttons: {
                Ok: function() {
                    $(this).dialog("close");
                    if (locationAction != 'undefined', locationAction != null) {
                        location.href = locationAction;
                    }
                }
            }
        });
    }
}
function tableContent() {
    if ($('.table-content tbody').is(':empty')) {
        $('table.table-content').css('display', 'none');
    } else {
        $('table.table-content').css('display', 'table');
    }
}
function ui_modal_sys() {
    $("#ui-modal-sys").show();
    $("#ui-modal-sys").css({
        "width": $(document).width(),
        'height': $(document).height()
    });
}
$(document).ready(function() {
    loadTinymce();
    mueveReloj();
    tiempoTranscurrido();

    tableContent();
    $('.ui-state-default').hover(
        function() {
            $(this).addClass('ui-state-hover');
        },
        function() {
            $(this).removeClass('ui-state-hover');
        }
        );
    $('#panel-hide').click(function() {
        $('.sidebar1').hide('slow', function() {
            $('#panel-show').show();
            $('.content').css('width', '100%');
            $.ajax({
                type: "GET",
                url: PATH_NAV + 'system/panelhide'
            });
        });
    })
    $('#panel-show').click(function() {
        $('#panel-show').hide();
        $('.content').css('width', '80%');
        $('.sidebar1').show('slow');
        $.ajax({
            type: "GET",
            url: PATH_NAV + 'system/panelshow'
        });
    })
    $('.buttonbar_show').click(function() {
        var element = $(this).attr("alt");
        //        $('.buttonbar').hide('slow',function(){
        //            $('#'+element).show('blind');
        //            loadTinymce();
        //        });
    $('.buttonbar').hide('slow', function() {
            //$('#'+element).show('blind');
            $('#' + element).css({
                display: 'inline'
            });
        });
})
    $('.buttonbar_close').click(function() {
        var element = $(this).attr("alt");
        //        $('#'+element).hide(function(){
        //            $('.buttonbar').show('slow');
        //        });
    $('#' + element).animate({
        height: 0
    });
    $('#' + element).css({
        display: 'none'
    });
    $('.buttonbar').show('slow');
})
    $('.AjaxIframeUpload').keyup(function() {
        ajaxLoader();

    });
});
function loadTinymce() {
    if (typeof tinymce == 'function') { 
        $('textarea.tinymce').tinymce({
            // Location of TinyMCE script
            script_url: DOMAIN + 'public/js/tiny_mce/tiny_mce.js',
            // General options
            theme: "advanced",
            height: "480",
            plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
            // Theme options
            theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "left",
            theme_advanced_statusbar_location: "bottom",
            theme_advanced_resizing: false,
            // Example content CSS (should be your site CSS)
            content_css: "css/content.css",
            // Drop lists for link/image/media/template dialogs
            template_external_list_url: "lists/template_list.js",
            external_link_list_url: "lists/link_list.js",
            external_image_list_url: "lists/image_list.js",
            media_external_list_url: "lists/media_list.js",
            // Replace values for the template plugin
            template_replace_values: {
                username: "Some User",
                staffid: "991234"
            }
        });
    }
}
function mueveReloj() {
    momentoActual = new Date()
    hora = momentoActual.getHours()
    if (hora > 12) {
        hora = hora - 12;
        meridiem = 'PM'
    } else {
        meridiem = 'AM'
    }
    minuto = momentoActual.getMinutes();
    segundo = momentoActual.getSeconds();
    dia = momentoActual.getDay();
    date = momentoActual.getDate();
    month = momentoActual.getMonth();
    year = momentoActual.getFullYear();
    switch (dia) {
        case 0:
        dia = 'Domingo'
        break;
        case 1:
        dia = 'Lunes'
        break;
        case 2:
        dia = 'Martes'
        break;
        case 3:
        dia = 'Miercoles'
        break;
        case 4:
        dia = 'Jueves'
        break;
        case 5:
        dia = 'Viernes'
        break;
        case 6:
        dia = 'Sabado'
        break;
        default:
        dia = 'Error'
    }
    switch (month) {
        case 0:
        month = 'Enero'
        break;
        case 1:
        month = 'Febrero'
        break;
        case 2:
        month = 'Marzo'
        break;
        case 3:
        month = 'Abril'
        break;
        case 4:
        month = 'Mayo'
        break;
        case 5:
        month = 'Junio'
        break;
        case 6:
        month = 'Julio'
        break;
        case 7:
        month = 'Agosto'
        break;
        case 8:
        month = 'Septiembre'
        break;
        case 9:
        month = 'Octubre'
        break;
        case 10:
        month = 'Noviembre'
        break;
        case 11:
        month = 'Diciembre'
        break;
        default:
        month = 'Error'
    }
    horaImprimible = dia + ', ' + date + ' ' + month + ' ' + year + ' - ' + hora + " : " + minuto + " : " + segundo + " " + meridiem;
    $('#header #time').html(horaImprimible);

    setTimeout("mueveReloj()", 1000)
}

var dInicioExe = new Date(START_SESSION);
var dFinalExe = '\0';
function tiempoTranscurrido() {
    var nMinutes = nSeconds = nMiliSeconds = '';
    dFinalExe = new Date();
    var difference = (dFinalExe.getTime() - dInicioExe.getTime()) / 1000;
    var sTiempo = 'Execution Time (';
        sTiempo += fixTime(dFinalExe.getHours()) + ':' + fixTime(dFinalExe.getMinutes()) + ':' + fixTime(dFinalExe.getSeconds() + '.' + fixMili(dFinalExe.getTime() % 1000));
        sTiempo += ' - ';
        sTiempo += fixTime(dInicioExe.getHours()) + ':' + fixTime(dInicioExe.getMinutes()) + ':' + fixTime(dInicioExe.getSeconds() + '.' + fixMili(dInicioExe.getTime() % 1000));
        sTiempo += ') = ';
var nHours = 0;
nMinutes = fixTime(Math.floor(difference / 60));
while (nMinutes > 60) {
    nHours++;
    nMinutes = nMinutes - 60;
}
nSeconds = fixTime(Math.floor(difference % 60));
nMiliSeconds = Math.round((difference % 1) * 1000);
    //window.status = sTiempo + ' ' + nMinutes + ':' + nSeconds + '.' + nMiliSeconds;
    var diferencia = 'Tiempo de la Sesión ' + nHours + ' Horas, ' + nMinutes + ' Minutos, ' + nSeconds + ' Segundos.';
    if (START_SESSION != '') {
        $('#header #trascurrido').html(diferencia);
        setTimeout("tiempoTranscurrido()", 1000);
    }
}
function fixTime(nTime) {
    return (nTime < 10 ? "0" : "") + nTime;
}
function fixMili(nTime) {
    return (nTime < 100 ? "0" : "") + fixTime(nTime);
}