<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use App\Proceso;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'categoria' => 'Gestión de Procesos',
        ]);
        Categoria::create([
            'categoria' => 'Gestión de Proyectos',
        ]);
        Categoria::create([
            'categoria' => 'Administración de Proyectos Específicos',
        ]);
        Categoria::create([
            'categoria' => 'Desarrollo y Mantenimiento de Software',
        ]);

        Proceso::create([
            'proceso' => 'Planificación',
            'id_categoria' => '1'
        ]);
        Proceso::create([
            'proceso' => 'Preparación para la Implantación',
            'id_categoria' => '1'
        ]);
        Proceso::create([
            'proceso' => 'Evaluación y Control',
            'id_categoria' => '1'
        ]);
        Proceso::create([
            'proceso' => 'Planificación',
            'id_categoria' => '2'
        ]);
        Proceso::create([
            'proceso' => 'Realización',
            'id_categoria' => '2'
        ]);
        Proceso::create([
            'proceso' => 'Evaluación y Control',
            'id_categoria' => '2'
        ]);
        Proceso::create([
            'proceso' => 'Planificación',
            'id_categoria' => '3'
        ]);
        Proceso::create([
            'proceso' => 'Realización',
            'id_categoria' => '3'
        ]);
        Proceso::create([
            'proceso' => 'Evaluación y Control',
            'id_categoria' => '3'
        ]);
        Proceso::create([
            'proceso' => 'Cierre',
            'id_categoria' => '3'
        ]);
        Proceso::create([
            'proceso' => 'Fase de inicio',
            'id_categoria' => '4'
        ]);
        Proceso::create([
            'proceso' => 'Fase de requisitos',
            'id_categoria' => '4'
        ]);
        Proceso::create([
            'proceso' => 'Fase de análisis y diseño',
            'id_categoria' => '4'
        ]);
        Proceso::create([
            'proceso' => 'Fase de construcción',
            'id_categoria' => '4'
        ]);
        Proceso::create([
            'proceso' => 'Fase de integración y pruebas',
            'id_categoria' => '4'
        ]);
        Proceso::create([
            'proceso' => 'Fase de cierre',
            'id_categoria' => '4'
        ]);
    }
}
