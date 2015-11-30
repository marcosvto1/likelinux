<?php
class Usuario_model extends CI_Model {

public $id_usuario;
public $nome_usuario;
public $login_usuario;
public $descricao_usuario;
public $senha_usuario;
public $email_usuario;
public $imagem_usuario;


public function __construct()
{
// Call the CI_Model constructor
    $this->load->database();
}

public function get()
{

  $query = $this->db->get('tb_usuario');
return $query->result();
}

    public function getbyid($id)
    {

        $sql = '
                    SELECT *
                    FROM tb_usuario
                    WHERE id_usuario = ?';

        $query = $this->db->query($sql,array($id));
//$query = $this->db->get('contatos');
        return $query->result();
    }


public function login($login, $senha)
{
    $this->db->select('id_usuario');
    $this->db->select('login_usuario');
    $this->db->from('tb_usuario');
    $this->db->where('login_usuario',$login);
    $this->db->where('senha_usuario',MD5($senha));
    $this ->db->limit(1);
    $query = $this->db->get();
    if($query->num_rows() == 1){

        return $query->result();
    }else{

        return false;
    }
//$query = $this->db->get('contatos');

 }

public function insert($data)
{
/*$this->nome_usuario   = $_POST['title']; // please read the below note
$this->content  = $_POST['content'];
$this->date     = time();*/

$this->db->insert('tb_usuario', $data);
}

public function update_entry()
{
$this->title    = $_POST['title'];
$this->content  = $_POST['content'];
$this->date     = time();

$this->db->update('entries', $this, array('id' => $_POST['id']));
}
    public function updateImgID($id,$img){


        $data = array(
            'imagem_usuario' => $img
        );

        $this->db->where('id_usuario', $id);
        $this->db->update('tb_usuario', $data);


      /*  $sql = '
                    UPDATE tb_usuario
                    SET imagem_usuario = ?
                    WHERE id_usuario = ?';

        $query = $this->db->query($sql,array($img,$id));*/


    }

}