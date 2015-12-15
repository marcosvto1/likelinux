<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
       // $this->load->model('form_model');
    }

    public function index()
    {

    }

    public function teste(){
        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $data['categorias'] = $this->categoria_model->getCategoriaByUsuario($id);
            $dados = $this->usuario_model->getbyid($id);
            foreach($dados as $row){
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;            }

            $data['posts']= $this->post_model->getByUser($id);



            $this->load->view('usuario/teste', $data);
            ///print "sexo";
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function getPostByUserPaginarion(){

        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $id_user = $session_data['id'];
            $last_id = $this->input->post('last_id');
            $limit = 9; // default value
            $dados =$this->post_model->getByUserPagination($id_user,$last_id,$limit);

            $last_id = 0;
            $link_post = "";
            //<a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">visualizar conteudo</a>
            foreach($dados as $key => $post) {
                if($post->tipo_post == 1){
                    $link_post = '<a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">Visualizar</a>';
                }else if($post->tipo_post == 2){
                    $link_post = '<a href="/v/'.$post->id_post.'/'.url_title($post->titulo_post).'" class="btn btn-primary-outline">Visualizar</a>';
                }
                $last_id = $post->id_post;
                            echo '<div class="widget">
                                    <div class="widget-controls">
                                        <a href="/editar/post/'.$post->id_post.'"><i class="fa fa-pencil-square-o fa-2x"></i> </a>
                                        <a href="/remover/post/'.$post->id_post.'" id="remover_post" class="po" data-toggle="popover"><i class="fa fa-trash-o fa-2x"></i>
                                            </i></a>
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

                                            <h4>'.$link_post.'</h4>
                                            <h4>

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
                echo '<script type="text/javascript">var contador = '.count($dados).';</script>';
            }
            sleep(1);


        }else{
            redirect('/home');
        }
    }

    public function getPostByUser(){
        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $dados= $this->post_model->getByUser($id);

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
   <a href="/perfil/'.url_title($post->login_usuario).'/'.$post->id_usuario.'" class="pull-right" id="imagem_user"><img src="'.$post->imagem_usuario.'" class="img-thumbnail img-circle" >'.$post->login_usuario.'</a>
        </div>
    </div>


    ';}

        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function getPostFilterByUser($id){
        $this->load->library('session');
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id_user = $session_data['id'];
            $dados= $this->post_model->getCategoriaByUser($id,$id_user);

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
            <h4><a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">Visualizar</a></h4><h4>

                <!--<h4><span class="label label-default"><a href="http://blog.hostdime.com.br/materias/tecnologia/varnish-cache-o-que-e-e-como-implementa-lo/">visualizar conteudo</a></span></h4><h4>-->
                <small class="text-muted">1 hora agosto • <a href="#" class="text-muted">Mais Informação</a></small>
            </h4>
        </div>
        <div class="col-sm-2">
            <a href="/perfil/'.url_title($post->login_usuario).'/'.$post->id_usuario.'" class="pull-right" id="imagem_user"><img src="'.$post->imagem_usuario.'" class="img-thumbnail img-circle" >'.$post->login_usuario.'</a>
        </div>
    </div>
    ';
            }

        }else{
          //If no session, redirect to login page
           redirect('login', 'refresh');

        }
    }

    public function getPostFilterCategoriaPagination($id){
        $this->load->library('session');
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id_user = $session_data['id'];

            $last_id = $this->input->post('last_id');
            $limit = 9; // default value

            if(is_null($last_id)){
               $last_id = 0;
                $dados = $this->post_model->getByCategoriaUser($id,$id_user,$last_id,$limit);
            }else{
                $dados =$this->post_model->getByCategoriaUserPagination($id,$id_user,$last_id,$limit);
            }

            $countData = 1;
            $last_id = 0;
            $link_post = "";
            //<a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">visualizar conteudo</a>
            foreach($dados as $key => $post) {
                if($post->tipo_post == 1){
                    $link_post = '<a href="'.$post->conteudo_post.'" target="_blank" class="btn btn-primary-outline">Visualizar</a>';
                }else if($post->tipo_post == 2){
                    $link_post = '<a href="/v/'.$post->id_post.'/'.url_title($post->titulo_post).'" class="btn btn-primary-outline">Visualizar</a>';

                }
                $last_id = $post->id_post;
                echo '<div class="widget">
                                    <div class="widget-controls">
                                         <a href="/editar/post/'.$post->id_post.'"><i class="fa fa-pencil-square-o fa-2x"></i> </a>
                                        <a href="/remover/post/'.$post->id_post.'" id="remover_post" class="po" data-toggle="popover"><i class="fa fa-trash-o fa-2x"></i>
                                            </i></a>
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

                                            <h4>'.$link_post.'</h4>
                                            <h4>

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
                echo '<script type="text/javascript">var contador = '.count($dados).';</script>';

            }
            sleep(1);


        }else{
            redirect('/home');
        }
    }

    public function home(){
        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $data['categorias'] = $this->categoria_model->getCategoriaByUsuario($id);
            $dados = $this->usuario_model->getbyid($id);
            foreach($dados as $row){
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
                $data['id_usuario'] = $row->id_usuario;
            }

            $data['posts']= $this->post_model->getByUser($id);



            $this->load->view('usuario/home', $data);
            ///print "sexo";
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function editarPerfil(){
        $this->load->helper(array('form'));
        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];


            $dados = $this->usuario_model->getbyid($id);
            foreach($dados as $row){
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
                $data['nome_completo_usuario'] = $row->nome_usuario;
                $data['email_usuario'] = $row->email_usuario;
                $data['descricao_usuario'] = $row->descricao_usuario;
                $data['id_usuario'] = $row->id_usuario;

            }

            $this->load->helper('form');
            $this->load->view('usuario/editar_conta',$data);
            ///print "sexo";
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function cadastro()
    {
        $this->load->helper(array('form'));
        $this->load->view('site/cadastro');
    }

    public function cadastrar()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('nome_usuario', 'Nome', 'required|min_length[5]|max_length[80]');
        $this->form_validation->set_rules('login_usuario_cad', 'Login', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('senha_usuario_cad','Senha','required|min_length[5]|max_length[32]');
        $this->form_validation->set_rules('email_usuario', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('site/index');
        }
        else
        {
            $data['nome_usuario'] = $this->input->post('nome_usuario');
            $data['login_usuario'] = $this->input->post('login_usuario_cad');
            $data['descricao_usuario'] = $this->input->post('descricao_usuario');
            $data['senha_usuario'] = MD5($this->input->post('senha_usuario_cad'));
            $data['email_usuario'] = $this->input->post('email_usuario');
            $data['imagem_usuario'] = "/dist/img/perfil_default.png";
            $this->usuario_model->insert($data);
            $dado['ok'] = "ok";
            redirect('/home?ok=yes',$dado);
        }
    }

    public function logar()
    {

        if(isset($_POST)):

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('login_usuario', 'Login', 'trim|required');
            $this->form_validation->set_rules('senha_usuario', 'Senha', 'trim|required|callback_auth_check');

            if($this->form_validation->run() == FALSE):
                //ocorreu um erro, volta para pagina de login
                $this->load->view('site/index');
            else:
                //vai para area privada
                redirect('/mylinks','refresh');
            endif;
        endif;


    }

    function auth_check($senha)
    {
        //Field validation succeeded.  Validate against database

        $login = $this->input->post('login_usuario');

        //query do banco de dados
        $result = $this->usuario_model->login($login, $senha);
        if($result)
        {
            $this->load->library('session');
            $sess_array = array();
            foreach($result as $row)
            {

                $sess_array = array(
                    'id' => $row->id_usuario,
                    'username' => $row->login_usuario
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return true;
        }
        else
        {
            $this->form_validation->set_message('auth_check', 'Login ou Senha Invalido!');
            return false;
        }


    }

    public function publicar(){
        $this->load->helper(array('form'));
        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $data['categorias'] = $this->categoria_model->get();

            $dados = $this->usuario_model->getbyid($id);
            foreach($dados as $row){
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
                $data['id_usuario'] = $row->id_usuario;
            }

            $this->load->view('usuario/publicar',$data);
            ///print "sexo";
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function publicar_post(){
        $this->load->helper('date');
        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];

            $data['tipo_post'] = $this->input->post('tipo');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($data['tipo_post'] == 1){
                $this->form_validation->set_rules('conteudo_link', 'Link do Conteudo', 'required|min_length[5]|max_length[80]');

            }else{

                $this->form_validation->set_rules('conteudo', 'Conteudo', 'required|min_length[5]');
            }
            $this->form_validation->set_rules('titulo', 'Titulo', 'required|min_length[5]|max_length[80]');

            if ($this->form_validation->run() == FALSE)
            {
                $dados = $this->usuario_model->getbyid($id);
                foreach($dados as $row) {
                    $data['nome_usuario'] = $row->login_usuario;
                    $data['imagem_usuario'] = $row->imagem_usuario;
                }
                $data['categorias'] = $this->categoria_model->get();
                $data['tipo_p'] = $data['tipo_post'];
                    $this->load->view('usuario/publicar',$data);

            }
            else {

                $data['titulo'] = $this->input->post('titulo');

                $data['id_categoria'] = $this->input->post('id_categoria');
                $data['id_usuario'] = $id;
                $data['data_post'] = date("Y-m-d", time());
                $data['tipo_post'] = $this->input->post('tipo');

                if($data['tipo_post'] == 1){
                    $data['conteudo'] = $this->input->post('conteudo_link');

                }else{
                    $data['conteudo'] = $this->input->post('conteudo');
                }

                $this->post_model->insert_post($data);
                $dado['categorias'] = $this->categoria_model->get();
                $dado['ok'] = "ok";
                redirect('/publicar?ok=yes',$dado);

            }

        }
        else
            {
                //If no session, redirect to login page
                redirect('login', 'refresh');
            }
    }

    public function exibirPerfil($login, $id_user){

        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];


            $dados = $this->usuario_model->getbyid($id_user);
            $dados2 = $this->usuario_model->getbyid($id);
            foreach($dados2 as $row){
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
                 $data['id_usuario'] = $row->id_usuario;

            }

            if($dados != null){
                foreach($dados as $row){
                    $data['nome_usuario_perfil'] = $row->login_usuario;
                    $data['imagem_usuario_perfil'] = $row->imagem_usuario;
                    $data['descricao_usuario_perfil'] = $row->descricao_usuario;
                    $data['email_usuario_perfil'] = $row->email_usuario;
                    $data['nome_completo_perfil']= $row->nome_usuario;
                }
            }else{
                $data['nome_usuario_perfil'] = "";
                $data['imagem_usuario_perfil'] = "/dist/img/perfil_default.png";
                $data['descricao_usuario_perfil'] = "";
                $data['email_usuario_perfil'] = "";
                $data['nome_completo_perfil']="";
            }


            $this->load->helper('form');
            $this->load->view('usuario/perfil_usuario',$data);
            ///print "sexo";
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function logout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('/', 'refresh');
    }

    public function ajax_upload($t,$img,$w,$h,$x1,$y1){

    $this->load->library('session');
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $id = $session_data['id'];


        $t_width = 100;    // Maximum thumbnail width
        $t_height = 100;    // Maximum thumbnail height
        $new_name = "small" . md5($img) . ".jpg"; // Thumbnail image name
        $path = "uploads/";
        if (isset($t) and $t == "ajax") {

            $ratio = ($t_width / $w);
            $nw = ceil($w * $ratio);
            $nh = ceil($h * $ratio);
            $nimg = imagecreatetruecolor($nw, $nh);
            $im_src = imagecreatefromjpeg($path . $img);
            imagecopyresampled($nimg, $im_src, 0, 0, $x1, $y1, $nw, $nh, $w, $h);
            imagejpeg($nimg, $path . $new_name, 90);
            $this->usuario_model->updateImgID($id, $new_name);
            echo $new_name . "?" . time();
            exit;
        }
    }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

    }

    public function upload(){

        $this->load->library('session');
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];


            $this->load->helper('form');
            $config = array(
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "2000",
                'max_width' => "2024"
            );


            $this->load->library('upload', $config);
            if ($this->upload->do_upload()) {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $key => $value) {
                    $nome = $value['file_name'];
                }
                $this->usuario_model->updateImgID($id, '/uploads/'.$nome);
                redirect('/editar/perfil', 'refresh');
                // $this->load->view('upload_success',$data);
            } else {
                //$error = array('error' => $this->upload->display_errors());
                //$this->load->view('usuario/editar_conta', $error);
                print_r($this->upload->display_errors());

            }
        }else
            {
                //If no session, redirect to login page
                redirect('login', 'refresh');
            }



      /*  //crop it
        $data['x'] = $this->input->post('x');
        $data['y'] = $this->input->post('y');
        $data['w'] = $this->input->post('w');
        $data['h'] = $this->input->post('h');

        $config['image_library'] = 'gd2';
        //$path =  'uploads/apache.jpg';
        $config['source_image'] = 'uploads/'.$data['user_data']['img_link']; //http://localhost/resume/uploads/apache.jpg
        // $config['create_thumb'] = TRUE;
        //$config['new_image'] = './uploads/new_image.jpg';
        $config['maintain_ratio'] = FALSE;
        $config['width']  = $data['w'];
        $config['height'] = $data['h'];
        $config['x_axis'] = $data['x'];
        $config['y_axis'] = $data['y'];

        $this->load->library('image_lib', $config);

        if(!$this->image_lib->crop())
        {
            echo $this->image_lib->display_errors();
        }
        redirect('profile');
      */
    }

    public function visualizarPost($id_post,$titulo_post){
        $this->load->library('session');
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $dados = $this->usuario_model->getbyid($id);
            foreach($dados as $row){
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
                $data['id_usuario'] = $row->id_usuario;
            }
            $data['post'] = $this->post_model->getPostId($id_post);
            if($data['post'] == null) $this->erro();
            $this->load->view('usuario/visualizar_post',$data);
        }
        else redirect('login', 'refresh');
    }

    public function editar_post($id_post){
        $this->load->helper(array('form'));
        $this->load->library('session');
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $dados = $this->usuario_model->getbyid($id);
            foreach($dados as $row){
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
                $data['id_usuario'] = $row->id_usuario;
            }
            $data['categorias'] = $this->categoria_model->get();
            $data['post'] = $this->post_model->getPostId($id_post);
            if($data['post'] == null) $this->erro();
            else $this->load->view('usuario/editar_post',$data);
        }else redirect('login', 'refresh');
    }

    public function removerPost($id){
        $this->load->library('session');
        if($this->session->userdata('logged_in')) {
            $this->post_model->remover_post($id);
            redirect('/mylinks', 'refresh');
        }else redirect('login', 'refresh');
    }

    public function atualizarPost(){
        $this->load->helper('date');
        $this->load->library('session');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];

            $data['tipo_post'] = $this->input->post('tipo');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($data['tipo_post'] == 1){
                $this->form_validation->set_rules('conteudo_link', 'Link do Conteudo', 'required|min_length[5]|max_length[80]');

            }else{

                $this->form_validation->set_rules('conteudo', 'Conteudo', 'required|min_length[5]');
            }
            $this->form_validation->set_rules('titulo', 'Titulo', 'required|min_length[5]|max_length[80]');

            if ($this->form_validation->run() == FALSE)
            {
                $dados = $this->usuario_model->getbyid($id);
                foreach($dados as $row) {
                    $data['nome_usuario'] = $row->login_usuario;
                    $data['imagem_usuario'] = $row->imagem_usuario;
                    $data['id_usuario'] = $row->id_usuario;
                }
                $data['categorias'] = $this->categoria_model->get();
                $data['tipo_p'] = $data['tipo_post'];
                $data['post'] = $this->post_model->getPostId($this->input->post('post'));
                $this->load->view('usuario/editar_post',$data);

            }else {
                $data['titulo_post'] = $this->input->post('titulo');
                $data['id_post'] = $this->input->post('post');
                $data['id_categoria_post'] = $this->input->post('id_categoria');
                $data['id_usuario_post'] = $id;
                $data['data_post'] = date("Y-m-d", time());
                $data['tipo_post'] = $this->input->post('tipo');

                if ($data['tipo_post'] == 1) {
                    $data['conteudo_post'] = $this->input->post('conteudo_link');

                } else {
                    $data['conteudo_post'] = $this->input->post('conteudo');
                }

                $this->post_model->update_post($data);
                $dado['categorias'] = $this->categoria_model->get();
                $dado['ok'] = "ok";
                redirect('/editar/post/' . $data['id_post'] . '?ok=yes', $dado);
            }

        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }


    }

    public function atualizarConta(){
        $this->load->helper('date');
        $this->load->library('session');
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('nome_usuario', 'Nome', 'required|min_length[5]|max_length[80]');
            $this->form_validation->set_rules('login_usuario_cad', 'Login', 'required|min_length[5]|max_length[20]');
            $this->form_validation->set_rules('senha_usuario_cad','Senha','required|min_length[5]|max_length[32]');
            $this->form_validation->set_rules('email_usuario', 'Email', 'required|valid_email');

            if ($this->form_validation->run() == FALSE)
            {
                $dados = $this->usuario_model->getbyid($id);
                foreach($dados as $row){
                    $data['nome_usuario'] = $row->login_usuario;
                    $data['imagem_usuario'] = $row->imagem_usuario;
                    $data['nome_completo_usuario'] = $row->nome_usuario;
                    $data['email_usuario'] = $row->email_usuario;
                    $data['descricao_usuario'] = $row->descricao_usuario;
                    $data['id_usuario'] = $row->id_usuario;

                }
                $data['categorias'] = $this->categoria_model->get();
                $this->load->view('usuario/editar_conta',$data);

            }
            else
            {
                $data['id_usuario'] = $id;
                $data['nome_usuario'] = $this->input->post('nome_usuario');
                $data['login_usuario'] = $this->input->post('login_usuario_cad');
                $data['descricao_usuario'] = $this->input->post('descricao_usuario');
                $data['senha_usuario'] = MD5($this->input->post('senha_usuario_cad'));
                $data['email_usuario'] = $this->input->post('email_usuario');

                $this->usuario_model->update_usuario($data);
                $dado['ok'] = "ok";
                redirect('editar/perfil/?ok=yes');
            }
        }else{
            redirect('/');
        }

    }

    public function erro(){
        $this->load->helper('date');
        $this->load->library('session');
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $dados = $this->usuario_model->getbyid($id);
            foreach($dados as $row){
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
                $data['id_usuario'] = $row->id_usuario;
            }
            $this->load->view('erros/pagina_nao_encontrada',$data);

        }else{
            redirect('/');
        }
    }

    public function getGrupos(){
        $this->load->helper('date');
        $this->load->library('session');
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            $dados = $this->usuario_model->getbyid($id);
            foreach($dados as $row){
                $data['nome_usuario'] = $row->login_usuario;
                $data['imagem_usuario'] = $row->imagem_usuario;
                $data['id_usuario'] = $row->id_usuario;
            }
            $this->load->view('usuario/meus_grupo',$data);

        }else{
            redirect('/');
        }
    }

}
