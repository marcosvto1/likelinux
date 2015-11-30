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
                                    <h4>Editar Conta</h4>
                                    <hr/>
                                </div>

                                <!--/top story-->
                                <div class="row">
                                    <div class="col-sm-10">

                                        <ul class="nav nav-tabs" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Perfil</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#imagem" role="tab" data-toggle="tab">Imagem Perfil</a>
                                            </li>

                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">

                                            <div role="tabpanel" class="tab-pane active" id="profile">
                                                <br/>
                                                <?php echo form_open('atualizar/insert'); ?>
                                                <!-- <form method="post" action="/cadastrar/insert">-->
                                                <fieldset class="form-group">
                                                    <label for="exampleInputEmail1">Nome Completo</label>
                                                    <input type="text" class="form-control" name="nome_usuario" id="exampleInputEmail1" placeholder="Nome Completo" value="<?php print $nome_completo_usuario?>">
                                                    <?php echo form_error('nome_usuario'); ?>
                                                    <!--<small class="text-muted">We'll never share your email with anyone else.</small> -->
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="exampleInputPassword1">Usuario</label>
                                                    <input type="text" name="login_usuario_cad" class="form-control" id="exampleInputPassword1" placeholder="Nome de Usuario" value="<?php print $nome_usuario?>">
                                                    <?php echo form_error('login_usuario_cad'); ?>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="exampleSelect1">Senha</label>
                                                    <input type="password" name="senha_usuario_cad" class="form-control" id="exampleInputPassword1" placeholder="Sua Senha" >
                                                    <?php echo form_error('senha_usuario_cad'); ?>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="exampleInputPassword1">Email</label>
                                                    <input type="email" name="email_usuario" class="form-control" id="exampleInputPassword1" placeholder="Email" value="<?php print $email_usuario?>">
                                                    <?php echo form_error('email_usuario'); ?>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="exampleInputPassword1">Descrição</label>
                                                    <input type="text" name="descricao_usuario" class="form-control" id="exampleInputPassword1" placeholder="Decrição" value="<?php print $descricao_usuario?>">
                                                </fieldset>



                                                <button type="submit" name="submit"  class="btn btn-primary">Cadastrar</button>
                                                </form>
                                                <br/>


                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="imagem">


                                               <!-- <form id="cropimage" method="post" enctype="multipart/form-data">
                                                    Upload your image <input type="file" name="photoimg" id="photoimg" />
                                                    <input type="hidden" name="image_name" id="image_name" value="<?php print $imagem_usuario;?>" />
                                                    <input type="submit" name="submit" value="Submit" />
                                                </form> -->

                                                <div id="content"><br>
                                                    <h3>Atualizar Imagem Perfil</h3><br>



                                                    <img src="<?php print $imagem_usuario ?>" width="190px" height="200px" id="cropbox" />

                                                    <h4 id="loading" style="display: none;">loading...</h4>
                                                    <div id="message"><!-- Error Message will show up here --></div>


                                                    <div id="selectImage">
                                                        <label>Selecione uma Imagem</label><hr>
                                                        <?php
                                                        $formData = array(
                                                        'class' => 'form-horizontal',
                                                        'id' => 'cropimage'
                                                        ); ?>
                                                        <form id="upimage" method="post" action="/foto/upload" enctype="multipart/form-data">
                                                            <fieldset class="form-group">
                                                            <input type='file' class="form-control" name='userfile' id='photoimg' size='20'>
                                                             </fieldset>
                                                            <input type="hidden" id="x" name="x" />
                                                            <input type="hidden" id="y" name="y" />
                                                            <input type="hidden" id="w" name="w" />
                                                            <input type="hidden" id="h" name="h" />
                                                            <input type='submit' name='submit' value='Upload' class='btn btn-primary'>
                                                         </form>

                                                    </div>

                                                </div>





                                            </div>

                                        </div>



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
<script type="text/javascript" src="/dist/js/jquery.imgareaselect.pack.js"></script>
<script src="/dist/jcrop/js/jquery.Jcrop.js"></script>
<script src="/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $("#upimage").submit(function(e){
       /* $.ajax({
            url: "/foto/upload",
            data:  new FormData(this),
            fileElementId:'userfile',
            mimeType:"multipart/form-data",
            async: false,
            success: function (data) {
                alert(data);
            },  cache: false,
            contentType: false,
            processData: false


        });

        return false;*/
    });


    $(document).ready(function () {
        $(function(){

            $('#cropbox').Jcrop({
                aspectRatio: 1,
                onSelect: updateCoords
            });

        });

        function updateCoords(c)
        {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };

        function checkCoords()
        {
            if (parseInt($('#w').val())) return true;
            alert('Please select a crop region then press submit.');
            return false;
        };



    });
</script>
</body>
</html>
