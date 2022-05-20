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
            //tabla actividades
            'ver-actividad',
            'crear-actividad',
            'editar-actividad',
            'borrar-actividad',
            //tabla proyectos
            'ver-proyecto',
            'crear-proyecto',
            'editar-proyecto',
            'borrar-proyecto',
            //tabla incidencias
            'ver-proyecto',
            'crear-proyecto',
            'editar-proyecto',
            'borrar-proyecto',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }  
    }
}
