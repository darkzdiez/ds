function return_module(data) {
    ajaxLoaderClose();
    if(typeof data.result_error == "undefined" || data.result_error==false){
        fdialog(null,data.messageAction,'success', data.locationAction);
        $('#list-news tbody').prepend('<tr><td>' + data.title + '</td><td>' + data.summary + '</td><td>' + data.date + '</td><td>' + data.user + '</td><td><div ref="' + data.id + '" class="styleLink edit close">Editar</div> <div ref="' + data.id + '" class="styleLink state enable">Activar</div></td></tr>');
        tableContent();   
    }else{
        fdialog(null,data.result_error,'message');
    }
}
function listDependencia(location,idparent){
    $.ajax({ 
        type: "GET",
        dataType: 'json',
        url: PATH_NAV+'inventarioinformatica/dependenciaList/'+idparent,
        success: function(data){
            if(data != null){
                $(location).html('<option>Seleccione</option>')
                for (var i = 0; i < data.length; i++)
                {
                    $(location).append('<option value="'+data[i].id+'">' + data[i].name+'</option>');
                }
                if(idparent!=0){
                    $(location).append('<option value="0">Atras</option>')
                }
            }
        }
    });
}
listDependencia('#dependencia',0);
$(function(){
    $("#dependencia").on("change",function(){
        if($(this).val() != ""){
            listDependencia('#dependencia',$(this).val());
        }else{
            $("#parroquia").html('<option value="">Seleccione</option>');
        }
            
    })
})