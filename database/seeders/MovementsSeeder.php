<?php

namespace Database\Seeders;

use App\Models\Movements;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movements::create([
            'movement_types_fke' => '1',
            'movement_desc' => 'Ingreso insumo gasas',
            'supply_fke' => '1',
            'movement_stock' => '10',
        ]);
    }
}
