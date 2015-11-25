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

    <title>TrampoFacil</title>

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
        }

        .panel-order .row:last-child {
            border: 0px;
        }

        .panel-order .row .col-md-1 {
            text-align: center;
            padding-top: 15px;
        }

        .panel-order .row .col-md-1 img {
            width: 50px;
            max-height: 50px;
        }

        .panel-order .row .row {
            border-bottom: 0;
        }

        .panel-order .row .col-md-11 {
            border-left: 1px solid #ccc;
        }

        .panel-order .row .row .col-md-12 {
            padding-top: 7px;
            padding-bottom: 7px;
        }

        .panel-order .row .row .col-md-12:last-child {
            font-size: 11px;
            color: #555;
            background: #efefef;
        }

        .panel-order .btn-group {
            margin: 0px;
            padding: 0px;
        }

        .panel-order .panel-body {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .panel-order .panel-deading {
            margin-bottom: 0;
        }

    </style>
</head>

<body>

<nav class="navbar bg-inverse navbar-dark navbar-static-top" style="background-color: #3f5b94;border-top: 3px solid #7775e4">
    <a class="navbar-brand" href="#">TrampoFacil</a>
   <!-- #82d191-->
    <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Aplicativo</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Sobre nós</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contato</a>
        </li>
    </ul>
    <!--<form class="form-inline navbar-form pull-right">
        <input class="form-control" type="text" placeholder="Search">
        <button class="btn btn-success-outline" type="submit">Search</button>
    </form>-->
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron" style="background-color: #d9e9ec; border-bottom: 3px solid #7775e4">
    <div class="container">

            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                    <h4>Inscreva-se no TrampoFacil!</h4>
                    <button class="btn btn-block btn-lg btn-success">Inscrever</button>
                </div>

                <div class="col-md-8">
                    <form action="" method="get" class="form-inline">
                        <div class="form-group">
                             <h3>Buscar Contato:&nbsp;&nbsp;<select class="c-select" name="filtro">
                                <?php foreach($servicos as $key => $servico){  ?>

                                    <option value="<?php print $servico->id;?>"><?php print $servico->nome;?></option>

                                <?php } ?>
                            </select></h3>
                         </div>
                        <div class="form-group">
                        <input type="submit" name="serch" class="btn btn-danger btn-block btn-lg" value="FILTRAR"/></div>
                    </form>
                </div>
            </div>




        <h1></h1>

    </div>
</div>

<div class="container" id="box-main">
    <!-- Example row of columns -->
    <div class="row">

        <div class="col-md-2" style=" background-color: rgba(240, 246, 249, 0.71);box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.08); border-radius: 6px;">


                <img src="/dist/img/subway_18-11-2015.jpg" width="180">
            <hr/>
            <img src="/dist/img/montana-_23-03_2015.jpg" width="180">
            <hr/>
            <img src="/dist/img/shopping_telhas-29-05-2015.jpg" width="180">

         </div>

        <div class="col-md-8">
            <div class="container" style="padding-top: 30px; background-color: rgba(240, 246, 249, 0.71);box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.08); border-radius: 6px;">
                <div class="panel panel-order">
                    <div class="panel-heading">
                        <strong>Lista de Contatos</strong>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Detalhes <i class="fa fa-filter"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#">Active orders</a></li>
                                    <li><a href="#">Pending orders</a></li>
                                </ul>
                            </div>
                        </div>
                        <hr/>
                    </div>
                    <div class="panel-body">

                        <?php foreach($contatos as $key => $contato){  ?>
                        <div class="row">
                            <div class="col-md-1"><img class="img-circle" src="http://bootdey.com/img/Content/user-453533-fdadfd.png"></div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-right"><i class="fa fa-certificate"></i> <a type="button" href="/contato/<?php print $contato->id;?>" type="search" class="btn btn-success-outline">Mais Detalhes</a type="button"></div>
                                        <span><strong><?php print $contato->nome_contato;?></strong></span>
                                        <span class="label label-warning" style="padding: 4px;"><?php print $contato->nome;?></span>
                                        <br>
                                        <span>Email: <?php print $contato->email_contato;?></span>
                                        <br>
                                        <span>Telefone: <?php print $contato->telefone_contato;?></span>
                                    </div>
                                    <div class="col-md-12" style="background-color:#bfbec6 ">
                                         </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>



                    </div>
                    <div class="panel-footer">
                        <ul class="pagination">
                            <li class="active"><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2" style=" background-color: rgba(240, 246, 249, 0.71);box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.08); border-radius: 6px;">


            <img src="/dist/img/subway_18-11-2015.jpg" width="180" style="padding-top: 10px; ">
            <hr/>
            <img src="/dist/img/montana-_23-03_2015.jpg" width="180">
            <hr/>
            <img src="/dist/img/shopping_telhas-29-05-2015.jpg" width="180">


        </div>

    </div>

    <hr>

    <footer>
        <p>&copy; TrampoFacil 2015</p>
    </footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/dist/js/bootstrap.min.js"></script>
</body>
</html>
