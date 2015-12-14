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
                                <div class="col-md-4">   <a class="logo" href="#"><img class="img-thumbnail img-square" src="<?php print $imagem_usuario_perfil; ?>" ></a></div>
                                <div class="col-md-8">
                                    <div class="span8">
                                        <h3><?php print $nome_completo_perfil;?></h3>
                                        <h6>Email:<?php print $email_usuario_perfil?></h6>
                                        <h6>Descrição: <?php print $descricao_usuario_perfil?></h6>
                                       <!-- <h6>Old: 1 Year</h6>
                                        <h6><a href="#">More... </a></h6> -->
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
