<?php
class Post_model extends CI_Model {

    public $id_post;
    public $titulo_post;
    public $conteudo_post;
    public $id_categoria_post;
    public $id_usuario_post;
    public $data_post;
    public $data_update_post;


    public function __construct()
    {
// Call the CI_Model constructor
        $this->load->database();
    }

    public function get()
    {
        $query = $this->db->query('
                    SELECT A.id_post, A.titulo_post, A.conteudo_post ,B.nome_categoria, C.imagem_usuario,C.login_usuario,C.id_usuario
                    FROM tb_post A , tb_categoria B,tb_usuario C
                    WHERE A.id_categoria_post = B.id_categoria AND A.id_usuario_post = C.id_usuario ORDER by A.id_post desc');
//$query = $this->db->get('contatos');
        return $query->result();
    }


    public function getByUserPagination($id_user,$id_last,$limit){


        $sql = "
                SELECT A.id_post, A.titulo_post, A.conteudo_post ,B.nome_categoria, C.imagem_usuario,C.login_usuario,C.id_usuario
                FROM tb_post A , tb_categoria B, tb_usuario C
                WHERE A.id_post > ?
                AND A.id_categoria_post = B.id_categoria
                AND A.id_usuario_post = C.id_usuario
                AND C.id_usuario = ? ORDER by A.id_post ASC LIMIT 0, ? ";


        $query = $this->db->query($sql,array($id_last,$id_user,$limit));

        return $query->result();

    }



    public function getByUser($id){
        $sql = "
                SELECT A.id_post, A.titulo_post, A.conteudo_post ,B.nome_categoria, C.imagem_usuario,C.login_usuario,C.id_usuario
                FROM tb_post A , tb_categoria B, tb_usuario C
                WHERE A.id_categoria_post = B.id_categoria
                AND A.id_usuario_post = C.id_usuario
                AND C.id_usuario = ? ORDER by A.id_post ASC LIMIT 0, 5 ";


        $query = $this->db->query($sql,array($id));

        return $query->result();

    }

    public  function getCategoriaByUser($categoria,$usuario){
        $sql = "
                SELECT A.id_post, A.titulo_post, A.conteudo_post ,B.nome_categoria, C.imagem_usuario, C.login_usuario, C.id_usuario
                FROM tb_post A , tb_categoria B, tb_usuario C
                WHERE A.id_categoria_post = B.id_categoria
                AND A.id_usuario_post = C.id_usuario
                AND C.id_usuario = ?
                AND A.id_categoria_post = ? ORDER by A.id_post desc";


        $query = $this->db->query($sql,array($usuario,$categoria));

        return $query->result();

    }
    public function get_categoria($categoria){


        $sql = "
                SELECT A.id_post, A.titulo_post, A.conteudo_post ,B.nome_categoria, C.imagem_usuario, C.login_usuario,C.id_usuario
                FROM tb_post A , tb_categoria B, tb_usuario C
                WHERE A.id_categoria_post = B.id_categoria
                 AND A.id_usuario_post = C.id_usuario
                AND  A.id_categoria_post = ? ORDER by A.id_post desc";


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
        $this->titulo_post   = $data['titulo']; // please read tue below note
        $this->conteudo_post = $data['conteudo'];
        $this->id_categoria_post  = $data['id_categoria'];
        $this->id_usuario_post  = $data['id_usuario'];
        $this->data_post  = $data['data_post'];
        $this->data_update_post  = $data['data_post'];
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