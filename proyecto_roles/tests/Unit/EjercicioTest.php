<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Ejercicio;
use App\Models\Incidencia;
use Illuminate\Database\Eloquent\Collection;

class EjercicioTest extends TestCase
{

    public function test_ejercicio_tiene_muchos_incidencias()
    {
        $ejercicio = new Ejercicio;
        $this->assertInstanceOf(Collection::class, $ejercicio->incidencias);
    }

    public function test_anadir_incidencia_a_ejercicio()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $ejercicio = $this->post('/ejercicios', [
            'id' => '1',
            'titulo' => 'Proyecto 1',
            'contenido' => 'contenido 1'
            
        ]);

        $this->assertOk();

        $incidencia = $this->post('/incidencias', [
            'titulo' => 'Incidencia 1',
            'contenido' => 'contenido 1',
            'id_ejercicio' => $ejercicio->id
        ]);

        $this->assertOk();
        $this->assertEquals($ejercicio->id, $incidencia->id_ejercicio);

    }
}
