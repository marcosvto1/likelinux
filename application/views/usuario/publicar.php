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
                            <div class="box-conteudo">
                            <!-- content -->
                            <?php if(isset($_GET['ok'])){

                                print "<h3>Post Publicado</h3>";
                            }?>

                            <div class="col-sm-12" id="featured">
                                <h4>Publicar Link</h4>
                               <hr/>
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
                                                <option value="<?php print $categoria->id_categoria; ?>"><?php print $categoria->nome_categoria; ?></option>
                                                <?php }?>

                                            </select>
                                        </fieldset>


                                        <button type="submit" class="btn btn-primary">Publicar</button>
                                    </form>
                                    <br>
                                </div>

                            </div>





                        </div><!-- /col-9 -->
                            </div> <!-- box conteudo -->
                    </div><!-- /padding -->
                </div>


            </div>

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
