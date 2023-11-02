<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\States;
use Tests\TestCase;
use Illuminate\Foundation\testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\Http\Controllers\DepartamentController;

class DepartamentsControllerTest extends TestCase
{
    use RefreshDatabase;

    private $adminUser;

    private $user;

    private function queryAdminUser(): User

    {

        return User::with('roles')->where('user_email', 'admin@admin.com')->first();
    }

    private function queryUser(): User

    {

        return User::with('roles')->where('user_email', 'user1@gmail.com')->first();
    }

    public function testCreateDepartmentWithAdmin()

    {
        $this->adminUser = $this->queryAdminUser();

        $this->actingAs($this->adminUser);

        $this->assertTrue($this->adminUser->hasRole('Administrador'));

        $stateId = States::first()->id;

        $request = new Request([
            'departament_name' => 'Test Admin Departamento',
            'state_fke' => $stateId,
            'user_id' => $this->adminUser->id,
        ]);

        $controller = new DepartamentController();

        $response = $controller->store($request);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);

        $this->assertDatabaseHas('departaments', [
            'departament_name' => 'Test Admin Departamento',
            'state_fke' => $stateId,
            'user_id' => $this->adminUser->id,
        ]);

        $this->assertEquals(302, $response->getStatusCode());


    }

    public function testCreateDepartmentWithUser()

    {
        $this->user = $this->queryUser();

        $this->actingAs($this->user);

        $this->assertTrue($this->user->hasRole('Usuario'));

        $stateId = States::first()->id;

        $request = new Request([
            'departament_name' => 'Test User Departamento',
            'state_fke' => $stateId,
            'user_id' => $this->user->id,
        ]);

        $controller = new DepartamentController();

        $response = $controller->store($request);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);

        $this->assertDatabaseHas('departaments', [
            'departament_name' => 'Test User Departamento',
            'state_fke' => $stateId,
            'user_id' => $this->user->id,
        ]);

        $this->assertEquals(302, $response->getStatusCode());
    }
}
