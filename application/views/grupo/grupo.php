<?php  $this->load->view('template/topo'); ?>
<!--  fim topo -->


<!-- conteudo principal -->
<div class="container" id="box-main">

    <div class="row">
        <!-- menu -->
        <div class="col-md-2" id="box-profile">
            <!-- sidebar -->
            <?php  $this->load->view('template/menu'); ?>
            <!-- /sidebar -->
        </div>
        <!-- fim menu -->

        <!-- conteudo de post -->
        <div class="col-md-10">
            <div class="row">
                <!-- main -->


                <div class="column col-sm-12" id="main-grupo">

                    <?php $this->load->view('template/menu_grupo');?>



                    <div class="column col-sm-12" id="main">
                        <div class="full col-sm-12">
                            <div id="conteudo-main">
                                <div class="row">

                                    <div class="col-md-9">

                                        <div id="box-conteudo" >

                                            <div class="widget">
                                                <div class="row">
                                                    <div class="col-md-8">

                                                        <br/>

                                                        Buscar:&nbsp<input id="filter" type="text" /><a href="#clear" class="clear-filter" title="clear filter"></a>
                                                        <br/> <br/>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <br/>
                                                        <select class="filter-status" id="fil_status">
                                                            <option></option>
                                                            <?php foreach($categorias as $key => $categoria){?>
                                                                <option value="<?php print $categoria->nome_categoria; ?>"><?php print $categoria->nome_categoria; ?></option>


                                                            <?php }?>

                                                        </select>

                                                        <br/> <br/>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <table data-filter="#filter" class="table" data-filter-text-only="true" data-page-size="7">
                                                            <thead>

                                                            </thead>
                                                            <tbody>

                                                            <?php  foreach($posts as $key => $post) { ?>
                                                                <?php
                                                                if($post->tipo_post == 1){
                                                                    $link_post = '<a href="'.$post->conteudo_post.'" target="_blank">'.$post->titulo_post.'</a>';
                                                                }else if($post->tipo_post == 2){
                                                                    $link_post = '<a href="/v/'.$post->id_post.'/'.url_title($post->titulo_post).'" >'.$post->titulo_post.'</a>';
                                                                }else{
                                                                    $link_post = '<a href="'.$post->conteudo_post.'" target="_blank" >'.$post->titulo_post.'</a>';
                                                                }

                                                                ?>
                                                                <tr>
                                                                    <td> <a href="/perfil/<?php print url_title($post->login_usuario).'/'.$post->id_usuario;?>" id="imagem_user"><img src="<?php print $post->imagem_usuario; ?>" class="img-thumbnail img-circle" ></a></td>

                                                                    <td><a  href="#"><?php print $link_post; ?></a></td>
                                                                    <td><?php print $post->nome_categoria; ?></td>
                                                                    <td> <a href="/remover/post/#" id="remover_post" class="po" data-toggle="popover"><i class="fa fa-trash-o fa-2x"></i>
                                                                            </i></a></td>
                                                                </tr>

                                                            <?php } ?>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <br/>
                                                <ul id="pagination" class="footable-nav"><span>Paginas:</span></ul>
                                                <br/> <br/>

                                            </div>





                                        </div>




                                    </div>

                                    <div class="col-md-3 widget">

                                        <div class="col-sm-12" id="featured">
                                            <div class="page-header2 text-muted">
                                                Categorias   <hr>
                                            </div>
                                        </div>



                                        <ul class="nav nav-pills nav-stacked">

                                            <?php foreach($categorias as $key => $categoria){?>


                                                <li class="nav-item">
                                                    <a class="nav-link filter" data-url="<?php print $categoria->nome_categoria;?>" id="" href="/<?php print $categoria->nome_categoria; ?>"><?php print $categoria->nome_categoria; ?></a>
                                                </li>

                                            <?php }?>

                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <!-- loadind -->
                            <div class="col-sm-12">
                                <p id="loader">
                                    <!--<img src="/dist/img/ajax-loader.gif">-->
                                    <img src="/dist/img/loadinghori.GIF" align="center">
                                </p>
                                <br/>
                            </div>

                        </div><!-- /col-9 -->
                    </div>


                </div>



            </div> <!--  fim main -->

        </div> <!-- fim row -->

    </div>
    <!-- fim conteudo de post -->


    <!-- categorias -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="#">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Criar Grupo</h4>
                    </div>
                    <div class="modal-body">

                        <fieldset class="form-group">
                            <label for="formGroupExampleInput">Nome do Grupo</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                        </fieldset>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Criar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- fim categorias -->
</div>

<footer>
</footer>
</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php  $this->load->view('template/jsinclude'); ?>
<script src="/dist/footables/js/footable.js" type="text/javascript"></script>
<script src="/dist/footables/js/footable.filter.js" type="text/javascript"></script>
<script src="/dist/footables/js/footable.paginate.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('table').footable();

        $('table').footable().bind('footable_filtering', function (e) {
            var selected = $('.filter-status').find(':selected').text();
            if (selected && selected.length > 0) {
                e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                e.clear = !e.filter;
            }
        });

        $('.clear-filter').click(function (e) {
            e.preventDefault();
            $('table').trigger('footable_clear_filter');
        });

        $('.filter-status').change(function (e) {
            e.preventDefault();
           // alert($('#filter').val());
            $('table').trigger('footable_filter', {filter: $('#fil_status').val()});
        });

        $('.filter').click(function(e){
            e.preventDefault();

            // alert($('#filter').val());
            $('table').trigger('footable_filter', {filter: jQuery(this).attr("data-url")});
        });

    });
</script>
<script>
    $(function () {
        $('.po').popover({
            container: 'body'
        })

    })

    $(document).ready(function(){
        atualiza();
    });


    function atualiza(){

        $.ajax({
            url: '/solicitacao/get',
            success: function(data) {
                // $('#box-conteudo').html(data);
               $("#notifica").html(data);
              //  alert(data);
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
</script>
</body>
</html>
