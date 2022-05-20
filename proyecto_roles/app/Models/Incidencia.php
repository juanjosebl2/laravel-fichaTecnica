<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;
    protected $fillable = ['titulo','contenido'];

    //Una incidencia pertenece a un ejercicio 
    public function ejercicios(){
        return $this->belongsTo(Ejercicio::class,'id_ejercicio');
    }
}
