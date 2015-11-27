<?php
class Usuario_model extends CI_Model {

public $id;
public $username;
public $senha;



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


public function login($username, $senha)
{
    $this->db->select('id','username','senha');
    $this->db->from('tb_usuario');
    $this->db->where('username',$username);
    $this->db->where('senha',$senha);
    $query = $this->db->get();
    if($query->num_rows() == 1){

        return $query->result();
    }else{

        return false;
    }
//$query = $this->db->get('contatos');

 }

public function insert_entry()
{
$this->title    = $_POST['title']; // please read the below note
$this->content  = $_POST['content'];
$this->date     = time();

$this->db->insert('tb_usuario', $this);
}

public function update_entry()
{
$this->title    = $_POST['title'];
$this->content  = $_POST['content'];
$this->date     = time();

$this->db->update('entries', $this, array('id' => $_POST['id']));
}

}