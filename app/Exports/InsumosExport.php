<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Supplies;

class InsumosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Aquí debes especificar cómo obtener los datos de tu modelo Insumos
        return Supplies::all();
    }

    public function headings(): array
    {
        // Especifica los encabezados de las columnas
        return [
            'ID',
            'Estado',
            'Nombre',
            'Peso',
            'Posología',
            'Descripción',
            'Stock',
            'Fecha de Creación',
            'Fecha de Actualización',
        ];
    }

    public function map($supply): array
    {
        return [
            $supply->id,
            $supply->states->state_name, // Accede a la relación "state" y obtén el nombre
            $supply->supply_name,
            $supply->supply_weight,
            $supply->supply_posology,
            $supply->supply_desc,
            $supply->supply_stock,
            $supply->created_at,
            $supply->updated_at,
        ];
    }

}

