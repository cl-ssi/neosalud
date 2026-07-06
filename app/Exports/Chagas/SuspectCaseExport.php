<?php

namespace App\Exports\Chagas;

use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SuspectCaseExport implements FromQuery, WithChunkReading, WithBatchInserts, WithHeadings, WithMapping, ShouldAutoSize
{
    protected Builder $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function query(): Builder
    {
        return $this->query;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function map($suspectCase): array
    {
        $patient = $suspectCase->patient;
        $identifier = $patient?->identifierRun
            ? $patient->identifierRun->value . '-' . $patient->identifierRun->dv
            : ($patient?->identification?->value ?? '');

        return [
            'ID' => $suspectCase->id,
            'Grupo de Pesquisa' => $suspectCase->research_group,
            'Solicitado por' => $suspectCase->requester?->officialFullName,
            'Fecha de Solicitud' => $suspectCase->request_at,
            'Origen' => $suspectCase->organization?->alias,
            'Paciente' => $patient?->officialFullName,
            'Run o Identificación' => $identifier,
            'Edad' => $patient?->AgeString,
            'Sexo' => $patient?->actualSex()?->text ?? '',
            'Nacionalidad' => $patient?->nationality?->name ?? '',
            'Fecha de Resultado Tamizaje' => $suspectCase->chagas_result_screening_at,
            'Resultado Tamizaje' => $suspectCase->chagas_result_screening,
            'Fecha de Resultado Confirmación' => $suspectCase->chagas_result_confirmation_at,
            'Resultado Confirmación' => $suspectCase->chagas_result_confirmation,
            'Observación' => $suspectCase->observation,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Grupo de Pesquisa',
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
