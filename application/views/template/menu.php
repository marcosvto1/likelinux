<!-- sidebar -->
<div class="col-md-12"  >
    <a class="logo" href="/perfil/<?php print $nome_usuario; ?>/<?php print $id_usuario; ?>/"><img class="img-thumbnail img-square" src="<?php print $imagem_usuario; ?>" ></a>

    <div class="row divider">
        <div class="col-sm-12 text-muted">
            <h5>
            <?php print $nome_usuario; ?><hr></h5>
        </div>
    </div>
    <ul class="nav nav-pills nav-stacked">

        <li class="nav-item">
            <a class="nav-link" href="/mylinks">Meus Post</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/publicar">Publicar</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/listar/grupos">Meus Grupos</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/solicitacoes">Solicitações   <span id="notifica" class="label label-default label-pill pull-xs-right"></span></a>
        </li>


        <!--  <li class="nav-item">
              <a class="nav-link" href="/editar/perfil">Minha Conta</a>
          </li>-->




    </ul>

</div>
<!-- /sidebar -->