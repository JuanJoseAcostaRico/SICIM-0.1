<?php

namespace Tests\Unit;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserModelTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

    /*public function test_example()
    {
        $this->assertTrue(true);
    } */

    public function testUserHasRole(){

        // Se crea un usuario
        $user = User::factory()->create();

        // Se crea un rol

        $role = Role::create(['name' => 'Administrador']);

        // Asigna el rol al usuario

        $user->assignRole($role);

        // Verifica si el usuario tiene el rol

        $this->assertTrue($user->hasRole('Administrador'));
    }

    public function testUserAttributes(){

         // Se crea un usuario

         $user = User::factory()->create([
            'user_name' => 'Test Name',
            'user_email' => 'testemail@gmail.com'
         ]);

     // Verifica los atributos del usuario

     $this->assertEquals('Test Name', $user->user_name);
     $this->assertEquals('testemail@gmail.com', $user->user_email);


    }



}
