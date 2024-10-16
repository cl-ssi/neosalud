<?php

namespace App\Exports\Chagas;


use App\Models\Epi\SuspectCase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SuspectCaseExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $suspectcases;

    public function __construct($suspectcases)
    {
        $this->suspectcases = $suspectcases;
    }

    public function collection()
    {
        return $this->suspectcases;
    }

    public function headings(): array
    {
        return [
            'ID', 
            'Grupo de Pesquiza',
            'Solicitado por',
            'Fecha de Solicitud', 
            'Origen',
            'Paciente',
            'Run o Identificación',
            'Edad',
            'Sexo',
            'Nacionalidad',
            'Fecha de Resultado Tamizaje',
            'Resultado Tamizaje',
            'Fecha de Resultado Confirmación',
            'Resultado Confirmación',
            'Observación',
        ];
    }


}
