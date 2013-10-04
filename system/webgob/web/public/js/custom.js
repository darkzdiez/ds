$(function() {
    $('a').tooltip({
        track: true
    });
});
$(document).ready(function() {
    $('#slide_article').cycle({
        fx: 'turnDown',
        speed: 'fast',
        timeout: 6000,
        pager: '.nav_slide_article'
    });
    $('#slide_282x236').cycle({
        fx: 'fade,scrollLeft,fadeZoom,scrollDown,growX,scrollRight,turnUp,scrollUp,wipe',
        next: '#slide_282x236',
        timeout: 2987,
        pause: 1
    });
    $('#anuncio_col_der').cycle({
        fx: 'scrollRight',
        timeout: 4000
    });
});
/*
Cufon('.container_add_more_news_home .text', {
    fontFamily: 'Gudea',
    textShadow: '1px 1px 3px #999',
    fontWeight: 'bold'
});
Cufon('.titulo_col_der', {
    fontFamily: 'Myriad Pro'
});
Cufon('#table_send_comment_form label', {
    fontFamily: 'Myriad Pro'
});
Cufon('#redes_social #titulo_shadow', {
    fontFamily: 'Myriad Pro'
});
Cufon('#redes_social #titulo', {
    fontFamily: 'Myriad Pro'
});
Cufon('.sistemas_col_der a .texto .titulo', {
    fontFamily: 'Myriad Pro'
});
Cufon('.sistemas_col_der a .texto .descripcion', {
    fontFamily: 'Myriad Pro'
});
Cufon('.columna_footer .titulo', {
    fontFamily: 'Myriad Pro'
});
Cufon('.cufon_gudea', {
    fontFamily: 'Gudea'
});
Cufon('.cufon_myriad', {
    fontFamily: 'Myriad Pro'
});
Cufon('.cufon_myriad_bold', {
    fontFamily: 'Myriad Pro',
    textShadow: '-1px 1px 1px #000'
});
Cufon('.table_pagination', {
    fontFamily: 'Myriad Pro'
});*/
$(function() {
    $(".btm_desplegar").button({
        icons: {
            primary: "ui-icon-arrowthick-1-s"
        }
    });
    $(".btm_search").button({
        icons: {
            primary: "ui-icon-search"
        }
    });
    $(".calendar").datepicker({
        dateFormat: "yy-mm-dd"
    });
    $(".btm_guardar").button({
        icons: {
            primary: "ui-icon-disk"
        }
    });
    function runEffectFilterShow() {
        var selectedEffectShow = "bounce";
        var options = {};
        $("#filter_article").show(selectedEffectShow, options, 2000);
    }
    ;
    function runEffectFilterHide() {
        var selectedEffectHide = "fold";
        var options = {};
        $("#filter_article").hide(selectedEffectHide, options, 300);
    }
    ;
    $("#show_filter_article").click(function() {
        runEffectFilterShow();
        $("#show_filter_article").hide();
        return false;
    });
    $("#hide_filter_article").click(function() {
        runEffectFilterHide();
        $("#show_filter_article").show();
        return false;
    });
    $("#filter_article").hide();
});
$(document).ready(function() {
    $('iframe').each(function(){
        var url = $(this).attr("src");
        var char = "?";
        if(url.indexOf("?") != -1){
            var char = "&";
        }

        $(this).attr("src",url+char+"wmode=transparent");
    });
    jQuery.fn.reset = function() {
        $(this).each(function() {
            this.reset();
        });
    }
    function mostrarLoader() {
        $('#loader_gif').fadeIn("slow");
    }
    ;
    function agregarRespuesta(responseText) {
        $('#send_comment_form').reset();
        $("#loader_comment").prepend(responseText);
    }
    ;
    function mostrarRespuesta(responseText) {
        $('#send_message_form').reset();
        $("#loader_gif").fadeOut("slow");
        $("#loader_comment").html(responseText);
        setTimeout(function() {
            $("#loader_comment .ui-state-success").fadeOut("slow");
            ;
        }, 3000);
    }
    ;
    var container = $('div#loader_comment_error');
    $('#resetCaptcha').on("click", function() {
        $("#imgCaptchaComment").removeAttr("src").attr("src", PATH_NAV + 'captcha/index/' + Math.floor(Math.random() * 10000))
    });
    $('#inputCaptchaComment').keyup(function() {
        var text = $(this).val();
        if (text.length < 4) {
            $('#button_send_comment_form').hide();
        } else {
            $('#button_send_comment_form').show();
        }
    });
    function convertDataSerializeToArray(text) {
        var array1 = text.split('&');
        var array2 = new Array();
        var data = new Array();
        for (i in array1) {
            array2 = array1[i].split('=');
            data[array2[0]] = array2[1];
        }
        return data;
    }
    $('form#send_comment_form').submit(function() {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        var arrayData = convertDataSerializeToArray(data);
        if (arrayData.captcha.length > 3) {
            var error = new Array();
            var cssObjNormal = {
                'border-color': '#CCCCCC',
                'border-width': '1px'
            };
            var cssObjError = {
                'border-color': '#CF0202',
                'border-width': '2px'
            };
            if (arrayData.name.length < 3) {
                error[0] = 'Ingrese un Nombre';
                $('#name').css(cssObjError);
            } else {
                $('#name').css(cssObjNormal);
            }
            if (arrayData.email.length < 5) {
                error[1] = 'Ingrese un Correo Electronico';
                $('#email').css(cssObjError);
            } else {
                $('#email').css(cssObjNormal);
            }
            if (arrayData.comment.length < 5) {
                error[2] = 'Ingrese un Comentario';
                $('#comment').css(cssObjError);
            } else {
                $('#comment').css(cssObjNormal);
            }
            if (error.length > 0) {
                var textError = error.join('\n');
                alert(textError);
            } else {
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    enctype: 'multipart/form-data',
                    data: data,
                    beforeSend: mostrarLoader(),
                    success: function(data) {
                        $("#loader_gif").fadeOut("slow");
                        if ('errorCaptcha' in data) {
                            alert(data.errorCaptcha);
                        } else if ('contentSuccess' in data) {
                            agregarRespuesta(data.contentSuccess)
                            $('#send_comment_form').hide(2000);
                        } else if ('systemError' in data) {
                            alert(data.systemError);
                        }
                    }
                });
            }
        }
        return false;
    });
    function mostrarLoaderBuscar() {
        $('#contenido_culum_a').html('<img id="loader_gif_general" src="' + PATH_FILE + 'public/images/loader1.gif" />');
        $("#btn_buscar_nav").attr('disabled', 'disabled');
    }
    ;
    function agregarRespuestaBuscar(responseText) {
        setTimeout(function() {
            $("#loader_gif_general").hide("fade", 10);
            if ($('#slide_ppal').css('display') != 'none') {
                $('.descriptionContainer > .descripcion').addClass('descripcionHide', setTimeout(function() {
                    $('.descriptionContainer > .descripcion').removeClass('descripcion');
                    $("#slide_ppal").addClass('slide_ppal_hide');
                }, 1000));
                $('.ui-effects-wrapper').css('width', '910px');
            }
            $("#contenido_culum_a").html('Resultado de la Busqueda');
            setTimeout(function() {
                $("#btn_buscar_nav").removeAttr('disabled');
            }, 3000);
        }, 2000);
    }
    ;
