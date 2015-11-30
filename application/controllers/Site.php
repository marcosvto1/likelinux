<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {


    public function __construct()
    {

        parent::__construct();
        //$this->load->model('agenda_model');
        //$this->load->model('cobertura_model');
       // $this->load->helper('date');
        $this->load->model('post_model');
        $this->load->model('usuario_model');
        $this->load->model('categoria_model');
        $this->load->helper('html');
        $this->load->helper('url');
    }

    public function index()
    {
       $this->load->helper('form');
        $dado['posts'] = $this->post_model->get();
        $dado['categorias'] = $this->categoria_model->get();
       // $dado['coberturas'] = $this->cobertura_model->get();
       setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
       date_default_timezone_set ( 'America/Sao_Paulo' );
         $this->load->view('site/index',$dado);
    }

    public function globalPost(){
        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $data['posts'] = $this->post_model->get();
            $data['categorias'] = $this->categoria_model->get();

            $dados = $this->usuario_model->getbyid($id);
            foreach($dados as $row){
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
            }

            $this->load->view('site/global_post', $data);

        }
        else
        {
            //If no session, redirect to login page
            redirect('/home', 'refresh');
        }
    }

    public function getPostAll(){
        $dados= $this->post_model->get();

        foreach($dados as $key => $post) {
            echo '<div class="col-sm-12" id="featured">
        <div class="page-header text-muted">'.
                $post->nome_categoria.'
        </div>
    </div>

    <!--/top story-->

    <div class="row">
        <div class="col-sm-10">
            <h3>'.$post->titulo_post.'</h3>
            <h4><a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">visualizar conteudo</a></h4><h4>

                <!--<h4><span class="label label-default"><a href="http://blog.hostdime.com.br/materias/tecnologia/varnish-cache-o-que-e-e-como-implementa-lo/">visualizar conteudo</a></span></h4><h4>-->
                <small class="text-muted">1 hora agosto • <a href="#" class="text-muted">Mais Informação</a></small>
            </h4>
        </div>
        <div class="col-sm-2">
             <a href="/perfil/'.url_title($post->login_usuario).'/'.$post->id_usuario.'" class="pull-right" id="imagem_user"><img src="'.$post->imagem_usuario.'" class="img-thumbnail img-circle">'.$post->login_usuario.'</a>
        </div>
    </div>
    ';
        }

    }

    public function publicar(){
        $this->load->helper('form');
        $data['categorias'] = $this->categoria_model->get();
       $this->load->view('usuario/publicar',$data);
    }

    public function publicar_post(){

        $data['titulo'] = $this->input->post('titulo');
        $data['conteudo'] = $this->input->post('conteudo');
        $data['id_categoria'] = $this->input->post('id_categoria');
        $this->post_model->insert_post($data);
        $dado['categorias'] = $this->categoria_model->get();
        $dado['ok'] = "ok";
        redirect('/publicar?ok=yes',$dado);
        //$this->load->view('site/publicar',$dado);
       // print $data['titulo'];
    }

    public function filterCategoria($id){

        $dados= $this->post_model->get_categoria($id);

        foreach($dados as $key => $post) {
          echo '<div class="col-sm-12" id="featured">
        <div class="page-header text-muted">'.
          $post->nome_categoria.'
        </div>
    </div>

    <!--/top story-->

    <div class="row">
        <div class="col-sm-10">
            <h3>'.$post->titulo_post.'</h3>
            <h4><a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">visualizar conteudo</a></h4><h4>

                <!--<h4><span class="label label-default"><a href="http://blog.hostdime.com.br/materias/tecnologia/varnish-cache-o-que-e-e-como-implementa-lo/">visualizar conteudo</a></span></h4><h4>-->
                <small class="text-muted">1 hora agosto • <a href="#" class="text-muted">Mais Informação</a></small>
            </h4>
        </div>
        <div class="col-sm-2">
 <a href="/perfil/'.url_title($post->login_usuario).'/'.$post->id_usuario.'" class="pull-right" id="imagem_user"><img src="'.$post->imagem_usuario.'" class="img-thumbnail img-circle">'.$post->login_usuario.'</a>
        </div>
    </div>
    ';
    }



      //  echo json_encode($dados);
    }
}
