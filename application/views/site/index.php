<?php  $this->load->view('template/topo_site'); ?>

<!-- Main jumbotron for a primary marketing message or call to action -->


<div class="container" id="box-main">

    <div class="row">

        <div class="col-md-7">

            <div class="row">
                <!-- sidebar -->

                <!-- /sidebar -->

                <!-- main -->
                <div class="column col-sm-9 widget" id="main">
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


                                    <?php echo form_open('cadastrar/insert'); ?>
                                   <!-- <form method="post" action="/cadastrar/insert">-->
                                        <fieldset class="form-group">
                                            <label for="exampleInputEmail1">Nome Completo</label>
                                            <input type="text" class="form-control" name="nome_usuario" id="exampleInputEmail1"  value="<?php echo set_value('nome_usuario'); ?>" placeholder="Nome Completo">
                                            <?php echo form_error('nome_usuario'); ?>
                                            <!--<small class="text-muted">We'll never share your email with anyone else.</small> -->
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="exampleInputPassword1">Usuario</label>
                                            <input type="text" name="login_usuario_cad" class="form-control" id="exampleInputPassword1" value="<?php echo set_value('login_usuario_cad'); ?>" placeholder="Nome de Usuario">
                                            <?php echo form_error('login_usuario_cad'); ?>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="exampleSelect1">Senha</label>
                                            <input type="password" name="senha_usuario_cad" class="form-control" id="exampleInputPassword1" placeholder="Sua Senha">
                                            <?php echo form_error('senha_usuario_cad'); ?>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="email" name="email_usuario" class="form-control" value="<?php echo set_value('email_usuario'); ?>" id="exampleInputPassword1" placeholder="Email">
                                            <?php echo form_error('email_usuario'); ?>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="exampleInputPassword1">Descrição</label>
                                            <input type="text" name="descricao_usuario" class="form-control" value="<?php echo set_value('descricao_usuario'); ?>" id="exampleInputPassword1" placeholder="Decrição">
                                        </fieldset>



                                        <button type="submit" name="submit"  class="btn btn-primary">Cadastrar</button>
                                    </form>
                                    <br/>
                                </div>
                                <div class="col-sm-2">
                                    <!-- <a href="#" class="pull-right"><img src="http://api.randomuser.me/portraits/thumb/men/19.jpg" class="img-circle"></a>-->
                                </div>
                            </div>


                        </div><!-- /col-9 -->
                    </div><!-- /padding -->
                </div>

            </div>

        </div>
        <div class="col-md-4">
            <div class="column col-sm-12 widget"  >
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
                                <?php echo form_open('login/auth'); ?>

                                    <fieldset class="form-group">
                                        <label for="exampleInputPassword1">Usuario</label>
                                        <input type="text" name="login_usuario" class="form-control" id="exampleInputPassword1" value="<?php echo set_value('login_usuario'); ?>"placeholder="Nome de Usuario">
                                        <?php echo form_error('login_usuario'); ?>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleSelect1">Senha</label>
                                        <input type="password" name="senha_usuario" class="form-control" id="exampleInputPassword1" placeholder="Sua Senha">
                                        <?php echo form_error('senha_usuario'); ?>
                                    </fieldset>

                                    <button type="submit" name="submit" class="btn btn-primary">Entrar</button>
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
