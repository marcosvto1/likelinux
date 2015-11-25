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
        $this->load->model('contato_model');
        $this->load->model('servico_model');
        $this->load->helper('html');
    }
    public function index()
    {

        $dado['contatos'] = $this->contato_model->get();
        $dado['servicos'] = $this->servico_model->get();
       // $dado['coberturas'] = $this->cobertura_model->get();
       setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
       date_default_timezone_set ( 'America/Sao_Paulo' );
         $this->load->view('site/index',$dado);
    }
}
