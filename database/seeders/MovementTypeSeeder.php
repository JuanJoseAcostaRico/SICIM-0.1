<?php

namespace Database\Seeders;
use App\Models\MovementTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovementTypes::create([
            'movement_type_name' => 'Ingreso',
        ]);
        MovementTypes::create([
            'movement_type_name' => 'Egreso',
        ]);
    }
}
