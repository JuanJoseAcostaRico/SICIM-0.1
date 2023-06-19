<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // CONEXIONES CON LOS DEMAS SEEDERS
        $this->call(StateSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(Departamentseeder::class);
        $this->call(SupplySeeder::class);
        $this->call(ConditionSeeder::class);
        $this->call(InstrumentSeeder::class);
        $this->call(ProfileSeeder::class);


    }
}
