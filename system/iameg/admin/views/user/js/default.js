function return_module(data) {
    ajaxLoaderClose();
    if(typeof data.result_error == "undefined" || data.result_error==false){
        fdialog(null,'<strong>Usuario</strong> creado con exito','success');
        $('#list-user tbody').append('<tr><td>' + data.login + '</td><td>'+ data.role +'</td><td><a class="del" rel="" href="#">X</a></td></tr>');
        tableContent();   
    }else{
        fdialog(null,'El <strong>Usuario</strong> con ese nombre ya existe.','message');
    }
};