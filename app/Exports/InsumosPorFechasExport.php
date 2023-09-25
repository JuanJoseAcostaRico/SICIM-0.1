<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Supplies;
use Carbon\Carbon;

class InsumosPorFechasExport implements FromCollection, WithHeadings, WithMapping
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date = null, $end_date = null)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        // Filtra los registros de insumos basados en las fechas si se proporcionaron
        $query = Supplies::query();

        if ($this->start_date && $this->end_date) {
            $query->whereBetween('created_at', [Carbon::parse($this->start_date), Carbon::parse($this->end_date)]);
        }

        return $query->get();
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
