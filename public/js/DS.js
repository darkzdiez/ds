function DSconsultar(ruta,postData, rfunction){
	var url = ruta;
	postData = postData || null;
	var result;
	$.ajax({
		type: "POST",
		url: url,
		dataType: 'json',
		enctype: 'multipart/form-data',
		data: postData,
		success: function(data) {
			window[rfunction](data);
		}
	});
	console.log(result);
}
function DSllenarForm(data){
	var dataHtml = '';
	$.each(data, function(i,item){
		$.each(item, function(i,item){
			$('#'+i).val(item);
		});
	});
}
function DSllenarSelect(id,data, firsBlank=false){
	var dataHtml = '';
    if(firsBlank != false){
        dataHtml += '<option value="">Seleccione</option>';
    }
	$.each(data, function(i,item){
		dataHtml += '<option value="' + item.key + '">' + item.val.toUpperCase() + '</option>';
	});
	$('#'+id).html(dataHtml);
}
