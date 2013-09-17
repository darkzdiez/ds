function guardarEditarPerfil(data){
	ajaxLoaderClose();
	alert(data.mensaje);
	if (data.seguridadPass=='b') {
		$().addClass('in');
		alertBS('open', "#alertClaveBS");
	}else{
		alertBS('close', "#alertClaveBS");
	};
}