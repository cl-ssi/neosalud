<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Samu\Medicine;

class Medicines extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medicine::Create([
            'code' => 'COD',
            'name' => 'PARACETAMOL',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1200'
        ]);

        Medicine::Create([
            'code' => 'COD',
            'name' => 'DICLOFENACO',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '400'
        ]);

        Medicine::Create([
            'code' => 'COD',
            'name' => 'KETOROLACO',
            'valid_from' => '01-01-2022',
            'valid_to' => '31-12-2022',
            'value' => '1340'
        ]);
    }
}
