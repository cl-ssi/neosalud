<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SirhFileImport implements WithMultipleSheets 
{
    public function sheets(): array
    {
        return [
            new SirhRhhSheetImport()
        ];
    }
}
