<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class UserControllerTest extends TestCase
{


    public function testCreateUserVerifyingPassword()
    {

        // Utiliza el factory para crear un usuario con valores generados
        $user = User::factory()->make();
        // Simula una solicitud HTTP para crear un usuario
        $request = new Request([
            'user_name' => $user->user_name,
            'user_email' => $user->user_email,
            'password' => 'password123', // no se utiliza hash aquí
            'user_phone' => '04148524534',
            'user_address' => 'la fria',
        ]);

        // Se crea un usuario llamando una nueva instancia del controlador
        $controller = new UserController();
        $response = $controller->store($request);

        // Verifica que el response sea una redirección
        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);

        // Verifica que el usuario se haya creado en la base de datos
        $this->assertDatabaseHas('users', [
            'user_name' => $user->user_name,
            'user_email' => $user->user_email,
        ]);

        // Recupera el usuario recién creado
        $createdUser = User::where('user_email', $user->user_email)->first();

        // Verifica que la contraseña almacenada en la base de datos esté encriptada correctamente con bcrypt
        $this->assertTrue(password_verify('password123', $createdUser->password));

        $this->assertEquals(302, $response->getStatusCode());

    }





}
