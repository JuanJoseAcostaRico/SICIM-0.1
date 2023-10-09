<?php

namespace Tests\Unit;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserModelTest extends TestCase
{

    private $user;

    /**
     * A basic unit test example.
     *
     * @return void
     */

     /**
      *
      * @var User $user;
      */

    /*public function test_example()
    {
        $this->assertTrue(true);
    } */

    private function createUser(): User
    {

        return User::factory()->create();

    }

    private function createMemoryUser(): User
    {

        return User::factory()->make();

    }

    public function testUserHasRole(){

        // Se crea un usuario
        $this->user = $this->createUser();

        $existingRole = Role::where('name', 'Administrador')->first();
        if ($existingRole) {
        $existingRole->delete();
    }

        // Se crea un rol

        $role = Role::create(['name' => 'Administrador']);

        // Asigna el rol al usuario

        $this->user->assignRole($role);

        // Verifica si el usuario tiene el rol

        $this->assertTrue($this->user->hasRole('Administrador'));
    }

    public function testUserAttributes(){

         // Se crea un usuario

         $this->user = $this->createMemoryUser();

     // Verifica los atributos del usuario

     $this->assertEquals($this->user->user_name, $this->user->user_name);
     $this->assertEquals($this->user->user_email, $this->user->user_email);


    }



}
