function savedNews(data){
    $('#newsform').removeAttr('style') ;
    $('.paso1').hide();
    $('.paso2').show();
    document.getElementById('idnews').value=data.idnews;
    alert(data.mensaje);
}

$(document).ready(function() {
    $('.paso1').show();
	$('.paso2').hide();
});