<?php

namespace App\Exports;

use App\Modelos\vehiculo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class vehiculo_excel implements 
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
        return vehiculo::all();
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
    public function map($vehiculo): array
    {
        return [
            $vehiculo->id,
            $vehiculo->sigla,
            $vehiculo->clase,
            $vehiculo->marca,
            $vehiculo->tipo,
            $vehiculo->año_modelo,
            $vehiculo->origen,
            $vehiculo->placa,
            $vehiculo->placa_gen,
            $vehiculo->crpva,
            $vehiculo->soat,
            $vehiculo->b_sisa,
            $vehiculo->chasis,
            $vehiculo->n_motor,
            $vehiculo->cilindrada,
            $vehiculo->color,
            $vehiculo->n_ocupantes,
            getEstadoActivoKey($vehiculo->estado),
            $vehiculo->des_unidad,
            $vehiculo->fuente_adq,
            $vehiculo->documento_res,
            
        ];
    }
    public function headings(): array
    {
        return [
            'Id',
            'Sigla',
            'Clase',
            'Marca',
            'Tipo',
            'Año del modelo',
            'Origen',
            'Placa',
            'Placa generada DNFR',
            'N° CRPVA',
            'N° Roseta SOAT',
            'N° de B-SISA',
            'N° de Chasis',
            'N° de Motor',
            'Cilindrada',
            'Color',
            'N° Ocupantes',
            'Estado Actual',
            'Destino Unidad',
            'Fuente de Adquisición',
            'Documento de respaldo'

        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $vehiculo){
                $vehiculo->sheet->getStyle('B5:V5')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                ]);
            }
        ];
    }
}
