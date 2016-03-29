/**
 * Created by root on 26/11/15.
 */
var filter_click = 0;
var global_url = '';
$(document).ready(function(){
    atualiza();
});


function atualiza(){

    $.ajax({
        url: '/solicitacao/get',
        success: function(data) {
            // $('#box-conteudo').html(data);
            $("#notifica").html(data);
        },
        beforeSend: function(){
            // $('.loader').css({display:"block"});
        },
        complete: function(){
            // $('.loader').css({display:"none"});
        }
    });

    setTimeout('atualiza()',5000);
}