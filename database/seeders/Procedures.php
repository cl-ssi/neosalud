<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Samu\Procedure;

class Procedures extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Procedure::Create([
            'code' => 'COD',
            'name' => 'CSV',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'COLLAR CERVICAL',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'FERULAS',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'TABLA ESPINAL CORTA/CHALECO EXT',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'TABLA ESPINAL LARGA',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'EXTRICACIÓN',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'MASCARA 02',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'VENT. ASISTIDA',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'IOT/INT',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'CANULA OF/NF',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'ASPIRACION',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'VIAS IV 10 1234',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'DESFIBRILACION 123',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'CARDIOVERSION 123',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'SNG',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'HGT',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'NEBULIZACION',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'MONITOR',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'TARACDCENTESIS',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'MARCAPASO EXTERNO',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'SAT O2',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

        Procedure::Create([
            'code' => 'COD',
            'name' => 'CRICOTIROIDOSTOMIA',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1'
        ]);

    }
}
