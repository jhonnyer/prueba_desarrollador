<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    // Tabla a modificar 
    protected $table='propietarios';
    // Mencion llave primaria, idcategoria campo con el que realiza la busqueda el controlador 
    protected $primaryKey='id_propietario';
    // Las variables anteriores no se envian o modifican (timestamps=false)
    public $timestamps=false;
    // use HasFactory;
    protected $fillable=[
        "nombre",
        "apellido",
        'cedula',
        "correo",
        "celular",
    ];
    // No se quiere que se asigne al modelo 
    protected $guarded=[

    ];
}
