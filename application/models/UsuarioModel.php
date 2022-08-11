<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getUser($usuario, $password)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuario', $usuario);
        $this->db->where('password', $password);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function getUsers()
    {
        $this->db->select('*');
        $this->db->from('usuarios U');
        $this->db->join('unidades_responsables UR', 'UR.id_unidad_responsable = U.id_unidad_responsable');
        $this->db->join('municipios M', 'M.id_municipio = U.id_municipio');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getUsersPorMunicipio($id_municipio) 
    {
        $this->db->select('*');
        $this->db->from('usuarios U');
        $this->db->join('unidades_responsables UR', 'UR.id_unidad_responsable = U.id_unidad_responsable');
        $this->db->join('municipios M', 'M.id_municipio = U.id_municipio');
        $this->db->where('M.id_municipio', $id_municipio);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getUserUpdate($idUsuario)
    {
        $this->db->select('*');
        $this->db->from('usuarios U');
        $this->db->join('unidades_responsables UR', 'UR.id_unidad_responsable = U.id_unidad_responsable');
        $this->db->join('municipios M', 'M.id_municipio = U.id_municipio');
        $this->db->where('id_usuario', $idUsuario);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function getUserArea($id)
    {
        $this->db->select('*');
        $this->db->from('areas');
        $this->db->join('usuarios', 'usuarios.area_id = areas.id_area');
        $this->db->where('usuarios.municipio_id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function insertUser($nombre, $apellidoPaterno, $apellidoMaterno, $correo, $telefono, $usuario, $password, $unidadResponsable, $municipio, $rol, $usuario_obras){
        $data = array(
            "nombre" => $nombre,
            "apellido_paterno" => $apellidoPaterno,
            "apellido_materno" => $apellidoMaterno,
            "correo" => $correo,
            "telefono" => $telefono,
            "usuario" => $usuario,
            "password" => $password,
            "id_unidad_responsable" => $unidadResponsable,
            "id_municipio" => $municipio,
            "rol" => $rol,
            "activo" => 1,
            "usuario_obras" => $usuario_obras
        );

        $this->db->insert('usuarios', $data);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->error();
        }
    }

    public function deleteUser($idUsuario){
        $this->db->where('id_usuario', $idUsuario);
        $this->db->delete('usuarios');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function updateUser($idUsuario,$nombre, $apellidoPaterno, $apellidoMaterno, $correo, $telefono, $usuario, $password, $id_status){
        $data = array(
            "nombre" => $nombre,
            "apellido_paterno" => $apellidoPaterno,
            "apellido_materno" => $apellidoMaterno,
            "correo" => $correo,
            "telefono" => $telefono,
            "usuario" => $usuario,
            "password" => $password,
            "activo" => $id_status 
        );

        $this->db->set($data);
        $this->db->where('id_usuario', $idUsuario);
        $this->db->update('usuarios');
        
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function updateAllUserStatus($idUsuario, $status){
        $data = array(
            "activo" => $status 
        );

        $this->db->set($data);
        $this->db->where('id_usuario', $idUsuario);
        $this->db->update('usuarios');
        
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function updateUserAdmin($idUsuario,$nombre, $apellidoPaterno, $apellidoMaterno, $correo, $telefono, $usuario, $password, $id_status){
        $data = array(
            "nombre" => $nombre,
            "apellido_paterno" => $apellidoPaterno,
            "apellido_materno" => $apellidoMaterno,
            "correo" => $correo,
            "telefono" => $telefono,
            "usuario" => $usuario,
            "password" => $password,
            "activo" => $id_status 
        );

        $this->db->set($data);
        $this->db->where('id_usuario', $idUsuario);
        $this->db->update('usuarios');
        
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function getAreasUsuario()
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->join('unidades_responsables', 'unidades_responsables.id_unidad_responsable = usuarios.id_unidad_responsable');
        $this->db->where('usuarios.id_municipio', 26);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAreasPrograma($id_programa)
    {
        $this->db->select('*');
        $this->db->from('programas p');
        $this->db->join('componentes c', 'c.id_programa = p.id_programa');
        $this->db->join('actividades a', 'a.id_componente = c.id_componente');
        $this->db->join('usuarios u', 'u.id_usuario = a.id_usuario');
        $this->db->join('unidades_responsables ur', 'ur.id_unidad_responsable = u.id_unidad_responsable');
        $this->db->where('p.id_programa', $id_programa);
        $this->db->group_by('ur.nombre_unidad');
        $query = $this->db->get();
        return $query->result();
    }

    public function getOneUsuario($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->join('unidades_responsables', 'unidades_responsables.id_unidad_responsable = usuarios.id_unidad_responsable');
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get();
        return $query->row();
    }

    public function getAllUsers()
    {
        $this->db->select('*');
        $this->db->from('usuarios U');
        $this->db->where('rol', 'admin');
        //$this->db->join('unidades_responsables UR', 'UR.id_unidad_responsable = U.id_unidad_responsable');
        //$this->db->join('municipios M', 'M.id_municipio = U.id_municipio');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getUserUpdateAdmin($idUsuario)
    {
        $this->db->select('*');
        $this->db->from('usuarios U');
        /* $this->db->join('unidades_responsables UR', 'UR.id_unidad_responsable = U.id_unidad_responsable');
        $this->db->join('municipios M', 'M.id_municipio = U.id_municipio'); */
        $this->db->where('id_usuario', $idUsuario);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function getResponsableForAnalitico($id_municipio){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuario_obras', 1);
        $this->db->where('id_municipio', $id_municipio);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    
}

/* End of file usuarioModel.php */
