<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\States;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplies>
 */
class SuppliesFactory extends Factory
{

    private $usedSupplies = []; // Inicializa la propiedad $usedSupplies
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $randomState= States::inRandomOrder()->first();

        $weightUnits = ['Kg', 'g', 'mg', 'l', 'lbs', 'ml', 'mcg', 'cc', 'ul'];

        $supplyWeight = $this->faker->numberBetween(1, 100);

        $selectedUnit = $this->faker->randomElement($weightUnits);

         // Lista de nombres de insumos
        $supplyNames = ['Aspirina', 'Ibuprofeno', 'Paracetamol', 'Omeprazol', 'Amoxicilina'];

         // Eliminar nombres ya utilizados
         $supplyNames = array_diff($supplyNames, $this->usedSupplies);

           // Si no quedan nombres disponibles, reiniciar la lista
        if (empty($supplyNames)) {
            $supplyNames = ['Aspirina', 'Ibuprofeno', 'Paracetamol', 'Omeprazol', 'Amoxicilina'];
            $this->usedSupplies = [];
        }
         // Seleccionar aleatoriamente un nombre y eliminarlo de la lista

        $supplyName = $this->faker->randomElement($supplyNames);
        $this->usedSupplies[] = $supplyName;

        return [
                'state_fke' => $randomState->id,
                'supply_name' => $supplyName,
                'supply_weight' => $supplyWeight . ' '. $selectedUnit,
                'supply_posology' => fake()->paragraph
                ($nbSentences = 3, $variableNbSentences = true),
                'supply_desc' => fake()->paragraph
                ($nbSentences = 3, $variableNbSentences = true),
                'supply_stock' => '0',
                'created_at' => fake()->dateTimeBetween('-1 year,', 'now'),
                'updated_at' => fake()->dateTimeBetween('-1 year,', 'now'),




            //
        ];
    }
}
