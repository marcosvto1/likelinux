<?php
class Categoria_model extends CI_Model {

    public $id;
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