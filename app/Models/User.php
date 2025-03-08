<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = 'users';

    // Especificar la clave primaria si es diferente de 'id'
    protected $primaryKey = 'dni';

    // Desactivar los timestamps si no los estás utilizando
    public $timestamps = false;

    // Especificar qué atributos son asignables masivamente
    protected $fillable = ['name', 'surname', 'dni', 'dateOfBirth', 'departmentId'];
}
