<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithGroupedHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class SirhRhhSheetImport implements ToCollection, WithHeadingRow, WithGroupedHeadingRow, WithCalculatedFormulas
{
    /**
    * @var Collection
    */
    public $rows;

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $this->rows = $collection;
    }

    /**
    * Permite obtener las filas importadas
    */
    public function getRows()
    {
        return $this->rows;
    }

    public function headingRow(): int
    {
        return 2;
    }
}
