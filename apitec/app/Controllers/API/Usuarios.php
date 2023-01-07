<?php

namespace App\Controllers\API;

use App\Models\UsuariosModel;
use CodeIgniter\RESTful\ResourceController;

class Usuarios extends ResourceController

{
    public function __construct() {
        $this->model = $this->setModel(new UsuariosModel());
    }


    public function index()
    {
        $usuarios = $this->model->findAll();
        return $this->respond($usuarios);
    }


    public function create()
    {
        try {
            $usuario = $this->request->getJSON();
            if($this->model->insert($usuario)):
                $usuario->id_usuarios = $this->model->insertID();
                return $this->respondCreated($usuario);
            endif;
                return $this->failValidationErrors($this->model->validation->listErrors());
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function buscar($id_usuarios = null)
    {
        try {
            if($id_usuarios == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $usuario = $this->model->find($id_usuarios);
            if($usuario == null)
                return $this->failNotFound('No se ha encontrado un ejercicio con el id: '.$id_usuarios);

            return $this->respond($usuario);

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


    public function update($id_usuarios = null)
    {
        try {
            if ($id_usuarios == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $usuarioVerificado = $this->model->find($id_usuarios);
            if($usuarioVerificado == null)
            return $this->failNotFound('No se ha encontrado el usuario con el id: '.$id_usuarios);

            $usuario = $this->request->getJSON();

            if($this->model->update($id_usuarios, $usuario)):
                $usuario->id_usuarios = $id_usuarios;
                return $this->respondUpdated($usuario);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function delete($id_usuarios = null)
    {
        try {
            if ($id_usuarios == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $usuarioVerificado = $this->model->find($id_usuarios);
            if($usuarioVerificado == null)
            return $this->failNotFound('No se ha encontrado el ejercicio con el id: '.$id_usuarios);

            if($this->model->delete($id_usuarios)): 
                return $this->respondDeleted($usuarioVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


}