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
    <link rel="stylesheet" href="/dist/jcrop/css/jquery.Jcrop.css" type="text/css" />

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

<nav class="navbar navbar-light bg-faded " style="padding: 10px;border-top: 3px solid #29a581;border-radius: 0;">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
        &#9776;
    </button>
    <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
        <a class="navbar-brand" style="color: rgba(41, 165, 129, 0.86)">Links</a>
        <!-- #82d191
        background-color: #26519C;
     border-top: 3px solid #64E46A;

     background-color: #00a4a5;

        -->
        <ul class="nav navbar-nav">
            <li class="nav-item active" >
                <a class="nav-link" href="/home">Home</a>
            </li>

        </ul>
        <form class="form-inline navbar-form pull-right" style="">
            <button class="btn btn-danger-outline" type="submit">Sair</button>
        </form>
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->


<div class="container" id="box-main">

    <div class="row">





        <div class="col-md-7">

            <div class="row">
                <!-- sidebar -->

                <!-- /sidebar -->

                <!-- main -->
                <div class="column col-sm-9" id="main" style="background-color: #f2f2f2">
                    <div class="padding">
                        <div class="full col-sm-9">
                            <!-- content -->
                            <?php if(isset($_GET['ok'])){

                                print "<h3>Cadastrado Realizado com Sucesso!!!</h3>";
                            }?>
                            <div class="col-sm-12" id="featured">
                                <h4 class="headline text-muted">
                                    Cadastro
                                </h4>
                                <hr>
                            </div>
                            <!--/top story-->
                            <div class="row">
                                <div class="col-sm-10">
                                    <?php echo validation_errors(); ?>
                                    <?php echo form_open('cadastrar/insert'); ?>
                                    <!-- <form method="post" action="/cadastrar/insert">-->
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Nome Completo</label>
                                        <input type="text" class="form-control" name="nome_usuario" id="exampleInputEmail1" placeholder="Nome Completo">
                                        <!--<small class="text-muted">We'll never share your email with anyone else.</small> -->
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleInputPassword1">Usuario</label>
                                        <input type="text" name="login_usuario_cad" class="form-control" id="exampleInputPassword1" placeholder="Nome de Usuario">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleSelect1">Senha</label>
                                        <input type="password" name="senha_usuario_cad" class="form-control" id="exampleInputPassword1" placeholder="Sua Senha">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" name="email_usuario" class="form-control" id="exampleInputPassword1" placeholder="Email">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleInputPassword1">Descrição</label>
                                        <input type="text" name="descricao_usuario" class="form-control" id="exampleInputPassword1" placeholder="Decrição">
                                    </fieldset>



                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </form>
                                    <br/>
                                </div>
                                <div class="col-sm-2">
                                    <!-- <a href="#" class="pull-right"><img src="http://api.randomuser.me/portraits/thumb/men/19.jpg" class="img-circle"></a>-->
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
        <div class="col-md-4">
            <div class="column col-sm-12" style="background-color: #f2f2f2" >
                <div class="padding">
                    <div class="full col-sm-12">
                        <!-- content -->

                        <div class="col-sm-12" id="featured">
                            <h4 class="headline text-muted">
                                Login
                            </h4>
                            <hr>
                        </div>
                        <!--/top story-->
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="post" action="login/auth">

                                    <fieldset class="form-group">
                                        <label for="exampleInputPassword1">Usuario</label>
                                        <input type="text" name="login_usuario" class="form-control" id="exampleInputPassword1" placeholder="Nome de Usuario">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleSelect1">Senha</label>
                                        <input type="password" name="senha_usuario" class="form-control" id="exampleInputPassword1" placeholder="Sua Senha">
                                    </fieldset>




                                    <button type="submit" class="btn btn-primary">Entrar</button>
                                </form>
                                <br/>
                            </div>
                            <br/>
                            <div class="col-sm-2">
                                <!-- <a href="#" class="pull-right"><img src="http://api.randomuser.me/portraits/thumb/men/19.jpg" class="img-circle"></a>-->
                            </div>
                        </div>




                    </div><!-- /col-9 -->
                </div><!-- /padding -->
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
    <script src="/dist/jcrop/js/jquery.Jcrop.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/dist/js/bootstrap.min.js"></script>
</body>
</html>
