<?php 

namespace App\Controllers\API;

use App\Models\EjerciciosModel;
use CodeIgniter\RESTful\ResourceController;

class Ejercicios extends ResourceController
 
{ 
    public function __construct() {
        $this->model = $this->setModel(new EjerciciosModel());
    }

 
    public function index()
    {
        $ejercicios = $this->model->findAll();
        return $this->respond($ejercicios);
    }

 
    public function create()
    {
        try {
            $ejercicio = $this->request->getJSON();
            if($this->model->insert($ejercicio)):
                $ejercicio->id_ejercicios = $this->model->insertID();
                return $this->respondCreated($ejercicio);
            endif;
                return $this->failValidationErrors($this->model->validation->listErrors());
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


    public function buscar($id_ejercicios = null) 
    {
        try {
            if($id_ejercicios == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $ejercicio = $this->model->find($id_ejercicios);
            if($ejercicio == null)
                return $this->failNotFound('No se ha encontrado un ejercicio con el id: '.$id_ejercicios);

            return $this->respond($ejercicio);

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


    public function update($id_ejercicios = null)
    {
        try {
            if ($id_ejercicios == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $ejercicioVerificado = $this->model->find($id_ejercicios);
            if($ejercicioVerificado == null)
            return $this->failNotFound('No se ha encontrado el ejercicio con el id: '.$id_ejercicios);

            $ejercicio = $this->request->getJSON();

            if($this->model->update($id_ejercicios, $ejercicio)):
                $ejercicio->id_ejercicio = $id_ejercicios;
                return $this->respondUpdated($ejercicio);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function delete($id_ejercicios = null)
    {
        try {
            if ($id_ejercicios == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $ejercicioVerificado = $this->model->find($id_ejercicios);
            if($ejercicioVerificado == null)
            return $this->failNotFound('No se ha encontrado el ejercicio con el id: '.$id_ejercicios);

            if($this->model->delete($id_ejercicios)): 
                return $this->respondDeleted($ejercicioVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

 
}
