<?php
class Postgrupo_model extends CI_Model {

    private $id_grupo;
    private $id_post;
    private $id_grupo_post;

    public function __construct()
    {
// Call the CI_Model constructor
        $this->load->database();
    }


    public function insert_post($id_post,$id_grupo)
    {
        $this->db->set('id_grupo', $id_post);
        $this->db->set('id_post', $id_grupo);

          $this->db->insert('tb_grupo_post');
    }




}