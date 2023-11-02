<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\States;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Models\Supplies;
use App\Models\User;

class FeatureRegisterSuppliesTest extends TestCase
{

    use RefreshDatabase;

    public function testCreateSupplyIntegration()
    {
        $this->withoutMiddleware();

        $stateId = States::first()->id;

        // Crear un usuario de prueba
        $user = User::factory()->create();
        $this->actingAs($user); // Autenticar el usuario

        // Crear Solicitud HTTP
        $request = new Request([
            'state_fke' => $stateId,
            'supply_name' => 'Supply Example',
            'supply_weight' => 'Supply weight',
            'supply_posology' => 'Supply Posology',
            'supply_desc' => 'Supply Description',
            'supply_stock' => '0',
        ]);


        // Generar la URL para la acción 'store' utilizando el helper route()
        $storeUrl = route('inventario.insumos.store');

        // Realizar la solicitud HTTP POST a la URL generada
        $response = $this->post($storeUrl, $request->all());

        // Verificar que la respuesta sea una redirección

        $response->assertRedirect();

        $response = $this->get($response->headers->get('Location'));

        //Verificar que la vista es ('')

        $response->assertViewIs('panel.inventario.insumos.listaInsumos');


        $supply = Supplies::with('states')->where('state_fke', $stateId)->first();
        $stateName = $supply->states->state_name;
        //
        $this->assertDatabaseHas('supplies', [
            'state_fke' => $stateId,
            'supply_name' => 'Supply Example',


        ]);

        // Recuperar el Supply

        $this->assertEquals('Activo', $stateName);

        // Verificar que la respuesta es exitosa

        $this->assertEquals(200, $response->getStatusCode());
    }
}
