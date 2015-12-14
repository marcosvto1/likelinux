<?php  $this->load->view('template/topo'); ?>
<!--  fim topo -->


<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container" id="box-main">

    <div class="row">
        <!-- menu -->
        <div class="col-md-2" id="box-profile">
            <!-- sidebar -->
            <?php  $this->load->view('template/menu'); ?>
            <!-- /sidebar -->
        </div>
        <!-- fim menu -->

        <div class="col-md-10">
            <div class="row">
                <div class="column col-sm-12" id="main">
                    <div class="full col-sm-12">
                        <div id="conteudo-main">
                            <div class="box-conteudo">
                                <div class="widget">
                                    <?php if(isset($_GET['ok'])){

                                        print '<br/><div class="alert alert-success" role="alert">
                                                    <h3>Publicação Atualizado</h3>
                                                </div>';

                                    }?>

                                    <div class="col-sm-12" id="featured">
                                        <br/>
                                        <h4>Atualizar Publicação </h4>
                                        <hr/>
                                    </div>


                                    <form method="post" action="/atualizar/post">

                                        <input type="hidden" value="<?php print $post[0]->id_post?>" name="post">



                                            <label for="">Tipo de Publicação:</label><br/>

                                            <?php if($post[0]->tipo_post == 1 ||isset($tipo_p) && $tipo_p == 1) { ?>

                                            <label class="radio-inline text-primary">
                                                <input type="radio" name="tipo" id="inlineRadio1" value="1" checked> Compatilhar Link
                                            </label>


                                            <?php }else{?>

                                            <label class="radio-inline text-primary">
                                                <input type="radio" name="tipo" id="inlineRadio2" value="2" checked> Criar Artigo
                                            </label>
                                            <?php }?>
                                            <!--  <div class="btn-group" id="tipo" data-toggle="buttons">
                                                  <label class="btn btn-info-outline active">
                                                      <input type="radio" name="options" id="option1" autocomplete="off" checked> Compatilhar Link
                                                  </label>
                                                  <label class="btn btn-info-outline">
                                                      <input type="radio" name="options" id="option2" autocomplete="off"> Criar Artigo
                                                  </label>

                                              </div> -->

                                            <br/>

                                            <!--  <div class="btn-group" id="tipo" data-toggle="buttons">
                                                   <label class="btn btn-info-outline active">
                                                       <input type="radio" name="options" id="option1" autocomplete="off" checked> Compatilhar Link
                                                   </label>
                                                   <label class="btn btn-info-outline">
                                                       <input type="radio" name="options" id="option2" autocomplete="off"> Criar Artigo
                                                   </label>

                                               </div> -->
                                            <br/>

                                        <fieldset class="form-group">
                                            <label for="exampleInputEmail1">Titulo</label>
                                            <input type="text" class="form-control" name="titulo" value="<?php print $post[0]->titulo_post;?>" placeholder="Enter Titulo">
                                            <?php echo form_error('titulo'); ?>
                                            <!--<small class="text-muted">We'll never share your email with anyone else.</small> -->
                                        </fieldset>
                                        <?php if($post[0]->tipo_post == 1 || isset($tipo_p) && $tipo_p == 1) { ?>

                                        <fieldset class="form-group" id="conteudo_link">
                                            <label for="exampleInputPassword1">Link do Conteudo</label>
                                            <input type="url" name="conteudo_link" class="form-control" id="exampleInputPassword1" value="<?php print $post[0]->conteudo_post;?>" placeholder="Link">
                                            <?php echo form_error('conteudo_link'); ?>
                                        </fieldset>

                                        <? }else{ ?>

                                        <fieldset class="form-group" id="conteudo_artigo">
                                            <label for="exampleSelect1">Conteudo</label>
                                        <textarea class="form-control" name="conteudo" id="editor" >

                                                      <?php print $post[0]->conteudo_post;?>
                                        </textarea>

                                            <?php echo form_error('conteudo'); ?>
                                        </fieldset>

                                        <? } ?>

                                        <fieldset class="form-group">
                                            <label for="exampleSelect1">Categoria</label>
                                            <select class="form-control" id="exampleSelect1" name="id_categoria">

                                                <?php foreach($categorias as $key => $categoria){?>
                                                    <?php if($post[0]->id_categoria_post == $categoria->id_categoria) {?>
                                                        <option value="<?php print $categoria->id_categoria; ?>" selected ><?php print $categoria->nome_categoria; ?></option>
                                                    <?php }else{ ?>
                                                    <option value="<?php print $categoria->id_categoria; ?>"><?php print $categoria->nome_categoria; ?></option>
                                                        <?php } ?>
                                                    <?php }?>

                                            </select>
                                        </fieldset>



                                        <button type="submit" class="btn btn-primary">Atualizar</button>
                                    </form>



                                    <br/>

                                </div>
                            </div><!-- box conteudo -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/dist/ckeditor/ckeditor.js"></script>

<script>

    var tipo_post = <?php print $post[0]->tipo_post ?>;







</script>
<script>
    window.onload = function()  {
        //CKEDITOR.replace( 'editor' );

        CKEDITOR.replace( 'editor', {
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [

                { name: 'tools' },
                {name:'insert',  groups:['insert']},
                { name: 'document',    groups: [ 'document'] },
                { name: 'others' },
                { name: 'links' },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align'] },
                { name: 'styles' },
                { name: 'colors' },

            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,SpecialChar,Flash,Emoticon,Iframe,PageBreak,Smiley,Save'
        } );

    };





</script>
</body>
</html>
