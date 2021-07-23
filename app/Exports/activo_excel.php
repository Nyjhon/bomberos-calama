<?php

namespace App\Exports;

use App\Modelos\activo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class activo_excel implements 
    FromCollection,
    WithCustomStartCell,
    WithDrawings,
    ShouldAutoSize,
    WithMapping,
    WithHeadings,
    WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return activo::all();
    }
    public function startCell(): string
    {
        return 'B5';
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('icono');
        $drawing->setDescription('Logo de la Institución');
        $drawing->setPath(public_path('/static/imagenes/icono.png'));
        $drawing->setHeight(60);
        $drawing->setCoordinates('A1');

        return $drawing;
    }
    public function map($activo): array
    {
        return [
            $activo->id,
            $activo->codigo,
            $activo->nombre,
            getEstadoActivoKey($activo->estado),
            $activo->nombre_res,
            $activo->procedencia,
            $activo->documento_res,
            $activo->fecha_ing,
            $activo->fecha_alt,
            $activo->descripcion,
        ];
    }
    public function headings(): array
    {
        return [
            'Id',
            'Código',
            'Nombre del Activo',
            'Estado Actual',
            'Nombre del responsable',
            'Procedencia',
            'Documento de respaldo',
            'Fecha de ingreso',
            'Fecha de alta',
            'Descripción',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $activo){
                $activo->sheet->getStyle('B5:K5')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                ]);
            }
        ];
    }
}
