<?php

namespace Tests\Unit;

use App\Models\Incidencia;
use Tests\TestCase;

class IncidenciaTest extends TestCase
{
    public function test_crear_incidencia()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->post('/incidencias', [
            'titulo' => 'Incidencia 1',
            'contenido' => 'contenido 1'
        ]);
 
        $this->assertOk();
        $this->assertCount(1, Incidencia::all());

    }

    public function test_mostrar_incidencias()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->get('/incidencias');
 
        $this->assertOk();

    }
}
