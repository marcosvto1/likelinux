<?php  $this->load->view('template/topo'); ?>
<!--  fim topo -->

<!-- conteudo principal -->
<div class="container" id="box-main">

    <div class="row">
        <!-- menu -->
        <div class="col-md-2" id="box-profile">
            <!-- sidebar -->
            <?php include '/home/u102884618/public_html/application/views/usuario/menu.php'; ?>
            <!-- /sidebar -->
        </div>
        <!-- fim menu -->

        <!-- conteudo de post -->
        <div class="col-md-7">
            <div class="row">
                <!-- main -->
                <div class="column col-sm-12" id="main">

                    <div class="full col-sm-12">

                        <div id="conteudo-main">
                            <!-- <div class="loader"><img src="/dist/img/loading.GIF"></div>-->
                            <div id="box-conteudo" >
                                <?php  foreach($posts as $key => $post) { ?>
                                    <?php
                                    $remover ='';
                                    $editar= '';
                                    if($id_user == $post->id_usuario){
                                        $remover = '<a href="removar/post/'.$post->id_post.'"><i class="fa fa-trash-o fa-2x"></i></a>';
                                        $editar = '<a href="#"><i class="fa fa-pencil-square-o fa-2x"></i> </a>';
                                    }

                                    if($post->tipo_post == 1){
                                        $link_post = '<a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">Visualizar</a>';
                                    }else if($post->tipo_post == 2){
                                        $link_post = '<a href="/v/'.$post->id_post.'/'.url_title($post->titulo_post).'" class="btn btn-primary-outline">Visualizar</a>';
                                    }else{
                                        $link_post = '<a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">Visualizar</a>';
                                    }

                                    ?>
                                    <script> var last_id = <?php print $post->id_post; ?></script>
                                    <div class="widget">
                                        <div class="widget-controls">
                                            <?php print $editar; ?>
                                            <?php print $remover;?>


                                        </div>
                                        <div class="col-sm-12" id="featured">
                                            <div class="page-header2 text-muted">
                                                <?php print $post->nome_categoria; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <hr/>
                                                <h3><?php print $post->titulo_post; ?></h3>

                                                <h4><?php print $link_post; ?></h4>
                                                <h4>
                                                    <!--<h4><span class="label label-default"><a href="http://blog.hostdime.com.br/materias/tecnologia/varnish-cache-o-que-e-e-como-implementa-lo/">visualizar conteudo</a></span></h4><h4>-->
                                                    <p class="fs-mini text-muted"><time>25 mins</time> &nbsp; <i class="fa fa-map-marker"></i> &nbsp; near Amsterdam</p>

                                                    <!--<small class="text-muted" id="box-horas">1 hora agosto • <a href="#" class="text-muted">Mais Informação</a></small> -->
                                                </h4>
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="/perfil/<?php print url_title($post->login_usuario).'/'.$post->id_usuario;?>" class="pull-right" id="imagem_user"><img src="<?php print $post->imagem_usuario; ?>" class="img-thumbnail img-circle" ><?php print $post->login_usuario;?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
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

                </div> <!--  fim main -->

            </div> <!-- fim row -->

        </div>
        <!-- fim conteudo de post -->


        <!-- categorias -->
        <div class="col-md-2">
            <h4 class="headline text-muted">
                Categorias
            </h4>

            <hr>

            <ul class="nav nav-pills nav-stacked">

                <?php foreach($categorias as $key => $categoria){?>
                    <li class="nav-item">
                        <a class="nav-link filter" id="" href="filter/user/<?php print $categoria->id_categoria; ?>"><?php print $categoria->nome_categoria; ?></a>
                    </li>

                <?php }?>

            </ul>


        </div>
        <!-- fim categorias -->
    </div>

    <footer>
    </footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/dist/js/app/global.js"></script>
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
