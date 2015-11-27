<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {

        parent::__construct();
        //$this->load->model('agenda_model');
        //$this->load->model('cobertura_model');
       // $this->load->helper('date');
        $this->load->model('post_model');
        $this->load->model('categoria_model');
        $this->load->helper('html');
        $this->load->helper('url');
    }
    public function index()
    {

        $dado['posts'] = $this->post_model->get();
        $dado['categorias'] = $this->categoria_model->get();
       // $dado['coberturas'] = $this->cobertura_model->get();
       setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
       date_default_timezone_set ( 'America/Sao_Paulo' );
         $this->load->view('site/index',$dado);
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
            <h3>'.$post->titulo.'</h3>
            <h4><a href="'.$post->conteudo.'" target="_blank" class="btn btn-primary-outline">visualizar conteudo</a></h4><h4>

                <!--<h4><span class="label label-default"><a href="http://blog.hostdime.com.br/materias/tecnologia/varnish-cache-o-que-e-e-como-implementa-lo/">visualizar conteudo</a></span></h4><h4>-->
                <small class="text-muted">1 hora agosto • <a href="#" class="text-muted">Mais Informação</a></small>
            </h4>
        </div>
        <div class="col-sm-2">
            <a href="#" class="pull-right"><img src="/dist/img/perfil2.jpg" class="img-circle"></a>
        </div>
    </div>
    ';
        }

    }

    public function publicar(){
        $data['categorias'] = $this->categoria_model->get();
       $this->load->view('site/publicar',$data);
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
            <h3>'.$post->titulo.'</h3>
            <h4><a href="'.$post->conteudo.'" target="_blank" class="btn btn-primary-outline">visualizar conteudo</a></h4><h4>

                <!--<h4><span class="label label-default"><a href="http://blog.hostdime.com.br/materias/tecnologia/varnish-cache-o-que-e-e-como-implementa-lo/">visualizar conteudo</a></span></h4><h4>-->
                <small class="text-muted">1 hora agosto • <a href="#" class="text-muted">Mais Informação</a></small>
            </h4>
        </div>
        <div class="col-sm-2">
            <a href="#" class="pull-right"><img src="/dist/img/perfil2.jpg" class="img-circle"></a>
        </div>
    </div>
    ';
    }



      //  echo json_encode($dados);
    }
}
