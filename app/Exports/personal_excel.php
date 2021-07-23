<?php

namespace App\Exports;

use App\Modelos\personal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class personal_excel implements 
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
        return personal::all();
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
    public function map($personal): array
    {
        return [
            $personal->id,
            $personal->nombres,
            $personal->apellido_pat,
            $personal->apellido_mat,
            $personal->ci,
            getDepartamentoArrayKey($personal->exp),
            $personal->celular,
            $personal->fecha_nac,
            $personal->grado,
            $personal->licencia,
            $personal->categoria,
            $personal->seguro,
            $personal->unidad_des,
            $personal->cargo_act,
            $personal->destino_ant,
            $personal->numero_esc,
            $personal->antiguedad_grado,
            getGeneroArrayKey($personal->genero),
            $personal->ubicacion,
            $personal->referencia,
            
        ];
    }
    public function headings(): array
    {
        return [
            'Id',
            'Nombres',
            'Apellido Paterno',
            'Apellido Materno',
            'Cedula de Identidad',
            'Expedido',
            'Celular',
            'Fecha de Nacimiento',
            'Grado',
            'N° de Licencia',
            'Categoría de Licencia',
            'N° de Seguro',
            'Unidad de Destino',
            'Cargo Actual',
            'Destino Anterior',
            'Número de Escalafón',
            'Antiguedad en el Grado',
            'Genero',
            'ubicación',
            'Referencia',

        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $personal){
                $personal->sheet->getStyle('B5:U5')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                ]);
            }
        ];
    }
}
