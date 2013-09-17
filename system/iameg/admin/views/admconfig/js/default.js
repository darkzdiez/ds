function return_module(data) {
    ajaxLoaderClose();
    if(typeof data.result_error == "undefined" || data.result_error==false){
        fdialog(null,data.messageAction,'success', data.locationAction);
        $('#list-client tbody').append('<tr><td>' + data.rif + '</td><td>' + data.name + '</td><td>' + data.contact + '</td><td><a href="' + HOST_PATHS + 'client/edit/' + data.id + '">Editar</a> <a href="' + HOST_PATHS + 'client/lock/' + data.id + '">Desactivar</a></td></td></tr>');
        tableContent();   
    }else{
        fdialog(null,data.result_error,'message');
    }
};
$(document).ready(function() {
    item=2
    total=80000;
    $("#add_item_bill").click(function(){
        item++;
        total+=40000;
        $('#list-item-bill tbody').append('<tr>'+
            '<td>'+item+'</td>'+
            '<td style="padding: 0px 0px 3px 0px;">'+
            '<div class="ui-state-default button_ui">'+
            '<span class="ui-icon ui-icon-search"></span>'+
            'Buscar'+
            '</div>'+
            '</td>'+
            '<td style="padding: 0px 0px 3px 0px;"><input type="text" name="name" placeholder="1" value="" style="border-width: 0px; width: 80PX;" /></td>'+
            '<td style="padding: 0px 0px 3px 0px;"><input type="text" name="name" placeholder="2000" value="" style="border-width: 0px; width: 80px;" /><span style="float: left; margin-top: 10px;">Bs</span></td>'+
            '<td>4000Bs</td>'+
            '<td>'+
            '<div class="ui-state-default button_ui del-item-bill" style="padding: 0.4em 0.6em 0.4em 0.7em;">'+
            'X'+
            '</div>'+
            '</td>'+
            '</tr>');
        $("#bill-total").html(total);
    });
    $(".del-item-bill").click(function(){
        $(this.parentNode.parentNode).remove();
    });
    totalPrice=[];
    function calcularTotal(){
        var resultSubTotal=0;
        for(i in totalPrice){
            resultSubTotal=resultSubTotal+totalPrice[i];
        }
        $('#billSubTotal').html(resultSubTotal);
        resultIvaTotal=resultSubTotal * 0.12;
        $('#billIvaTotal').html(resultIvaTotal);
        resultTotal=resultSubTotal+resultIvaTotal;
        $('#billTotal').html(resultTotal);
    }
    //alert(totalPrice[12]);
    function calcularPrice(handler){
        var id = $(handler).attr('ref');
        var cant = $('#cant'+id).val();
        var multiple = $('#multiple'+id).attr('value');
        var price = $('#price'+id).attr('value');
        var total=cant*multiple*price;
        $('#totalPrice'+id).text(total);
        totalPrice[id]=total;
        calcularTotal();
    }
    $('.cant').change(function(){
        calcularPrice(this);
    });
    $('.multiple').change(function(){
        calcularPrice(this);
    });
})