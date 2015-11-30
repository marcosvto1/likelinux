<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Like Linux</title>

    <!-- Bootstrap core CSS -->
    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="/dist/css/style.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,600' rel='stylesheet' type='text/css'>
    <style>




    </style>
</head>

<body>

<!-- nav -->

<?php include '/home/u102884618/public_html/application/views/usuario/nav.php'; ?>
<!-- /nav -->

<!-- Main jumbotron for a primary marketing message or call to action -->


<div class="container" id="box-main">

    <div class="row">





        <div class="col-md-10">

            <div class="row">
                <!-- sidebar -->
                <?php include '/home/u102884618/public_html/application/views/usuario/menu.php'; ?>
                <!-- /sidebar -->

                <!-- main -->
                <div class="column col-sm-9" id="main">
                    <div class="padding">
                        <div class="full col-sm-9">

                            <div id="conteudo">
                                <!-- <div class="loader"><img src="/dist/img/loading.GIF"></div>-->
                               <?php   foreach($posts as $key => $post) { ?>
                                   <script> var last_id = <?php print $post->id_post; ?></script>
                                 <div class="col-sm-12" id="featured">
                                    <div class="page-header text-muted">
                                       <?php print $post->nome_categoria; ?>
                                    </div>
                                </div>

                                <!--/top story-->

                                <div class="row">
                                    <div class="col-sm-10">
                                        <h3><?php print $post->titulo_post; ?></h3>
                                        <h4><a href="<?php print $post->conteudo_post; ?>" target="_blank" class="btn btn-primary-outline">visualizar conteudo</a></h4><h4>

                                            <!--<h4><span class="label label-default"><a href="http://blog.hostdime.com.br/materias/tecnologia/varnish-cache-o-que-e-e-como-implementa-lo/">visualizar conteudo</a></span></h4><h4>-->
                                            <small class="text-muted">1 hora agosto • <a href="#" class="text-muted">Mais Informação</a></small>
                                        </h4>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/perfil/<?php print url_title($post->login_usuario).'/'.$post->id_usuario;?>" class="pull-right" id="imagem_user"><img src="<?php print $post->imagem_usuario; ?>" class="img-thumbnail img-circle" ><?php print $post->login_usuario;?></a>
                                    </div>
                                </div>

                                <?php } ?>





                            </div>


                            <div class="col-sm-12">

                                <p id="loader">
                                    <!--<img src="/dist/img/ajax-loader.gif">-->
                                    <img src="/dist/img/loadinghori.GIF" align="center">
                                </p>

                            </div>


                            <!--  <hr>

                              <h3 class="text-center">
                                  <a href="" target="ext">Marcos</a>
                              </h3>

                              <hr>
                            -->

                        </div><!-- /col-9 -->
                    </div><!-- /padding -->
                </div>

            </div>
            <!--  <h1>Alice in Wonderland, part dos</h1>
              <p>'You ought to be ashamed of yourself for asking such a simple question,' added the Gryphon; and then they both sat silent and looked at poor Alice, who felt ready to sink into the earth. At last the Gryphon said to the Mock Turtle, 'Drive on, old fellow! Don't be all day about it!' and he went on in these words:
                  'Yes, we went to school in the sea, though you mayn't believe it—'
                  'I never said I didn't!' interrupted Alice.
                  'You did,' said the Mock Turtle.</p>
              <div>
                  <span class="badge">Posted 2012-08-02 20:47:04</span><div class="pull-right"><span class="label label-default">alice</span> <span class="label label-primary">story</span> <span class="label label-success">blog</span> <span class="label label-info">personal</span> <span class="label label-warning">Warning</span>
                      <span class="label label-danger">Danger</span></div>
              </div>
              <hr>
              <h1>Revolution has begun!</h1>
              <p>'I am bound to Tahiti for more men.'
                  'Very good. Let me board you a moment—I come in peace.' With that he leaped from the canoe, swam to the boat; and climbing the gunwale, stood face to face with the captain.
                  'Cross your arms, sir; throw back your head. Now, repeat after me. As soon as Steelkilt leaves me, I swear to beach this boat on yonder island, and remain there six days. If I do not, may lightning strike me!'A pretty scholar,' laughed the Lakeman. 'Adios, Senor!' and leaping into the sea, he swam back to his comrades.</p>
              <div>
                  <span class="badge">Posted 2012-08-02 20:47:04</span><div class="pull-right"><span class="label label-default">alice</span> <span class="label label-primary">story</span> <span class="label label-success">blog</span> <span class="label label-info">personal</span> <span class="label label-warning">Warning</span>
                      <span class="label label-danger">Danger</span></div>
              </div>
              <hr> -->
        </div>
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




    </div>

      <footer>
          <!--<div class="row">
          <div class="col-sm-12">
              <div class="page-header text-muted divider">
                  Conecte-se conosco
              </div>
          </div>


          <div class="row">
              <div class="col-sm-6">
                  <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
              </div>
          </div>

                -->

         <!-- <div class="row" id="footer">
              <div class="col-sm-6">

              </div>
              <div class="col-sm-6">
                  <p>
                      <a href="#" class="pull-right">©Copyright Inc.</a>
                  </p>
              </div>
          </div>-->
          <!--</div> -->
      </footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/dist/js/app/home.js"></script>
<script src="/dist/js/bootstrap.min.js"></script>
</body>
</html>
