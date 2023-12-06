<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplies;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplies::create([
            'state_fke' => '1',
            'presentation_fke' => '20',
            'unit_fke' => '15',
            'supply_name' => 'Gasas',
            'supply_weight' => '20',
            'supply_posology' => '2 veces cada 12hx 10 dias',
            'supply_desc' => 'para tratar heridas o quemaduras',
            'supply_stock' => '30',
            'created_at' => '2023-11-21 20:52:12',
        ]);

        Supplies::create([
            'state_fke' => '2',
            'presentation_fke' => '1',
            'unit_fke' => '2',
            'supply_name' => 'Loratadina',
            'supply_weight' => '10',
            'supply_posology' => '3 veces cada 8hx 3 dias',
            'supply_desc' => 'para tratar heridas o quemaduras',
            'supply_stock' => '20',
            'created_at' => '2023-11-20 20:52:12',
        ]);
        Supplies::create([
            'state_fke' => '2',
            'presentation_fke' => '1',
            'unit_fke' => '2',
            'supply_name' => 'Acetaminofen',
            'supply_weight' => '650',
            'supply_posology' => '2 veces cada 6 hx 15 dias',
            'supply_desc' => 'para tratar heridas o quemaduras',
            'supply_stock' => '40',
            'created_at' => '2023-11-21 20:52:12',
        ]);
        Supplies::create([
            'state_fke' => '2',
            'presentation_fke' => '1',
            'unit_fke' => '2',
            'supply_name' => 'Clonazepam',
            'supply_weight' => '10',
            'supply_posology' => '1 veces cada 12h x 4 dias',
            'supply_desc' => 'para tratar heridas o quemaduras',
            'supply_stock' => '50',
            'created_at' => '2023-11-22 20:52:11',
        ]);
        Supplies::create([
            'state_fke' => '1',
            'presentation_fke' => '1',
            'unit_fke' => '2',
            'supply_name' => 'amoxicilina',
            'supply_weight' => '750',
            'supply_posology' => '1 vece cada 8h x 3 dias',
            'supply_desc' => 'para tratar infecciones',
            'supply_stock' => '10',
            'created_at' => '2023-11-23 20:52:12',
        ]);
    }
}
