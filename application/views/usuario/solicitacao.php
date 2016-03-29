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
                <div class="column col-sm-12" id="main">

                    <div class="full col-sm-12">

                        <div id="conteudo-main">

                            <div class="row">
                                <div class="col-md-8">





                                </div>


                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="widget">
                                        <br/>

                                        Buscar:&nbsp<input id="filter" type="text" /><a href="#clear" class="clear-filter" title="clear filter"></a>
                                        <br/> <br/>

                                        <div class="row">
                                            <div class="col-md-12">

                                                <table data-filter="#filter" class="table" data-page-size="5">
                                                    <thead>


                                                    </thead>
                                                    <tbody id="conteudo-tabela">
                                                    <?php foreach($solicitacoes as $key => $s) {?>
                                                        <tr>
                                                            <td>
                                                                <b><?php print $s->login_usuario; ?></b></td>
                                                            <td>
                                                                Solicita Participação do &nbsp<b><?php print $s->nome_grupo; ?></b>
                                                            </td>
                                                            <td> <a href="/solicitacao/confirmar/<?php print $s->id_solicitacao ?>/<?php print $s->id_grupo ?>" id="remover_post" class="confirma_soli" data-toggle="popover">Confirmar
                                                                    </i></a></td>
                                                            <td> <a href="/remover/post/#" id="" class="po" data-toggle="popover">Recusar
                                                                </a></td>
                                                        </tr>

                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <br/>
                                        <div id="conteudo-pagination"></div>

                                        <br/> <br/>

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="loader"><img src="/dist/img/loading.GIF"></div>-->






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

        $('.clear-filter').click(function (e) {
            e.preventDefault();
            $('table').trigger('footable_clear_filter');
        });
    });
</script>
<script>
    $(function () {
        $('.po').popover({
            container: 'body'
        })

    });

    $(document).ready(function(){

       // carregar_solicitacao();
    });



    function carregar_solicitacao(){
        var href = 'solicitacao/listar';
        $.ajax({
            url: href,
            success: function(data) {
                $('#conteudo-tabela').html(data);
            },
            beforeSend: function(){
                $('.loader').css({display:"block"});
            },
            complete: function(){
                $('.loader').css({display:"none"});
            }
        });



    }
    $('.confirma_solicitacao').click(function(e){
      //  e.preventDefault();
        //var href = this.href;

        /*$.ajax({
         url: href,
         success: function(data) {
         // $('#box-conteudo').html(data);
         //carregar_solicitacao();
         alert("sss");

         },
         beforeSend: function(){
         $('.loader').css({display:"block"});
         },
         complete: function(){
         $('.loader').css({display:"none"});
         }
         });
         return false;*/
    });

    function teste() {
        var href = this.href;
        alert(href);

    }
</script>
</body>
</html>
