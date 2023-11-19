<?php

namespace App\Exports;

use App\Models\Supplies;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InsumosExport implements FromCollection, WithDrawings, WithHeadings, WithMapping, ShouldAutoSize, WithCustomStartCell, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Aquí debes especificar cómo obtener los datos de tu modelo Insumos
        return Supplies::all();
    }

    public function startCell(): string
    {
        return 'A7';
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('banner');
        $drawing->setDescription('banner');
        $drawing->setPath(public_path('/images/banner.png'));
        $drawing->setCoordinates('D1');
        $drawing->setHeight(120);
        $drawing->setWidth(380);
        $drawing->setOffsetX(80);
        $drawing->setOffsetY(10);


        return $drawing;
    }

    private $rowStyles = [];

    public function styles(Worksheet $sheet)
    {

        if (!empty($this->rowStyles)) {

            foreach ($this->rowStyles as $row => $styleArray) {

                $sheet->getStyle($row)->applyFromArray($styleArray);
            }
        }
    }

    public function headings(): array
    {
        // Especifica los encabezados de las columnas
        $headings = [
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

        $numColumns = $this->getNumberFromStartCell();

        $this->setStylesForColumns($headings, $numColumns);

        return $headings;
    }


    private function setStylesForColumns($headings, $numColumns)

    {
        foreach ($headings as $index => $heading) {
            $columnLetter = $this->getcolumnLetter($index);
            $this->rowStyles[$columnLetter . $numColumns] =
                [
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['argb' => '87CEEB'],
                    ],
                ];
        }
    }

    private function getColumnLetter($index)
    {
        $letters = range('A', 'Z');

        return $letters[$index];
    }

    private function getNumberFromStartCell()
    {
        $startCell = $this->startCell();
        $rowNumber = filter_var($startCell, FILTER_SANITIZE_NUMBER_INT);

        return $rowNumber;
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
