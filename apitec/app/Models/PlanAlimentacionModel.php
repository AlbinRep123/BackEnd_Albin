<?php namespace App\Models;

use CodeIgniter\Model;

class PlanAlimentacionModel extends Model 
{
    protected $table            = 'planAlimentacion';
    protected $primaryKey       = 'id_plan_alimentacion';

    protected $returnType       = 'array';
    protected $allowedFields    = ['tipos_de_comidas_semana', 'cantidad_de_comidas_semana'];

    protected $validationRules  = [
        'tipos_de_comidas_semana'              => 'required|min_length[1]|max_length[255]',
        'cantidad_de_comidas_semana'           => 'required|min_length[1]|max_length[255]',
    ];

    protected $validationMessages = [

    ];
 
    protected $skypValidation = false;
}