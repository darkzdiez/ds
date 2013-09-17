function return_module(data) {
    ajaxLoaderClose();
    if(typeof data.result_error == "undefined" || data.result_error==false){
        fdialog(null,data.messageAction,'success', data.locationAction);
        $('#list-profile tbody').prepend('<tr><td>' + data.name + '</td><td>' + data.description + '</td><td><a href="#" ref="'+data.id+'" class="edit close">Editar</a> <a href="#" ref="'+data.id+'" class="state disable">Desactivar</a></td></tr>');
        startFunction();
        tableContent();   
    }else{
        fdialog(null,data.result_error,'message');
    }
};
$(document).ready(function() {
    startFunction();
});
function startFunction() {
    $(".state").on({
        click: function(){
            pointer=this;
            var id=$(pointer).attr('ref');
            ajaxLoader();
            if($(pointer).hasClass('disable')){
                url=PATH_NAV+'profile/disable/'+id;
                text='Activar';
                addClass='enable';
                removeClass='disable';
            }else if($(pointer).hasClass('enable')){
                url=PATH_NAV+'profile/enable/'+id;
                text='Desactivar';
                addClass='disable';
                removeClass='enable';
            }
            $.ajax({ 
                type: "GET",
                dataType: 'json',
                url: url,
                success: function(data){
                    ajaxLoaderClose();
                    if(typeof data.result_error == "undefined" || data.result_error==false){
                        $(pointer).text(text);
                        $(pointer).removeClass(removeClass);
                        $(pointer).addClass(addClass);
                        fdialog(null,data.messageAction,'success');
                        tableContent();
                    }else{
                        fdialog(null,data.result_error,'message');
                    }
                }
            });
        }
    });
    var count = 0;
    $(".edit").on({
        click: function(){
            pointer=this;
            var id=$(pointer).attr('ref');
            if($(pointer).hasClass('close')){
                ajaxLoader();
                url=PATH_NAV+'profile/edit/'+id;
                text='Cerrar';
                addClass='open';
                removeClass='close';
                $.ajax({ 
                    type: "GET",
                    dataType: 'html',
                    url: url,
                    success: function(data){
                        ajaxLoaderClose();
                        $(pointer.parentNode.parentNode).after('<tr><td colspan="3">'+data+'</td></tr>');
                        $("#list-profile .buttonbar_close").on({
                            click: function(){
                                if($(this).attr("type")==="submit"){
                                    ajaxLoader();
                                    var url = $(this).parents("form").attr('action');
                                    var data = $(this).parents("form").serialize();
                                    $.ajax({ 
                                        type: "POST",
                                        url: url,
                                        dataType: 'json',
                                        enctype: 'multipart/form-data',
                                        data: data,
                                        success: function(data){
                                            ajaxLoaderClose();
                                            if(typeof data.result_error == "undefined" || data.result_error==false){
                                                fdialog(null,data.messageAction,'success');
                                                $(pointer.parentNode).prev().prev().text(data.name);
                                                $(pointer.parentNode).prev().text(data.description);
                                            }else{
                                                fdialog(null,data.result_error,'message');
                                            }
                                        }
                                    });
                                }
                                text='Editar';
                                addClass='close';
                                removeClass='open';
                                $(pointer).text(text);
                                $(pointer).removeClass(removeClass);
                                $(pointer).addClass(addClass);
                                $(pointer.parentNode.parentNode.nextSibling).remove();
                            }
                        });
                    }
                });
            }else{
                url=PATH_NAV+'profile/enable/'+id;
                text='Editar';
                addClass='close';
                removeClass='open';
                $(pointer.parentNode.parentNode.nextSibling).remove();
            }
            $(pointer).text(text);
            $(pointer).removeClass(removeClass);
            $(pointer).addClass(addClass);
        }
    });
}