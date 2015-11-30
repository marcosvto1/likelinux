/**
 * Created by root on 26/11/15.
 */

$(document).ready(function(){


        init();
        filter();

});

function init(){
    /*$.ajax({
        url: 'listagem/postUser',
        success: function(data) {
            $('#conteudo').html(data);

           // alert(data);
        },
        beforeSend: function(){
            $('.loader').fadeOut();

        },
        complete: function(){
            $('.loader').css({display:"none"});
        }
    });*/


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

var is_loading = false; // initialize is_loading by false to accept new loading
var limit = 4; // limit items per page
$(function() {
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
            if (is_loading == false) { // stop loading many times for the same page
                // set is_loading to true to refuse new loading
                is_loading = true;
                // display the waiting loader
                $('#loader').show();
                //alert(last_id);
                // execute an ajax query to load more statments
                $.ajax({
                    url: 'listagem/postUser',
                    type: 'POST',
                    data: {last_id:last_id, limit:limit},
                    success:function(data){
                        // now we have the response, so hide the loader
                        $('#loader').hide();
                        // append: add the new statments to the existing data
                        $('#conteudo').append(data);
                        // set is_loading to false to accept new loading
                        is_loading = false;
                    }
                });
            }
        }
    });
});