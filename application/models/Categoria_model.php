<?php
class Categoria_model extends CI_Model {

    public $id_categoria;
    public $nome_categoria;



    public function __construct()
    {
// Call the CI_Model constructor
        $this->load->database();
    }

    public function get()
    {
//        $query = $this->db->query('SELECT A.id, A.nome_contato, A.email_contato, A.telefone_contato ,B.nome FROM contatos A , tipo_servico B WHERE A.tipo_serv = B.id');
$query = $this->db->get('tb_categoria');
        return $query->result();
    }
    public function getCategoriaByUsuario($id){
       $sql = "SELECT DISTINCT B.nome_categoria, B.id_categoria
               FROM tb_usuario A , tb_categoria B , tb_post C
               WHERE C.id_categoria_post = B.id_categoria
               AND C.id_usuario_post = A.id_usuario
               AND C.id_usuario_post = ?";
        $query = $this->db->query($sql,array($id));
        return $query->result();
    }

    public function insert_entry()
    {
        $this->title    = $_POST['title']; // please read the below note
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}