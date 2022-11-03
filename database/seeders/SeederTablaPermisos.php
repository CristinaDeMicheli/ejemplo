<?php

namespace Database\Seeders;

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
       //tabla roles
        'ver-rol',
        'crear-rol',
        'editar-rol',
        'borrar-rol',

        //tabla alumnos
        'ver-alumno',
        'crear-alumno',
        'editar-alumno',
        'borrar-alumno',

          //tabla cursos
        'ver-curso',
        'crear-curso',
        'editar-curso',
        'borrar-curso',

        //tabla inscripciones
        'ver-inscripcione',
        'crear-inscripcione',
        'editar-inscripcione',
        'borrar-inscripcione',
    ];
    foreach ($permisos as $permiso) {
        // code...
        Permission::create(['name'=>$permiso]);
    }


    }
}
