function test(){
    console.log(window.optBuscarOrden);
    myWindow=window.open('','','width=500,height=300');
    /*myWindow=window.open();*/
    myWindow.document.write('<table>'+$("#tabla-administrar").html()+'</table>');
    myWindow.focus();
}
function generarPDF(){
    var opt = window.optBuscarOrden;
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: PATH_NAV + 'orden/generarpdfsave/',
        data: { 
            descripcion : opt.descripcion,
            responsable : opt.responsable,
            pendiente: opt.pendiente,
            enproceso: opt.enproceso,
            ejecutada: opt.ejecutada,
            pagina:opt.pagina,
            gobcalle:opt.gobcalle,
            cantidad:opt.cantidad
        },
        success : function(data){
            console.log(data.mensaje);
            myWindow=window.open(PATH_NAV + 'orden/generarpdf/','');
            myWindow.focus();
        }
    });
}
function cambiarEstatus(idOrden, nextEstatus){
    var x;
    var respuesta=prompt('¿Esta Realmente SEGURO de cambiar el Estatus de esta orden?\nEscriba "Si" en caso de estar seguro');
    if (respuesta.toUpperCase()=='SI'){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: PATH_NAV + 'orden/cambiarestatus',
            data: { 
                id_orden : idOrden,
                estatus : nextEstatus
            },
            success : function(data){
                $('#estatus').html(data.newDiv);
                alert(data.mensaje);
            }
        });
    }else{
        alert('No se a cambiado el Estatus');
    }
}
function guardarorden(data){
    document.getElementById('formCrearOrden').reset();
    ajaxLoaderClose();
    alert(data.mensaje);
    window.location = PATH_NAV + "orden";
}
function guardarobservacion(data){
    ajaxLoaderClose();
    alert(data.mensaje);
    $('#textoEnviado').html(data.texto);
    $('#cargarimagen').show();
    $('#formCargarObservacion').hide();
    $('#fileupload').attr("action",PATH_NAV+"orden/upload/observacion/"+data.i+"/");
}

function guardarnovedad(data){
    ajaxLoaderClose();
    alert(data.mensaje);
    $('#textoEnviado').html(data.texto);
    $('#cargarimagen').show();
    $('#formCargarNovedad').hide();
    $('#fileupload').attr("action",PATH_NAV+"orden/upload/novedad/"+data.i+"/");
}

