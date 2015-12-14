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
                $data['id_user'] = $id;
            }

            $this->load->view('site/global_post', $data);

        }
        else
        {
            //If no session, redirect to login page
            redirect('/home', 'refresh');
        }
    }

    public function getPostAllPagination(){
        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $id_user = $session_data['id'];
            $last_id = $this->input->post('last_id');
            $limit = 9; // default value
            $dados =$this->post_model->getPagination($last_id,$limit);

            $last_id = 0;
            $link_post = "";
            //<a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">visualizar conteudo</a>
            foreach($dados as $key => $post) {

                $remover ='';
                $editar = '';
                if($id_user == $post->id_usuario){
                    $remover = '<a href="removar/post/'.$post->id_post.'"><i class="fa fa-trash-o fa-2x"></i></a>';
                    $editar = '<a href="#"><i class="fa fa-pencil-square-o fa-2x"></i> </a>';
                }

                if($post->tipo_post == 1){
                    $link_post = '<a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">Visualizar</a>';
                }else if($post->tipo_post == 2){
                    $link_post = '<a href="/post/'.url_title($post->titulo_post).'" target="_blank" class="btn btn-primary-outline">Visualizar</a>';
                }else{
                    $link_post = '<a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">Visualizar</a>';
                }
                $last_id = $post->id_post;
                echo '<div class="widget">
                                    <div class="widget-controls">
                                                '.$editar.'

                                                '.$remover.'

                                    </div>
                                    <div class="col-sm-12" id="featured">
                                        <div class="page-header2 text-muted">
                                            '.$post->nome_categoria.'
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <hr/>
                                            <h3>'.$post->titulo_post.'</h3>
                                            <br/>
                                            <h4>'.$link_post.'</h4>
                                            <h4>
                                                <br/>
                                                <p class="fs-mini text-muted"><time>25 mins</time> &nbsp; <i class="fa fa-map-marker"></i> &nbsp; near Amsterdam</p>

                                            </h4>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="/perfil/'.url_title($post->login_usuario).'/'.$post->id_usuario.'" class="pull-right" id="imagem_user"><img src="'.$post->imagem_usuario.'" class="img-thumbnail img-circle" >'.$post->login_usuario.'</a>
                                        </div>
                                    </div>
                                 </div>';
            }

            if ($last_id != 0) {
                echo '<script type="text/javascript">var last_id = '.$last_id.';</script>';
            }
            sleep(1);


        }else{
            redirect('/home');
        }

    }

    public function getPostAll(){

        $this->load->library('session');
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];

            $dados = $this->post_model->get();

            foreach ($dados as $key => $post) {
                $remover ='';
                if($id == $post->id_usuario){
                    $remover = '<a href="removar/post/'.$post->id_post.'"><i class="fa fa-trash-o"></i></a>';
                }
                echo '<div class="col-sm-12" id="featured">
        <div class="page-header text-muted">' .
                    $post->nome_categoria . '
        </div>
    </div>

    <!--/top story-->

    <div class="row">
        <div class="col-sm-10">
            <h3>' . $post->titulo_post . '</h3>
            <h4><a href="' . $post->conteudo_post . '" target="_blank" class="btn btn-primary-outline">visualizar conteudo</a></h4><h4>

                <!--<h4><span class="label label-default"><a href="http://blog.hostdime.com.br/materias/tecnologia/varnish-cache-o-que-e-e-como-implementa-lo/">visualizar conteudo</a></span></h4><h4>-->
                <small class="text-muted">1 hora agosto  </small>
                 '.$remover.'
            </h4>
        </div>
        <div class="col-sm-2">
             <a href="/perfil/' . url_title($post->login_usuario) . '/' . $post->id_usuario . '" class="pull-right" id="imagem_user"><img src="' . $post->imagem_usuario . '" class="img-thumbnail img-circle">' . $post->login_usuario . '</a>
        </div>
    </div>
    ';
            }

        }else{

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
                <span class="glyphicons glyphicons-cogwheel"></span>
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
