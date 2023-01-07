<?php

namespace App\Controllers\API;

use App\Models\PlanAlimentacionModel;
use CodeIgniter\RESTful\ResourceController;

class PlanAlimentacion extends ResourceController

{
    public function __construct() {
        $this->model = $this->setModel(new PlanAlimentacionModel());
    }

 
    public function index()
    {
        $planAlimentacion = $this->model->findAll();
        return $this->respond($planAlimentacion);
    }


    public function create()
    {
        try {
            $planAli = $this->request->getJSON();
            if($this->model->insert($planAli)):
                $planAli->id_plan_alimentacion = $this->model->insertID();
                return $this->respondCreated($planAli);
            endif;
                return $this->failValidationErrors($this->model->validation->listErrors());
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


    public function buscar($id_plan_alimentacion = null)
    {
        try {
            if($id_plan_alimentacion == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $planAli = $this->model->find($id_plan_alimentacion);
            if($planAli == null)
                return $this->failNotFound('No se ha encontrado un cliente con el id: '.$id_plan_alimentacion);

            return $this->respond($planAli);

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


    public function update($id_plan_alimentacion = null)
    {
        try {
            if ($id_plan_alimentacion == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $ejercicioVerificado = $this->model->find($id_plan_alimentacion);
            if($ejercicioVerificado == null)
            return $this->failNotFound('No se ha encontrado el ejercicio con el id: '.$id_plan_alimentacion);

            $planAli = $this->request->getJSON();

            if($this->model->update($id_plan_alimentacion, $planAli)):
                $planAli->id_plan_alimentacion = $id_plan_alimentacion;
                return $this->respondUpdated($planAli);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function delete($id_plan_alimentacion = null)
    {
        try {
            if ($id_plan_alimentacion == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $ejercicioVerificado = $this->model->find($id_plan_alimentacion);
            if($ejercicioVerificado == null)
            return $this->failNotFound('No se ha encontrado el ejercicio con el id: '.$id_plan_alimentacion);

            if($this->model->delete($id_plan_alimentacion)): 
                return $this->respondDeleted($ejercicioVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


}