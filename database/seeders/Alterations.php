<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Samu\Alteration;

class Alterations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alteration::Create([
            'type' => 'CARDIOVASCULARES',
            'name' => 'CRISIS HTA'
        ]);

        Alteration::Create([
            'type' => 'CARDIOVASCULARES',
            'name' => 'S.ANGINOSO'
        ]);

        Alteration::Create([
            'type' => 'CARDIOVASCULARES',
            'name' => 'EPA'
        ]);

        Alteration::Create([
            'type' => 'CARDIOVASCULARES',
            'name' => 'PCR'
        ]);

        Alteration::Create([
            'type' => 'CARDIOVASCULARES',
            'name' => 'BRADIARRITMIAS'
        ]);

        Alteration::Create([
            'type' => 'CARDIOVASCULARES',
            'name' => 'TAQUIARRITMIA'
        ]);

        Alteration::Create([
            'type' => 'CARDIOVASCULARES',
            'name' => 'OTROS'
        ]);

        
        
        
        

        Alteration::Create([
            'type' => 'RESPIRATORIAS',
            'name' => 'OBSTRUCCION BRONQUIAL'
        ]);

        Alteration::Create([
            'type' => 'RESPIRATORIAS',
            'name' => 'PARO RESPIRATORIO'
        ]);

        Alteration::Create([
            'type' => 'RESPIRATORIAS',
            'name' => 'DISNEA'
        ]);

        Alteration::Create([
            'type' => 'RESPIRATORIAS',
            'name' => 'L.A.O'
        ]);

        Alteration::Create([
            'type' => 'RESPIRATORIAS',
            'name' => 'OTROS'
        ]);

        
        
        
        
        

        Alteration::Create([
            'type' => 'DIGESTIVAS',
            'name' => 'DOLOR ABDOMINAL'
        ]);

        Alteration::Create([
            'type' => 'DIGESTIVAS',
            'name' => 'MELENA'
        ]);

        Alteration::Create([
            'type' => 'DIGESTIVAS',
            'name' => 'HEMATEMESIS'
        ]);

        Alteration::Create([
            'type' => 'DIGESTIVAS',
            'name' => 'RACTORRAGIA'
        ]);

        Alteration::Create([
            'type' => 'DIGESTIVAS',
            'name' => 'OTROS'
        ]);







        Alteration::Create([
            'type' => 'OBSTETRICAS',
            'name' => 'SINTOMA PARTO'
        ]);

        Alteration::Create([
            'type' => 'OBSTETRICAS',
            'name' => 'METRORRAGIA'
        ]);

        Alteration::Create([
            'type' => 'OBSTETRICAS',
            'name' => 'PARTO'
        ]);

        Alteration::Create([
            'type' => 'OBSTETRICAS',
            'name' => 'ATENCION R.N.'
        ]);

        Alteration::Create([
            'type' => 'OBSTETRICAS',
            'name' => 'ABORTO'
        ]);

        Alteration::Create([
            'type' => 'OBSTETRICAS',
            'name' => 'S H E.'
        ]);








        Alteration::Create([
            'type' => 'SNC',
            'name' => 'ALT CONCIENCIA'
        ]);

        Alteration::Create([
            'type' => 'SNC',
            'name' => 'POST.ICTAL'
        ]);

        Alteration::Create([
            'type' => 'SNC',
            'name' => 'OBS.TEC'
        ]);

        Alteration::Create([
            'type' => 'SNC',
            'name' => 'OTROS'
        ]);

        Alteration::Create([
            'type' => 'SNC',
            'name' => 'FOCALIZACION NEUROLOGICA'
        ]);

        Alteration::Create([
            'type' => 'SNC',
            'name' => 'CONVULSION'
        ]);

        




        Alteration::Create([
            'type' => 'METABÓLICAS',
            'name' => 'DESHIDRATACION'
        ]);

        Alteration::Create([
            'type' => 'METABÓLICAS',
            'name' => 'HIPERGLICEMIA'
        ]);

        Alteration::Create([
            'type' => 'METABÓLICAS',
            'name' => 'HIPOGLICEMIA'
        ]);

        



        Alteration::Create([
            'type' => 'OTRAS',
            'name' => 'REACCION ANSIOSA'
        ]);

        Alteration::Create([
            'type' => 'OTRAS',
            'name' => 'ALT.GENITURINARIAS'
        ]);

        Alteration::Create([
            'type' => 'OTRAS',
            'name' => 'RACCION ANAFILATICA'
        ]);

        Alteration::Create([
            'type' => 'OTRAS',
            'name' => 'PACTE.SEPTICO'
        ]);

        Alteration::Create([
            'type' => 'OTRAS',
            'name' => 'SINDROME FEBRIL'
        ]);

        Alteration::Create([
            'type' => 'OTRAS',
            'name' => 'SHOCK'
        ]);

    }
}
