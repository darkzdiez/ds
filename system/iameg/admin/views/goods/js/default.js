function return_module(data) {
    ajaxLoaderClose();
    if(typeof data.result_error == "undefined" || data.result_error==false){
        fdialog(null,data.messageAction,'success', data.locationAction);
        $('#list-goods tbody').append('<tr><td>' + data.name_article + '</td><td>' + data.mark + '</td><td>' + data.model + '</td><td><a href="' + HOST_PATHS + 'client/edit/' + data.id + '">Editar</a> <a href="' + HOST_PATHS + 'client/lock/' + data.id + '">Desactivar</a> <a href="' + HOST_PATHS + 'sales/bill/' + data.id + '">Facturar</a></td></td></tr>');
        tableContent();   
    }else{
        fdialog(null,data.result_error,'message');
    }
};