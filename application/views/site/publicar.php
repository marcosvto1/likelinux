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
    <link href="jumbotron.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,600' rel='stylesheet' type='text/css'>
    <style>

        .panel-order .row {
            border-bottom: 1px solid #ccc;
        }

        #box-main {
            margin-right: 0px;
            margin-left: 10px;
            max-width: 80.25rem;
            margin-top: 40px;

        }
        /* move special fonts to HTML head for better performance */
        @import url('http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700');


        /* custom template */
        html, body {
            height: 100%;
            font-family:'Open Sans',arial,sans-serif;
        }

        a {
            color:#222222;
        }

        .wrapper, .row {
            height: 100%;
            margin-left:0;
            margin-right:0;
        }

        .wrapper:before, .wrapper:after,
        .column:before, .column:after {
            content: "";
            display: table;
        }

        .wrapper:after,
        .column:after {
            clear: both;
        }

        .column {
            height: 100%;
            overflow: auto;
            *zoom:1;
        }

        .column .padding {
            padding: 20px;
        }

        .box {
            bottom: 0; /* increase for footer use */
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            background-image:url('http://lorempixel.com/1024/760/nature/3/');
            background-size:cover;
            background-attachment:fixed;
        }

        .divider {
            margin-top:32px;
        }

        #main {
            background-color:#fefefe;
        }
        #main .img-circle {
            margin-top:18px;
            height:70px;
            width:70px;
        }

        #sidebar, #sidebar a {
            color: #2f2f2f;
            background-color:transparent;

        }

        #sidebar, #sidebar a:hover {
            color: #00a4a5;
            background-color:transparent;

        }

        #sidebar a.logo {

            padding:3px;
            background-color:#fff;
            color:#777777;
            height:40px;
            width:40px;
            margin:15px;
            font-size:26px;
            font-weight:700;
            text-align:center;
            text-decoration:none;
            text-shadow:0 0 0;
        }
        #sidebar-footer {
            position:absolute;bottom:5px;
        }
        #footer {
            margin-bottom:20px;
        }

        /* center and adjust the sidebar contents on smaller devices */
        @media (max-width: 768px) {
            #sidebar,#sidebar a.logo {
                text-align:center;
                margin:0 auto;
                margin-top:30px;
                font-size:26px;
            }
            #sidebar a.logo {
                font-size:50px;
                height:75px;
                width:75px;
                margin-bottom:30px;
            }
        }




        /* bootstrap overrides */

        h1,h2,h3 {
            font-weight:800;
            font-family:'Open Sans',arial,sans-serif;
        }

        .jumbotron {
            background-color:transparent;
        }
        .label-default {
            background-color:#666;
        }
        .page-header {
            margin-top: 25px;
            padding-top: 9px;
            border-top:1px solid #eeeeee;
            font-weight:700;
            text-transform:uppercase;
            letter-spacing:2px;
        }

        .col-sm-9.full {
            width: 100%;
        }

        small.text-muted {
            font-family:courier,courier-new,monospace;
        }




    </style>
</head>

<body>

<nav class="navbar bg-inverse navbar-dark navbar-static-top" style="background-color: #ffffff;border-top: 3px solid #64E46A;border-bottom: 2px solid #cecece">
    <a class="navbar-brand" href="#"><img src="/dist/img/log.png" width="140" height="50"></a>
    <!-- #82d191
    background-color: #26519C;
 border-top: 3px solid #64E46A;

 background-color: #00a4a5;

    -->
    <ul class="nav navbar-nav">

    </ul>
    <form class="form-inline navbar-form pull-right" style="margin-top: 1px">
        <button class="btn btn-success-outline btn-lg" type="submit">Login</button>
    </form>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->