function guardarsupervision(data){
    ajaxLoaderClose();
    alert(data.mensaje);
    $('#textoEnviado').html(data.texto);
    $('#cargarimagen').show();
    $('#formCargarSupervision').hide();
    $('#fileupload').attr("action",PATH_NAV+"orden/upload/supervision/"+data.i+"/");
}
function cantidadordenes(){
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: PATH_NAV + 'orden/cantidadordenes/',
        success : function(data){
            var tablehtml="";
            $.each(data, function(i,item){
                var n = i+1;
                var p = {};
                p.pendiente_orden=((item.pendiente_orden * 100) / item.total_orden).toFixed(1);
                p.proceso_orden=((item.proceso_orden * 100) / item.total_orden).toFixed(1);
                p.ejecutada_orden=((item.ejecutada_orden * 100) / item.total_orden).toFixed(1);
                tablehtml += "<tr>"
                + "<td>" + n + "</td>"
                + "<td>" + item.nombres.toUpperCase() + "</td>"
                + '<td><table><tr><td style="width: 50%">' + item.pendiente_orden + '</td><td  style="width: 50%">' + p.pendiente_orden + "%</td></tr></table></td>"
                + '<td><table><tr><td style="width: 50%">' + item.proceso_orden + '</td><td  style="width: 50%">' + p.proceso_orden + "%</td></tr></table></td>"
                + '<td><table><tr><td style="width: 50%">' + item.ejecutada_orden + '</td><td  style="width: 50%">' + p.ejecutada_orden + "%</td></tr></table></td>"
                + "<td>" + item.total_orden + "</td>"
                + "</tr>"
            });
            $("#cantidadOrdenes tbody").html(tablehtml);
        }
    });
}
    function buscar_ordenes(datos){
        ajaxLoader();
        var defaults={
            descripcion: '',
            responsable: '',
            pendiente: '',
            enproceso: '',
            ejecutada: '',
            gobcalle: '',
            pagina:1,
            cantidad:10
        }

        var opt = $.extend( defaults, datos);
        window.optBuscarOrden=opt;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: PATH_NAV + 'orden/selectOrdenes',
            data: { 
                descripcion : opt.descripcion,
                responsable : opt.responsable,
                pendiente: opt.pendiente,
                enproceso: opt.enproceso,
                ejecutada: opt.ejecutada,
                gobcalle: opt.gobcalle,
                pagina:opt.pagina,
                cantidad:opt.cantidad
            },
            success : function(data){
                ajaxLoaderClose();
                if(data.mensaje==undefined){
                    var html='';
                    $.each(data.d, function(i,item){
                        var icono_advertencia='';
                        var dias_restantes=0;
                        if(item.dias_restantes < 0 ){
                            dias_restantes=item.dias_restantes * -1;
                        }
                        if (dias_restantes <=5 ){
                            var icono_advertencia='<i class="icon-exclamation"></i>';
                        }
                        var p= (i+1)+((opt.pagina-1)*opt.cantidad);
                        switch(item.estatus)
                            {
                            case "0":
                              estatus='Pendiente';
                              break;
                            case "1":
                              estatus='En Proceso';
                              break;
                            case "2":
                              estatus='Ejecutado';
                              break;
                            default:
                              estatus='Pendiente';
                        }
                        html += '<tr>\
                                    <td>' + p + '</td>\
                                    <td>' + item.usuario_nombre.toUpperCase()  + ' | ' + item.usuario_instituto.toUpperCase()  + '</td>\
                                    <td>' + item.descripcion.toUpperCase() + '</td>\
                                    <td>' + item.fecha_emision + '</td>\
                                    <td>' + item.fecha_culminacion + '</td>\
                                    <td>' + icono_advertencia+' ' + dias_restantes + ' dias</td>\
                                    <td>' + estatus + '</td>\
                                    <td>';
                                        html+='<a href="'+PATH_NAV+'orden/novedad/'+item.id_orden+'" class="btn"><i class="icon-book"></i> Novedad</a>';
                                        html+='<a href="'+PATH_NAV+'orden/observacion/' + item.id_orden + '" class="btn"><i class="icon-edit"></i> Observación</a>';
                                        if(item.p == 1 || item.p == 2) { html+='<a href="'+PATH_NAV+'orden/supervision/'+item.id_orden+'" class="btn"><i class="icon-eye-open"></i> Supervisión</a>'; }
                                    html+='</td>\
                                </tr>';
                    });
                    $("#tabla-administrar tbody").html(html);
                    $("#tabla-administrar").trigger("update");
                    var cant=Math.ceil(data.i/opt.cantidad);
                    if(opt.pagina == 1){
                        var pagination = '<li class="disabled"><a>«</a></li>';
                    }else{
                        var pagination = '<li><a class="principio">«</a></li>';
                    }
                    for (var i = 1; i <= cant; i++) {
                        if(opt.pagina == i){
                            pagination += '<li class="active"><a>' + i + '</a></li>';
                        }else{
                            pagination += '<li class=""><a class="ir">' + i + '</a></li>';
                        }
                    };
                    if(opt.pagina == cant){
                        pagination += '<li class="disabled"><a>»</a></li>';
                    }else{
                        pagination += '<li><a class="final">»</a></li>';
                    }
                    if (cant>1) {
                        $(".pagination ul").html(pagination);
                        $(".pagination").removeAttr('style');
                    }else{
                        $(".pagination ul").html("");
                        $(".pagination").css("margin", "0");
                    };
                    $(".pagination ul li a").click(function(){
                        var continuar=false;
                        if($(this).hasClass('ir')) {
                            var ir = $(this).text();
                            continuar=true;
                        }else if($(this).hasClass('principio')){
                            var ir = 1;
                            continuar=true;
                        }else if($(this).hasClass('final')){
                            var ir = cant;
                            continuar=true;
                        }
                        if (continuar == true) {
                            buscar_ordenes({
                                descripcion : opt.descripcion,
                                responsable : opt.responsable,
                                pendiente: opt.pendiente,
                                enproceso: opt.enproceso,
                                ejecutada: opt.ejecutada,
                                gobcalle: opt.gobcalle,
                                pagina:ir,
                                cantidad:opt.cantidad
                            });
                        };
                    });
                }else{
                    alert(data.mensaje);
                    //console.log(data.mensaje);
                }

            }
        });     
    }
    function buscar_observaciones(idOrden){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: PATH_NAV + 'orden/observacionlistar/'+idOrden,
            success : function(data){
                if(data.mensaje==undefined){
                    var html='';
                    $.each(data, function(i,item){
                        var icono_advertencia='';
                        var dias_restantes=0;
                        if(item.dias_restantes < 0 ){
                            dias_restantes=item.dias_restantes * -1;
                        }
                        if (dias_restantes <=5 ){
                            var icono_advertencia='<i class="icon-exclamation"></i>';
                        }
                        var p= i+1;
                        switch(item.estatus)
                            {
                            case 0:
                              estatus='Pendiente';
                              break;
                            case 1:
                              estatus='En Proceso';
                              break;
                            case 2:
                              estatus='Ejecutado';
                              break;
                            default:
                              estatus='Pendiente';
                        }
                        html += '<tr>\
                                    <td>' + p + '</td>\
                                    <td>' + item.texto + '</td>\
                                    <td>' + item.fecha + '</td>\
                                    <td>';
                                        html+='<a href="'+PATH_NAV+'orden/detalleobservacion/' + item.idorden + '/' + item.id + '" class="btn"><i class="icon-book"></i> Ver Detalles</a>';
                                    html+='</td>\
                                </tr>';
                    });
                    $("#tabla-observaciones tbody").html(html);
                    $("#tabla-observaciones").trigger("update");
                }else{
                    alert(data.mensaje);
                    //console.log(data.mensaje);
                }

            }
        });
    }

    function buscar_novedades(idOrden){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: PATH_NAV + 'orden/novedadlistar/'+idOrden,
            success : function(data){
                if(data.mensaje==undefined){
                    var html='';
                    $.each(data, function(i,item){
                        var icono_advertencia='';
                        var dias_restantes=0;
                        if(item.dias_restantes < 0 ){
                            dias_restantes=item.dias_restantes * -1;
                        }
                        if (dias_restantes <=5 ){
                            var icono_advertencia='<i class="icon-exclamation"></i>';
                        }
                        var p= i+1;
                        switch(item.estatus)
                            {
                            case 0:
                              estatus='Pendiente';
                              break;
                            case 1:
                              estatus='En Proceso';
                              break;
                            case 2:
                              estatus='Ejecutado';
                              break;
                            default:
                              estatus='Pendiente';
                        }
                        html += '<tr>\
                                    <td>' + p + '</td>\
                                    <td>' + item.texto + '</td>\
                                    <td>' + item.fecha + '</td>\
                                    <td>';
                                        html+='<a href="'+PATH_NAV+'orden/detallenovedad/' + item.idorden + '/' + item.id + '" class="btn"><i class="icon-book"></i> Ver Detalles</a>';
                                    html+='</td>\
                                </tr>';
                    });
                    $("#tabla-novedades tbody").html(html);
                    $("#tabla-novedades").trigger("update");
                }else{
                    alert(data.mensaje);
                    //console.log(data.mensaje);
                }

            }
        });     
    }

    function buscar_supervisiones(idOrden){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: PATH_NAV + 'orden/supervisionlistar/'+idOrden,
            success : function(data){
                if(data.mensaje==undefined){
                    var html='';
                    $.each(data, function(i,item){
                        var icono_advertencia='';
                        var dias_restantes=0;
                        if(item.dias_restantes < 0 ){
                            dias_restantes=item.dias_restantes * -1;
                        }
                        if (dias_restantes <=5 ){
                            var icono_advertencia='<i class="icon-exclamation"></i>';
                        }
                        var p= i+1;
                        switch(item.estatus)
                            {
                            case 0:
                              estatus='Pendiente';
                              break;
                            case 1:
                              estatus='En Proceso';
                              break;
                            case 2:
                              estatus='Ejecutado';
                              break;
                            default:
                              estatus='Pendiente';
                        }
                        html += '<tr>\
                                    <td>' + p + '</td>\
                                    <td>' + item.texto + '</td>\
                                    <td>' + item.fecha + '</td>\
                                    <td>';
                                        html+='<a href="'+PATH_NAV+'orden/detallesupervision/' + item.idorden + '/' + item.id + '" class="btn"><i class="icon-book"></i> Ver Detalles</a>';
                                    html+='</td>\
                                </tr>';
                    });
                    $("#tabla-supervisiones tbody").html(html);
                    $("#tabla-supervisiones").trigger("update");
                }else{
                    alert(data.mensaje);
                    //console.log(data.mensaje);
                }

            }
        });     
    }

$(function(){


        $("#responsable").jCombo(PATH_NAV +'orden/cargar_responsable',{
            dataType:'json',
        });

tinymce.init({
    selector: ".tinymce",
    plugins: [
    "advlist autolink lists link charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link"
});
           /* if(eval("typeof(tinyMCE) == typeof(Function)")) {
                tinyMCE.triggerSave();
            }else{
                alert('tinyMCE: No Existe');
            }*/
//        $("#estado").jCombo(PATH_NAV +'visita/cargar_estado',{
//            dataType:'json',
//            selected_value:selected_estado
//        });
    cantidadordenes();
    $("#filtrarOrdenes").on("click",function(){
        buscar_ordenes({
            descripcion: $("#filtrar-admin").val(),
            responsable: $("#responsable").val(),
            pendiente: $("#pendiente:checked").val(),
            enproceso: $("#enproceso:checked").val(),
            ejecutada: $("#ejecutada:checked").val(),
            gobcalle: $("#gobcalle:checked").val()
        });
    });
//    buscar_ordenes($(this).val());
//    $("#filtrar-admin").on("keyup",function(){
//        buscar_ordenes($(this).val());
//    });


});