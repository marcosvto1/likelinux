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
                                    <br/>
                                   <h3> <?php print $post[0]->titulo_post;?></h3>
                                    <br/>
                                    <?php print $post[0]->conteudo_post;?>



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

    $('#conteudo_link').show();
    $('#conteudo_artigo').hide();



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





</script>
<script>
    window.onload = function()  {
        CKEDITOR.replace( 'editor' );
    };



</script>
</body>
</html>
