<?php

namespace App\Exports;

use App\Models\Proyectos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;

class ProyectoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        /* return new Collection([
            ['ID' => 1, 'Nombre' => 'Proyecto A', 'Ano' => 2023, 'Lider' => 'Lider 1', 'Programa Formacion' => 'Programa 1', 'Valor Financiero' => 1000, 'Productos' => 'Producto 1', 'Ponencias' => 'Ponencia 1', 'EDT' => 'EDT 1', 'Libro' => 'Libro 1', 'Articulo' => 'Articulo 1'],
            ['ID' => 2, 'Nombre' => 'Proyecto B', 'Ano' => 2023, 'Lider' => 'Lider 2', 'Programa Formacion' => 'Programa 2', 'Valor Financiero' => 2000, 'Productos' => 'Producto 2', 'Ponencias' => 'Ponencia 2', 'EDT' => 'EDT 2', 'Libro' => 'Libro 2', 'Articulo' => 'Articulo 2'],
        ]); */
        return Proyectos::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Ano',
            'Lider',
            'Programa Formacion',
            'Valor Financiero',
            'Productos',
            'Ponencias',
            'EDT',
            'Libro',
            'Articulo',
        ];
    }
}
