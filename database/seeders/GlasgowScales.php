<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Samu\GlasgowScale;

class GlasgowScales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'OCULAR',
            'name' => 'ESPONTANEO',
            'value' => '4'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'OCULAR',
            'name' => 'AL HABLARLE',
            'value' => '3'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'OCULAR',
            'name' => 'AL DOLOR',
            'value' => '2'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'OCULAR',
            'name' => 'NINGUNA',
            'value' => '1'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'OCULAR',
            'name' => 'ESPONTANEO',
            'value' => '4'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'OCULAR',
            'name' => 'AL HABLARLE',
            'value' => '3'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'OCULAR',
            'name' => 'AL DOLOR',
            'value' => '2'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'OCULAR',
            'name' => 'NINGUNA',
            'value' => '1'
        ]);







        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'VERBAL',
            'name' => 'ORIENTADA',
            'value' => '5'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'VERBAL',
            'name' => 'CONFUSA',
            'value' => '4'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'VERBAL',
            'name' => 'INAPROPIADA',
            'value' => '3'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'VERBAL',
            'name' => 'INCOMPRENSIBLE',
            'value' => '2'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'VERBAL',
            'name' => 'NINGUNA',
            'value' => '1'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'VERBAL',
            'name' => 'BALBUCEA',
            'value' => '5'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'VERBAL',
            'name' => 'LLANTO IRRITABLE',
            'value' => '4'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'VERBAL',
            'name' => 'LLANTO AL DOLOR',
            'value' => '3'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'VERBAL',
            'name' => 'QUEJIDO AL DOLOR',
            'value' => '2'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'VERBAL',
            'name' => 'NINGUNA',
            'value' => '1'
        ]);







        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'MOTORA',
            'name' => 'ESPONTANEA',
            'value' => '6'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'MOTORA',
            'name' => 'LOCALIZA',
            'value' => '5'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'MOTORA',
            'name' => 'RETIRA AL DOLOR',
            'value' => '4'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'MOTORA',
            'name' => 'DECORTICACION',
            'value' => '3'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'MOTORA',
            'name' => 'DECEREBRACION',
            'value' => '2'
        ]);

        GlasgowScale::Create([
            'age_range' => 'ADULTO',
            'type' => 'MOTORA',
            'name' => 'NINGUNA',
            'value' => '1'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'MOTORA',
            'name' => 'ESPONTANEA',
            'value' => '6'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'MOTORA',
            'name' => 'RETIRA AL TOCAR',
            'value' => '5'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'MOTORA',
            'name' => 'RETIRA AL DOLOR',
            'value' => '4'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'MOTORA',
            'name' => 'FLEXION ANORMAL',
            'value' => '3'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'MOTORA',
            'name' => 'ESTENCION ANORMAL',
            'value' => '2'
        ]);

        GlasgowScale::Create([
            'age_range' => 'LACTANTE',
            'type' => 'MOTORA',
            'name' => 'NINGUNA',
            'value' => '1'
        ]);

    }
}
