<?php
class Solicitacao_model extends CI_Model {

    private $id_grupo;
    private $id_usuario_enviando;
    private $id_usuario_recebendo;
    private $id_solicitacao;

    public function __construct()
    {
// Call the CI_Model constructor
        $this->load->database();
    }


    public function insert_post($id_usuario_enviando,$id_grupo,$id_usuario_recebendo)
    {
        $this->db->set('id_grupo', $id_grupo);
        $this->db->set('id_usuario_enviando', $id_usuario_enviando);
        $this->db->set('id_usuario_recebendo', $id_usuario_recebendo);
        $this->db->insert('tb_solicitacao');
    }

    public function get($id)
    {
        $sql = 'SELECT A.id_solicitacao,C.id_grupo, C.nome_grupo, B.nome_usuario, B.imagem_usuario,B.login_usuario
                  FROM tb_solicitacao A , tb_usuario B,tb_grupo C
                  WHERE
                  A.id_user_enviando = B.id_usuario
                  AND A.id_grupo = C.id_grupo
                  AND A.id_user_recebendo = ?
                 ';
        $query = $this->db->query($sql,array($id));
//$query = $this->db->get('contatos');
        return $query->result();
    }

    public function remover($id){

        $this->db->delete('tb_solicitacao',array('id_solicitacao'=> $id));

    }




}