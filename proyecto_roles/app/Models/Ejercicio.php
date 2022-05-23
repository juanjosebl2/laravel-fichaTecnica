<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;
    protected $fillable = ['titulo','contenido'];

    //Un ejercicio tiene muchas incidencias
    public function incidencias(){
        return $this->hasMany(Incidencia::class, 'id');
    }

    //Un ejercicio pertenece a un proyecto 
    public function proyectos(){
        return $this->belongsTo(Ejercicio::class,'id_proyecto');
    }

    //Un ejercicio pertenece a un usuario 
    public function users(){
        return $this->belongsTo(User::class,'id_user');
    }
}
