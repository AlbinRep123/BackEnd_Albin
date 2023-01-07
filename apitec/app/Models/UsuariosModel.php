<?php namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model 
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id_usuarios';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nombres', 'apellido_paterno', 'apellido_materno', 'edad', 'sexo', 'imc', 'id_entrenamiento'];

    protected $validationRules  = [
        'nombres'               => 'required|min_length[1]|max_length[255]',
        'apellido_paterno'      => 'required|min_length[1]|max_length[255]',
        'apellido_materno'      => 'required|min_length[1]|max_length[255]',
        'adad'                  => 'required|numeric|min_length[1]|max_length[255]',
        'sexo'                  => 'required|min_length[1]|max_length[255]',
        'imc'                   => 'required|numeric|min_length[1]|max_length[255]',
        'id_entrenamiento'      => 'required|numeric|min_length[1]|max_length[255]',
    ];

    protected $validationMessages = [

    ];
 
    protected $skypValidation = false;
}