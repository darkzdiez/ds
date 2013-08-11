function postLogin(data) {
    ajaxLoaderClose();
    if(typeof data.result_error == "undefined" || data.result_error==false){
        location.href=data.url;
    }else{
        fdialog(null,'<strong>Usuario</strong> o <strong>Clave</strong> invalidos rectifiquelos e intente nuevamente','message');
    }
};