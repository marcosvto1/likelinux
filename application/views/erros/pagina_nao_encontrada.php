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
                                <div class="col-md-2"></a></div>
                                <div class="col-md-8">
                                    <div class="span2">
                                     <div class="alert alert-info"><h2>Pagina Não Encontrada</h2></div>
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
<script>
    $(function () {
        $('.po').popover({
            container: 'body'
        })

    })

</script>
</body>
</html>
