<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SirhFileImport implements WithMultipleSheets 
{
    /**
    * Instancia de la hoja importada
    */
    public $sheetImporter;

    public function sheets(): array
    {
        $this->sheetImporter = new SirhRhhSheetImport();
        return [
            $this->sheetImporter
        ];
    }

    /**
    * Permite obtener las filas importadas
    */
    public function getRows()
    {
        return $this->sheetImporter && method_exists($this->sheetImporter, 'getRows')
            ? $this->sheetImporter->getRows()
            : collect();
    }
}
