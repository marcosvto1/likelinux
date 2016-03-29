<div class="column col-sm-12" id="main-menu">
    <div class="row">
        <div class="col-md-12">
            <div class="widget-grupo">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                      <h3><?php print $nome_grupo?></h3>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="/grupo/<?php print $id_grupo;?>/<?php print url_title($nome_grupo)?>">Postagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/grupo/<?php print $id_grupo;?>/<?php print url_title($nome_grupo)?>/participantes">Participantes</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</div>