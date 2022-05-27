<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;


class UserTest extends TestCase
{
   

    public function test_user_eliminar()
    {
        $user = User::factory()->count(1)->make();
        $user = User::first();
        if($user){
            $user->delete();
        }

        $this->assertTrue(true);
    }

    public function test_user_crear_superusuario_redirige(){

        $response = $this->post('/register', [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);

        $response->assertRedirect('/home');
        $this->assertTrue(true);
    }
}
