function guardarinstituto(data){
    ajaxLoaderClose();
    alert(data.mensaje);
}
    function buscar_institutos(){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: PATH_NAV + 'instituto/listarinstitutos',
            success : function(data){
                if(data.mensaje==undefined){
                    var html='';
                    
                    $.each(data, function(i,item){
                        var p= i+1;
                        html += '<tr>\
                                    <td>' + p + '</td>\
                                    <td>' + item.nombre + '</td>\
                                    <td>';
                                        html+='<a href="'+PATH_NAV+'instituto/edit/'+item.id+'" class="btn"><i class="icon-book"></i> Editar</a>';
                                        html+='<a href="'+PATH_NAV+'instituto/delete/'+item.id+'" class="btn"><i class="icon-edit"></i> Eliminar</a>';                                    
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

    $("#filtrarUser").on("click",function(){
        buscar_institutos();
    });


});