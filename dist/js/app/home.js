/**
 * Created by root on 26/11/15.
 */

$(document).ready(function(){


        init();
        filter();

});

function init(){
    $.ajax({
        url: 'listagem/post',
        success: function(data) {
            $('#conteudo').html(data);

            //alert(data);
        },
        beforeSend: function(){
            $('.loader').css({display:"block"});
        },
        complete: function(){
            $('.loader').css({display:"none"});
        }
    });


}

function filter(){
    $(".filter").click(function(){
        // e.event.preventDefault();
        var href = this.href;
        $('.loader').css({display:"block"});

        $.ajax({
            url: href,
            success: function(data) {
                $('#conteudo').html(data);

                //alert(data);
            },
            beforeSend: function(){
                $('.loader').css({display:"block"});
            },
            complete: function(){
                $('.loader').css({display:"none"});
            }
        });
        return false;
    });

}