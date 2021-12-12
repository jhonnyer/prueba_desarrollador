<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    // Tabla a modificar 
    protected $table='vehiculos';
    // Mencion llave primaria, idcategoria campo con el que realiza la busqueda el controlador 
    protected $primaryKey='id_vehiculo';
    // Las variables anteriores no se envian o modifican (timestamps=false)
    public $timestamps=false;
    // use HasFactory;
    // use HasFactory;
    protected $fillable=[
        "id_propietario1",
        "placa",
        "marca",
        "tipo_vehiculo",
        "estado",
    ];
    // No se quiere que se asigne al modelo 
    protected $guarded=[

    ];
}
