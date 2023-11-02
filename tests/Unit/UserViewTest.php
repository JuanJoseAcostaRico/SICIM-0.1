<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserViewTest extends TestCase
{
    private $user;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /**
     *
     * @var User $user;
     */

    private function createUser(): User
    {
        return User::factory()->create();
    }
    public function testUserPageContainsNonEmptyTables()
    {
        $this->withoutMiddleware();
        // Se crea un usuario
        $this->user = $this->createUser([]);

        $this->assertDatabaseHas('users', [
            'user_name' => $this->user->user_name,
            'user_email' => $this->user->user_email,
        ]);

        // Generar la URL para la acción 'store' utilizando el helper route()
        $storeUrl = route('usuarios.lista');

        $response = $this->get($storeUrl);

        $response = $this->actingAs($this->user)->get($storeUrl);

        $response->assertStatus(200);

        $response->assertViewIs('panel.usuarios.listausu');

        $response->assertSee($this->user->user_name);

        $response->assertSee($this->user->user_email);
    }

    public function testUserPageContainsEmptyTables()
    {
        $this->withoutMiddleware();
        // Se crea un usuario

        $this->user = $this->createUser([]);

        $this->assertDatabaseHas('users', [
            'user_name' => $this->user->user_name,
            'user_email' => $this->user->user_email,
        ]);



        // Generar la URL para la acción 'store' utilizando el helper route()
        $storeUrl = route('usuarios.lista');

        $response = $this->actingAs($this->user)->get($storeUrl);

        $response->assertStatus(200);

        $response->assertViewIs('panel.usuarios.listausu');

        $response->assertDontSee('No data available in table');
    }
}
