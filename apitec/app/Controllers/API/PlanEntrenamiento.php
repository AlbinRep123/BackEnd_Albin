<?php

namespace App\Controllers\API;

use App\Models\PlanEntrenamientoModel;
use CodeIgniter\RESTful\ResourceController;

class PlanEntrenamiento extends ResourceController

{
    public function __construct() {
        $this->model = $this->setModel(new PlanEntrenamientoModel());
    }

 
    public function index()
    {
        $planEntrenamiento = $this->model->findAll();
        return $this->respond($planEntrenamiento);
    }


    public function create()
    {
        try {
            $planEntre = $this->request->getJSON();
            if($this->model->insert($planEntre)):
                $planEntre->id_plan_entrenamiento = $this->model->insertID();
                return $this->respondCreated($planEntre);
            endif;
                return $this->failValidationErrors($this->model->validation->listErrors());
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function buscar($id_plan_entrenamiento = null)
    {
        try {
            if($id_plan_entrenamiento == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $planEntre = $this->model->find($id_plan_entrenamiento);
            if($planEntre == null)
                return $this->failNotFound('No se ha encontrado un entrenamiento con el id: '.$id_plan_entrenamiento);

            return $this->respond($planEntre);

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


    public function update($id_plan_entrenamiento = null)
    {
        try {
            if ($id_plan_entrenamiento == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $entrenamientoVerificado = $this->model->find($id_plan_entrenamiento);
            if($entrenamientoVerificado == null)
            return $this->failNotFound('No se ha encontrado el entrenamiento con el id: '.$id_plan_entrenamiento);

            $planEntre = $this->request->getJSON();

            if($this->model->update($id_plan_entrenamiento, $planEntre)):
                $planEntre->id_plan_entrenamiento = $id_plan_entrenamiento;
                return $this->respondUpdated($planEntre);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function delete($id_plan_entrenamiento = null)
    {
        try {
            if ($id_plan_entrenamiento == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $entrenamientoVerificado = $this->model->find($id_plan_entrenamiento);
            if($entrenamientoVerificado == null)
            return $this->failNotFound('No se ha encontrado el entrenamiento con el id: '.$id_plan_entrenamiento);

            if($this->model->delete($id_plan_entrenamiento)): 
                return $this->respondDeleted($entrenamientoVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

}