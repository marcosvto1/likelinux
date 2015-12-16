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
                                        <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">Criar Grupo</button><hr/>
                                    Buscar:&nbsp<input id="filter" type="text" /><a href="#clear" class="clear-filter" title="clear filter"></a>
                                        <br/> <br/>

                                        <div class="row">
                                            <div class="col-md-4">

                                    <table data-filter="#filter" class="table" data-page-size="5">
                                        <thead>
                                        <!--<tr>
                                            <th width="30" data-class="expand">
                                                <span>Nome</span>
                                            </th>
                                            <th width="20">
                                                <span>
                                                 Remover
                                                </span>
                                            </th>

                                        </tr>
-->
                                        </thead>
                                        <tbody>

                                        <?php foreach($grupos_user as $key => $grupo) {?>
                                        <tr>
                                            <td><a  href="/grupo/<?php print $grupo->id_grupo; ?>/<?php print url_title($grupo->nome_grupo); ?>"><?php print $grupo->nome_grupo; ?></a></td>
                                            <td> <a href="/remover/post/#" id="remover_post" class="po" data-toggle="popover"><i class="fa fa-trash-o fa-2x"></i>
                                                    </i></a></td>
                                        </tr>

                                        <?php } ?>
                                      <!--  <tr>
                                            <td><a href="#">ZUeraMiliegraus</a></td>
                                            <td> <a href="/remover/post/#" id="remover_post" class="po" data-toggle="popover"><i class="fa fa-trash-o fa-2x"></i>
                                                    </i></a></td>
                                        </tr>

                                        <tr>
                                            <td><a href="#">Fut dos Perebas</a></td>
                                            <td> <a href="/remover/post/#" id="remover_post" class="po" data-toggle="popover"><i class="fa fa-trash-o fa-2x"></i>
                                                    </i></a></td>
                                        </tr>
                                        <tr>
                                            <td ><a href="#">Click</a></td>
                                            <td> <a href="/remover/post/#" id="remover_post" class="po" data-toggle="popover"><i class="fa fa-trash-o fa-2x"></i>
                                                    </i></a></td>
                                        </tr>

                                        <tr>
                                            <td><a href="#">Futbol das Antigas</a></td>
                                            <td> <a href="/remover/post/#" id="remover_post" class="po" data-toggle="popover"><i class="fa fa-trash-o fa-2x"></i>
                                                    </i></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Academia</a></td>
                                            <td> <a href="/remover/post/#" id="remover_post" class="po" data-toggle="popover"><i class="fa fa-trash-o fa-2x"></i>
                                                    </i></a></td>
                                        </tr>
-->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/dist/js/bootstrap.min.js"></script>
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

    })

</script>
</body>
</html>
