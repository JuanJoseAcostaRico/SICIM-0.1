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
            'supply_name' => 'Gasas',
            'supply_weight' => '20ml',
            'supply_posology' => '1 veces cada 8hx 2 dias',
            'supply_desc' => 'para tratar heridas o quemaduras',
            'supply_stock' => '30',
        ]);
    }
}
