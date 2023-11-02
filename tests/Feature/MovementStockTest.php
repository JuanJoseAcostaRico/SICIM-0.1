<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Movements;
use App\Models\Supplies;
use App\Models\MovementTypes;

class MovementStockTest extends TestCase
{
    use RefreshDatabase;

    public function testStockIsAddedOnIngreso()
    {

        $this->withoutMiddleware();

        $movementType = MovementTypes::where('movement_type_name', 'Ingreso')->first();

        $supplyNames = ['Aspirina', 'Ibuprofeno', 'Paracetamol', 'Omeprazol', 'Amoxicilina'];

        $randomSupplyName = $supplyNames[array_rand($supplyNames)];

        $supply = Supplies::factory()->create([
            'supply_name' =>  $randomSupplyName,
            'supply_stock' => 0,
        ]);

        // Crear un movimiento de ingreso
        $movement = Movements::create([
            'supply_fke' => $supply->id, // Asocia el movimiento con el supply
            'movement_stock' => 20, // Cantidad de stock del movimiento
            'movement_types_fke' => $movementType->id, // Asocia el tipo de movimiento "Ingreso"
            'movement_desc' => 'Movement Description',
        ]);
        // Verificar que el nombre de la supply se haya recuperado correctamente
        $supplyName = $supply->supply_name;
        $this->assertContains($supplyName, $supplyNames);

        // Verificar que el stock de la supply se haya actualizado correctamente
        $supply->refresh(); // Recargar el supply para obtener el valor actualizado desde la base de datos

        $this->assertEquals(20, $supply->supply_stock);
    }
}
