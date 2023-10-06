<?php

namespace App\Exports;

use App\Models\Instruments;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;

class InstrumentosPorFechasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
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
        $query = Instruments::query();

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
            'Nombre',
            'Tamaño',
            'Descripción',
            'Stock',
            'Departamento',
            'Condición',
            'Fecha de Creación',
            'Fecha de Actualización',
        ];
    }

    public function map($instrument): array
    {
        return [
            $instrument->id,
            $instrument->instrument_name,
            $instrument->instrument_size,
            $instrument->instrument_desc,
            $instrument->instrument_stock,
            $instrument->departaments->departament_name,
            $instrument->conditions->condition_name,
            $instrument->created_at,
            $instrument->updated_at,
        ];
    }
}
