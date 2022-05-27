<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ProyectoTest extends TestCase
{
    
    public function test_proyecto_tiene_muchos_ejercicios()
    {
        $proyecto = new Proyecto;
        $this->assertInstanceOf(Collection::class, $proyecto->ejercicios);
    }

    public function test_proyecto_asignar_user()
    {
        $user = User::make([
            'id' => '10',
            'name' => 'John',
            'email' => 'john@example.com'
        ]);

        $proyecto = Proyecto::make([
            'titulo' => 'titulo 1',
            'contenido' => 'contenido 1',
            'id_user' => $user->id
        ]);

        $this->assertTrue($proyecto->id == $user->id);
    }

    public function test_anadir_ejercicio_a_proyecto()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $ejercicio = $this->post('/ejercicios', [
            'id' => '1',
            'titulo' => 'Ejercicio 1',
            'contenido' => 'contenido 1'
        ]);

        $this->assertOk();
        
        $proyecto = $this->post('/proyecto', [
            'titulo' => 'Proyecto 1',
            'contenido' => 'contenido 1',
            'id_ejercicio' => $ejercicio->id
        ]);

        $this->assertOk();
        $this->assertEquals($ejercicio->id, $proyecto->id_ejercicio);

    }

    public function test_proyecto_crear()
    {
        $proyecto = Proyecto::make([
            'titulo' => 'titulo 1',
            'contenido' => 'contenido 1',
        ]);
        $this->assertTrue(!empty($proyecto));
    }

}
