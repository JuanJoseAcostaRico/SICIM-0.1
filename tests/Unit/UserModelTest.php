<?php

namespace Tests\Unit;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModelTest extends TestCase

{
    use RefreshDatabase;

    private $adminUser;

    private $user;

    private $existingAdminUser;

    private $existingUser;

    private function createUser(): User
    {

        return User::factory()->create();
    }

    private function createMemoryUser(): User
    {

        return User::factory()->make();
    }

    private function queryAdminUser(): User

    {

        return User::with('roles')->where('user_email', 'admin@admin.com')->first();
    }

    private function queryUser(): User

    {

        return User::with('roles')->where('user_email', 'user1@gmail.com')->first();
    }

    public function testCreatedUserHasAdminRole()
    {

        // Se crea un usuario
        $this->user = $this->createUser();

        $adminRole = Role::where('name', 'Administrador')->first();
        if ($adminRole) {
            $adminRole->delete();
        }

        // Se crea un rol

        $role = Role::create(['name' => 'Administrador']);

        // Asigna el rol al usuario

        $this->user->assignRole($role);

        // Verifica si el usuario tiene el rol

        $this->assertTrue($this->user->hasRole('Administrador'));
    }

    public function testCreatedUserHasUserRole()
    {

        // Se crea un usuario
        $this->user = $this->createUser();

        $userRole = Role::where('name', 'Usuario')->first();
        if ($userRole) {
            $userRole->delete();
        }

        // Se crea un rol

        $role = Role::create(['name' => 'Usuario']);

        // Asigna el rol al usuario

        $this->user->assignRole($role);

        // Verifica si el usuario tiene el rol

        $this->assertTrue($this->user->hasRole('Usuario'));
    }

    public function testExistingUserHasAdminRole(){

        $this->existingAdminUser = $this->queryAdminUser();

        $this->assertTrue($this->existingAdminUser->hasRole('Administrador'));


    }

    public function testExistingUserHasUserRole(){

        $this->existingUser = $this->queryUser();

        $this->assertTrue($this->existingUser->hasRole('Usuario'));

    }

    public function testUserAttributes()
    {

        // Se crea un usuario

        $this->user = $this->createMemoryUser();

        // Verifica los atributos del usuario

        $this->assertEquals($this->user->user_name, $this->user->user_name);
        $this->assertEquals($this->user->user_email, $this->user->user_email);
    }
}
