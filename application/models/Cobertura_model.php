<?php
class Cobertura_model extends CI_Model {

    public $id;
    public $nome_album;
    public $data;
    public $local;
    public $capa;

    public function __construct()
    {
// Call the CI_Model constructor
        $this->load->database();
    }

    public function get()
    {
        $query = $this->db->get('album');
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
