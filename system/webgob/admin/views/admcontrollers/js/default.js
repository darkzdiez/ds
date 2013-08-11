function return_module(data) {
    ajaxLoaderClose();
    if(typeof data.result_error == "undefined" || data.result_error==false){
        fdialog(null,data.messageAction,'success', data.locationAction);
        $('#list-admcontrollers tbody').prepend('<tr><td>' + data.name + '</td><td>' + data.description + '</td><td><div ref="'+data.id+'" class="styleLink edit close">Editar</div> <div ref="'+data.id+'" class="styleLink state disable">Desactivar</div></td></tr>');
        startFunction();
        tableContent();   
    }else{
        fdialog(null,data.result_error,'message');
    }
};
$(document).ready(function() {
    startFunction();
    method.add();
    method.remove();
});
function startFunction() {
    $(".state").on({
        click: function(){
            pointer=this;
            var id=$(pointer).attr('ref');
            ajaxLoader();
            if($(pointer).hasClass('disable')){
                url=PATH_NAV+'admcontrollers/disable/'+id;
                text='Activar';
                addClass='enable';
                removeClass='disable';
            }else if($(pointer).hasClass('enable')){
                url=PATH_NAV+'admcontrollers/enable/'+id;
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
                url=PATH_NAV+'admcontrollers/edit/'+id;
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
                        editSubmit(pointer);

                    }
                });
            }else{
                url=PATH_NAV+'admcontrollers/enable/'+id;
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
function editSubmit(pointer){
    $("#list-admcontrollers .admcontrollers .buttonbar_close").on({
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
method={
    add:function(){
        $("#list-admcontrollers .admcontrollers-method").on({
            submit: function(event){
                ajaxLoader();
                pointer=this;
                var url = $(pointer).attr('action');
                var data = $(pointer).serialize();
                pointer.reset();
                field=convertDataSerializeToArray(data);
                event.preventDefault();
                $.ajax({ 
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    data: data,
                    success: function(data){
                        ajaxLoaderClose();
                        if(typeof data.result_error == "undefined" || data.result_error==false){
                            fdialog(null,data.messageAction,'success');
                            $(pointer).find('.listMethodController').append('<dt><strong>'+data.name+'</strong> <div ref="' + data.id + '" class="styleLink removeMethod">X</div></dt>');
                        }else{
                            fdialog(null,data.result_error,'message');
                        }
                    }
                });
            }
        });
    },
    remove:function(){
        $(".listMethodController .removeMethod").on({
            click: function(){
                ajaxLoader();
                pointer=this;
                var id=$(pointer).attr('ref');
                var url = PATH_NAV+'method/remove/'+id;
                $.ajax({ 
                    type: "get",
                    url: url,
                    dataType: 'json',
                    success: function(data){
                        ajaxLoaderClose();
                        if(typeof data.result_error == "undefined" || data.result_error==false){
                            fdialog(null,data.messageAction,'success');
                            $(pointer).parents("dt").remove();
                        }else{
                            fdialog(null,data.result_error,'message');
                        }
                    }
                });
            }
        });
    }
}