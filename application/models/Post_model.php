<?php
class Post_model extends CI_Model {

    public $id;
    public $titulo;
    public $conteudo;
    public $id_categoria;



    public function __construct()
    {
// Call the CI_Model constructor
        $this->load->database();
    }

    public function get()
    {
        $query = $this->db->query('SELECT A.id, A.titulo, A.conteudo ,B.nome_categoria FROM tb_post A , tb_categoria B WHERE A.id_categoria = B.id');
//$query = $this->db->get('contatos');
        return $query->result();
    }
    public function get_categoria($categoria){


        $sql = "SELECT A.id, A.titulo, A.conteudo ,B.nome_categoria FROM tb_post A , tb_categoria B WHERE A.id_categoria = B.id AND  A.id_categoria = ?";


        $query = $this->db->query($sql,array($categoria));
       /*  $this->db->select('A.id','A.titulo','A.conteudo','B.nome_categoria');
        $this->db->from('tb_post A');
        $this->db->from('tb_categoria B');
        $this->db->where('A.id_categoria','B.id');
        $this->db->where('A.id_categoria',$categoria);
        $query =  $this->db->get();*/
        return $query->result();
    }

    public function insert_post($data)
    {
        $this->titulo   = $data['titulo']; // please read tue below note
        $this->conteudo = $data['conteudo'];
        $this->id_categoria  = $data['id_categoria'];
        $this->db->insert('tb_post', $this);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}