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

       $sql ='SELECT C.id_usuario, C.nome_usuario ,C.login_usuario
              FROM tb_usuarios_grupo B ,tb_grupo A, tb_usuario C
              WHERE A.id_grupo = B.id_grupo
              AND B.id_usuario = C.id_usuario
              AND A.id_grupo = ?';
        $query = $this->db->query($sql,array($id_grupo));
        return $query->result();

    }
    public function getPostGrupo($id_grupo){

        $sql ='SELECT
              A.id_post,
               A.titulo_post,
                A.conteudo_post,
                A.tipo_post,
                 B.nome_categoria,
                  C.imagem_usuario,
                  C.login_usuario,
                  C.id_usuario
              FROM tb_post A ,
               tb_categoria B,
               tb_usuario C,
               tb_grupo_post D,
               tb_grupo E
              WHERE A.id_categoria_post = B.id_categoria
                AND A.id_usuario_post = C.id_usuario
                AND D.id_grupo = E.id_grupo
                AND A.id_post = D.id_post
                AND E.id_grupo = ?';
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
        $sql ='SELECT DISTINCT A.id_grupo, A.nome_grupo
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

    public function insert_user($id_usuario,$id_grupo)
    {
        $this->db->set('id_grupo', $id_grupo);
        $this->db->set('id_usuario', $id_usuario);

        $this->db->insert('tb_usuarios_grupo');
    }





}