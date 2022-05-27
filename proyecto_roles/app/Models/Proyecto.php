<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = ['titulo','contenido'];

    //Un proyecto tiene muchos ejercicios
    public function ejercicios(){
        return $this->hasMany(Ejercicio::class, 'id');
    }

    //Un proyecto pertenece a un usuario 
    public function users(){
        return $this->belongsTo(User::class,'id_user');
    }
}
