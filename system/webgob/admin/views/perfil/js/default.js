function guardarEditarPerfil(data){
	ajaxLoaderClose();
	alert(data.mensaje);
	document.getElementById("cambiarClave").reset();
}

function checkpass(event){
	if ($('#clave').val()==$('#reclave').val()) {
		return true;
	} else{
		alert('Las claves no coinciden');
	    return false;
	};
}