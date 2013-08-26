function guardaruser(data){
    ajaxLoaderClose();
    alert(data.mensaje);
}
    function buscar_user(){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: PATH_NAV + 'user/listaruser',
            success : function(data){
                if(data.mensaje==undefined){
                    var html='';
                    
                    $.each(data, function(i,item){
                        var p= i+1;
                        html += '<tr>\
                                    <td>' + p + '</td>\
                                    <td>' + item.login + ' | ' + item.nombres + '</td>\
                                    <td>' + item.role + '</td>\
                                    <td>';
                                        html+='<a href="#" class="btn"><i class="icon-book"></i> Bitacora</a>';
                                        html+='<a href="'+PATH_NAV+'user/permisos/' + item.iduser + '" class="btn"><i class="icon-group"></i> Permisos y Grupos</a>';
                                        html+='<a href="#" class="btn"><i class="icon-edit"></i> Editar</a>';                                    
                                    html+='</td>\
                                </tr>';
                    });
                    $("#tabla-administrar tbody").html(html);
                    $("#tabla-administrar").trigger("update");
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


//        $("#estado").jCombo(PATH_NAV +'visita/cargar_estado',{
//            dataType:'json',
//            selected_value:selected_estado
//        });
    $("#filtrarUser").on("click",function(){
        buscar_user();
    });
//    buscar_ordenes($(this).val());
//    $("#filtrar-admin").on("keyup",function(){
//        buscar_ordenes($(this).val());
//    });


});