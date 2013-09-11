function insertarVideo(data){
    $('#listadoVideos').prepend('<div class="col-sm-4"><iframe style="width:100%;" src="http://www.youtube.com/embed/' + data.idvideo + '" frameborder="0" allowfullscreen></iframe></div>');
}
function cargarListasRep(){
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: PATH_NAV + 'videoyoutube/listasrep',
        success : function(data){
        	$.each(data, function(i,item){
        		var active='';
        		if(window.listaRepActiva==item.id){
        			active='active'
        		}
            	$('#listasRep').append('<li onclick="filtrarVideos(' + item.id + ')" id="listaItem' + item.id + '" class="list-group-item ' + active + '"><span class="pull-right ajaxLoader oculto"><img src="' + DOMAIN + '/public/images/ajax-loader2.gif" alt=""></span>' + item.nombre + '</li>');
        	});
        }
    });
}
function filtrarVideos(id){
    window.listaRepActiva=id;
    $('#listaactiva').val(id);
	$('.active').removeClass('active');
    $('#listaItem' + id).addClass('active');
    $('.ajaxLoader').addClass('oculto');
    $('#listaItem' + id + ' > .ajaxLoader').removeClass('oculto');
    cargarListaVideos(id);
}
function cargarListaVideos(idlista){
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: PATH_NAV + 'videoyoutube/listarvideos/' + idlista,
        success : function(data){
            var vhtml='';
            $.each(data, function(i,item){
                vhtml+='<div class="col-sm-4"><iframe style="width:100%;" src="http://www.youtube.com/embed/' + item.idyoutube + '" frameborder="0" allowfullscreen></iframe></div>';
            });
            $('#listadoVideos').html(vhtml);
            $('.ajaxLoader').addClass('oculto');
        }
    });
}
$(document).ready(iniciar);

function iniciar(){
	window.listaRepActiva=1;
    $('#listaactiva').val(window.listaRepActiva);
	cargarListasRep();
    cargarListaVideos(window.listaRepActiva);
}