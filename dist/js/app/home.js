/**
 * Created by root on 26/11/15.
 */
var filter_click = 0;
var global_url = '';
$(document).ready(function(){


        init();
        filter();
    removerPost();

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

function removerPost(){
    $("#remover_post").click(function() {
        alert("Deseja realmente remover");
    });
}

function filter(){
    $(".filter").click(function(){
        // e.event.preventDefault();
        filter_click= 1;
        global_url = this.href;
        var href = this.href;
        $('.loader').css({display:"block"});
     //   alert('ss');

        $.ajax({
            url: href,
            success: function(data) {
                $('#box-conteudo').html(data);

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
year = 2013; i = 3;
var flag = true;

//alert(filter_click);
$(function() {
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
           if(contador >= 9) {
               if (flag) { // stop loading many times for the same page
                   // set is_loading to true to refuse new loading
                   flag = false;
                   var url = 'listagem/postUser';
                   // display the waiting loader
                   $('#loader').show();
                   // alert(filter_click);
                   if (filter_click == 1) {
                       url = global_url;
                   }
                   //alert(url);
                   // execute an ajax query to load more statments

                   setTimeout(function () {

                       $.ajax({
                           url: url,
                           type: 'POST',
                           data: {last_id: last_id, limit: limit},
                           success: function (data) {
                               // now we have the response, so hide the loader
                               $('#loader').hide();
                               // append: add the new statments to the existing data
                               $('#box-conteudo').append(data);
                               // set is_loading to false to accept new loading

                           },
                           beforeSend: function () {

                           }
                       });
                       flag = true;
                   }, 800);

               }
           }
        }
    });
});