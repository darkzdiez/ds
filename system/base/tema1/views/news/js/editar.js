function savedNews(data){
    $('#newsform').removeAttr('style') ;
    $('.paso1').hide();
    $('.paso2').show();
    document.getElementById('idnews').value=data.idnews;
    alert(data.mensaje);
}
function savedNews2(data){
    alert(data.mensaje);
    location.href = PATH_NAV + 'news';
}

$(document).ready(function() {
    $('.paso1').show();
	$('.paso2').hide();
});