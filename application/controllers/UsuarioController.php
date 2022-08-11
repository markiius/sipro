<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsuarioController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
            header('Location: ' . base_url());
        }
    }

    public function index()
    {
        $arrayUsuarios = array();
        
        $data['municipios'] = $this->MunicipioModel->getAllMunicipio();
        $municipios = $this->MunicipioModel->getAllMunicipio();
        foreach ($municipios as $key => $value) {

            $usuarios = $this->UsuarioModel->getUsersPorMunicipio($value->id_municipio);
            if($usuarios){
                foreach ($usuarios as $key => $val) {
                $object = (object) [
                    "id_usuario" => $val->id_usuario,
                    "nombre" => $val->nombre,
                    "apellido_paterno" => $val->apellido_paterno,
                    "apellido_materno" => $val->apellido_materno,
                    "correo" => $val->correo,
                    "telefono" => $val->telefono,
                    "usuario" => $val->usuario,
                    "password" => $val->password,
                    "nombre_unidad" => $val->nombre_unidad,
                    "NombreMunicipio" => $val->NombreMunicipio,
                    "rol" => $val->rol,
                    "activo" => $val->activo,
                ];
                array_push($arrayUsuarios, $object);
            }
            }
            
        }

        $data['usuarios'] = $arrayUsuarios;
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/usuarios/index', $data);
        $this->load->view('partials/footer');
    }

    public function insertarUsuario()
    {
        if ($this->input->post()) {
            $nombre = $this->input->post('nombreUsuario');
            $apellidoPaterno = $this->input->post('apellidoPaterno');
            $apellidoMaterno = $this->input->post('apellidoMaterno');
            $correo = $this->input->post('correo');
            $telefono = $this->input->post('telefono');
            $usuario = $this->input->post('usuario');
            $password = $this->input->post('password');
            $unidadResponsable = $this->input->post('unidadResponsable');
            $municipio = $this->input->post('municipio');
            $rol = "user";
            $usuario_obras = $this->input->post('usuario_obras');
            if(empty($usuario_obras)){
                $dato = 0;
                $res = $this->UsuarioModel->insertUser($nombre, $apellidoPaterno, $apellidoMaterno, $correo, $telefono, $usuario, $password, $unidadResponsable, $municipio, $rol, $dato);
            }else{
                //echo "si existe";
                $dato = 1;
                $res = $this->UsuarioModel->insertUser($nombre, $apellidoPaterno, $apellidoMaterno, $correo, $telefono, $usuario, $password, $unidadResponsable, $municipio, $rol, $dato);
            }
            
            
            echo json_encode($res); 

            
        }
    }

    public function actualizarUsuario()
    {
        if ($this->input->post()) {
            $idUsuario = $this->input->post('idUser');
            $nombre = $this->input->post('nombreUsuarioUpdate');
            $apellidoPaterno = $this->input->post('apellidoPaternoUpdate');
            $apellidoMaterno = $this->input->post('apellidoMaternoUpdate');
            $correo = $this->input->post('correoUpdate');
            $telefono = $this->input->post('telefonoUpdate');
            $usuario = $this->input->post('usuarioUpdate');
            $password = $this->input->post('passwordUpdate');
            $id_status = $this->input->post('id_status');
            $res = $this->UsuarioModel->updateUser($idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $correo, $telefono, $usuario, $password, $id_status);
            echo $res;
        }
    }

    public function actualizarUsuarioAdmin()
    {
        if ($this->input->post()) {
            $idUsuario = $this->input->post('idUser');
            $nombre = $this->input->post('nombreUsuarioUpdate');
            $apellidoPaterno = $this->input->post('apellidoPaternoUpdate');
            $apellidoMaterno = $this->input->post('apellidoMaternoUpdate');
            $correo = $this->input->post('correoUpdate');
            $telefono = $this->input->post('telefonoUpdate');
            $usuario = $this->input->post('usuarioUpdate');
            $password = $this->input->post('passwordUpdate');
            $id_status = $this->input->post('id_status');

            $res = $this->UsuarioModel->updateUserAdmin($idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $correo, $telefono, $usuario, $password, $id_status);
            echo $res;
        }
    }

    public function eliminarUsuario()
    {
        if ($this->input->post()) {
            $idUsuario = $this->input->post('idUsuario');

            $res = $this->UsuarioModel->deleteUser($idUsuario);
            echo json_encode($res);
        }
    }

    public function buscarUsuario()
    {
        if ($this->input->post()) {
            $idUsuario = $this->input->post('idUsuario');

            $res = $this->UsuarioModel->getUserUpdate($idUsuario);
            echo json_encode($res);
        }
    }

    public function buscarUsuarioAdmin()
    {
        if ($this->input->post()) {
            $idUsuario = $this->input->post('idUsuario');

            $res = $this->UsuarioModel->getUserUpdateAdmin($idUsuario);
            echo json_encode($res);
        }
    }

    public function internos()
    {
        $data['usuarios'] = $this->UsuarioModel->getAllUsers();
        $data['municipios'] = $this->MunicipioModel->getAllMunicipios();
        //var_dump($data['usuarios']);
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/usuarios_internos/index', $data);
        $this->load->view('partials/footer');
    }

    public function insertarUsuarioAdmin()
    {
        if ($this->input->post()) {
            $nombre = $this->input->post('nombreUsuario');
            $apellidoPaterno = $this->input->post('apellidoPaterno');
            $apellidoMaterno = $this->input->post('apellidoMaterno');
            $correo = $this->input->post('correo');
            $telefono = $this->input->post('telefono');
            $usuario = $this->input->post('usuario');
            $password = $this->input->post('password');
            $unidadResponsable = $this->input->post('unidadResponsable');
            $municipio = $this->input->post('municipio');
            $rol = $this->input->post('id_rol');

            $res = $this->UsuarioModel->insertUser($nombre, $apellidoPaterno, $apellidoMaterno, $correo, $telefono, $usuario, $password, $unidadResponsable, $municipio, $rol);
            echo json_encode($res);
        }
    }

    public function cambiarStatusTodosLosUsuarios(){
        $arrayUsuarios = array();
        
        $status = $this->input->post('status');
        echo "status  ".$status;
        $data['municipios'] = $this->MunicipioModel->getAllMunicipio();
        $municipios = $this->MunicipioModel->getAllMunicipio();
        foreach ($municipios as $key => $value) {

            $usuarios = $this->UsuarioModel->getUsersPorMunicipio($value->id_municipio);
            
            foreach ($usuarios as $key => $val) {

                $this->UsuarioModel->updateAllUserStatus($val->id_usuario, $status);

            }
            
        }


    }
    
}

/* End of file UsuarioController.php */
