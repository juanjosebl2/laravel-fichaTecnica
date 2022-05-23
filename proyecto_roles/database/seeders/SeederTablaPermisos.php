<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //rabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla ejercicios
            'ver-ejercicio',
            'crear-ejercicio',
            'editar-ejercicio',
            'borrar-ejercicio',
            //tabla proyectos
            'ver-proyecto',
            'crear-proyecto',
            'editar-proyecto',
            'borrar-proyecto',
            //tabla incidencias
            'ver-incidencia',
            'crear-incidencia',
            'editar-incidencia',
            'borrar-incidencia',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }  
    }
}
