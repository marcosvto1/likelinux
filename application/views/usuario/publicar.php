<?php  $this->load->view('template/topo'); ?>
<!--  fim topo -->
<script> var tipo = 1;</script>

<?php if(isset($tipo_p)){ ?>
    <script> var tipo = <?php print $tipo_p; ?>;</script>
<?php } ?>

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
                                                   <h3>Publicação Publicada</h3>
                                                </div>';
                                }?>

                                <div class="col-sm-12" id="featured">
                                    <br/>
                                    <h4>Publicar </h4>
                                    <hr/>
                                </div>


                                <form method="post" action="/publicar/post">

                                        <label for="">Tipo de Publicação:</label><br/>
                                        <label class="radio-inline text-primary">
                                            <input type="radio" name="tipo" id="inlineRadio1" value="1" checked> Compatilhar Link
                                        </label>
                                        <label class="radio-inline text-primary">
                                            <input type="radio" name="tipo" id="inlineRadio2" value="2"> Criar Artigo
                                        </label><br/>

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
                                        <input type="text" class="form-control" name="titulo" id="exampleInputEmail1" placeholder="Enter Titulo">
                                        <?php echo form_error('titulo'); ?>
                                        <!--<small class="text-muted">We'll never share your email with anyone else.</small> -->
                                    </fieldset>
                                    <fieldset class="form-group" id="conteudo_link">
                                        <label for="exampleInputPassword1">Link do Conteudo</label>
                                        <input type="url" name="conteudo_link" class="form-control" id="exampleInputPassword1" placeholder="Link">
                                        <?php echo form_error('conteudo_link'); ?>
                                    </fieldset>

                                    <fieldset class="form-group" id="conteudo_artigo">
                                        <label for="exampleSelect1">Conteudo</label>
                                        <textarea class="form-control" name="conteudo" id="editor" >



                                        </textarea>

                                        <?php echo form_error('conteudo'); ?>
                                    </fieldset>


                                    <fieldset class="form-group">
                                        <label for="exampleSelect1">Categoria</label>
                                        <select class="form-control" id="exampleSelect1" name="id_categoria">
                                            <?php foreach($categorias as $key => $categoria){?>
                                                <option value="<?php print $categoria->id_categoria; ?>"><?php print $categoria->nome_categoria; ?></option>
                                            <?php }?>

                                        </select>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <a class="btn btn-primary"  data-toggle="modal" data-target="#myModal">Compatilhar com Grupos</a>
                                        <a class="btn btn-danger" id="remover-row">Remover Grupos</a>
                                        <hr/>
                                        <div id="tabela">
                                            <table id="tabela_grupo" class="table">

                                                <tbody id="corpo">
                                                    <div id="conteudot">

                                                    </div>

                                                </tbody>
                                            </table>

                                        </div>
                                    </fieldset>

                                    <div id="grupos">


                                    </div>




                                    <button type="submit" class="btn btn-primary">Publicar</button>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="add-grupo-from" action="#">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Adicionar Grupo</h4>
                </div>
                <div class="modal-body">

                    <fieldset class="form-group">
                        <label for="exampleSelect1">Selecione o Grupo</label>
                        <select class="form-control" id="grupo" name="id_grupo">
                            <?php foreach($grupos_user as $key => $grupo) {?>
                                <option value="<?php print $grupo->id_grupo; ?>"><?php print $grupo->nome_grupo; ?></option>
                            <?php }?>

                        </select>
                    </fieldset>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a  id="add-grupo" class="btn btn-primary" > Adicionar</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php  $this->load->view('template/jsinclude'); ?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/dist/ckeditor/ckeditor.js"></script>

<script>


    $('#conteudo_link').show();
    $('#conteudo_artigo').hide();

    if(tipo== 1){
            $("#inlineRadio1").attr("checked",true);
        $('#conteudo_link').show();
        $('#conteudo_artigo').hide();
    }else{

        $("#inlineRadio2").attr("checked",true);
        $('#conteudo_link').hide();
        $('#conteudo_artigo').show();
    }


    $('#inlineRadio1').change(
        function(){
            $('#conteudo_link').show();
            $('#conteudo_artigo').hide();
        }
    );


    $('#inlineRadio2').change(
        function(){
            $('#conteudo_link').hide();
            $('#conteudo_artigo').show();
        }
    );


    $('#remover-row').click(function(e){
        e.preventDefault();
      // alert('sss');
        var linhas = document.getElementById("tabela_grupo").rows;
        var i = linhas.length-1;
       // alert(i);var i = 0;
        for (i= linhas.length-1; i >=0; i--){
            document.getElementById("tabela_grupo").deleteRow(i);
        }

        $('#grupos').empty();
        grupos = [];

    });

  /*(function($) {

        RemoveTableRow = function(handler) {
            var tr = $(handler).closest('tr');

            alert(jQuery(this).attr("data-url"));
            tr.fadeOut(400, function(){
                tr.remove();
              //  grupos.pop();
            });

            return false;
        };
    })(jQuery);*/



    var cont =1;
    var grupos = [];

    /*function clearTable(_idTab, _linhaPersistente){
        var linhas = document.getElementById(_idTab).rows;
        var i = 0;
        for (i= linhas.length-1; i&gt;=0; i--){
            //alert(linhas[i].innerHTML);
            if (i != (_linhaPersistente-1) ){
                document.getElementById(_idTab).deleteRow(i);
            }
        }
    }
*/


$('#add-grupo').click(function(e){

    var id_grupo = $("#grupo").val();
    var nome_grupo = $( "#grupo option:selected" ).text();

    if(id_grupo == '' && nome_grupo == ''){
        return false;
    }


    /*if(cont == 1 ){
        grupos.push(nome_grupo);
        cont = cont + 1;
    }*/
    if(jQuery.inArray(nome_grupo,grupos) == -1){
        //alert(jQuery.inArray(nome_grupo,grupos));
       // $("#tabela").append(nome_grupo+'<br/>');
        var newRow = $("<tr>");
        var cols = "";

        var s = ""+nome_grupo;

        cols += '<td>'+nome_grupo+'</td>';

        cols += '<td>';
       // cols += '<a href="#" data-url="tesste" class="remover_row" type="button"><i class="fa fa-trash-o fa-2x"></i></a>';
        cols += '</td>';

        newRow.append(cols);
        $("#tabela_grupo").append(newRow);
        $("#grupos").append('<input type="hidden" name="grupos[]" value="'+id_grupo+'">');
        grupos.push(nome_grupo);
        return false;
    }else{


    }



  //  for()


    return true;
});




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
