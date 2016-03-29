<?php foreach($solicitacoes as $key => $s) {?>
    <tr>
        <td>
            <b><?php print $s->login_usuario; ?></b></td>
        <td>
            Solicita Participação do &nbsp<b><?php print $s->nome_grupo; ?></b>
        </td>
        <td> <a href="/solicitacao/confirmar/<?php print $s->id_solicitacao ?>/<?php print $s->id_grupo ?>" id="remover_post" class="confirma_soli" data-toggle="popover">Confirmar
                </i></a></td>
        <td> <a href="/remover/post/#" id="" class="po" data-toggle="popover">Recusar
            </a></td>
    </tr>

<?php } ?>