<div class="container" id="box-main">

    <div class="row">





        <div class="col-md-10">

            <div class="row">
                <!-- sidebar -->
                <div class="col-md-3" id="sidebar" >
                    <a class="logo" href="#"><img class="img-circle" src="/dist/img/perfil2.jpg" width="" height=""></a>

                    <div class="row divider">
                        <div class="col-sm-12">Marcos Vinicius<hr></div>
                    </div>
                    <ul class="nav nav-pills nav-stacked">

                        <li class="nav-item">
                            <a class="nav-link" href="/">Meus Links</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Minhas Historias</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/publicar">Publicar</a>
                        </li>

                    </ul>

                </div>
                <!-- /sidebar -->

                <!-- main -->
                <div class="column col-sm-9" id="main">
                    <div class="padding">
                        <div class="full col-sm-9">

                            <!-- content -->
                            <?php if(isset($_GET['ok'])){

                                print "<h3>Post Publicado</h3>";
                            }?>

                            <div class="col-sm-12" id="featured">
                                <div class="page-header text-muted">
                                    Publicar Link
                                </div>
                            </div>

                            <!--/top story-->
                            <div class="row">
                                <div class="col-sm-10">
                                    <form method="post" action="/publicar/post">
                                        <fieldset class="form-group">
                                            <label for="exampleInputEmail1">Titulo</label>
                                            <input type="text" class="form-control" name="titulo" id="exampleInputEmail1" placeholder="Enter Titulo">
                                            <!--<small class="text-muted">We'll never share your email with anyone else.</small> -->
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="exampleInputPassword1">Link do Conteudo</label>
                                            <input type="url" name="conteudo" class="form-control" id="exampleInputPassword1" placeholder="Link">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="exampleSelect1">Categoria</label>
                                            <select class="form-control" id="exampleSelect1" name="id_categoria">
                                                <?php foreach($categorias as $key => $categoria){?>
                                                <option value="<?php print $categoria->id; ?>"><?php print $categoria->nome_categoria; ?></option>
                                                <?php }?>

                                            </select>
                                        </fieldset>


                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <div class="col-sm-2">
                                   <!-- <a href="#" class="pull-right"><img src="http://api.randomuser.me/portraits/thumb/men/19.jpg" class="img-circle"></a>-->
                                </div>
                            </div>





                            <!-- <div class="row">
                                 <div class="col-sm-10">
                                     <h3>How to: Another Fantastical Article</h3>
                                     <h4><span class="label label-default">bootply.com</span></h4><h4>
                                         <small class="text-muted">4 days ago • <a href="#" class="text-muted">Read More</a></small>
                                     </h4>
                                 </div>
                                 <div class="col-sm-2">
                                     <a href="#" class="pull-right"><img src="http://api.randomuser.me/portraits/thumb/men/86.jpg" class="img-circle"></a>
                                 </div>
                             </div>

                             <div class="row divider">
                                 <div class="col-sm-12"><hr></div>
                             </div>

                             <div class="row">
                                 <div class="col-sm-9">
                                     <h3>Another Fantastical Article of Interest</h3>
                                     <h4><span class="label label-default">bootply.com</span></h4><h4>
                                         <small class="text-muted">4 days ago • <a href="#" class="text-muted">Read More</a></small>
                                     </h4>
                                 </div>
                                 <div class="col-sm-3">
                                     <a href="#" class="pull-right"><img src="http://api.randomuser.me/portraits/thumb/women/17.jpg" class="img-circle"></a>
                                 </div>
                             </div>

                             <div class="col-sm-12">
                                 <div class="page-header text-muted divider">
                                     Up Next
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="col-sm-4 text-center">
                                     <h4>Related 1</h4>
                                     <a href="#"><img src="//placehold.it/400/f0f0f0" class="img-respsonsive img-circle"></a>
                                 </div>
                                 <div class="col-sm-4 text-center">
                                     <h4>Related 2</h4>
                                     <a href="#"><img src="//placehold.it/400/f0f0f0" class="img-respsonsive img-circle"></a>
                                 </div>
                                 <div class="col-sm-4 text-center">
                                     <h4>Related 3</h4>
                                     <a href="#"><img src="//placehold.it/400/f0f0f0" class="img-respsonsive img-circle"></a>
                                 </div>
                             </div>

-->
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

                            <hr>

                            <div class="row" id="footer">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-6">
                                    <p>
                                        <a href="#" class="pull-right">©Copyright Inc.</a>
                                    </p>
                                </div>
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
                        <a class="nav-link" href="#"><?php print $categoria->nome_categoria; ?></a>
                    </li>

                <?php }?>





            </ul>


        </div>



    </div>

    <!--    <footer>
        <p>&copy; TrampoFacil 2015</p>
    </footer> -->
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/dist/js/bootstrap.min.js"></script>
</body>
</html>
