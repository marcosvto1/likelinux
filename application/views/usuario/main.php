<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Like Linux</title>
    <!-- Bootstrap core CSS -->
    <link href="/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/dist/css/style.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,600' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>

        #box-profile{


            padding: 8px;
            background-color: #fbfbfb;
            border-color: #E5E6E9 #DFE0E4 #D0D1D5;
            border-image: none;
            border-style: solid;
            border-width: 1px;
            border-radius: 4px;


        }

        #box-profile a:hover {
            color: #00a4a5;
            background-color:transparent;

        }


        .widget {
            position: relative;
            margin-bottom: 30px;
            padding: 2px 20px;
            background: #fafafa;
            border-radius: 3px;
            border-color: #E5E6E9 #DFE0E4 #D0D1D5;
            border-image: none;
            border-style: solid;
            border-width: 1px;
        }



        .widget-controls {
            position: absolute;
            z-index: 1;
            top: 0;
            right: 0;
            padding: 14px;
            font-size: 12px;
        }
        .widget-controls>a {
            padding: 1px 4px;
            border-radius: 4px;
            color: rgba(0,0,0,0.4);
            -webkit-transition: color 0.15s ease-in-out;
            -o-transition: color 0.15s ease-in-out;
            transition: color 0.15s ease-in-out;
            color: #696969;
        }

        .page-header2 {
            margin-top: 10px;
            padding-top: 2px;
            font-weight:700;
            text-transform:uppercase;
            letter-spacing:2px;
            padding-bottom: 7px;
        }

        .fs-mini {
            font-size: 13px;
        }


    </style>
</head>

<body>

<!-- nav -->
<?php include '/home/u102884618/public_html/application/views/usuario/nav.php'; ?>
<!-- /nav -->

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
                                            <a href="#"><i class="fa fa-pencil-square-o fa-2x"></i> </a>
                                            <a href="#" id="po" class="po" data-toggle="popover"><i class="fa fa-trash-o fa-2x"></i>
                                                </i></a>
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
<script src="/dist/js/app/home.js"></script>
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
