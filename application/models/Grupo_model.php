<?php
class Grupo_model extends CI_Model {

    private $id_grupo;
    private $id_usuario;
    private $nome_grupo;

    public function __construct()
    {
// Call the CI_Model constructor
        $this->load->database();
    }

    public function getUsuarios($id_grupo){

       $sql ='SELECT *
              FROM tb_usuarios_grupo B ,tb_grupo A
              WHERE A.id_grupo = B.
              AND A.id_grupo = ?';
        $query = $this->db->query($sql,array($id_grupo));
        return $query->result();

    }

    public function getGrupo($id)
    {
        $sql ='SELECT *
              FROM tb_grupo
              WHERE id_grupo = ? ORDER by id_grupo DESC ';
        $query = $this->db->query($sql,array($id));
        return $query->result();

    }

    public function getGruposUser($id)
    {
        $sql ='SELECT A.id_grupo, A.nome_grupo
              FROM tb_grupo A
              INNER JOIN tb_usuarios_grupo B
              ON (A.id_grupo = B.id_grupo AND B.id_usuario = ?) OR (A.id_grupo = B.id_grupo AND A.id_usuario_admin = ?)
             ';


      /*  $sql ='SELECT distinct A.id_grupo, A.nome_grupo
              FROM tb_grupo A
              LEFT JOIN tb_usuarios_grupo B
              ON A.id_grupo = B.id_grupo
             ';
*/
        $query = $this->db->query($sql,array($id,$id));
        return $query->result();

    }




}