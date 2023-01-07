<?php namespace App\Models;

use CodeIgniter\Model;

class PlanEntrenamientoModel extends Model 
{
    protected $table            = 'planEntrenamiento';
    protected $primaryKey       = 'id_plan_entrenamiento';

    protected $returnType       = 'array';
    protected $allowedFields    = ['tipo_de_complexion', 'horas_de_entrenamiento_semana', 'id_ejerci', 'id_alimen'];

    protected $validationRules  = [
        'tipo_de_complexion'                 => 'required|min_length[1]|max_length[255]',
        'horas_de_entrenamiento_semana'      => 'required|numeric|min_length[1]|max_length[255]',
        'id_ejerci'                          => 'required|numeric|min_length[1]|max_length[255]',
        'id_alimen'                          => 'required|numeric|min_length[1]|max_length[255]',
    ];

    protected $validationMessages = [

    ];
 
    protected $skypValidation = false;
}