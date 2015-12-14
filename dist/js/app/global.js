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
year = 2013; i = 3;
var flag = true;
$(function() {
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
            if (flag) { // stop loading many times for the same page
                // set is_loading to true to refuse new loading
                flag = false;
                // display the waiting loader
                $('#loader').show();
                //alert(last_id);
                // execute an ajax query to load more statments
                setTimeout(function(){

                    $.ajax({
                        url: 'listagem/post',
                        type: 'POST',
                        data: {last_id:last_id, limit:limit},
                        success:function(data){
                            // now we have the response, so hide the loader
                            $('#loader').hide();
                            // append: add the new statments to the existing data
                            $('#box-conteudo').append(data);
                            // set is_loading to false to accept new loading

                        },
                        beforeSend:function(){

                        }
                    });
                    flag = true;
                },800);

            }
        }
    });
});