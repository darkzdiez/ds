function cargarImagenes (id) {
    'use strict';
    $('#fileupload').attr("action",PATH_NAV + 'banner/upload/' + id);
    $('#presentation > .files').html('');
    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: $('#fileupload').attr('action')
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    if (window.location.hostname === 'blueimp.github.io') {
        // Demo settings:
        $('#fileupload').fileupload('option', {
            url: '//jquery-file-upload.appspot.com/',
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            maxFileSize: 5000000,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
        });
        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: '//jquery-file-upload.appspot.com/',
                type: 'HEAD'
            }).fail(function () {
                $('<div class="alert alert-danger"/>')
                    .text('Upload server currently unavailable - ' +
                            new Date())
                    .appendTo('#fileupload');
            });
        }
    } else {
        // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('#fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
                .call(this, null, {result: result});
        });
    }
    $('.ajaxLoader').addClass('oculto');
}
function filtrar(id){
    window.itemActivo=id;
    $('#listaactiva').val(id);
    $('.active').removeClass('active');
    $('#listaItem' + id).addClass('active');
    $('.ajaxLoader').addClass('oculto');
    $('#listaItem' + id + ' > .ajaxLoader').removeClass('oculto');
    cargarImagenes(id);
}

function listar(init){
    $('.itemList').remove();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: PATH_NAV + 'banner/listar',
        success : function(data){
            $.each(data, function(i,item){
                var active='';
                if (i==0 && init==true) {
                    window.itemActivo=item.idbanner
                };
                if(window.itemActivo==item.idbanner){
                    active='active'
                }
                $('#listasRep').append('<li onclick="filtrar(' + item.idbanner + ')" id="listaItem' + item.idbanner + '" class="list-group-item itemList ' + active + '"><span class="pull-right ajaxLoader oculto"><img src="' + DOMAIN + '/public/images/ajax-loader2.gif" alt=""></span>' + item.nombrebanner.toUpperCase() + '</li>');
            });
            cargarImagenes(window.itemActivo);
        }
    });
}
$(document).ready(iniciar);

function iniciar(){
    listar(true);
}