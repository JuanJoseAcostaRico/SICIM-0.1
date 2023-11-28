<?php

namespace Database\Seeders;

use App\Models\Presentations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresentationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presentations::create([
            'presentation_name' => 'Tableta',
        ]);
        Presentations::create([
            'presentation_name' => 'Inyección',
        ]);
        Presentations::create([
            'presentation_name' => 'Líquido Oral',
        ]);
        Presentations::create([
            'presentation_name' => 'Cápsula',
        ]);
        Presentations::create([
            'presentation_name' => 'Jarabe',
        ]);
        Presentations::create([
            'presentation_name' => 'Suspensión Oral',
        ]);
        Presentations::create([
            'presentation_name' => 'Inhalador',
        ]);
        Presentations::create([
            'presentation_name' => 'Ampolla',
        ]);
        Presentations::create([
            'presentation_name' => 'Supositorio',
        ]);
        Presentations::create([
            'presentation_name' => 'Gotas Oftálmicas',
        ]);
        Presentations::create([
            'presentation_name' => 'Parche Transdérmico',
        ]);
        Presentations::create([
            'presentation_name' => 'Solución Inyectable',
        ]);
        Presentations::create([
            'presentation_name' => 'Polvo para Reconstitución',
        ]);
        Presentations::create([
            'presentation_name' => 'Gel Tópico',
        ]);
        Presentations::create([
            'presentation_name' => 'Óvulo Vaginal',
        ]);
        Presentations::create([
            'presentation_name' => 'Emulsión',
        ]);
        Presentations::create([
            'presentation_name' => 'Loción',
        ]);
        Presentations::create([
            'presentation_name' => 'Aerosol Nasal',
        ]);
        Presentations::create([
            'presentation_name' => 'Solución Oftálmica',
        ]);
         Presentations::create([
            'presentation_name' => 'Otros',
        ]);
    }
}
