<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('rol') == "admin") {
            header('Location: ' . base_url() . 'BienvenidoAdmin');
        } elseif ($this->session->userdata('rol') == "user") {
            header('Location: ' . base_url() . 'Bienvenido');
        }
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function iniciarSesion()
    {

        if ($this->input->post()) {

            $usuario = $this->input->post('usuario');
            $password = $this->input->post('password');
            $row = $this->UsuarioModel->getUser($usuario, $password);
            if ($row) {
                if ($row->activo == 1) {
                    $data = array(
                        "usuario" => $row->id_usuario,
                        "municipio" => $row->id_municipio,
                        "nombreUsuario" => $row->nombre . " " . $row->apellido_paterno . " " . $row->apellido_materno,
                        "unidadResponsable" => $row->id_unidad_responsable,
                        "rol" => $row->rol,
                        "obras" => $row->usuario_obras
                    );
                    $this->session->set_userdata($data);
                    echo $row->rol;
                }else{
                    echo "inactivo";
                }
            } else {
                echo json_encode("error");
            }
        }
    }

    public function destruir()
    {
        $this->session->sess_destroy();
        header('Location: ' . base_url());
    }
}
