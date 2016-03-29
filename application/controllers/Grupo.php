<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grupo extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('post_model');
        $this->load->model('usuario_model');
        $this->load->model('grupo_model');
        $this->load->model('categoria_model');
        $this->load->model('solicitacao_model');
        $this->load->helper('html');
        $this->load->helper('url');
        // $this->load->model('form_model');
    }

    public function getGrupos()
    {
        $this->load->helper('date');
        $this->load->library('session');
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $dados = $this->usuario_model->getbyid($id);
            foreach ($dados as $row) {
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
                $data['id_usuario'] = $row->id_usuario;
            }
            $data['solicitacao'] = count($this->solicitacao_model->get($id));
            $data['grupos_user'] = $this->grupo_model->getGruposUser($id);
            $this->load->view('usuario/meus_grupo', $data);

        } else {
            redirect('/');
        }
    }

    public function visualizarGrupo($id_grupo, $nome)
    {

        // $string = str_replace("-", " ", $nome);

        //  print $id."".$string;
        $this->load->library('session');
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $data['categorias'] = $this->categoria_model->getCategoriaByGrupo($id_grupo);
            $dados = $this->usuario_model->getbyid($id);
            foreach ($dados as $row) {
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
                $data['id_usuario'] = $row->id_usuario;
            }
            $data['solicitacao'] = count($this->solicitacao_model->get($id));
            $data['nome_grupo'] =  str_replace("-", " ", $nome);
            $data['id_grupo'] = $id_grupo;
            $data['posts'] = $this->grupo_model->getPostGrupo($id_grupo);
             //$this->post_model->getByUser($id);


            $this->load->view('grupo/grupo', $data);
            ///print "sexo";
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }


    }

    public function getPessoasGrupo($id_grupo, $nome){
        $this->load->helper('date');
        $this->load->library('session');
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $dados = $this->usuario_model->getbyid($id);
            foreach ($dados as $row) {
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
                $data['id_usuario'] = $row->id_usuario;
            }
            $data['solicitacao'] = count($this->solicitacao_model->get($id));
            $data['nome_grupo'] =  str_replace("-", " ", $nome);
            $data['id_grupo'] = $id_grupo;
            $data['grupos_user'] = $this->grupo_model->getUsuarios($id_grupo);
            $this->load->view('grupo/pessoas_grupo', $data);

        } else {
            redirect('/');
        }

    }

   public function addPessoasGrupo($id_grupo, $nome){
       $this->load->helper('date');
       $this->load->library('session');
       if ($this->session->userdata('logged_in')) {
           $session_data = $this->session->userdata('logged_in');
           $id = $session_data['id'];
           $dados = $this->usuario_model->getbyid($id);
           foreach ($dados as $row) {
               $data['nome_usuario'] = $row->login_usuario;
               $data['imagem_usuario'] = $row->imagem_usuario;
               $data['id_usuario'] = $row->id_usuario;
           }
           $data['solicitacao'] = count($this->solicitacao_model->get($id));
           $data['nome_grupo'] =  str_replace("-", " ", $nome);
           $data['id_grupo'] = $id_grupo;
           $data['grupos_user'] = $this->usuario_model->getUsuarioNoGrupo($id_grupo);
           $this->load->view('grupo/add_pessoas', $data);

       } else {
           redirect('/');
       }


   }
}