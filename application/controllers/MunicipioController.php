<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class MunicipioController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
        	header('Location: ' . base_url());
        }

    }

    public function getMunicipios()
    {
        $municipios = $this->MunicipioModel->getAllMunicipio();
        $data['municipios'] = $municipios;
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/municipios', $data);
        $this->load->view('partials/footer');
    }


    public function getMunicipioAnaliticos(){
        $municipios = $this->MunicipioModel->getAllMunicipio();
        $data['municipios'] = $municipios;
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/municipios_analitico', $data);
        $this->load->view('partials/footer');
    }


}

/* End of file MunicipioController.php */