$('.photoGallery').on({
    mouseenter: function() {
        $(this).stop().animate({
            height: '40px',
            paddingTop: '120px'
        }, 500);
        },
        mouseleave: function() {
            $(this).stop().animate({
                height: '0px',
                paddingTop: '160px'
            }, 500);
        }
    });
});
function zoominNews(ruta){
    //alert(PATH_SYSTEM + 'media/images/news/' + ruta);
    $("#zoominimage").attr('src', PATH_SYSTEM + 'media/images/news/' + ruta);
        $( "#dialogZoominimage" ).dialog({
            modal: true,
            dialogClass: "no-close",
            dialogClass: "noTitle",
            resizable: false,
            position: {
                my: "center center"
            }
        });
        $("#zoominimage").load(function() {
            $( "#dialogZoominimage" ).dialog({
                position: {
                    my: "center center"
                }
            });
        });
        $(".ui-widget-overlay").on("click",function(){
             $( "#dialogZoominimage" ).dialog("close");
        });
}
/* agrandar imagenes miniaturas */
/*
function show_img_windows(Group_img) {
    var height = $(window).height() - 100;
    $("body").append('<div id="dialog" style="max-height: ' + height + 'px;"></div>');
    $("#dialog").dialog({
        resizable: false,
        draggable: false,
        position: ['center', 'top'],
        autoOpen: false,
        modal: true,
        show: {
            effect: 'drop',
            direction: "rigth"
        },
        hide: {
            effect: 'drop',
            direction: "left"
        },
        open: function() {
            $(".ui-widget-overlay").attr('onclick', 'close_img_windows()');
        },
        close: function() {
            $('.ui-widget-overlay').addClass("ui-display-element");
        },
        beforeClose: function() {
            $("body").css("overflow", "auto");
        }
    });
    $(Group_img).click(function(event) {
        var height = $(window).height() - 100;
        $('#dialog').css('height', height);
        setTimeout(function() {
            var id_element = "#" + event.target.id,
            title = $(id_element).attr("alt"),
            url_orig = event.target.src,
            id_img = event.target.id.replace('img_min_', '');
            url_orig = url_orig.replace('img/other/140x170/media/', 'media/');
            url_orig = url_orig.replace('img/other/137x166/media/', 'media/');
            description = $(id_element).attr("title");
            $("body").css("overflow", "hidden");
            $('.ui-widget-overlay').removeClass("ui-display-element");
            $("#dialog").html('<table><tr><td class="left" ><img src="' + url_orig + '" /><hr /><p>' + description + '</p></td><td><div class="right" style="max-height: ' + height + 'px;"><div class="title_section cufon_myriad">Comentarios:</div><div id="loader_comment"></div><div></td></tr></table>');
            $("#ui-dialog-title-dialog").html(title);
            $.ajax({
                url: "http://" + PATH_FILE + "/search_comment.php?idimg=" + id_img,
                beforeSend: function() {
                    $("#loader_comment").html('<img id="loader_gif_general" src="http://' + PATH_FILE + '/site/template/img/loader1.gif" />');
                },
                success: function(data) {
                    setTimeout(function() {
                        $("#loader_comment").html(data);
                    }, 500);
                }
            });
            $("#dialog").dialog("open");
            Cufon('.cufon_gudea', {
                fontFamily: 'Gudea'
            });
            Cufon('.cufon_myriad', {
                fontFamily: 'Myriad Pro'
            });
        }, 500);
});
}
;
$(function() {
    show_img_windows(".img_min");
});
function close_img_windows() {
    $(".ui-widget-overlay").attr('onclick', '');
    setTimeout(function() {
        $("#dialog").dialog("close");
    }, 500);
}
function moreContent(id) {
    $('#' + id + ' .more').hide("fade", 1000, function() {
        $('#' + id + ' ul').animate({
            height: 186
        }, "bounce");
        $('#' + id).animate({
            height: 241
        }, "bounce");
    });
}
*/