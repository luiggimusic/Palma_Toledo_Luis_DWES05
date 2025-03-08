<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = 'users';

    // Especificar la clave primaria'
    protected $primaryKey = 'dni';

    // Desactivar los timestamps si no se usa
    public $timestamps = false;

    // Especificar qué atributos son asignables masivamente
    protected $fillable = ['name', 'surname', 'dni', 'dateOfBirth', 'departmentId'];

    // Como no uso el campo 'id', lo desactivo
    public $incrementing = false;   // Esto indica que no uso un campo autoincrementable. He tenido que hacer esto pues 
                                    //como había definido el dni como primary key, en la respuesta del JSON me mostraba el id en lugar del dni; 
                                    //sin embargo en la base de datos lo hacía bien
}
