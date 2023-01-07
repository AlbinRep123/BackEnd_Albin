<?php namespace App\Models;

use CodeIgniter\Model;
  
class EjerciciosModel extends Model 
{
    protected $table            = 'ejercicios';
    protected $primaryKey       = 'id_ejercicios';

    protected $returnType       = 'array';
    protected $allowedFields    = ['parte_superior', 'parte_media', 'parte_inferior'];

    protected $validationRules  = [
        'parte_superior'        => 'required|min_length[1]|max_length[255]',
        'parte_media'           => 'required|min_length[1]|max_length[255]',
        'parte_inferior'        => 'required|min_length[1]|max_length[255]',
    ];

    protected $validationMessages = [

    ];
  
    protected $skypValidation = false;
}
