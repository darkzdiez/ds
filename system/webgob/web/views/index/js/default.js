$(document).ready(function() {
    cargarRecursos(PATH_FILE + 'views/' + 'index/css/default.css');
    /*var categorySEARCH = [14, 15, 16];
    for (var c in categorySEARCH) {
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: PATH_NAV + 'noticias/buscarPorCategoriaJSON/' + categorySEARCH[c] + '/3',
            success: function(data) {
                for (var i in data) {
                    if (i == 0) {
                        $('#containerNewsHome').append('<article>'
                                + '<div class="noticias_inicio">'
                                + '<div class="der"></div>'
                                + '<div class="med">'
                                + '<header>'
                                + '<div class="fecha cufon_gudea"><a title="Mas Noticias del 07 Enero" href="?">07 Ene</a><br>0 Comentario</div>'
                                + '<h3 class="titulo"><a href="http://yaracuy.gob.ve/web/noticias/more/5303-Entregan-coleccin-bicentenaria-a-estudiantes-de-media-general-y-tcnica">' + data[i].title + '</a></h3>'
                                + '</header>'
                                + '<div class="linea"></div>'
                                + '<div class="foto"><img style="max-height: 170px; max-width: 170px;" alt="" src="' + PATH_SYSTEM + data[i].location + data[i].idarticle + '/200/' + data[i].filename + '" class="img_min" id="img_min_7057" itemprop="file"></div>'
                                + '<div class="categoria">21 Ene en <a href="http://yaracuy.gob.ve/web/noticias/category/educación">' + data[i].categoryTipe + '</a>, <a href="http://yaracuy.gob.ve/web/noticias/category/regional">' + data[i].categoryLocation + '</a> por <a href="?">Prensa</a></div>'
                                + '<p class="descripcion">' + data[i].summary + '</p>'
                                + '<div class="leermas"><a href="http://yaracuy.gob.ve/web/noticias/more/5303-Entregan-coleccin-bicentenaria-a-estudiantes-de-media-general-y-tcnica">Leer Mas...</a></div>'
                                + '</div>'
                                + '<div class="izq"></div>'
                                + '</div>'
                                + '</article>');
                    } else {
                        $('#containerNewsHome').append('<div class="mini_container_home">'
                                + '<div class="categoria">21 Ene en <a href="http://yaracuy.gob.ve/web/noticias/category/deporte">' + data[i].categoryTipe + '</a>, <a href="http://yaracuy.gob.ve/web/noticias/category/regional">' + data[i].categoryLocation + '</a></div>'
                                + '<div style="font-size: 16px;" class="title_section"><a href="http://yaracuy.gob.ve/web/noticias/more/5294-Yaracuyanos-no-aguant-y-empat-a-2-con-el-Monagas">' + data[i].title + '</a></div>'
                                + '<table>'
                                + '<tbody><tr>'
                                + '<td class="td_img"><img style="max-height: 83px; max-width: 83px;" alt="" src="' + PATH_SYSTEM + data[i].location + data[i].idarticle + '/' + data[i].filename + '" itemprop="file" id="img_min_7048" class="img_min"></td>'
                                + '<td><p>' + data[i].summary + '</p></td>'
                                + '</tr>'
                                + '</tbody></table>'
                                + '<div class="more">0 <a href="#">Comentarios</a>, <a href="http://yaracuy.gob.ve/web/noticias/more/5294-Yaracuyanos-no-aguant-y-empat-a-2-con-el-Monagas">Leer Mas...</a></div>'
                                + '</div>');
                    }
                }
            }
        });
    }*/
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: PATH_NAV + 'coverad/',
        success: function(data) {
            for (var i in data) {
                var slidehtml='<div class="item" style="background-image:url(' + PATH_SYSTEM + data[i].location + data[i].id + '/' + data[i].filename + ')">';
                if (data[i].dtexto==1) {
                    slidehtml+='<div class="descriptionContainer">' +
                        '<div class="descripcion">' +
                        '<div class="titulo">' + data[i].toptitle + '</div>' +
                        '<div class="subtitulo">' + data[i].title + '</div>' +
                        '<div class="comentario">' + data[i].description + '.</div>' +
                        '</div>' +
                        '</div>';
                };
                slidehtml+='<div class="nav_slide"></div>' +
                '</div>';
                $('#slide_ppal').append(slidehtml);
            }
            $('#slide_ppal').cycle({
                fx: 'fade',
                speed: 'fast',
                timeout: 6000,
                pager: '.nav_slide',
                pause: 1
            });
//            $('.descriptionContainer').on({
//                mouseenter: function() {
//                    $('.descriptionContainer .descripcion').stop().animate({
//                        opacity: 0.25,
//                        width: 0
//                    }, 500);
//                },
//                mouseleave: function() {
//                    $('.descriptionContainer .descripcion').stop().animate({
//                        opacity: 1,
//                        width: 400
//                    }, 500);
//                }
//            });
            Cufon('#slide_ppal .descripcion .titulo', {
                fontFamily: 'Gudea',
                textShadow: '1px 1px 2px #fff'
            });
            Cufon('#slide_ppal .descripcion .subtitulo', {
                fontFamily: 'Gudea',
                textShadow: '1px 1px 2px #000'
            });
            Cufon('#slide_ppal .descripcion .subtitulo', {
                fontFamily: 'Gudea',
                textShadow: '1px 1px 2px #000'
            });
            Cufon('#slide_ppal .titulo_adi .comentario_1', {
                fontFamily: 'Gudea'
            });
            Cufon('#slide_ppal .titulo_adi .comentario_2_sombra', {
                fontFamily: 'Gudea'
            });
            Cufon('#slide_ppal .titulo_adi .comentario_2', {
                fontFamily: 'Gudea'
            });

        }
    });
    var countMaxContainer = 1;
    function mas() {
        if (countMaxContainer < 10) {
            $('#add_more_new_home .text').hide();
            var selectedEffectHide = "fade";
            var options = {};
            $('#loader_gif').fadeIn(500);
            $.ajax({
                url: PATH_NAV + "noticias/morehome/" + countMaxContainer,
                beforeSend: function() {
                },
                success: function(data) {
                    $('#more_new_home').append(data);
                    $('.new_triple_container').show("blind", options, 2000, function() {
                        if (countMaxContainer == 9) {
                            $('#add_more_new_home').hide("blind", options, 2000);
                        } else {
                            $('#add_more_new_home').addClass('active');
                        }
                    });
                    $('.triple_container').removeClass("new_triple_container");
                    $('#loader_gif').hide(selectedEffectHide, options, 1500, function() {
                        if (countMaxContainer < 9) {
                            $('#add_more_new_home .text').show("fade", null, 300);
                        }
                    });
                    countMaxContainer++;
                }
            });
        }
    }
    countMaxContainer = 1;
    $('#add_more_new_home').on({
        click: function() {
            if (countMaxContainer < 10 && $('#add_more_new_home').hasClass('active')) {
                $('#add_more_new_home').removeClass('active');
                $.ajax({
                    url: PATH_NAV + "index/morenews/",
                    type: "POST",
                    data: { 'idLastNews': idLastNews},
                    dataType: 'json',
                    beforeSend: function() {
                        $('#add_more_new_home .text').hide();
                        $('#loader_gif').fadeIn(500);
                    },
                    success: function(data) {
                        idLastNews=data[0];
                        var html = '<div class="triple_container new_triple_container">';
                        for (var i in data[1]) {
                            html += '<div class="newsMoreHome" style="display:none;">';
                            html += '<a href="' + PATH_NAV + 'noticias/more/' + data[1][i].idarticle + '-Cuba-promover-desde-CELAC-integracin-solidaridad-y-paz-regionales" class="newsMoreHome" style="background-image: url(' + "'" + DOMAIN + data[1][i].filename + "'" + '); display:block;">';
                            html += '<div class="infoPanel"><span>' + data[1][i].title + '</span></div>';
                            html += '</a>';
                            html += '</div>';
                        }
                        html += '</div>';
                        $('.triple_container').removeClass("new_triple_container");
                        $('#more_new_home').append(html);
                        var countPrintItem = 1;
                        $(".new_triple_container .newsMoreHome").first().show("slow", function showNext() {
                            countPrintItem++;
                            $(this).next(".new_triple_container .newsMoreHome").show("slow", showNext);
                            if (countPrintItem === 3) {
                                $('#loader_gif').hide('slow', function() {
                                    $('#add_more_new_home .text').fadeIn(500);
                                    $('#add_more_new_home').addClass('active');
                                });
                            }
                        });
                    }
                });
                countMaxContainer++;
            }
        }
    });
});