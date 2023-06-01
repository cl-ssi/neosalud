<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;
use App\Models\Address;


class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Organization::Create(['name'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Iquique)','alias'=>'Servicio de Salud Tarapacá','type'=>'Dirección Servicio de Salud','old_code_deis' => '02-010','new_code_deis' => '102010','service'=>'Servicio de Salud Tarapacá','dependency'=>'Servicio de Salud','commune_id'=>5]);
        //////////////////////////////////////////////////////////REGIÓN DE TARAPACÁ//////////////////////////////////////////////
        $Organization = new Organization();
        $Organization->active = 1;
        $Organization->name = 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Iquique)';
        $Organization->alias = 'Servicio de Salud Tarapacá';
        $Organization->type = 1; //1 Dirección Servicio de Salud
        $Organization->code_deis = 102010;
        $Organization->service = 3; //3 = Servicio de Salud Tarapacá
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'PRAIS (S.S. Iquique)','alias'=>'PRAIS (S.S. Iquique)','type'=>'Centro PRAIS','old_code_deis' => '02-011','new_code_deis' => '102011','service'=>'Servicio de Salud Iquique','dependency'=>'Servicio de Salud','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 2;
        $Organization->name = 'PRAIS (S.S. Iquique)';
        $Organization->alias = 'PRAIS (S.S. Iquique)';
        $Organization->type = 2; //2 Centro PRAIS
        $Organization->code_deis = 102011;
        $Organization->service = 3; //3 = Servicio de Salud Tarapacá
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        // Organization::Create(['name'=>'Clínica Dental Móvil Simple. Pat. RW6740 (Iquique)','alias'=>'Clínica Dental Móvil Simple. Pat. RW6740 (Iquique)','type'=>'Clínica Dental Móvil','old_code_deis' => '02-012','new_code_deis' => '102012','service'=>'Servicio de Salud Iquique','dependency'=>'Servicio de Salud','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 3;
        $Organization->name = 'Clínica Dental Móvil Simple. Pat. RW6740 (Iquique)';
        $Organization->alias = 'Clínica Dental Móvil';
        $Organization->type = 3; //3 Clínica Dental Móvil
        $Organization->code_deis = 102012;
        $Organization->service = 3; //3 = Servicio de Salud Tarapacá
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        // Organization::Create(['name'=>'Hospital Dr. Ernesto Torres Galdames (Iquique)','alias'=>'Hospital Dr. Ernesto Torres Galdames (Iquique)','type'=>'Hospital (Alta Complejidad)','old_code_deis' => '02-100','new_code_deis' => '102100','service'=>'Servicio de Salud Iquique','dependency'=>'Servicio de Salud','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 4;
        $Organization->name = 'Hospital Dr. Ernesto Torres Galdames (Iquique)';
        $Organization->alias = 'Hospital Dr. Ernesto Torres Galdames (Iquique)';
        $Organization->type = 5; //5 Hospital (Alta Complejidad)
        $Organization->code_deis = 102100;
        $Organization->service = 3; //3 = Servicio de Salud Tarapacá
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Clínica Iquique','alias'=>'Clínica Iquique','type'=>'Clínica','old_code_deis' => '02-200','new_code_deis' => '102200','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 5;
        $Organization->name = 'Clínica Iquique';
        $Organization->alias = 'Clínica Iquique';
        $Organization->type = 6; //6 Clínica
        $Organization->code_deis = 102200;
        $Organization->service = 4; //3 = SEREMI de Tarapacá
        $Organization->dependency = 3; //1 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Clínica Tarapacá','alias'=>'Clínica Tarapacá','type'=>'Clínica','old_code_deis' => '02-201','new_code_deis' => '102201','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 6;
        $Organization->name = 'Clínica Tarapacá';
        $Organization->alias = 'Clínica Tarapacá';
        $Organization->type = 6; //6 Clínica
        $Organization->code_deis = 102201;
        $Organization->service = 4; //3 = SEREMI de Tarapacá
        $Organization->dependency = 3; //1 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro Clínico Militar Iquique','alias'=>'Centro Clínico Militar Iquique','type'=>'Centro de Salud','old_code_deis' => '02-209','new_code_deis' => '102209','service'=>'SEREMI De Tarapacá','dependency'=>'Público No perteneciente al SNSS','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 7;
        $Organization->name = 'Centro Clínico Militar Iquique';
        $Organization->alias = 'Centro Clínico Militar Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102209;
        $Organization->service = 4; //3 = SEREMI de Tarapacá
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro Médico y Dental Megasalud Iquique','alias'=>'Centro Médico y Dental Megasalud Iquique','type'=>'Centro Médico y Dental','old_code_deis' => '02-213','new_code_deis' => '102213','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 8;
        $Organization->name = 'Centro Médico y Dental Megasalud Iquique';
        $Organization->alias = 'Centro Médico y Dental Megasalud Iquique';
        $Organization->type = 17; //17 Centro Médico y Dental
        $Organization->code_deis = 102213;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Salud Mutual CChC Iquique','alias'=>'Centro de Salud Mutual CChC Iquique','type'=>'Centro de Salud','old_code_deis' => '02-216','new_code_deis' => '102216','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 9;
        $Organization->name = 'Centro de Salud Mutual CChC Iquique';
        $Organization->alias = 'Centro de Salud Mutual CChC Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102216;
        $Organization->service = 4; //3 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Policlínico Naval de Iquique','alias'=>'Policlínico Naval de Iquique','type'=>'Centro de Salud','old_code_deis' => '02-217','new_code_deis' => '102217','service'=>'SEREMI De Tarapacá','dependency'=>'Público No perteneciente al SNSS','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 10;
        $Organization->name = 'Policlínico Naval de Iquique';
        $Organization->alias = 'Policlínico Naval de Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102217;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        // Organization::Create(['name'=>'Policlínico FACH de Iquique','alias'=>'Policlínico FACH de Iquique','type'=>'Centro de Salud','old_code_deis' => '02-218','new_code_deis' => '102218','service'=>'SEREMI De Tarapacá','dependency'=>'Público No perteneciente al SNSS','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 11;
        $Organization->name = 'Policlínico FACH de Iquique';
        $Organization->alias = 'Policlínico FACH de Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102218;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Policlínico Carabineros de Iquique','alias'=>'Policlínico Carabineros de Iquique','type'=>'Centro de Salud','old_code_deis' => '02-219','new_code_deis' => '102219','service'=>'SEREMI De Tarapacá','dependency'=>'Público No perteneciente al SNSS','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 12;
        $Organization->name = 'Policlínico Carabineros de Iquique';
        $Organization->alias = 'Policlínico Carabineros de Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102219;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Atención Instituto de Seguridad del Trabajador Iquique','alias'=>'Centro de Atención Instituto de Seguridad del Trabajador Iquique','type'=>'Centro de Salud','old_code_deis' => '02-222','new_code_deis' => '102222','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 13;
        $Organization->name = 'Centro de Atención Instituto de Seguridad del Trabajador Iquique';
        $Organization->alias = 'Centro de Atención Instituto de Seguridad del Trabajador Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102222;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Policlínico del Trabajador AChS Iquique','alias'=>'Policlínico del Trabajador AChS Iquique','type'=>'Centro de Salud','old_code_deis' => '02-223','new_code_deis' => '102223','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 14;
        $Organization->name = 'Policlínico del Trabajador AChS Iquique';
        $Organization->alias = 'Policlínico del Trabajador AChS Iquique';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102223;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Vacunatorio Sonrisa Infantil','alias'=>'Vacunatorio Sonrisa Infantil','type'=>'Vacunatorio','old_code_deis' => '02-224','new_code_deis' => '102224','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 15;
        $Organization->name = 'Vacunatorio Sonrisa Infantil';
        $Organization->alias = 'Vacunatorio Sonrisa Infantil';
        $Organization->type = 18; //18 Vacunatorio
        $Organization->code_deis = 102224;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro Médico y Dental Megasalud Alto Hospicio','alias'=>'Centro Médico y Dental Megasalud Alto Hospicio','type'=>'Centro Médico y Dental','old_code_deis' => '02-225','new_code_deis' => '102225','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>7]);
        $Organization = new Organization();
        $Organization->active = 16;
        $Organization->name = 'Centro Médico y Dental Megasalud Alto Hospicio';
        $Organization->alias = 'Centro Médico y Dental Megasalud Alto Hospicio';
        $Organization->type = 17; //17 Centro Médico y Dental
        $Organization->code_deis = 102225;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Salud Universidad Arturo Prat','alias'=>'Centro de Salud Universidad Arturo Prat','type'=>'Centro de Salud','old_code_deis' => '02-227','new_code_deis' => '102227','service'=>'SEREMI De Tarapacá','dependency'=>'Otra Institución','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 17;
        $Organization->name = 'Centro de Salud Universidad Arturo Prat';
        $Organization->alias = 'Centro de Salud Universidad Arturo Prat';
        $Organization->type = 8; //8 Centro de Salud
        $Organization->code_deis = 102227;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 4; //4 = Otra Institución
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Bionet S.A. - Iquique','alias'=>'Laboratorio Clínico Bionet S.A. - Iquique','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-228','new_code_deis' => '102228','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 18;
        $Organization->name = 'Laboratorio Clínico Bionet S.A. - Iquique';
        $Organization->alias = 'Laboratorio Clínico Bionet S.A. - Iquique';
        $Organization->type = 10; //10 Laboratorio Clínico o Dental
        $Organization->code_deis = 102228;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Automatizado Elmo','alias'=>'Laboratorio Clínico Automatizado Elmo','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-229','new_code_deis' => '102229','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 19;
        $Organization->name = 'Laboratorio Clínico Automatizado Elmo';
        $Organization->alias = 'Laboratorio Clínico Automatizado Elmo';
        $Organization->type = 10; //10 Laboratorio Clínico o Dental
        $Organization->code_deis = 102229;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Automatizado Biogénesis','alias'=>'Laboratorio Clínico Automatizado Biogénesis','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-230','new_code_deis' => '102230','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 20;
        $Organization->name = 'Laboratorio Clínico Automatizado Biogénesis';
        $Organization->alias = 'Laboratorio Clínico Automatizado Biogénesis';
        $Organization->type = 10; //10 Laboratorio Clínico o Dental
        $Organization->code_deis = 102230;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Clinicum Laboratorio Automatizado Ltda.','alias'=>'Clinicum Laboratorio Automatizado Ltda.','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-231','new_code_deis' => '102231','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 21;
        $Organization->name = 'Clinicum Laboratorio Automatizado Ltda.';
        $Organization->alias = 'Clinicum Laboratorio Automatizado Ltda.';
        $Organization->type = 10; //10 Laboratorio Clínico o Dental
        $Organization->code_deis = 102231;
        $Organization->service = 4; //4 = SEREMI de Tarapacá
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Diálisis Medicen','alias'=>'Centro de Diálisis Medicen','type'=>'Centro de Diálisis','old_code_deis' => '02-232','new_code_deis' => '102232','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 22;
        $Organization->name = 'Centro de Diálisis Medicen';
        $Organization->alias = 'Centro de Diálisis Medicen';
        $Organization->code_deis = 102232;
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();
        //}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
        //Organization::Create(['name'=>'Centro de Diálisis Iquique','alias'=>'Centro de Diálisis Iquique','type'=>'Centro de Diálisis','old_code_deis' => '02-233','new_code_deis' => '102233','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 23;
        $Organization->name = 'Centro de Diálisis Iquique';
        $Organization->alias = 'Centro de Diálisis Iquique';
        $Organization->code_deis = 102233;
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Diálisis Corporación Paúl Harris','alias'=>'Centro de Diálisis Corporación Paúl Harris','type'=>'Centro de Diálisis','old_code_deis' => '02-234','new_code_deis' => '102234','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 24;
        $Organization->name = 'Centro de Diálisis Corporación Paúl Harris';
        $Organization->alias = 'Centro de Diálisis Corporación Paúl Harris';
        $Organization->code_deis = 102234;
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Iquilab','alias'=>'Laboratorio Clínico Iquilab','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-235','new_code_deis' => '102235','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 25;
        $Organization->name = 'Laboratorio Clínico Iquilab';
        $Organization->alias = 'Laboratorio Clínico Iquilab';
        $Organization->code_deis = 102235;
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Playa Brava','alias'=>'Laboratorio Clínico Playa Brava','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-236','new_code_deis' => '102236','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 26;
        $Organization->name = 'Laboratorio Clínico Playa Brava';
        $Organization->alias = 'Laboratorio Clínico Playa Brava';
        $Organization->code_deis = 102236;
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();
        //Organization::Create(['name'=>'Laboratorio Clínico OASIS S.A.C.','alias'=>'Laboratorio Clínico OASIS S.A.C.','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-238','new_code_deis' => '102238','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 27;
        $Organization->name = 'Laboratorio Clínico OASIS S.A.C.';
        $Organization->alias = 'Laboratorio Clínico OASIS S.A.C.';
        $Organization->code_deis = 102238;
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Diálisis la Tirana','alias'=>'Centro de Diálisis la Tirana','type'=>'Centro de Diálisis','old_code_deis' => '02-240','new_code_deis' => '102240','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 28;
        $Organization->name = 'Centro de Diálisis la Tirana';
        $Organization->alias = 'Centro de Diálisis la Tirana';
        $Organization->code_deis = 102240;
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Costanera','alias'=>'Laboratorio Clínico Costanera','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-241','new_code_deis' => '102241','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 29;
        $Organization->name = 'Laboratorio Clínico Costanera';
        $Organization->alias = 'Laboratorio Clínico Costanera';
        $Organization->code_deis = 102241;
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Laboratorio Clínico Arauco Ltda.','alias'=>'Laboratorio Clínico Arauco Ltda.','type'=>'Laboratorio Clínico o Dental','old_code_deis' => '02-242','new_code_deis' => '102242','service'=>'SEREMI De Tarapacá','dependency'=>'Privado','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 30;
        $Organization->name = 'Laboratorio Clínico Arauco Ltda.';
        $Organization->alias = 'Laboratorio Clínico Arauco Ltda.';
        $Organization->code_deis = 102242;
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();
        //Organization::Create(['name'=>'Centro de Salud Familiar Cirujano Aguirre','alias'=>'Centro de Salud Familiar Cirujano Aguirre','type'=>'Consultorio General Urbano (CGU)','old_code_deis' => '02-300','new_code_deis' => '102300','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 31;
        $Organization->name = 'Centro de Salud Familiar Cirujano Aguirre';
        $Organization->alias = 'CESFAM Cirujano Aguirre';
        $Organization->type = 11; //11 Consultorio General Urbano (CGU)
        $Organization->code_deis = 102300;
        $Organization->service = 3; // 3 Servicio de Salud Iquique
        $Organization->dependency = 6; //6 Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Salud Familiar Cirujano Videla','alias'=>'Centro de Salud Familiar Cirujano Videla','type'=>'Consultorio General Urbano (CGU)','old_code_deis' => '02-301','new_code_deis' => '102301','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 32;
        $Organization->name = 'Centro de Salud Familiar Cirujano Videla';
        $Organization->alias = 'CESFAM Cirujano Videla';
        $Organization->type = 11; //11 Consultorio General Urbano (CGU)
        $Organization->code_deis = 102301;
        $Organization->service = 3; // 3 Servicio de Salud Iquique
        $Organization->dependency = 6; //6 Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Salud Familiar Cirujano Guzmán','alias'=>'Centro de Salud Familiar Cirujano Guzmán','type'=>'Consultorio General Urbano (CGU)','old_code_deis' => '02-302','new_code_deis' => '102302','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 33;
        $Organization->name = 'Centro de Salud Familiar Cirujano Guzmán';
        $Organization->alias = 'CESFAM Guzmán';
        $Organization->type = 11; //11 Consultorio General Urbano (CGU)
        $Organization->code_deis = 102302;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro de Salud Familiar Sur de Iquique','alias'=>'Centro de Salud Familiar Sur de Iquique','type'=>'Consultorio General Urbano (CGU)','old_code_deis' => '02-306','new_code_deis' => '102306','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 34;
        $Organization->name = 'Centro de Salud Familiar Sur de Iquique';
        $Organization->alias = 'CESFAM Sur Iquique';
        $Organization->type = 11; //11 Consultorio General Urbano (CGU)
        $Organization->code_deis = 102306;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Posta de Salud Rural Chanavayita','alias'=>'Posta de Salud Rural Chanavayita','type'=>'Posta de Salud Rural (PSR)','old_code_deis' => '02-412','new_code_deis' => '102412','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 35;
        $Organization->name = 'Posta de Salud Rural Chanavayita';
        $Organization->alias = 'Posta Rural Chanavayita';
        $Organization->type = 13; //Posta de Salud Rural (PSR)
        $Organization->code_deis = 102412;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Posta de Salud Rural San Marcos','alias'=>'Posta de Salud Rural San Marcos','type'=>'Posta de Salud Rural (PSR)','old_code_deis' => '02-413','new_code_deis' => '102413','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 36;
        $Organization->name = 'Posta de Salud Rural San Marcos';
        $Organization->alias = 'Posta Rural San Marcos';
        $Organization->type = 13; //Posta de Salud Rural (PSR)
        $Organization->code_deis = 102413;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'COSAM Dr. Jorge Seguel Cáceres','alias'=>'COSAM Dr. Jorge Seguel Cáceres','type'=>'Centro Comunitario de Salud Mental  (COSAM)','old_code_deis' => '02-600','new_code_deis' => '102600','service'=>'Servicio de Salud Iquique','dependency'=>'Servicio de Salud','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 37;
        $Organization->name = 'COSAM Dr. Jorge Seguel Cáceres';
        $Organization->alias = 'COSAM Dr. Jorge Seguel Cáceres';
        $Organization->type = 14; //Centro Comunitario de Salud Mental  (COSAM)
        $Organization->code_deis = 102600;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'COSAM Salvador Allende','alias'=>'COSAM Salvador Allende','type'=>'Centro Comunitario de Salud Mental  (COSAM)','old_code_deis' => '02-601','new_code_deis' => '102601','service'=>'Servicio de Salud Iquique','dependency'=>'Servicio de Salud','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 38;
        $Organization->name = 'COSAM Salvador Allende';
        $Organization->alias = 'COSAM Salvador Allende';
        $Organization->type = 14; //Centro Comunitario de Salud Mental  (COSAM)
        $Organization->code_deis = 102601;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'Centro Comunitario de Salud Familiar Cerro Esmeralda','alias'=>'Centro Comunitario de Salud Familiar Cerro Esmeralda','type'=>'Centro Comunitario de Salud Familiar (CECOSF)','old_code_deis' => '02-701','new_code_deis' => '102701','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 39;
        $Organization->name = 'Centro Comunitario de Salud Familiar Cerro Esmeralda';
        $Organization->alias = 'CECOSF Cerro Esmeralda';
        $Organization->type = 16; //Centro Comunitario de Salud Familiar (CECOSF)
        $Organization->code_deis = 102701;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal        
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'SAPU Cirujano Aguirre','alias'=>'SAPU Cirujano Aguirre','type'=>'Servicio de Urgencia de APS','old_code_deis' => '02-800','new_code_deis' => '102800','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 40;
        $Organization->name = 'SAPU Cirujano Aguirre';
        $Organization->alias = 'SAPU Cirujano Aguirre';
        $Organization->type = 20; //Servicio de Urgencia de APS
        $Organization->code_deis = 102800;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'SAPU Cirujano Videla','alias'=>'SAPU Cirujano Videla','type'=>'Servicio de Urgencia de APS','old_code_deis' => '02-801','new_code_deis' => '102801','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 41;
        $Organization->name = 'SAPU Cirujano Videla';
        $Organization->alias = 'SAPU Cirujano Videla';
        $Organization->type = 20; //Servicio de Urgencia de APS
        $Organization->code_deis = 102801;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'SAPU Cirujano Guzmán','alias'=>'SAPU Cirujano Guzmán','type'=>'Servicio de Urgencia de APS','old_code_deis' => '02-802','new_code_deis' => '102802','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 42;
        $Organization->name = 'SAPU Cirujano Guzmán';
        $Organization->alias = 'SAPU Cirujano Guzmán';
        $Organization->type = 20; //Servicio de Urgencia de APS
        $Organization->code_deis = 102802;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        //Organization::Create(['name'=>'SAR Sur de Iquique','alias'=>'SAR Sur de Iquique','type'=>'Servicio de Urgencia de APS','old_code_deis' => '02-806','new_code_deis' => '102806','service'=>'Servicio de Salud Iquique','dependency'=>'Municipal','commune_id'=>5]);
        $Organization = new Organization();
        $Organization->active = 43;
        $Organization->name = 'SAR Sur de Iquique';
        $Organization->alias = 'SAR Sur de Iquique';
        $Organization->type = 20; //Servicio de Urgencia de APS
        $Organization->code_deis = 102806;
        $Organization->service = 3; //3 = Servicio de Salud Iquique
        $Organization->dependency = 6; //6 = municipal        
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        ///////////////////////////////////////////////////////////////////////FIN REGIÓN DE TARAPACÁ//////////////////////////////////



        ////////////////////////LOS QUE FALTABAN DE IQUIQUE//////////////

        Organization::Create(
            [
                'name' => 'Clínica Coposa Cía. Minera Doña Inés de Collahuasi',
                'alias' => 'Clínica Coposa Cía. Minera Doña Inés de Collahuasi',
                'type' => 6,
                'code_deis' => 102220,
                'service' => 4,
                'dependency' => 3,
            ]
        );
        Organization::Create(
            [
                'name' => 'Clínica Establecimiento Penitenciario Alto Hospicio',
                'alias' => 'Clínica Establecimiento Penitenciario Alto Hospicio',
                'type' => 6,
                'code_deis' => 102221,
                'service' => 4,
                'dependency' => 4,
            ]
        );
        Organization::Create(
            [
                'name' => 'Centro de Salud Familiar Pozo Almonte',
                'alias' => 'CESFAM Pozo Almonte',
                'type' => 12,
                'code_deis' => 102303,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Centro de Salud Familiar Dr. Juan Márquez Vismarra',
                'alias' => 'CESFAM Dr. Juan Márquez Vismarra',
                'type' => 12,
                'code_deis' => 102304,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Centro de Salud Familiar Pedro Pulgar Melgarejo',
                'alias' => 'CESFAM Pedro Pulgar',
                'type' => 11,
                'code_deis' => 102305,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Centro de Salud Familiar Dr. Héctor Reyno Gutiérrez',
                'alias' => 'CESFAM Dr. Héctor Reynos',
                'type' => 11,
                'code_deis' => 102307,
                'service' => 3,
                'dependency' => 1,
            ]
        );
        Organization::Create(
            [
                'name' => 'Centro de Salud Familiar Dr. Amador Neghme Rodríguez',
                'alias' => 'CESFAM Dr. Amador Neghme Rodríguez',
                'type' => 12,
                'code_deis' => 102308,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Centro de Salud Familiar Camiña',
                'alias' => 'CESFAM Camiña',
                'type' => 12,
                'code_deis' => 102309,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Centro de Salud Familiar Colchanes',
                'alias' => 'CESFAM Colchane',
                'type' => 12,
                'code_deis' => 102310,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural Pisagua',
                'alias' => 'Posta de Salud Rural Pisagua',
                'type' => 13,
                'code_deis' => 102400,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural Tarapacá',
                'alias' => 'Posta de Salud Rural Tarapacá',
                'type' => 13,
                'code_deis' => 102402,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural Mamiña',
                'alias' => 'Posta de Salud Rural Mamiña',
                'type' => 13,
                'code_deis' => 102403,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural La Tirana',
                'alias' => 'Posta de Salud Rural La Tirana',
                'type' => 13,
                'code_deis' => 102406,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural Chiapa',
                'alias' => 'Posta de Salud Rural Chiapa',
                'type' => 13,
                'code_deis' => 102407,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural Moquella',
                'alias' => 'Posta de Salud Rural Moquella',
                'type' => 13,
                'code_deis' => 102408,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural Enquelga',
                'alias' => 'Posta de Salud Rural Enquelga',
                'type' => 13,
                'code_deis' => 102409,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural Sibaya',
                'alias' => 'Posta de Salud Rural Sibaya',
                'type' => 13,
                'code_deis' => 102410,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural Cancosa',
                'alias' => 'Posta de Salud Rural Cancosa',
                'type' => 13,
                'code_deis' => 102411,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural La Huayca',
                'alias' => 'Posta de Salud Rural La Huayca',
                'type' => 13,
                'code_deis' => 102414,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural Cariquima',
                'alias' => 'Posta de Salud Rural Cariquima',
                'type' => 13,
                'code_deis' => 102415,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'Posta de Salud Rural Matilla',
                'alias' => 'Posta de Salud Rural Matilla',
                'type' => 13,
                'code_deis' => 102416,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'COSAM Enrique París',
                'alias' => 'COSAM Enrique París',
                'type' => 14,
                'code_deis' => 102602,
                'service' => 3,
                'dependency' => 1,
            ]
        );
        Organization::Create(
            [
                'name' => 'Centro Comunitario de Salud Familiar El Boro',
                'alias' => 'Centro Comunitario de Salud Familiar El Boro',
                'type' => 16,
                'code_deis' => 102705,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'SAPU Pozo Almonte',
                'alias' => 'SAPU Pozo Almonte',
                'type' => 20,
                'code_deis' => 102803,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'SAPU Pedro Pulgar Melgarejo',
                'alias' => 'SAPU Pedro Pulgar Melgarejo',
                'type' => 20,
                'code_deis' => 102805,
                'service' => 3,
                'dependency' => 6,
            ]
        );
        Organization::Create(
            [
                'name' => 'SAPU El Boro',
                'alias' => 'SAPU El Boro',
                'type' => 20,
                'code_deis' => 102807,
                'service' => 3,
                'dependency' => 6,
            ]
        );













        ////////////////////////REGIÓN DE ARICA Y PARINACOTA//////////////////////////////////////////////////
        $Organization = new Organization();
        $Organization->active = 44;
        $Organization->name = 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Arica)';
        $Organization->alias = 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Arica)';
        $Organization->type = 1; //Dirección Servicio de Salud
        $Organization->code_deis = 101010;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 45;
        $Organization->name = 'PRAIS (S.S Arica)';
        $Organization->alias = 'PRAIS (S.S Arica)';
        $Organization->type = 2; //Centro PRAIS
        $Organization->code_deis = 101011;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();

        $Organization = new Organization();
        $Organization->active = 46;
        $Organization->name = 'Clínica Dental Móvil Simple. Pat. PW4076 (Arica)';
        $Organization->alias = 'Clínica Dental Móvil Simple. Pat. PW4076 (Arica)';
        $Organization->type = 3; //Clínica Dental Movil
        $Organization->code_deis = 101012;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 47;
        $Organization->name = 'Oficina Sanitaria Chacalluta';
        $Organization->alias = 'Oficina Sanitaria Chacallutas';
        $Organization->type = 4; //Oficina Sanitaria
        $Organization->code_deis = 101090;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 2; //2 = Autoridad Sanitaria
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 48;
        $Organization->name = 'Hospital Regional Dr. Juan Noé Crevanni (Arica)';
        $Organization->alias = 'Hospital Regional Dr. Juan Noé Crevanni (Arica)';
        $Organization->type = 5; ///5=Hospital (Alta Complejidad)
        $Organization->code_deis = 101100;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 49;
        $Organization->name = 'Clínica Hebe';
        $Organization->alias = 'Clínica Hebe';
        $Organization->type = 6; ///6=Clínica
        $Organization->code_deis = 101203;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();

        $Organization = new Organization();
        $Organization->active = 50;
        $Organization->name = 'Clínica San Agustín';
        $Organization->alias = 'Clínica San Agustín';
        $Organization->type = 6; ///6=Clínica
        $Organization->code_deis = 101212;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();

        $Organization = new Organization();
        $Organization->active = 51;
        $Organization->name = 'Clínica San José';
        $Organization->alias = 'Clínica San José';
        $Organization->type = 6; ///6=Clínica
        $Organization->code_deis = 101213;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 52;
        $Organization->name = 'Complejo Penitenciario';
        $Organization->alias = 'Complejo Penitenciario';
        $Organization->type = 7; ///7=Hospital (No perteneciente al SNSS)
        $Organization->code_deis = 101215;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 4; //4 = Otra Institución
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 53;
        $Organization->name = 'Servicio Médico Estudiantil U. de Tarapacá';
        $Organization->alias = 'Servicio Médico Estudiantil U. de Tarapacá';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101216;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 54;
        $Organization->name = 'Centro Clínico Militar Arica';
        $Organization->alias = 'Centro Clínico Militar Arica';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101217;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 55;
        $Organization->name = 'Policlínico del Trabajador AChS Arica';
        $Organization->alias = 'Policlínico del Trabajador AChS Arica';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101219;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 56;
        $Organization->name = 'Instituto Teletón Arica';
        $Organization->alias = 'Instituto Teletón Arica';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101222;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 57;
        $Organization->name = 'Centro Médico Monte Sinaí';
        $Organization->alias = 'Centro Médico Monte Sinaí';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101223;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();


        $Organization = new Organization();
        $Organization->active = 58;
        $Organization->name = 'Centro Integral de Salud';
        $Organization->alias = 'Centro Integral de Salud';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101225;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 59;
        $Organization->name = 'Policlínico Institucional de Gendarmería de Chile';
        $Organization->alias = 'Policlínico Institucional de Gendarmería de Chile';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101227;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 4; //4 = Otra Institución
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 60;
        $Organization->name = 'Policlínico del Agricultor';
        $Organization->alias = 'Policlínico del Agricultor';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101228;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 61;
        $Organization->name = 'Centro Odontológico Arisa';
        $Organization->alias = 'Centro Odontológico Arisa';
        $Organization->type = 9; ///9=Clínica Dental
        $Organization->code_deis = 101229;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 62;
        $Organization->name = 'Centro de Salud Mutual CChC Arica';
        $Organization->alias = 'Centro de Salud Mutual CChC Aricas';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101234;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 63;
        $Organization->name = 'Centro Dental Megasalud SpA';
        $Organization->alias = 'Centro Dental Megasalud SpA';
        $Organization->type = 9; ///9=Clínica Dental
        $Organization->code_deis = 101236;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 64;
        $Organization->name = 'Clínica Dr. Héctor Sánchez';
        $Organization->alias = 'Clínica Dr. Héctor Sánchez';
        $Organization->type = 6; ///6=Clínica
        $Organization->code_deis = 101237;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 65;
        $Organization->name = 'Policlínico Médico Dental de Carabineros';
        $Organization->alias = 'Policlínico Médico Dental de Carabineros';
        $Organization->type = 8; ///8=Centro de Salud
        $Organization->code_deis = 101239;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 5; //5 = Público No perteneciente al SNSS
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 66;
        $Organization->name = 'Laboratorio Clínico San José Ltda.';
        $Organization->alias = 'Laboratorio Clínico San José Ltda.';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101240;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 67;
        $Organization->name = 'Laboratorio Clínico Bionet S.A. - Arica';
        $Organization->alias = 'Laboratorio Clínico Bionet S.A. - Arica';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101241;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 68;
        $Organization->name = 'Laboratorio Clínico y Hematológico Diagnotest';
        $Organization->alias = 'Laboratorio Clínico y Hematológico Diagnotest';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101242;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 69;
        $Organization->name = 'Laboratorio Clínico Central';
        $Organization->alias = 'Laboratorio Clínico Central';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101243;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 70;
        $Organization->name = 'Laboratorio Clínico San Martín';
        $Organization->alias = 'Laboratorio Clínico San Martín';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101244;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 71;
        $Organization->name = 'Laboratorio Clínico Dialab';
        $Organization->alias = 'Laboratorio Clínico Dialab';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101245;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 72;
        $Organization->name = 'Laboratorio Clínico del Norte - Labonorte';
        $Organization->alias = 'Laboratorio Clínico del Norte - Labonorte';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101246;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 73;
        $Organization->name = 'Laboratorio Clínico Chungará';
        $Organization->alias = 'Laboratorio Clínico Chungará';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101247;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 74;
        $Organization->name = 'Laboratorio Clínico Biolascer';
        $Organization->alias = 'Laboratorio Clínico Biolascer';
        $Organization->type = 10; ///10=Laboratorio Clínico o Dental
        $Organization->code_deis = 101248;
        $Organization->service = 2; //2 = SEREMI De Arica y Parinacota
        $Organization->dependency = 3; //3 = Privado
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 75;
        $Organization->name = 'Centro de Salud Familiar Víctor Bertín Soto';
        $Organization->alias = 'Centro de Salud Familiar Víctor Bertín Soto';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101300;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 76;
        $Organization->name = 'Centro de Salud Familiar Dr. Amador Neghme de Arica';
        $Organization->alias = 'Centro de Salud Familiar Dr. Amador Neghme de Arica';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101302;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 77;
        $Organization->name = 'Centro de Salud Familiar E. U. Iris Veliz Hume (Ex Oriente)';
        $Organization->alias = 'Centro de Salud Familiar E. U. Iris Veliz Hume (Ex Oriente)';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101303;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 78;
        $Organization->name = 'Centro de Salud Familiar Putre';
        $Organization->alias = 'Centro de Salud Familiar Putre';
        $Organization->type = 12; ///12=Centro de Salud Familiar (CESFAM)
        $Organization->code_deis = 101304;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 79;
        $Organization->name = 'Centro de Salud Familiar Remigio Sapunar';
        $Organization->alias = 'Centro de Salud Familiar Remigio Sapunar';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101305;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 80;
        $Organization->name = 'Centro de Salud Ambiental de Arica';
        $Organization->alias = 'Centro de Salud Ambiental de Arica';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101306;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 81;
        $Organization->name = 'Centro de Salud Familiar Eugenio Petruccelli Astudillo (ex Punta Norte)';
        $Organization->alias = 'Centro de Salud Familiar Eugenio Petruccelli Astudillo (ex Punta Norte)';
        $Organization->type = 11; ///11=Consultorio General Urbano (CGU)
        $Organization->code_deis = 101307;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 82;
        $Organization->name = 'Posta de Salud Rural San Miguel de Azapa';
        $Organization->alias = 'Posta de Salud Rural San Miguel de Azapa';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101400;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 83;
        $Organization->name = 'Posta de Salud Rural Poconchile';
        $Organization->alias = 'Posta de Salud Rural Poconchile';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101401;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 84;
        $Organization->name = 'Posta de Salud Rural Belén (Putre)';
        $Organization->alias = 'Posta de Salud Rural Belén (Putre)';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101402;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 85;
        $Organization->name = 'Posta de Salud Rural Visviri';
        $Organization->alias = 'Posta de Salud Rural Visviri';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101404;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 86;
        $Organization->name = 'Posta de Salud Rural Codpa';
        $Organization->alias = 'Posta de Salud Rural Codpa';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101406;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();



        $Organization = new Organization();
        $Organization->active = 87;
        $Organization->name = 'Posta de Salud Rural Ticnamar';
        $Organization->alias = 'Posta de Salud Rural Ticnamar';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101407;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 88;
        $Organization->name = 'Posta de Salud Rural Sobraya';
        $Organization->alias = 'Posta de Salud Rural Sobraya';
        $Organization->type = 13; ///13=Posta de Salud Rural (PSR)
        $Organization->code_deis = 101408;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 89;
        $Organization->name = 'COSAM Norte';
        $Organization->alias = 'COSAM Norte';
        $Organization->type = 14; ///14=Centro Comunitario de Salud Mental (COSAM)
        $Organization->code_deis = 101607;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 90;
        $Organization->name = 'ESSMA Sur de Arica';
        $Organization->alias = 'ESSMA Sur de Arica';
        $Organization->type = 15; ///15=Pendiente de clasificar
        $Organization->code_deis = 101608;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 1; //1 = Servicio de Salud
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 91;
        $Organization->name = 'Centro Comunitario de Salud Familiar Dr. Miguel Massa';
        $Organization->alias = 'Centro Comunitario de Salud Familiar Dr. Miguel Massa';
        $Organization->type = 16; ///16=Centro Comunitario de Salud Familiar (CECOSF)
        $Organization->code_deis = 101702;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 92;
        $Organization->name = 'Centro Comunitario de Salud Familiar Dr. René García Valenzuela';
        $Organization->alias = 'Centro Comunitario de Salud Familiar Dr. René García Valenzuela';
        $Organization->type = 16; ///16=Centro Comunitario de Salud Familiar (CECOSF)
        $Organization->code_deis = 101703;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();




        $Organization = new Organization();
        $Organization->active = 93;
        $Organization->name = 'Centro Comunitario de Salud Familiar Cerro La Cruz';
        $Organization->alias = 'Centro Comunitario de Salud Familiar Cerro La Cruz';
        $Organization->type = 16; ///16=Centro Comunitario de Salud Familiar (CECOSF)
        $Organization->code_deis = 101704;
        $Organization->service = 1; //1 = Servicio de Salud Arica
        $Organization->dependency = 6; //6 = Municipal
        $Organization->save();

        $address = new Address();
        $address->Organization_id = $Organization->id;
        $address->type = 'physical';
        $address->text = '';
        $address->line = '';
        $address->city = 'Arica';
        $address->commune_id = 1; //Arica
        $address->region_id = 15; //15 Arica y Parinacota
        $address->country_id = 42;
        $address->save();    

       
        //desde el excel
        

        Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Antofagasta)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Antofagasta)','type'=>1,'code_deis' =>103010,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Antofagasta)','alias'=>'PRAIS (S.S Antofagasta)','type'=>2,'code_deis' =>103011,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'Sala de Procedimientos Odontológicos Móvil (SPOM) Patente PXI 415-0','alias'=>'Sala de Procedimientos Odontológicos Móvil (SPOM) Patente PXI 415-0','type'=>21,'code_deis' =>103012,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'Sala de Procedimientos Odontológicos Móvil (SPOM) Patente BKG-355','alias'=>'Sala de Procedimientos Odontológicos Móvil (SPOM) Patente BKG-355','type'=>21,'code_deis' =>103013,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Leonardo Guzmán (Antofagasta)','alias'=>'Hospital Dr. Leonardo Guzmán (Antofagasta)','type'=>5,'code_deis' =>103100,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Carlos Cisternas (Calama)','alias'=>'Hospital Dr. Carlos Cisternas (Calama)','type'=>5,'code_deis' =>103101,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Marcos Macuada (Tocopilla)','alias'=>'Hospital Dr. Marcos Macuada (Tocopilla)','type'=>22,'code_deis' =>103102,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'Hospital 21 de Mayo (Taltal)','alias'=>'Hospital 21 de Mayo (Taltal)','type'=>22,'code_deis' =>103103,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Mejillones','alias'=>'Hospital de Mejillones','type'=>22,'code_deis' =>103104,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Cruz del Norte','alias'=>'Hospital Cruz del Norte','type'=>7,'code_deis' =>103201,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Antofagasta','alias'=>'Clínica Antofagasta','type'=>6,'code_deis' =>103203,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Militar del Norte','alias'=>'Hospital Militar del Norte','type'=>7,'code_deis' =>103210,'service' =>6,'dependency' =>5]);
Organization::Create(['name' => 'Clínica Mutual de Seguridad CChC de Calama','alias'=>'Clínica Mutual de Seguridad CChC de Calama','type'=>6,'code_deis' =>103211,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Baquedano','alias'=>'Clínica Baquedano','type'=>6,'code_deis' =>103212,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Urológica','alias'=>'Clínica Urológica','type'=>6,'code_deis' =>103214,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Oriente','alias'=>'Clínica Oriente','type'=>6,'code_deis' =>103215,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Mutual de Seguridad CChC Tocopilla','alias'=>'Clínica Mutual de Seguridad CChC Tocopilla','type'=>6,'code_deis' =>103216,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Clínica El Loa','alias'=>'Clínica El Loa','type'=>6,'code_deis' =>103218,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Hospital del Cobre Salvador Allende','alias'=>'Hospital del Cobre Salvador Allende','type'=>7,'code_deis' =>103219,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Clínica La Portada','alias'=>'Clínica La Portada','type'=>6,'code_deis' =>103220,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Calama','alias'=>'Laboratorio Clínico Calama','type'=>10,'code_deis' =>103221,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Oftalmológica (Mas Visión)','alias'=>'Clínica Oftalmológica (Mas Visión)','type'=>6,'code_deis' =>103223,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Cumbres del Norte S.A.','alias'=>'Clínica Cumbres del Norte S.A.','type'=>6,'code_deis' =>103224,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Calama','alias'=>'Centro Médico y Dental Megasalud Calama','type'=>17,'code_deis' =>103226,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Antofagasta','alias'=>'Centro Médico y Dental Megasalud Antofagasta','type'=>17,'code_deis' =>103235,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Antofagasta','alias'=>'Centro de Salud Mutual CChC Antofagasta','type'=>8,'code_deis' =>103241,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico del Trabajador AChS Antofagasta','alias'=>'Policlínico del Trabajador AChS Antofagasta','type'=>8,'code_deis' =>103244,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Norte','alias'=>'Centro Médico Norte','type'=>8,'code_deis' =>103245,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Consultorio Bautista','alias'=>'Consultorio Bautista','type'=>8,'code_deis' =>103246,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Ehrlich','alias'=>'Laboratorio Clínico Ehrlich','type'=>10,'code_deis' =>103247,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Mantos Blancos','alias'=>'Policlínico Mantos Blancos','type'=>8,'code_deis' =>103248,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Victoria Saravia Crespo','alias'=>'Centro de Salud Victoria Saravia Crespo','type'=>8,'code_deis' =>103249,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Aidoret Caro','alias'=>'Centro de Salud Aidoret Caro','type'=>8,'code_deis' =>103250,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Clinisan','alias'=>'Centro de Salud Clinisan','type'=>8,'code_deis' =>103251,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Sanymed','alias'=>'Centro de Salud Sanymed','type'=>8,'code_deis' =>103252,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Sociedad Diálisis Nordial Ltda.','alias'=>'Sociedad Diálisis Nordial Ltda.','type'=>19,'code_deis' =>103254,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Carabineros Zona Antofagasta','alias'=>'Centro Médico y Dental Carabineros Zona Antofagasta','type'=>17,'code_deis' =>103255,'service' =>6,'dependency' =>5]);
Organization::Create(['name' => 'Consultorio Prefectura de El Loa','alias'=>'Consultorio Prefectura de El Loa','type'=>8,'code_deis' =>103256,'service' =>6,'dependency' =>5]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Antofagasta','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Antofagasta','type'=>8,'code_deis' =>103257,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Diagnos','alias'=>'Laboratorio Diagnos','type'=>10,'code_deis' =>103258,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio High Clinic','alias'=>'Laboratorio High Clinic','type'=>10,'code_deis' =>103259,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Tecmed Ltda.','alias'=>'Laboratorio Tecmed Ltda.','type'=>10,'code_deis' =>103260,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Histonor','alias'=>'Laboratorio Histonor','type'=>10,'code_deis' =>103261,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Diagnolab (Antofagasta)','alias'=>'Laboratorio Diagnolab (Antofagasta)','type'=>10,'code_deis' =>103262,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Luis Pasteur','alias'=>'Laboratorio Luis Pasteur','type'=>10,'code_deis' =>103263,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Antofagasta','alias'=>'Laboratorio Clínico Bionet S.A. - Antofagasta','type'=>10,'code_deis' =>103264,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clinilab (Antofagasta)','alias'=>'Laboratorio Clinilab (Antofagasta)','type'=>10,'code_deis' =>103265,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Blanco','alias'=>'Laboratorio Clínico Blanco','type'=>10,'code_deis' =>103266,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Radiolab','alias'=>'Laboratorio Radiolab','type'=>10,'code_deis' =>103267,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Doctor Lab. Ltda.','alias'=>'Doctor Lab. Ltda.','type'=>8,'code_deis' =>103268,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Calama','alias'=>'Centro de Diálisis Calama','type'=>19,'code_deis' =>103269,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Clínica de Diálisis TECDIAL Ltda.','alias'=>'Clínica de Diálisis TECDIAL Ltda.','type'=>19,'code_deis' =>103270,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Labclin','alias'=>'Laboratorio Clínico Labclin','type'=>10,'code_deis' =>103271,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Dipreca','alias'=>'Laboratorio Dipreca','type'=>10,'code_deis' =>103272,'service' =>6,'dependency' =>5]);
Organization::Create(['name' => 'Laboratorio Clínico Galeno','alias'=>'Laboratorio Clínico Galeno','type'=>10,'code_deis' =>103273,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Madison EIRL','alias'=>'Laboratorio Clínico Madison EIRL','type'=>10,'code_deis' =>103274,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Salumed','alias'=>'Laboratorio Clínico Salumed','type'=>10,'code_deis' =>103275,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Diagnolab','alias'=>'Laboratorio Clínico Diagnolab','type'=>10,'code_deis' =>103276,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Blanco','alias'=>'Laboratorio Clínico Blanco','type'=>10,'code_deis' =>103277,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico COMDES','alias'=>'Laboratorio Clínico COMDES','type'=>10,'code_deis' =>103278,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Laboratorio Sarita Núñez','alias'=>'Laboratorio Sarita Núñez','type'=>10,'code_deis' =>103279,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Norte de Antofagasta','alias'=>'Centro de Salud Familiar Norte de Antofagasta','type'=>11,'code_deis' =>103300,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Antonio Rendic (Ex Cautín)','alias'=>'Centro de Salud Familiar Antonio Rendic (Ex Cautín)','type'=>11,'code_deis' =>103301,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Corvallis','alias'=>'Centro de Salud Familiar Corvallis','type'=>11,'code_deis' =>103302,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Centro Sur de Antofagasta','alias'=>'Centro de Salud Familiar Centro Sur de Antofagasta','type'=>11,'code_deis' =>103303,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Pablo II de Antofagasta','alias'=>'Centro de Salud Familiar Juan Pablo II de Antofagasta','type'=>11,'code_deis' =>103304,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Central de Calama','alias'=>'Centro de Salud Familiar Central de Calama','type'=>11,'code_deis' =>103305,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Montt','alias'=>'Centro de Salud Familiar Montt','type'=>11,'code_deis' =>103306,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Alemania de Calama','alias'=>'Centro de Salud Familiar Alemania de Calama','type'=>11,'code_deis' =>103307,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Central Oriente de Antofagasta','alias'=>'Centro de Salud Familiar Central Oriente de Antofagasta','type'=>11,'code_deis' =>103308,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar María Elena','alias'=>'Centro de Salud Familiar María Elena','type'=>12,'code_deis' =>103309,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Pedro Atacama','alias'=>'Centro de Salud Familiar San Pedro Atacama','type'=>12,'code_deis' =>103311,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Norponiente','alias'=>'Centro de Salud Familiar Norponiente','type'=>11,'code_deis' =>103312,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Baquedano','alias'=>'Posta de Salud Rural Baquedano','type'=>13,'code_deis' =>103400,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Sierra Gorda','alias'=>'Posta de Salud Rural Sierra Gorda','type'=>13,'code_deis' =>103401,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Toconao','alias'=>'Posta de Salud Rural Toconao','type'=>13,'code_deis' =>103403,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Peine','alias'=>'Posta de Salud Rural Peine','type'=>13,'code_deis' =>103404,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Socaire','alias'=>'Posta de Salud Rural Socaire','type'=>13,'code_deis' =>103405,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Caspana','alias'=>'Posta de Salud Rural Caspana','type'=>13,'code_deis' =>103406,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ollagüe','alias'=>'Posta de Salud Rural Ollagüe','type'=>13,'code_deis' =>103407,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ayquina','alias'=>'Posta de Salud Rural Ayquina','type'=>13,'code_deis' =>103409,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chiu-Chiu','alias'=>'Posta de Salud Rural Chiu-Chiu','type'=>13,'code_deis' =>103410,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quillagua (María Elena)','alias'=>'Posta de Salud Rural Quillagua (María Elena)','type'=>13,'code_deis' =>103411,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Paposo','alias'=>'Posta de Salud Rural Paposo','type'=>13,'code_deis' =>103413,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Estación de Salud Rural Río Grande','alias'=>'Estación de Salud Rural Río Grande','type'=>13,'code_deis' =>103414,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Calama','alias'=>'COSAM Calama','type'=>14,'code_deis' =>103601,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Sur','alias'=>'COSAM Sur','type'=>14,'code_deis' =>103602,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Central','alias'=>'COSAM Central','type'=>14,'code_deis' =>103603,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Antofagasta','alias'=>'Centro Comunitario de Salud Familiar Antofagasta','type'=>16,'code_deis' =>103704,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Sur','alias'=>'Centro Comunitario de Salud Familiar Sur','type'=>16,'code_deis' =>103705,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Alemania','alias'=>'Centro Comunitario de Salud Familiar Alemania','type'=>16,'code_deis' =>103707,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Norte de Antofagasta','alias'=>'SAPU Norte de Antofagasta','type'=>20,'code_deis' =>103800,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Antonio Rendic','alias'=>'SAPU Antonio Rendic','type'=>20,'code_deis' =>103801,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Corvallis','alias'=>'SAPU Corvallis','type'=>20,'code_deis' =>103802,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Juan Pablo II de Antofagasta','alias'=>'SAPU Juan Pablo II de Antofagasta','type'=>20,'code_deis' =>103804,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Enrique Montt','alias'=>'SAPU Enrique Montt','type'=>20,'code_deis' =>103806,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Alemania de Calama','alias'=>'SAPU Alemania de Calama','type'=>20,'code_deis' =>103807,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Atacama)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Atacama)','type'=>1,'code_deis' =>104010,'service' =>7,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Atacama)','alias'=>'PRAIS (S.S Atacama)','type'=>2,'code_deis' =>104011,'service' =>7,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Simple. Pat. PW4068 (Copiapó)','alias'=>'Clínica Dental Móvil Simple. Pat. PW4068 (Copiapó)','type'=>3,'code_deis' =>104012,'service' =>7,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San José del Carmen (Copiapó)','alias'=>'Hospital San José del Carmen (Copiapó)','type'=>5,'code_deis' =>104100,'service' =>7,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Jerónimo Méndez Arancibia (Chañaral)','alias'=>'Hospital Dr. Jerónimo Méndez Arancibia (Chañaral)','type'=>22,'code_deis' =>104101,'service' =>7,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Florencio Vargas (Diego de Almagro)','alias'=>'Hospital Dr. Florencio Vargas (Diego de Almagro)','type'=>22,'code_deis' =>104102,'service' =>7,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Provincial del Huasco Monseñor Fernando Ariztía Ruiz (Vallenar)','alias'=>'Hospital Provincial del Huasco Monseñor Fernando Ariztía Ruiz (Vallenar)','type'=>23,'code_deis' =>104103,'service' =>7,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Manuel Magalhaes Medling (Huasco)','alias'=>'Hospital Dr. Manuel Magalhaes Medling (Huasco)','type'=>22,'code_deis' =>104104,'service' =>7,'dependency' =>1]);
Organization::Create(['name' => 'Clínica San Lorenzo','alias'=>'Clínica San Lorenzo','type'=>6,'code_deis' =>104200,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud del Trabajador AChS Copiapó','alias'=>'Centro de Salud del Trabajador AChS Copiapó','type'=>8,'code_deis' =>104202,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Copiapó','alias'=>'Centro de Salud Mutual CChC Copiapó','type'=>8,'code_deis' =>104203,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Clínica del Trabajador AChS Vallenar','alias'=>'Clínica del Trabajador AChS Vallenar','type'=>6,'code_deis' =>104214,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Universidad de Atacama','alias'=>'Centro de Salud Universidad de Atacama','type'=>8,'code_deis' =>104215,'service' =>8,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Salud Compañía Aceros del Pacífico','alias'=>'Centro de Salud Compañía Aceros del Pacífico','type'=>8,'code_deis' =>104216,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Bio-Test','alias'=>'Laboratorio Bio-Test','type'=>10,'code_deis' =>104217,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Atacama','alias'=>'Laboratorio Atacama','type'=>10,'code_deis' =>104218,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Indire','alias'=>'Clínica Indire','type'=>6,'code_deis' =>104238,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud CEDIMED','alias'=>'Centro de Salud CEDIMED','type'=>8,'code_deis' =>104239,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Guillermo Guaita','alias'=>'Laboratorio Clínico Guillermo Guaita','type'=>10,'code_deis' =>104241,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Huasco-Vallenar','alias'=>'Laboratorio Clínico Huasco-Vallenar','type'=>10,'code_deis' =>104242,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico SIAC Copiapó','alias'=>'Laboratorio Clínico SIAC Copiapó','type'=>10,'code_deis' =>104243,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Vallenar','alias'=>'Laboratorio Clínico Vallenar','type'=>10,'code_deis' =>104244,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Copiapó','alias'=>'Laboratorio Clínico Bionet S.A. - Copiapó','type'=>10,'code_deis' =>104245,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Examed','alias'=>'Laboratorio Clínico Examed','type'=>10,'code_deis' =>104247,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Atacama S.A.','alias'=>'Clínica Atacama S.A.','type'=>6,'code_deis' =>104249,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Diagnóstico Atacama SpA','alias'=>'Centro Médico y Diagnóstico Atacama SpA','type'=>8,'code_deis' =>104251,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Dial Vida','alias'=>'Clínica Dial Vida','type'=>6,'code_deis' =>104252,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Nefrodial Atacama','alias'=>'Centro de Diálisis Nefrodial Atacama','type'=>19,'code_deis' =>104253,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Vallenar','alias'=>'Centro de Diálisis Vallenar','type'=>19,'code_deis' =>104255,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Renacer del Valle','alias'=>'Centro de Diálisis Renacer del Valle','type'=>19,'code_deis' =>104256,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Elvira','alias'=>'Centro de Salud Familiar Santa Elvira','type'=>11,'code_deis' =>104300,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Rosario Corvalán','alias'=>'Centro de Salud Familiar Rosario Corvalán','type'=>11,'code_deis' =>104301,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Martínez','alias'=>'Centro de Salud Familiar Juan Martínez','type'=>11,'code_deis' =>104302,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pedro León Gallo','alias'=>'Centro de Salud Familiar Pedro León Gallo','type'=>11,'code_deis' =>104303,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Rosario-Palomar','alias'=>'Centro de Salud Familiar Rosario-Palomar','type'=>11,'code_deis' =>104304,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Candelaria Rosario','alias'=>'Centro de Salud Familiar Candelaria Rosario','type'=>11,'code_deis' =>104305,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Manuel Rodríguez','alias'=>'Centro de Salud Familiar Manuel Rodríguez','type'=>11,'code_deis' =>104306,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Paipote','alias'=>'Centro de Salud Familiar Paipote','type'=>11,'code_deis' =>104307,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Salvador Allende Gossens','alias'=>'Centro de Salud Familiar Dr. Salvador Allende Gossens','type'=>12,'code_deis' =>104308,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Luis Herrera','alias'=>'Centro de Salud Familiar Dr. Luis Herrera','type'=>11,'code_deis' =>104309,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar El Salvador','alias'=>'Centro de Salud Familiar El Salvador','type'=>12,'code_deis' =>104311,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Estación','alias'=>'Centro de Salud Familiar Estación','type'=>11,'code_deis' =>104313,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Freirina','alias'=>'Centro de Salud Familiar Freirina','type'=>12,'code_deis' =>104314,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Hermanos Carrera','alias'=>'Centro de Salud Familiar Hermanos Carrera','type'=>11,'code_deis' =>104315,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Baquedano','alias'=>'Centro de Salud Familiar Baquedano','type'=>11,'code_deis' =>104316,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Joan Crawford Astudillo','alias'=>'Centro de Salud Familiar Joan Crawford Astudillo','type'=>11,'code_deis' =>104317,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Verdaguer','alias'=>'Centro de Salud Familiar Juan Verdaguer','type'=>11,'code_deis' =>104319,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Bernardo Mellibovsky','alias'=>'Centro de Salud Familiar Dr. Bernardo Mellibovsky','type'=>11,'code_deis' =>104321,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Alto del Carmen','alias'=>'Centro de Salud Familiar Alto del Carmen','type'=>12,'code_deis' =>104322,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Loros','alias'=>'Posta de Salud Rural Los Loros','type'=>13,'code_deis' =>104400,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Salado de Chañaral','alias'=>'Posta de Salud Rural El Salado de Chañaral','type'=>13,'code_deis' =>104401,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Inca de Oro','alias'=>'Posta de Salud Rural Inca de Oro','type'=>13,'code_deis' =>104402,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Félix','alias'=>'Posta de Salud Rural San Félix','type'=>13,'code_deis' =>104403,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Tránsito','alias'=>'Posta de Salud Rural El Tránsito','type'=>13,'code_deis' =>104404,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Domeyko','alias'=>'Posta de Salud Rural Domeyko','type'=>13,'code_deis' =>104405,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Conay','alias'=>'Posta de Salud Rural Conay','type'=>13,'code_deis' =>104407,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Hacienda Ventanas','alias'=>'Posta de Salud Rural Hacienda Ventanas','type'=>13,'code_deis' =>104408,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Carrizalillo (Freirina)','alias'=>'Posta de Salud Rural Carrizalillo (Freirina)','type'=>13,'code_deis' =>104409,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cachiyuyo','alias'=>'Posta de Salud Rural Cachiyuyo','type'=>13,'code_deis' =>104410,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Incahuasi','alias'=>'Posta de Salud Rural Incahuasi','type'=>13,'code_deis' =>104411,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Hacienda Compañía','alias'=>'Posta de Salud Rural Hacienda Compañía','type'=>13,'code_deis' =>104412,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Segundo Ponce','alias'=>'Posta de Salud Rural Segundo Ponce','type'=>13,'code_deis' =>104413,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Breas (Alto del Carmen)','alias'=>'Posta de Salud Rural Las Breas (Alto del Carmen)','type'=>13,'code_deis' =>104414,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Padre Mariano Avellana Lasierra','alias'=>'Posta de Salud Rural Padre Mariano Avellana Lasierra','type'=>13,'code_deis' =>104415,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Jeremías Cortés','alias'=>'Posta de Salud Rural Jeremías Cortés','type'=>13,'code_deis' =>104416,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Orfelia Lavín','alias'=>'Centro Comunitario de Salud Familiar Orfelia Lavín','type'=>16,'code_deis' =>104701,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Coquimbo)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Coquimbo)','type'=>1,'code_deis' =>105010,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Coquimbo)','alias'=>'PRAIS (S.S Coquimbo)','type'=>2,'code_deis' =>105011,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. PW4100 (Monte Patria)','alias'=>'Clínica Dental Móvil Triple. Pat. PW4100 (Monte Patria)','type'=>3,'code_deis' =>105012,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Juan de Dios (La Serena)','alias'=>'Hospital San Juan de Dios (La Serena)','type'=>5,'code_deis' =>105100,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Pablo (Coquimbo)','alias'=>'Hospital San Pablo (Coquimbo)','type'=>5,'code_deis' =>105101,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Antonio Tirado Lanas de Ovalle','alias'=>'Hospital Dr. Antonio Tirado Lanas de Ovalle','type'=>5,'code_deis' =>105102,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Humberto Elorza Cortés (Illapel)','alias'=>'Hospital Dr. Humberto Elorza Cortés (Illapel)','type'=>23,'code_deis' =>105103,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Salamanca','alias'=>'Hospital de Salamanca','type'=>22,'code_deis' =>105104,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Juan de Dios (Combarbalá)','alias'=>'Hospital San Juan de Dios (Combarbalá)','type'=>22,'code_deis' =>105105,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. José Arraño (Andacollo)','alias'=>'Hospital Dr. José Arraño (Andacollo)','type'=>22,'code_deis' =>105106,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Juan de Dios (Vicuña)','alias'=>'Hospital San Juan de Dios (Vicuña)','type'=>22,'code_deis' =>105107,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Pedro (Los Vilos)','alias'=>'Hospital San Pedro (Los Vilos)','type'=>22,'code_deis' =>105108,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC La Serena','alias'=>'Centro de Salud Mutual CChC La Serena','type'=>8,'code_deis' =>105202,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico del Trabajador AChS La Serena','alias'=>'Policlínico del Trabajador AChS La Serena','type'=>8,'code_deis' =>105203,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Clínica del Trabajador de la AChS Ovalle','alias'=>'Clínica del Trabajador de la AChS Ovalle','type'=>6,'code_deis' =>105207,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Regional Elqui','alias'=>'Clínica Regional Elqui','type'=>6,'code_deis' =>105208,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Integramédica La Serena','alias'=>'Centro Médico Integramédica La Serena','type'=>8,'code_deis' =>105225,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud La Serena','alias'=>'Centro Médico y Dental Megasalud La Serena','type'=>17,'code_deis' =>105230,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Dra. Gloria Canovas','alias'=>'Laboratorio Clínico Dra. Gloria Canovas','type'=>10,'code_deis' =>105231,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Cruz Roja de La Serena','alias'=>'Policlínico Cruz Roja de La Serena','type'=>8,'code_deis' =>105232,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Estudiantil - Universidad Católica del Norte','alias'=>'Centro de Salud Estudiantil - Universidad Católica del Norte','type'=>8,'code_deis' =>105233,'service' =>10,'dependency' =>4]);
Organization::Create(['name' => 'Policlínico del Trabajador AChS Illapel','alias'=>'Policlínico del Trabajador AChS Illapel','type'=>8,'code_deis' =>105234,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico EMI','alias'=>'Centro Médico EMI','type'=>8,'code_deis' =>105235,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Sociedad de Profesionales de Hemodiálisis Ltda.','alias'=>'Sociedad de Profesionales de Hemodiálisis Ltda.','type'=>19,'code_deis' =>105236,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Sociedad Propedia Ltda.','alias'=>'Sociedad Propedia Ltda.','type'=>8,'code_deis' =>105237,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Compañía Minera del Pacífico S.A.','alias'=>'Centro de Salud Compañía Minera del Pacífico S.A.','type'=>8,'code_deis' =>105239,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Ovalle','alias'=>'Centro de Salud Mutual CChC Ovalle','type'=>8,'code_deis' =>105240,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Cruz Roja de Coquimbo','alias'=>'Cruz Roja de Coquimbo','type'=>8,'code_deis' =>105241,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Santa María de La Serena Ltda.','alias'=>'Laboratorio Clínico Santa María de La Serena Ltda.','type'=>10,'code_deis' =>105242,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Limarí','alias'=>'Laboratorio Clínico Limarí','type'=>10,'code_deis' =>105243,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Integramédica','alias'=>'Laboratorio Clínico Integramédica','type'=>10,'code_deis' =>105244,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico San Andrés','alias'=>'Laboratorio Clínico San Andrés','type'=>10,'code_deis' =>105245,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro de especialidades Médicas (CEMCO)','alias'=>'Centro de especialidades Médicas (CEMCO)','type'=>8,'code_deis' =>105246,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Analyser Ltda.','alias'=>'Laboratorio Clínico Analyser Ltda.','type'=>10,'code_deis' =>105247,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Ariztía Ltda.','alias'=>'Laboratorio Clínico Ariztía Ltda.','type'=>10,'code_deis' =>105248,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - La Serena','alias'=>'Laboratorio Clínico Bionet S.A. - La Serena','type'=>10,'code_deis' =>105249,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Sociedad de Profesionales de Huanhuali Ltda.','alias'=>'Sociedad de Profesionales de Huanhuali Ltda.','type'=>10,'code_deis' =>105250,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico IMATEC Ltda.','alias'=>'Laboratorio Clínico IMATEC Ltda.','type'=>10,'code_deis' =>105251,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Hermanos Muñoz Flores','alias'=>'Laboratorio Clínico Hermanos Muñoz Flores','type'=>10,'code_deis' =>105252,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Xima Ltda.','alias'=>'Laboratorio Clínico Xima Ltda.','type'=>10,'code_deis' =>105253,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Hemolab Ltda.','alias'=>'Laboratorio Clínico Hemolab Ltda.','type'=>10,'code_deis' =>105254,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Los Olivos','alias'=>'Laboratorio Clínico Los Olivos','type'=>10,'code_deis' =>105255,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Zuleta y Pinto','alias'=>'Laboratorio Clínico Zuleta y Pinto','type'=>10,'code_deis' =>105256,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Illapel','alias'=>'Laboratorio Clínico Bionet S.A. - Illapel','type'=>10,'code_deis' =>105257,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Astelab','alias'=>'Laboratorio Clínico Astelab','type'=>10,'code_deis' =>105258,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Ovalle','alias'=>'Laboratorio Clínico Bionet S.A. - Ovalle','type'=>10,'code_deis' =>105259,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Medilab Ltda.','alias'=>'Laboratorio Clínico Medilab Ltda.','type'=>10,'code_deis' =>105260,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Cardenal Caro','alias'=>'Centro de Salud Familiar Cardenal Caro','type'=>11,'code_deis' =>105300,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Las Compañías','alias'=>'Centro de Salud Familiar Las Compañías','type'=>11,'code_deis' =>105301,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pedro Aguirre Cerda','alias'=>'Centro de Salud Familiar Pedro Aguirre Cerda','type'=>11,'code_deis' =>105302,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Juan','alias'=>'Centro de Salud Familiar San Juan','type'=>11,'code_deis' =>105303,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Cecilia','alias'=>'Centro de Salud Familiar Santa Cecilia','type'=>11,'code_deis' =>105304,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Tierras Blancas','alias'=>'Centro de Salud Familiar Tierras Blancas','type'=>11,'code_deis' =>105305,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Paihuano','alias'=>'Centro de Salud Familiar Paihuano','type'=>12,'code_deis' =>105306,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Monte Patria','alias'=>'Centro de Salud Familiar Monte Patria','type'=>12,'code_deis' =>105307,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Punitaqui','alias'=>'Centro de Salud Familiar Punitaqui','type'=>12,'code_deis' =>105308,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Canela','alias'=>'Centro de Salud Familiar Canela','type'=>12,'code_deis' =>105309,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pichasca','alias'=>'Centro de Salud Familiar Pichasca','type'=>12,'code_deis' =>105310,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Chañaral Alto','alias'=>'Centro de Salud Familiar Chañaral Alto','type'=>12,'code_deis' =>105311,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Carén','alias'=>'Centro de Salud Familiar Carén','type'=>12,'code_deis' =>105312,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Emilio Schaffhauser','alias'=>'Centro de Salud Familiar Dr. Emilio Schaffhauser','type'=>11,'code_deis' =>105313,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Higuera','alias'=>'Centro de Salud Familiar La Higuera','type'=>12,'code_deis' =>105314,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cerrillos de Tamaya','alias'=>'Centro de Salud Familiar Cerrillos de Tamaya','type'=>12,'code_deis' =>105315,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Jorge Jordán Domic','alias'=>'Centro de Salud Familiar Jorge Jordán Domic','type'=>11,'code_deis' =>105317,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar El Palqui','alias'=>'Centro de Salud Familiar El Palqui','type'=>12,'code_deis' =>105318,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cardenal Raúl Silva Henríquez de La Serena','alias'=>'Centro de Salud Familiar Cardenal Raúl Silva Henríquez de La Serena','type'=>11,'code_deis' =>105319,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Tongoy','alias'=>'Centro de Salud Familiar Tongoy','type'=>12,'code_deis' =>105321,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Marcos Macuada','alias'=>'Centro de Salud Familiar Marcos Macuada','type'=>11,'code_deis' =>105322,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Sergio Aguilar Delgado','alias'=>'Centro de Salud Familiar Dr. Sergio Aguilar Delgado','type'=>11,'code_deis' =>105323,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Sotaquí','alias'=>'Centro de Salud Familiar Sotaquí','type'=>12,'code_deis' =>105324,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Pablo II','alias'=>'Centro de Salud Familiar Juan Pablo II','type'=>11,'code_deis' =>105325,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Villa San Rafael de Rozas','alias'=>'Centro de Salud Familiar Villa San Rafael de Rozas','type'=>12,'code_deis' =>105326,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Algarrobito','alias'=>'Posta de Salud Rural Algarrobito','type'=>13,'code_deis' =>105400,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Rojas','alias'=>'Posta de Salud Rural Las Rojas','type'=>13,'code_deis' =>105401,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Romero','alias'=>'Posta de Salud Rural El Romero','type'=>13,'code_deis' =>105402,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Tangue','alias'=>'Posta de Salud Rural El Tangue','type'=>13,'code_deis' =>105404,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Guanaqueros','alias'=>'Posta de Salud Rural Guanaqueros','type'=>13,'code_deis' =>105405,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tambillo','alias'=>'Posta de Salud Rural Tambillo','type'=>13,'code_deis' =>105407,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Chañar','alias'=>'Posta de Salud Rural El Chañar','type'=>13,'code_deis' =>105409,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Hurtado','alias'=>'Posta de Salud Rural Hurtado','type'=>13,'code_deis' =>105410,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Breas (Río Hurtado)','alias'=>'Posta de Salud Rural Las Breas (Río Hurtado)','type'=>13,'code_deis' =>105411,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Samo Alto','alias'=>'Posta de Salud Rural Samo Alto','type'=>13,'code_deis' =>105413,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Serón','alias'=>'Posta de Salud Rural Serón','type'=>13,'code_deis' =>105414,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Barraza','alias'=>'Posta de Salud Rural Barraza','type'=>13,'code_deis' =>105415,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Camarico (Ovalle)','alias'=>'Posta de Salud Rural Camarico (Ovalle)','type'=>13,'code_deis' =>105416,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alcones Bajo','alias'=>'Posta de Salud Rural Alcones Bajo','type'=>13,'code_deis' =>105417,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Sossas','alias'=>'Posta de Salud Rural Las Sossas','type'=>13,'code_deis' =>105419,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Hornillos','alias'=>'Posta de Salud Rural Hornillos','type'=>13,'code_deis' =>105422,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chilecito','alias'=>'Posta de Salud Rural Chilecito','type'=>13,'code_deis' =>105425,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Hacienda Valdivia','alias'=>'Posta de Salud Rural Hacienda Valdivia','type'=>13,'code_deis' =>105427,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huatulame','alias'=>'Posta de Salud Rural Huatulame','type'=>13,'code_deis' =>105428,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mialqui','alias'=>'Posta de Salud Rural Mialqui','type'=>13,'code_deis' =>105430,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pedregal','alias'=>'Posta de Salud Rural Pedregal','type'=>13,'code_deis' =>105431,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rapel (Monte Patria)','alias'=>'Posta de Salud Rural Rapel (Monte Patria)','type'=>13,'code_deis' =>105432,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Lorenzo (Combarbalá)','alias'=>'Posta de Salud Rural San Lorenzo (Combarbalá)','type'=>13,'code_deis' =>105433,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Marcos (Combarbalá)','alias'=>'Posta de Salud Rural San Marcos (Combarbalá)','type'=>13,'code_deis' =>105434,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tulahuén','alias'=>'Posta de Salud Rural Tulahuén','type'=>13,'code_deis' =>105435,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Maitén','alias'=>'Posta de Salud Rural El Maitén','type'=>13,'code_deis' =>105436,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chalinga','alias'=>'Posta de Salud Rural Chalinga','type'=>13,'code_deis' =>105437,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cerro Blanco','alias'=>'Posta de Salud Rural Cerro Blanco','type'=>13,'code_deis' =>105439,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Divisadero','alias'=>'Posta de Salud Rural Divisadero','type'=>13,'code_deis' =>105440,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Manquehua','alias'=>'Posta de Salud Rural Manquehua','type'=>13,'code_deis' =>105441,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Pedro de Quiles','alias'=>'Posta de Salud Rural San Pedro de Quiles','type'=>13,'code_deis' =>105442,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cárcamo','alias'=>'Posta de Salud Rural Cárcamo','type'=>13,'code_deis' =>105443,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huintil','alias'=>'Posta de Salud Rural Huintil','type'=>13,'code_deis' =>105444,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Limáhuida','alias'=>'Posta de Salud Rural Limáhuida','type'=>13,'code_deis' =>105445,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Matancilla','alias'=>'Posta de Salud Rural Matancilla','type'=>13,'code_deis' =>105446,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Peralillo Illapel','alias'=>'Posta de Salud Rural Peralillo Illapel','type'=>13,'code_deis' =>105447,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Virginia','alias'=>'Posta de Salud Rural Santa Virginia','type'=>13,'code_deis' =>105448,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tunga Norte','alias'=>'Posta de Salud Rural Tunga Norte','type'=>13,'code_deis' =>105449,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mincha Norte','alias'=>'Posta de Salud Rural Mincha Norte','type'=>13,'code_deis' =>105450,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Agua Fría','alias'=>'Posta de Salud Rural Agua Fría','type'=>13,'code_deis' =>105451,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cuncumén(Salamanca)','alias'=>'Posta de Salud Rural Cuncumén(Salamanca)','type'=>13,'code_deis' =>105452,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tranquilla','alias'=>'Posta de Salud Rural Tranquilla','type'=>13,'code_deis' =>105453,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cunlagua','alias'=>'Posta de Salud Rural Cunlagua','type'=>13,'code_deis' =>105454,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chillepín','alias'=>'Posta de Salud Rural Chillepín','type'=>13,'code_deis' =>105455,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Llimpo','alias'=>'Posta de Salud Rural Llimpo','type'=>13,'code_deis' =>105456,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Agustín (Salamanca)','alias'=>'Posta de Salud Rural San Agustín (Salamanca)','type'=>13,'code_deis' =>105457,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tahuinco','alias'=>'Posta de Salud Rural Tahuinco','type'=>13,'code_deis' =>105458,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Barrancas','alias'=>'Posta de Salud Rural Barrancas','type'=>13,'code_deis' =>105459,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cogotí 18','alias'=>'Posta de Salud Rural Cogotí 18','type'=>13,'code_deis' =>105460,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Huacho','alias'=>'Posta de Salud Rural El Huacho','type'=>13,'code_deis' =>105461,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Sauce (Combarbalá)','alias'=>'Posta de Salud Rural El Sauce (Combarbalá)','type'=>13,'code_deis' =>105462,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quilitapia','alias'=>'Posta de Salud Rural Quilitapia','type'=>13,'code_deis' =>105463,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Ligua','alias'=>'Posta de Salud Rural La Ligua','type'=>13,'code_deis' =>105464,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ramadilla','alias'=>'Posta de Salud Rural Ramadilla','type'=>13,'code_deis' =>105465,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Valle Hermoso','alias'=>'Posta de Salud Rural Valle Hermoso','type'=>13,'code_deis' =>105466,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Diaguitas','alias'=>'Posta de Salud Rural Diaguitas','type'=>13,'code_deis' =>105467,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Molle','alias'=>'Posta de Salud Rural El Molle','type'=>13,'code_deis' =>105468,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Tambo (Vicuña)','alias'=>'Posta de Salud Rural El Tambo (Vicuña)','type'=>13,'code_deis' =>105469,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huanta','alias'=>'Posta de Salud Rural Huanta','type'=>13,'code_deis' =>105470,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Peralillo Vicuña','alias'=>'Posta de Salud Rural Peralillo Vicuña','type'=>13,'code_deis' =>105471,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rivadavia','alias'=>'Posta de Salud Rural Rivadavia','type'=>13,'code_deis' =>105472,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Talcuna','alias'=>'Posta de Salud Rural Talcuna','type'=>13,'code_deis' =>105473,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chapilca','alias'=>'Posta de Salud Rural Chapilca','type'=>13,'code_deis' =>105474,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Horcón (Paiguano)','alias'=>'Posta de Salud Rural Horcón (Paiguano)','type'=>13,'code_deis' =>105475,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Monte Grande','alias'=>'Posta de Salud Rural Monte Grande','type'=>13,'code_deis' =>105476,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pisco Elqui','alias'=>'Posta de Salud Rural Pisco Elqui','type'=>13,'code_deis' =>105477,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Caimanes','alias'=>'Posta de Salud Rural Caimanes','type'=>13,'code_deis' =>105478,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Guangualí','alias'=>'Posta de Salud Rural Guangualí','type'=>13,'code_deis' =>105479,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quilimarí','alias'=>'Posta de Salud Rural Quilimarí','type'=>13,'code_deis' =>105480,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tilama','alias'=>'Posta de Salud Rural Tilama','type'=>13,'code_deis' =>105481,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Canela Alta','alias'=>'Posta de Salud Rural Canela Alta','type'=>13,'code_deis' =>105482,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Rulos','alias'=>'Posta de Salud Rural Los Rulos','type'=>13,'code_deis' =>105483,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huentelauquén','alias'=>'Posta de Salud Rural Huentelauquén','type'=>13,'code_deis' =>105484,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Plan de Hornos','alias'=>'Posta de Salud Rural Plan de Hornos','type'=>13,'code_deis' =>105485,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tunga Sur','alias'=>'Posta de Salud Rural Tunga Sur','type'=>13,'code_deis' =>105486,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cañas Uno','alias'=>'Posta de Salud Rural Cañas Uno','type'=>13,'code_deis' =>105487,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Espíritu Santo','alias'=>'Posta de Salud Rural Espíritu Santo','type'=>13,'code_deis' =>105488,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ramadas de Tulahuén','alias'=>'Posta de Salud Rural Ramadas de Tulahuén','type'=>13,'code_deis' =>105489,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Durazno(Combarbalá)','alias'=>'Posta de Salud Rural El Durazno(Combarbalá)','type'=>13,'code_deis' =>105490,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quelén Bajo','alias'=>'Posta de Salud Rural Quelén Bajo','type'=>13,'code_deis' =>105491,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Camisa','alias'=>'Posta de Salud Rural Camisa','type'=>13,'code_deis' =>105492,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mincha Sur','alias'=>'Posta de Salud Rural Mincha Sur','type'=>13,'code_deis' =>105493,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pintacura Sur','alias'=>'Posta de Salud Rural Pintacura Sur','type'=>13,'code_deis' =>105496,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Jabonería','alias'=>'Posta de Salud Rural Jabonería','type'=>13,'code_deis' =>105497,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quebrada Linares','alias'=>'Posta de Salud Rural Quebrada Linares','type'=>13,'code_deis' =>105498,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lambert','alias'=>'Posta de Salud Rural Lambert','type'=>13,'code_deis' =>105499,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Caleta Hornos','alias'=>'Posta de Salud Rural Caleta Hornos','type'=>13,'code_deis' =>105500,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Arboleda Grande','alias'=>'Posta de Salud Rural Arboleda Grande','type'=>13,'code_deis' =>105501,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tabaqueros','alias'=>'Posta de Salud Rural Tabaqueros','type'=>13,'code_deis' =>105503,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Socavón','alias'=>'Posta de Salud Rural Socavón','type'=>13,'code_deis' =>105504,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Choros','alias'=>'Posta de Salud Rural Los Choros','type'=>13,'code_deis' =>105505,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Trapiche','alias'=>'Posta de Salud Rural El Trapiche','type'=>13,'code_deis' =>105506,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huamalata','alias'=>'Posta de Salud Rural Huamalata','type'=>13,'code_deis' =>105507,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Parral de Quiles','alias'=>'Posta de Salud Rural El Parral de Quiles','type'=>13,'code_deis' =>105508,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Gualliguaica','alias'=>'Posta de Salud Rural Gualliguaica','type'=>13,'code_deis' =>105509,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Recoleta','alias'=>'Posta de Salud Rural Recoleta','type'=>13,'code_deis' =>105510,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Cóndores','alias'=>'Posta de Salud Rural Los Cóndores','type'=>13,'code_deis' =>105511,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Tierras Blancas (CESAM)','alias'=>'COSAM Tierras Blancas (CESAM)','type'=>14,'code_deis' =>105600,'service' =>9,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa el Indio','alias'=>'Centro Comunitario de Salud Familiar Villa el Indio','type'=>16,'code_deis' =>105700,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa Alemania','alias'=>'Centro Comunitario de Salud Familiar Villa Alemania','type'=>16,'code_deis' =>105701,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Lambert','alias'=>'Centro Comunitario de Salud Familiar Lambert','type'=>16,'code_deis' =>105702,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Alba','alias'=>'Centro Comunitario de Salud Familiar El Alba','type'=>16,'code_deis' =>105705,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar San José de la Dehesa','alias'=>'Centro Comunitario de Salud Familiar San José de la Dehesa','type'=>16,'code_deis' =>105722,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Limarí','alias'=>'Centro Comunitario de Salud Familiar Limarí','type'=>16,'code_deis' =>105723,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Las Compañías','alias'=>'SAPU Las Compañías','type'=>20,'code_deis' =>105801,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Pedro Aguirre Cerda','alias'=>'SAPU Pedro Aguirre Cerda','type'=>20,'code_deis' =>105802,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAPU San Juan','alias'=>'SAPU San Juan','type'=>20,'code_deis' =>105803,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Santa Cecilia','alias'=>'SAPU Santa Cecilia','type'=>20,'code_deis' =>105804,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAR Tierras Blancas','alias'=>'SAR Tierras Blancas','type'=>20,'code_deis' =>105805,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Canela','alias'=>'SAPU Canela','type'=>20,'code_deis' =>105809,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Jorge Jordán Domic','alias'=>'SAPU Jorge Jordán Domic','type'=>20,'code_deis' =>105817,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAR Raúl Silva Henríquez','alias'=>'SAR Raúl Silva Henríquez','type'=>20,'code_deis' =>105819,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAR Marcos Macuada','alias'=>'SAR Marcos Macuada','type'=>20,'code_deis' =>105822,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Sergio Aguilar','alias'=>'SAPU Dr. Sergio Aguilar','type'=>20,'code_deis' =>105823,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Cardenal Caro','alias'=>'SAPU Cardenal Caro','type'=>20,'code_deis' =>105825,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Emilio Schaffhauser','alias'=>'SAPU Emilio Schaffhauser','type'=>20,'code_deis' =>105826,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Valparaíso','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Valparaíso','type'=>1,'code_deis' =>106010,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Valparaíso San Antonio)','alias'=>'PRAIS (S.S Valparaíso San Antonio)','type'=>2,'code_deis' =>106011,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. PW4101 (Valparaíso)','alias'=>'Clínica Dental Móvil Triple. Pat. PW4101 (Valparaíso)','type'=>3,'code_deis' =>106012,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Vacunatorio SEREMI de Salud de Valparaíso','alias'=>'Vacunatorio SEREMI de Salud de Valparaíso','type'=>18,'code_deis' =>106095,'service' =>11,'dependency' =>2]);
Organization::Create(['name' => 'Hospital Carlos Van Buren (Valparaíso)','alias'=>'Hospital Carlos Van Buren (Valparaíso)','type'=>5,'code_deis' =>106100,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Eduardo Pereira Ramírez (Valparaíso)','alias'=>'Hospital Dr. Eduardo Pereira Ramírez (Valparaíso)','type'=>5,'code_deis' =>106102,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Claudio Vicuña ( San Antonio)','alias'=>'Hospital Claudio Vicuña ( San Antonio)','type'=>5,'code_deis' =>106103,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Del Salvador de Valparaíso','alias'=>'Hospital Del Salvador de Valparaíso','type'=>23,'code_deis' =>106104,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San José (Casablanca)','alias'=>'Hospital San José (Casablanca)','type'=>22,'code_deis' =>106105,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Sangre y Tejidos IV y V Región','alias'=>'Centro de Sangre y Tejidos IV y V Región','type'=>24,'code_deis' =>106150,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Referencia de Salud Odontológica','alias'=>'Centro de Referencia de Salud Odontológica','type'=>25,'code_deis' =>106151,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Clínica San Julián','alias'=>'Clínica San Julián','type'=>6,'code_deis' =>106204,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Clínica San Antonio','alias'=>'Clínica San Antonio','type'=>6,'code_deis' =>106205,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro CONIN Valparaíso','alias'=>'Centro CONIN Valparaíso','type'=>26,'code_deis' =>106207,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Complejo Penitenciario','alias'=>'Complejo Penitenciario','type'=>7,'code_deis' =>106213,'service' =>12,'dependency' =>4]);
Organization::Create(['name' => 'Clínica Valparaíso','alias'=>'Clínica Valparaíso','type'=>6,'code_deis' =>106214,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC San Antonio','alias'=>'Centro de Salud Mutual CChC San Antonio','type'=>8,'code_deis' =>106234,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Valparaíso Capredena','alias'=>'Centro Médico y Dental Valparaíso Capredena','type'=>17,'code_deis' =>106236,'service' =>12,'dependency' =>5]);
Organization::Create(['name' => 'Clínica de la Agrupación Médica Americana','alias'=>'Clínica de la Agrupación Médica Americana','type'=>6,'code_deis' =>106237,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud ASOMEL','alias'=>'Centro de Salud ASOMEL','type'=>8,'code_deis' =>106238,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Diagnóstico e Imagenológico','alias'=>'Laboratorio Diagnóstico e Imagenológico','type'=>10,'code_deis' =>106239,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Dental Árabe Miguel Jahiatt','alias'=>'Centro Dental Árabe Miguel Jahiatt','type'=>9,'code_deis' =>106240,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Dental (Dirección Servicios Estudiantiles Universidad Católica)','alias'=>'Clínica Dental (Dirección Servicios Estudiantiles Universidad Católica)','type'=>9,'code_deis' =>106241,'service' =>12,'dependency' =>4]);
Organization::Create(['name' => 'Policlínico (Dirección de Servicios Estudiantiles Universidad Católica)','alias'=>'Policlínico (Dirección de Servicios Estudiantiles Universidad Católica)','type'=>8,'code_deis' =>106242,'service' =>12,'dependency' =>4]);
Organization::Create(['name' => 'Instituto Teletón Valparaíso','alias'=>'Instituto Teletón Valparaíso','type'=>8,'code_deis' =>106243,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Valparaíso','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Valparaíso','type'=>8,'code_deis' =>106244,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Docencia e Investigación Científica (Universidad de Valparaíso)','alias'=>'Laboratorio Docencia e Investigación Científica (Universidad de Valparaíso)','type'=>10,'code_deis' =>106245,'service' =>12,'dependency' =>4]);
Organization::Create(['name' => 'Laboratorio Fadda Ltda.','alias'=>'Laboratorio Fadda Ltda.','type'=>10,'code_deis' =>106246,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Hematológico','alias'=>'Laboratorio Hematológico','type'=>10,'code_deis' =>106247,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio SEDELIS','alias'=>'Laboratorio SEDELIS','type'=>10,'code_deis' =>106248,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Toxicología Humana y Ambiental (Universidad de Playa Ancha)','alias'=>'Laboratorio Toxicología Humana y Ambiental (Universidad de Playa Ancha)','type'=>10,'code_deis' =>106249,'service' =>12,'dependency' =>4]);
Organization::Create(['name' => 'Centro Odontológico Casablanca','alias'=>'Centro Odontológico Casablanca','type'=>9,'code_deis' =>106253,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Compañía Chilena de Tabacos','alias'=>'Centro de Salud Compañía Chilena de Tabacos','type'=>8,'code_deis' =>106254,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud ASAD','alias'=>'Centro de Salud ASAD','type'=>8,'code_deis' =>106255,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Asociación Triomar','alias'=>'Centro de Salud Asociación Triomar','type'=>8,'code_deis' =>106256,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Atención CENCLIVAL','alias'=>'Centro de Atención CENCLIVAL','type'=>8,'code_deis' =>106257,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Atención Primaria de Salud Naval (Valparaíso)','alias'=>'Centro de Atención Primaria de Salud Naval (Valparaíso)','type'=>8,'code_deis' =>106258,'service' =>12,'dependency' =>5]);
Organization::Create(['name' => 'Centro Médico del Niño y Adolescente de Valparaíso','alias'=>'Centro Médico del Niño y Adolescente de Valparaíso','type'=>8,'code_deis' =>106259,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Consultorio Prefectura de Carabineros San Antonio','alias'=>'Consultorio Prefectura de Carabineros San Antonio','type'=>8,'code_deis' =>106260,'service' =>12,'dependency' =>5]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad AChS. Agencia San Antonio','alias'=>'Policlínico de la Asociación Chilena de Seguridad AChS. Agencia San Antonio','type'=>8,'code_deis' =>106261,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad AChS. Agencia Valparaíso','alias'=>'Policlínico de la Asociación Chilena de Seguridad AChS. Agencia Valparaíso','type'=>8,'code_deis' =>106262,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Valparaíso','alias'=>'Centro Médico y Dental Megasalud Valparaíso','type'=>17,'code_deis' =>106263,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Placeres','alias'=>'Centro de Salud Familiar Placeres','type'=>11,'code_deis' =>106300,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Esperanza','alias'=>'Centro de Salud Familiar Esperanza','type'=>11,'code_deis' =>106301,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Barón','alias'=>'Centro de Salud Familiar Barón','type'=>11,'code_deis' =>106302,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Reina Isabel II','alias'=>'Centro de Salud Familiar Reina Isabel II','type'=>11,'code_deis' =>106303,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Placilla','alias'=>'Centro de Salud Familiar Placilla','type'=>11,'code_deis' =>106304,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Jean y Marie Thierry','alias'=>'Centro de Salud Familiar Jean y Marie Thierry','type'=>11,'code_deis' =>106305,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Las Cañas','alias'=>'Centro de Salud Familiar Las Cañas','type'=>11,'code_deis' =>106306,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Marcelo Mena','alias'=>'Centro de Salud Familiar Marcelo Mena','type'=>11,'code_deis' =>106307,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Plaza Justicia','alias'=>'Centro de Salud Familiar Plaza Justicia','type'=>11,'code_deis' =>106308,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Cordillera','alias'=>'Centro de Salud Familiar Cordillera','type'=>11,'code_deis' =>106309,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quebrada Verde','alias'=>'Centro de Salud Familiar Quebrada Verde','type'=>11,'code_deis' =>106311,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Puertas Negras','alias'=>'Centro de Salud Familiar Puertas Negras','type'=>11,'code_deis' =>106312,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Antonio','alias'=>'Centro de Salud Familiar San Antonio','type'=>11,'code_deis' =>106314,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Barrancas','alias'=>'Centro de Salud Familiar Barrancas','type'=>11,'code_deis' =>106319,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cartagena','alias'=>'Centro de Salud Familiar Cartagena','type'=>11,'code_deis' =>106326,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Algarrobo','alias'=>'Centro de Salud Familiar Algarrobo','type'=>12,'code_deis' =>106327,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar El Quisco','alias'=>'Centro de Salud Familiar El Quisco','type'=>12,'code_deis' =>106328,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Néstor Fernández Thomas','alias'=>'Centro de Salud Familiar Néstor Fernández Thomas','type'=>11,'code_deis' =>106329,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San José de Rodelillo','alias'=>'Centro de Salud Familiar San José de Rodelillo','type'=>11,'code_deis' =>106330,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar 30 de Marzo','alias'=>'Centro de Salud Familiar 30 de Marzo','type'=>11,'code_deis' =>106333,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Padre Damián Molokai','alias'=>'Centro de Salud Familiar Padre Damián Molokai','type'=>11,'code_deis' =>106334,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio Policlínica Diocesana','alias'=>'Consultorio Policlínica Diocesana','type'=>11,'code_deis' =>106335,'service' =>11,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Salud Familiar Diputado Manuel Bustos Huerta','alias'=>'Centro de Salud Familiar Diputado Manuel Bustos Huerta','type'=>11,'code_deis' =>106336,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Rocas de Santo Domingo','alias'=>'Centro de Salud Familiar Rocas de Santo Domingo','type'=>12,'code_deis' =>106337,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar El Tabo','alias'=>'Centro de Salud Familiar El Tabo','type'=>12,'code_deis' =>106338,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Fernández','alias'=>'Centro de Salud Familiar Juan Fernández','type'=>12,'code_deis' =>106400,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Laguna Verde','alias'=>'Posta de Salud Rural Laguna Verde','type'=>13,'code_deis' =>106401,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quintay','alias'=>'Posta de Salud Rural Quintay','type'=>13,'code_deis' =>106402,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Dichas','alias'=>'Posta de Salud Rural Las Dichas','type'=>13,'code_deis' =>106403,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Maitenes','alias'=>'Posta de Salud Rural Los Maitenes','type'=>13,'code_deis' =>106404,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lagunillas','alias'=>'Posta de Salud Rural Lagunillas','type'=>13,'code_deis' =>106405,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lo Zárate','alias'=>'Posta de Salud Rural Lo Zárate','type'=>13,'code_deis' =>106406,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Bucalemu (Santo Domingo)','alias'=>'Posta de Salud Rural Bucalemu (Santo Domingo)','type'=>13,'code_deis' =>106407,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lo Abarca','alias'=>'Posta de Salud Rural Lo Abarca','type'=>13,'code_deis' =>106408,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar San Sebastian','alias'=>'Centro Comunitario de Salud Familiar San Sebastian','type'=>16,'code_deis' =>106409,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Yeco','alias'=>'Posta de Salud Rural El Yeco','type'=>13,'code_deis' =>106410,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San José (Algarrobo)','alias'=>'Posta de Salud Rural San José (Algarrobo)','type'=>13,'code_deis' =>106411,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Convento','alias'=>'Posta de Salud Rural El Convento','type'=>13,'code_deis' =>106413,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Enrique','alias'=>'Posta de Salud Rural San Enrique','type'=>13,'code_deis' =>106414,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Cruces (El Tabo)','alias'=>'Posta de Salud Rural Las Cruces (El Tabo)','type'=>13,'code_deis' =>106416,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Asilo','alias'=>'Posta de Salud Rural El Asilo','type'=>13,'code_deis' =>106417,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cuncumén (San Antonio)','alias'=>'Posta de Salud Rural Cuncumén (San Antonio)','type'=>13,'code_deis' =>106418,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Juan de San Antonio','alias'=>'Posta de Salud Rural San Juan de San Antonio','type'=>13,'code_deis' =>106419,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Leyda','alias'=>'Posta de Salud Rural Leyda','type'=>13,'code_deis' =>106420,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Turco','alias'=>'Posta de Salud Rural El Turco','type'=>13,'code_deis' =>106421,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lo Gallardo','alias'=>'Posta de Salud Rural Lo Gallardo','type'=>13,'code_deis' =>106422,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Porvenir Bajo','alias'=>'Centro Comunitario de Salud Familiar Porvenir Bajo','type'=>16,'code_deis' =>106711,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Isla Negra','alias'=>'Centro Comunitario de Salud Familiar Isla Negra','type'=>16,'code_deis' =>106728,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Tejas Verdes','alias'=>'Centro Comunitario de Salud Familiar Tejas Verdes','type'=>16,'code_deis' =>106729,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Manuel Bustos Huerta','alias'=>'Centro Comunitario de Salud Familiar Manuel Bustos Huerta','type'=>16,'code_deis' =>106736,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Placeres','alias'=>'SAPU Placeres','type'=>20,'code_deis' =>106800,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Placilla','alias'=>'SAPU Placilla','type'=>20,'code_deis' =>106804,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Quebrada Verde','alias'=>'SAPU Quebrada Verde','type'=>20,'code_deis' =>106811,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Cartagena','alias'=>'SAPU Cartagena','type'=>20,'code_deis' =>106826,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Algarrobo','alias'=>'SAPU Algarrobo','type'=>20,'code_deis' =>106827,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Néstor Fernández Thomas','alias'=>'SAPU Néstor Fernández Thomas','type'=>20,'code_deis' =>106829,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Viña del Mar','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Viña del Mar','type'=>1,'code_deis' =>107010,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Viña del Mar Quillota)','alias'=>'PRAIS (S.S Viña del Mar Quillota)','type'=>2,'code_deis' =>107011,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. PW4102 (Viña del Mar )','alias'=>'Clínica Dental Móvil Triple. Pat. PW4102 (Viña del Mar )','type'=>3,'code_deis' =>107012,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Gustavo Fricke (Viña del Mar)','alias'=>'Hospital Dr. Gustavo Fricke (Viña del Mar)','type'=>5,'code_deis' =>107100,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Martín (Quillota)','alias'=>'Hospital San Martín (Quillota)','type'=>5,'code_deis' =>107101,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Quilpué','alias'=>'Hospital de Quilpué','type'=>5,'code_deis' =>107102,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Mario Sánchez Vergara (La Calera)','alias'=>'Hospital Dr. Mario Sánchez Vergara (La Calera)','type'=>22,'code_deis' =>107103,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Santo Tomás (Limache)','alias'=>'Hospital Santo Tomás (Limache)','type'=>22,'code_deis' =>107104,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Agustín (La Ligua)','alias'=>'Hospital San Agustín (La Ligua)','type'=>22,'code_deis' =>107105,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Víctor Hugo Moll (Cabildo)','alias'=>'Hospital Dr. Víctor Hugo Moll (Cabildo)','type'=>22,'code_deis' =>107106,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Petorca','alias'=>'Hospital de Petorca','type'=>22,'code_deis' =>107107,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Adriana Cousiño (Quintero)','alias'=>'Hospital Adriana Cousiño (Quintero)','type'=>22,'code_deis' =>107108,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Juana Ross de Edwards (Peñablanca, Villa Alemana)','alias'=>'Hospital Juana Ross de Edwards (Peñablanca, Villa Alemana)','type'=>22,'code_deis' =>107109,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Centro Geriátrico Paz de la Tarde (Limache)','alias'=>'Hospital Centro Geriátrico Paz de la Tarde (Limache)','type'=>22,'code_deis' =>107110,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Miraflores','alias'=>'Clínica Miraflores','type'=>6,'code_deis' =>107200,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Reñaca','alias'=>'Clínica Reñaca','type'=>6,'code_deis' =>107206,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Los Carrera','alias'=>'Clínica Los Carrera','type'=>6,'code_deis' =>107208,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Sanatorio Marítimo San Juan de Dios','alias'=>'Sanatorio Marítimo San Juan de Dios','type'=>7,'code_deis' =>107210,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Instituto de Seguridad del Trabajo','alias'=>'Instituto de Seguridad del Trabajo','type'=>6,'code_deis' =>107211,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Niños y Cunas','alias'=>'Hospital Niños y Cunas','type'=>7,'code_deis' =>107212,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Naval Almirante Neff','alias'=>'Hospital Naval Almirante Neff','type'=>7,'code_deis' =>107217,'service' =>12,'dependency' =>5]);
Organization::Create(['name' => 'Clínica Los Leones','alias'=>'Clínica Los Leones','type'=>6,'code_deis' =>107222,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Ciudad del Mar (ex Avansalud)','alias'=>'Clínica Ciudad del Mar (ex Avansalud)','type'=>6,'code_deis' =>107223,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Clínico Viña del Mar','alias'=>'Hospital Clínico Viña del Mar','type'=>7,'code_deis' =>107224,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Megasalud S.A. Centro Médico y Dental Viña del Mar','alias'=>'Megasalud S.A. Centro Médico y Dental Viña del Mar','type'=>17,'code_deis' =>107255,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Viña del Mar','alias'=>'Centro de Salud Mutual CChC Viña del Mar','type'=>8,'code_deis' =>107256,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Megasalud S.A. Centro Médico y Dental Quilpué','alias'=>'Megasalud S.A. Centro Médico y Dental Quilpué','type'=>17,'code_deis' =>107258,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Carabineros V Zona de Valparaíso','alias'=>'Centro Médico y Dental Carabineros V Zona de Valparaíso','type'=>17,'code_deis' =>107261,'service' =>12,'dependency' =>5]);
Organization::Create(['name' => 'Centro de Atención Primaria de Salud Naval (Viña del Mar)','alias'=>'Centro de Atención Primaria de Salud Naval (Viña del Mar)','type'=>8,'code_deis' =>107262,'service' =>12,'dependency' =>5]);
Organization::Create(['name' => 'Centro de Atención Primaria de Salud Naval (Villa Alemana)','alias'=>'Centro de Atención Primaria de Salud Naval (Villa Alemana)','type'=>8,'code_deis' =>107263,'service' =>12,'dependency' =>5]);
Organization::Create(['name' => 'MAS Salud Limitada','alias'=>'MAS Salud Limitada','type'=>8,'code_deis' =>107264,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Vida Integra','alias'=>'Laboratorio Clínico Vida Integra','type'=>10,'code_deis' =>107265,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad AChS. Agencia Viña del Mar','alias'=>'Policlínico de la Asociación Chilena de Seguridad AChS. Agencia Viña del Mar','type'=>8,'code_deis' =>107266,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Rehabilitación Limache Capredena','alias'=>'Centro de Rehabilitación Limache Capredena','type'=>8,'code_deis' =>107267,'service' =>12,'dependency' =>5]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad AChS Agencia La Ligua','alias'=>'Policlínico de la Asociación Chilena de Seguridad AChS Agencia La Ligua','type'=>8,'code_deis' =>107268,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad AChS Agencia Cabildo','alias'=>'Policlínico de la Asociación Chilena de Seguridad AChS Agencia Cabildo','type'=>8,'code_deis' =>107269,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Internacional Inmunyzan','alias'=>'Vacunatorio Internacional Inmunyzan','type'=>27,'code_deis' =>107270,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Nueva Aurora','alias'=>'Centro de Salud Familiar Nueva Aurora','type'=>11,'code_deis' =>107300,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Profesor Eugenio Cienfuegos','alias'=>'Centro de Salud Familiar Profesor Eugenio Cienfuegos','type'=>11,'code_deis' =>107301,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Miraflores','alias'=>'Centro de Salud Familiar Miraflores','type'=>11,'code_deis' =>107302,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Gómez Carreño','alias'=>'Centro de Salud Familiar Gómez Carreño','type'=>11,'code_deis' =>107303,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Marco Maldonado','alias'=>'Centro de Salud Familiar Marco Maldonado','type'=>11,'code_deis' =>107304,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Concón','alias'=>'Centro de Salud Familiar Concón','type'=>11,'code_deis' =>107305,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quilpué','alias'=>'Centro de Salud Familiar Quilpué','type'=>11,'code_deis' =>107307,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar El Belloto','alias'=>'Centro de Salud Familiar El Belloto','type'=>11,'code_deis' =>107308,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Villa Alemana','alias'=>'Centro de Salud Familiar Villa Alemana','type'=>11,'code_deis' =>107309,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Miguel Concha','alias'=>'Centro de Salud Familiar Dr. Miguel Concha','type'=>11,'code_deis' =>107311,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cardenal Raúl Silva Henríquez','alias'=>'Centro de Salud Familiar Cardenal Raúl Silva Henríquez','type'=>11,'code_deis' =>107312,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Cruz','alias'=>'Centro de Salud Familiar La Cruz','type'=>11,'code_deis' =>107313,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lusitania','alias'=>'Centro de Salud Familiar Lusitania','type'=>11,'code_deis' =>107314,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Ventanas','alias'=>'Centro de Salud Familiar Ventanas','type'=>12,'code_deis' =>107315,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Puchuncaví','alias'=>'Centro de Salud Familiar Puchuncaví','type'=>12,'code_deis' =>107316,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Manuel Lucero','alias'=>'Centro de Salud Familiar Manuel Lucero','type'=>12,'code_deis' =>107317,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Boco','alias'=>'Centro de Salud Familiar Boco','type'=>12,'code_deis' =>107318,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Pedro','alias'=>'Centro de Salud Familiar San Pedro','type'=>12,'code_deis' =>107319,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Palma','alias'=>'Centro de Salud Familiar La Palma','type'=>12,'code_deis' =>107320,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Artificio','alias'=>'Centro de Salud Familiar Artificio','type'=>12,'code_deis' =>107321,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Hijuelas','alias'=>'Centro de Salud Familiar Hijuelas','type'=>12,'code_deis' =>107322,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Nogales','alias'=>'Centro de Salud Familiar Nogales','type'=>12,'code_deis' =>107323,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar UE Rosa Sanchez G. El Melón','alias'=>'Centro de Salud Familiar UE Rosa Sanchez G. El Melón','type'=>12,'code_deis' =>107324,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Juan Carlos Baeza','alias'=>'Centro de Salud Familiar Dr. Juan Carlos Baeza','type'=>11,'code_deis' =>107325,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Brígida Zavala','alias'=>'Centro de Salud Familiar Brígida Zavala','type'=>11,'code_deis' =>107326,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Las Torres','alias'=>'Centro de Salud Familiar Las Torres','type'=>11,'code_deis' =>107327,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Eduardo Frei Montalva','alias'=>'Centro de Salud Familiar Eduardo Frei Montalva','type'=>11,'code_deis' =>107328,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Chincolco','alias'=>'Centro de Salud Familiar Chincolco','type'=>12,'code_deis' =>107329,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio Modulo Odontológico Simón Bolívar','alias'=>'Consultorio Modulo Odontológico Simón Bolívar','type'=>11,'code_deis' =>107350,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Bautista Bravo Vega','alias'=>'Centro de Salud Familiar Juan Bautista Bravo Vega','type'=>11,'code_deis' =>107351,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Reñaca Alto Dr. Jorge Kaplan','alias'=>'Centro de Salud Familiar Reñaca Alto Dr. Jorge Kaplan','type'=>11,'code_deis' =>107352,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Alcalde Iván Manríquez','alias'=>'Centro de Salud Familiar Alcalde Iván Manríquez','type'=>11,'code_deis' =>107353,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Papudo','alias'=>'Centro de Salud Familiar Papudo','type'=>12,'code_deis' =>107354,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Johow Zapallar','alias'=>'Centro de Salud Familiar Dr. Johow Zapallar','type'=>12,'code_deis' =>107355,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Aviador Acevedo','alias'=>'Centro de Salud Familiar Aviador Acevedo','type'=>11,'code_deis' =>107356,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pompeya','alias'=>'Centro de Salud Familiar Pompeya','type'=>11,'code_deis' =>107357,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Colliguay','alias'=>'Posta de Salud Rural Colliguay','type'=>13,'code_deis' =>107400,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quebrada Alvarado','alias'=>'Posta de Salud Rural Quebrada Alvarado','type'=>13,'code_deis' =>107401,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Romeral','alias'=>'Posta de Salud Rural Romeral','type'=>13,'code_deis' =>107402,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Villa Prat','alias'=>'Posta de Salud Rural Villa Prat','type'=>13,'code_deis' =>107403,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Marta','alias'=>'Posta de Salud Rural Santa Marta','type'=>13,'code_deis' =>107404,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pueblo de Varas','alias'=>'Posta de Salud Rural Pueblo de Varas','type'=>13,'code_deis' =>107405,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pueblo de Roco','alias'=>'Posta de Salud Rural Pueblo de Roco','type'=>13,'code_deis' =>107406,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Trapiche','alias'=>'Posta de Salud Rural Trapiche','type'=>13,'code_deis' =>107407,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Parcelas','alias'=>'Posta de Salud Rural Las Parcelas','type'=>13,'code_deis' =>107408,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huaquén (La Ligua)','alias'=>'Posta de Salud Rural Huaquén (La Ligua)','type'=>13,'code_deis' =>107409,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Molles','alias'=>'Posta de Salud Rural Los Molles','type'=>13,'code_deis' =>107410,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pullally','alias'=>'Posta de Salud Rural Pullally','type'=>13,'code_deis' =>107412,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Catapilco','alias'=>'Posta de Salud Rural Catapilco','type'=>13,'code_deis' =>107414,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alicahue','alias'=>'Posta de Salud Rural Alicahue','type'=>13,'code_deis' =>107415,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Artificio (Cabildo)','alias'=>'Posta de Salud Rural Artificio (Cabildo)','type'=>13,'code_deis' =>107416,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Viña','alias'=>'Posta de Salud Rural La Viña','type'=>13,'code_deis' =>107417,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Hierro Viejo','alias'=>'Posta de Salud Rural Hierro Viejo','type'=>13,'code_deis' =>107419,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pichicuy','alias'=>'Posta de Salud Rural Pichicuy','type'=>13,'code_deis' =>107421,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Maitencillo (Puchuncaví)','alias'=>'Posta de Salud Rural Maitencillo (Puchuncaví)','type'=>13,'code_deis' =>107422,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Horcón','alias'=>'Posta de Salud Rural Horcón','type'=>13,'code_deis' =>107425,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Vega (Olmué)','alias'=>'Posta de Salud Rural La Vega (Olmué)','type'=>13,'code_deis' =>107426,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Palmas','alias'=>'Posta de Salud Rural Las Palmas','type'=>13,'code_deis' =>107427,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pachacamita','alias'=>'Posta de Salud Rural Pachacamita','type'=>13,'code_deis' =>107428,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Canela','alias'=>'Posta de Salud Rural La Canela','type'=>13,'code_deis' =>107429,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Manzanar','alias'=>'Posta de Salud Rural Manzanar','type'=>13,'code_deis' =>107430,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Puertas','alias'=>'Posta de Salud Rural Las Puertas','type'=>13,'code_deis' =>107431,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pachacama','alias'=>'Posta de Salud Rural Pachacama','type'=>13,'code_deis' =>107433,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Loncura','alias'=>'Posta de Salud Rural Loncura','type'=>13,'code_deis' =>107434,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Manuel Rodríguez','alias'=>'Posta de Salud Rural Manuel Rodríguez','type'=>13,'code_deis' =>107435,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'COSAM y Psiquiatría Comunitaria Concón','alias'=>'COSAM y Psiquiatría Comunitaria Concón','type'=>14,'code_deis' =>107600,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Limache','alias'=>'COSAM Limache','type'=>14,'code_deis' =>107601,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Achupallas "Sergio Donoso"','alias'=>'Centro Comunitario de Salud Familiar Achupallas "Sergio Donoso"','type'=>16,'code_deis' =>107702,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Santa Julia','alias'=>'Centro Comunitario de Salud Familiar Santa Julia','type'=>16,'code_deis' =>107703,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Cardenal Raúl Silva Henríquez "Cerro Macaya"','alias'=>'Centro Comunitario de Salud Familiar Cardenal Raúl Silva Henríquez "Cerro Macaya"','type'=>16,'code_deis' =>107712,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Ex Asentamiento El Melón','alias'=>'Centro Comunitario de Salud Familiar Ex Asentamiento El Melón','type'=>16,'code_deis' =>107713,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Patricia Guerra','alias'=>'Centro Comunitario de Salud Familiar Patricia Guerra','type'=>16,'code_deis' =>107721,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa Hermosa','alias'=>'Centro Comunitario de Salud Familiar Villa Hermosa','type'=>16,'code_deis' =>107725,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Las Palmas','alias'=>'Centro Comunitario de Salud Familiar Las Palmas','type'=>16,'code_deis' =>107727,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Pedegua','alias'=>'Centro Comunitario de Salud Familiar Pedegua','type'=>16,'code_deis' =>107729,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Retiro','alias'=>'Centro Comunitario de Salud Familiar El Retiro','type'=>16,'code_deis' =>107756,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Santa Teresita','alias'=>'Centro Comunitario de Salud Familiar Santa Teresita','type'=>16,'code_deis' =>107758,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Nueva Aurora','alias'=>'SAPU Nueva Aurora','type'=>20,'code_deis' =>107800,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Miraflores (Viña del Mar)','alias'=>'SAPU Miraflores (Viña del Mar)','type'=>20,'code_deis' =>107802,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAR Concón','alias'=>'SAR Concón','type'=>20,'code_deis' =>107805,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU El Belloto Sur','alias'=>'SAPU El Belloto Sur','type'=>20,'code_deis' =>107808,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Ventanas','alias'=>'SAPU Ventanas','type'=>20,'code_deis' =>107815,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Artificio','alias'=>'SAPU Artificio','type'=>20,'code_deis' =>107821,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Eduardo Frei Montalva','alias'=>'SAPU Eduardo Frei Montalva','type'=>20,'code_deis' =>107828,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Aconcagua)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Aconcagua)','type'=>1,'code_deis' =>108010,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Aconcagua)','alias'=>'PRAIS (S.S Aconcagua)','type'=>2,'code_deis' =>108011,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'Oficina Sanitaria Los Libertadores','alias'=>'Oficina Sanitaria Los Libertadores','type'=>4,'code_deis' =>108090,'service' =>14,'dependency' =>2]);
Organization::Create(['name' => 'Hospital San Camilo de San Felipe','alias'=>'Hospital San Camilo de San Felipe','type'=>5,'code_deis' =>108100,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Juan de Dios (Los Andes)','alias'=>'Hospital San Juan de Dios (Los Andes)','type'=>5,'code_deis' =>108101,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Francisco (Llaillay)','alias'=>'Hospital San Francisco (Llaillay)','type'=>22,'code_deis' =>108102,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Antonio (Putaendo)','alias'=>'Hospital San Antonio (Putaendo)','type'=>22,'code_deis' =>108104,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Psiquiátrico Dr. Philippe Pinel (Putaendo)','alias'=>'Hospital Psiquiátrico Dr. Philippe Pinel (Putaendo)','type'=>23,'code_deis' =>108105,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Río Blanco','alias'=>'Clínica Río Blanco','type'=>6,'code_deis' =>108204,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'ENFAS Limitada','alias'=>'ENFAS Limitada','type'=>8,'code_deis' =>108205,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Zona V de Valparaíso','alias'=>'Centro Médico y Dental Zona V de Valparaíso','type'=>17,'code_deis' =>108206,'service' =>12,'dependency' =>5]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad AChS Agencia San Felipe','alias'=>'Policlínico de la Asociación Chilena de Seguridad AChS Agencia San Felipe','type'=>8,'code_deis' =>108207,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad AChS Agencia Los Andes','alias'=>'Policlínico de la Asociación Chilena de Seguridad AChS Agencia Los Andes','type'=>8,'code_deis' =>108208,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Llaillay','alias'=>'Centro de Salud Familiar Llaillay','type'=>11,'code_deis' =>108300,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Rinconada','alias'=>'Centro de Salud Familiar Rinconada','type'=>12,'code_deis' =>108301,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Esteban','alias'=>'Centro de Salud Familiar San Esteban','type'=>12,'code_deis' =>108302,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Eduardo Raggio Lanata','alias'=>'Centro de Salud Familiar Dr. Eduardo Raggio Lanata','type'=>12,'code_deis' =>108303,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Valle de Los Libertadores','alias'=>'Centro de Salud Familiar Valle de Los Libertadores','type'=>12,'code_deis' =>108304,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Felipe El Real','alias'=>'Centro de Salud Familiar San Felipe El Real','type'=>11,'code_deis' =>108305,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Cordillera Andina','alias'=>'Centro de Salud Familiar Cordillera Andina','type'=>12,'code_deis' =>108306,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Centenario','alias'=>'Centro de Salud Familiar Centenario','type'=>12,'code_deis' =>108307,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar José Joaquín Aguirre','alias'=>'Centro de Salud Familiar José Joaquín Aguirre','type'=>12,'code_deis' =>108308,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa María Dr. Jorge Ahumada Lemus','alias'=>'Centro de Salud Familiar Santa María Dr. Jorge Ahumada Lemus','type'=>12,'code_deis' =>108309,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Curimón','alias'=>'Centro de Salud Familiar Curimón','type'=>12,'code_deis' =>108310,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar María Elena Peñaloza Morales','alias'=>'Centro de Salud Familiar María Elena Peñaloza Morales','type'=>12,'code_deis' =>108311,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Segismundo Iturra Taito','alias'=>'Centro de Salud Familiar Dr. Segismundo Iturra Taito','type'=>12,'code_deis' =>108312,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cariño Botado','alias'=>'Posta de Salud Rural Cariño Botado','type'=>13,'code_deis' =>108401,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Campos de Ahumada','alias'=>'Posta de Salud Rural Campos de Ahumada','type'=>13,'code_deis' =>108402,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Río Colorado','alias'=>'Posta de Salud Rural Río Colorado','type'=>13,'code_deis' =>108403,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Río Blanco (Los Andes)','alias'=>'Posta de Salud Rural Río Blanco (Los Andes)','type'=>13,'code_deis' =>108404,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Vicente (Calle Larga)','alias'=>'Posta de Salud Rural San Vicente (Calle Larga)','type'=>13,'code_deis' =>108405,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Piguchén (Putaendo)','alias'=>'Posta de Salud Rural Piguchén (Putaendo)','type'=>13,'code_deis' =>108406,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Guzmanes','alias'=>'Posta de Salud Rural Guzmanes','type'=>13,'code_deis' =>108407,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Filomena (Santa María)','alias'=>'Posta de Salud Rural Santa Filomena (Santa María)','type'=>13,'code_deis' =>108409,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Orilla (Putaendo)','alias'=>'Posta de Salud Rural La Orilla (Putaendo)','type'=>13,'code_deis' =>108410,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quebrada de Herrera','alias'=>'Posta de Salud Rural Quebrada de Herrera','type'=>13,'code_deis' =>108411,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Lo Calvo','alias'=>'Centro Comunitario de Salud Familiar Lo Calvo','type'=>16,'code_deis' =>108700,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Cerrillos','alias'=>'Centro Comunitario de Salud Familiar Los Cerrillos','type'=>16,'code_deis' =>108703,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Juan Pablo Segundo','alias'=>'Centro Comunitario de Salud Familiar Juan Pablo Segundo','type'=>16,'code_deis' =>108707,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Las Cadenas','alias'=>'Centro Comunitario de Salud Familiar Las Cadenas','type'=>16,'code_deis' =>108709,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Quebrada Herrera','alias'=>'Centro Comunitario de Salud Familiar Quebrada Herrera','type'=>16,'code_deis' =>108712,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'SAPU San Felipe','alias'=>'SAPU San Felipe','type'=>20,'code_deis' =>108811,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Norte)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Norte)','type'=>1,'code_deis' =>109010,'service' =>15,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (SS Metropolitano Norte)','alias'=>'PRAIS (SS Metropolitano Norte)','type'=>2,'code_deis' =>109011,'service' =>15,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Simple. Pat. PW4082 (TilTil)','alias'=>'Clínica Dental Móvil Simple. Pat. PW4082 (TilTil)','type'=>3,'code_deis' =>109012,'service' =>15,'dependency' =>1]);
Organization::Create(['name' => 'Complejo Hospitalario San José (Santiago, Independencia)','alias'=>'Complejo Hospitalario San José (Santiago, Independencia)','type'=>5,'code_deis' =>109100,'service' =>15,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Clínico de Niños Dr. Roberto del Río (Santiago, Independencia)','alias'=>'Hospital Clínico de Niños Dr. Roberto del Río (Santiago, Independencia)','type'=>5,'code_deis' =>109101,'service' =>15,'dependency' =>1]);
Organization::Create(['name' => 'Instituto Psiquiátrico Dr. José Horwitz Barak (Santiago, Recoleta)','alias'=>'Instituto Psiquiátrico Dr. José Horwitz Barak (Santiago, Recoleta)','type'=>5,'code_deis' =>109102,'service' =>15,'dependency' =>1]);
Organization::Create(['name' => 'Instituto Nacional del Cáncer Dr. Caupolicán Pardo Correa (Santiago, Recoleta)','alias'=>'Instituto Nacional del Cáncer Dr. Caupolicán Pardo Correa (Santiago, Recoleta)','type'=>5,'code_deis' =>109103,'service' =>15,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Til Til','alias'=>'Hospital de Til Til','type'=>22,'code_deis' =>109104,'service' =>15,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Clínico Universidad de Chile','alias'=>'Hospital Clínico Universidad de Chile','type'=>7,'code_deis' =>109200,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Clínica Dávila','alias'=>'Clínica Dávila','type'=>6,'code_deis' =>109201,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Integramédica Norte','alias'=>'Centro Integramédica Norte','type'=>8,'code_deis' =>109202,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Quilicura','alias'=>'Centro de Salud Mutual CChC Quilicura','type'=>8,'code_deis' =>109204,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Vida Integra Quilicura','alias'=>'Centro Vida Integra Quilicura','type'=>8,'code_deis' =>109205,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Colina','alias'=>'Centro Asistencial AChS Colina','type'=>8,'code_deis' =>109206,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico del Trabajador AChS Parque Las Américas','alias'=>'Policlínico del Trabajador AChS Parque Las Américas','type'=>8,'code_deis' =>109207,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Quilicura','alias'=>'Centro Asistencial AChS Quilicura','type'=>8,'code_deis' =>109208,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Vespucio Oeste','alias'=>'Centro Asistencial AChS Vespucio Oeste','type'=>8,'code_deis' =>109209,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Astra Independencia','alias'=>'Clínica Astra Independencia','type'=>6,'code_deis' =>109210,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Conchalí','alias'=>'Centro Médico y Dental Megasalud Conchalí','type'=>17,'code_deis' =>109211,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Vivaceta','alias'=>'Centro Médico Vivaceta','type'=>8,'code_deis' =>109212,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Quilicura','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Quilicura','type'=>8,'code_deis' =>109213,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Agustín Cruz Melo','alias'=>'Centro de Salud Familiar Agustín Cruz Melo','type'=>12,'code_deis' =>109300,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Recoleta','alias'=>'Centro de Salud Familiar Recoleta','type'=>12,'code_deis' =>109301,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lucas Sierra','alias'=>'Centro de Salud Familiar Lucas Sierra','type'=>12,'code_deis' =>109302,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quinta Bella','alias'=>'Centro de Salud Familiar Quinta Bella','type'=>12,'code_deis' =>109303,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Valdivieso','alias'=>'Centro de Salud Familiar Valdivieso','type'=>12,'code_deis' =>109304,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Pincoya','alias'=>'Centro de Salud Familiar La Pincoya','type'=>12,'code_deis' =>109305,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Juan Petrinovic (Ex Scroggie)','alias'=>'Centro de Salud Familiar Dr. Juan Petrinovic (Ex Scroggie)','type'=>12,'code_deis' =>109307,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Alberto Bachelet Martínez','alias'=>'Centro de Salud Familiar Alberto Bachelet Martínez','type'=>12,'code_deis' =>109308,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar José Symon Ojeda','alias'=>'Centro de Salud Familiar José Symon Ojeda','type'=>12,'code_deis' =>109309,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Colina','alias'=>'Centro de Salud Familiar Colina','type'=>12,'code_deis' =>109310,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar José Bauza Frau','alias'=>'Centro de Salud Familiar José Bauza Frau','type'=>12,'code_deis' =>109311,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Batuco','alias'=>'Centro de Salud Familiar Batuco','type'=>12,'code_deis' =>109312,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Irene Frei de Cid','alias'=>'Centro de Salud Familiar Irene Frei de Cid','type'=>12,'code_deis' =>109313,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juanita Aguirre','alias'=>'Centro de Salud Familiar Juanita Aguirre','type'=>12,'code_deis' =>109314,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Manuel Bustos Huerta','alias'=>'Centro de Salud Familiar Manuel Bustos Huerta','type'=>12,'code_deis' =>109315,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Esmeralda','alias'=>'Centro de Salud Familiar Esmeralda','type'=>12,'code_deis' =>109316,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar El Barrero','alias'=>'Centro de Salud Familiar El Barrero','type'=>12,'code_deis' =>109317,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Huertos Familiares','alias'=>'Centro de Salud Familiar Huertos Familiares','type'=>12,'code_deis' =>109320,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Antonio Ríos','alias'=>'Centro de Salud Familiar Juan Antonio Ríos','type'=>12,'code_deis' =>109321,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Salvador Allende Gossens','alias'=>'Centro de Salud Familiar Dr. Salvador Allende Gossens','type'=>12,'code_deis' =>109323,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Presidente Salvador Allende Gossens','alias'=>'Centro de Salud Familiar Presidente Salvador Allende Gossens','type'=>12,'code_deis' =>109324,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cristo Vive (ONG)','alias'=>'Centro de Salud Familiar Cristo Vive (ONG)','type'=>12,'code_deis' =>109390,'service' =>15,'dependency' =>4]);
Organization::Create(['name' => 'Posta de Salud Rural Juan Pablo II de Lampa','alias'=>'Posta de Salud Rural Juan Pablo II de Lampa','type'=>13,'code_deis' =>109407,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Capilla de Caleu','alias'=>'Posta de Salud Rural La Capilla de Caleu','type'=>13,'code_deis' =>109410,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Montenegro','alias'=>'Posta de Salud Rural Montenegro','type'=>13,'code_deis' =>109412,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rungue','alias'=>'Posta de Salud Rural Rungue','type'=>13,'code_deis' =>109413,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Polpaico','alias'=>'Posta de Salud Rural Polpaico','type'=>13,'code_deis' =>109414,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Colorado','alias'=>'Posta de Salud Rural Colorado','type'=>13,'code_deis' =>109416,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Ingleses','alias'=>'Posta de Salud Rural Los Ingleses','type'=>13,'code_deis' =>109417,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Canteras','alias'=>'Posta de Salud Rural Las Canteras','type'=>13,'code_deis' =>109418,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Marta de Liray','alias'=>'Posta de Salud Rural Santa Marta de Liray','type'=>13,'code_deis' =>109419,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chacabuco (Colina)','alias'=>'Posta de Salud Rural Chacabuco (Colina)','type'=>13,'code_deis' =>109420,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Independencia','alias'=>'COSAM Independencia','type'=>14,'code_deis' =>109606,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Conchalí','alias'=>'COSAM Conchalí','type'=>14,'code_deis' =>109607,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Huechuraba','alias'=>'COSAM Huechuraba','type'=>14,'code_deis' =>109608,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Recoleta','alias'=>'COSAM Recoleta','type'=>14,'code_deis' =>109609,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Quilicura','alias'=>'COSAM Quilicura','type'=>14,'code_deis' =>109636,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Colina','alias'=>'COSAM Colina','type'=>14,'code_deis' =>109640,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Lampa','alias'=>'COSAM Lampa','type'=>14,'code_deis' =>109641,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Til Til','alias'=>'COSAM Til Til','type'=>14,'code_deis' =>109642,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Dr. José Symón Ojeda','alias'=>'Centro Comunitario de Salud Familiar Dr. José Symón Ojeda','type'=>16,'code_deis' =>109709,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Sol de Septiembre','alias'=>'Centro Comunitario de Salud Familiar Sol de Septiembre','type'=>16,'code_deis' =>109711,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Batuco','alias'=>'Centro Comunitario de Salud Familiar Batuco','type'=>16,'code_deis' =>109712,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar La Foresta','alias'=>'Centro Comunitario de Salud Familiar La Foresta','type'=>16,'code_deis' =>109713,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Pucara de Lasana','alias'=>'Centro Comunitario de Salud Familiar Pucara de Lasana','type'=>16,'code_deis' =>109715,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Esmeralda','alias'=>'Centro Comunitario de Salud Familiar Esmeralda','type'=>16,'code_deis' =>109716,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Libertadores','alias'=>'Centro Comunitario de Salud Familiar Los Libertadores','type'=>16,'code_deis' =>109718,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAR Recoleta','alias'=>'SAR Recoleta','type'=>20,'code_deis' =>109801,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Lucas Sierra','alias'=>'SAPU Lucas Sierra','type'=>20,'code_deis' =>109802,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Valdivieso','alias'=>'SAPU Valdivieso','type'=>20,'code_deis' =>109804,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAR La Pincoya','alias'=>'SAR La Pincoya','type'=>20,'code_deis' =>109805,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Alberto Bachelet Martínez','alias'=>'SAPU Alberto Bachelet Martínez','type'=>20,'code_deis' =>109808,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAR Conchalí','alias'=>'SAR Conchalí','type'=>20,'code_deis' =>109809,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAR Colina','alias'=>'SAR Colina','type'=>20,'code_deis' =>109810,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAPU José Bauzá Frau','alias'=>'SAPU José Bauzá Frau','type'=>20,'code_deis' =>109811,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Nº 2 Irene Frei de Cid','alias'=>'SAPU Nº 2 Irene Frei de Cid','type'=>20,'code_deis' =>109813,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Nº 1 Rodrigo Rojas Denegri','alias'=>'SAPU Nº 1 Rodrigo Rojas Denegri','type'=>20,'code_deis' =>109815,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Juan Antonio Ríos','alias'=>'SAPU Juan Antonio Ríos','type'=>20,'code_deis' =>109821,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Presidente Salvador Allende Gossens','alias'=>'SAPU Presidente Salvador Allende Gossens','type'=>20,'code_deis' =>109824,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Cristo Vive','alias'=>'SAPU Cristo Vive','type'=>20,'code_deis' =>109890,'service' =>15,'dependency' =>4]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Occidente)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Occidente)','type'=>1,'code_deis' =>110010,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Metropolitano Occidente)','alias'=>'PRAIS (S.S Metropolitano Occidente)','type'=>2,'code_deis' =>110011,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Simple. Pat. PW4083 (Curacaví)','alias'=>'Clínica Dental Móvil Simple. Pat. PW4083 (Curacaví)','type'=>3,'code_deis' =>110012,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Juan de Dios (Santiago, Santiago)','alias'=>'Hospital San Juan de Dios (Santiago, Santiago)','type'=>5,'code_deis' =>110100,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Instituto Traumatológico Dr. Teodoro Gebauer','alias'=>'Instituto Traumatológico Dr. Teodoro Gebauer','type'=>5,'code_deis' =>110110,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Félix Bulnes Cerda (Santiago, Quinta Normal)','alias'=>'Hospital Dr. Félix Bulnes Cerda (Santiago, Quinta Normal)','type'=>5,'code_deis' =>110120,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Adalberto Steeger (Talagante)','alias'=>'Hospital Adalberto Steeger (Talagante)','type'=>23,'code_deis' =>110130,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Peñaflor','alias'=>'Hospital de Peñaflor','type'=>23,'code_deis' =>110140,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San José (Melipilla)','alias'=>'Hospital San José (Melipilla)','type'=>5,'code_deis' =>110150,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Curacaví','alias'=>'Hospital de Curacaví','type'=>22,'code_deis' =>110160,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Psiquiátrica Santa Cecilia','alias'=>'Clínica Psiquiátrica Santa Cecilia','type'=>6,'code_deis' =>110201,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Talagante','alias'=>'Centro de Salud Mutual CChC Talagante','type'=>8,'code_deis' =>110219,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica del Trabajador AChS','alias'=>'Clínica del Trabajador AChS','type'=>6,'code_deis' =>110268,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Los Maitenes','alias'=>'Clínica Los Maitenes','type'=>6,'code_deis' =>110270,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Melipilla','alias'=>'Centro de Salud Mutual CChC Melipilla','type'=>8,'code_deis' =>110271,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Fundación Gantz','alias'=>'Clínica Fundación Gantz','type'=>6,'code_deis' =>110272,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Pudahuel','alias'=>'Centro de Salud Mutual CChC Pudahuel','type'=>8,'code_deis' =>110273,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Fundación Vida Nueva (Clínica Psiquiátrica)','alias'=>'Fundación Vida Nueva (Clínica Psiquiátrica)','type'=>6,'code_deis' =>110276,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Peñaflor','alias'=>'Centro Asistencial AChS Peñaflor','type'=>8,'code_deis' =>110278,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Talagante','alias'=>'Centro Asistencial AChS Talagante','type'=>8,'code_deis' =>110279,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Servicio Médico Dental (S) Armada de Chile','alias'=>'Servicio Médico Dental (S) Armada de Chile','type'=>17,'code_deis' =>110280,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Centro de Oncología Preventiva de la Universidad de Chile','alias'=>'Centro de Oncología Preventiva de la Universidad de Chile','type'=>8,'code_deis' =>110281,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Referencia de Salud Salvador Allende','alias'=>'Centro de Referencia de Salud Salvador Allende','type'=>25,'code_deis' =>110300,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Peñaflor','alias'=>'Centro de Salud Familiar Peñaflor','type'=>12,'code_deis' =>110308,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Andes','alias'=>'Centro de Salud Familiar Andes','type'=>12,'code_deis' =>110310,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Anita','alias'=>'Centro de Salud Familiar Santa Anita','type'=>12,'code_deis' =>110315,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pablo Neruda','alias'=>'Centro de Salud Familiar Pablo Neruda','type'=>12,'code_deis' =>110316,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lo Franco','alias'=>'Centro de Salud Familiar Lo Franco','type'=>12,'code_deis' =>110320,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Garín','alias'=>'Centro de Salud Familiar Garín','type'=>12,'code_deis' =>110325,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Adalberto Steeger','alias'=>'Centro de Salud Familiar Dr. Adalberto Steeger','type'=>12,'code_deis' =>110330,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lo Amor','alias'=>'Centro de Salud Familiar Lo Amor','type'=>12,'code_deis' =>110331,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cerro Navia','alias'=>'Centro de Salud Familiar Cerro Navia','type'=>12,'code_deis' =>110335,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Raúl Yazigi','alias'=>'Centro de Salud Familiar Dr. Raúl Yazigi','type'=>12,'code_deis' =>110340,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Carlos Avendaño','alias'=>'Centro de Salud Familiar Dr. Carlos Avendaño','type'=>12,'code_deis' =>110345,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pudahuel Estrella','alias'=>'Centro de Salud Familiar Pudahuel Estrella','type'=>12,'code_deis' =>110350,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pudahuel Poniente','alias'=>'Centro de Salud Familiar Pudahuel Poniente','type'=>12,'code_deis' =>110351,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Gustavo Molina','alias'=>'Centro de Salud Familiar Dr. Gustavo Molina','type'=>12,'code_deis' =>110352,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cardenal Raúl Silva Henríquez','alias'=>'Centro de Salud Familiar Cardenal Raúl Silva Henríquez','type'=>12,'code_deis' =>110353,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Violeta Parra','alias'=>'Centro de Salud Familiar Violeta Parra','type'=>12,'code_deis' =>110354,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Arturo Albertz','alias'=>'Centro de Salud Familiar Dr. Arturo Albertz','type'=>12,'code_deis' =>110355,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Renca','alias'=>'Centro de Salud Familiar Renca','type'=>12,'code_deis' =>110360,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Bicentenario','alias'=>'Centro de Salud Familiar Bicentenario','type'=>12,'code_deis' =>110361,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Hernán Urzúa Merino','alias'=>'Centro de Salud Familiar Dr. Hernán Urzúa Merino','type'=>12,'code_deis' =>110362,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Huamachuco','alias'=>'Centro de Salud Familiar Huamachuco','type'=>12,'code_deis' =>110364,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Pablo II','alias'=>'Centro de Salud Familiar Juan Pablo II','type'=>12,'code_deis' =>110366,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Fernando Monckeberg','alias'=>'Centro de Salud Familiar Dr. Fernando Monckeberg','type'=>12,'code_deis' =>110369,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar El Monte','alias'=>'Centro de Salud Familiar El Monte','type'=>12,'code_deis' =>110370,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Isla de Maipo','alias'=>'Centro de Salud Familiar Isla de Maipo','type'=>12,'code_deis' =>110375,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Edelberto Elgueta','alias'=>'Centro de Salud Familiar Dr. Edelberto Elgueta','type'=>12,'code_deis' =>110378,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Francisco Boris Soler','alias'=>'Centro de Salud Familiar Dr. Francisco Boris Soler','type'=>12,'code_deis' =>110379,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Manuel','alias'=>'Centro de Salud Familiar San Manuel','type'=>12,'code_deis' =>110380,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Alfarera Rosa Reyes Vilches','alias'=>'Centro de Salud Familiar Alfarera Rosa Reyes Vilches','type'=>12,'code_deis' =>110381,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Adriana Madrid De Costabal','alias'=>'Centro de Salud Familiar Adriana Madrid De Costabal','type'=>12,'code_deis' =>110385,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Pedro','alias'=>'Centro de Salud Familiar San Pedro','type'=>12,'code_deis' =>110387,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Alberto Allende Jones','alias'=>'Centro de Salud Familiar Dr. Alberto Allende Jones','type'=>12,'code_deis' =>110390,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Villa Alhué','alias'=>'Centro de Salud Familiar Villa Alhué','type'=>12,'code_deis' =>110393,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Aliro Cárcarmo (Lonquén)','alias'=>'Posta de Salud Rural Aliro Cárcarmo (Lonquén)','type'=>13,'code_deis' =>110400,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Irene Frei Montalva','alias'=>'Centro Comunitario de Salud Familiar Irene Frei Montalva','type'=>16,'code_deis' =>110410,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Islita','alias'=>'Centro de Salud Familiar La Islita','type'=>12,'code_deis' =>110425,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Antonio de Naltagua','alias'=>'Posta de Salud Rural San Antonio de Naltagua','type'=>13,'code_deis' =>110430,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Gacitúa','alias'=>'Posta de Salud Rural Gacitúa','type'=>13,'code_deis' =>110431,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Mercedes ( Isla de Maipo )','alias'=>'Posta de Salud Rural Las Mercedes ( Isla de Maipo )','type'=>13,'code_deis' =>110432,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Bollenar','alias'=>'Posta de Salud Rural Bollenar','type'=>13,'code_deis' =>110440,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pahuilmo','alias'=>'Posta de Salud Rural Pahuilmo','type'=>13,'code_deis' =>110445,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de salud Rural Pabellón','alias'=>'Posta de salud Rural Pabellón','type'=>13,'code_deis' =>110455,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Emilia','alias'=>'Posta de Salud Rural Santa Emilia','type'=>13,'code_deis' =>110465,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Mercedes ( María Pinto )','alias'=>'Posta de Salud Rural Las Mercedes ( María Pinto )','type'=>13,'code_deis' =>110470,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chorombo','alias'=>'Posta de Salud Rural Chorombo','type'=>13,'code_deis' =>110475,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar María Salas','alias'=>'Centro Comunitario de Salud Familiar María Salas','type'=>16,'code_deis' =>110477,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Loica','alias'=>'Posta de Salud Rural Loica','type'=>13,'code_deis' =>110485,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Manga','alias'=>'Posta de Salud Rural La Manga','type'=>13,'code_deis' =>110490,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nihue','alias'=>'Posta de Salud Rural Nihue','type'=>13,'code_deis' =>110492,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Prado','alias'=>'Posta de Salud Rural El Prado','type'=>13,'code_deis' =>110495,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Hacienda Alhué','alias'=>'Centro Comunitario de Salud Familiar Hacienda Alhué','type'=>16,'code_deis' =>110503,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pichi','alias'=>'Posta de Salud Rural Pichi','type'=>13,'code_deis' =>110505,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Asiento','alias'=>'Posta de Salud Rural El Asiento','type'=>13,'code_deis' =>110510,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa María','alias'=>'Posta de Salud Rural Santa María','type'=>13,'code_deis' =>110515,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio Coaniquem','alias'=>'Consultorio Coaniquem','type'=>12,'code_deis' =>110601,'service' =>17,'dependency' =>4]);
Organization::Create(['name' => 'COSAM Cerro Navia','alias'=>'COSAM Cerro Navia','type'=>14,'code_deis' =>110619,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Quinta Normal','alias'=>'COSAM Quinta Normal','type'=>14,'code_deis' =>110620,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Lo Prado','alias'=>'COSAM Lo Prado','type'=>14,'code_deis' =>110621,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Pudahuel','alias'=>'COSAM Pudahuel','type'=>14,'code_deis' =>110622,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Talagante','alias'=>'COSAM Talagante','type'=>14,'code_deis' =>110623,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Peñaflor','alias'=>'COSAM Peñaflor','type'=>14,'code_deis' =>110624,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Melipilla','alias'=>'COSAM Melipilla','type'=>14,'code_deis' =>110625,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Renca','alias'=>'COSAM Renca','type'=>14,'code_deis' =>110626,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Mental','alias'=>'Centro Comunitario de Salud Mental','type'=>16,'code_deis' =>110627,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Catamarca','alias'=>'Centro Comunitario de Salud Familiar Catamarca','type'=>16,'code_deis' =>110720,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Antumalal','alias'=>'Centro Comunitario de Salud Familiar Antumalal','type'=>16,'code_deis' =>110725,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Lagos (Unidad Vecinal Nº 33)','alias'=>'Centro Comunitario de Salud Familiar Los Lagos (Unidad Vecinal Nº 33)','type'=>16,'code_deis' =>110735,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Concejal Guillermo Flores O.','alias'=>'Centro Comunitario de Salud Familiar Concejal Guillermo Flores O.','type'=>16,'code_deis' =>110750,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Padre Félix Gutiérrez Donoso','alias'=>'Centro Comunitario de Salud Familiar Padre Félix Gutiérrez Donoso','type'=>16,'code_deis' =>110752,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Río Claro','alias'=>'Centro Comunitario de Salud Familiar Río Claro','type'=>16,'code_deis' =>110754,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Mar Caribe','alias'=>'Centro Comunitario de Salud Familiar Mar Caribe','type'=>16,'code_deis' =>110756,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Santa Corina','alias'=>'Centro Comunitario de Salud Familiar Santa Corina','type'=>16,'code_deis' =>110758,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Curacaví','alias'=>'Centro Comunitario de Salud Familiar Curacaví','type'=>16,'code_deis' =>110760,'service' =>17,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar La Islita','alias'=>'Centro Comunitario de Salud Familiar La Islita','type'=>16,'code_deis' =>110775,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Padre Demetrio Bravo','alias'=>'Centro Comunitario de Salud Familiar Padre Demetrio Bravo','type'=>16,'code_deis' =>110778,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Obispo Pablo Lizama','alias'=>'Centro Comunitario de Salud Familiar Obispo Pablo Lizama','type'=>16,'code_deis' =>110781,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Codigua','alias'=>'Centro Comunitario de Salud Familiar Codigua','type'=>16,'code_deis' =>110783,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAR Renca','alias'=>'SAR Renca','type'=>20,'code_deis' =>110860,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Santa Rosa de Chena','alias'=>'SAPU Santa Rosa de Chena','type'=>20,'code_deis' =>110867,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Marcela Jacques Vargas','alias'=>'SAPU Marcela Jacques Vargas','type'=>20,'code_deis' =>110891,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Central)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Central)','type'=>1,'code_deis' =>111010,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Metropolitano Central)','alias'=>'PRAIS (S.S Metropolitano Central)','type'=>2,'code_deis' =>111011,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Clínico San Borja Arriarán','alias'=>'Hospital Clínico San Borja Arriarán','type'=>5,'code_deis' =>111100,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Clínico Metropolitano El Carmen Doctor Luis Valentín Ferrada','alias'=>'Hospital Clínico Metropolitano El Carmen Doctor Luis Valentín Ferrada','type'=>5,'code_deis' =>111101,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Urgencia Asistencia Pública Dr. Alejandro del Río','alias'=>'Hospital de Urgencia Asistencia Pública Dr. Alejandro del Río','type'=>5,'code_deis' =>111195,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Clínico Red de Salud UC CHRISTUS','alias'=>'Hospital Clínico Red de Salud UC CHRISTUS','type'=>7,'code_deis' =>111200,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Hospital Clínico Mutual de Seguridad C.CH.C.','alias'=>'Hospital Clínico Mutual de Seguridad C.CH.C.','type'=>7,'code_deis' =>111202,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Penitenciario','alias'=>'Hospital Penitenciario','type'=>7,'code_deis' =>111203,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Instituto Teletón Santiago','alias'=>'Instituto Teletón Santiago','type'=>8,'code_deis' =>111204,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Clínico Instituto de Seguridad del Trabajo de Santaigo','alias'=>'Hospital Clínico Instituto de Seguridad del Trabajo de Santaigo','type'=>7,'code_deis' =>111205,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Los Coihues','alias'=>'Clínica Los Coihues','type'=>6,'code_deis' =>111206,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Santa Inés','alias'=>'Clínica Santa Inés','type'=>6,'code_deis' =>111207,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Bio Reval Ltda','alias'=>'Laboratorio Bio Reval Ltda','type'=>10,'code_deis' =>111208,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Antonio Concha','alias'=>'Laboratorio Antonio Concha','type'=>10,'code_deis' =>111209,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Hernández y Gutiérrez Ltda','alias'=>'Hernández y Gutiérrez Ltda','type'=>8,'code_deis' =>111210,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Central','alias'=>'Clínica Central','type'=>6,'code_deis' =>111211,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Labocenter','alias'=>'Laboratorio Labocenter','type'=>10,'code_deis' =>111212,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Sierra Bella','alias'=>'Clínica Sierra Bella','type'=>6,'code_deis' =>111214,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Santiago Centro','alias'=>'Laboratorio Santiago Centro','type'=>10,'code_deis' =>111216,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Diagnostiko Ltda','alias'=>'Centro de Salud Diagnostiko Ltda','type'=>8,'code_deis' =>111217,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Omega','alias'=>'Centro de Salud Omega','type'=>8,'code_deis' =>111218,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Nueva Clínica Madre e Hijo','alias'=>'Nueva Clínica Madre e Hijo','type'=>6,'code_deis' =>111219,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Perfil Bioquímico','alias'=>'Laboratorio Perfil Bioquímico','type'=>10,'code_deis' =>111220,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Juan Pablo II','alias'=>'Clínica Juan Pablo II','type'=>6,'code_deis' =>111221,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Sigma','alias'=>'Laboratorio Sigma','type'=>10,'code_deis' =>111222,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Vival Ltda.','alias'=>'Centro de Salud Vival Ltda.','type'=>8,'code_deis' =>111224,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Referencia Oxman y Cía. Ltda.','alias'=>'Laboratorio Referencia Oxman y Cía. Ltda.','type'=>10,'code_deis' =>111225,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Hospital del Profesor','alias'=>'Clínica Hospital del Profesor','type'=>6,'code_deis' =>111230,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Astra','alias'=>'Clínica Astra','type'=>6,'code_deis' =>111232,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Integramédica','alias'=>'Centro Integramédica','type'=>8,'code_deis' =>111263,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Vida Integra Alameda','alias'=>'Centro Médico Vida Integra Alameda','type'=>8,'code_deis' =>111267,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Vida Integra Bandera','alias'=>'Centro de Salud Vida Integra Bandera','type'=>8,'code_deis' =>111269,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Integramédica Oeste','alias'=>'Centro Integramédica Oeste','type'=>8,'code_deis' =>111274,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica UC Red de Salud UC CHRISTUS','alias'=>'Clínica UC Red de Salud UC CHRISTUS','type'=>6,'code_deis' =>111276,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Clínica Pedro Montt','alias'=>'Clínica Pedro Montt','type'=>6,'code_deis' =>111277,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Integramédica Forestal','alias'=>'Centro Integramédica Forestal','type'=>8,'code_deis' =>111278,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Alameda','alias'=>'Centro Asistencial AChS Alameda','type'=>8,'code_deis' =>111281,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Maipú','alias'=>'Centro Asistencial AChS Maipú','type'=>8,'code_deis' =>111282,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Santiago','alias'=>'Centro Asistencial AChS Santiago','type'=>8,'code_deis' =>111283,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Alameda','alias'=>'Centro Médico y Dental Megasalud Alameda','type'=>17,'code_deis' =>111284,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Maipu','alias'=>'Centro Médico y Dental Megasalud Maipu','type'=>17,'code_deis' =>111285,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental CAPREDENA','alias'=>'Centro Médico y Dental CAPREDENA','type'=>17,'code_deis' =>111286,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Agustinas','alias'=>'Centro de Salud Mutual CChC Agustinas','type'=>8,'code_deis' =>111288,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Maipú','alias'=>'Centro de Salud Mutual CChC Maipú','type'=>8,'code_deis' =>111289,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Integramédica Estación Central','alias'=>'Centro Integramédica Estación Central','type'=>8,'code_deis' =>111290,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Fundación Asistencial Trabajadores Del Banco del Estado de Chile','alias'=>'Centro Médico y Dental Fundación Asistencial Trabajadores Del Banco del Estado de Chile','type'=>17,'code_deis' =>111291,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Marcoleta de la Pontificia Universidad Católica de Chile','alias'=>'Vacunatorio Marcoleta de la Pontificia Universidad Católica de Chile','type'=>18,'code_deis' =>111292,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Policlínico Institucional de Gendarmería de Chile - Santiago','alias'=>'Policlínico Institucional de Gendarmería de Chile - Santiago','type'=>8,'code_deis' =>111293,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Establecimiento Penitenciario Santiago 1','alias'=>'Establecimiento Penitenciario Santiago 1','type'=>8,'code_deis' =>111294,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Red Salud Santiago ex Clínica Bicentenario','alias'=>'Red Salud Santiago ex Clínica Bicentenario','type'=>6,'code_deis' =>111295,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Consultorio Escuela de formación policial de Carabineros de Chile','alias'=>'Consultorio Escuela de formación policial de Carabineros de Chile','type'=>8,'code_deis' =>111296,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Clínica Bellolio','alias'=>'Clínica Bellolio','type'=>6,'code_deis' =>111297,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Santiago Occidente de Carabineros de Chile','alias'=>'Centro de Salud Familiar Santiago Occidente de Carabineros de Chile','type'=>8,'code_deis' =>111298,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Integramédica Bandera','alias'=>'Integramédica Bandera','type'=>8,'code_deis' =>111299,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar N° 1 Dr. Ramón Corbalán Melgarejo','alias'=>'Centro de Salud Familiar N° 1 Dr. Ramón Corbalán Melgarejo','type'=>12,'code_deis' =>111300,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Nº 5','alias'=>'Centro de Salud Familiar Nº 5','type'=>12,'code_deis' =>111301,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Padre Vicente Irarrázabal','alias'=>'Centro de Salud Familiar Padre Vicente Irarrázabal','type'=>12,'code_deis' =>111302,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Lo Valledor Norte','alias'=>'Centro de Salud Familiar Lo Valledor Norte','type'=>12,'code_deis' =>111303,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Maipú','alias'=>'Centro de Salud Familiar Maipú','type'=>12,'code_deis' =>111304,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Norman Voulliéme','alias'=>'Centro de Salud Familiar Dr. Norman Voulliéme','type'=>12,'code_deis' =>111305,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar San José de Chuchunco','alias'=>'Centro de Salud Familiar San José de Chuchunco','type'=>12,'code_deis' =>111306,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Enfermera Sofía Pincheira','alias'=>'Centro de Salud Familiar Enfermera Sofía Pincheira','type'=>12,'code_deis' =>111307,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. José Eduardo Ahués Salame','alias'=>'Centro de Salud Familiar Dr. José Eduardo Ahués Salame','type'=>12,'code_deis' =>111308,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Dra. Ana María Juricic','alias'=>'Centro de Salud Familiar Dra. Ana María Juricic','type'=>12,'code_deis' =>111309,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Las Mercedes','alias'=>'Centro de Salud Familiar Las Mercedes','type'=>12,'code_deis' =>111310,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Referencia de Salud de Maipú','alias'=>'Centro de Referencia de Salud de Maipú','type'=>25,'code_deis' =>111351,'service' =>18,'dependency' =>7]);
Organization::Create(['name' => 'Centro de Salud Familiar Padre Orellana','alias'=>'Centro de Salud Familiar Padre Orellana','type'=>12,'code_deis' =>111370,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Arauco','alias'=>'Centro de Salud Familiar Arauco','type'=>12,'code_deis' =>111372,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Benjamín Viel','alias'=>'Centro de Salud Familiar Dr. Benjamín Viel','type'=>12,'code_deis' =>111376,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Iván Insunza','alias'=>'Centro de Salud Familiar Dr. Iván Insunza','type'=>12,'code_deis' =>111378,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Clotario Blest','alias'=>'Centro de Salud Familiar Clotario Blest','type'=>12,'code_deis' =>111379,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Carlos Godoy','alias'=>'Centro de Salud Familiar Dr. Carlos Godoy','type'=>12,'code_deis' =>111380,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Ignacio Domeyko','alias'=>'Centro de Salud Familiar Ignacio Domeyko','type'=>12,'code_deis' =>111381,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Presidenta Michelle Bachelet','alias'=>'Centro de Salud Familiar Presidenta Michelle Bachelet','type'=>12,'code_deis' =>111382,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Luis Ferrada','alias'=>'Centro de Salud Familiar Dr. Luis Ferrada','type'=>12,'code_deis' =>111383,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rinconada de Maipú','alias'=>'Posta de Salud Rural Rinconada de Maipú','type'=>13,'code_deis' =>111400,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Estación Central','alias'=>'COSAM Estación Central','type'=>14,'code_deis' =>111606,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Maipú','alias'=>'COSAM Maipú','type'=>14,'code_deis' =>111607,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Cerrillos','alias'=>'COSAM Cerrillos','type'=>14,'code_deis' =>111608,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Santiago','alias'=>'COSAM Santiago','type'=>14,'code_deis' =>111609,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Futramapu','alias'=>'Centro Comunitario de Salud Familiar Futramapu','type'=>16,'code_deis' =>111704,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Europa','alias'=>'Centro Comunitario de Salud Familiar Europa','type'=>16,'code_deis' =>111780,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa Francia','alias'=>'Centro Comunitario de Salud Familiar Villa Francia','type'=>16,'code_deis' =>111781,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Abrazo','alias'=>'Centro Comunitario de Salud Familiar El Abrazo','type'=>16,'code_deis' =>111782,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Lo Errázuriz','alias'=>'Centro Comunitario de Salud Familiar Lo Errázuriz','type'=>16,'code_deis' =>111783,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Bueras','alias'=>'Centro Comunitario de Salud Familiar Bueras','type'=>16,'code_deis' =>111784,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Consultorio Nº1','alias'=>'SAPU Consultorio Nº1','type'=>20,'code_deis' =>111800,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'SAPU Maipú','alias'=>'SAPU Maipú','type'=>20,'code_deis' =>111804,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'SAPU Dr. Norman Voulliéme','alias'=>'SAPU Dr. Norman Voulliéme','type'=>20,'code_deis' =>111805,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'SAPU San José de Chuchunco','alias'=>'SAPU San José de Chuchunco','type'=>20,'code_deis' =>111806,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'SAPU Dra. Ana María Juricic','alias'=>'SAPU Dra. Ana María Juricic','type'=>20,'code_deis' =>111809,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Oriente)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Oriente)','type'=>1,'code_deis' =>112010,'service' =>20,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Metropolitano Oriente)','alias'=>'PRAIS (S.S Metropolitano Oriente)','type'=>2,'code_deis' =>112011,'service' =>20,'dependency' =>1]);
Organization::Create(['name' => 'Vacunatorio Internacional SEREMI de Salud Metropolitana','alias'=>'Vacunatorio Internacional SEREMI de Salud Metropolitana','type'=>18,'code_deis' =>112095,'service' =>20,'dependency' =>2]);
Organization::Create(['name' => 'Hospital Del Salvador de Santiago','alias'=>'Hospital Del Salvador de Santiago','type'=>5,'code_deis' =>112100,'service' =>20,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Luis Tisné B. (Santiago, Peñalolén)','alias'=>'Hospital Dr. Luis Tisné B. (Santiago, Peñalolén)','type'=>5,'code_deis' =>112101,'service' =>20,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Niños Dr. Luis Calvo Mackenna','alias'=>'Hospital de Niños Dr. Luis Calvo Mackenna','type'=>5,'code_deis' =>112102,'service' =>20,'dependency' =>1]);
Organization::Create(['name' => 'Instituto Nacional de Enfermedades Respiratorias y Cirugía Torácica','alias'=>'Instituto Nacional de Enfermedades Respiratorias y Cirugía Torácica','type'=>5,'code_deis' =>112103,'service' =>20,'dependency' =>1]);
Organization::Create(['name' => 'Instituto de Neurocirugía Dr. Alfonso Asenjo','alias'=>'Instituto de Neurocirugía Dr. Alfonso Asenjo','type'=>5,'code_deis' =>112104,'service' =>20,'dependency' =>1]);
Organization::Create(['name' => 'Instituto Nacional de Rehabilitación Infantil Presidente Pedro Aguirre Cerda','alias'=>'Instituto Nacional de Rehabilitación Infantil Presidente Pedro Aguirre Cerda','type'=>5,'code_deis' =>112105,'service' =>20,'dependency' =>1]);
Organization::Create(['name' => 'Instituto Nacional Geriátrico Presidente Eduardo Frei Montalva','alias'=>'Instituto Nacional Geriátrico Presidente Eduardo Frei Montalva','type'=>5,'code_deis' =>112106,'service' =>20,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Hanga Roa (Isla De Pascua)','alias'=>'Hospital Hanga Roa (Isla De Pascua)','type'=>22,'code_deis' =>112107,'service' =>20,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Alemana','alias'=>'Clínica Alemana','type'=>6,'code_deis' =>112200,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Tabancura','alias'=>'Clínica Tabancura','type'=>6,'code_deis' =>112201,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Nueva Clínica Cordillera','alias'=>'Nueva Clínica Cordillera','type'=>6,'code_deis' =>112204,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Psiquiatrica Bretaña','alias'=>'Clínica Psiquiatrica Bretaña','type'=>6,'code_deis' =>112205,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica del Carmen','alias'=>'Clínica del Carmen','type'=>6,'code_deis' =>112207,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Indisa','alias'=>'Clínica Indisa','type'=>6,'code_deis' =>112211,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Las Condes','alias'=>'Clínica Las Condes','type'=>6,'code_deis' =>112212,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Macul','alias'=>'Clínica Macul','type'=>6,'code_deis' =>112215,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Recuperación Alcohol Alfa','alias'=>'Clínica Recuperación Alcohol Alfa','type'=>6,'code_deis' =>112217,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Miguel Claro','alias'=>'Clínica Miguel Claro','type'=>6,'code_deis' =>112218,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Oftalmólogica los Andes','alias'=>'Clínica Oftalmólogica los Andes','type'=>6,'code_deis' =>112220,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Providencia','alias'=>'Centro Médico y Dental Megasalud Providencia','type'=>17,'code_deis' =>112221,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Ñuñoa','alias'=>'Clínica Ñuñoa','type'=>6,'code_deis' =>112222,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Psiquiatrica Pocuro','alias'=>'Clínica Psiquiatrica Pocuro','type'=>6,'code_deis' =>112224,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica San Andrés','alias'=>'Clínica San Andrés','type'=>6,'code_deis' =>112228,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Pensionado San José','alias'=>'Pensionado San José','type'=>8,'code_deis' =>112229,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Hospital FACH','alias'=>'Hospital FACH','type'=>7,'code_deis' =>112238,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Hospital Carabineros','alias'=>'Hospital Carabineros','type'=>7,'code_deis' =>112240,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Clínica Oriente','alias'=>'Clínica Oriente','type'=>6,'code_deis' =>112241,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Lo Curro','alias'=>'Clínica Lo Curro','type'=>6,'code_deis' =>112242,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro CONIN Credes','alias'=>'Centro CONIN Credes','type'=>26,'code_deis' =>112243,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Hospital del Trabajador Santiago','alias'=>'Hospital del Trabajador Santiago','type'=>7,'code_deis' =>112244,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Europa','alias'=>'Clínica Europa','type'=>6,'code_deis' =>112246,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Dipreca Teniente Hernán Merino','alias'=>'Hospital Dipreca Teniente Hernán Merino','type'=>7,'code_deis' =>112248,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Clínica Santa María','alias'=>'Clínica Santa María','type'=>6,'code_deis' =>112249,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Psiquiatrica Renacer','alias'=>'Clínica Psiquiatrica Renacer','type'=>6,'code_deis' =>112252,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Oncológica Arturo López Pérez','alias'=>'Clínica Oncológica Arturo López Pérez','type'=>6,'code_deis' =>112254,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Psicoterapia los Tiempos','alias'=>'Clínica Psicoterapia los Tiempos','type'=>6,'code_deis' =>112258,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Colonial','alias'=>'Clínica Colonial','type'=>6,'code_deis' =>112259,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Instituto Médico el Arrayán','alias'=>'Instituto Médico el Arrayán','type'=>8,'code_deis' =>112260,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica San Carlos de Apoquindo Red de Salud UC CHRISTUS','alias'=>'Clínica San Carlos de Apoquindo Red de Salud UC CHRISTUS','type'=>6,'code_deis' =>112261,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Clínica Instituto El Cedro','alias'=>'Clínica Instituto El Cedro','type'=>6,'code_deis' =>112264,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Arauco','alias'=>'Centro Médico y Dental Megasalud Arauco','type'=>17,'code_deis' =>112265,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Padre Hurtado','alias'=>'Centro Médico y Dental Megasalud Padre Hurtado','type'=>17,'code_deis' =>112266,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Departamento de Bienestar Social de la Dirección General de Aeronáutica Civil','alias'=>'Departamento de Bienestar Social de la Dirección General de Aeronáutica Civil','type'=>8,'code_deis' =>112267,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Central Odontológica de la Fuerzas Armadas y de Orden','alias'=>'Central Odontológica de la Fuerzas Armadas y de Orden','type'=>8,'code_deis' =>112268,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Instituto de Enfermedades Circulatorias','alias'=>'Instituto de Enfermedades Circulatorias','type'=>8,'code_deis' =>112269,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Militar Rosa OHiggins','alias'=>'Centro Médico Militar Rosa OHiggins','type'=>8,'code_deis' =>112272,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Procedimientos Clínicos Alto Tabancura','alias'=>'Procedimientos Clínicos Alto Tabancura','type'=>8,'code_deis' =>112274,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Alto Tobalaba - Vacunatorio Vacci Protex','alias'=>'Centro Médico Alto Tobalaba - Vacunatorio Vacci Protex','type'=>8,'code_deis' =>112275,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica de Medicina y Estética MYE','alias'=>'Clínica de Medicina y Estética MYE','type'=>6,'code_deis' =>112276,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Vida Integra Tobalaba','alias'=>'Centro Médico Vida Integra Tobalaba','type'=>8,'code_deis' =>112277,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Monteblanco','alias'=>'Clínica Monteblanco','type'=>6,'code_deis' =>112278,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Consultorio Escuela de Carabineros de Chile','alias'=>'Consultorio Escuela de Carabineros de Chile','type'=>8,'code_deis' =>112279,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Consultorio Escuela de Suboficiales de Carabineros de Chile','alias'=>'Consultorio Escuela de Suboficiales de Carabineros de Chile','type'=>8,'code_deis' =>112280,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Centro Médico Irarrázaval Red de Salud UC CHRISTUS','alias'=>'Centro Médico Irarrázaval Red de Salud UC CHRISTUS','type'=>8,'code_deis' =>112281,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Centro Médico y Dental Antonio Varas del Banco del Estado de Chile','alias'=>'Centro Médico y Dental Antonio Varas del Banco del Estado de Chile','type'=>17,'code_deis' =>112282,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Referencia de Salud Cordillera Oriente','alias'=>'Centro de Referencia de Salud Cordillera Oriente','type'=>25,'code_deis' =>112300,'service' =>20,'dependency' =>7]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Hernán Alessandri','alias'=>'Centro de Salud Familiar Dr. Hernán Alessandri','type'=>12,'code_deis' =>112301,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Alfonso Leng','alias'=>'Centro de Salud Familiar Dr. Alfonso Leng','type'=>12,'code_deis' =>112302,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Aguilucho','alias'=>'Centro de Salud Familiar Aguilucho','type'=>12,'code_deis' =>112303,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Apoquindo','alias'=>'Centro de Salud Familiar Apoquindo','type'=>12,'code_deis' =>112304,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Aníbal Ariztía','alias'=>'Centro de Salud Familiar Aníbal Ariztía','type'=>12,'code_deis' =>112306,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lo Barnechea','alias'=>'Centro de Salud Familiar Lo Barnechea','type'=>12,'code_deis' =>112307,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Vitacura','alias'=>'Centro de Salud Familiar Vitacura','type'=>12,'code_deis' =>112309,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Rosita Renard','alias'=>'Centro de Salud Familiar Rosita Renard','type'=>12,'code_deis' =>112310,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Salvador Bustos','alias'=>'Centro de Salud Familiar Salvador Bustos','type'=>12,'code_deis' =>112311,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Félix de Amesti','alias'=>'Centro de Salud Familiar Félix de Amesti','type'=>12,'code_deis' =>112312,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Julia','alias'=>'Centro de Salud Familiar Santa Julia','type'=>12,'code_deis' =>112313,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Faena','alias'=>'Centro de Salud Familiar La Faena','type'=>12,'code_deis' =>112314,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Luis','alias'=>'Centro de Salud Familiar San Luis','type'=>12,'code_deis' =>112315,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Carol Urzúa Ibáñez','alias'=>'Centro de Salud Familiar Carol Urzúa Ibáñez','type'=>12,'code_deis' =>112316,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Ossandon','alias'=>'Centro de Salud Familiar Ossandon','type'=>12,'code_deis' =>112317,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lo Hermida','alias'=>'Centro de Salud Familiar Lo Hermida','type'=>12,'code_deis' =>112318,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Padre Alberto Hurtado','alias'=>'Centro de Salud Familiar Padre Alberto Hurtado','type'=>12,'code_deis' =>112319,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Pablo II','alias'=>'Centro de Salud Familiar Juan Pablo II','type'=>12,'code_deis' =>112320,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cardenal Silva Henríquez','alias'=>'Centro de Salud Familiar Cardenal Silva Henríquez','type'=>12,'code_deis' =>112321,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Padre Gerardo Whelan','alias'=>'Centro de Salud Familiar Padre Gerardo Whelan','type'=>12,'code_deis' =>112322,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro Odontológico Macul','alias'=>'Centro Odontológico Macul','type'=>12,'code_deis' =>112323,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural de Farellones','alias'=>'Posta de Salud Rural de Farellones','type'=>13,'code_deis' =>112407,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro Integramédica Barcelona','alias'=>'Centro Integramédica Barcelona','type'=>8,'code_deis' =>112500,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Las Acacias','alias'=>'Clínica Las Acacias','type'=>6,'code_deis' =>112502,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Servicios Médicos Santa María','alias'=>'Centro Servicios Médicos Santa María','type'=>8,'code_deis' =>112505,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Fundación Médica San Cristóbal','alias'=>'Clínica Fundación Médica San Cristóbal','type'=>6,'code_deis' =>112507,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Oftalmológico Luis Pasteur','alias'=>'Centro Oftalmológico Luis Pasteur','type'=>8,'code_deis' =>112509,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Universidad de Chile Quilín','alias'=>'Clínica Universidad de Chile Quilín','type'=>6,'code_deis' =>112510,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Centro Médico San Joaquín Red de Salud UC CHRISTUS','alias'=>'Centro Médico San Joaquín Red de Salud UC CHRISTUS','type'=>8,'code_deis' =>112512,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Clínica Astra Providencia','alias'=>'Clínica Astra Providencia','type'=>6,'code_deis' =>112513,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Egaña','alias'=>'Centro Asistencial AChS Egaña','type'=>8,'code_deis' =>112514,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS La Reina','alias'=>'Centro Asistencial AChS La Reina','type'=>8,'code_deis' =>112515,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Las Condes','alias'=>'Centro Asistencial AChS Las Condes','type'=>8,'code_deis' =>112516,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Macul','alias'=>'Centro Médico Macul','type'=>8,'code_deis' =>112517,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC las Tranqueras','alias'=>'Centro de Salud Mutual CChC las Tranqueras','type'=>8,'code_deis' =>112518,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Ñuñoa','alias'=>'Centro Médico y Dental Megasalud Ñuñoa','type'=>17,'code_deis' =>112519,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Kennedy','alias'=>'Centro Médico y Dental Megasalud Kennedy','type'=>17,'code_deis' =>112520,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Clínica Santa María La Dehesa','alias'=>'Centro Médico Clínica Santa María La Dehesa','type'=>8,'code_deis' =>112522,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Vida Integra','alias'=>'Centro Vida Integra','type'=>8,'code_deis' =>112525,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Integra Médica Manquehue','alias'=>'Centro Integra Médica Manquehue','type'=>8,'code_deis' =>112526,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Clínica Alemana (La Dehesa)','alias'=>'Centro Médico Clínica Alemana (La Dehesa)','type'=>8,'code_deis' =>112527,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Darvax Salud','alias'=>'Vacunatorio Darvax Salud','type'=>18,'code_deis' =>112529,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Militar de Santiago','alias'=>'Hospital Militar de Santiago','type'=>7,'code_deis' =>112530,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'COSAM La Reina','alias'=>'COSAM La Reina','type'=>14,'code_deis' =>112606,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Macul','alias'=>'COSAM Macul','type'=>14,'code_deis' =>112607,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Ñuñoa','alias'=>'COSAM Ñuñoa','type'=>14,'code_deis' =>112608,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Las Condes','alias'=>'COSAM Las Condes','type'=>14,'code_deis' =>112609,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Peñalolén','alias'=>'COSAM Peñalolén','type'=>14,'code_deis' =>112610,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Provisam','alias'=>'COSAM Provisam','type'=>14,'code_deis' =>112611,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Lo Barnechea','alias'=>'COSAM Lo Barnechea','type'=>14,'code_deis' =>112612,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Vitacura','alias'=>'COSAM Vitacura','type'=>14,'code_deis' =>112613,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Lo Barnechea','alias'=>'Centro Comunitario de Salud Familiar Lo Barnechea','type'=>16,'code_deis' =>112707,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar General Carol Urzúa Ibáñez','alias'=>'Centro Comunitario de Salud Familiar General Carol Urzúa Ibáñez','type'=>16,'code_deis' =>112716,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Dragones de La Reina','alias'=>'Centro Comunitario de Salud Familiar Dragones de La Reina','type'=>16,'code_deis' =>112717,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Bicentenario','alias'=>'Centro Comunitario de Salud Familiar Bicentenario','type'=>16,'code_deis' =>112799,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Aníbal Ariztía','alias'=>'SAPU Aníbal Ariztía','type'=>20,'code_deis' =>112806,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Lo Barnechea','alias'=>'SAPU Lo Barnechea','type'=>20,'code_deis' =>112807,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Rosita Renard','alias'=>'SAPU Rosita Renard','type'=>20,'code_deis' =>112810,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Santa Julia','alias'=>'SAPU Santa Julia','type'=>20,'code_deis' =>112813,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAPU La Faena','alias'=>'SAPU La Faena','type'=>20,'code_deis' =>112814,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAPU San Luis','alias'=>'SAPU San Luis','type'=>20,'code_deis' =>112815,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Carol Urzúa Ibáñez','alias'=>'SAPU Carol Urzúa Ibáñez','type'=>20,'code_deis' =>112816,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Lo Hermida','alias'=>'SAPU Lo Hermida','type'=>20,'code_deis' =>112818,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Centro de Urgencia Ñuñoa','alias'=>'SAPU Centro de Urgencia Ñuñoa','type'=>20,'code_deis' =>112820,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Red Salud Providencia ex Clínica Avansalud Providencia','alias'=>'Red Salud Providencia ex Clínica Avansalud Providencia','type'=>6,'code_deis' =>112954,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Dirección Previsional de Carabineros de Chile','alias'=>'Dirección Previsional de Carabineros de Chile','type'=>8,'code_deis' =>112955,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Laboratorio Clínico Blanco','alias'=>'Laboratorio Clínico Blanco','type'=>10,'code_deis' =>112956,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Química Clínica Especializada','alias'=>'Química Clínica Especializada','type'=>10,'code_deis' =>112957,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Providencia','alias'=>'Laboratorio Clínico Bionet S.A. - Providencia','type'=>10,'code_deis' =>112958,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Bioánalisis Ltda.','alias'=>'Bioánalisis Ltda.','type'=>10,'code_deis' =>112959,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Dilab','alias'=>'Dilab','type'=>8,'code_deis' =>112960,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Elsa','alias'=>'Elsa','type'=>8,'code_deis' =>112961,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'San Cristóbal','alias'=>'San Cristóbal','type'=>10,'code_deis' =>112962,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Red-Lab','alias'=>'Red-Lab','type'=>10,'code_deis' =>112963,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Instituto Oftalmológico Puerta del Sol','alias'=>'Instituto Oftalmológico Puerta del Sol','type'=>8,'code_deis' =>112976,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diagnóstico Integramédica Alto Las Condes','alias'=>'Centro de Diagnóstico Integramédica Alto Las Condes','type'=>8,'code_deis' =>112977,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Paris SpA','alias'=>'Clínica Paris SpA','type'=>6,'code_deis' =>112979,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Vida Integra de Las Condes','alias'=>'Centro Vida Integra de Las Condes','type'=>8,'code_deis' =>112980,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Megasalud','alias'=>'Megasalud','type'=>8,'code_deis' =>112982,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'VidaIntegra','alias'=>'VidaIntegra','type'=>8,'code_deis' =>112983,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'VidaIntegra (El Bosque Norte)','alias'=>'VidaIntegra (El Bosque Norte)','type'=>8,'code_deis' =>112984,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Integramédica Las Condes','alias'=>'Integramédica Las Condes','type'=>8,'code_deis' =>112985,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Integramédica Maipú','alias'=>'Integramédica Maipú','type'=>8,'code_deis' =>112986,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica New Clinic','alias'=>'Clínica New Clinic','type'=>6,'code_deis' =>112987,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Vida Integra de Ñuñoa','alias'=>'Centro Vida Integra de Ñuñoa','type'=>8,'code_deis' =>112990,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Barnafi Krause Diagnóstica','alias'=>'Barnafi Krause Diagnóstica','type'=>10,'code_deis' =>112994,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Providencia','alias'=>'Centro de Salud Mutual CChC Providencia','type'=>8,'code_deis' =>112995,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Corporación de Ayuda al Paciente Mental','alias'=>'Clínica Corporación de Ayuda al Paciente Mental','type'=>6,'code_deis' =>112999,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Sur)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Sur)','type'=>1,'code_deis' =>113010,'service' =>19,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Metropolitano Sur)','alias'=>'PRAIS (S.S Metropolitano Sur)','type'=>2,'code_deis' =>113011,'service' =>19,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Barros Luco Trudeau (Santiago, San Miguel)','alias'=>'Hospital Barros Luco Trudeau (Santiago, San Miguel)','type'=>5,'code_deis' =>113100,'service' =>19,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Exequiel González Cortés (Santiago, San Miguel)','alias'=>'Hospital Dr. Exequiel González Cortés (Santiago, San Miguel)','type'=>5,'code_deis' =>113130,'service' =>19,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Luis (Buin)','alias'=>'Hospital San Luis (Buin)','type'=>23,'code_deis' =>113150,'service' =>19,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Enfermedades Infecciosas Dr. Lucio Córdova (Santiago, San Miguel)','alias'=>'Hospital de Enfermedades Infecciosas Dr. Lucio Córdova (Santiago, San Miguel)','type'=>23,'code_deis' =>113160,'service' =>19,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Psiquiátrico El Peral (Santiago, Puente Alto)','alias'=>'Hospital Psiquiátrico El Peral (Santiago, Puente Alto)','type'=>23,'code_deis' =>113170,'service' =>19,'dependency' =>1]);
Organization::Create(['name' => 'Hospital El Pino (Santiago, San Bernardo)','alias'=>'Hospital El Pino (Santiago, San Bernardo)','type'=>5,'code_deis' =>113180,'service' =>19,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Referencia de Salud El Pino','alias'=>'Centro de Referencia de Salud El Pino','type'=>25,'code_deis' =>113181,'service' =>19,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Parroquial de San Bernardo (D)','alias'=>'Hospital Parroquial de San Bernardo (D)','type'=>5,'code_deis' =>113190,'service' =>19,'dependency' =>4]);
Organization::Create(['name' => 'Clínica San Miguel','alias'=>'Clínica San Miguel','type'=>6,'code_deis' =>113213,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Psiquiátrica Nelly Vergara','alias'=>'Clínica Psiquiátrica Nelly Vergara','type'=>6,'code_deis' =>113218,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Integramédica San Miguel','alias'=>'Centro Integramédica San Miguel','type'=>8,'code_deis' =>113233,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Vida Integra de San Miguel','alias'=>'Centro Vida Integra de San Miguel','type'=>8,'code_deis' =>113234,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC San Bernardo','alias'=>'Centro de Salud Mutual CChC San Bernardo','type'=>8,'code_deis' =>113235,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Santa Lucía','alias'=>'Clínica Santa Lucía','type'=>6,'code_deis' =>113238,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Vida Integra de San Bernardo','alias'=>'Centro Vida Integra de San Bernardo','type'=>8,'code_deis' =>113239,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Lo Espejo','alias'=>'Centro de Salud Mutual CChC Lo Espejo','type'=>8,'code_deis' =>113241,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Santa Rosa','alias'=>'Clínica Santa Rosa','type'=>6,'code_deis' =>113242,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica de Cirugía Plástica','alias'=>'Clínica de Cirugía Plástica','type'=>6,'code_deis' =>113244,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Buin','alias'=>'Centro Asistencial AChS Buin','type'=>8,'code_deis' =>113246,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS San Bernardo','alias'=>'Centro Asistencial AChS San Bernardo','type'=>8,'code_deis' =>113247,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS San Miguel','alias'=>'Centro Asistencial AChS San Miguel','type'=>8,'code_deis' =>113248,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Paine','alias'=>'Centro de Salud Mutual CChC Paine','type'=>8,'code_deis' =>113249,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Astra San Miguel','alias'=>'Clínica Astra San Miguel','type'=>6,'code_deis' =>113250,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Astra San Bernardo','alias'=>'Clínica Astra San Bernardo','type'=>6,'code_deis' =>113251,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Gran Avenida','alias'=>'Centro Médico y Dental Megasalud Gran Avenida','type'=>17,'code_deis' =>113252,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud San Bernardo','alias'=>'Centro Médico y Dental Megasalud San Bernardo','type'=>17,'code_deis' =>113253,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Paine','alias'=>'Centro Asistencial AChS Paine','type'=>8,'code_deis' =>113254,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Consultorio Tantauco','alias'=>'Consultorio Tantauco','type'=>8,'code_deis' =>113255,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Consultorio Prefectura Sur','alias'=>'Consultorio Prefectura Sur','type'=>8,'code_deis' =>113256,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Multimédica Ltda.','alias'=>'Multimédica Ltda.','type'=>8,'code_deis' =>113257,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'San Nicolás','alias'=>'San Nicolás','type'=>10,'code_deis' =>113258,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Macromédica','alias'=>'Macromédica','type'=>10,'code_deis' =>113259,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Nefrolab','alias'=>'Nefrolab','type'=>8,'code_deis' =>113260,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Barros Luco','alias'=>'Centro de Salud Familiar Barros Luco','type'=>12,'code_deis' =>113300,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Joaquín','alias'=>'Centro de Salud Familiar San Joaquín','type'=>12,'code_deis' =>113301,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Recreo','alias'=>'Centro de Salud Familiar Recreo','type'=>12,'code_deis' =>113302,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Amador Neghme','alias'=>'Centro de Salud Familiar Amador Neghme','type'=>12,'code_deis' =>113303,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Villa Sur','alias'=>'Centro de Salud Familiar Villa Sur','type'=>12,'code_deis' =>113304,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Arturo Baeza Goñi','alias'=>'Centro de Salud Familiar Arturo Baeza Goñi','type'=>12,'code_deis' =>113305,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Padre Pierre Dubois (Ex La Feria)','alias'=>'Centro de Salud Familiar Padre Pierre Dubois (Ex La Feria)','type'=>12,'code_deis' =>113306,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Padre Esteban Gumucio Vives','alias'=>'Centro de Salud Familiar Padre Esteban Gumucio Vives','type'=>12,'code_deis' =>113307,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Clara Estrella','alias'=>'Centro de Salud Familiar Clara Estrella','type'=>12,'code_deis' =>113308,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Julio Acuña Pinzón','alias'=>'Centro de Salud Familiar Julio Acuña Pinzón','type'=>12,'code_deis' =>113309,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dra. Mariela Salgado Zepeda','alias'=>'Centro de Salud Familiar Dra. Mariela Salgado Zepeda','type'=>12,'code_deis' =>113310,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Anselma','alias'=>'Centro de Salud Familiar Santa Anselma','type'=>12,'code_deis' =>113311,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Carlos Lorca Tobar','alias'=>'Centro de Salud Familiar Dr. Carlos Lorca Tobar','type'=>12,'code_deis' =>113312,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Raúl Cuevas (Ex-San Bernardo)','alias'=>'Centro de Salud Familiar Raúl Cuevas (Ex-San Bernardo)','type'=>12,'code_deis' =>113313,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cóndores de Chile','alias'=>'Centro de Salud Familiar Cóndores de Chile','type'=>12,'code_deis' =>113314,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Confraternidad','alias'=>'Centro de Salud Familiar Confraternidad','type'=>12,'code_deis' =>113315,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Carol Urzúa','alias'=>'Centro de Salud Familiar Carol Urzúa','type'=>12,'code_deis' =>113316,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Laura','alias'=>'Centro de Salud Familiar Santa Laura','type'=>12,'code_deis' =>113317,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Miguel Ángel Solar (ex CESFAM Paine)','alias'=>'Centro de Salud Familiar Dr. Miguel Ángel Solar (ex CESFAM Paine)','type'=>12,'code_deis' =>113318,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Raúl Moya','alias'=>'Centro de Salud Familiar Dr. Raúl Moya','type'=>12,'code_deis' =>113319,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Maipo','alias'=>'Centro de Salud Familiar Maipo','type'=>12,'code_deis' =>113320,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Calera de Tango','alias'=>'Centro de Salud Familiar Calera de Tango','type'=>12,'code_deis' =>113321,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Teresa de Los Andes','alias'=>'Centro de Salud Familiar Santa Teresa de Los Andes','type'=>12,'code_deis' =>113322,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Mario Salcedo','alias'=>'Centro de Salud Familiar Dr. Mario Salcedo','type'=>12,'code_deis' =>113323,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dra. Haydeé López Casoou','alias'=>'Centro de Salud Familiar Dra. Haydeé López Casoou','type'=>12,'code_deis' =>113324,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Eduardo Frei Montalva','alias'=>'Centro de Salud Familiar Eduardo Frei Montalva','type'=>12,'code_deis' =>113326,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Padre Joan Alsina','alias'=>'Centro de Salud Familiar Padre Joan Alsina','type'=>12,'code_deis' =>113328,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Canciller Orlando Letelier','alias'=>'Centro de Salud Familiar Canciller Orlando Letelier','type'=>12,'code_deis' =>113329,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Raúl Brañes F.','alias'=>'Centro de Salud Familiar Raúl Brañes F.','type'=>12,'code_deis' =>113330,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Edgardo Enríquez Fröedden','alias'=>'Centro de Salud Familiar Edgardo Enríquez Fröedden','type'=>12,'code_deis' =>113331,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Pablo II','alias'=>'Centro de Salud Familiar Juan Pablo II','type'=>12,'code_deis' =>113332,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Alto Jahuel','alias'=>'Centro de Salud Familiar Alto Jahuel','type'=>12,'code_deis' =>113333,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Los Bajos de San Agustín','alias'=>'Centro de Salud Familiar Los Bajos de San Agustín','type'=>12,'code_deis' =>113334,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'COSAM El Bosque','alias'=>'COSAM El Bosque','type'=>14,'code_deis' =>113337,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Pedro Aguirre Cerda','alias'=>'COSAM Pedro Aguirre Cerda','type'=>14,'code_deis' =>113338,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'COSAM San Bernardo','alias'=>'COSAM San Bernardo','type'=>14,'code_deis' =>113339,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'COSAM San Joaquín','alias'=>'COSAM San Joaquín','type'=>14,'code_deis' =>113341,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Héctor García','alias'=>'Centro de Salud Familiar Dr. Héctor García','type'=>12,'code_deis' =>113390,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar El Manzano','alias'=>'Centro de Salud Familiar El Manzano','type'=>12,'code_deis' =>113394,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Imagenología Mamaria Metropolitano','alias'=>'Centro de Imagenología Mamaria Metropolitano','type'=>24,'code_deis' =>113395,'service' =>19,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Pueblo Lo Espejo','alias'=>'Centro de Salud Familiar Pueblo Lo Espejo','type'=>12,'code_deis' =>113396,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Dr. Ramón Galindo','alias'=>'Centro Comunitario de Salud Familiar Dr. Ramón Galindo','type'=>16,'code_deis' =>113402,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Valdivia de Paine','alias'=>'Posta de Salud Rural Valdivia de Paine','type'=>13,'code_deis' =>113404,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Viluco','alias'=>'Posta de Salud Rural Viluco','type'=>13,'code_deis' =>113405,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Recurso','alias'=>'Posta de Salud Rural El Recurso','type'=>13,'code_deis' =>113406,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Morros','alias'=>'Posta de Salud Rural Los Morros','type'=>13,'code_deis' =>113407,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pintué','alias'=>'Posta de Salud Rural Pintué','type'=>13,'code_deis' =>113408,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huelquén','alias'=>'Posta de Salud Rural Huelquén','type'=>13,'code_deis' =>113409,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rangue','alias'=>'Posta de Salud Rural Rangue','type'=>13,'code_deis' =>113410,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Abrantes','alias'=>'Posta de Salud Rural Abrantes','type'=>13,'code_deis' =>113411,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chada','alias'=>'Posta de Salud Rural Chada','type'=>13,'code_deis' =>113412,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Inés','alias'=>'Posta de Salud Rural Santa Inés','type'=>13,'code_deis' =>113413,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Lo Espejo','alias'=>'COSAM Lo Espejo','type'=>14,'code_deis' =>113642,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Yalta','alias'=>'Centro Comunitario de Salud Familiar Yalta','type'=>16,'code_deis' =>113701,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Sierra Bella','alias'=>'Centro Comunitario de Salud Familiar Sierra Bella','type'=>16,'code_deis' =>113702,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Cooperación','alias'=>'Centro Comunitario de Salud Familiar Cooperación','type'=>16,'code_deis' =>113703,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Ribera del Maipo','alias'=>'Centro Comunitario de Salud Familiar Ribera del Maipo','type'=>16,'code_deis' =>113713,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Rapa Nui','alias'=>'Centro Comunitario de Salud Familiar Rapa Nui','type'=>16,'code_deis' =>113716,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Santa Laura','alias'=>'Centro Comunitario de Salud Familiar Santa Laura','type'=>16,'code_deis' =>113717,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Juan Aravena','alias'=>'Centro Comunitario de Salud Familiar Juan Aravena','type'=>16,'code_deis' =>113722,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Lo Herrera','alias'=>'Centro Comunitario de Salud Familiar Lo Herrera','type'=>16,'code_deis' =>113728,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Reverendo Javier Peró','alias'=>'Centro Comunitario de Salud Familiar Reverendo Javier Peró','type'=>16,'code_deis' =>113753,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Dr. Héctor García','alias'=>'Centro Comunitario de Salud Familiar Dr. Héctor García','type'=>16,'code_deis' =>113790,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Recreo','alias'=>'SAPU Recreo','type'=>20,'code_deis' =>113802,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAR Dr. Amador Neghme R.','alias'=>'SAR Dr. Amador Neghme R.','type'=>20,'code_deis' =>113803,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU La Feria','alias'=>'SAPU La Feria','type'=>20,'code_deis' =>113806,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Padre Esteban Gumucio','alias'=>'SAPU Padre Esteban Gumucio','type'=>20,'code_deis' =>113807,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Clara Estrella','alias'=>'SAPU Clara Estrella','type'=>20,'code_deis' =>113808,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Julio Acuña Pinzón','alias'=>'SAPU Julio Acuña Pinzón','type'=>20,'code_deis' =>113809,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dental Valledor Tres','alias'=>'SAPU Dental Valledor Tres','type'=>20,'code_deis' =>113810,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Carlos Lorca','alias'=>'SAPU Dr. Carlos Lorca','type'=>20,'code_deis' =>113812,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Raúl Cuevas (Ex San Bernardo)','alias'=>'SAPU Raúl Cuevas (Ex San Bernardo)','type'=>20,'code_deis' =>113813,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Cóndores de Chile','alias'=>'SAPU Cóndores de Chile','type'=>20,'code_deis' =>113814,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Confraternidad','alias'=>'SAPU Confraternidad','type'=>20,'code_deis' =>113815,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Paine','alias'=>'SAPU Paine','type'=>20,'code_deis' =>113818,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dra. Mariela Salgado','alias'=>'SAPU Dra. Mariela Salgado','type'=>20,'code_deis' =>113820,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Santa Teresa de Los Andes','alias'=>'SAPU Santa Teresa de Los Andes','type'=>20,'code_deis' =>113822,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAR Haydee López','alias'=>'SAR Haydee López','type'=>20,'code_deis' =>113823,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Eduardo Frei Montalva','alias'=>'SAPU Eduardo Frei Montalva','type'=>20,'code_deis' =>113826,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Padre Joan Alsina','alias'=>'SAPU Padre Joan Alsina','type'=>20,'code_deis' =>113828,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAR Eugenia Muñoz Dalmatín','alias'=>'SAR Eugenia Muñoz Dalmatín','type'=>20,'code_deis' =>113829,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Raúl Brañes F.','alias'=>'SAPU Raúl Brañes F.','type'=>20,'code_deis' =>113830,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Edgardo Enríquez Froedden','alias'=>'SAPU Edgardo Enríquez Froedden','type'=>20,'code_deis' =>113831,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Juan Pablo II','alias'=>'SAPU Juan Pablo II','type'=>20,'code_deis' =>113832,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Buin','alias'=>'SAPU Buin','type'=>20,'code_deis' =>113890,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Sur Oriente)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Metropolitano Sur Oriente)','type'=>1,'code_deis' =>114010,'service' =>21,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Metropolitano Sur Oriente)','alias'=>'PRAIS (S.S Metropolitano Sur Oriente)','type'=>2,'code_deis' =>114011,'service' =>21,'dependency' =>1]);
Organization::Create(['name' => 'Complejo Hospitalario Dr. Sótero del Río (Santiago, Puente Alto)','alias'=>'Complejo Hospitalario Dr. Sótero del Río (Santiago, Puente Alto)','type'=>5,'code_deis' =>114101,'service' =>21,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San José de Maipo','alias'=>'Hospital San José de Maipo','type'=>23,'code_deis' =>114102,'service' =>21,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Padre Alberto Hurtado (San Ramón)','alias'=>'Hospital Padre Alberto Hurtado (San Ramón)','type'=>5,'code_deis' =>114103,'service' =>21,'dependency' =>7]);
Organization::Create(['name' => 'Hospital Metropolitano (Ex Militar)','alias'=>'Hospital Metropolitano (Ex Militar)','type'=>5,'code_deis' =>114104,'service' =>17,'dependency' =>8]);
Organization::Create(['name' => 'Hospital Clínico Metropolitano La Florida Dra. Eloísa Díaz Insunza','alias'=>'Hospital Clínico Metropolitano La Florida Dra. Eloísa Díaz Insunza','type'=>5,'code_deis' =>114105,'service' =>21,'dependency' =>1]);
Organization::Create(['name' => 'Centro Metropolitano de Sangre y Tejidos','alias'=>'Centro Metropolitano de Sangre y Tejidos','type'=>24,'code_deis' =>114161,'service' =>21,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Psiquiatrica Raquel Gaete','alias'=>'Clínica Psiquiatrica Raquel Gaete','type'=>6,'code_deis' =>114202,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Enfermedades Respiratorias Infantiles Josefina Martínez (D)','alias'=>'Centro de Enfermedades Respiratorias Infantiles Josefina Martínez (D)','type'=>23,'code_deis' =>114204,'service' =>21,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Rehabilitación Capredena','alias'=>'Centro de Rehabilitación Capredena','type'=>8,'code_deis' =>114206,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Clínica Santa Elena','alias'=>'Clínica Santa Elena','type'=>6,'code_deis' =>114209,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Familia','alias'=>'Clínica Familia','type'=>6,'code_deis' =>114212,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Vida Integra de Puente Alto','alias'=>'Centro Vida Integra de Puente Alto','type'=>8,'code_deis' =>114215,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC La Florida','alias'=>'Centro de Salud Mutual CChC La Florida','type'=>8,'code_deis' =>114220,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Integramédica Tobalaba','alias'=>'Centro Integramédica Tobalaba','type'=>8,'code_deis' =>114221,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Integramédica La Florida','alias'=>'Centro Integramédica La Florida','type'=>8,'code_deis' =>114222,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Vespucio','alias'=>'Clínica Vespucio','type'=>6,'code_deis' =>114223,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Vida Integra de La Florida','alias'=>'Centro Vida Integra de La Florida','type'=>8,'code_deis' =>114224,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Astra La Florida','alias'=>'Clínica Astra La Florida','type'=>6,'code_deis' =>114227,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS La Florida','alias'=>'Centro Asistencial AChS La Florida','type'=>8,'code_deis' =>114228,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Asistencial AChS Puente Alto','alias'=>'Centro Asistencial AChS Puente Alto','type'=>8,'code_deis' =>114229,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Astra Puente Alto','alias'=>'Clínica Astra Puente Alto','type'=>6,'code_deis' =>114230,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud La Florida','alias'=>'Centro Médico y Dental Megasalud La Florida','type'=>17,'code_deis' =>114231,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Puente Alto','alias'=>'Centro Médico y Dental Megasalud Puente Alto','type'=>17,'code_deis' =>114232,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Vida Integra','alias'=>'Laboratorio Vida Integra','type'=>10,'code_deis' =>114233,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Puente Alto','alias'=>'Centro de Salud Mutual CChC Puente Alto','type'=>8,'code_deis' =>114234,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Medicina Nuclear Sur Ltda','alias'=>'Laboratorio Medicina Nuclear Sur Ltda','type'=>10,'code_deis' =>114235,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Integramédica Puente Alto','alias'=>'Integramédica Puente Alto','type'=>8,'code_deis' =>114236,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Alejandro del Río','alias'=>'Centro de Salud Familiar Dr. Alejandro del Río','type'=>12,'code_deis' =>114301,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Los Castaños','alias'=>'Centro de Salud Familiar Los Castaños','type'=>12,'code_deis' =>114302,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Bellavista','alias'=>'Centro de Salud Familiar Bellavista','type'=>12,'code_deis' =>114303,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Villa OHiggins','alias'=>'Centro de Salud Familiar Villa OHiggins','type'=>12,'code_deis' =>114304,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Los Quillayes','alias'=>'Centro de Salud Familiar Los Quillayes','type'=>12,'code_deis' =>114305,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Granja','alias'=>'Centro de Salud Familiar La Granja','type'=>12,'code_deis' =>114306,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Bandera','alias'=>'Centro de Salud Familiar La Bandera','type'=>12,'code_deis' =>114307,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Rafael','alias'=>'Centro de Salud Familiar San Rafael','type'=>12,'code_deis' =>114308,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pablo de Rokha','alias'=>'Centro de Salud Familiar Pablo de Rokha','type'=>12,'code_deis' =>114309,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. José Manuel Balmaceda','alias'=>'Centro de Salud Familiar Dr. José Manuel Balmaceda','type'=>12,'code_deis' =>114310,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santiago de Nueva Extremadura','alias'=>'Centro de Salud Familiar Santiago de Nueva Extremadura','type'=>12,'code_deis' =>114311,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Gerónimo','alias'=>'Centro de Salud Familiar San Gerónimo','type'=>12,'code_deis' =>114312,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Vista Hermosa','alias'=>'Centro de Salud Familiar Vista Hermosa','type'=>12,'code_deis' =>114313,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Salvador Allende (Ex Consultorio San Ramón)','alias'=>'Centro de Salud Familiar Dr. Salvador Allende (Ex Consultorio San Ramón)','type'=>12,'code_deis' =>114314,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Malaquías Concha','alias'=>'Centro de Salud Familiar Malaquías Concha','type'=>12,'code_deis' =>114315,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Fernando Maffioletti','alias'=>'Centro de Salud Familiar Dr. Fernando Maffioletti','type'=>12,'code_deis' =>114316,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santo Tomás','alias'=>'Centro de Salud Familiar Santo Tomás','type'=>12,'code_deis' =>114317,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Flor Fernández','alias'=>'Centro de Salud Familiar Flor Fernández','type'=>12,'code_deis' =>114318,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar El Roble','alias'=>'Centro de Salud Familiar El Roble','type'=>12,'code_deis' =>114319,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Bernardo Leighton','alias'=>'Centro de Salud Familiar Bernardo Leighton','type'=>12,'code_deis' =>114320,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cardenal Silva Henríquez','alias'=>'Centro de Salud Familiar Cardenal Silva Henríquez','type'=>12,'code_deis' =>114321,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Padre Manuel Villaseca','alias'=>'Centro de Salud Familiar Padre Manuel Villaseca','type'=>12,'code_deis' =>114322,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Madre Teresa de Calcuta Red de Salud UC CHRISTUS','alias'=>'Centro de Salud Familiar Madre Teresa de Calcuta Red de Salud UC CHRISTUS','type'=>12,'code_deis' =>114323,'service' =>21,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Amalia','alias'=>'Centro de Salud Familiar Santa Amalia','type'=>12,'code_deis' =>114324,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Granja Sur','alias'=>'Centro de Salud Familiar Granja Sur','type'=>12,'code_deis' =>114325,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Karol Wojtyla','alias'=>'Centro de Salud Familiar Karol Wojtyla','type'=>12,'code_deis' =>114326,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Pablo II Red de Salud UC CHRISTUS','alias'=>'Centro de Salud Familiar Juan Pablo II Red de Salud UC CHRISTUS','type'=>12,'code_deis' =>114327,'service' =>21,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Salud Familiar Poetisa Gabriela Mistral','alias'=>'Centro de Salud Familiar Poetisa Gabriela Mistral','type'=>12,'code_deis' =>114328,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Alberto Hurtado Red de Salud UC CHRISTUS','alias'=>'Centro de Salud Familiar San Alberto Hurtado Red de Salud UC CHRISTUS','type'=>12,'code_deis' =>114329,'service' =>21,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Salud Familiar Trinidad','alias'=>'Centro de Salud Familiar Trinidad','type'=>12,'code_deis' =>114330,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Florida','alias'=>'Centro de Salud Familiar La Florida','type'=>12,'code_deis' =>114331,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Laurita Vicuña','alias'=>'Centro de Salud Familiar Laurita Vicuña','type'=>12,'code_deis' =>114332,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Rural El Principal','alias'=>'Centro de Salud Rural El Principal','type'=>12,'code_deis' =>114333,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar José Alvo','alias'=>'Centro de Salud Familiar José Alvo','type'=>12,'code_deis' =>114334,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puntilla','alias'=>'Posta de Salud Rural Puntilla','type'=>13,'code_deis' =>114401,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Rita','alias'=>'Posta de Salud Rural Santa Rita','type'=>13,'code_deis' =>114403,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Vicente','alias'=>'Posta de Salud Rural San Vicente','type'=>13,'code_deis' =>114406,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Vertientes','alias'=>'Posta de Salud Rural Las Vertientes','type'=>13,'code_deis' =>114407,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Volcán','alias'=>'Posta de Salud Rural El Volcán','type'=>13,'code_deis' =>114408,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Perdices','alias'=>'Posta de Salud Rural Las Perdices','type'=>13,'code_deis' =>114409,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Gabriel','alias'=>'Posta de Salud Rural San Gabriel','type'=>13,'code_deis' =>114410,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'COSAM La Bandera','alias'=>'COSAM La Bandera','type'=>14,'code_deis' =>114606,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'COSAM La Rinconada','alias'=>'COSAM La Rinconada','type'=>14,'code_deis' =>114607,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'COSAM La Granja','alias'=>'COSAM La Granja','type'=>14,'code_deis' =>114608,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'COSAM La Pintana','alias'=>'COSAM La Pintana','type'=>14,'code_deis' =>114609,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'COSAM La Florida','alias'=>'COSAM La Florida','type'=>14,'code_deis' =>114610,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Puente Alto','alias'=>'COSAM Puente Alto','type'=>14,'code_deis' =>114611,'service' =>21,'dependency' =>4]);
Organization::Create(['name' => 'COSAM Pirque','alias'=>'COSAM Pirque','type'=>14,'code_deis' =>114612,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'COSAM CEIF Centro','alias'=>'COSAM CEIF Centro','type'=>14,'code_deis' =>114613,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Millalemu','alias'=>'Centro Comunitario de Salud Familiar Millalemu','type'=>16,'code_deis' =>114706,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Modelo','alias'=>'Centro Comunitario de Salud Familiar Modelo','type'=>16,'code_deis' =>114714,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar San Gregorio','alias'=>'Centro Comunitario de Salud Familiar San Gregorio','type'=>16,'code_deis' =>114796,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Alejandro del Río','alias'=>'SAPU Dr. Alejandro del Río','type'=>20,'code_deis' =>114801,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Los Castaños','alias'=>'SAPU Los Castaños','type'=>20,'code_deis' =>114802,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Villa OHiggins','alias'=>'SAPU Villa OHiggins','type'=>20,'code_deis' =>114804,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Los Quillayes','alias'=>'SAPU Los Quillayes','type'=>20,'code_deis' =>114805,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU La Granja','alias'=>'SAPU La Granja','type'=>20,'code_deis' =>114806,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU La Bandera','alias'=>'SAPU La Bandera','type'=>20,'code_deis' =>114807,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU San Rafael','alias'=>'SAPU San Rafael','type'=>20,'code_deis' =>114808,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Pablo de Rokha','alias'=>'SAPU Pablo de Rokha','type'=>20,'code_deis' =>114809,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Santiago de Nueva Extremadura','alias'=>'SAPU Santiago de Nueva Extremadura','type'=>20,'code_deis' =>114811,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU San Gerónimo','alias'=>'SAPU San Gerónimo','type'=>20,'code_deis' =>114812,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU San Ramón','alias'=>'SAPU San Ramón','type'=>20,'code_deis' =>114814,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Fernando Maffioletti','alias'=>'SAPU Dr. Fernando Maffioletti','type'=>20,'code_deis' =>114816,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Santo Tomás','alias'=>'SAPU Santo Tomás','type'=>20,'code_deis' =>114817,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU El Roble','alias'=>'SAPU El Roble','type'=>20,'code_deis' =>114819,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Bernardo Leighton','alias'=>'SAPU Bernardo Leighton','type'=>20,'code_deis' =>114820,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Cardenal Silva Henríquez de Puente Alto','alias'=>'SAPU Cardenal Silva Henríquez de Puente Alto','type'=>20,'code_deis' =>114821,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAR Padre Manuel Villaseca','alias'=>'SAR Padre Manuel Villaseca','type'=>20,'code_deis' =>114822,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Santa Amalia','alias'=>'SAPU Santa Amalia','type'=>20,'code_deis' =>114824,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Granja Sur','alias'=>'SAPU Granja Sur','type'=>20,'code_deis' =>114825,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Karol Wojtyla','alias'=>'SAPU Karol Wojtyla','type'=>20,'code_deis' =>114826,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Poetisa Gabriela Mistral','alias'=>'SAPU Poetisa Gabriela Mistral','type'=>20,'code_deis' =>114828,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU La Florida','alias'=>'SAPU La Florida','type'=>20,'code_deis' =>114831,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Del Libertador Bernardo OHiggins)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Del Libertador Bernardo OHiggins)','type'=>1,'code_deis' =>115010,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Del Libertador Bernardo OHiggins)','alias'=>'PRAIS (S.S Del Libertador Bernardo OHiggins)','type'=>2,'code_deis' =>115011,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. PW4103 (Rancagua)','alias'=>'Clínica Dental Móvil Triple. Pat. PW4103 (Rancagua)','type'=>3,'code_deis' =>115012,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Regional de Rancagua','alias'=>'Hospital Regional de Rancagua','type'=>5,'code_deis' =>115100,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Santa Filomena de Graneros','alias'=>'Hospital Santa Filomena de Graneros','type'=>22,'code_deis' =>115101,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Coínco','alias'=>'Hospital de Coínco','type'=>22,'code_deis' =>115102,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Del Salvador de Peumo','alias'=>'Hospital Del Salvador de Peumo','type'=>22,'code_deis' =>115103,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Ricardo Valenzuela Sáez (Rengo)','alias'=>'Hospital Dr. Ricardo Valenzuela Sáez (Rengo)','type'=>23,'code_deis' =>115104,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Vicente de Tagua -Tagua','alias'=>'Hospital San Vicente de Tagua -Tagua','type'=>22,'code_deis' =>115105,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Pichidegua','alias'=>'Hospital de Pichidegua','type'=>22,'code_deis' =>115106,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Juan de Dios de San Fernando','alias'=>'Hospital San Juan de Dios de San Fernando','type'=>5,'code_deis' =>115107,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Mercedes de Chimbarongo','alias'=>'Hospital Mercedes de Chimbarongo','type'=>22,'code_deis' =>115108,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Nancagua','alias'=>'Hospital de Nancagua','type'=>22,'code_deis' =>115109,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Santa Cruz','alias'=>'Hospital de Santa Cruz','type'=>23,'code_deis' =>115110,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Marchigüe','alias'=>'Hospital de Marchigüe','type'=>22,'code_deis' =>115111,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Pichilemu','alias'=>'Hospital de Pichilemu','type'=>22,'code_deis' =>115112,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Lolol','alias'=>'Hospital de Lolol','type'=>22,'code_deis' =>115113,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Litueche','alias'=>'Hospital de Litueche','type'=>22,'code_deis' =>115114,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Hospital del Trabajador AChS','alias'=>'Hospital del Trabajador AChS','type'=>7,'code_deis' =>115202,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Mutual de Seguridad CChC Rancagua','alias'=>'Clínica Mutual de Seguridad CChC Rancagua','type'=>6,'code_deis' =>115203,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Clínica del Trabajador AChS San Fernando','alias'=>'Clínica del Trabajador AChS San Fernando','type'=>6,'code_deis' =>115204,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Clínico Fusat Rancagua','alias'=>'Hospital Clínico Fusat Rancagua','type'=>7,'code_deis' =>115206,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Neumann & Bertin Ltda.','alias'=>'Vacunatorio Neumann & Bertin Ltda.','type'=>18,'code_deis' =>115214,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Isamedica','alias'=>'Clínica Isamedica','type'=>6,'code_deis' =>115221,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Clínica de Salud Integral','alias'=>'Clínica de Salud Integral','type'=>6,'code_deis' =>115222,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Mella','alias'=>'Clínica Mella','type'=>6,'code_deis' =>115231,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro Intersalud Rancagua','alias'=>'Centro Intersalud Rancagua','type'=>8,'code_deis' =>115235,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Megasalud S.A. Centro Médico y Dental Rancagua','alias'=>'Megasalud S.A. Centro Médico y Dental Rancagua','type'=>17,'code_deis' =>115236,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Penitenciario de Rancagua','alias'=>'Hospital Penitenciario de Rancagua','type'=>7,'code_deis' =>115241,'service' =>23,'dependency' =>4]);
Organization::Create(['name' => 'Centro Médico y Dental Tipo B','alias'=>'Centro Médico y Dental Tipo B','type'=>17,'code_deis' =>115242,'service' =>23,'dependency' =>5]);
Organization::Create(['name' => 'Centro Médico OCarrol Salud','alias'=>'Centro Médico OCarrol Salud','type'=>8,'code_deis' =>115243,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Alemán','alias'=>'Laboratorio Clínico Alemán','type'=>10,'code_deis' =>115244,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Torre Médica','alias'=>'Laboratorio Torre Médica','type'=>10,'code_deis' =>115247,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio San Lucas','alias'=>'Laboratorio San Lucas','type'=>10,'code_deis' =>115248,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Pasteur','alias'=>'Laboratorio Clínico Pasteur','type'=>10,'code_deis' =>115249,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Lantadilla','alias'=>'Centro Médico Lantadilla','type'=>8,'code_deis' =>115250,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Vita Nova Alameda','alias'=>'Laboratorio Vita Nova Alameda','type'=>10,'code_deis' =>115251,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Indira (Colon)','alias'=>'Laboratorio Clínico Indira (Colon)','type'=>10,'code_deis' =>115252,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico del Carmen','alias'=>'Laboratorio Clínico del Carmen','type'=>10,'code_deis' =>115253,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Márquez y Guajardo Ltda.','alias'=>'Laboratorio Márquez y Guajardo Ltda.','type'=>10,'code_deis' =>115254,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Medisalud','alias'=>'Laboratorio Medisalud','type'=>10,'code_deis' =>115256,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Coloma','alias'=>'Laboratorio Clínico Coloma','type'=>10,'code_deis' =>115257,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Los Peumos','alias'=>'Laboratorio Clínico Los Peumos','type'=>10,'code_deis' =>115258,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Virginia Sáenz Fuenzalida','alias'=>'Laboratorio Clínico Virginia Sáenz Fuenzalida','type'=>10,'code_deis' =>115259,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Salud Plus','alias'=>'Laboratorio Clínico Salud Plus','type'=>10,'code_deis' =>115260,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Laboratorio Clínico Santa Cruz','alias'=>'Centro Médico y Laboratorio Clínico Santa Cruz','type'=>8,'code_deis' =>115261,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Centrolab','alias'=>'Laboratorio Centrolab','type'=>10,'code_deis' =>115262,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Análisis','alias'=>'Laboratorio Clínico Análisis','type'=>10,'code_deis' =>115263,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Oscar Zúñiga Serrano','alias'=>'Laboratorio Oscar Zúñiga Serrano','type'=>10,'code_deis' =>115264,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clinilab','alias'=>'Laboratorio Clinilab','type'=>10,'code_deis' =>115265,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Clínica San Francisco','alias'=>'Clínica San Francisco','type'=>6,'code_deis' =>115266,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico San Vicente','alias'=>'Laboratorio Clínico San Vicente','type'=>10,'code_deis' =>115267,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Rancagua','alias'=>'Laboratorio Clínico Bionet S.A. - Rancagua','type'=>10,'code_deis' =>115268,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico CORMUN de Rancagua','alias'=>'Laboratorio Clínico CORMUN de Rancagua','type'=>10,'code_deis' =>115269,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Labdiagnotic','alias'=>'Laboratorio Clínico Labdiagnotic','type'=>10,'code_deis' =>115270,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud y Prevención AChS San Vicente de Tagua Tagua','alias'=>'Centro de Salud y Prevención AChS San Vicente de Tagua Tagua','type'=>8,'code_deis' =>115271,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad AChS Santa Cruz','alias'=>'Policlínico de la Asociación Chilena de Seguridad AChS Santa Cruz','type'=>8,'code_deis' =>115272,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad AChS Rengo','alias'=>'Policlínico de la Asociación Chilena de Seguridad AChS Rengo','type'=>8,'code_deis' =>115273,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar N° 1 Dr. Enrique Dintrans','alias'=>'Centro de Salud Familiar N° 1 Dr. Enrique Dintrans','type'=>12,'code_deis' =>115300,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar N° 2 Dr. Eduardo Geyter','alias'=>'Centro de Salud Familiar N° 2 Dr. Eduardo Geyter','type'=>12,'code_deis' =>115301,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar N° 3 Dr. Abel Zapata','alias'=>'Centro de Salud Familiar N° 3 Dr. Abel Zapata','type'=>12,'code_deis' =>115302,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Nº 4 Dra. María Latife','alias'=>'Centro de Salud Familiar Nº 4 Dra. María Latife','type'=>12,'code_deis' =>115303,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar N° 5 Dr. Juan Chiorrini','alias'=>'Centro de Salud Familiar N° 5 Dr. Juan Chiorrini','type'=>12,'code_deis' =>115304,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Osvaldo Ruz Orrego de Machalí','alias'=>'Centro de Salud Familiar Dr. Osvaldo Ruz Orrego de Machalí','type'=>12,'code_deis' =>115305,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Francisco Mostazal','alias'=>'Centro de Salud Familiar San Francisco Mostazal','type'=>12,'code_deis' =>115306,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Codegua','alias'=>'Centro de Salud Familiar Codegua','type'=>12,'code_deis' =>115307,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Doñihue','alias'=>'Centro de Salud Familiar Doñihue','type'=>12,'code_deis' =>115308,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Francisco Labrin de Coltauco','alias'=>'Centro de Salud Familiar Francisco Labrin de Coltauco','type'=>12,'code_deis' =>115309,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Requínoa','alias'=>'Centro de Salud Familiar Requínoa','type'=>12,'code_deis' =>115310,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Las Cabras','alias'=>'Centro de Salud Familiar Las Cabras','type'=>12,'code_deis' =>115311,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quinta de Tilcoco','alias'=>'Centro de Salud Familiar Quinta de Tilcoco','type'=>12,'code_deis' =>115312,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Peralillo','alias'=>'Centro de Salud Familiar Peralillo','type'=>12,'code_deis' =>115313,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Estrella','alias'=>'Centro de Salud Familiar La Estrella','type'=>12,'code_deis' =>115314,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Chépica','alias'=>'Centro de Salud Familiar Chépica','type'=>12,'code_deis' =>115315,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Paredones','alias'=>'Centro de Salud Familiar Paredones','type'=>12,'code_deis' =>115316,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Chacabuco','alias'=>'Centro de Salud Familiar Chacabuco','type'=>12,'code_deis' =>115317,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio Placilla (Placilla)','alias'=>'Consultorio Placilla (Placilla)','type'=>12,'code_deis' =>115318,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Cruz','alias'=>'Centro de Salud Familiar Santa Cruz','type'=>12,'code_deis' =>115319,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Valle Mar Navidad','alias'=>'Centro de Salud Familiar Valle Mar Navidad','type'=>12,'code_deis' =>115320,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lo Miranda','alias'=>'Centro de Salud Familiar Lo Miranda','type'=>12,'code_deis' =>115321,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Rosario','alias'=>'Centro de Salud Familiar Rosario','type'=>12,'code_deis' =>115322,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Oriente de San Fernando','alias'=>'Centro de Salud Familiar Oriente de San Fernando','type'=>12,'code_deis' =>115323,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar N° 6 Ignacio Caroca','alias'=>'Centro de Salud Familiar N° 6 Ignacio Caroca','type'=>12,'code_deis' =>115324,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar de Malloa','alias'=>'Centro de Salud Familiar de Malloa','type'=>12,'code_deis' =>115325,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar de Pelequen','alias'=>'Centro de Salud Familiar de Pelequen','type'=>12,'code_deis' =>115326,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Olivar Alto','alias'=>'Centro de Salud Familiar Olivar Alto','type'=>12,'code_deis' =>115327,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cunaco','alias'=>'Centro de Salud Familiar Cunaco','type'=>12,'code_deis' =>115328,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Rengo','alias'=>'Centro de Salud Familiar Rengo','type'=>12,'code_deis' =>115329,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Gultro','alias'=>'Centro de Salud Familiar Gultro','type'=>12,'code_deis' =>115330,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Esperanza','alias'=>'Centro de Salud Familiar La Esperanza','type'=>12,'code_deis' =>115331,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Referencia de Salud CREF La Brújula','alias'=>'Centro de Referencia de Salud CREF La Brújula','type'=>25,'code_deis' =>115351,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coya','alias'=>'Posta de Salud Rural Coya','type'=>13,'code_deis' =>115400,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Punta','alias'=>'Posta de Salud Rural La Punta','type'=>13,'code_deis' =>115401,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Carmen ( Las Cabras)','alias'=>'Posta de Salud Rural El Carmen ( Las Cabras)','type'=>13,'code_deis' =>115404,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Idahue','alias'=>'Posta de Salud Rural Idahue','type'=>13,'code_deis' =>115405,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rinconada de Parral','alias'=>'Posta de Salud Rural Rinconada de Parral','type'=>13,'code_deis' =>115406,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lo de Cuevas','alias'=>'Posta de Salud Rural Lo de Cuevas','type'=>13,'code_deis' =>115407,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Abra','alias'=>'Posta de Salud Rural El Abra','type'=>13,'code_deis' =>115409,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Totihue','alias'=>'Posta de Salud Rural Totihue','type'=>13,'code_deis' =>115410,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Lirios','alias'=>'Posta de Salud Rural Los Lirios','type'=>13,'code_deis' =>115411,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Panchina','alias'=>'Posta de Salud Rural La Panchina','type'=>13,'code_deis' =>115412,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Cebada','alias'=>'Posta de Salud Rural La Cebada','type'=>13,'code_deis' =>115413,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Inés','alias'=>'Posta de Salud Rural Santa Inés','type'=>13,'code_deis' =>115414,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Manzano','alias'=>'Posta de Salud Rural El Manzano','type'=>13,'code_deis' =>115415,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Llallauquén','alias'=>'Posta de Salud Rural Llallauquén','type'=>13,'code_deis' =>115416,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Popeta','alias'=>'Posta de Salud Rural Popeta','type'=>13,'code_deis' =>115417,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cerrillos (Rengo)','alias'=>'Posta de Salud Rural Cerrillos (Rengo)','type'=>13,'code_deis' =>115418,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Corcolén','alias'=>'Posta de Salud Rural Corcolén','type'=>13,'code_deis' =>115419,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lo de Lobos','alias'=>'Posta de Salud Rural Lo de Lobos','type'=>13,'code_deis' =>115420,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Viñas','alias'=>'Posta de Salud Rural Las Viñas','type'=>13,'code_deis' =>115421,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Zúñiga','alias'=>'Posta de Salud Rural Zúñiga','type'=>13,'code_deis' =>115424,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pencahue','alias'=>'Posta de Salud Rural Pencahue','type'=>13,'code_deis' =>115425,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rinconada','alias'=>'Posta de Salud Rural Rinconada','type'=>13,'code_deis' =>115426,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Tambo','alias'=>'Posta de Salud Rural El Tambo','type'=>13,'code_deis' =>115427,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Larmahue','alias'=>'Posta de Salud Rural Larmahue','type'=>13,'code_deis' =>115428,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Amelia','alias'=>'Posta de Salud Rural Santa Amelia','type'=>13,'code_deis' =>115429,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Patagua Orilla','alias'=>'Posta de Salud Rural Patagua Orilla','type'=>13,'code_deis' =>115430,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Patagua Cerro','alias'=>'Posta de Salud Rural Patagua Cerro','type'=>13,'code_deis' =>115431,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Roma','alias'=>'Posta de Salud Rural Roma','type'=>13,'code_deis' =>115432,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Durazno (Las Cabras)','alias'=>'Posta de Salud Rural El Durazno (Las Cabras)','type'=>13,'code_deis' =>115433,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puente Negro','alias'=>'Posta de Salud Rural Puente Negro','type'=>13,'code_deis' =>115434,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Dehesa','alias'=>'Posta de Salud Rural La Dehesa','type'=>13,'code_deis' =>115435,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Agua Buena','alias'=>'Posta de Salud Rural Agua Buena','type'=>13,'code_deis' =>115436,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tinguiririca','alias'=>'Posta de Salud Rural Tinguiririca','type'=>13,'code_deis' =>115437,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huemul (Chimbarongo)','alias'=>'Posta de Salud Rural Huemul (Chimbarongo)','type'=>13,'code_deis' =>115438,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Codegua','alias'=>'Posta de Salud Rural Codegua','type'=>13,'code_deis' =>115439,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Juan de La Sierra','alias'=>'Posta de Salud Rural San Juan de La Sierra','type'=>13,'code_deis' =>115440,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Yáquil','alias'=>'Posta de Salud Rural Yáquil','type'=>13,'code_deis' =>115441,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puquillay Bajo','alias'=>'Posta de Salud Rural Puquillay Bajo','type'=>13,'code_deis' =>115442,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quinahue','alias'=>'Posta de Salud Rural Quinahue','type'=>13,'code_deis' =>115443,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Isla de Yáquil','alias'=>'Posta de Salud Rural Isla de Yáquil','type'=>13,'code_deis' =>115444,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar de Palmilla','alias'=>'Centro de Salud Familiar de Palmilla','type'=>12,'code_deis' =>115445,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pupilla','alias'=>'Posta de Salud Rural Pupilla','type'=>13,'code_deis' =>115446,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San José del Carmen','alias'=>'Posta de Salud Rural San José del Carmen','type'=>13,'code_deis' =>115447,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Irene','alias'=>'Posta de Salud Rural Santa Irene','type'=>13,'code_deis' =>115448,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Apalta','alias'=>'Posta de Salud Rural Apalta','type'=>13,'code_deis' =>115449,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Guindo Alto','alias'=>'Posta de Salud Rural Guindo Alto','type'=>13,'code_deis' =>115450,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pumanque','alias'=>'Posta de Salud Rural Pumanque','type'=>13,'code_deis' =>115452,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Población','alias'=>'Posta de Salud Rural Población','type'=>13,'code_deis' =>115453,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Cardos','alias'=>'Posta de Salud Rural Los Cardos','type'=>13,'code_deis' =>115454,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Molineros','alias'=>'Posta de Salud Rural Molineros','type'=>13,'code_deis' =>115455,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Calleuque','alias'=>'Posta de Salud Rural Calleuque','type'=>13,'code_deis' =>115456,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pailimo','alias'=>'Posta de Salud Rural Pailimo','type'=>13,'code_deis' =>115457,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cahuil','alias'=>'Posta de Salud Rural Cahuil','type'=>13,'code_deis' =>115458,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Membrillo','alias'=>'Posta de Salud Rural El Membrillo','type'=>13,'code_deis' =>115459,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pupuya','alias'=>'Posta de Salud Rural Pupuya','type'=>13,'code_deis' =>115460,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alto Ramírez','alias'=>'Posta de Salud Rural Alto Ramírez','type'=>13,'code_deis' =>115461,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rapel (Navidad)','alias'=>'Posta de Salud Rural Rapel (Navidad)','type'=>13,'code_deis' =>115462,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quelentaro','alias'=>'Posta de Salud Rural Quelentaro','type'=>13,'code_deis' =>115463,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Vicente de Pucalán','alias'=>'Posta de Salud Rural San Vicente de Pucalán','type'=>13,'code_deis' =>115464,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Auquinco','alias'=>'Posta de Salud Rural Auquinco','type'=>13,'code_deis' =>115465,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Orilla de Auquinco','alias'=>'Posta de Salud Rural Orilla de Auquinco','type'=>13,'code_deis' =>115466,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Bucalemu (Paredones)','alias'=>'Posta de Salud Rural Bucalemu (Paredones)','type'=>13,'code_deis' =>115467,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Pedro de Alcántara','alias'=>'Posta de Salud Rural San Pedro de Alcántara','type'=>13,'code_deis' =>115468,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rinconada de Alcones','alias'=>'Posta de Salud Rural Rinconada de Alcones','type'=>13,'code_deis' =>115469,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Candelaria ( Chépica)','alias'=>'Posta de Salud Rural Candelaria ( Chépica)','type'=>13,'code_deis' =>115470,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puquillay Alto','alias'=>'Posta de Salud Rural Puquillay Alto','type'=>13,'code_deis' =>115471,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lo Cartagena','alias'=>'Posta de Salud Rural Lo Cartagena','type'=>13,'code_deis' =>115472,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nilahue Cornejo','alias'=>'Posta de Salud Rural Nilahue Cornejo','type'=>13,'code_deis' =>115473,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cardonal de Panilonco','alias'=>'Posta de Salud Rural Cardonal de Panilonco','type'=>13,'code_deis' =>115474,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ranguil','alias'=>'Posta de Salud Rural Ranguil','type'=>13,'code_deis' =>115475,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Roberto','alias'=>'Posta de Salud Rural San Roberto','type'=>13,'code_deis' =>115476,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San José de Marchigue','alias'=>'Posta de Salud Rural San José de Marchigue','type'=>13,'code_deis' =>115477,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lo Moscoso','alias'=>'Posta de Salud Rural Lo Moscoso','type'=>13,'code_deis' =>115478,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pulin','alias'=>'Posta de Salud Rural Pulin','type'=>13,'code_deis' =>115479,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Cabaña','alias'=>'Posta de Salud Rural La Cabaña','type'=>13,'code_deis' =>115480,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Olivar Bajo','alias'=>'Posta de Salud Rural Olivar Bajo','type'=>13,'code_deis' =>115481,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Peor Es Nada','alias'=>'Posta de Salud Rural Peor Es Nada','type'=>13,'code_deis' =>115482,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cocalan','alias'=>'Posta de Salud Rural Cocalan','type'=>13,'code_deis' =>115483,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Idahue','alias'=>'Posta de Salud Rural Idahue','type'=>13,'code_deis' =>115484,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Centro 1 de Rancagua','alias'=>'COSAM Centro 1 de Rancagua','type'=>14,'code_deis' =>115600,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Santa Cruz','alias'=>'COSAM Santa Cruz','type'=>14,'code_deis' =>115601,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar San Rafael','alias'=>'Centro Comunitario de Salud Familiar San Rafael','type'=>16,'code_deis' =>115700,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Dr. Eduardo de Geyter','alias'=>'Centro Comunitario de Salud Familiar Dr. Eduardo de Geyter','type'=>16,'code_deis' =>115701,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Ciudad de Paju','alias'=>'Centro Comunitario de Salud Familiar Ciudad de Paju','type'=>16,'code_deis' =>115703,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Guacarhue','alias'=>'Centro Comunitario de Salud Familiar Guacarhue','type'=>16,'code_deis' =>115712,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Consultorio Chacabuco','alias'=>'Centro Comunitario de Salud Familiar Consultorio Chacabuco','type'=>16,'code_deis' =>115717,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Enrique Dintrans','alias'=>'SAPU Enrique Dintrans','type'=>20,'code_deis' =>115800,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Eduardo de Geyter','alias'=>'SAPU Eduardo de Geyter','type'=>20,'code_deis' =>115801,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Abel Zapata','alias'=>'SAPU Abel Zapata','type'=>20,'code_deis' =>115802,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'SAR María Latife','alias'=>'SAR María Latife','type'=>20,'code_deis' =>115803,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Machalí','alias'=>'SAPU Machalí','type'=>20,'code_deis' =>115805,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Oriente de San Fernando','alias'=>'SAPU Oriente de San Fernando','type'=>20,'code_deis' =>115823,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'SAR Oriente','alias'=>'SAR Oriente','type'=>20,'code_deis' =>115850,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Del Maule)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Del Maule)','type'=>1,'code_deis' =>116010,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Del Maule)','alias'=>'PRAIS (S.S Del Maule)','type'=>2,'code_deis' =>116011,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil (Talca)','alias'=>'Clínica Dental Móvil (Talca)','type'=>3,'code_deis' =>116012,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Italiano','alias'=>'Hospital Italiano','type'=>28,'code_deis' =>116056,'service' =>24,'dependency' =>8]);
Organization::Create(['name' => 'Hospital San Juan de Dios (Curicó)','alias'=>'Hospital San Juan de Dios (Curicó)','type'=>5,'code_deis' =>116100,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Teno','alias'=>'Hospital de Teno','type'=>22,'code_deis' =>116101,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Molina','alias'=>'Hospital de Molina','type'=>22,'code_deis' =>116102,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Hualañé','alias'=>'Hospital de Hualañé','type'=>22,'code_deis' =>116103,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Licantén','alias'=>'Hospital de Licantén','type'=>22,'code_deis' =>116104,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. César Garavagno Burotto (Talca)','alias'=>'Hospital Dr. César Garavagno Burotto (Talca)','type'=>5,'code_deis' =>116105,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Curepto','alias'=>'Hospital de Curepto','type'=>22,'code_deis' =>116106,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Constitución','alias'=>'Hospital de Constitución','type'=>23,'code_deis' =>116107,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Presidente Carlos Ibáñez del Campo (Linares)','alias'=>'Hospital Presidente Carlos Ibáñez del Campo (Linares)','type'=>5,'code_deis' =>116108,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Abel Fuentealba Lagos de San Javier','alias'=>'Hospital Dr. Abel Fuentealba Lagos de San Javier','type'=>23,'code_deis' =>116109,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San José (Parral)','alias'=>'Hospital San José (Parral)','type'=>23,'code_deis' =>116110,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Juan de Dios (Cauquenes)','alias'=>'Hospital San Juan de Dios (Cauquenes)','type'=>23,'code_deis' =>116111,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Benjamín Pedreros (Chanco)','alias'=>'Hospital Dr. Benjamín Pedreros (Chanco)','type'=>22,'code_deis' =>116112,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Centro Reproductivo Regional de Sangre','alias'=>'Centro Reproductivo Regional de Sangre','type'=>24,'code_deis' =>116150,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Asociación Chilena de Seguridad AChS Talca','alias'=>'Asociación Chilena de Seguridad AChS Talca','type'=>8,'code_deis' =>116205,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Talca','alias'=>'Centro de Salud Mutual CChC Talca','type'=>8,'code_deis' =>116209,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Asociación Chilena de Seguridad AChS Curicó','alias'=>'Asociación Chilena de Seguridad AChS Curicó','type'=>8,'code_deis' =>116210,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Curicó','alias'=>'Centro de Salud Mutual CChC Curicó','type'=>8,'code_deis' =>116213,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Linares','alias'=>'Centro de Salud Mutual CChC Linares','type'=>8,'code_deis' =>116215,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Constitución','alias'=>'Centro de Salud Mutual CChC Constitución','type'=>8,'code_deis' =>116216,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Enferdial','alias'=>'Clínica Enferdial','type'=>6,'code_deis' =>116217,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Infantil','alias'=>'Clínica Infantil','type'=>6,'code_deis' =>116218,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Cordillera','alias'=>'Centro Médico Cordillera','type'=>8,'code_deis' =>116219,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Noemí Pérez','alias'=>'Vacunatorio Noemí Pérez','type'=>18,'code_deis' =>116236,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Megasalud S.A Centro Médico y Dental Talca','alias'=>'Megasalud S.A Centro Médico y Dental Talca','type'=>17,'code_deis' =>116261,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Regional Lircay','alias'=>'Clínica Regional Lircay','type'=>6,'code_deis' =>116262,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro La Escalera','alias'=>'Centro La Escalera','type'=>24,'code_deis' =>116265,'service' =>24,'dependency' =>4]);
Organization::Create(['name' => 'CREA Chile','alias'=>'CREA Chile','type'=>24,'code_deis' =>116266,'service' =>24,'dependency' =>4]);
Organization::Create(['name' => 'Nexos Ltda.','alias'=>'Nexos Ltda.','type'=>24,'code_deis' =>116267,'service' =>24,'dependency' =>4]);
Organization::Create(['name' => 'Asociación Chilena de Seguridad AChS Cauquenes','alias'=>'Asociación Chilena de Seguridad AChS Cauquenes','type'=>8,'code_deis' =>116268,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Asociación Chilena de Seguridad AChS Parral','alias'=>'Asociación Chilena de Seguridad AChS Parral','type'=>8,'code_deis' =>116269,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental de Carabineros de Chile VII Zona Maule','alias'=>'Centro Médico y Dental de Carabineros de Chile VII Zona Maule','type'=>17,'code_deis' =>116275,'service' =>25,'dependency' =>5]);
Organization::Create(['name' => 'Clínica Universidad Católica Del Maule','alias'=>'Clínica Universidad Católica Del Maule','type'=>6,'code_deis' =>116276,'service' =>25,'dependency' =>4]);
Organization::Create(['name' => 'Consultorio Prefectura Carabineros Curicó','alias'=>'Consultorio Prefectura Carabineros Curicó','type'=>8,'code_deis' =>116277,'service' =>25,'dependency' =>5]);
Organization::Create(['name' => 'Consultorio Prefectura Carabineros Linares','alias'=>'Consultorio Prefectura Carabineros Linares','type'=>8,'code_deis' =>116278,'service' =>25,'dependency' =>5]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Cauquenes','alias'=>'Centro de Salud Mutual CChC Cauquenes','type'=>8,'code_deis' =>116279,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro De Salud Familiar A.S. Betty Muñoz Arce (Ex Sol de Septiembre)','alias'=>'Centro De Salud Familiar A.S. Betty Muñoz Arce (Ex Sol de Septiembre)','type'=>12,'code_deis' =>116300,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Miguel Ángel Arenas López','alias'=>'Centro de Salud Familiar Miguel Ángel Arenas López','type'=>12,'code_deis' =>116301,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Colón','alias'=>'Centro de Salud Familiar Colón','type'=>12,'code_deis' =>116302,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Curicó Centro','alias'=>'Centro de Salud Familiar Curicó Centro','type'=>12,'code_deis' =>116303,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lontué','alias'=>'Centro de Salud Familiar Lontué','type'=>12,'code_deis' =>116304,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar José Dionisio Astaburuaga','alias'=>'Centro de Salud Familiar José Dionisio Astaburuaga','type'=>12,'code_deis' =>116305,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Florida','alias'=>'Centro de Salud Familiar La Florida','type'=>12,'code_deis' =>116306,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Julio Contardo Urzúa','alias'=>'Centro de Salud Familiar Dr. Julio Contardo Urzúa','type'=>12,'code_deis' =>116307,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Valentín Letelier','alias'=>'Centro de Salud Familiar Valentín Letelier','type'=>12,'code_deis' =>116308,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Juan Dios','alias'=>'Centro de Salud Familiar San Juan Dios','type'=>12,'code_deis' =>116309,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Villa Alegre','alias'=>'Centro de Salud Familiar Villa Alegre','type'=>12,'code_deis' =>116310,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Arrau Méndez','alias'=>'Centro de Salud Familiar Arrau Méndez','type'=>12,'code_deis' =>116311,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pencahue','alias'=>'Centro de Salud Familiar Pencahue','type'=>12,'code_deis' =>116312,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Clemente','alias'=>'Centro de Salud Familiar San Clemente','type'=>12,'code_deis' =>116313,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Maule','alias'=>'Centro de Salud Familiar Maule','type'=>12,'code_deis' =>116314,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pelarco','alias'=>'Centro de Salud Familiar Pelarco','type'=>12,'code_deis' =>116315,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cumpeo','alias'=>'Centro de Salud Familiar Cumpeo','type'=>12,'code_deis' =>116316,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Alcalde Francisco Sepúlveda Salgado','alias'=>'Centro de Salud Familiar Alcalde Francisco Sepúlveda Salgado','type'=>12,'code_deis' =>116317,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Ignacio Carrera Pinto','alias'=>'Centro de Salud Familiar Ignacio Carrera Pinto','type'=>12,'code_deis' =>116318,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Panimávida','alias'=>'Centro de Salud Familiar Panimávida','type'=>12,'code_deis' =>116319,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Amanda Benavente','alias'=>'Centro de Salud Familiar Amanda Benavente','type'=>12,'code_deis' =>116320,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Marta Estévez','alias'=>'Centro de Salud Familiar Marta Estévez','type'=>12,'code_deis' =>116321,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Pedro Rivas Pinochet','alias'=>'Centro de Salud Familiar Dr. Pedro Rivas Pinochet','type'=>12,'code_deis' =>116322,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Oscar Bonilla','alias'=>'Centro de Salud Familiar Oscar Bonilla','type'=>12,'code_deis' =>116323,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Rafael (San Rafael)','alias'=>'Centro de Salud Familiar San Rafael (San Rafael)','type'=>12,'code_deis' =>116324,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Sagrada Familia','alias'=>'Centro de Salud Familiar Sagrada Familia','type'=>12,'code_deis' =>116325,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Villa Prat','alias'=>'Centro de Salud Familiar Villa Prat','type'=>12,'code_deis' =>116326,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Vichuquén','alias'=>'Centro de Salud Familiar Vichuquén','type'=>12,'code_deis' =>116327,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Romeral','alias'=>'Centro de Salud Familiar Romeral','type'=>12,'code_deis' =>116328,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Armando Williams','alias'=>'Centro de Salud Familiar Armando Williams','type'=>12,'code_deis' =>116329,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Sarmiento','alias'=>'Centro de Salud Familiar Sarmiento','type'=>12,'code_deis' =>116330,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Carlos Trupp','alias'=>'Centro de Salud Familiar Carlos Trupp','type'=>12,'code_deis' =>116331,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cerro Alto','alias'=>'Centro de Salud Familiar Cerro Alto','type'=>12,'code_deis' =>116332,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Rauco','alias'=>'Centro de Salud Familiar Rauco','type'=>12,'code_deis' =>116333,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Empedrado','alias'=>'Centro de Salud Familiar Empedrado','type'=>12,'code_deis' =>116334,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Morza','alias'=>'Centro de Salud Familiar Morza','type'=>12,'code_deis' =>116335,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Comalle','alias'=>'Centro de Salud Familiar Comalle','type'=>12,'code_deis' =>116336,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Los Niches','alias'=>'Centro de Salud Familiar Los Niches','type'=>12,'code_deis' =>116338,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Las Américas','alias'=>'Centro de Salud Familiar Las Américas','type'=>12,'code_deis' =>116340,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Ricardo Valdés Hurtado','alias'=>'Centro de Salud Familiar Dr. Ricardo Valdés Hurtado','type'=>12,'code_deis' =>116341,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Carlos Díaz Gidi','alias'=>'Centro de Salud Familiar Dr. Carlos Díaz Gidi','type'=>12,'code_deis' =>116342,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Faustino González','alias'=>'Centro de Salud Familiar Faustino González','type'=>12,'code_deis' =>116343,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Limávida','alias'=>'Posta de Salud Rural Limávida','type'=>13,'code_deis' =>116400,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Monterilla','alias'=>'Posta de Salud Rural Monterilla','type'=>13,'code_deis' =>116401,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pilén','alias'=>'Posta de Salud Rural Pilén','type'=>13,'code_deis' =>116402,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Manzano ( Teno)','alias'=>'Posta de Salud Rural El Manzano ( Teno)','type'=>13,'code_deis' =>116403,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Blanca','alias'=>'Posta de Salud Rural Santa Blanca','type'=>13,'code_deis' =>116404,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Palquibudi','alias'=>'Posta de Salud Rural Palquibudi','type'=>13,'code_deis' =>116405,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Parrón','alias'=>'Posta de Salud Rural El Parrón','type'=>13,'code_deis' =>116406,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pellines (Empedrado)','alias'=>'Posta de Salud Rural Pellines (Empedrado)','type'=>13,'code_deis' =>116407,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Peumal','alias'=>'Posta de Salud Rural El Peumal','type'=>13,'code_deis' =>116408,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Calabozo','alias'=>'Posta de Salud Rural El Calabozo','type'=>13,'code_deis' =>116409,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Queñes','alias'=>'Posta de Salud Rural Los Queñes','type'=>13,'code_deis' =>116410,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huaquén (Curepto)','alias'=>'Posta de Salud Rural Huaquén (Curepto)','type'=>13,'code_deis' =>116411,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pejerrey','alias'=>'Posta de Salud Rural Pejerrey','type'=>13,'code_deis' =>116412,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tutuquén','alias'=>'Posta de Salud Rural Tutuquén','type'=>13,'code_deis' =>116413,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chequenlemu','alias'=>'Posta de Salud Rural Chequenlemu','type'=>13,'code_deis' =>116415,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Upeo','alias'=>'Posta de Salud Rural Upeo','type'=>13,'code_deis' =>116416,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Potrero Grande','alias'=>'Posta de Salud Rural Potrero Grande','type'=>13,'code_deis' =>116417,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cordillerilla','alias'=>'Posta de Salud Rural Cordillerilla','type'=>13,'code_deis' =>116418,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pichingal','alias'=>'Posta de Salud Rural Pichingal','type'=>13,'code_deis' =>116419,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Itahue','alias'=>'Posta de Salud Rural Itahue','type'=>13,'code_deis' =>116420,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Radal','alias'=>'Posta de Salud Rural El Radal','type'=>13,'code_deis' =>116421,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Yacal','alias'=>'Posta de Salud Rural El Yacal','type'=>13,'code_deis' =>116422,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Huerta','alias'=>'Posta de Salud Rural La Huerta','type'=>13,'code_deis' =>116424,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lora','alias'=>'Posta de Salud Rural Lora','type'=>13,'code_deis' =>116425,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Duao de Licantén','alias'=>'Posta de Salud Rural Duao de Licantén','type'=>13,'code_deis' =>116426,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Iloca','alias'=>'Posta de Salud Rural Iloca','type'=>13,'code_deis' =>116427,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Llico de Vichuquén','alias'=>'Posta de Salud Rural Llico de Vichuquén','type'=>13,'code_deis' =>116428,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lipimávida','alias'=>'Posta de Salud Rural Lipimávida','type'=>13,'code_deis' =>116429,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Colo','alias'=>'Posta de Salud Rural El Colo','type'=>13,'code_deis' =>116430,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rarín','alias'=>'Posta de Salud Rural Rarín','type'=>13,'code_deis' =>116431,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Camarico (Río Claro)','alias'=>'Posta de Salud Rural Camarico (Río Claro)','type'=>13,'code_deis' =>116432,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Porvenir','alias'=>'Posta de Salud Rural Porvenir','type'=>13,'code_deis' =>116433,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Peñaflor','alias'=>'Posta de Salud Rural Peñaflor','type'=>13,'code_deis' =>116434,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coipué (Curepto)','alias'=>'Posta de Salud Rural Coipué (Curepto)','type'=>13,'code_deis' =>116435,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Carrizalillo (Constitución )','alias'=>'Posta de Salud Rural Carrizalillo (Constitución )','type'=>13,'code_deis' =>116436,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Botalcura','alias'=>'Posta de Salud Rural Botalcura','type'=>13,'code_deis' =>116437,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Corinto','alias'=>'Posta de Salud Rural Corinto','type'=>13,'code_deis' =>116438,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tanhuao','alias'=>'Posta de Salud Rural Tanhuao','type'=>13,'code_deis' =>116439,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Colín','alias'=>'Posta de Salud Rural Colín','type'=>13,'code_deis' =>116440,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Duao de Maule','alias'=>'Posta de Salud Rural Duao de Maule','type'=>13,'code_deis' =>116441,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quiñipeumo','alias'=>'Posta de Salud Rural Quiñipeumo','type'=>13,'code_deis' =>116442,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Peumo Negro','alias'=>'Posta de Salud Rural Peumo Negro','type'=>13,'code_deis' =>116443,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Placeta','alias'=>'Posta de Salud Rural La Placeta','type'=>13,'code_deis' =>116444,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Punta de Diamante','alias'=>'Posta de Salud Rural Punta de Diamante','type'=>13,'code_deis' =>116445,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Lomas (San Clemente )','alias'=>'Posta de Salud Rural Las Lomas (San Clemente )','type'=>13,'code_deis' =>116446,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mariposas','alias'=>'Posta de Salud Rural Mariposas','type'=>13,'code_deis' =>116447,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Vilches','alias'=>'Posta de Salud Rural Vilches','type'=>13,'code_deis' =>116448,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Corralones','alias'=>'Posta de Salud Rural Corralones','type'=>13,'code_deis' =>116449,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Montes','alias'=>'Posta de Salud Rural Los Montes','type'=>13,'code_deis' =>116450,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Colorado','alias'=>'Posta de Salud Rural El Colorado','type'=>13,'code_deis' =>116451,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Suiza','alias'=>'Posta de Salud Rural La Suiza','type'=>13,'code_deis' =>116452,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Maitenes','alias'=>'Posta de Salud Rural Maitenes','type'=>13,'code_deis' =>116453,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rapilermo','alias'=>'Posta de Salud Rural Rapilermo','type'=>13,'code_deis' =>116454,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Gualleco','alias'=>'Posta de Salud Rural Gualleco','type'=>13,'code_deis' =>116455,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Calpún','alias'=>'Posta de Salud Rural Calpún','type'=>13,'code_deis' =>116456,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Putú','alias'=>'Posta de Salud Rural Putú','type'=>13,'code_deis' =>116457,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Buenos Aires','alias'=>'Posta de Salud Rural Buenos Aires','type'=>13,'code_deis' =>116458,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nirivilo','alias'=>'Posta de Salud Rural Nirivilo','type'=>13,'code_deis' =>116459,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rastrojos','alias'=>'Posta de Salud Rural Rastrojos','type'=>13,'code_deis' =>116460,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Villavicencio','alias'=>'Posta de Salud Rural Villavicencio','type'=>13,'code_deis' =>116461,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huerta','alias'=>'Posta de Salud Rural Huerta','type'=>13,'code_deis' =>116462,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Melozal','alias'=>'Posta de Salud Rural Melozal','type'=>13,'code_deis' =>116463,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Caliboro','alias'=>'Posta de Salud Rural Caliboro','type'=>13,'code_deis' =>116464,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Sauce de San Javier','alias'=>'Posta de Salud Rural El Sauce de San Javier','type'=>13,'code_deis' =>116465,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Estación','alias'=>'Posta de Salud Rural Estación','type'=>13,'code_deis' =>116466,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Putagán','alias'=>'Posta de Salud Rural Putagán','type'=>13,'code_deis' =>116467,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lagunillas ( Villa Alegre )','alias'=>'Posta de Salud Rural Lagunillas ( Villa Alegre )','type'=>13,'code_deis' =>116468,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Peñuelas','alias'=>'Posta de Salud Rural Peñuelas','type'=>13,'code_deis' =>116469,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Orilla de Maule','alias'=>'Posta de Salud Rural Orilla de Maule','type'=>13,'code_deis' =>116470,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Maitencillo (Yerbas Buenas)','alias'=>'Posta de Salud Rural Maitencillo (Yerbas Buenas)','type'=>13,'code_deis' =>116471,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Maule Sur','alias'=>'Posta de Salud Rural Maule Sur','type'=>13,'code_deis' =>116472,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Palmilla (Linares)','alias'=>'Posta de Salud Rural Palmilla (Linares)','type'=>13,'code_deis' =>116473,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Embalse Ancoa','alias'=>'Posta de Salud Rural Embalse Ancoa','type'=>13,'code_deis' =>116474,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Peumal','alias'=>'Posta de Salud Rural Peumal','type'=>13,'code_deis' =>116475,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Vega de Salas','alias'=>'Posta de Salud Rural Vega de Salas','type'=>13,'code_deis' =>116476,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chupallar','alias'=>'Posta de Salud Rural Chupallar','type'=>13,'code_deis' =>116477,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Hualles','alias'=>'Posta de Salud Rural Los Hualles','type'=>13,'code_deis' =>116478,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Cañas','alias'=>'Posta de Salud Rural Las Cañas','type'=>13,'code_deis' =>116479,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Miraflores','alias'=>'Posta de Salud Rural Miraflores','type'=>13,'code_deis' =>116480,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huimeo','alias'=>'Posta de Salud Rural Huimeo','type'=>13,'code_deis' =>116481,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mesamávida (Longaví)','alias'=>'Posta de Salud Rural Mesamávida (Longaví)','type'=>13,'code_deis' =>116482,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Quinta','alias'=>'Posta de Salud Rural La Quinta','type'=>13,'code_deis' =>116483,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San José (Longaví)','alias'=>'Posta de Salud Rural San José (Longaví)','type'=>13,'code_deis' =>116484,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Loma de Vásquez','alias'=>'Posta de Salud Rural Loma de Vásquez','type'=>13,'code_deis' =>116486,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Piguchén (Retiro)','alias'=>'Posta de Salud Rural Piguchén (Retiro)','type'=>13,'code_deis' =>116487,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Villaseca','alias'=>'Posta de Salud Rural Villaseca','type'=>13,'code_deis' =>116488,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Talhuenes','alias'=>'Posta de Salud Rural Talhuenes','type'=>13,'code_deis' =>116489,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Camelias','alias'=>'Centro Comunitario de Salud Familiar Camelias','type'=>16,'code_deis' =>116490,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Marcos (Retiro)','alias'=>'Posta de Salud Rural San Marcos (Retiro)','type'=>13,'code_deis' =>116491,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Copihue','alias'=>'Posta de Salud Rural Copihue','type'=>13,'code_deis' =>116492,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Canelos (Parral)','alias'=>'Posta de Salud Rural Los Canelos (Parral)','type'=>13,'code_deis' =>116493,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Bullileo','alias'=>'Posta de Salud Rural Bullileo','type'=>13,'code_deis' =>116494,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Digua','alias'=>'Posta de Salud Rural Digua','type'=>13,'code_deis' =>116495,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Catillo','alias'=>'Posta de Salud Rural Catillo','type'=>13,'code_deis' =>116496,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Perquilauquén','alias'=>'Posta de Salud Rural Perquilauquén','type'=>13,'code_deis' =>116497,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tapihue','alias'=>'Posta de Salud Rural Tapihue','type'=>13,'code_deis' =>116498,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cayurranquil','alias'=>'Posta de Salud Rural Cayurranquil','type'=>13,'code_deis' =>116499,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santo Toribio','alias'=>'Posta de Salud Rural Santo Toribio','type'=>13,'code_deis' =>116500,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quella','alias'=>'Posta de Salud Rural Quella','type'=>13,'code_deis' =>116501,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tres Esquinas (Cauquenes)','alias'=>'Posta de Salud Rural Tres Esquinas (Cauquenes)','type'=>13,'code_deis' =>116502,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cancha de Los Huevos','alias'=>'Posta de Salud Rural Cancha de Los Huevos','type'=>13,'code_deis' =>116503,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coronel','alias'=>'Posta de Salud Rural Coronel','type'=>13,'code_deis' =>116504,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lomas de Putagán','alias'=>'Posta de Salud Rural Lomas de Putagán','type'=>13,'code_deis' =>116505,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Pelluhue','alias'=>'Centro Comunitario de Salud Familiar Pelluhue','type'=>16,'code_deis' =>116506,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chovellén','alias'=>'Posta de Salud Rural Chovellén','type'=>13,'code_deis' =>116508,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pahuil','alias'=>'Posta de Salud Rural Pahuil','type'=>13,'code_deis' =>116509,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Loanco','alias'=>'Posta de Salud Rural Loanco','type'=>13,'code_deis' =>116510,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Olga','alias'=>'Posta de Salud Rural Santa Olga','type'=>13,'code_deis' =>116512,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Quillayes (Sagrada Familia)','alias'=>'Posta de Salud Rural Los Quillayes (Sagrada Familia)','type'=>13,'code_deis' =>116514,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Vara Gruesa','alias'=>'Posta de Salud Rural Vara Gruesa','type'=>13,'code_deis' =>116515,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Carmen( Longaví)','alias'=>'Posta de Salud Rural El Carmen( Longaví)','type'=>13,'code_deis' =>116516,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Bolsico','alias'=>'Posta de Salud Rural El Bolsico','type'=>13,'code_deis' =>116517,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Aromo','alias'=>'Posta de Salud Rural El Aromo','type'=>13,'code_deis' =>116518,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Esperanza','alias'=>'Posta de Salud Rural Esperanza','type'=>13,'code_deis' =>116519,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Elena (San Clemente)','alias'=>'Posta de Salud Rural Santa Elena (San Clemente)','type'=>13,'code_deis' =>116520,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Lomas (Curepto)','alias'=>'Posta de Salud Rural Las Lomas (Curepto)','type'=>13,'code_deis' =>116521,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Carros','alias'=>'Posta de Salud Rural Los Carros','type'=>13,'code_deis' =>116522,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Monte Flor','alias'=>'Posta de Salud Rural Monte Flor','type'=>13,'code_deis' =>116523,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Fuerte Viejo','alias'=>'Posta de Salud Rural Fuerte Viejo','type'=>13,'code_deis' =>116524,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tres Esquinas (Molina)','alias'=>'Posta de Salud Rural Tres Esquinas (Molina)','type'=>13,'code_deis' =>116525,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Delfina','alias'=>'Posta de Salud Rural Santa Delfina','type'=>13,'code_deis' =>116526,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Ramón (Retiro)','alias'=>'Posta de Salud Rural San Ramón (Retiro)','type'=>13,'code_deis' =>116527,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Pesca','alias'=>'Posta de Salud Rural La Pesca','type'=>13,'code_deis' =>116528,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Barba Rubia','alias'=>'Posta de Salud Rural Barba Rubia','type'=>13,'code_deis' =>116529,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Espinalillo','alias'=>'Posta de Salud Rural Espinalillo','type'=>13,'code_deis' =>116530,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Víctor Álamos','alias'=>'Posta de Salud Rural San Víctor Álamos','type'=>13,'code_deis' =>116531,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lomas de la Tercera','alias'=>'Posta de Salud Rural Lomas de la Tercera','type'=>13,'code_deis' =>116532,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Rosa (Sagrada Familia)','alias'=>'Posta de Salud Rural Santa Rosa (Sagrada Familia)','type'=>13,'code_deis' =>116533,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huencuecho','alias'=>'Posta de Salud Rural Huencuecho','type'=>13,'code_deis' =>116534,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Llancanao','alias'=>'Posta de Salud Rural Llancanao','type'=>13,'code_deis' =>116537,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Estancilla','alias'=>'Posta de Salud Rural Estancilla','type'=>13,'code_deis' =>116538,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Cardonal','alias'=>'Posta de Salud Rural El Cardonal','type'=>13,'code_deis' =>116539,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Robles (Río Claro)','alias'=>'Posta de Salud Rural Los Robles (Río Claro)','type'=>13,'code_deis' =>116540,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Manzano (Pelarco )','alias'=>'Posta de Salud Rural El Manzano (Pelarco )','type'=>13,'code_deis' =>116541,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Linares de Perales','alias'=>'Posta de Salud Rural Linares de Perales','type'=>13,'code_deis' =>116542,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Batuco','alias'=>'Posta de Salud Rural Batuco','type'=>13,'code_deis' =>116543,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Porvenir','alias'=>'Posta de Salud Rural El Porvenir','type'=>13,'code_deis' =>116544,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chequén','alias'=>'Posta de Salud Rural Chequén','type'=>13,'code_deis' =>116546,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puipuyén','alias'=>'Posta de Salud Rural Puipuyén','type'=>13,'code_deis' =>116547,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Vega (Chanco)','alias'=>'Posta de Salud Rural La Vega (Chanco)','type'=>13,'code_deis' =>116548,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Boyeruca','alias'=>'Posta de Salud Rural Boyeruca','type'=>13,'code_deis' =>116549,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Bajos de Huenutil','alias'=>'Posta de Salud Rural Bajos de Huenutil','type'=>13,'code_deis' =>116550,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Talquita','alias'=>'Posta de Salud Rural Talquita','type'=>13,'code_deis' =>116551,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Palmas de Toconey','alias'=>'Posta de Salud Rural Las Palmas de Toconey','type'=>13,'code_deis' =>116552,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quilhuine','alias'=>'Posta de Salud Rural Quilhuine','type'=>13,'code_deis' =>116553,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Raúl Folleraux','alias'=>'Posta de Salud Rural Raúl Folleraux','type'=>13,'code_deis' =>116554,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Sofía','alias'=>'Posta de Salud Rural Santa Sofía','type'=>13,'code_deis' =>116555,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pocillas','alias'=>'Posta de Salud Rural Pocillas','type'=>13,'code_deis' =>116556,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Obra (Curicó)','alias'=>'Posta de Salud Rural La Obra (Curicó)','type'=>13,'code_deis' =>116557,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lagunillas (Chanco)','alias'=>'Posta de Salud Rural Lagunillas (Chanco)','type'=>13,'code_deis' =>116558,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Floresta','alias'=>'Posta de Salud Rural Floresta','type'=>13,'code_deis' =>116559,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Orilla (Parral)','alias'=>'Posta de Salud Rural La Orilla (Parral)','type'=>13,'code_deis' =>116560,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mercedes','alias'=>'Posta de Salud Rural Mercedes','type'=>13,'code_deis' =>116561,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Toscas','alias'=>'Posta de Salud Rural Las Toscas','type'=>13,'code_deis' =>116562,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Sauzal','alias'=>'Posta de Salud Rural Sauzal','type'=>13,'code_deis' =>116563,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Villa Baviera','alias'=>'Posta de Salud Rural Villa Baviera','type'=>13,'code_deis' =>116564,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Plumero','alias'=>'Posta de Salud Rural El Plumero','type'=>13,'code_deis' =>116569,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Mina','alias'=>'Posta de Salud Rural La Mina','type'=>13,'code_deis' =>116570,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Rita','alias'=>'Posta de Salud Rural Santa Rita','type'=>13,'code_deis' =>116571,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pangue Arriba','alias'=>'Posta de Salud Rural Pangue Arriba','type'=>13,'code_deis' =>116572,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'COSAM de Linares','alias'=>'COSAM de Linares','type'=>14,'code_deis' =>116601,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Del Maule','alias'=>'COSAM Del Maule','type'=>14,'code_deis' =>116602,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Prosperidad','alias'=>'Centro Comunitario de Salud Familiar Prosperidad','type'=>16,'code_deis' =>116703,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Brilla el Sol','alias'=>'Centro Comunitario de Salud Familiar Brilla el Sol','type'=>16,'code_deis' =>116705,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Luis Navarrete Carvacho','alias'=>'Centro de Salud Familiar Luis Navarrete Carvacho','type'=>12,'code_deis' =>116709,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Olivos','alias'=>'Centro Comunitario de Salud Familiar Los Olivos','type'=>16,'code_deis' =>116711,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Chile Nuevo','alias'=>'Centro Comunitario de Salud Familiar Chile Nuevo','type'=>16,'code_deis' =>116713,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Población Fernández','alias'=>'Centro Comunitario de Salud Familiar Población Fernández','type'=>16,'code_deis' =>116729,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Lo Figueroa','alias'=>'Centro Comunitario de Salud Familiar Lo Figueroa','type'=>16,'code_deis' =>116731,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Rosita OHiggins','alias'=>'Centro Comunitario de Salud Familiar Rosita OHiggins','type'=>16,'code_deis' =>116741,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Faustino González','alias'=>'Centro Comunitario de Salud Familiar Faustino González','type'=>16,'code_deis' =>116760,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Doña Carmen de Sarmiento','alias'=>'Centro Comunitario de Salud Familiar Doña Carmen de Sarmiento','type'=>16,'code_deis' =>116761,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Cristales','alias'=>'Centro Comunitario de Salud Familiar Los Cristales','type'=>16,'code_deis' =>116762,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar San Pablo','alias'=>'Centro Comunitario de Salud Familiar San Pablo','type'=>16,'code_deis' =>116763,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Loma de Las Tortillas','alias'=>'Centro Comunitario de Salud Familiar Loma de Las Tortillas','type'=>16,'code_deis' =>116764,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Robles','alias'=>'Centro Comunitario de Salud Familiar Los Robles','type'=>16,'code_deis' =>116765,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Nuevo Horizonte','alias'=>'Centro Comunitario de Salud Familiar Nuevo Horizonte','type'=>16,'code_deis' =>116766,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Aurora','alias'=>'Centro Comunitario de Salud Familiar Aurora','type'=>16,'code_deis' =>116780,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAR Aguas Negras','alias'=>'SAR Aguas Negras','type'=>20,'code_deis' =>116801,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAR Bombero Garrido','alias'=>'SAR Bombero Garrido','type'=>20,'code_deis' =>116802,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Curicó Centro','alias'=>'SAPU Curicó Centro','type'=>20,'code_deis' =>116803,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAPU José Dionisio Astaburuaga','alias'=>'SAPU José Dionisio Astaburuaga','type'=>20,'code_deis' =>116805,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAR La Florida','alias'=>'SAR La Florida','type'=>20,'code_deis' =>116806,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Julio Contardo Urzúa','alias'=>'SAPU Julio Contardo Urzúa','type'=>20,'code_deis' =>116807,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAR San Juan de Dios de Linares','alias'=>'SAR San Juan de Dios de Linares','type'=>20,'code_deis' =>116809,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAR Parral','alias'=>'SAR Parral','type'=>20,'code_deis' =>116811,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAR San Clemente','alias'=>'SAR San Clemente','type'=>20,'code_deis' =>116813,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Amanda Benavente','alias'=>'SAPU Amanda Benavente','type'=>20,'code_deis' =>116820,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Oscar Bonilla','alias'=>'SAPU Oscar Bonilla','type'=>20,'code_deis' =>116823,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAR Dr. Juan Saavedra Macaya','alias'=>'SAR Dr. Juan Saavedra Macaya','type'=>20,'code_deis' =>116829,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Carlos Trupp','alias'=>'SAPU Carlos Trupp','type'=>20,'code_deis' =>116831,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAR Costitución','alias'=>'SAR Costitución','type'=>20,'code_deis' =>116832,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAR Las Américas','alias'=>'SAR Las Américas','type'=>20,'code_deis' =>116840,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Ñuble)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Ñuble)','type'=>1,'code_deis' =>117010,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Ñuble)','alias'=>'PRAIS (S.S Ñuble)','type'=>2,'code_deis' =>117011,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. PW4105 (Chillán)','alias'=>'Clínica Dental Móvil Triple. Pat. PW4105 (Chillán)','type'=>3,'code_deis' =>117012,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Clínico Herminda Martín (Chillán)','alias'=>'Hospital Clínico Herminda Martín (Chillán)','type'=>5,'code_deis' =>117101,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de San Carlos','alias'=>'Hospital de San Carlos','type'=>5,'code_deis' =>117102,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario de Salud Familiar de Bulnes','alias'=>'Hospital Comunitario de Salud Familiar de Bulnes','type'=>22,'code_deis' =>117103,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario de Salud Familiar Pedro Morales Campos (Yungay)','alias'=>'Hospital Comunitario de Salud Familiar Pedro Morales Campos (Yungay)','type'=>22,'code_deis' =>117104,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario de Salud Familiar de Quirihue','alias'=>'Hospital Comunitario de Salud Familiar de Quirihue','type'=>22,'code_deis' =>117106,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario de Salud Familiar de El Carmen','alias'=>'Hospital Comunitario de Salud Familiar de El Carmen','type'=>22,'code_deis' =>117107,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario de Salud Familiar Dr. Eduardo Contreras Trabucco de Coelemu','alias'=>'Hospital Comunitario de Salud Familiar Dr. Eduardo Contreras Trabucco de Coelemu','type'=>22,'code_deis' =>117108,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Consultorio de Salud AChS (Chillán)','alias'=>'Consultorio de Salud AChS (Chillán)','type'=>8,'code_deis' =>117202,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Centro CONIN Chillán','alias'=>'Centro CONIN Chillán','type'=>26,'code_deis' =>117204,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Las Amapolas','alias'=>'Clínica Las Amapolas','type'=>6,'code_deis' =>117205,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Chillán','alias'=>'Centro de Salud Mutual CChC Chillán','type'=>8,'code_deis' =>117207,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico San Martín de Porres','alias'=>'Policlínico San Martín de Porres','type'=>8,'code_deis' =>117224,'service' =>27,'dependency' =>4]);
Organization::Create(['name' => 'Clínica Chillán','alias'=>'Clínica Chillán','type'=>6,'code_deis' =>117225,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Departamento de Salud Estudiantil Universidad del Biobío Sede Chillán','alias'=>'Departamento de Salud Estudiantil Universidad del Biobío Sede Chillán','type'=>8,'code_deis' =>117226,'service' =>27,'dependency' =>4]);
Organization::Create(['name' => 'Consultorio de Salud Universidad de Concepción','alias'=>'Consultorio de Salud Universidad de Concepción','type'=>8,'code_deis' =>117227,'service' =>27,'dependency' =>4]);
Organization::Create(['name' => 'Soc.Lab.cl. Arauco Ltda.','alias'=>'Soc.Lab.cl. Arauco Ltda.','type'=>10,'code_deis' =>117228,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Soc.Lab Clínico Biolab Ltda.','alias'=>'Soc.Lab Clínico Biolab Ltda.','type'=>10,'code_deis' =>117229,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Cinco de Abril','alias'=>'Laboratorio Clínico Cinco de Abril','type'=>10,'code_deis' =>117230,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Christian Gross Ltda.','alias'=>'Laboratorio Clínico Christian Gross Ltda.','type'=>10,'code_deis' =>117231,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Sociedad Laboratorio Folch Ltda','alias'=>'Sociedad Laboratorio Folch Ltda','type'=>10,'code_deis' =>117232,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Someruno','alias'=>'Laboratorio Clínico Someruno','type'=>10,'code_deis' =>117233,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Sociedad Laboratorio Clínico Bioclín Ltda.','alias'=>'Sociedad Laboratorio Clínico Bioclín Ltda.','type'=>10,'code_deis' =>117234,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Inmunomedica Ltda.','alias'=>'Laboratorio Inmunomedica Ltda.','type'=>10,'code_deis' =>117235,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Chillan Ltda.','alias'=>'Laboratorio Clínico Chillan Ltda.','type'=>10,'code_deis' =>117236,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico San Carlos Ltda.','alias'=>'Laboratorio Clínico San Carlos Ltda.','type'=>10,'code_deis' =>117237,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Megasalud Chillán','alias'=>'Megasalud Chillán','type'=>8,'code_deis' =>117238,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Violeta Parra','alias'=>'Centro de Salud Familiar Violeta Parra','type'=>12,'code_deis' =>117301,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar San Ramón Nonato','alias'=>'Centro de Salud Familiar San Ramón Nonato','type'=>12,'code_deis' =>117302,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Ultraestación Dr. Raúl San Martín González','alias'=>'Centro de Salud Familiar Ultraestación Dr. Raúl San Martín González','type'=>12,'code_deis' =>117303,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Isabel Riquelme','alias'=>'Centro de Salud Familiar Isabel Riquelme','type'=>12,'code_deis' =>117304,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Portezuelo','alias'=>'Centro de Salud Familiar Portezuelo','type'=>12,'code_deis' =>117305,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quillón','alias'=>'Centro de Salud Familiar Quillón','type'=>12,'code_deis' =>117306,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cobquecura','alias'=>'Centro de Salud Familiar Cobquecura','type'=>12,'code_deis' =>117307,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Ignacio','alias'=>'Centro de Salud Familiar San Ignacio','type'=>12,'code_deis' =>117308,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Fabián','alias'=>'Centro de Salud Familiar San Fabián','type'=>12,'code_deis' =>117309,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pemuco','alias'=>'Centro de Salud Familiar Pemuco','type'=>12,'code_deis' =>117310,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. José Duran Trujillo','alias'=>'Centro de Salud Familiar Dr. José Duran Trujillo','type'=>12,'code_deis' =>117311,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Nicolás','alias'=>'Centro de Salud Familiar San Nicolás','type'=>12,'code_deis' =>117312,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Ñiquén','alias'=>'Centro de Salud Familiar Ñiquén','type'=>12,'code_deis' =>117313,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. David Benavente de Ninhue','alias'=>'Centro de Salud Familiar Dr. David Benavente de Ninhue','type'=>12,'code_deis' =>117314,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Campanario','alias'=>'Centro de Salud Familiar Campanario','type'=>12,'code_deis' =>117315,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Ñipas','alias'=>'Centro de Salud Familiar Ñipas','type'=>12,'code_deis' =>117316,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pinto','alias'=>'Centro de Salud Familiar Pinto','type'=>12,'code_deis' =>117317,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Coihueco','alias'=>'Centro de Salud Familiar Coihueco','type'=>12,'code_deis' =>117318,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quiriquina','alias'=>'Centro de Salud Familiar Quiriquina','type'=>12,'code_deis' =>117319,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quinchamalí','alias'=>'Centro de Salud Familiar Quinchamalí','type'=>12,'code_deis' =>117322,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Los Volcanes','alias'=>'Centro de Salud Familiar Los Volcanes','type'=>12,'code_deis' =>117324,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Luis Montecinos','alias'=>'Centro de Salud Familiar Luis Montecinos','type'=>12,'code_deis' =>117325,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Clara','alias'=>'Centro de Salud Familiar Santa Clara','type'=>12,'code_deis' =>117326,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Treguaco','alias'=>'Centro de Salud Familiar Treguaco','type'=>12,'code_deis' =>117327,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Federico Puga','alias'=>'Centro de Salud Familiar Dr. Federico Puga','type'=>12,'code_deis' =>117328,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Teresa Baldechi','alias'=>'Centro de Salud Familiar Teresa Baldechi','type'=>12,'code_deis' =>117329,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Sol de Oriente','alias'=>'Centro de Salud Familiar Sol de Oriente','type'=>12,'code_deis' =>117330,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dra. Michelle Bachelet Jeria','alias'=>'Centro de Salud Familiar Dra. Michelle Bachelet Jeria','type'=>12,'code_deis' =>117331,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Talquipén','alias'=>'Posta de Salud Rural Talquipén','type'=>13,'code_deis' =>117401,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Bustamante','alias'=>'Posta de Salud Rural Bustamante','type'=>13,'code_deis' =>117403,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Capilla Cato','alias'=>'Posta de Salud Rural Capilla Cato','type'=>13,'code_deis' =>117405,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Minas del Prado','alias'=>'Posta de Salud Rural Minas del Prado','type'=>13,'code_deis' =>117406,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tanilvoro','alias'=>'Posta de Salud Rural Tanilvoro','type'=>13,'code_deis' =>117407,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Recinto','alias'=>'Posta de Salud Rural Recinto','type'=>13,'code_deis' =>117409,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huape','alias'=>'Posta de Salud Rural Huape','type'=>13,'code_deis' =>117410,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rucapequén','alias'=>'Posta de Salud Rural Rucapequén','type'=>13,'code_deis' =>117413,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nebuco','alias'=>'Posta de Salud Rural Nebuco','type'=>13,'code_deis' =>117414,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Cachapoal','alias'=>'Centro Comunitario de Salud Familiar Cachapoal','type'=>16,'code_deis' =>117415,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rivera de Ñuble','alias'=>'Posta de Salud Rural Rivera de Ñuble','type'=>13,'code_deis' =>117416,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Chacay','alias'=>'Centro Comunitario de Salud Familiar Chacay','type'=>16,'code_deis' =>117418,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ñiquén','alias'=>'Posta de Salud Rural Ñiquén','type'=>13,'code_deis' =>117419,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Torrecillas','alias'=>'Posta de Salud Rural Torrecillas','type'=>13,'code_deis' =>117421,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Gloria','alias'=>'Posta de Salud Rural La Gloria','type'=>13,'code_deis' =>117422,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Monte Blanco','alias'=>'Posta de Salud Rural Monte Blanco','type'=>13,'code_deis' =>117423,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Tres Esquinas','alias'=>'Centro Comunitario de Salud Familiar Tres Esquinas','type'=>16,'code_deis' =>117426,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nueva Aldea','alias'=>'Posta de Salud Rural Nueva Aldea','type'=>13,'code_deis' =>117427,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cartago','alias'=>'Posta de Salud Rural Cartago','type'=>13,'code_deis' =>117430,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Gral. Cruz','alias'=>'Posta de Salud Rural Gral. Cruz','type'=>13,'code_deis' =>117431,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Sauce (Ninhue)','alias'=>'Posta de Salud Rural El Sauce (Ninhue)','type'=>13,'code_deis' =>117433,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Remates','alias'=>'Posta de Salud Rural Los Remates','type'=>13,'code_deis' =>117434,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Trehualemu','alias'=>'Posta de Salud Rural Trehualemu','type'=>13,'code_deis' =>117435,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pedregal de Zapallar','alias'=>'Posta de Salud Rural Pedregal de Zapallar','type'=>13,'code_deis' =>117436,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Vicente (El Carmen)','alias'=>'Posta de Salud Rural San Vicente (El Carmen)','type'=>13,'code_deis' =>117437,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huemul','alias'=>'Posta de Salud Rural Huemul','type'=>13,'code_deis' =>117438,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ranguelmo','alias'=>'Posta de Salud Rural Ranguelmo','type'=>13,'code_deis' =>117439,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Guarilihue','alias'=>'Posta de Salud Rural Guarilihue','type'=>13,'code_deis' =>117442,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Boca Itata','alias'=>'Posta de Salud Rural Boca Itata','type'=>13,'code_deis' =>117443,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Denecan','alias'=>'Posta de Salud Rural Denecan','type'=>13,'code_deis' =>117444,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Vegas de Itata','alias'=>'Posta de Salud Rural Vegas de Itata','type'=>13,'code_deis' =>117445,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Minas de Leuque','alias'=>'Posta de Salud Rural Minas de Leuque','type'=>13,'code_deis' =>117446,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cucha Cox','alias'=>'Posta de Salud Rural Cucha Cox','type'=>13,'code_deis' =>117447,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Liucura Alto','alias'=>'Posta de Salud Rural Liucura Alto','type'=>13,'code_deis' =>117448,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Juan Enrique Mora','alias'=>'Posta de Salud Rural Juan Enrique Mora','type'=>13,'code_deis' =>117449,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Buchupureo','alias'=>'Posta de Salud Rural Buchupureo','type'=>13,'code_deis' =>117451,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Colmuyao','alias'=>'Posta de Salud Rural Colmuyao','type'=>13,'code_deis' =>117452,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Calvario','alias'=>'Posta de Salud Rural El Calvario','type'=>13,'code_deis' =>117454,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio General Rural de Pueblo Seco','alias'=>'Consultorio General Rural de Pueblo Seco','type'=>12,'code_deis' =>117455,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Capilla Norte','alias'=>'Posta de Salud Rural Capilla Norte','type'=>13,'code_deis' =>117457,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Antonio (Yungay)','alias'=>'Posta de Salud Rural San Antonio (Yungay)','type'=>13,'code_deis' =>117458,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Capellanía','alias'=>'Posta de Salud Rural Capellanía','type'=>13,'code_deis' =>117459,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Toquihua','alias'=>'Posta de Salud Rural Toquihua','type'=>13,'code_deis' =>117461,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Arizona','alias'=>'Posta de Salud Rural Arizona','type'=>13,'code_deis' =>117462,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Rincón','alias'=>'Posta de Salud Rural El Rincón','type'=>13,'code_deis' =>117463,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Zemita','alias'=>'Posta de Salud Rural Zemita','type'=>13,'code_deis' =>117464,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Ignacio Palomares','alias'=>'Posta de Salud Rural San Ignacio Palomares','type'=>13,'code_deis' =>117465,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Caracol','alias'=>'Posta de Salud Rural El Caracol','type'=>13,'code_deis' =>117467,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Belén (Ñiquen)','alias'=>'Posta de Salud Rural Belén (Ñiquen)','type'=>13,'code_deis' =>117468,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ciruelito','alias'=>'Posta de Salud Rural Ciruelito','type'=>13,'code_deis' =>117469,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Trabuncura','alias'=>'Posta de Salud Rural Trabuncura','type'=>13,'code_deis' =>117470,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puente Ñuble','alias'=>'Posta de Salud Rural Puente Ñuble','type'=>13,'code_deis' =>117471,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chancal','alias'=>'Posta de Salud Rural Chancal','type'=>13,'code_deis' =>117472,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Capilla Sur','alias'=>'Posta de Salud Rural Capilla Sur','type'=>13,'code_deis' =>117473,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Agua Santa','alias'=>'Posta de Salud Rural Agua Santa','type'=>13,'code_deis' =>117474,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Castañal','alias'=>'Posta de Salud Rural Castañal','type'=>13,'code_deis' =>117475,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Hormigas','alias'=>'Posta de Salud Rural Las Hormigas','type'=>13,'code_deis' =>117476,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chamizal','alias'=>'Posta de Salud Rural Chamizal','type'=>13,'code_deis' =>117477,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Chillán','alias'=>'COSAM Chillán','type'=>14,'code_deis' =>117601,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'COSAM San Carlos','alias'=>'COSAM San Carlos','type'=>14,'code_deis' =>117602,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Padre Hurtado','alias'=>'Centro Comunitario de Salud Familiar Padre Hurtado','type'=>16,'code_deis' =>117701,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Roble','alias'=>'Centro Comunitario de Salud Familiar El Roble','type'=>16,'code_deis' =>117702,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Casino','alias'=>'Centro Comunitario de Salud Familiar El Casino','type'=>16,'code_deis' =>117706,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Valle Hondo','alias'=>'Centro Comunitario de Salud Familiar Valle Hondo','type'=>16,'code_deis' =>117729,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Alpes','alias'=>'Centro Comunitario de Salud Familiar Los Alpes','type'=>16,'code_deis' =>117799,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'SAR Violeta Parra','alias'=>'SAR Violeta Parra','type'=>20,'code_deis' =>117801,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'SAPU San Ramón de Nonato','alias'=>'SAPU San Ramón de Nonato','type'=>20,'code_deis' =>117802,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Ultraestación','alias'=>'SAPU Ultraestación','type'=>20,'code_deis' =>117803,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'SAPU José Durán Trujillo','alias'=>'SAPU José Durán Trujillo','type'=>20,'code_deis' =>117811,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Los Volcanes','alias'=>'SAPU Los Volcanes','type'=>20,'code_deis' =>117824,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Federico Puga','alias'=>'SAPU Dr. Federico Puga','type'=>20,'code_deis' =>117828,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Concepción)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Concepción)','type'=>1,'code_deis' =>118010,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Concepción)','alias'=>'PRAIS (S.S Concepción)','type'=>2,'code_deis' =>118011,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Clínico Regional Dr. Guillermo Grant Benavente (Concepción)','alias'=>'Hospital Clínico Regional Dr. Guillermo Grant Benavente (Concepción)','type'=>5,'code_deis' =>118100,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Traumatológico (Concepción)','alias'=>'Hospital Traumatológico (Concepción)','type'=>23,'code_deis' =>118103,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San José (Coronel)','alias'=>'Hospital San José (Coronel)','type'=>5,'code_deis' =>118105,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Lota','alias'=>'Hospital de Lota','type'=>5,'code_deis' =>118106,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Clorinda Avello (Santa Juana)','alias'=>'Hospital Clorinda Avello (Santa Juana)','type'=>22,'code_deis' =>118107,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Agustín de Florida','alias'=>'Hospital San Agustín de Florida','type'=>22,'code_deis' =>118108,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Especialidades de Medicina Transfusional','alias'=>'Centro de Especialidades de Medicina Transfusional','type'=>24,'code_deis' =>118109,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Clínico del Sur S.A.','alias'=>'Hospital Clínico del Sur S.A.','type'=>7,'code_deis' =>118200,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Clínica de la Mujer Sanatorio Alemán','alias'=>'Clínica de la Mujer Sanatorio Alemán','type'=>6,'code_deis' =>118202,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Clínico Militar Concepción','alias'=>'Centro Clínico Militar Concepción','type'=>8,'code_deis' =>118206,'service' =>29,'dependency' =>5]);
Organization::Create(['name' => 'Centro CONIN Concepción','alias'=>'Centro CONIN Concepción','type'=>26,'code_deis' =>118208,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Servicios Clínicos Neuropsiquiátricos y Geriátricos R y G Limitada','alias'=>'Servicios Clínicos Neuropsiquiátricos y Geriátricos R y G Limitada','type'=>6,'code_deis' =>118210,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Penitenciario','alias'=>'Centro Penitenciario','type'=>8,'code_deis' =>118214,'service' =>29,'dependency' =>4]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Concepción','alias'=>'Laboratorio Clínico Bionet S.A. - Concepción','type'=>10,'code_deis' =>118250,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Agencia Concepción de la Asociación Chilena de Seguridad','alias'=>'Policlínico Agencia Concepción de la Asociación Chilena de Seguridad','type'=>8,'code_deis' =>118252,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Integramédica del Trébol','alias'=>'Centro Integramédica del Trébol','type'=>8,'code_deis' =>118289,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Megasalud S.A. Centro Médico y Dental Concepción','alias'=>'Megasalud S.A. Centro Médico y Dental Concepción','type'=>17,'code_deis' =>118290,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Clínica Universitaria de Concepción','alias'=>'Vacunatorio Clínica Universitaria de Concepción','type'=>18,'code_deis' =>118291,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Inmunomédica','alias'=>'Centro Médico Inmunomédica','type'=>8,'code_deis' =>118293,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro y Médico Dental VIII Zona de Carabineros (Del Bíobío)','alias'=>'Centro y Médico Dental VIII Zona de Carabineros (Del Bíobío)','type'=>17,'code_deis' =>118294,'service' =>29,'dependency' =>5]);
Organization::Create(['name' => 'Vacunatorio El Salvador','alias'=>'Vacunatorio El Salvador','type'=>18,'code_deis' =>118295,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Kiñewen Ltda.','alias'=>'Kiñewen Ltda.','type'=>18,'code_deis' =>118296,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Endodent','alias'=>'Vacunatorio Endodent','type'=>18,'code_deis' =>118297,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Departamento de Salud Estudiantil Universidad del Bíobío Campus Concepción','alias'=>'Departamento de Salud Estudiantil Universidad del Bíobío Campus Concepción','type'=>8,'code_deis' =>118298,'service' =>29,'dependency' =>4]);
Organization::Create(['name' => 'Vacunatorio Israel','alias'=>'Vacunatorio Israel','type'=>18,'code_deis' =>118299,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Pinares','alias'=>'Centro de Salud Familiar Pinares','type'=>12,'code_deis' =>118301,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Boca Sur','alias'=>'Centro de Salud Familiar Boca Sur','type'=>12,'code_deis' =>118302,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pedro de Valdivia','alias'=>'Centro de Salud Familiar Pedro de Valdivia','type'=>12,'code_deis' =>118303,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar OHiggins','alias'=>'Centro de Salud Familiar OHiggins','type'=>12,'code_deis' =>118304,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Víctor Manuel Fernández','alias'=>'Centro de Salud Familiar Víctor Manuel Fernández','type'=>12,'code_deis' =>118305,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Tucapel','alias'=>'Centro de Salud Familiar Tucapel','type'=>12,'code_deis' =>118306,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Chiguayante','alias'=>'Centro de Salud Familiar Chiguayante','type'=>12,'code_deis' =>118307,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Pedro de La Paz Candelaria','alias'=>'Centro de Salud Familiar San Pedro de La Paz Candelaria','type'=>12,'code_deis' =>118308,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lorenzo Arenas','alias'=>'Centro de Salud Familiar Lorenzo Arenas','type'=>12,'code_deis' =>118309,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Soto Fernández','alias'=>'Centro de Salud Familiar Juan Soto Fernández','type'=>12,'code_deis' =>118310,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Carlos Pinto Fierro','alias'=>'Centro de Salud Familiar Carlos Pinto Fierro','type'=>12,'code_deis' =>118311,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lagunillas','alias'=>'Centro de Salud Familiar Lagunillas','type'=>12,'code_deis' =>118312,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Yobilo','alias'=>'Centro de Salud Familiar Yobilo','type'=>12,'code_deis' =>118313,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Leonera','alias'=>'Centro de Salud Familiar La Leonera','type'=>12,'code_deis' =>118314,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Sergio Lagos Olave (ex Nº 4 Lota Bajo)','alias'=>'Centro de Salud Familiar Dr. Sergio Lagos Olave (ex Nº 4 Lota Bajo)','type'=>12,'code_deis' =>118316,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Sabina','alias'=>'Centro de Salud Familiar Santa Sabina','type'=>12,'code_deis' =>118317,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lomas Coloradas','alias'=>'Centro de Salud Familiar Lomas Coloradas','type'=>12,'code_deis' =>118318,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Pedro de La Costa','alias'=>'Centro de Salud Familiar San Pedro de La Costa','type'=>12,'code_deis' =>118319,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Juan Cartes Arias','alias'=>'Centro de Salud Familiar Dr. Juan Cartes Arias','type'=>12,'code_deis' =>118325,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Hualqui','alias'=>'Centro de Salud Familiar Hualqui','type'=>12,'code_deis' =>118326,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Manco','alias'=>'Posta de Salud Rural Manco','type'=>13,'code_deis' =>118401,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puerto Norte Isla Sta. María','alias'=>'Posta de Salud Rural Puerto Norte Isla Sta. María','type'=>13,'code_deis' =>118403,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Talcamávida','alias'=>'Posta de Salud Rural Talcamávida','type'=>13,'code_deis' =>118430,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quilacoya','alias'=>'Posta de Salud Rural Quilacoya','type'=>13,'code_deis' =>118431,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Generala','alias'=>'Posta de Salud Rural La Generala','type'=>13,'code_deis' =>118432,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Colico Alto','alias'=>'Posta de Salud Rural Colico Alto','type'=>13,'code_deis' =>118433,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tanahuillín','alias'=>'Posta de Salud Rural Tanahuillín','type'=>13,'code_deis' =>118434,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chacay (Santa Juana)','alias'=>'Posta de Salud Rural Chacay (Santa Juana)','type'=>13,'code_deis' =>118435,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Torre Dorada','alias'=>'Posta de Salud Rural Torre Dorada','type'=>13,'code_deis' =>118436,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Purgatorio','alias'=>'Posta de Salud Rural Purgatorio','type'=>13,'code_deis' =>118437,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Granerillos','alias'=>'Posta de Salud Rural Granerillos','type'=>13,'code_deis' =>118439,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cancha Los Monteros','alias'=>'Posta de Salud Rural Cancha Los Monteros','type'=>13,'code_deis' =>118441,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Roa','alias'=>'Posta de Salud Rural Roa','type'=>13,'code_deis' =>118445,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Patagual','alias'=>'Posta de Salud Rural Patagual','type'=>13,'code_deis' =>118446,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Laboratorio Clínico Hasiles','alias'=>'Laboratorio Clínico Hasiles','type'=>10,'code_deis' =>118501,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Seres Ltda.','alias'=>'Laboratorio Clínico Seres Ltda.','type'=>10,'code_deis' =>118503,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Lincoyán','alias'=>'Laboratorio Clínico Lincoyán','type'=>10,'code_deis' =>118504,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Dr. Raúl Campos y Cía. Ltda.','alias'=>'Laboratorio Clínico Dr. Raúl Campos y Cía. Ltda.','type'=>10,'code_deis' =>118505,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Dr. Gustavo Torrejón Sanhueza y Cía. Ltda.','alias'=>'Laboratorio Clínico Dr. Gustavo Torrejón Sanhueza y Cía. Ltda.','type'=>10,'code_deis' =>118506,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Tecnimed Ltda.','alias'=>'Laboratorio Clínico Tecnimed Ltda.','type'=>10,'code_deis' =>118507,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Dimet Ltda.','alias'=>'Laboratorio Clínico Dimet Ltda.','type'=>10,'code_deis' =>118508,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Diagonal','alias'=>'Laboratorio Clínico Diagonal','type'=>10,'code_deis' =>118509,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Castellón','alias'=>'Laboratorio Clínico Castellón','type'=>10,'code_deis' =>118510,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Inmunomedica Ltda.','alias'=>'Laboratorio Clínico Inmunomedica Ltda.','type'=>10,'code_deis' =>118511,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico C.D.S','alias'=>'Laboratorio Clínico C.D.S','type'=>10,'code_deis' =>118512,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Schwerter','alias'=>'Laboratorio Clínico Schwerter','type'=>10,'code_deis' =>118513,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Labotem','alias'=>'Laboratorio Clínico Labotem','type'=>10,'code_deis' =>118514,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Diagnomed','alias'=>'Laboratorio Clínico Diagnomed','type'=>10,'code_deis' =>118515,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico de Exploración Renal','alias'=>'Laboratorio Clínico de Exploración Renal','type'=>10,'code_deis' =>118516,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Instituto Teletón Concepción','alias'=>'Instituto Teletón Concepción','type'=>8,'code_deis' =>118517,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad Coronel','alias'=>'Policlínico de la Asociación Chilena de Seguridad Coronel','type'=>8,'code_deis' =>118518,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Hospital de Centro de Cumplimiento Penitenciario Biobío','alias'=>'Hospital de Centro de Cumplimiento Penitenciario Biobío','type'=>7,'code_deis' =>118519,'service' =>29,'dependency' =>4]);
Organization::Create(['name' => 'Laboratorio Clínico Dr. Fructuoso Biel y Cia Ltda.','alias'=>'Laboratorio Clínico Dr. Fructuoso Biel y Cia Ltda.','type'=>10,'code_deis' =>118522,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico IMEDIM','alias'=>'Laboratorio Clínico IMEDIM','type'=>10,'code_deis' =>118523,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Radiológico Concepción Ltda.','alias'=>'Centro Médico Radiológico Concepción Ltda.','type'=>8,'code_deis' =>118524,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio de Especialidades Medicas EMSA S.A','alias'=>'Laboratorio de Especialidades Medicas EMSA S.A','type'=>10,'code_deis' =>118525,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'COSAM de Coronel','alias'=>'COSAM de Coronel','type'=>14,'code_deis' =>118600,'service' =>28,'dependency' =>4]);
Organization::Create(['name' => 'COSAM Comunitaria Lota','alias'=>'COSAM Comunitaria Lota','type'=>14,'code_deis' =>118601,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Villa Nonguén (Organizaciones sin fines de lucro y ONG)','alias'=>'Centro de Salud Familiar Villa Nonguén (Organizaciones sin fines de lucro y ONG)','type'=>12,'code_deis' =>118609,'service' =>28,'dependency' =>4]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Copiulemu','alias'=>'Centro Comunitario de Salud Familiar Copiulemu','type'=>16,'code_deis' =>118700,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Puerto Sur Isla Sta. María','alias'=>'Centro Comunitario de Salud Familiar Puerto Sur Isla Sta. María','type'=>16,'code_deis' =>118702,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Colcura','alias'=>'Centro Comunitario de Salud Familiar Colcura','type'=>16,'code_deis' =>118704,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Boca Sur','alias'=>'Centro Comunitario de Salud Familiar Boca Sur','type'=>16,'code_deis' =>118708,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Lagunillas','alias'=>'Centro Comunitario de Salud Familiar Lagunillas','type'=>16,'code_deis' =>118712,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Escuadrón','alias'=>'Centro Comunitario de Salud Familiar Escuadrón','type'=>16,'code_deis' =>118713,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Hualqui','alias'=>'Centro Comunitario de Salud Familiar Hualqui','type'=>16,'code_deis' =>118726,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Boca Sur','alias'=>'SAPU Boca Sur','type'=>20,'code_deis' =>118802,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAR Tucapel','alias'=>'SAR Tucapel','type'=>20,'code_deis' =>118806,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Chiguayante','alias'=>'SAPU Chiguayante','type'=>20,'code_deis' =>118807,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAPU San Pedro de La Paz','alias'=>'SAPU San Pedro de La Paz','type'=>20,'code_deis' =>118808,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Lorenzo Arenas','alias'=>'SAPU Lorenzo Arenas','type'=>20,'code_deis' =>118809,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Juan Soto Fernández','alias'=>'SAPU Juan Soto Fernández','type'=>20,'code_deis' =>118810,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Lagunillas','alias'=>'SAPU Lagunillas','type'=>20,'code_deis' =>118812,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Yobilo','alias'=>'SAPU Yobilo','type'=>20,'code_deis' =>118813,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Leonera','alias'=>'SAPU Leonera','type'=>20,'code_deis' =>118814,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Santa Sabina','alias'=>'SAPU Santa Sabina','type'=>20,'code_deis' =>118817,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Loma Colorada','alias'=>'SAPU Loma Colorada','type'=>20,'code_deis' =>118818,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Hualqui','alias'=>'SAPU Hualqui','type'=>20,'code_deis' =>118826,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Talcahuano)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Talcahuano)','type'=>1,'code_deis' =>119010,'service' =>30,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Talcahuano)','alias'=>'PRAIS (S.S Talcahuano)','type'=>2,'code_deis' =>119011,'service' =>30,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Las Higueras (Talcahuano)','alias'=>'Hospital Las Higueras (Talcahuano)','type'=>5,'code_deis' =>119100,'service' =>30,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Tomé','alias'=>'Hospital de Tomé','type'=>5,'code_deis' =>119101,'service' =>30,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Penco Lirquén','alias'=>'Hospital Penco Lirquén','type'=>23,'code_deis' =>119102,'service' =>30,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Instituto de Seguridad del Trabajo Talcahuano','alias'=>'Hospital Instituto de Seguridad del Trabajo Talcahuano','type'=>7,'code_deis' =>119200,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Naval Almirante Adriazola','alias'=>'Hospital Naval Almirante Adriazola','type'=>7,'code_deis' =>119203,'service' =>29,'dependency' =>5]);
Organization::Create(['name' => 'Clínica Bio Bio','alias'=>'Clínica Bio Bio','type'=>6,'code_deis' =>119207,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Universitaria de Concepción','alias'=>'Clínica Universitaria de Concepción','type'=>6,'code_deis' =>119208,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Clínica de Atención Ambulatoria Mutual de Seguridad CChC Hualpén','alias'=>'Clínica de Atención Ambulatoria Mutual de Seguridad CChC Hualpén','type'=>8,'code_deis' =>119212,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico YUEN','alias'=>'Laboratorio Clínico YUEN','type'=>10,'code_deis' =>119213,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico ITAMED','alias'=>'Laboratorio Clínico ITAMED','type'=>10,'code_deis' =>119214,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad Talcahuano','alias'=>'Policlínico de la Asociación Chilena de Seguridad Talcahuano','type'=>8,'code_deis' =>119216,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Hualpencillo','alias'=>'Centro de Salud Familiar Hualpencillo','type'=>12,'code_deis' =>119301,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Vicente','alias'=>'Centro de Salud Familiar San Vicente','type'=>12,'code_deis' =>119302,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Alcalde Leocán Portus','alias'=>'Centro de Salud Familiar Alcalde Leocán Portus','type'=>12,'code_deis' =>119303,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Penco','alias'=>'Centro de Salud Familiar Penco','type'=>12,'code_deis' =>119304,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Alberto Reyes','alias'=>'Centro de Salud Familiar Dr. Alberto Reyes','type'=>12,'code_deis' =>119305,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Bellavista','alias'=>'Centro de Salud Familiar Bellavista','type'=>12,'code_deis' =>119306,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Paulina Avendaño Pereda','alias'=>'Centro de Salud Familiar Paulina Avendaño Pereda','type'=>12,'code_deis' =>119307,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Los Cerros','alias'=>'Centro de Salud Familiar Los Cerros','type'=>12,'code_deis' =>119308,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Talcahuano Sur','alias'=>'Centro de Salud Familiar Talcahuano Sur','type'=>12,'code_deis' =>119309,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Floresta','alias'=>'Centro de Salud Familiar La Floresta','type'=>12,'code_deis' =>119310,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lirquén','alias'=>'Centro de Salud Familiar Lirquén','type'=>12,'code_deis' =>119311,'service' =>30,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Tumbes','alias'=>'Posta de Salud Rural Tumbes','type'=>13,'code_deis' =>119400,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rafael','alias'=>'Posta de Salud Rural Rafael','type'=>13,'code_deis' =>119401,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dichato','alias'=>'Centro de Salud Familiar Dichato','type'=>12,'code_deis' =>119402,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Menque','alias'=>'Posta de Salud Rural Menque','type'=>13,'code_deis' =>119403,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coliumo','alias'=>'Posta de Salud Rural Coliumo','type'=>13,'code_deis' =>119404,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Hualpén','alias'=>'COSAM Hualpén','type'=>14,'code_deis' =>119601,'service' =>30,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar España','alias'=>'Centro Comunitario de Salud Familiar España','type'=>16,'code_deis' =>119701,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar 8 de Mayo','alias'=>'Centro Comunitario de Salud Familiar 8 de Mayo','type'=>16,'code_deis' =>119702,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Cosmito','alias'=>'Centro Comunitario de Salud Familiar Cosmito','type'=>16,'code_deis' =>119703,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Forjadores','alias'=>'Centro Comunitario de Salud Familiar Los Forjadores','type'=>16,'code_deis' =>119704,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Esmeralda','alias'=>'Centro Comunitario de Salud Familiar Esmeralda','type'=>16,'code_deis' =>119705,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Rene Schneider','alias'=>'Centro Comunitario de Salud Familiar Rene Schneider','type'=>16,'code_deis' =>119706,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Llafkelen','alias'=>'Centro Comunitario de Salud Familiar Llafkelen','type'=>16,'code_deis' =>119707,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Santo Esfuerzo de Todos','alias'=>'Centro Comunitario de Salud Familiar El Santo Esfuerzo de Todos','type'=>16,'code_deis' =>119708,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Leocán Portus Govinden','alias'=>'Centro Comunitario de Salud Familiar Leocán Portus Govinden','type'=>16,'code_deis' =>119709,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Libertad Gaete','alias'=>'Centro Comunitario de Salud Familiar Libertad Gaete','type'=>16,'code_deis' =>119710,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Lobos la Gloria','alias'=>'Centro Comunitario de Salud Familiar Los Lobos la Gloria','type'=>16,'code_deis' =>119711,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'SAR Hualpencillo','alias'=>'SAR Hualpencillo','type'=>20,'code_deis' =>119801,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'SAR San Vicente','alias'=>'SAR San Vicente','type'=>20,'code_deis' =>119802,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Paulina Avendaño Pereda','alias'=>'SAPU Paulina Avendaño Pereda','type'=>20,'code_deis' =>119803,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'SAR Penco','alias'=>'SAR Penco','type'=>20,'code_deis' =>119804,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'SAR Dr. Alberto Reyes','alias'=>'SAR Dr. Alberto Reyes','type'=>20,'code_deis' =>119805,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Alcalde Leocán Portus','alias'=>'SAPU Alcalde Leocán Portus','type'=>20,'code_deis' =>119807,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Los Cerros','alias'=>'SAPU Los Cerros','type'=>20,'code_deis' =>119808,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Talcahuano Sur','alias'=>'SAPU Talcahuano Sur','type'=>20,'code_deis' =>119809,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Bíobío)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Bíobío)','type'=>1,'code_deis' =>120010,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Bíobío)','alias'=>'PRAIS (S.S Bíobío)','type'=>2,'code_deis' =>120011,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. UW9511 (Huepil)','alias'=>'Clínica Dental Móvil Triple. Pat. UW9511 (Huepil)','type'=>3,'code_deis' =>120012,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. NW6995 (Santa Bárbara)','alias'=>'Clínica Dental Móvil Triple. Pat. NW6995 (Santa Bárbara)','type'=>3,'code_deis' =>120013,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. NW6996 (Yumbel)','alias'=>'Clínica Dental Móvil Triple. Pat. NW6996 (Yumbel)','type'=>3,'code_deis' =>120014,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Complejo Asistencial Dr. Víctor Ríos Ruiz (Los Ángeles)','alias'=>'Complejo Asistencial Dr. Víctor Ríos Ruiz (Los Ángeles)','type'=>5,'code_deis' =>120101,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Mulchén','alias'=>'Hospital de Mulchén','type'=>22,'code_deis' =>120102,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario y Familiar de Nacimiento','alias'=>'Hospital Comunitario y Familiar de Nacimiento','type'=>22,'code_deis' =>120103,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario de Yumbel','alias'=>'Hospital Comunitario de Yumbel','type'=>22,'code_deis' =>120104,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario de Laja','alias'=>'Hospital Comunitario de Laja','type'=>22,'code_deis' =>120105,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario de Santa Bárbara','alias'=>'Hospital Comunitario de Santa Bárbara','type'=>22,'code_deis' =>120106,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario Dr. Roberto Muñoz Urrutia de Huépil','alias'=>'Hospital Comunitario Dr. Roberto Muñoz Urrutia de Huépil','type'=>22,'code_deis' =>120107,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Policlínico AChS Los ángeles','alias'=>'Policlínico AChS Los ángeles','type'=>8,'code_deis' =>120202,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Adventista','alias'=>'Clínica Adventista','type'=>6,'code_deis' =>120205,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico AChS Subregional Nacimiento','alias'=>'Policlínico AChS Subregional Nacimiento','type'=>8,'code_deis' =>120207,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Los Andes','alias'=>'Clínica Los Andes','type'=>6,'code_deis' =>120208,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Mutual de Seguridad CChC Los Ángeles','alias'=>'Hospital Mutual de Seguridad CChC Los Ángeles','type'=>7,'code_deis' =>120213,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Megasalud S.A. Centro Médico y Dental Los Ángeles','alias'=>'Megasalud S.A. Centro Médico y Dental Los Ángeles','type'=>17,'code_deis' =>120221,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Central Kojchen y Compañía Limitada','alias'=>'Laboratorio Clínico Central Kojchen y Compañía Limitada','type'=>10,'code_deis' =>120222,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Cordillera','alias'=>'Laboratorio Clínico Cordillera','type'=>10,'code_deis' =>120223,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Biomec','alias'=>'Laboratorio Clínico Biomec','type'=>10,'code_deis' =>120224,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Buena Salud','alias'=>'Vacunatorio Buena Salud','type'=>18,'code_deis' =>120225,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Nororiente de Los Ángeles','alias'=>'Centro de Salud Familiar Nororiente de Los Ángeles','type'=>12,'code_deis' =>120301,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Fe','alias'=>'Centro de Salud Familiar Santa Fe','type'=>12,'code_deis' =>120302,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Antuco','alias'=>'Centro de Salud Familiar Antuco','type'=>12,'code_deis' =>120303,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Monteaguila','alias'=>'Centro de Salud Familiar Monteaguila','type'=>12,'code_deis' =>120304,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lautaro Cáceres Ramos','alias'=>'Centro de Salud Familiar Lautaro Cáceres Ramos','type'=>12,'code_deis' =>120305,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quilleco','alias'=>'Centro de Salud Familiar Quilleco','type'=>12,'code_deis' =>120306,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Yanequén','alias'=>'Centro de Salud Familiar Yanequén','type'=>12,'code_deis' =>120307,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Carlos Echeverría Véjar','alias'=>'Centro de Salud Familiar Dr. Carlos Echeverría Véjar','type'=>12,'code_deis' =>120308,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar 2 Septiembre','alias'=>'Centro de Salud Familiar 2 Septiembre','type'=>12,'code_deis' =>120309,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Norte de Los Ángeles','alias'=>'Centro de Salud Familiar Norte de Los Ángeles','type'=>12,'code_deis' =>120310,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Paillihue','alias'=>'Centro de Salud Familiar Paillihue','type'=>12,'code_deis' =>120311,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Ralco','alias'=>'Centro de Salud Familiar Ralco','type'=>12,'code_deis' =>120312,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Yumbel Estación','alias'=>'Centro de Salud Familiar Yumbel Estación','type'=>12,'code_deis' =>120313,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Canteras Villa Mercedes','alias'=>'Centro de Salud Familiar Canteras Villa Mercedes','type'=>12,'code_deis' =>120314,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Nuevo Horizonte','alias'=>'Centro de Salud Familiar Nuevo Horizonte','type'=>12,'code_deis' =>120315,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio General Rural Quilaco','alias'=>'Consultorio General Rural Quilaco','type'=>12,'code_deis' =>120316,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Millantú','alias'=>'Posta de Salud Rural Millantú','type'=>13,'code_deis' =>120401,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chacayal Norte','alias'=>'Posta de Salud Rural Chacayal Norte','type'=>13,'code_deis' =>120402,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Durazno ( Los Ángeles)','alias'=>'Posta de Salud Rural El Durazno ( Los Ángeles)','type'=>13,'code_deis' =>120403,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Molinos','alias'=>'Posta de Salud Rural Los Molinos','type'=>13,'code_deis' =>120404,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Llano Blanco','alias'=>'Posta de Salud Rural Llano Blanco','type'=>13,'code_deis' =>120405,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Troncos','alias'=>'Posta de Salud Rural Los Troncos','type'=>13,'code_deis' =>120406,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Peral','alias'=>'Centro Comunitario de Salud Familiar El Peral','type'=>16,'code_deis' =>120407,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Carlos','alias'=>'Posta de Salud Rural San Carlos','type'=>13,'code_deis' =>120408,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mesamávida (Los Ángeles)','alias'=>'Posta de Salud Rural Mesamávida (Los Ángeles)','type'=>13,'code_deis' =>120409,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Gerardo','alias'=>'Posta de Salud Rural San Gerardo','type'=>13,'code_deis' =>120410,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Dicahue','alias'=>'Posta de Salud Rural Dicahue','type'=>13,'code_deis' =>120411,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Salto del Laja','alias'=>'Posta de Salud Rural Salto del Laja','type'=>13,'code_deis' =>120412,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Robles (Los Ángeles)','alias'=>'Posta de Salud Rural Los Robles (Los Ángeles)','type'=>13,'code_deis' =>120413,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alborada','alias'=>'Posta de Salud Rural Alborada','type'=>13,'code_deis' =>120414,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Canelos (Antuco)','alias'=>'Posta de Salud Rural Los Canelos (Antuco)','type'=>13,'code_deis' =>120415,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Cisne','alias'=>'Posta de Salud Rural El Cisne','type'=>13,'code_deis' =>120416,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tierras Libres','alias'=>'Posta de Salud Rural Tierras Libres','type'=>13,'code_deis' =>120417,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Adriana','alias'=>'Posta de Salud Rural Santa Adriana','type'=>13,'code_deis' =>120418,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Colonia','alias'=>'Posta de Salud Rural La Colonia','type'=>13,'code_deis' =>120419,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Elena (Laja)','alias'=>'Posta de Salud Rural Santa Elena (Laja)','type'=>13,'code_deis' =>120420,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puente Perales','alias'=>'Posta de Salud Rural Puente Perales','type'=>13,'code_deis' =>120421,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Dollinco (Nacimiento)','alias'=>'Posta de Salud Rural Dollinco (Nacimiento)','type'=>13,'code_deis' =>120422,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Culenco','alias'=>'Posta de Salud Rural Culenco','type'=>13,'code_deis' =>120423,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Choroico (Nacimiento)','alias'=>'Posta de Salud Rural Choroico (Nacimiento)','type'=>13,'code_deis' =>120424,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coigue','alias'=>'Posta de Salud Rural Coigue','type'=>13,'code_deis' =>120425,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Millapoa','alias'=>'Posta de Salud Rural Millapoa','type'=>13,'code_deis' =>120426,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Carrizal','alias'=>'Posta de Salud Rural Carrizal','type'=>13,'code_deis' =>120427,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Roque','alias'=>'Posta de Salud Rural San Roque','type'=>13,'code_deis' =>120428,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rihue','alias'=>'Posta de Salud Rural Rihue','type'=>13,'code_deis' =>120429,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rucamanqui','alias'=>'Posta de Salud Rural Rucamanqui','type'=>13,'code_deis' =>120430,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rucalhue','alias'=>'Posta de Salud Rural Rucalhue','type'=>13,'code_deis' =>120431,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Loncopangue','alias'=>'Posta de Salud Rural Loncopangue','type'=>13,'code_deis' =>120432,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Campamento','alias'=>'Posta de Salud Rural Campamento','type'=>13,'code_deis' =>120434,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tinajón','alias'=>'Posta de Salud Rural Tinajón','type'=>13,'code_deis' =>120435,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Turquía','alias'=>'Posta de Salud Rural Turquía','type'=>13,'code_deis' =>120436,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Piñiquihue','alias'=>'Posta de Salud Rural Piñiquihue','type'=>13,'code_deis' =>120438,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pitril','alias'=>'Posta de Salud Rural Pitril','type'=>13,'code_deis' =>120441,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Villucura','alias'=>'Posta de Salud Rural Villucura','type'=>13,'code_deis' =>120442,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Huachi','alias'=>'Posta de Salud Rural El Huachi','type'=>13,'code_deis' =>120443,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Callaqui','alias'=>'Posta de Salud Rural Callaqui','type'=>13,'code_deis' =>120444,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Trapa Trapa','alias'=>'Posta de Salud Rural Trapa Trapa','type'=>13,'code_deis' =>120445,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Boldos','alias'=>'Posta de Salud Rural Los Boldos','type'=>13,'code_deis' =>120447,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ralco Lepoy','alias'=>'Posta de Salud Rural Ralco Lepoy','type'=>13,'code_deis' =>120448,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Malla Malla','alias'=>'Posta de Salud Rural Malla Malla','type'=>13,'code_deis' =>120449,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Malla Palmucho','alias'=>'Posta de Salud Rural Malla Palmucho','type'=>13,'code_deis' =>120450,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Aguada','alias'=>'Posta de Salud Rural La Aguada','type'=>13,'code_deis' =>120451,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rere','alias'=>'Posta de Salud Rural Rere','type'=>13,'code_deis' =>120452,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tomeco','alias'=>'Posta de Salud Rural Tomeco','type'=>13,'code_deis' =>120453,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Río Claro','alias'=>'Posta de Salud Rural Río Claro','type'=>13,'code_deis' =>120454,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chillancito','alias'=>'Posta de Salud Rural Chillancito','type'=>13,'code_deis' =>120455,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Charrúa','alias'=>'Posta de Salud Rural Charrúa','type'=>13,'code_deis' =>120456,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Colicheo','alias'=>'Posta de Salud Rural Colicheo','type'=>13,'code_deis' =>120457,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio General Rural Tucapel','alias'=>'Consultorio General Rural Tucapel','type'=>12,'code_deis' =>120458,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Trupán','alias'=>'Posta de Salud Rural Trupán','type'=>13,'code_deis' =>120459,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Polcura','alias'=>'Posta de Salud Rural Polcura','type'=>13,'code_deis' =>120460,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quinel','alias'=>'Posta de Salud Rural Quinel','type'=>13,'code_deis' =>120461,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Río Pardo','alias'=>'Posta de Salud Rural Río Pardo','type'=>13,'code_deis' =>120462,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cañicura','alias'=>'Posta de Salud Rural Cañicura','type'=>13,'code_deis' =>120463,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cauñicú','alias'=>'Posta de Salud Rural Cauñicú','type'=>13,'code_deis' =>120464,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mañihual','alias'=>'Posta de Salud Rural Mañihual','type'=>13,'code_deis' =>120465,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rapelco','alias'=>'Posta de Salud Rural Rapelco','type'=>13,'code_deis' =>120466,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chacayal Sur','alias'=>'Posta de Salud Rural Chacayal Sur','type'=>13,'code_deis' =>120467,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Virquenco','alias'=>'Posta de Salud Rural Virquenco','type'=>13,'code_deis' =>120468,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Junquillos','alias'=>'Posta de Salud Rural Los Junquillos','type'=>13,'code_deis' =>120469,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alhuelemu','alias'=>'Posta de Salud Rural Alhuelemu','type'=>13,'code_deis' =>120470,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Butalelbum','alias'=>'Posta de Salud Rural Butalelbum','type'=>13,'code_deis' =>120471,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Castillo','alias'=>'Posta de Salud Rural El Castillo','type'=>13,'code_deis' =>120472,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Canchillas','alias'=>'Posta de Salud Rural Canchillas','type'=>13,'code_deis' =>120473,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Galvarino','alias'=>'Centro Comunitario de Salud Familiar Galvarino','type'=>16,'code_deis' =>120701,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Mulchén','alias'=>'Centro Comunitario de Salud Familiar Mulchén','type'=>16,'code_deis' =>120702,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Julio Hemmelmann','alias'=>'Centro Comunitario de Salud Familiar Julio Hemmelmann','type'=>16,'code_deis' =>120703,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Lautaro','alias'=>'Centro Comunitario de Salud Familiar Lautaro','type'=>16,'code_deis' =>120704,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Pioneros','alias'=>'Centro Comunitario de Salud Familiar Los Pioneros','type'=>16,'code_deis' =>120710,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa Los Ríos','alias'=>'Centro Comunitario de Salud Familiar Villa Los Ríos','type'=>16,'code_deis' =>120711,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Carrera','alias'=>'Centro Comunitario de Salud Familiar Los Carrera','type'=>16,'code_deis' =>120780,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Las Azaleas','alias'=>'Centro Comunitario de Salud Familiar Las Azaleas','type'=>16,'code_deis' =>120781,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'SAR Cabrero','alias'=>'SAR Cabrero','type'=>20,'code_deis' =>120805,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Paillihue','alias'=>'SAPU Paillihue','type'=>20,'code_deis' =>120811,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'SAR Norte','alias'=>'SAR Norte','type'=>20,'code_deis' =>120815,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Araucanía Sur)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Araucanía Sur)','type'=>1,'code_deis' =>121010,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Araucanía Sur)','alias'=>'PRAIS (S.S Araucanía Sur)','type'=>2,'code_deis' =>121011,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Doble. Pat. BBZV83 (Temuco)','alias'=>'Clínica Dental Móvil Doble. Pat. BBZV83 (Temuco)','type'=>3,'code_deis' =>121012,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Doble. Pat. BBZV84 (Temuco)','alias'=>'Clínica Dental Móvil Doble. Pat. BBZV84 (Temuco)','type'=>3,'code_deis' =>121013,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Doble. Pat. BBZV85 (Temuco)','alias'=>'Clínica Dental Móvil Doble. Pat. BBZV85 (Temuco)','type'=>3,'code_deis' =>121014,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Hernán Henríquez Aravena (Temuco)','alias'=>'Hospital Dr. Hernán Henríquez Aravena (Temuco)','type'=>5,'code_deis' =>121109,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Abraham Godoy Peña (Lautaro)','alias'=>'Hospital Dr. Abraham Godoy Peña (Lautaro)','type'=>23,'code_deis' =>121110,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Galvarino','alias'=>'Hospital de Galvarino','type'=>22,'code_deis' =>121111,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Vilcún','alias'=>'Hospital de Vilcún','type'=>22,'code_deis' =>121112,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Eduardo González Galeno (Cunco)','alias'=>'Hospital Dr. Eduardo González Galeno (Cunco)','type'=>22,'code_deis' =>121113,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Intercultural de Nueva Imperial','alias'=>'Hospital Intercultural de Nueva Imperial','type'=>23,'code_deis' =>121114,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Carahue','alias'=>'Hospital de Carahue','type'=>22,'code_deis' =>121115,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Arturo Hillerns Larrañaga (Saavedra)','alias'=>'Hospital Dr. Arturo Hillerns Larrañaga (Saavedra)','type'=>22,'code_deis' =>121116,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Pitrufquén','alias'=>'Hospital de Pitrufquén','type'=>23,'code_deis' =>121117,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Toltén','alias'=>'Hospital de Toltén','type'=>22,'code_deis' =>121118,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Gorbea','alias'=>'Hospital de Gorbea','type'=>22,'code_deis' =>121119,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Familiar y Comunitario de Loncoche','alias'=>'Hospital Familiar y Comunitario de Loncoche','type'=>22,'code_deis' =>121120,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Villarrica','alias'=>'Hospital de Villarrica','type'=>23,'code_deis' =>121121,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Francisco de Pucón (D)','alias'=>'Hospital San Francisco de Pucón (D)','type'=>22,'code_deis' =>121200,'service' =>32,'dependency' =>4]);
Organization::Create(['name' => 'Hospital Makewe (D)','alias'=>'Hospital Makewe (D)','type'=>22,'code_deis' =>121201,'service' =>32,'dependency' =>4]);
Organization::Create(['name' => 'Clínica Alemana de Temuco','alias'=>'Clínica Alemana de Temuco','type'=>6,'code_deis' =>121202,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Hospital del Trabajador AChS de Temuco','alias'=>'Hospital del Trabajador AChS de Temuco','type'=>7,'code_deis' =>121205,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro CONIN Temuco','alias'=>'Centro CONIN Temuco','type'=>26,'code_deis' =>121207,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Clínico de la Universidad Mayor','alias'=>'Hospital Clínico de la Universidad Mayor','type'=>7,'code_deis' =>121209,'service' =>33,'dependency' =>4]);
Organization::Create(['name' => 'Megasalud S.A. Centro Médico y Dental Temuco','alias'=>'Megasalud S.A. Centro Médico y Dental Temuco','type'=>17,'code_deis' =>121245,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Temuco','alias'=>'Centro de Salud Mutual CChC Temuco','type'=>8,'code_deis' =>121246,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diagnóstico y Tratamiento SIRESA','alias'=>'Centro de Diagnóstico y Tratamiento SIRESA','type'=>8,'code_deis' =>121247,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud CIREPLAST','alias'=>'Centro de Salud CIREPLAST','type'=>8,'code_deis' =>121248,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mamodiagnosis','alias'=>'Centro de Salud Mamodiagnosis','type'=>8,'code_deis' =>121249,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de la Cruz Roja Temuco','alias'=>'Centro de la Cruz Roja Temuco','type'=>8,'code_deis' =>121250,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Austral','alias'=>'Laboratorio Clínico Austral','type'=>10,'code_deis' =>121251,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Dra. Ruth Schurch','alias'=>'Laboratorio Clínico Dra. Ruth Schurch','type'=>10,'code_deis' =>121252,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bioanalisis','alias'=>'Laboratorio Clínico Bioanalisis','type'=>10,'code_deis' =>121253,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Caupolican','alias'=>'Laboratorio Clínico Caupolican','type'=>10,'code_deis' =>121254,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Central','alias'=>'Laboratorio Clínico Central','type'=>10,'code_deis' =>121255,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Imex','alias'=>'Laboratorio Clínico Imex','type'=>10,'code_deis' =>121256,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Inmunológico del Sur - Labisur','alias'=>'Laboratorio Inmunológico del Sur - Labisur','type'=>10,'code_deis' =>121257,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio de Citopatología y Papanicolau','alias'=>'Laboratorio de Citopatología y Papanicolau','type'=>10,'code_deis' =>121258,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Medisur','alias'=>'Laboratorio Clínico Medisur','type'=>10,'code_deis' =>121262,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Citopatología Dra. Espejo','alias'=>'Laboratorio Citopatología Dra. Espejo','type'=>10,'code_deis' =>121263,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro Diagnóstico Histopatología Citopatología','alias'=>'Centro Diagnóstico Histopatología Citopatología','type'=>8,'code_deis' =>121264,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro Radiológico y Ecotomografico Imagen','alias'=>'Centro Radiológico y Ecotomografico Imagen','type'=>8,'code_deis' =>121265,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Instituto de Mamografía Limitada','alias'=>'Instituto de Mamografía Limitada','type'=>8,'code_deis' =>121266,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Sociedad Inmunomédica Diagnóstico Temuco','alias'=>'Sociedad Inmunomédica Diagnóstico Temuco','type'=>8,'code_deis' =>121267,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Pitrufquén','alias'=>'Laboratorio Clínico Pitrufquén','type'=>10,'code_deis' =>121270,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro Radiológico Villarrica','alias'=>'Centro Radiológico Villarrica','type'=>8,'code_deis' =>121272,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico del Lago','alias'=>'Laboratorio Clínico del Lago','type'=>10,'code_deis' =>121273,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Gendarmería de Chile (Temuco)','alias'=>'Centro de Salud Gendarmería de Chile (Temuco)','type'=>8,'code_deis' =>121274,'service' =>33,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Salud Regional de Gendarmería de Chile Región de La Araucanía','alias'=>'Centro de Salud Regional de Gendarmería de Chile Región de La Araucanía','type'=>8,'code_deis' =>121275,'service' =>33,'dependency' =>4]);
Organization::Create(['name' => 'SurImagen Ltda.','alias'=>'SurImagen Ltda.','type'=>8,'code_deis' =>121276,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental de Carabineros de Chile Zona IX Araucanía','alias'=>'Centro Médico y Dental de Carabineros de Chile Zona IX Araucanía','type'=>17,'code_deis' =>121278,'service' =>33,'dependency' =>5]);
Organization::Create(['name' => 'Sociedad de Imagenología Clínica Bioimagen Ltda.','alias'=>'Sociedad de Imagenología Clínica Bioimagen Ltda.','type'=>8,'code_deis' =>121279,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Sociedad Inmunomédica','alias'=>'Laboratorio Sociedad Inmunomédica','type'=>8,'code_deis' =>121280,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Temuco','alias'=>'Laboratorio Clínico Bionet S.A. - Temuco','type'=>10,'code_deis' =>121281,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Miraflores (Temuco)','alias'=>'Centro de Salud Familiar Miraflores (Temuco)','type'=>12,'code_deis' =>121303,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Freire','alias'=>'Centro de Salud Familiar Freire','type'=>12,'code_deis' =>121304,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Villa Alegre','alias'=>'Centro de Salud Familiar Villa Alegre','type'=>12,'code_deis' =>121305,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Santa Rosa','alias'=>'Centro de Salud Familiar Santa Rosa','type'=>12,'code_deis' =>121306,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Amanecer','alias'=>'Centro de Salud Familiar Amanecer','type'=>12,'code_deis' =>121307,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Padre Las Casas','alias'=>'Centro de Salud Familiar Padre Las Casas','type'=>12,'code_deis' =>121308,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pueblo Nuevo','alias'=>'Centro de Salud Familiar Pueblo Nuevo','type'=>12,'code_deis' =>121309,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Melipeuco','alias'=>'Centro de Salud Familiar Melipeuco','type'=>12,'code_deis' =>121311,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Teodoro Schmidt','alias'=>'Centro de Salud Familiar Teodoro Schmidt','type'=>12,'code_deis' =>121312,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio Curarrehue','alias'=>'Consultorio Curarrehue','type'=>12,'code_deis' =>121313,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio Perquenco','alias'=>'Consultorio Perquenco','type'=>12,'code_deis' =>121323,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Andrés Sandoval Calderón','alias'=>'Centro de Salud Familiar Andrés Sandoval Calderón','type'=>12,'code_deis' =>121326,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Chol Chol','alias'=>'Centro de Salud Familiar Chol Chol','type'=>12,'code_deis' =>121327,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Trovolhue','alias'=>'Centro de Salud Familiar Trovolhue','type'=>12,'code_deis' =>121328,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Villarrica','alias'=>'Centro de Salud Familiar Villarrica','type'=>12,'code_deis' =>121334,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Las Colinas','alias'=>'Centro de Salud Familiar Las Colinas','type'=>12,'code_deis' =>121336,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quepe','alias'=>'Centro de Salud Familiar Quepe','type'=>12,'code_deis' =>121337,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Intercultural Boroa Filulawen (D)','alias'=>'Centro de Salud Intercultural Boroa Filulawen (D)','type'=>12,'code_deis' =>121339,'service' =>32,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Salud Familiar Nueva Imperial','alias'=>'Centro de Salud Familiar Nueva Imperial','type'=>12,'code_deis' =>121341,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pulmahue','alias'=>'Centro de Salud Familiar Pulmahue','type'=>12,'code_deis' =>121342,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Referencia de Salud Miraflores','alias'=>'Centro de Referencia de Salud Miraflores','type'=>25,'code_deis' =>121343,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Lautaro','alias'=>'Centro de Salud Familiar Lautaro','type'=>12,'code_deis' =>121346,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pedro de Valdivia','alias'=>'Centro de Salud Familiar Pedro de Valdivia','type'=>12,'code_deis' =>121347,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lican Ray','alias'=>'Centro de Salud Familiar Lican Ray','type'=>12,'code_deis' =>121348,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Hualpín','alias'=>'Centro de Salud Familiar Hualpín','type'=>12,'code_deis' =>121349,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Labranza','alias'=>'Centro de Salud Familiar Labranza','type'=>12,'code_deis' =>121350,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Docente Asistencial Monseñor Sergio Valech','alias'=>'Centro de Salud Docente Asistencial Monseñor Sergio Valech','type'=>12,'code_deis' =>121352,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Rural Pitrufquén','alias'=>'Centro de Salud Rural Pitrufquén','type'=>12,'code_deis' =>121353,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Los Volcanes','alias'=>'Centro de Salud Familiar Los Volcanes','type'=>12,'code_deis' =>121354,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Rural Pucón','alias'=>'Centro de Salud Familiar Rural Pucón','type'=>12,'code_deis' =>121355,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Piedra','alias'=>'Posta de Salud Rural La Piedra','type'=>13,'code_deis' =>121416,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar de Cajón','alias'=>'Centro de Salud Familiar de Cajón','type'=>12,'code_deis' =>121456,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Roble Huacho','alias'=>'Posta de Salud Rural Roble Huacho','type'=>13,'code_deis' =>121458,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Laurel Huacho','alias'=>'Posta de Salud Rural Laurel Huacho','type'=>13,'code_deis' =>121459,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Collimallín','alias'=>'Posta de Salud Rural Collimallín','type'=>13,'code_deis' =>121460,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Truf Truf','alias'=>'Posta de Salud Rural Truf Truf','type'=>13,'code_deis' =>121461,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pedregoso (Cunco)','alias'=>'Posta de Salud Rural Pedregoso (Cunco)','type'=>13,'code_deis' =>121462,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Conoco','alias'=>'Posta de Salud Rural Conoco','type'=>13,'code_deis' =>121463,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Temo','alias'=>'Posta de Salud Rural El Temo','type'=>13,'code_deis' =>121464,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quillem','alias'=>'Posta de Salud Rural Quillem','type'=>13,'code_deis' =>121465,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pitraco','alias'=>'Posta de Salud Rural Pitraco','type'=>13,'code_deis' =>121467,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coihueco (Lautaro)','alias'=>'Posta de Salud Rural Coihueco (Lautaro)','type'=>13,'code_deis' =>121468,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Pillanlelbún','alias'=>'Centro Comunitario de Salud Familiar Pillanlelbún','type'=>16,'code_deis' =>121469,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Muco Chureo','alias'=>'Posta de Salud Rural Muco Chureo','type'=>13,'code_deis' =>121470,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Dollinco (Lautaro)','alias'=>'Posta de Salud Rural Dollinco (Lautaro)','type'=>13,'code_deis' =>121471,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Colonia Lautaro','alias'=>'Posta de Salud Rural Colonia Lautaro','type'=>13,'code_deis' =>121472,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pumalal','alias'=>'Posta de Salud Rural Pumalal','type'=>13,'code_deis' =>121473,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Blanco Lepín','alias'=>'Posta de Salud Rural Blanco Lepín','type'=>13,'code_deis' =>121474,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ñereco','alias'=>'Posta de Salud Rural Ñereco','type'=>13,'code_deis' =>121475,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Vega Redonda','alias'=>'Posta de Salud Rural Vega Redonda','type'=>13,'code_deis' =>121476,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cuel Ñielol','alias'=>'Posta de Salud Rural Cuel Ñielol','type'=>13,'code_deis' =>121477,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rapa - Mañiuco','alias'=>'Posta de Salud Rural Rapa - Mañiuco','type'=>13,'code_deis' =>121478,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nilpe','alias'=>'Posta de Salud Rural Nilpe','type'=>13,'code_deis' =>121479,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ailinco','alias'=>'Posta de Salud Rural Ailinco','type'=>13,'code_deis' =>121480,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Repocura','alias'=>'Posta de Salud Rural Repocura','type'=>13,'code_deis' =>121481,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Fortín Ñielol','alias'=>'Posta de Salud Rural Fortín Ñielol','type'=>13,'code_deis' =>121482,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Carolina','alias'=>'Posta de Salud Rural Santa Carolina','type'=>13,'code_deis' =>121483,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rucatraro','alias'=>'Posta de Salud Rural Rucatraro','type'=>13,'code_deis' =>121484,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Cherquenco','alias'=>'Centro Comunitario de Salud Familiar Cherquenco','type'=>16,'code_deis' =>121485,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Patricio','alias'=>'Posta de Salud Rural San Patricio','type'=>13,'code_deis' =>121486,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural General López','alias'=>'Posta de Salud Rural General López','type'=>13,'code_deis' =>121487,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Codinhue','alias'=>'Posta de Salud Rural Codinhue','type'=>13,'code_deis' =>121488,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quintrilpe','alias'=>'Posta de Salud Rural Quintrilpe','type'=>13,'code_deis' =>121489,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Polul Coicoma','alias'=>'Posta de Salud Rural Polul Coicoma','type'=>13,'code_deis' =>121490,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Hortensias','alias'=>'Posta de Salud Rural Las Hortensias','type'=>13,'code_deis' =>121491,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Villa García','alias'=>'Posta de Salud Rural Villa García','type'=>13,'code_deis' =>121492,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Leufuche','alias'=>'Posta de Salud Rural Leufuche','type'=>13,'code_deis' =>121493,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quecheregue','alias'=>'Posta de Salud Rural Quecheregue','type'=>13,'code_deis' =>121494,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Agua Tendida','alias'=>'Posta de Salud Rural Agua Tendida','type'=>13,'code_deis' =>121495,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huamaqui','alias'=>'Posta de Salud Rural Huamaqui','type'=>13,'code_deis' =>121496,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huentelar','alias'=>'Posta de Salud Rural Huentelar','type'=>13,'code_deis' =>121497,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mañío Ducañán','alias'=>'Posta de Salud Rural Mañío Ducañán','type'=>13,'code_deis' =>121498,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chivilcoyan','alias'=>'Posta de Salud Rural Chivilcoyan','type'=>13,'code_deis' =>121499,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Bochoco','alias'=>'Posta de Salud Rural Bochoco','type'=>13,'code_deis' =>121500,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Queupue','alias'=>'Posta de Salud Rural Queupue','type'=>13,'code_deis' =>121501,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alto Boroa','alias'=>'Posta de Salud Rural Alto Boroa','type'=>13,'code_deis' =>121502,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rulo','alias'=>'Posta de Salud Rural Rulo','type'=>13,'code_deis' =>121503,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huilío','alias'=>'Posta de Salud Rural Huilío','type'=>13,'code_deis' =>121504,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pto. Domínguez','alias'=>'Posta de Salud Rural Pto. Domínguez','type'=>13,'code_deis' =>121505,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tranapuente','alias'=>'Posta de Salud Rural Tranapuente','type'=>13,'code_deis' =>121506,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Cabaña','alias'=>'Posta de Salud Rural La Cabaña','type'=>13,'code_deis' =>121507,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alto Yupehue','alias'=>'Posta de Salud Rural Alto Yupehue','type'=>13,'code_deis' =>121508,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Celia','alias'=>'Posta de Salud Rural Santa Celia','type'=>13,'code_deis' =>121509,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puyangue','alias'=>'Posta de Salud Rural Puyangue','type'=>13,'code_deis' =>121510,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Placeres','alias'=>'Posta de Salud Rural Los Placeres','type'=>13,'code_deis' =>121511,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coi Coi','alias'=>'Posta de Salud Rural Coi Coi','type'=>13,'code_deis' =>121512,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Sierra','alias'=>'Posta de Salud Rural La Sierra','type'=>13,'code_deis' =>121513,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Manzano (Carahue)','alias'=>'Posta de Salud Rural El Manzano (Carahue)','type'=>13,'code_deis' =>121514,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Miramar','alias'=>'Posta de Salud Rural Miramar','type'=>13,'code_deis' =>121515,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Catripulli ( Carahue)','alias'=>'Posta de Salud Rural Catripulli ( Carahue)','type'=>13,'code_deis' =>121516,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Matte y Sánchez','alias'=>'Posta de Salud Rural Matte y Sánchez','type'=>13,'code_deis' =>121517,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Hueñalihuén','alias'=>'Posta de Salud Rural Hueñalihuén','type'=>13,'code_deis' =>121518,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Loncoyamo','alias'=>'Posta de Salud Rural Loncoyamo','type'=>13,'code_deis' =>121519,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nehuentué','alias'=>'Posta de Salud Rural Nehuentué','type'=>13,'code_deis' =>121520,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puaucho(Saavedra)','alias'=>'Posta de Salud Rural Puaucho(Saavedra)','type'=>13,'code_deis' =>121521,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quifo','alias'=>'Posta de Salud Rural Quifo','type'=>13,'code_deis' =>121522,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ranco','alias'=>'Posta de Salud Rural Ranco','type'=>13,'code_deis' =>121523,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Perquiñán','alias'=>'Posta de Salud Rural Perquiñán','type'=>13,'code_deis' =>121524,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Romopulli','alias'=>'Posta de Salud Rural Romopulli','type'=>13,'code_deis' =>121525,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Piedra Alta','alias'=>'Posta de Salud Rural Piedra Alta','type'=>13,'code_deis' =>121526,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Deume','alias'=>'Posta de Salud Rural Deume','type'=>13,'code_deis' =>121527,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huapi','alias'=>'Posta de Salud Rural Huapi','type'=>13,'code_deis' =>121528,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cheucán','alias'=>'Posta de Salud Rural Cheucán','type'=>13,'code_deis' =>121529,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Calof','alias'=>'Posta de Salud Rural Calof','type'=>13,'code_deis' =>121530,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Comuy','alias'=>'Posta de Salud Rural Comuy','type'=>13,'code_deis' =>121531,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Galpones','alias'=>'Posta de Salud Rural Los Galpones','type'=>13,'code_deis' =>121532,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Millahuín','alias'=>'Posta de Salud Rural Millahuín','type'=>13,'code_deis' =>121533,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puraquina','alias'=>'Posta de Salud Rural Puraquina','type'=>13,'code_deis' =>121534,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mahuidanche','alias'=>'Posta de Salud Rural Mahuidanche','type'=>13,'code_deis' =>121535,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Queule','alias'=>'Posta de Salud Rural Queule','type'=>13,'code_deis' =>121536,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Villa Boldos','alias'=>'Posta de Salud Rural Villa Boldos','type'=>13,'code_deis' =>121537,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Quemas (Toltén)','alias'=>'Posta de Salud Rural Las Quemas (Toltén)','type'=>13,'code_deis' =>121538,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Porma','alias'=>'Posta de Salud Rural Porma','type'=>13,'code_deis' =>121539,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pocoyan','alias'=>'Posta de Salud Rural Pocoyan','type'=>13,'code_deis' =>121540,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Boroa Sur','alias'=>'Posta de Salud Rural Boroa Sur','type'=>13,'code_deis' =>121541,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Rural Lastarria','alias'=>'Centro de Salud Rural Lastarria','type'=>12,'code_deis' =>121542,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quitratúe','alias'=>'Posta de Salud Rural Quitratúe','type'=>13,'code_deis' =>121543,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pidenco','alias'=>'Posta de Salud Rural Pidenco','type'=>13,'code_deis' =>121544,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huellanto Alto','alias'=>'Posta de Salud Rural Huellanto Alto','type'=>13,'code_deis' =>121545,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Licancullín','alias'=>'Posta de Salud Rural Licancullín','type'=>13,'code_deis' =>121546,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio de Huiscapi','alias'=>'Consultorio de Huiscapi','type'=>12,'code_deis' =>121547,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Paz','alias'=>'Posta de Salud Rural La Paz','type'=>13,'code_deis' =>121548,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pulmahue','alias'=>'Posta de Salud Rural Pulmahue','type'=>13,'code_deis' =>121549,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Copihuelpe','alias'=>'Posta de Salud Rural Copihuelpe','type'=>13,'code_deis' =>121550,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Molco ( Loncoche )','alias'=>'Posta de Salud Rural Molco ( Loncoche )','type'=>13,'code_deis' =>121551,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Liumalla','alias'=>'Posta de Salud Rural Liumalla','type'=>13,'code_deis' =>121555,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Manhue','alias'=>'Posta de Salud Rural Manhue','type'=>13,'code_deis' =>121556,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Caburga','alias'=>'Posta de Salud Rural Caburga','type'=>13,'code_deis' =>121558,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Paillaco','alias'=>'Posta de Salud Rural Paillaco','type'=>13,'code_deis' =>121559,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quelhue','alias'=>'Posta de Salud Rural Quelhue','type'=>13,'code_deis' =>121560,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pangueco (Galvarino)','alias'=>'Posta de Salud Rural Pangueco (Galvarino)','type'=>13,'code_deis' =>121561,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Radal','alias'=>'Posta de Salud Rural Radal','type'=>13,'code_deis' =>121562,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Allipén','alias'=>'Posta de Salud Rural Allipén','type'=>13,'code_deis' =>121563,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quetroco','alias'=>'Posta de Salud Rural Quetroco','type'=>13,'code_deis' =>121564,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coipué (Freire)','alias'=>'Posta de Salud Rural Coipué (Freire)','type'=>13,'code_deis' =>121565,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lliuco(Freire)','alias'=>'Posta de Salud Rural Lliuco(Freire)','type'=>13,'code_deis' =>121566,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Ramón','alias'=>'Posta de Salud Rural San Ramón','type'=>13,'code_deis' =>121567,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Guiñimo','alias'=>'Posta de Salud Rural Guiñimo','type'=>13,'code_deis' =>121568,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa María Llaima','alias'=>'Posta de Salud Rural Santa María Llaima','type'=>13,'code_deis' =>121570,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alto Carén','alias'=>'Posta de Salud Rural Alto Carén','type'=>13,'code_deis' =>121571,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cumcumllaque','alias'=>'Posta de Salud Rural Cumcumllaque','type'=>13,'code_deis' =>121572,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Pedro de Pucón','alias'=>'Posta de Salud Rural San Pedro de Pucón','type'=>13,'code_deis' =>121573,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Barros Arana','alias'=>'Centro Comunitario de Salud Familiar Barros Arana','type'=>16,'code_deis' =>121575,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pichichelle','alias'=>'Posta de Salud Rural Pichichelle','type'=>13,'code_deis' =>121576,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Yenehue','alias'=>'Posta de Salud Rural Yenehue','type'=>13,'code_deis' =>121577,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Número Tres','alias'=>'Posta de Salud Rural Número Tres','type'=>13,'code_deis' =>121578,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nohualhue','alias'=>'Posta de Salud Rural Nohualhue','type'=>13,'code_deis' =>121579,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Malalche','alias'=>'Posta de Salud Rural Malalche','type'=>13,'code_deis' =>121580,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Catripulli ( Curarrehue )','alias'=>'Posta de Salud Rural Catripulli ( Curarrehue )','type'=>13,'code_deis' =>121581,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Maite','alias'=>'Posta de Salud Rural Maite','type'=>13,'code_deis' =>121582,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Reigolil','alias'=>'Posta de Salud Rural Reigolil','type'=>13,'code_deis' =>121583,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Faja Ricci','alias'=>'Posta de Salud Rural Faja Ricci','type'=>13,'code_deis' =>121584,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Liuco (Gorbea)','alias'=>'Posta de Salud Rural Liuco (Gorbea)','type'=>13,'code_deis' =>121585,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quiñenahuín','alias'=>'Posta de Salud Rural Quiñenahuín','type'=>13,'code_deis' =>121586,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Epeukura','alias'=>'Posta de Salud Rural Epeukura','type'=>13,'code_deis' =>121587,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Molco (Nueva Imperial )','alias'=>'Posta de Salud Rural Molco (Nueva Imperial )','type'=>13,'code_deis' =>121588,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chucauco','alias'=>'Posta de Salud Rural Chucauco','type'=>13,'code_deis' =>121589,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Escudo','alias'=>'Posta de Salud Rural El Escudo','type'=>13,'code_deis' =>121590,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Vega Larga','alias'=>'Posta de Salud Rural Vega Larga','type'=>13,'code_deis' =>121591,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Codopille','alias'=>'Posta de Salud Rural Codopille','type'=>13,'code_deis' =>121592,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Metrenco','alias'=>'Posta de Salud Rural Metrenco','type'=>13,'code_deis' =>121593,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Rosa','alias'=>'Posta de Salud Rural Santa Rosa','type'=>13,'code_deis' =>121594,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Esperanza','alias'=>'Posta de Salud Rural La Esperanza','type'=>13,'code_deis' =>121596,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puralaco','alias'=>'Posta de Salud Rural Puralaco','type'=>13,'code_deis' =>121597,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Caren','alias'=>'Posta de Salud Rural Caren','type'=>13,'code_deis' =>121598,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Añilco','alias'=>'Posta de Salud Rural Añilco','type'=>13,'code_deis' =>121599,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Amanecer','alias'=>'COSAM Amanecer','type'=>14,'code_deis' =>121600,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'CECOSAM Temuco','alias'=>'CECOSAM Temuco','type'=>15,'code_deis' =>121601,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Padre Las Casas','alias'=>'COSAM Padre Las Casas','type'=>14,'code_deis' =>121602,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Metodista (D)','alias'=>'Centro de Salud Familiar Metodista (D)','type'=>12,'code_deis' =>121657,'service' =>32,'dependency' =>4]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa el Salar','alias'=>'Centro Comunitario de Salud Familiar Villa el Salar','type'=>16,'code_deis' =>121780,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar 21 de Mayo','alias'=>'Centro Comunitario de Salud Familiar 21 de Mayo','type'=>16,'code_deis' =>121781,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Arquenco','alias'=>'Centro Comunitario de Salud Familiar Arquenco','type'=>16,'code_deis' =>121782,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Volcanes','alias'=>'Centro Comunitario de Salud Familiar Los Volcanes','type'=>16,'code_deis' =>121783,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Carmen','alias'=>'Centro Comunitario de Salud Familiar El Carmen','type'=>16,'code_deis' =>121784,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar San Antonio','alias'=>'Centro Comunitario de Salud Familiar San Antonio','type'=>16,'code_deis' =>121785,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Ultraestación','alias'=>'Centro Comunitario de Salud Familiar Ultraestación','type'=>16,'code_deis' =>121786,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Guacolda','alias'=>'Centro Comunitario de Salud Familiar Guacolda','type'=>16,'code_deis' =>121787,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Las Quilas','alias'=>'Centro Comunitario de Salud Familiar Las Quilas','type'=>16,'code_deis' =>121788,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Dr. Maximino Beltran Mora','alias'=>'Centro Comunitario de Salud Familiar Dr. Maximino Beltran Mora','type'=>16,'code_deis' =>121789,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAR Miraflores','alias'=>'SAR Miraflores','type'=>20,'code_deis' =>121803,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'SAPU Santa Rosa','alias'=>'SAPU Santa Rosa','type'=>20,'code_deis' =>121806,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Padre Las Casas','alias'=>'SAPU Padre Las Casas','type'=>20,'code_deis' =>121808,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Valdivia)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Valdivia)','type'=>1,'code_deis' =>122010,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S. Valdivia)','alias'=>'PRAIS (S.S. Valdivia)','type'=>2,'code_deis' =>122011,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil A Rural Triple. Pat. BKYS94 (Valdivia)','alias'=>'Clínica Dental Móvil A Rural Triple. Pat. BKYS94 (Valdivia)','type'=>3,'code_deis' =>122012,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil B Urbana Triple. Pat. BKYS92 (Valdivia)','alias'=>'Clínica Dental Móvil B Urbana Triple. Pat. BKYS92 (Valdivia)','type'=>3,'code_deis' =>122013,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Clínico Regional (Valdivia)','alias'=>'Hospital Clínico Regional (Valdivia)','type'=>5,'code_deis' =>122100,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Corral','alias'=>'Hospital de Corral','type'=>22,'code_deis' =>122101,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Los Lagos','alias'=>'Hospital de Los Lagos','type'=>22,'code_deis' =>122102,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Lanco','alias'=>'Hospital de Lanco','type'=>22,'code_deis' =>122103,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Juan Morey (La Unión)','alias'=>'Hospital Juan Morey (La Unión)','type'=>22,'code_deis' =>122104,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Río Bueno','alias'=>'Hospital de Río Bueno','type'=>22,'code_deis' =>122105,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Paillaco','alias'=>'Hospital de Paillaco','type'=>22,'code_deis' =>122106,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Mariquina','alias'=>'Hospital de Mariquina','type'=>22,'code_deis' =>122200,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Padre Bernabé de Lucerna (Panguipulli) (D)','alias'=>'Hospital Padre Bernabé de Lucerna (Panguipulli) (D)','type'=>22,'code_deis' =>122201,'service' =>34,'dependency' =>4]);
Organization::Create(['name' => 'Clínica Alemana Valdivia','alias'=>'Clínica Alemana Valdivia','type'=>6,'code_deis' =>122202,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Mutual de Seguridad CChC Valdivia','alias'=>'Clínica Mutual de Seguridad CChC Valdivia','type'=>6,'code_deis' =>122203,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro CONIN Valdivia','alias'=>'Centro CONIN Valdivia','type'=>26,'code_deis' =>122204,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Megasalud S.A Centro Médico y Dental Valdivia','alias'=>'Megasalud S.A Centro Médico y Dental Valdivia','type'=>17,'code_deis' =>122213,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Clínica del Trabajador AChS','alias'=>'Clínica del Trabajador AChS','type'=>6,'code_deis' =>122215,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Carabineros Valdivia','alias'=>'Policlínico Carabineros Valdivia','type'=>8,'code_deis' =>122216,'service' =>35,'dependency' =>5]);
Organization::Create(['name' => 'Centro Clínico Militar Valdivia','alias'=>'Centro Clínico Militar Valdivia','type'=>8,'code_deis' =>122217,'service' =>35,'dependency' =>5]);
Organization::Create(['name' => 'Centro de Salud Universidad Austral de Chile','alias'=>'Centro de Salud Universidad Austral de Chile','type'=>8,'code_deis' =>122218,'service' =>35,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Salud Masisa','alias'=>'Centro de Salud Masisa','type'=>8,'code_deis' =>122219,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Astilleros y Servicios Navales ASENAV','alias'=>'Policlínico Astilleros y Servicios Navales ASENAV','type'=>8,'code_deis' =>122220,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro Penitenciario Valdivia','alias'=>'Centro Penitenciario Valdivia','type'=>8,'code_deis' =>122221,'service' =>35,'dependency' =>4]);
Organization::Create(['name' => 'Policlínico Infodema','alias'=>'Policlínico Infodema','type'=>8,'code_deis' =>122222,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC La Unión','alias'=>'Centro de Salud Mutual CChC La Unión','type'=>8,'code_deis' =>122223,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud AChS Río Bueno','alias'=>'Centro de Salud AChS Río Bueno','type'=>8,'code_deis' =>122224,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Clínica del Trabajador AChS de Valdivia','alias'=>'Clínica del Trabajador AChS de Valdivia','type'=>6,'code_deis' =>122226,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Beaucheff','alias'=>'Centro Médico Beaucheff','type'=>8,'code_deis' =>122227,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Surmedica','alias'=>'Centro Médico Surmedica','type'=>8,'code_deis' =>122228,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'CMA Costanera','alias'=>'CMA Costanera','type'=>8,'code_deis' =>122229,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Costanera','alias'=>'Centro Odontológico Costanera','type'=>9,'code_deis' =>122230,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de Atención Primaria Gendarmería de Chile','alias'=>'Policlínico de Atención Primaria Gendarmería de Chile','type'=>8,'code_deis' =>122231,'service' =>35,'dependency' =>4]);
Organization::Create(['name' => 'Policlínico Regional de Gendarmería','alias'=>'Policlínico Regional de Gendarmería','type'=>8,'code_deis' =>122232,'service' =>35,'dependency' =>4]);
Organization::Create(['name' => 'Laboratorio Clínico Centro Médico Valdivia','alias'=>'Laboratorio Clínico Centro Médico Valdivia','type'=>10,'code_deis' =>122233,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Valdivia','alias'=>'Laboratorio Clínico Valdivia','type'=>10,'code_deis' =>122234,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Sociedad Cruz y Guiresse Ltda.','alias'=>'Laboratorio Clínico Sociedad Cruz y Guiresse Ltda.','type'=>10,'code_deis' =>122235,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio de la Clínica Alemana de Valdivia','alias'=>'Laboratorio de la Clínica Alemana de Valdivia','type'=>10,'code_deis' =>122236,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico e Inversiones Médicas y Diagnósticas Ltda.','alias'=>'Laboratorio Clínico e Inversiones Médicas y Diagnósticas Ltda.','type'=>10,'code_deis' =>122237,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Sociedad Laboratorio Especialidades Médicas Ltda.','alias'=>'Sociedad Laboratorio Especialidades Médicas Ltda.','type'=>8,'code_deis' =>122238,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Sociedad Laboratorio Clínico Unión Ltda.','alias'=>'Sociedad Laboratorio Clínico Unión Ltda.','type'=>8,'code_deis' =>122239,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Austral Ltda.','alias'=>'Laboratorio Austral Ltda.','type'=>10,'code_deis' =>122240,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Sociedad Andrade Salas y Cía. Ltda.','alias'=>'Laboratorio Sociedad Andrade Salas y Cía. Ltda.','type'=>10,'code_deis' =>122241,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Frilab','alias'=>'Laboratorio Frilab','type'=>10,'code_deis' =>122242,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Suranálilsis Ltda.','alias'=>'Laboratorio Clínico Suranálilsis Ltda.','type'=>10,'code_deis' =>122243,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico y Especialidades Ltda','alias'=>'Laboratorio Clínico y Especialidades Ltda','type'=>10,'code_deis' =>122244,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio de Nefrología e Histocompatibilidad Universidad Austral de Chile','alias'=>'Laboratorio de Nefrología e Histocompatibilidad Universidad Austral de Chile','type'=>10,'code_deis' =>122245,'service' =>35,'dependency' =>4]);
Organization::Create(['name' => 'Laboratorio Clínico Laboclin','alias'=>'Laboratorio Clínico Laboclin','type'=>10,'code_deis' =>122246,'service' =>35,'dependency' =>4]);
Organization::Create(['name' => 'Laboratorio de Histología y Citopatología Valdivia Ltda.','alias'=>'Laboratorio de Histología y Citopatología Valdivia Ltda.','type'=>10,'code_deis' =>122247,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Valdivia','alias'=>'Laboratorio Clínico Bionet S.A. - Valdivia','type'=>10,'code_deis' =>122248,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Beneficiencia Osorno','alias'=>'Laboratorio Beneficiencia Osorno','type'=>10,'code_deis' =>122249,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Externo Valdivia','alias'=>'Centro de Salud Familiar Externo Valdivia','type'=>12,'code_deis' =>122300,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Las Ánimas','alias'=>'Centro de Salud Familiar Las Ánimas','type'=>12,'code_deis' =>122301,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Jorge Sabat Gozalo (Ex Gil de Castro)','alias'=>'Centro de Salud Familiar Dr. Jorge Sabat Gozalo (Ex Gil de Castro)','type'=>12,'code_deis' =>122302,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San José de la Mariquina','alias'=>'Centro de Salud Familiar San José de la Mariquina','type'=>12,'code_deis' =>122303,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Panguipulli','alias'=>'Centro de Salud Familiar Panguipulli','type'=>12,'code_deis' =>122304,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Belarmina Paredes','alias'=>'Centro de Salud Familiar Belarmina Paredes','type'=>12,'code_deis' =>122305,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Juan Santa María Bonet','alias'=>'Centro de Salud Familiar Juan Santa María Bonet','type'=>12,'code_deis' =>122306,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Máfil','alias'=>'Centro de Salud Familiar Máfil','type'=>12,'code_deis' =>122307,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Coñaripe','alias'=>'Centro de Salud Familiar Coñaripe','type'=>12,'code_deis' =>122308,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Choshuenco','alias'=>'Centro de Salud Familiar Choshuenco','type'=>12,'code_deis' =>122309,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Alfredo Gantz Mann','alias'=>'Centro de Salud Familiar Dr. Alfredo Gantz Mann','type'=>12,'code_deis' =>122310,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Malalhue','alias'=>'Centro de Salud Familiar Malalhue','type'=>12,'code_deis' =>122311,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Río Bueno','alias'=>'Centro de Salud Familiar Río Bueno','type'=>12,'code_deis' =>122312,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Niebla','alias'=>'Centro de Salud Familiar Niebla','type'=>12,'code_deis' =>122313,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Angachilla','alias'=>'Centro de Salud Familiar Angachilla','type'=>12,'code_deis' =>122314,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Lautaro Caro Ríos','alias'=>'Centro de Salud Familiar Lautaro Caro Ríos','type'=>12,'code_deis' =>122315,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Los Lagos','alias'=>'Centro de Salud Familiar Los Lagos','type'=>12,'code_deis' =>122316,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Punucapa','alias'=>'Posta de Salud Rural Punucapa','type'=>13,'code_deis' =>122400,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huellelhue','alias'=>'Posta de Salud Rural Huellelhue','type'=>13,'code_deis' =>122401,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Curiñanco','alias'=>'Posta de Salud Rural Curiñanco','type'=>13,'code_deis' =>122402,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Isla del Rey','alias'=>'Posta de Salud Rural Isla del Rey','type'=>13,'code_deis' =>122404,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chaihuín','alias'=>'Posta de Salud Rural Chaihuín','type'=>13,'code_deis' =>122405,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Salto','alias'=>'Posta de Salud Rural El Salto','type'=>13,'code_deis' =>122406,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Huellas','alias'=>'Posta de Salud Rural Las Huellas','type'=>13,'code_deis' =>122407,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Antilhue','alias'=>'Posta de Salud Rural Antilhue','type'=>13,'code_deis' =>122408,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Riñihue','alias'=>'Posta de Salud Rural Riñihue','type'=>13,'code_deis' =>122409,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Malihue','alias'=>'Posta de Salud Rural Malihue','type'=>13,'code_deis' =>122411,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Melefquén','alias'=>'Posta de Salud Rural Melefquén','type'=>13,'code_deis' =>122413,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chan Chan','alias'=>'Posta de Salud Rural Chan Chan','type'=>13,'code_deis' =>122414,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mississippi','alias'=>'Posta de Salud Rural Mississippi','type'=>13,'code_deis' =>122416,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pelchuquín','alias'=>'Posta de Salud Rural Pelchuquín','type'=>13,'code_deis' =>122417,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ciruelos','alias'=>'Posta de Salud Rural Ciruelos','type'=>13,'code_deis' =>122418,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alepué','alias'=>'Posta de Salud Rural Alepué','type'=>13,'code_deis' =>122419,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Iñipulli','alias'=>'Posta de Salud Rural Iñipulli','type'=>13,'code_deis' =>122420,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huitag','alias'=>'Posta de Salud Rural Huitag','type'=>13,'code_deis' =>122421,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Neltume','alias'=>'Posta de Salud Rural Neltume','type'=>13,'code_deis' =>122422,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Liquiñe','alias'=>'Centro Comunitario de Salud Familiar Liquiñe','type'=>16,'code_deis' =>122425,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pirihueico','alias'=>'Posta de Salud Rural Pirihueico','type'=>13,'code_deis' =>122426,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cayumapu','alias'=>'Posta de Salud Rural Cayumapu','type'=>13,'code_deis' =>122427,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Catamutún','alias'=>'Posta de Salud Rural Catamutún','type'=>13,'code_deis' =>122428,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puerto Nuevo','alias'=>'Posta de Salud Rural Puerto Nuevo','type'=>13,'code_deis' =>122429,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Choroico (La Unión)','alias'=>'Posta de Salud Rural Choroico (La Unión)','type'=>13,'code_deis' =>122430,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pilpilcahuín','alias'=>'Posta de Salud Rural Pilpilcahuín','type'=>13,'code_deis' =>122431,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Traiguén ( La Unión)','alias'=>'Posta de Salud Rural Traiguén ( La Unión)','type'=>13,'code_deis' =>122432,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Llancacura','alias'=>'Posta de Salud Rural Llancacura','type'=>13,'code_deis' =>122433,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Crucero (Río Bueno)','alias'=>'Posta de Salud Rural Crucero (Río Bueno)','type'=>13,'code_deis' =>122434,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Vivanco','alias'=>'Posta de Salud Rural Vivanco','type'=>13,'code_deis' =>122435,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Carimallín','alias'=>'Posta de Salud Rural Carimallín','type'=>13,'code_deis' =>122436,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Trapi','alias'=>'Posta de Salud Rural Trapi','type'=>13,'code_deis' =>122437,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cayurruca','alias'=>'Posta de Salud Rural Cayurruca','type'=>13,'code_deis' =>122438,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Futahuente','alias'=>'Posta de Salud Rural Futahuente','type'=>13,'code_deis' =>122439,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Reumén','alias'=>'Posta de Salud Rural Reumén','type'=>13,'code_deis' =>122440,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pichirropulli','alias'=>'Posta de Salud Rural Pichirropulli','type'=>13,'code_deis' =>122441,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Aguas Negras','alias'=>'Posta de Salud Rural Aguas Negras','type'=>13,'code_deis' =>122442,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Arquilhue','alias'=>'Posta de Salud Rural Arquilhue','type'=>13,'code_deis' =>122443,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Loncopán','alias'=>'Posta de Salud Rural Loncopán','type'=>13,'code_deis' =>122444,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Maihue','alias'=>'Posta de Salud Rural Maihue','type'=>13,'code_deis' =>122445,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huapi','alias'=>'Posta de Salud Rural Huapi','type'=>13,'code_deis' =>122446,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Llifén','alias'=>'Posta de Salud Rural Llifén','type'=>13,'code_deis' =>122447,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pitriuco','alias'=>'Posta de Salud Rural Pitriuco','type'=>13,'code_deis' =>122448,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Illahuape','alias'=>'Posta de Salud Rural Illahuape','type'=>13,'code_deis' =>122449,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Riñinahue','alias'=>'Centro Comunitario de Salud Familiar Riñinahue','type'=>16,'code_deis' =>122450,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Morrompulli','alias'=>'Posta de Salud Rural Morrompulli','type'=>13,'code_deis' =>122451,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Bocatoma','alias'=>'Posta de Salud Rural Bocatoma','type'=>13,'code_deis' =>122452,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Elisa','alias'=>'Posta de Salud Rural Santa Elisa','type'=>13,'code_deis' =>122453,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mashue','alias'=>'Posta de Salud Rural Mashue','type'=>13,'code_deis' =>122454,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mantilhue','alias'=>'Posta de Salud Rural Mantilhue','type'=>13,'code_deis' =>122455,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Rosa (Paillaco)','alias'=>'Posta de Salud Rural Santa Rosa (Paillaco)','type'=>13,'code_deis' =>122456,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Filomena (Paillaco)','alias'=>'Posta de Salud Rural Santa Filomena (Paillaco)','type'=>13,'code_deis' =>122457,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Calcurrupe','alias'=>'Posta de Salud Rural Calcurrupe','type'=>13,'code_deis' =>122458,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huichaco','alias'=>'Posta de Salud Rural Huichaco','type'=>13,'code_deis' =>122459,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pocura','alias'=>'Posta de Salud Rural Pocura','type'=>13,'code_deis' =>122460,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rupumeica','alias'=>'Posta de Salud Rural Rupumeica','type'=>13,'code_deis' =>122461,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Esteros','alias'=>'Posta de Salud Rural Los Esteros','type'=>13,'code_deis' =>122462,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Nontuela (Enrique Strange)','alias'=>'Centro Comunitario de Salud Familiar Nontuela (Enrique Strange)','type'=>16,'code_deis' =>122463,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lago Neltume','alias'=>'Posta de Salud Rural Lago Neltume','type'=>13,'code_deis' =>122464,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pellinada','alias'=>'Posta de Salud Rural Pellinada','type'=>13,'code_deis' =>122465,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Comunitario Las Ánimas','alias'=>'COSAM Comunitario Las Ánimas','type'=>14,'code_deis' =>122601,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Angachilla','alias'=>'COSAM Angachilla','type'=>14,'code_deis' =>122602,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Barrios Bajos','alias'=>'Centro Comunitario de Salud Familiar Barrios Bajos','type'=>16,'code_deis' =>122700,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Consultorio Las Ánimas','alias'=>'Centro Comunitario de Salud Familiar Consultorio Las Ánimas','type'=>16,'code_deis' =>122701,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Gil de Castro','alias'=>'Centro Comunitario de Salud Familiar Gil de Castro','type'=>16,'code_deis' =>122702,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Mehuín','alias'=>'Centro Comunitario de Salud Familiar Mehuín','type'=>16,'code_deis' =>122703,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Neltume','alias'=>'Centro Comunitario de Salud Familiar Neltume','type'=>16,'code_deis' =>122709,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Lagos','alias'=>'Centro Comunitario de Salud Familiar Los Lagos','type'=>16,'code_deis' =>122710,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Cons. Angachilla','alias'=>'Centro Comunitario de Salud Familiar Cons. Angachilla','type'=>16,'code_deis' =>122714,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Manuel Miranda','alias'=>'Centro Comunitario de Salud Familiar Manuel Miranda','type'=>16,'code_deis' =>122716,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Pablo Neruda','alias'=>'Centro Comunitario de Salud Familiar Pablo Neruda','type'=>16,'code_deis' =>122720,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Dr. Silva de La Paz (San Francisco)','alias'=>'Centro Comunitario de Salud Familiar Dr. Silva de La Paz (San Francisco)','type'=>16,'code_deis' =>122723,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Las Ánimas','alias'=>'SAPU Las Ánimas','type'=>20,'code_deis' =>122801,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Gil de Castro','alias'=>'SAPU Gil de Castro','type'=>20,'code_deis' =>122802,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SAR La Unión','alias'=>'SAR La Unión','type'=>20,'code_deis' =>122810,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Río Bueno','alias'=>'SAPU Río Bueno','type'=>20,'code_deis' =>122812,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Angachilla','alias'=>'SAPU Angachilla','type'=>20,'code_deis' =>122814,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Osorno)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Osorno)','type'=>1,'code_deis' =>123010,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Osorno)','alias'=>'PRAIS (S.S Osorno)','type'=>2,'code_deis' =>123011,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. BKYZ91 (Osorno)','alias'=>'Clínica Dental Móvil Triple. Pat. BKYZ91 (Osorno)','type'=>3,'code_deis' =>123012,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Departamento de Atención Integral Funcionarios','alias'=>'Departamento de Atención Integral Funcionarios','type'=>15,'code_deis' =>123030,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Base San José de Osorno','alias'=>'Hospital Base San José de Osorno','type'=>5,'code_deis' =>123100,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Purranque Dr. Juan Hepp Dubiau','alias'=>'Hospital de Purranque Dr. Juan Hepp Dubiau','type'=>23,'code_deis' =>123101,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Río Negro','alias'=>'Hospital de Río Negro','type'=>22,'code_deis' =>123102,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Puerto Octay','alias'=>'Hospital de Puerto Octay','type'=>22,'code_deis' =>123103,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Futa Sruka Lawenche Kunko Mapu Mo','alias'=>'Hospital Futa Sruka Lawenche Kunko Mapu Mo','type'=>22,'code_deis' =>123104,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Pu Mulen Quilacahuín','alias'=>'Hospital Pu Mulen Quilacahuín','type'=>22,'code_deis' =>123105,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Alemana de Osorno','alias'=>'Clínica Alemana de Osorno','type'=>6,'code_deis' =>123203,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Osorno','alias'=>'Centro de Salud Mutual CChC Osorno','type'=>8,'code_deis' =>123205,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Megasalud S.A. Centro Médico y Dental Osorno','alias'=>'Megasalud S.A. Centro Médico y Dental Osorno','type'=>17,'code_deis' =>123206,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Rehabilitación de Minusválidos','alias'=>'Centro de Rehabilitación de Minusválidos','type'=>15,'code_deis' =>123207,'service' =>36,'dependency' =>4]);
Organization::Create(['name' => 'Clínica de la AChS Osorno','alias'=>'Clínica de la AChS Osorno','type'=>6,'code_deis' =>123209,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Sociedad Centro Médico Cochrane SA','alias'=>'Vacunatorio Sociedad Centro Médico Cochrane SA','type'=>18,'code_deis' =>123212,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Oftalmológica Survisión','alias'=>'Clínica Oftalmológica Survisión','type'=>8,'code_deis' =>123213,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Osorno','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Osorno','type'=>8,'code_deis' =>123214,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Dial Sur','alias'=>'Centro de Diálisis Dial Sur','type'=>19,'code_deis' =>123215,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Laboratorio Cochrane','alias'=>'Centro Médico y Laboratorio Cochrane','type'=>8,'code_deis' =>123216,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Luis Pasteur','alias'=>'Laboratorio Luis Pasteur','type'=>10,'code_deis' =>123217,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio CENDIMET','alias'=>'Laboratorio CENDIMET','type'=>10,'code_deis' =>123218,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Pedro Jáuregui','alias'=>'Centro de Salud Familiar Dr. Pedro Jáuregui','type'=>12,'code_deis' =>123300,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Marcelo Lopetegui Adams','alias'=>'Centro de Salud Familiar Dr. Marcelo Lopetegui Adams','type'=>12,'code_deis' =>123301,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Ovejería','alias'=>'Centro de Salud Familiar Ovejería','type'=>12,'code_deis' =>123302,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Rahue Alto','alias'=>'Centro de Salud Familiar Rahue Alto','type'=>12,'code_deis' =>123303,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Entre Lagos','alias'=>'Centro de Salud Familiar Entre Lagos','type'=>12,'code_deis' =>123304,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Pablo','alias'=>'Centro de Salud Familiar San Pablo','type'=>12,'code_deis' =>123305,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Pampa Alegre','alias'=>'Centro de Salud Familiar Pampa Alegre','type'=>12,'code_deis' =>123306,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Purranque','alias'=>'Centro de Salud Familiar Purranque','type'=>12,'code_deis' =>123307,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Practicante Pablo Araya (Ex Río Negro)','alias'=>'Centro de Salud Familiar Practicante Pablo Araya (Ex Río Negro)','type'=>12,'code_deis' =>123309,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quinto Centenario','alias'=>'Centro de Salud Familiar Quinto Centenario','type'=>12,'code_deis' =>123310,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Bahía Mansa','alias'=>'Centro de Salud Familiar Bahía Mansa','type'=>12,'code_deis' =>123311,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Puaucho','alias'=>'Centro de Salud Familiar Puaucho','type'=>12,'code_deis' =>123312,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cuinco','alias'=>'Posta de Salud Rural Cuinco','type'=>13,'code_deis' =>123402,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pichi Damas','alias'=>'Posta de Salud Rural Pichi Damas','type'=>13,'code_deis' =>123404,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puyehue','alias'=>'Posta de Salud Rural Puyehue','type'=>13,'code_deis' =>123406,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Desagüe Rupanco','alias'=>'Posta de Salud Rural Desagüe Rupanco','type'=>13,'code_deis' =>123407,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ñadi Pichi-Damas','alias'=>'Posta de Salud Rural Ñadi Pichi-Damas','type'=>13,'code_deis' =>123408,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tres Esteros','alias'=>'Posta de Salud Rural Tres Esteros','type'=>13,'code_deis' =>123410,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Corte Alto','alias'=>'Centro Comunitario de Salud Familiar Corte Alto','type'=>16,'code_deis' =>123411,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Crucero ( Purranque)','alias'=>'Posta de Salud Rural Crucero ( Purranque)','type'=>13,'code_deis' =>123412,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coligual','alias'=>'Posta de Salud Rural Coligual','type'=>13,'code_deis' =>123413,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Hueyusca','alias'=>'Posta de Salud Rural Hueyusca','type'=>13,'code_deis' =>123414,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Concordia','alias'=>'Posta de Salud Rural Concordia','type'=>13,'code_deis' =>123415,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Colonia Ponce','alias'=>'Posta de Salud Rural Colonia Ponce','type'=>13,'code_deis' =>123416,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Naranja','alias'=>'Posta de Salud Rural La Naranja','type'=>13,'code_deis' =>123417,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Pedro de Purranque','alias'=>'Posta de Salud Rural San Pedro de Purranque','type'=>13,'code_deis' =>123419,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Collihuinco','alias'=>'Posta de Salud Rural Collihuinco','type'=>13,'code_deis' =>123420,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rupanco','alias'=>'Posta de Salud Rural Rupanco','type'=>13,'code_deis' =>123422,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cascadas','alias'=>'Posta de Salud Rural Cascadas','type'=>13,'code_deis' =>123423,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Piedras Negras','alias'=>'Posta de Salud Rural Piedras Negras','type'=>13,'code_deis' =>123424,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cancura','alias'=>'Posta de Salud Rural Cancura','type'=>13,'code_deis' =>123425,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pellinada','alias'=>'Posta de Salud Rural Pellinada','type'=>13,'code_deis' =>123426,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Calo','alias'=>'Posta de Salud Rural La Calo','type'=>13,'code_deis' =>123427,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coihueco (Puerto Octay)','alias'=>'Posta de Salud Rural Coihueco (Puerto Octay)','type'=>13,'code_deis' =>123428,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Purrehuín','alias'=>'Posta de Salud Rural Purrehuín','type'=>13,'code_deis' =>123430,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Aleucapi','alias'=>'Posta de Salud Rural Aleucapi','type'=>13,'code_deis' =>123431,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Poza','alias'=>'Posta de Salud Rural La Poza','type'=>13,'code_deis' =>123432,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huilma','alias'=>'Posta de Salud Rural Huilma','type'=>13,'code_deis' =>123434,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pucopio','alias'=>'Posta de Salud Rural Pucopio','type'=>13,'code_deis' =>123435,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chanco ( San Pablo )','alias'=>'Posta de Salud Rural Chanco ( San Pablo )','type'=>13,'code_deis' =>123436,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Currimáhuida','alias'=>'Posta de Salud Rural Currimáhuida','type'=>13,'code_deis' =>123437,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Murrinumo','alias'=>'Centro Comunitario de Salud Familiar Murrinumo','type'=>16,'code_deis' =>123700,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Manuel Rodríguez','alias'=>'Centro Comunitario de Salud Familiar Manuel Rodríguez','type'=>16,'code_deis' =>123701,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Encanto','alias'=>'Centro Comunitario de Salud Familiar El Encanto','type'=>16,'code_deis' =>123705,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Riachuelo','alias'=>'Centro Comunitario de Salud Familiar Riachuelo','type'=>16,'code_deis' =>123709,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Pedro Jáuregui','alias'=>'SAPU Dr. Pedro Jáuregui','type'=>20,'code_deis' =>123800,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Rahue Alto','alias'=>'SAPU Rahue Alto','type'=>20,'code_deis' =>123801,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Del Reloncaví)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Del Reloncaví)','type'=>1,'code_deis' =>124010,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Del Reloncaví)','alias'=>'PRAIS (S.S Del Reloncaví)','type'=>2,'code_deis' =>124011,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. BKYS89 (Puerto Montt)','alias'=>'Clínica Dental Móvil Triple. Pat. BKYS89 (Puerto Montt)','type'=>3,'code_deis' =>124012,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Puerto Montt','alias'=>'Hospital de Puerto Montt','type'=>5,'code_deis' =>124105,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Llanquihue','alias'=>'Hospital de Llanquihue','type'=>22,'code_deis' =>124110,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Frutillar','alias'=>'Hospital de Frutillar','type'=>22,'code_deis' =>124115,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Fresia','alias'=>'Hospital de Fresia','type'=>22,'code_deis' =>124120,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Maullín','alias'=>'Hospital de Maullín','type'=>22,'code_deis' =>124125,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Calbuco','alias'=>'Hospital de Calbuco','type'=>22,'code_deis' =>124130,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Palena','alias'=>'Hospital de Palena','type'=>22,'code_deis' =>124140,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Futaleufú','alias'=>'Hospital de Futaleufú','type'=>22,'code_deis' =>124145,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Clínica de Puerto Varas SpA.','alias'=>'Clínica de Puerto Varas SpA.','type'=>6,'code_deis' =>124210,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro CONIN Puerto Montt','alias'=>'Centro CONIN Puerto Montt','type'=>26,'code_deis' =>124230,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Puerto Montt','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Puerto Montt','type'=>6,'code_deis' =>124240,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Puerto Montt','alias'=>'Clínica Puerto Montt','type'=>6,'code_deis' =>124250,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Clínica de la AChS Puerto Montt','alias'=>'Clínica de la AChS Puerto Montt','type'=>6,'code_deis' =>124251,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Universitaria de Puerto Montt S.A.','alias'=>'Clínica Universitaria de Puerto Montt S.A.','type'=>6,'code_deis' =>124260,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Megasalud S.A. Centro Médico y Dental Puerto Montt','alias'=>'Megasalud S.A. Centro Médico y Dental Puerto Montt','type'=>17,'code_deis' =>124273,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Complejo Penitenciario de Puerto Montt','alias'=>'Clínica Complejo Penitenciario de Puerto Montt','type'=>6,'code_deis' =>124274,'service' =>37,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Atención Profesional de Enfermería (CAPROEN)','alias'=>'Centro de Atención Profesional de Enfermería (CAPROEN)','type'=>8,'code_deis' =>124275,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Puerto Varas','alias'=>'Centro de Diálisis Puerto Varas','type'=>19,'code_deis' =>124277,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Nefrológico Puerto Montt','alias'=>'Centro Nefrológico Puerto Montt','type'=>8,'code_deis' =>124278,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Hemosur','alias'=>'Centro de Diálisis Hemosur','type'=>19,'code_deis' =>124279,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Naval de Puerto Montt','alias'=>'Policlínico Naval de Puerto Montt','type'=>8,'code_deis' =>124280,'service' =>37,'dependency' =>5]);
Organization::Create(['name' => 'Instituto Teletón Puerto Montt','alias'=>'Instituto Teletón Puerto Montt','type'=>8,'code_deis' =>124281,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Mutual de Seguridad CChC Puerto Montt','alias'=>'Policlínico Mutual de Seguridad CChC Puerto Montt','type'=>8,'code_deis' =>124282,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental La Araucana Puerto Montt','alias'=>'Centro Médico y Dental La Araucana Puerto Montt','type'=>17,'code_deis' =>124283,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Xa. Zona de Carabineros','alias'=>'Centro Médico y Dental Xa. Zona de Carabineros','type'=>17,'code_deis' =>124284,'service' =>37,'dependency' =>5]);
Organization::Create(['name' => 'Laboratorio Clínico Labemed','alias'=>'Laboratorio Clínico Labemed','type'=>10,'code_deis' =>124285,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Meditest Ltda','alias'=>'Laboratorio Clínico Meditest Ltda','type'=>10,'code_deis' =>124286,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Fleming Ltda.','alias'=>'Laboratorio Clínico Fleming Ltda.','type'=>10,'code_deis' =>124287,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Biomed','alias'=>'Laboratorio Clínico Biomed','type'=>10,'code_deis' =>124288,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Puerto Montt','alias'=>'Laboratorio Clínico Bionet S.A. - Puerto Montt','type'=>10,'code_deis' =>124289,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Angelmó','alias'=>'Centro de Salud Familiar Angelmó','type'=>12,'code_deis' =>124305,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Antonio Varas','alias'=>'Centro de Salud Familiar Antonio Varas','type'=>12,'code_deis' =>124310,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Carmela Carvajal','alias'=>'Centro de Salud Familiar Carmela Carvajal','type'=>12,'code_deis' =>124315,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Techo para todos (ONG)','alias'=>'Centro de Salud Familiar Techo para todos (ONG)','type'=>12,'code_deis' =>124320,'service' =>38,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Salud Familiar Carelmapu','alias'=>'Centro de Salud Familiar Carelmapu','type'=>12,'code_deis' =>124325,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Los Muermos','alias'=>'Centro de Salud Familiar Los Muermos','type'=>12,'code_deis' =>124330,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Nº 1 Puerto Varas','alias'=>'Centro de Salud Familiar Nº 1 Puerto Varas','type'=>12,'code_deis' =>124335,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Frutillar Alto','alias'=>'Centro de Salud Familiar Frutillar Alto','type'=>12,'code_deis' =>124365,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Los Volcanes','alias'=>'Centro de Salud Familiar Los Volcanes','type'=>12,'code_deis' =>124370,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Río Negro Hornopirén','alias'=>'Centro de Salud Familiar Río Negro Hornopirén','type'=>12,'code_deis' =>124380,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar Padre Hurtado','alias'=>'Centro de Salud Familiar Padre Hurtado','type'=>12,'code_deis' =>124381,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar San Pablo Mirasol (ONG)','alias'=>'Centro de Salud Familiar San Pablo Mirasol (ONG)','type'=>12,'code_deis' =>124385,'service' =>38,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Salud Familiar Alerce','alias'=>'Centro de Salud Familiar Alerce','type'=>12,'code_deis' =>124395,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Calbuco','alias'=>'Centro de Salud Familiar Calbuco','type'=>12,'code_deis' =>124396,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lago Chapo','alias'=>'Posta de Salud Rural Lago Chapo','type'=>13,'code_deis' =>124401,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Correntoso','alias'=>'Posta de Salud Rural Correntoso','type'=>13,'code_deis' =>124402,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chaicas','alias'=>'Posta de Salud Rural Chaicas','type'=>13,'code_deis' =>124403,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lenca','alias'=>'Posta de Salud Rural Lenca','type'=>13,'code_deis' =>124404,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Quemas (Puerto Montt)','alias'=>'Posta de Salud Rural Las Quemas (Puerto Montt)','type'=>13,'code_deis' =>124405,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Maillén','alias'=>'Posta de Salud Rural Maillén','type'=>13,'code_deis' =>124406,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Salto Grande','alias'=>'Posta de Salud Rural Salto Grande','type'=>13,'code_deis' =>124407,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Salto Chico','alias'=>'Posta de Salud Rural Salto Chico','type'=>13,'code_deis' =>124408,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Trapén','alias'=>'Posta de Salud Rural Trapén','type'=>13,'code_deis' =>124409,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Panitao','alias'=>'Posta de Salud Rural Panitao','type'=>13,'code_deis' =>124410,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cochamó','alias'=>'Posta de Salud Rural Cochamó','type'=>13,'code_deis' =>124411,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Cochamó','alias'=>'Centro de Salud Familiar Cochamó','type'=>12,'code_deis' =>124412,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Sotomó','alias'=>'Posta de Salud Rural Sotomó','type'=>13,'code_deis' =>124413,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Llanada Grande','alias'=>'Posta de Salud Rural Llanada Grande','type'=>13,'code_deis' =>124414,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Paso El Bolsón o Segundo Corral','alias'=>'Posta de Salud Rural Paso El Bolsón o Segundo Corral','type'=>13,'code_deis' =>124415,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Paso El León','alias'=>'Posta de Salud Rural Paso El León','type'=>13,'code_deis' =>124416,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Aulén','alias'=>'Posta de Salud Rural Aulén','type'=>13,'code_deis' =>124417,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Rolecha','alias'=>'Posta de Salud Rural Rolecha','type'=>13,'code_deis' =>124418,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Contao','alias'=>'Posta de Salud Rural Contao','type'=>13,'code_deis' =>124419,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Hualaihué','alias'=>'Centro Comunitario de Salud Familiar Hualaihué','type'=>16,'code_deis' =>124420,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Ensenada','alias'=>'Posta de Salud Rural Ensenada','type'=>13,'code_deis' =>124421,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Peulla','alias'=>'Posta de Salud Rural Peulla','type'=>13,'code_deis' =>124422,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nueva Braunau','alias'=>'Posta de Salud Rural Nueva Braunau','type'=>13,'code_deis' =>124423,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Petrohué','alias'=>'Posta de Salud Rural Petrohué','type'=>13,'code_deis' =>124424,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Colonia Río Sur','alias'=>'Posta de Salud Rural Colonia Río Sur','type'=>13,'code_deis' =>124425,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ralún','alias'=>'Posta de Salud Rural Ralún','type'=>13,'code_deis' =>124426,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Loncotoro','alias'=>'Posta de Salud Rural Loncotoro','type'=>13,'code_deis' =>124427,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pellines (Llanquihue)','alias'=>'Posta de Salud Rural Pellines (Llanquihue)','type'=>13,'code_deis' =>124428,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Colegual','alias'=>'Posta de Salud Rural Colegual','type'=>13,'code_deis' =>124429,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Casma','alias'=>'Posta de Salud Rural Casma','type'=>13,'code_deis' =>124430,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Centinela','alias'=>'Posta de Salud Rural Centinela','type'=>13,'code_deis' =>124432,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Parga','alias'=>'Posta de Salud Rural Parga','type'=>13,'code_deis' =>124433,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tegualda','alias'=>'Posta de Salud Rural Tegualda','type'=>13,'code_deis' =>124434,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Polizones','alias'=>'Posta de Salud Rural Polizones','type'=>13,'code_deis' =>124435,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cau Cua','alias'=>'Posta de Salud Rural Cau Cua','type'=>13,'code_deis' =>124436,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mañío','alias'=>'Posta de Salud Rural Mañío','type'=>13,'code_deis' =>124437,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Mirador','alias'=>'Posta de Salud Rural El Mirador','type'=>13,'code_deis' =>124438,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Traiguén (Fresia)','alias'=>'Posta de Salud Rural Traiguén (Fresia)','type'=>13,'code_deis' =>124439,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Cruces ( Fresia)','alias'=>'Posta de Salud Rural Las Cruces ( Fresia)','type'=>13,'code_deis' =>124440,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Línea Sin Nombre','alias'=>'Posta de Salud Rural Línea Sin Nombre','type'=>13,'code_deis' =>124441,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Misquihue','alias'=>'Posta de Salud Rural Misquihue','type'=>13,'code_deis' =>124443,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Peñol','alias'=>'Posta de Salud Rural Peñol','type'=>13,'code_deis' =>124444,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Astillero','alias'=>'Posta de Salud Rural Astillero','type'=>13,'code_deis' =>124445,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Pasada','alias'=>'Posta de Salud Rural La Pasada','type'=>13,'code_deis' =>124446,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quenuir','alias'=>'Posta de Salud Rural Quenuir','type'=>13,'code_deis' =>124447,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pargua','alias'=>'Posta de Salud Rural Pargua','type'=>13,'code_deis' =>124448,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Putenio','alias'=>'Posta de Salud Rural Putenio','type'=>13,'code_deis' =>124449,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Texas','alias'=>'Centro Comunitario de Salud Familiar Texas','type'=>16,'code_deis' =>124450,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Aguantao','alias'=>'Posta de Salud Rural Aguantao','type'=>13,'code_deis' =>124451,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Peñasmo','alias'=>'Posta de Salud Rural Peñasmo','type'=>13,'code_deis' =>124452,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Avellanal','alias'=>'Posta de Salud Rural Avellanal','type'=>13,'code_deis' =>124453,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tabón','alias'=>'Posta de Salud Rural Tabón','type'=>13,'code_deis' =>124454,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huar','alias'=>'Posta de Salud Rural Huar','type'=>13,'code_deis' =>124455,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chauquear','alias'=>'Posta de Salud Rural Chauquear','type'=>13,'code_deis' =>124456,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chayahue','alias'=>'Posta de Salud Rural Chayahue','type'=>13,'code_deis' =>124457,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pergue','alias'=>'Posta de Salud Rural Pergue','type'=>13,'code_deis' =>124458,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quetrulauquén','alias'=>'Posta de Salud Rural Quetrulauquén','type'=>13,'code_deis' =>124459,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Antonio (Calbuco)','alias'=>'Posta de Salud Rural San Antonio (Calbuco)','type'=>13,'code_deis' =>124460,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Agustín (Calbuco)','alias'=>'Posta de Salud Rural San Agustín (Calbuco)','type'=>13,'code_deis' =>124461,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cañitas','alias'=>'Posta de Salud Rural Cañitas','type'=>13,'code_deis' =>124462,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Piques','alias'=>'Posta de Salud Rural Los Piques','type'=>13,'code_deis' =>124463,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cumbre Alta','alias'=>'Posta de Salud Rural Cumbre Alta','type'=>13,'code_deis' =>124464,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quillagua (Los Muermos)','alias'=>'Posta de Salud Rural Quillagua (Los Muermos)','type'=>13,'code_deis' =>124465,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chulín','alias'=>'Posta de Salud Rural Chulín','type'=>13,'code_deis' =>124518,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Buill','alias'=>'Posta de Salud Rural Buill','type'=>13,'code_deis' =>124519,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Talcán','alias'=>'Posta de Salud Rural Talcán','type'=>13,'code_deis' =>124520,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nayahue','alias'=>'Posta de Salud Rural Nayahue','type'=>13,'code_deis' =>124521,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chumeldén','alias'=>'Posta de Salud Rural Chumeldén','type'=>13,'code_deis' =>124530,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Frío o Santa Lucía','alias'=>'Posta de Salud Rural El Frío o Santa Lucía','type'=>13,'code_deis' =>124532,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chana','alias'=>'Posta de Salud Rural Chana','type'=>13,'code_deis' =>124533,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puerto Ramírez','alias'=>'Posta de Salud Rural Puerto Ramírez','type'=>13,'code_deis' =>124534,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Azul','alias'=>'Posta de Salud Rural El Azul','type'=>13,'code_deis' =>124535,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Malito','alias'=>'Posta de Salud Rural El Malito','type'=>13,'code_deis' =>124536,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chope','alias'=>'Posta de Salud Rural Chope','type'=>13,'code_deis' =>124537,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pocoihuén','alias'=>'Posta de Salud Rural Pocoihuén','type'=>13,'code_deis' =>124539,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Espolón','alias'=>'Posta de Salud Rural El Espolón','type'=>13,'code_deis' =>124540,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huelmo','alias'=>'Posta de Salud Rural Huelmo','type'=>13,'code_deis' =>124541,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Valle El Frío','alias'=>'Posta de Salud Rural Valle El Frío','type'=>13,'code_deis' =>124543,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Piedra Azul','alias'=>'Posta de Salud Rural Piedra Azul','type'=>13,'code_deis' =>124544,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Estaquilla','alias'=>'Posta de Salud Rural Estaquilla','type'=>13,'code_deis' =>124545,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Hueque','alias'=>'Posta de Salud Rural Hueque','type'=>13,'code_deis' =>124548,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Macal','alias'=>'Posta de Salud Rural Macal','type'=>13,'code_deis' =>124549,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Casa de Pesca','alias'=>'Posta de Salud Rural Casa de Pesca','type'=>13,'code_deis' =>124550,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Machil','alias'=>'Posta de Salud Rural Machil','type'=>13,'code_deis' =>124551,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Queullín','alias'=>'Posta de Salud Rural Queullín','type'=>13,'code_deis' =>124552,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Ramón (Calbuco)','alias'=>'Posta de Salud Rural San Ramón (Calbuco)','type'=>13,'code_deis' =>124553,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huayún','alias'=>'Posta de Salud Rural Huayún','type'=>13,'code_deis' =>124554,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Llaguepe','alias'=>'Posta de Salud Rural Llaguepe','type'=>13,'code_deis' =>124555,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Puerto Montt','alias'=>'COSAM Puerto Montt','type'=>14,'code_deis' =>124601,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'COSAM de Reloncaví','alias'=>'COSAM de Reloncaví','type'=>14,'code_deis' =>124602,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Anahuac','alias'=>'Centro Comunitario de Salud Familiar Anahuac','type'=>16,'code_deis' =>124705,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Licarayen','alias'=>'Centro Comunitario de Salud Familiar Licarayen','type'=>16,'code_deis' =>124710,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Chamiza','alias'=>'Centro Comunitario de Salud Familiar Chamiza','type'=>16,'code_deis' =>124715,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar de Ayacara','alias'=>'Centro Comunitario de Salud Familiar de Ayacara','type'=>16,'code_deis' =>124731,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Pantanosa','alias'=>'Centro Comunitario de Salud Familiar Pantanosa','type'=>16,'code_deis' =>124765,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Angelmó','alias'=>'SAPU Angelmó','type'=>20,'code_deis' =>124805,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Antonio Varas','alias'=>'SAPU Antonio Varas','type'=>20,'code_deis' =>124806,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'SAR Puerto Varas','alias'=>'SAR Puerto Varas','type'=>20,'code_deis' =>124810,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Padre Hurtado','alias'=>'SAPU Padre Hurtado','type'=>20,'code_deis' =>124881,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'SAR Alerce','alias'=>'SAR Alerce','type'=>20,'code_deis' =>124895,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Aysén)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Aysén)','type'=>1,'code_deis' =>125010,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Aisén)','alias'=>'PRAIS (S.S Aisén)','type'=>2,'code_deis' =>125011,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Simple. Pat. PW4067 (Coihaique)','alias'=>'Clínica Dental Móvil Simple. Pat. PW4067 (Coihaique)','type'=>3,'code_deis' =>125012,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Regional (Coihaique)','alias'=>'Hospital Regional (Coihaique)','type'=>5,'code_deis' =>125100,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Puerto Aysén','alias'=>'Hospital de Puerto Aysén','type'=>23,'code_deis' =>125101,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Leopoldo Ortega R. (Chile Chico)','alias'=>'Hospital Dr. Leopoldo Ortega R. (Chile Chico)','type'=>22,'code_deis' =>125102,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Lord Cochrane','alias'=>'Hospital Lord Cochrane','type'=>22,'code_deis' =>125103,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Jorge Ibar (Cisnes)','alias'=>'Hospital Dr. Jorge Ibar (Cisnes)','type'=>22,'code_deis' =>125104,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Coyhaique','alias'=>'Centro de Salud Mutual CChC Coyhaique','type'=>8,'code_deis' =>125200,'service' =>40,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico del Trabajador Coyhaique','alias'=>'Policlínico del Trabajador Coyhaique','type'=>8,'code_deis' =>125201,'service' =>40,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Puerto Chacabuco','alias'=>'Centro de Salud Mutual CChC Puerto Chacabuco','type'=>8,'code_deis' =>125203,'service' =>40,'dependency' =>3]);
Organization::Create(['name' => 'Clínica de Trabajador AChS','alias'=>'Clínica de Trabajador AChS','type'=>6,'code_deis' =>125204,'service' =>40,'dependency' =>3]);
Organization::Create(['name' => 'Centro Clínico Militar Coyhaique','alias'=>'Centro Clínico Militar Coyhaique','type'=>8,'code_deis' =>125205,'service' =>40,'dependency' =>5]);
Organization::Create(['name' => 'Centro Médico y Dental XI Zona Aysén del General Carlos Ibáñez del Campo','alias'=>'Centro Médico y Dental XI Zona Aysén del General Carlos Ibáñez del Campo','type'=>17,'code_deis' =>125207,'service' =>40,'dependency' =>5]);
Organization::Create(['name' => 'Consultorio Víctor Domingo Silva','alias'=>'Consultorio Víctor Domingo Silva','type'=>12,'code_deis' =>125300,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Consultorio Alejandro Gutiérrez','alias'=>'Consultorio Alejandro Gutiérrez','type'=>12,'code_deis' =>125301,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Balmaceda','alias'=>'Posta de Salud Rural Balmaceda','type'=>13,'code_deis' =>125400,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Melinka','alias'=>'Posta de Salud Rural Melinka','type'=>13,'code_deis' =>125401,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Puerto Aguirre','alias'=>'Posta de Salud Rural Puerto Aguirre','type'=>13,'code_deis' =>125402,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Caleta Andrade','alias'=>'Posta de Salud Rural Caleta Andrade','type'=>13,'code_deis' =>125403,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Lago Verde','alias'=>'Posta de Salud Rural Lago Verde','type'=>13,'code_deis' =>125404,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural La Tapera','alias'=>'Posta de Salud Rural La Tapera','type'=>13,'code_deis' =>125405,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Villa Amengual','alias'=>'Posta de Salud Rural Villa Amengual','type'=>13,'code_deis' =>125406,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Bahía Murta','alias'=>'Posta de Salud Rural Bahía Murta','type'=>13,'code_deis' =>125407,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Puerto Sánchez','alias'=>'Posta de Salud Rural Puerto Sánchez','type'=>13,'code_deis' =>125408,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Puerto Bertrand','alias'=>'Posta de Salud Rural Puerto Bertrand','type'=>13,'code_deis' =>125409,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Puerto Guadal','alias'=>'Posta de Salud Rural Puerto Guadal','type'=>13,'code_deis' =>125410,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Mallín Grande','alias'=>'Posta de Salud Rural Mallín Grande','type'=>13,'code_deis' =>125411,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Río Tranquilo','alias'=>'Posta de Salud Rural Río Tranquilo','type'=>13,'code_deis' =>125412,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural El Blanco','alias'=>'Posta de Salud Rural El Blanco','type'=>13,'code_deis' =>125413,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Valle Simpson','alias'=>'Posta de Salud Rural Valle Simpson','type'=>13,'code_deis' =>125414,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Villa Ortega','alias'=>'Posta de Salud Rural Villa Ortega','type'=>13,'code_deis' =>125415,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Ñireguao','alias'=>'Posta de Salud Rural Ñireguao','type'=>13,'code_deis' =>125416,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Puerto Chacabuco','alias'=>'Centro Comunitario de Salud Familiar Puerto Chacabuco','type'=>16,'code_deis' =>125417,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Villa Mañihuales','alias'=>'Posta de Salud Rural Villa Mañihuales','type'=>13,'code_deis' =>125418,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Puerto Ibáñez','alias'=>'Posta de Salud Rural Puerto Ibáñez','type'=>13,'code_deis' =>125419,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Cerro Castillo (Río Ibáñez)','alias'=>'Posta de Salud Rural Cerro Castillo (Río Ibáñez)','type'=>13,'code_deis' =>125420,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Puyuhuapi','alias'=>'Posta de Salud Rural Puyuhuapi','type'=>13,'code_deis' =>125421,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Lago Atravesado','alias'=>'Posta de Salud Rural Lago Atravesado','type'=>13,'code_deis' =>125423,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Raúl Marín Balmaceda','alias'=>'Posta de Salud Rural Raúl Marín Balmaceda','type'=>13,'code_deis' =>125424,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Villa OHiggins','alias'=>'Posta de Salud Rural Villa OHiggins','type'=>13,'code_deis' =>125425,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural El Gato','alias'=>'Posta de Salud Rural El Gato','type'=>13,'code_deis' =>125426,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Melimoyu','alias'=>'Posta de Salud Rural Melimoyu','type'=>13,'code_deis' =>125427,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Caleta Tortel','alias'=>'Posta de Salud Rural Caleta Tortel','type'=>13,'code_deis' =>125428,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Posta de Salud Rural Isla Toto','alias'=>'Posta de Salud Rural Isla Toto','type'=>13,'code_deis' =>125429,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar La Junta','alias'=>'Centro de Salud Familiar La Junta','type'=>12,'code_deis' =>125442,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Ribera Sur','alias'=>'Centro Comunitario de Salud Familiar Ribera Sur','type'=>16,'code_deis' =>125701,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Magallanes)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Magallanes)','type'=>1,'code_deis' =>126010,'service' =>41,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Magallanes)','alias'=>'PRAIS (S.S Magallanes)','type'=>2,'code_deis' =>126011,'service' =>41,'dependency' =>1]);
Organization::Create(['name' => 'Oficina Sanitaria Dorotea','alias'=>'Oficina Sanitaria Dorotea','type'=>4,'code_deis' =>126090,'service' =>41,'dependency' =>2]);
Organization::Create(['name' => 'Vacunatorio SEREMI de Salud Magallanes','alias'=>'Vacunatorio SEREMI de Salud Magallanes','type'=>18,'code_deis' =>126095,'service' =>41,'dependency' =>2]);
Organization::Create(['name' => 'Hospital Clínico de Magallanes Dr. Lautaro Navarro Avaria','alias'=>'Hospital Clínico de Magallanes Dr. Lautaro Navarro Avaria','type'=>5,'code_deis' =>126100,'service' =>41,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Augusto Essmann Burgos ( Natales)','alias'=>'Hospital Dr. Augusto Essmann Burgos ( Natales)','type'=>23,'code_deis' =>126101,'service' =>41,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Marco Antonio Chamorro ( Porvenir)','alias'=>'Hospital Dr. Marco Antonio Chamorro ( Porvenir)','type'=>22,'code_deis' =>126102,'service' =>41,'dependency' =>1]);
Organization::Create(['name' => 'Hospital FFAA Cirujano Guzmán','alias'=>'Hospital FFAA Cirujano Guzmán','type'=>7,'code_deis' =>126200,'service' =>42,'dependency' =>5]);
Organization::Create(['name' => 'Clínica Magallanes','alias'=>'Clínica Magallanes','type'=>6,'code_deis' =>126201,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Atención Instituto de Seguridad del Trabajador Punta Arenas','alias'=>'Centro de Atención Instituto de Seguridad del Trabajador Punta Arenas','type'=>8,'code_deis' =>126202,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Punta Arenas','alias'=>'Centro de Salud Mutual CChC Punta Arenas','type'=>8,'code_deis' =>126203,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Naval (Puerto Williams) (D)','alias'=>'Hospital Naval (Puerto Williams) (D)','type'=>23,'code_deis' =>126204,'service' =>41,'dependency' =>4]);
Organization::Create(['name' => 'Centro Médico Medvital','alias'=>'Centro Médico Medvital','type'=>8,'code_deis' =>126211,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Clínica de Recuperación Hogar de Cristo Juan Pablo II','alias'=>'Clínica de Recuperación Hogar de Cristo Juan Pablo II','type'=>6,'code_deis' =>126212,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Instituto Médico Sarmiento','alias'=>'Instituto Médico Sarmiento','type'=>8,'code_deis' =>126213,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud S.A Punta Arenas','alias'=>'Centro Médico y Dental Megasalud S.A Punta Arenas','type'=>17,'code_deis' =>126214,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Sombrero','alias'=>'Clínica Sombrero','type'=>8,'code_deis' =>126215,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Harris','alias'=>'Clínica Harris','type'=>8,'code_deis' =>126216,'service' =>42,'dependency' =>5]);
Organization::Create(['name' => 'Centro Médico y Dental La Araucana S.A.','alias'=>'Centro Médico y Dental La Araucana S.A.','type'=>17,'code_deis' =>126217,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Rehabilitación Club de Leones Cruz del Sur','alias'=>'Centro de Rehabilitación Club de Leones Cruz del Sur','type'=>8,'code_deis' =>126219,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico AChS (Punta Arenas)','alias'=>'Policlínico AChS (Punta Arenas)','type'=>8,'code_deis' =>126220,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Centro Médico Colón','alias'=>'Vacunatorio Centro Médico Colón','type'=>18,'code_deis' =>126221,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Fuerzas Armadas y de Orden','alias'=>'Policlínico de la Fuerzas Armadas y de Orden','type'=>8,'code_deis' =>126222,'service' =>42,'dependency' =>5]);
Organization::Create(['name' => 'Vacunatorio Alfamed','alias'=>'Vacunatorio Alfamed','type'=>18,'code_deis' =>126223,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Croacia','alias'=>'Clínica Croacia','type'=>6,'code_deis' =>126225,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Servicio Dental 3ra. Comisaría de Carabineros de Porvenir (Consultorio tipo 2)','alias'=>'Servicio Dental 3ra. Comisaría de Carabineros de Porvenir (Consultorio tipo 2)','type'=>9,'code_deis' =>126226,'service' =>42,'dependency' =>5]);
Organization::Create(['name' => 'Central Odontológica de Magallanes de 3era Zona Naval','alias'=>'Central Odontológica de Magallanes de 3era Zona Naval','type'=>8,'code_deis' =>126227,'service' =>42,'dependency' =>5]);
Organization::Create(['name' => 'Laboratorio Clínico Corporación Municipal Punta Arenas','alias'=>'Laboratorio Clínico Corporación Municipal Punta Arenas','type'=>10,'code_deis' =>126228,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Mateo Bencur','alias'=>'Centro de Salud Familiar Dr. Mateo Bencur','type'=>12,'code_deis' =>126300,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Juan Damianovic','alias'=>'Centro de Salud Familiar Dr. Juan Damianovic','type'=>12,'code_deis' =>126301,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar 18 Septiembre','alias'=>'Centro de Salud Familiar 18 Septiembre','type'=>12,'code_deis' =>126302,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Thomas Fenton','alias'=>'Centro de Salud Familiar Dr. Thomas Fenton','type'=>12,'code_deis' =>126303,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Carlos Ibáñez','alias'=>'Centro de Salud Familiar Carlos Ibáñez','type'=>12,'code_deis' =>126304,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Natales','alias'=>'Centro de Salud Familiar Natales','type'=>12,'code_deis' =>126305,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cerro Castillo (Torres del Paine)','alias'=>'Posta de Salud Rural Cerro Castillo (Torres del Paine)','type'=>13,'code_deis' =>126400,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Río Verde','alias'=>'Posta de Salud Rural Río Verde','type'=>13,'code_deis' =>126402,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tehuelches','alias'=>'Posta de Salud Rural Tehuelches','type'=>13,'code_deis' =>126403,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Punta Delgada','alias'=>'Posta de Salud Rural Punta Delgada','type'=>13,'code_deis' =>126404,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puerto Edén','alias'=>'Posta de Salud Rural Puerto Edén','type'=>13,'code_deis' =>126410,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cameron','alias'=>'Posta de Salud Rural Cameron','type'=>13,'code_deis' =>126412,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Dorotea','alias'=>'Posta de Salud Rural Dorotea','type'=>13,'code_deis' =>126413,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Agua Fresca','alias'=>'Posta de Salud Rural Agua Fresca','type'=>13,'code_deis' =>126414,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Punta Arenas','alias'=>'COSAM Punta Arenas','type'=>14,'code_deis' =>126606,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Dr. Mateo Bencur','alias'=>'Centro Comunitario de Salud Familiar Dr. Mateo Bencur','type'=>16,'code_deis' =>126700,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Río Seco','alias'=>'Centro Comunitario de Salud Familiar Río Seco','type'=>16,'code_deis' =>126701,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Hospital Comunitario Cristina Calderón de Puerto Williams','alias'=>'Hospital Comunitario Cristina Calderón de Puerto Williams','type'=>22,'code_deis' =>126704,'service' =>41,'dependency' =>1]);
Organization::Create(['name' => 'SAPU Dr. Mateo Bencur','alias'=>'SAPU Dr. Mateo Bencur','type'=>20,'code_deis' =>126800,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Juan Damianovic','alias'=>'SAPU Dr. Juan Damianovic','type'=>20,'code_deis' =>126801,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Arauco)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Arauco)','type'=>1,'code_deis' =>128010,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Arauco)','alias'=>'PRAIS (S.S Arauco)','type'=>2,'code_deis' =>128011,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. VP5666 (Lebu)','alias'=>'Clínica Dental Móvil Triple. Pat. VP5666 (Lebu)','type'=>3,'code_deis' =>128012,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Simple. Pat. VP5664 (Lebu)','alias'=>'Clínica Dental Móvil Simple. Pat. VP5664 (Lebu)','type'=>3,'code_deis' =>128013,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Simple. Pat. DDKB17 (Lebu)','alias'=>'Clínica Dental Móvil Simple. Pat. DDKB17 (Lebu)','type'=>3,'code_deis' =>128014,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Provincial Dr. Rafael Avaría (Curanilahue)','alias'=>'Hospital Provincial Dr. Rafael Avaría (Curanilahue)','type'=>23,'code_deis' =>128109,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Lebu','alias'=>'Hospital de Lebu','type'=>22,'code_deis' =>128110,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Intercultural Kallvu Llanka (Cañete)','alias'=>'Hospital Intercultural Kallvu Llanka (Cañete)','type'=>22,'code_deis' =>128111,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Contulmo','alias'=>'Hospital de Contulmo','type'=>22,'code_deis' =>128112,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'Hospital San Vicente de Arauco','alias'=>'Hospital San Vicente de Arauco','type'=>22,'code_deis' =>128113,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'Laboratorio Clínico San Pedro','alias'=>'Laboratorio Clínico San Pedro','type'=>10,'code_deis' =>128200,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bio-Test','alias'=>'Laboratorio Clínico Bio-Test','type'=>10,'code_deis' =>128217,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico San Pedro','alias'=>'Laboratorio Clínico San Pedro','type'=>10,'code_deis' =>128218,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Lebu Norte','alias'=>'Centro de Salud Familiar Lebu Norte','type'=>12,'code_deis' =>128311,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Isabel Jiménez','alias'=>'Centro de Salud Familiar Isabel Jiménez','type'=>12,'code_deis' =>128324,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Eleuterio Ramírez','alias'=>'Centro de Salud Familiar Eleuterio Ramírez','type'=>12,'code_deis' =>128327,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Los Álamos','alias'=>'Centro de Salud Familiar Los Álamos','type'=>12,'code_deis' =>128328,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cerro Alto','alias'=>'Posta de Salud Rural Cerro Alto','type'=>13,'code_deis' =>128405,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pehuén','alias'=>'Posta de Salud Rural Pehuén','type'=>13,'code_deis' =>128406,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tres Pinos','alias'=>'Posta de Salud Rural Tres Pinos','type'=>13,'code_deis' =>128407,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pangue','alias'=>'Posta de Salud Rural Pangue','type'=>13,'code_deis' =>128408,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quiapo','alias'=>'Posta de Salud Rural Quiapo','type'=>13,'code_deis' =>128409,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Isla Mocha','alias'=>'Posta de Salud Rural Isla Mocha','type'=>13,'code_deis' =>128410,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ramadillas','alias'=>'Posta de Salud Rural Ramadillas','type'=>13,'code_deis' =>128412,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Punta Lavapié','alias'=>'Posta de Salud Rural Punta Lavapié','type'=>13,'code_deis' =>128413,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Laraquete','alias'=>'Centro de Salud Familiar Laraquete','type'=>12,'code_deis' =>128414,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cayucupil','alias'=>'Posta de Salud Rural Cayucupil','type'=>13,'code_deis' =>128415,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Antiquina','alias'=>'Centro Comunitario de Salud Familiar Antiquina','type'=>16,'code_deis' =>128416,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Antihuala','alias'=>'Posta de Salud Rural Antihuala','type'=>13,'code_deis' =>128417,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huentelolén','alias'=>'Posta de Salud Rural Huentelolén','type'=>13,'code_deis' =>128418,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quidico','alias'=>'Posta de Salud Rural Quidico','type'=>13,'code_deis' =>128419,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ranquilhue','alias'=>'Posta de Salud Rural Ranquilhue','type'=>13,'code_deis' =>128420,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alto Quilantahue','alias'=>'Posta de Salud Rural Alto Quilantahue','type'=>13,'code_deis' =>128421,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Casa de Piedra','alias'=>'Posta de Salud Rural Casa de Piedra','type'=>13,'code_deis' =>128422,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Llenquehue','alias'=>'Posta de Salud Rural Llenquehue','type'=>13,'code_deis' =>128423,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lloncao','alias'=>'Posta de Salud Rural Lloncao','type'=>13,'code_deis' =>128424,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pocuno','alias'=>'Posta de Salud Rural Pocuno','type'=>13,'code_deis' =>128425,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Elicura','alias'=>'Centro Comunitario de Salud Familiar Elicura','type'=>16,'code_deis' =>128426,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mahuilque Bajo','alias'=>'Posta de Salud Rural Mahuilque Bajo','type'=>13,'code_deis' =>128427,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Los Huapes de Aillahuampi','alias'=>'Posta de Salud Rural Los Huapes de Aillahuampi','type'=>13,'code_deis' =>128428,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huillinco','alias'=>'Posta de Salud Rural Huillinco','type'=>13,'code_deis' =>128429,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Carampangue','alias'=>'Centro de Salud Familiar Carampangue','type'=>12,'code_deis' =>128438,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Las Puentes','alias'=>'Posta de Salud Rural Las Puentes','type'=>13,'code_deis' =>128440,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Yani','alias'=>'Posta de Salud Rural Yani','type'=>13,'code_deis' =>128441,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San José de Colico','alias'=>'Posta de Salud Rural San José de Colico','type'=>13,'code_deis' =>128442,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Rosa (Lebu)','alias'=>'Posta de Salud Rural Santa Rosa (Lebu)','type'=>13,'code_deis' =>128443,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Llico (Arauco)','alias'=>'Posta de Salud Rural Llico (Arauco)','type'=>13,'code_deis' =>128444,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ranquilco','alias'=>'Posta de Salud Rural Ranquilco','type'=>13,'code_deis' =>128445,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pangueco (Cañete)','alias'=>'Posta de Salud Rural Pangueco (Cañete)','type'=>13,'code_deis' =>128446,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Primer Agua','alias'=>'Posta de Salud Rural Primer Agua','type'=>13,'code_deis' =>128447,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Loncotripai','alias'=>'Posta de Salud Rural Loncotripai','type'=>13,'code_deis' =>128448,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Curanilahue','alias'=>'COSAM Curanilahue','type'=>14,'code_deis' =>128609,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Lebu','alias'=>'COSAM Lebu','type'=>14,'code_deis' =>128610,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Cañete','alias'=>'COSAM Cañete','type'=>14,'code_deis' =>128611,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'COSAM de Arauco','alias'=>'COSAM de Arauco','type'=>14,'code_deis' =>128613,'service' =>43,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Álamos','alias'=>'Centro Comunitario de Salud Familiar Los Álamos','type'=>16,'code_deis' =>128728,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio General Rural Tubul','alias'=>'Consultorio General Rural Tubul','type'=>12,'code_deis' =>128729,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Quidico','alias'=>'Centro Comunitario de Salud Familiar Quidico','type'=>16,'code_deis' =>128730,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Araucanía Norte)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S Araucanía Norte)','type'=>1,'code_deis' =>129010,'service' =>44,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Araucanía Norte)','alias'=>'PRAIS (S.S Araucanía Norte)','type'=>2,'code_deis' =>129011,'service' =>44,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. BBTD27 (Angol)','alias'=>'Clínica Dental Móvil Triple. Pat. BBTD27 (Angol)','type'=>3,'code_deis' =>129012,'service' =>44,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. BBTD28 (Angol)','alias'=>'Clínica Dental Móvil Triple. Pat. BBTD28 (Angol)','type'=>3,'code_deis' =>129013,'service' =>44,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Mauricio Heyermann (Angol)','alias'=>'Hospital Dr. Mauricio Heyermann (Angol)','type'=>5,'code_deis' =>129100,'service' =>44,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Purén','alias'=>'Hospital de Purén','type'=>22,'code_deis' =>129101,'service' =>44,'dependency' =>1]);
Organization::Create(['name' => 'Consultorio Los Sauces','alias'=>'Consultorio Los Sauces','type'=>12,'code_deis' =>129102,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Hospital de Collipulli','alias'=>'Hospital de Collipulli','type'=>22,'code_deis' =>129103,'service' =>44,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Dino Stagno M.(Traiguén)','alias'=>'Hospital Dr. Dino Stagno M.(Traiguén)','type'=>23,'code_deis' =>129104,'service' =>44,'dependency' =>1]);
Organization::Create(['name' => 'Consultorio Lumaco','alias'=>'Consultorio Lumaco','type'=>12,'code_deis' =>129105,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Hospital San José de Victoria','alias'=>'Hospital San José de Victoria','type'=>5,'code_deis' =>129106,'service' =>44,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Dr. Oscar Hernández E.(Curacautín)','alias'=>'Hospital Dr. Oscar Hernández E.(Curacautín)','type'=>22,'code_deis' =>129107,'service' =>44,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Lonquimay','alias'=>'Hospital de Lonquimay','type'=>22,'code_deis' =>129108,'service' =>44,'dependency' =>1]);
Organization::Create(['name' => 'Clínica de la Asociación Chilena de Seguridad AChS Angol','alias'=>'Clínica de la Asociación Chilena de Seguridad AChS Angol','type'=>6,'code_deis' =>129233,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Gendarmería de Chile Angol','alias'=>'Centro de Salud Gendarmería de Chile Angol','type'=>8,'code_deis' =>129234,'service' =>33,'dependency' =>4]);
Organization::Create(['name' => 'Laboratorio Biomec','alias'=>'Laboratorio Biomec','type'=>10,'code_deis' =>129235,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Angol','alias'=>'Laboratorio Clínico Angol','type'=>10,'code_deis' =>129236,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Consultorio Prefectura de Carabineros de Chile Malleco','alias'=>'Consultorio Prefectura de Carabineros de Chile Malleco','type'=>8,'code_deis' =>129238,'service' =>33,'dependency' =>5]);
Organization::Create(['name' => 'Centro de Salud Familiar Renaico','alias'=>'Centro de Salud Familiar Renaico','type'=>12,'code_deis' =>129300,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Huequén','alias'=>'Centro de Salud Familiar Huequén','type'=>12,'code_deis' =>129301,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Consultorio Ercilla','alias'=>'Consultorio Ercilla','type'=>12,'code_deis' =>129302,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Alemania de Angol','alias'=>'Centro de Salud Familiar Alemania de Angol','type'=>12,'code_deis' =>129303,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Piedra del Águila','alias'=>'Centro de Salud Familiar Piedra del Águila','type'=>12,'code_deis' =>129304,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Victoria','alias'=>'Centro de Salud Familiar Victoria','type'=>12,'code_deis' =>129318,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Vegas Blancas','alias'=>'Posta de Salud Rural Vegas Blancas','type'=>13,'code_deis' =>129400,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coyanco','alias'=>'Posta de Salud Rural Coyanco','type'=>13,'code_deis' =>129401,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Colonia Manuel Rodríguez','alias'=>'Posta de Salud Rural Colonia Manuel Rodríguez','type'=>13,'code_deis' =>129403,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cuartel Quemado','alias'=>'Posta de Salud Rural Cuartel Quemado','type'=>13,'code_deis' =>129404,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coyancahuín','alias'=>'Posta de Salud Rural Coyancahuín','type'=>13,'code_deis' =>129405,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural El Lingue','alias'=>'Posta de Salud Rural El Lingue','type'=>13,'code_deis' =>129406,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Ramón de Los Sauces','alias'=>'Posta de Salud Rural San Ramón de Los Sauces','type'=>13,'code_deis' =>129407,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Trintre','alias'=>'Posta de Salud Rural Trintre','type'=>13,'code_deis' =>129408,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tijeral','alias'=>'Posta de Salud Rural Tijeral','type'=>13,'code_deis' =>129409,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Maica','alias'=>'Posta de Salud Rural Maica','type'=>13,'code_deis' =>129410,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mininco','alias'=>'Posta de Salud Rural Mininco','type'=>13,'code_deis' =>129411,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Batalla','alias'=>'Posta de Salud Rural La Batalla','type'=>13,'code_deis' =>129412,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Amargo','alias'=>'Posta de Salud Rural Amargo','type'=>13,'code_deis' =>129413,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Niblinto','alias'=>'Posta de Salud Rural Niblinto','type'=>13,'code_deis' =>129414,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chequenco','alias'=>'Posta de Salud Rural Chequenco','type'=>13,'code_deis' =>129415,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Aniñir','alias'=>'Posta de Salud Rural Aniñir','type'=>13,'code_deis' =>129416,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Molco','alias'=>'Posta de Salud Rural Molco','type'=>13,'code_deis' =>129417,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quechereguas','alias'=>'Posta de Salud Rural Quechereguas','type'=>13,'code_deis' =>129418,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Rosa (Los Sauces )','alias'=>'Posta de Salud Rural Santa Rosa (Los Sauces )','type'=>13,'code_deis' =>129419,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Temulemu','alias'=>'Posta de Salud Rural Temulemu','type'=>13,'code_deis' =>129420,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quilquén','alias'=>'Posta de Salud Rural Quilquén','type'=>13,'code_deis' =>129421,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pichipellahuén','alias'=>'Posta de Salud Rural Pichipellahuén','type'=>13,'code_deis' =>129423,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Curilebu','alias'=>'Posta de Salud Rural Curilebu','type'=>13,'code_deis' =>129424,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Manzanar ( Lumaco )','alias'=>'Posta de Salud Rural Manzanar ( Lumaco )','type'=>13,'code_deis' =>129425,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chanco','alias'=>'Posta de Salud Rural Chanco','type'=>13,'code_deis' =>129426,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Herradura','alias'=>'Posta de Salud Rural La Herradura','type'=>13,'code_deis' =>129427,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Loncoyán','alias'=>'Posta de Salud Rural Loncoyán','type'=>13,'code_deis' =>129428,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Selva Oscura','alias'=>'Posta de Salud Rural Selva Oscura','type'=>13,'code_deis' =>129429,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Púa','alias'=>'Posta de Salud Rural Púa','type'=>13,'code_deis' =>129430,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quino','alias'=>'Posta de Salud Rural Quino','type'=>13,'code_deis' =>129431,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Pailahueque','alias'=>'Centro Comunitario de Salud Familiar Pailahueque','type'=>16,'code_deis' =>129432,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rosario','alias'=>'Posta de Salud Rural Rosario','type'=>13,'code_deis' =>129433,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cullinco','alias'=>'Posta de Salud Rural Cullinco','type'=>13,'code_deis' =>129434,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural California','alias'=>'Posta de Salud Rural California','type'=>13,'code_deis' =>129435,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Reducción Pailahueque','alias'=>'Posta de Salud Rural Reducción Pailahueque','type'=>13,'code_deis' =>129436,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huitranlebu','alias'=>'Posta de Salud Rural Huitranlebu','type'=>13,'code_deis' =>129437,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chacaico','alias'=>'Posta de Salud Rural Chacaico','type'=>13,'code_deis' =>129438,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tricauco','alias'=>'Posta de Salud Rural Tricauco','type'=>13,'code_deis' =>129439,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Temocuicui','alias'=>'Posta de Salud Rural Temocuicui','type'=>13,'code_deis' =>129440,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Malalcahuello','alias'=>'Posta de Salud Rural Malalcahuello','type'=>13,'code_deis' =>129441,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Río Blanco (Curacautín)','alias'=>'Posta de Salud Rural Río Blanco (Curacautín)','type'=>13,'code_deis' =>129442,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural La Tepa','alias'=>'Posta de Salud Rural La Tepa','type'=>13,'code_deis' =>129443,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Ana','alias'=>'Posta de Salud Rural Santa Ana','type'=>13,'code_deis' =>129444,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Radalco','alias'=>'Posta de Salud Rural Radalco','type'=>13,'code_deis' =>129445,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rariruca','alias'=>'Posta de Salud Rural Rariruca','type'=>13,'code_deis' =>129446,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Manzanar ( Curacautín )','alias'=>'Posta de Salud Rural Manzanar ( Curacautín )','type'=>13,'code_deis' =>129447,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Contraco','alias'=>'Posta de Salud Rural Contraco','type'=>13,'code_deis' =>129448,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lolén','alias'=>'Posta de Salud Rural Lolén','type'=>13,'code_deis' =>129449,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Sierra Nevada','alias'=>'Posta de Salud Rural Sierra Nevada','type'=>13,'code_deis' =>129450,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Icalma','alias'=>'Posta de Salud Rural Icalma','type'=>13,'code_deis' =>129451,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Liucura (Lonquimay)','alias'=>'Posta de Salud Rural Liucura (Lonquimay)','type'=>13,'code_deis' =>129452,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pedregoso (Lonquimay)','alias'=>'Posta de Salud Rural Pedregoso (Lonquimay)','type'=>13,'code_deis' =>129453,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pichipehuenco','alias'=>'Posta de Salud Rural Pichipehuenco','type'=>13,'code_deis' =>129454,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Troyo','alias'=>'Posta de Salud Rural Troyo','type'=>13,'code_deis' =>129455,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ranquil','alias'=>'Posta de Salud Rural Ranquil','type'=>13,'code_deis' =>129456,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pivadenco','alias'=>'Posta de Salud Rural Pivadenco','type'=>13,'code_deis' =>129585,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Didaico','alias'=>'Posta de Salud Rural Didaico','type'=>13,'code_deis' =>129586,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Encinar','alias'=>'Posta de Salud Rural Encinar','type'=>13,'code_deis' =>129587,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Santa Julia','alias'=>'Posta de Salud Rural Santa Julia','type'=>13,'code_deis' =>129588,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Consultorio Alemania de Angol','alias'=>'Centro Comunitario de Salud Familiar Consultorio Alemania de Angol','type'=>16,'code_deis' =>129703,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Capitán Pastene','alias'=>'Centro Comunitario de Salud Familiar Capitán Pastene','type'=>16,'code_deis' =>129705,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Cons. Victoria','alias'=>'Centro Comunitario de Salud Familiar Cons. Victoria','type'=>16,'code_deis' =>129718,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'SAR Alemania','alias'=>'SAR Alemania','type'=>20,'code_deis' =>129803,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Chiloé)','alias'=>'Actividades gestionadas por la Dirección del Servicio para apoyo de la Red (S.S de Chiloé)','type'=>1,'code_deis' =>133010,'service' =>45,'dependency' =>1]);
Organization::Create(['name' => 'PRAIS (S.S Chiloé)','alias'=>'PRAIS (S.S Chiloé)','type'=>2,'code_deis' =>133011,'service' =>45,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Dental Móvil Triple. Pat. BKYS90 (Castro)','alias'=>'Clínica Dental Móvil Triple. Pat. BKYS90 (Castro)','type'=>3,'code_deis' =>133012,'service' =>45,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Castro','alias'=>'Hospital de Castro','type'=>5,'code_deis' =>133150,'service' =>45,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Ancud','alias'=>'Hospital de Ancud','type'=>23,'code_deis' =>133155,'service' =>45,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario de Achao','alias'=>'Hospital Comunitario de Achao','type'=>22,'code_deis' =>133160,'service' =>45,'dependency' =>1]);
Organization::Create(['name' => 'Hospital de Quellón','alias'=>'Hospital de Quellón','type'=>22,'code_deis' =>133165,'service' =>45,'dependency' =>1]);
Organization::Create(['name' => 'Hospital Comunitario de Queilén','alias'=>'Hospital Comunitario de Queilén','type'=>22,'code_deis' =>133170,'service' =>45,'dependency' =>1]);
Organization::Create(['name' => 'Buque Cirujano Videla','alias'=>'Buque Cirujano Videla','type'=>12,'code_deis' =>133175,'service' =>45,'dependency' =>4]);
Organization::Create(['name' => 'Vacunatorio Rosalía Muñoz','alias'=>'Vacunatorio Rosalía Muñoz','type'=>18,'code_deis' =>133200,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Austral','alias'=>'Centro Médico Austral','type'=>8,'code_deis' =>133201,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la AChS Quellón','alias'=>'Policlínico de la AChS Quellón','type'=>8,'code_deis' =>133203,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la AChS Ancud','alias'=>'Policlínico de la AChS Ancud','type'=>8,'code_deis' =>133204,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico y Hematológico Ancud','alias'=>'Laboratorio Clínico y Hematológico Ancud','type'=>10,'code_deis' =>133205,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Biolab Ltda','alias'=>'Laboratorio Biolab Ltda','type'=>10,'code_deis' =>133206,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la AChS Castro','alias'=>'Policlínico de la AChS Castro','type'=>8,'code_deis' =>133278,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental La Araucana Castro','alias'=>'Centro Médico y Dental La Araucana Castro','type'=>17,'code_deis' =>133279,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental La Araucana Ancud','alias'=>'Centro Médico y Dental La Araucana Ancud','type'=>17,'code_deis' =>133280,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Ancud','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Ancud','type'=>8,'code_deis' =>133281,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Castro','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Castro','type'=>8,'code_deis' =>133282,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico y Hematológico Biolab','alias'=>'Laboratorio Clínico y Hematológico Biolab','type'=>10,'code_deis' =>133283,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Austral','alias'=>'Laboratorio Clínico Austral','type'=>10,'code_deis' =>133284,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico y Hematológico Biolab Ltda. ECOSUR','alias'=>'Laboratorio Clínico y Hematológico Biolab Ltda. ECOSUR','type'=>10,'code_deis' =>133285,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Chiloé','alias'=>'Laboratorio Clínico Chiloé','type'=>10,'code_deis' =>133286,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Pudeto Bajo','alias'=>'Centro de Salud Familiar Pudeto Bajo','type'=>12,'code_deis' =>133325,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quemchi','alias'=>'Centro de Salud Familiar Quemchi','type'=>12,'code_deis' =>133340,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Chonchi','alias'=>'Centro de Salud Familiar Chonchi','type'=>12,'code_deis' =>133345,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dalcahue','alias'=>'Centro de Salud Familiar Dalcahue','type'=>12,'code_deis' =>133350,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Puqueldón','alias'=>'Centro de Salud Familiar Puqueldón','type'=>12,'code_deis' =>133355,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Curaco de Vélez','alias'=>'Centro de Salud Familiar Curaco de Vélez','type'=>12,'code_deis' =>133360,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. René Tapia Salgado','alias'=>'Centro de Salud Familiar Dr. René Tapia Salgado','type'=>12,'code_deis' =>133375,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Manuel Ferreira Guzman','alias'=>'Centro de Salud Familiar Dr. Manuel Ferreira Guzman','type'=>12,'code_deis' =>133390,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Quellón','alias'=>'Centro de Salud Familiar Quellón','type'=>12,'code_deis' =>133396,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Curahue','alias'=>'Posta de Salud Rural Curahue','type'=>13,'code_deis' =>133466,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puyán','alias'=>'Posta de Salud Rural Puyán','type'=>13,'code_deis' =>133467,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Rilán','alias'=>'Centro Comunitario de Salud Familiar Rilán','type'=>16,'code_deis' =>133468,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quehui','alias'=>'Posta de Salud Rural Quehui','type'=>13,'code_deis' =>133469,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chelín','alias'=>'Posta de Salud Rural Chelín','type'=>13,'code_deis' =>133470,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Yutuy','alias'=>'Posta de Salud Rural Yutuy','type'=>13,'code_deis' =>133471,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mocopulli','alias'=>'Posta de Salud Rural Mocopulli','type'=>13,'code_deis' =>133472,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quetalco','alias'=>'Posta de Salud Rural Quetalco','type'=>13,'code_deis' =>133473,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Calén','alias'=>'Posta de Salud Rural Calén','type'=>13,'code_deis' =>133474,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Aldachildo','alias'=>'Posta de Salud Rural Aldachildo','type'=>13,'code_deis' =>133475,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Ichuac','alias'=>'Posta de Salud Rural Ichuac','type'=>13,'code_deis' =>133476,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Detif','alias'=>'Posta de Salud Rural Detif','type'=>13,'code_deis' =>133477,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Liucura (Puqueldón)','alias'=>'Posta de Salud Rural Liucura (Puqueldón)','type'=>13,'code_deis' =>133478,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Terao','alias'=>'Posta de Salud Rural Terao','type'=>13,'code_deis' =>133480,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chanquín','alias'=>'Posta de Salud Rural Chanquín','type'=>13,'code_deis' =>133482,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Petanes Bajos','alias'=>'Posta de Salud Rural Petanes Bajos','type'=>13,'code_deis' =>133483,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Rauco','alias'=>'Posta de Salud Rural Rauco','type'=>13,'code_deis' =>133484,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Linao','alias'=>'Posta de Salud Rural Linao','type'=>13,'code_deis' =>133485,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chacao','alias'=>'Posta de Salud Rural Chacao','type'=>13,'code_deis' =>133486,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quetalmahue','alias'=>'Posta de Salud Rural Quetalmahue','type'=>13,'code_deis' =>133487,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nal','alias'=>'Posta de Salud Rural Nal','type'=>13,'code_deis' =>133488,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Manao','alias'=>'Posta de Salud Rural Manao','type'=>13,'code_deis' =>133489,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Guabún','alias'=>'Posta de Salud Rural Guabún','type'=>13,'code_deis' =>133490,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Lliuco (Quemchi)','alias'=>'Posta de Salud Rural Lliuco (Quemchi)','type'=>13,'code_deis' =>133492,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Morrolobos','alias'=>'Posta de Salud Rural Morrolobos','type'=>13,'code_deis' =>133493,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quinterquén','alias'=>'Posta de Salud Rural Quinterquén','type'=>13,'code_deis' =>133494,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Montemar','alias'=>'Posta de Salud Rural Montemar','type'=>13,'code_deis' =>133495,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tenaún','alias'=>'Posta de Salud Rural Tenaún','type'=>13,'code_deis' =>133496,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quicaví','alias'=>'Posta de Salud Rural Quicaví','type'=>13,'code_deis' =>133497,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Agoni Alto','alias'=>'Posta de Salud Rural Agoni Alto','type'=>13,'code_deis' =>133498,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alqui','alias'=>'Posta de Salud Rural Alqui','type'=>13,'code_deis' =>133499,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Apeche','alias'=>'Posta de Salud Rural Apeche','type'=>13,'code_deis' =>133500,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pío - Pío','alias'=>'Posta de Salud Rural Pío - Pío','type'=>13,'code_deis' =>133501,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nepúe','alias'=>'Posta de Salud Rural Nepúe','type'=>13,'code_deis' =>133502,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quinchao','alias'=>'Posta de Salud Rural Quinchao','type'=>13,'code_deis' =>133503,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Isla Lin-Lin','alias'=>'Posta de Salud Rural Isla Lin-Lin','type'=>13,'code_deis' =>133504,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Isla Llingua','alias'=>'Posta de Salud Rural Isla Llingua','type'=>13,'code_deis' =>133505,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Isla Meulín','alias'=>'Centro Comunitario de Salud Familiar Isla Meulín','type'=>16,'code_deis' =>133506,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Isla Quenac','alias'=>'Posta de Salud Rural Isla Quenac','type'=>13,'code_deis' =>133507,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Isla Cahuach','alias'=>'Posta de Salud Rural Isla Cahuach','type'=>13,'code_deis' =>133509,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Isla Alao','alias'=>'Posta de Salud Rural Isla Alao','type'=>13,'code_deis' =>133510,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Capilla Antigüa','alias'=>'Posta de Salud Rural Capilla Antigüa','type'=>13,'code_deis' =>133511,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Huyar Alto','alias'=>'Posta de Salud Rural Huyar Alto','type'=>13,'code_deis' =>133512,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Palqui','alias'=>'Posta de Salud Rural Palqui','type'=>13,'code_deis' =>133513,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Mechuque','alias'=>'Posta de Salud Rural Mechuque','type'=>13,'code_deis' =>133514,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Tac','alias'=>'Posta de Salud Rural Tac','type'=>13,'code_deis' =>133515,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Voigue','alias'=>'Posta de Salud Rural Voigue','type'=>13,'code_deis' =>133517,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Curanue','alias'=>'Posta de Salud Rural Curanue','type'=>13,'code_deis' =>133522,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Candelaria (Quellón)','alias'=>'Posta de Salud Rural Candelaria (Quellón)','type'=>13,'code_deis' =>133523,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Compu','alias'=>'Posta de Salud Rural Compu','type'=>13,'code_deis' =>133524,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San Juan de Chadmo','alias'=>'Posta de Salud Rural San Juan de Chadmo','type'=>13,'code_deis' =>133525,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pelu','alias'=>'Posta de Salud Rural Pelu','type'=>13,'code_deis' =>133526,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Punta Liles o Laitec','alias'=>'Posta de Salud Rural Punta Liles o Laitec','type'=>13,'code_deis' =>133527,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Punta Paula o Coldita','alias'=>'Posta de Salud Rural Punta Paula o Coldita','type'=>13,'code_deis' =>133528,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Piedras Blancas','alias'=>'Posta de Salud Rural Piedras Blancas','type'=>13,'code_deis' =>133529,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural de CONTUY','alias'=>'Posta de Salud Rural de CONTUY','type'=>13,'code_deis' =>133534,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pureo','alias'=>'Posta de Salud Rural Pureo','type'=>13,'code_deis' =>133536,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pulpito','alias'=>'Posta de Salud Rural Pulpito','type'=>13,'code_deis' =>133538,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Caulín','alias'=>'Posta de Salud Rural Caulín','type'=>13,'code_deis' =>133542,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Puchaurán','alias'=>'Posta de Salud Rural Puchaurán','type'=>13,'code_deis' =>133546,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Pid - Pid','alias'=>'Posta de Salud Rural Pid - Pid','type'=>13,'code_deis' =>133547,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coinco','alias'=>'Posta de Salud Rural Coinco','type'=>13,'code_deis' =>133548,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chadmo Central','alias'=>'Posta de Salud Rural Chadmo Central','type'=>13,'code_deis' =>133549,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Auchac','alias'=>'Posta de Salud Rural Auchac','type'=>13,'code_deis' =>133550,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Yaldad','alias'=>'Posta de Salud Rural Yaldad','type'=>13,'code_deis' =>133551,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chaulinec La Villa','alias'=>'Posta de Salud Rural Chaulinec La Villa','type'=>13,'code_deis' =>133552,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Natri','alias'=>'Posta de Salud Rural Natri','type'=>13,'code_deis' =>133553,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Curaco de Vilupulli','alias'=>'Posta de Salud Rural Curaco de Vilupulli','type'=>13,'code_deis' =>133554,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Nalhuitad','alias'=>'Posta de Salud Rural Nalhuitad','type'=>13,'code_deis' =>133555,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Cucao','alias'=>'Posta de Salud Rural Cucao','type'=>13,'code_deis' =>133556,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Coipomo','alias'=>'Posta de Salud Rural Coipomo','type'=>13,'code_deis' =>133557,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Inio','alias'=>'Posta de Salud Rural Inio','type'=>13,'code_deis' =>133558,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Butalcura','alias'=>'Posta de Salud Rural Butalcura','type'=>13,'code_deis' =>133559,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural San José','alias'=>'Posta de Salud Rural San José','type'=>13,'code_deis' =>133560,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Chaullín','alias'=>'Posta de Salud Rural Chaullín','type'=>13,'code_deis' =>133561,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Carlina Paillacar','alias'=>'Centro Comunitario de Salud Familiar Carlina Paillacar','type'=>16,'code_deis' =>133703,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Bellavista','alias'=>'Centro Comunitario de Salud Familiar Bellavista','type'=>16,'code_deis' =>133725,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Metahue','alias'=>'Centro Comunitario de Salud Familiar Metahue','type'=>16,'code_deis' =>133740,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Huillinco','alias'=>'Centro Comunitario de Salud Familiar Huillinco','type'=>16,'code_deis' =>133745,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Llau Llao','alias'=>'Centro Comunitario de Salud Familiar Llau Llao','type'=>16,'code_deis' =>133775,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Kintunien','alias'=>'Centro Comunitario de Salud Familiar Kintunien','type'=>16,'code_deis' =>133776,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Rukalaf','alias'=>'Centro Comunitario de Salud Familiar Rukalaf','type'=>16,'code_deis' =>133796,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Vista Hermosa','alias'=>'Centro Comunitario de Salud Familiar Vista Hermosa','type'=>16,'code_deis' =>133797,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico Kenal','alias'=>'Centro Médico Kenal','type'=>8,'code_deis' =>200000,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Labomedic','alias'=>'Laboratorio Clínico Labomedic','type'=>10,'code_deis' =>200001,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico CENTROMED','alias'=>'Centro Médico CENTROMED','type'=>8,'code_deis' =>200002,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Integramédica Talca','alias'=>'Integramédica Talca','type'=>8,'code_deis' =>200003,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Interdial Limitada','alias'=>'Centro de Diálisis Interdial Limitada','type'=>19,'code_deis' =>200004,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Vallenar','alias'=>'Laboratorio Clínico Bionet S.A. - Vallenar','type'=>10,'code_deis' =>200006,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Quillahue','alias'=>'Centro de Salud Familiar Quillahue','type'=>12,'code_deis' =>200009,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Santa Laura','alias'=>'SAPU Santa Laura','type'=>20,'code_deis' =>200010,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'SAPU San Joaquín','alias'=>'SAPU San Joaquín','type'=>20,'code_deis' =>200011,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Diálisis Integral','alias'=>'Centro de Diálisis Integral','type'=>19,'code_deis' =>200012,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Rengo','alias'=>'Centro de Diálisis Rengo','type'=>19,'code_deis' =>200013,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis San Fernando','alias'=>'Centro de Diálisis San Fernando','type'=>19,'code_deis' =>200014,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis San José Chimbarongo','alias'=>'Centro de Diálisis San José Chimbarongo','type'=>19,'code_deis' =>200015,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Santa Cruz','alias'=>'Centro de Diálisis Santa Cruz','type'=>19,'code_deis' =>200016,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis SERDIAL Limitada','alias'=>'Centro de Diálisis SERDIAL Limitada','type'=>19,'code_deis' =>200017,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis DIAL','alias'=>'Centro de Diálisis DIAL','type'=>19,'code_deis' =>200018,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Asociación Chilena de Seguridad Coquimbo','alias'=>'Policlínico de la Asociación Chilena de Seguridad Coquimbo','type'=>8,'code_deis' =>200019,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Clinidial Las Compañías','alias'=>'Centro de Diálisis Clinidial Las Compañías','type'=>19,'code_deis' =>200020,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Servicios Médicos Valparaíso E.I.R.L','alias'=>'Laboratorio Clínico Servicios Médicos Valparaíso E.I.R.L','type'=>10,'code_deis' =>200021,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Arica','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Arica','type'=>8,'code_deis' =>200022,'service' =>2,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Biovida E.I.R.L','alias'=>'Laboratorio Clínico Biovida E.I.R.L','type'=>10,'code_deis' =>200023,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental La Araucana Rancagua','alias'=>'Centro Médico y Dental La Araucana Rancagua','type'=>17,'code_deis' =>200024,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de Asociación Chilena de Seguridad','alias'=>'Policlínico de Asociación Chilena de Seguridad','type'=>8,'code_deis' =>200025,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico MACROLAB','alias'=>'Laboratorio Clínico MACROLAB','type'=>10,'code_deis' =>200026,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Clinica Las Condes de Chicureo (Servicios de Salud Integrados S.A.)','alias'=>'Centro Médico Clinica Las Condes de Chicureo (Servicios de Salud Integrados S.A.)','type'=>8,'code_deis' =>200027,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Asociación Chilena de Seguridad AChS San Javier','alias'=>'Asociación Chilena de Seguridad AChS San Javier','type'=>8,'code_deis' =>200028,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Asociación Chilena de Seguridad AChS Linares','alias'=>'Asociación Chilena de Seguridad AChS Linares','type'=>8,'code_deis' =>200029,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Asociación Chilena de Seguridad AChS Constitución','alias'=>'Asociación Chilena de Seguridad AChS Constitución','type'=>8,'code_deis' =>200030,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Integramédica Bio Bio','alias'=>'Centro Médico Integramédica Bio Bio','type'=>8,'code_deis' =>200031,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico AChS Laja','alias'=>'Policlínico AChS Laja','type'=>8,'code_deis' =>200032,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Asociación Chilena de Seguridad AChS Tocopilla','alias'=>'Policlínico Asociación Chilena de Seguridad AChS Tocopilla','type'=>8,'code_deis' =>200033,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Policíinico Asociación Chilena de Seguridad AChS Calama','alias'=>'Policíinico Asociación Chilena de Seguridad AChS Calama','type'=>8,'code_deis' =>200034,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Asociación Chilena de Seguridad AChS Mejillones','alias'=>'Policlínico Asociación Chilena de Seguridad AChS Mejillones','type'=>8,'code_deis' =>200035,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico AChS Cabrero','alias'=>'Policlínico AChS Cabrero','type'=>8,'code_deis' =>200036,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Elena Caffarena','alias'=>'Centro Comunitario de Salud Familiar Elena Caffarena','type'=>16,'code_deis' =>200037,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Alquihue','alias'=>'Posta de Salud Rural Alquihue','type'=>13,'code_deis' =>200038,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Asociación Chilena de Seguridad AChS La Calera','alias'=>'Asociación Chilena de Seguridad AChS La Calera','type'=>8,'code_deis' =>200039,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis A y R','alias'=>'Centro de Diálisis A y R','type'=>19,'code_deis' =>200040,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'SAPU Libertadores','alias'=>'SAPU Libertadores','type'=>20,'code_deis' =>200041,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Centro 2 de Rancagua','alias'=>'COSAM Centro 2 de Rancagua','type'=>14,'code_deis' =>200042,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Norte Graneros','alias'=>'COSAM Norte Graneros','type'=>14,'code_deis' =>200043,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Sur Doñihue','alias'=>'COSAM Sur Doñihue','type'=>14,'code_deis' =>200044,'service' =>22,'dependency' =>1]);
Organization::Create(['name' => 'Vacunatorio Caledonian','alias'=>'Vacunatorio Caledonian','type'=>18,'code_deis' =>200045,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Diagnóstika','alias'=>'Diagnóstika','type'=>8,'code_deis' =>200046,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio SANALAB S.A.','alias'=>'Laboratorio SANALAB S.A.','type'=>10,'code_deis' =>200047,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Asociación Chilena de Seguridad AChS Arauco','alias'=>'Policlínico Asociación Chilena de Seguridad AChS Arauco','type'=>8,'code_deis' =>200048,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Asociación Chilena de Seguridad AChS Cañete','alias'=>'Policlínico Asociación Chilena de Seguridad AChS Cañete','type'=>8,'code_deis' =>200049,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Hospital Clínico Universidad de Los Andes','alias'=>'Hospital Clínico Universidad de Los Andes','type'=>7,'code_deis' =>200050,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'SAPU Trinidad','alias'=>'SAPU Trinidad','type'=>20,'code_deis' =>200051,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Chaimávida','alias'=>'Centro Comunitario de Salud Familiar Chaimávida','type'=>16,'code_deis' =>200052,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Clínica Ensenada','alias'=>'Clínica Ensenada','type'=>6,'code_deis' =>200053,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Tecnodial Ltda.','alias'=>'Centro de Diálisis Tecnodial Ltda.','type'=>19,'code_deis' =>200054,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Los Ángeles Limitada','alias'=>'Centro de Diálisis Los Ángeles Limitada','type'=>19,'code_deis' =>200055,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis VidaDial Collipulli','alias'=>'Centro de Diálisis VidaDial Collipulli','type'=>19,'code_deis' =>200056,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Villarrica Limitada','alias'=>'Centro de Diálisis Villarrica Limitada','type'=>19,'code_deis' =>200057,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Villarrica Ltda.','alias'=>'Centro de Diálisis Villarrica Ltda.','type'=>19,'code_deis' =>200058,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Araucanía Limitada','alias'=>'Centro de Diálisis Araucanía Limitada','type'=>19,'code_deis' =>200059,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Temuco Ltda.','alias'=>'Centro de Diálisis Temuco Ltda.','type'=>19,'code_deis' =>200060,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Bayo Dial','alias'=>'Centro de Diálisis Bayo Dial','type'=>19,'code_deis' =>200061,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Angol Dial Ltda.','alias'=>'Centro de Diálisis Angol Dial Ltda.','type'=>19,'code_deis' =>200062,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Alemana de La Dehesa','alias'=>'Clínica Alemana de La Dehesa','type'=>6,'code_deis' =>200063,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Integramédica Mall Plaza Sur','alias'=>'Integramédica Mall Plaza Sur','type'=>8,'code_deis' =>200064,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Docente Asistencial Universidad San Sebastián','alias'=>'Centro Médico Docente Asistencial Universidad San Sebastián','type'=>8,'code_deis' =>200065,'service' =>37,'dependency' =>4]);
Organization::Create(['name' => 'Sección Sanidad Puerto Montt de la Policía de Investigaciones de Chile','alias'=>'Sección Sanidad Puerto Montt de la Policía de Investigaciones de Chile','type'=>8,'code_deis' =>200066,'service' =>37,'dependency' =>5]);
Organization::Create(['name' => 'Policlínico de la Mutual de Seguridad CChC Quellón','alias'=>'Policlínico de la Mutual de Seguridad CChC Quellón','type'=>8,'code_deis' =>200067,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Mutual de Seguridad CChC Castro','alias'=>'Policlínico de la Mutual de Seguridad CChC Castro','type'=>8,'code_deis' =>200068,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de Funcionarios de la Universidad de Los Lagos','alias'=>'Policlínico de Funcionarios de la Universidad de Los Lagos','type'=>8,'code_deis' =>200069,'service' =>37,'dependency' =>4]);
Organization::Create(['name' => 'Centro Médico Osorno Salud','alias'=>'Centro Médico Osorno Salud','type'=>8,'code_deis' =>200070,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de la Mutual de Seguridad CChC Ancud','alias'=>'Policlínico de la Mutual de Seguridad CChC Ancud','type'=>8,'code_deis' =>200071,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Villa Magisterio','alias'=>'Centro de Salud Familiar Villa Magisterio','type'=>12,'code_deis' =>200072,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Medicina Integral y Ejercicio','alias'=>'Centro de Salud Medicina Integral y Ejercicio','type'=>8,'code_deis' =>200073,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Sangre Austral','alias'=>'Centro de Sangre Austral','type'=>24,'code_deis' =>200074,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Familiar San Vicente de Tagua Tagua','alias'=>'Centro de Salud Familiar San Vicente de Tagua Tagua','type'=>12,'code_deis' =>200075,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Hospital de Chaitén','alias'=>'Hospital de Chaitén','type'=>22,'code_deis' =>200076,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'SAPU Dr. Juan Cartes Arias','alias'=>'SAPU Dr. Juan Cartes Arias','type'=>20,'code_deis' =>200077,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Vacunatorio Estudio Pediátrico Integral','alias'=>'Vacunatorio Estudio Pediátrico Integral','type'=>18,'code_deis' =>200078,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Curicó','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Curicó','type'=>8,'code_deis' =>200079,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico La Reina','alias'=>'Centro Odontológico La Reina','type'=>12,'code_deis' =>200080,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Clínica Orema','alias'=>'Clínica Orema','type'=>6,'code_deis' =>200081,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Posta de Salud Rural Chauchil','alias'=>'Posta de Salud Rural Chauchil','type'=>13,'code_deis' =>200082,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Laboratorio Clínico Centro Médico Traiguén','alias'=>'Laboratorio Clínico Centro Médico Traiguén','type'=>10,'code_deis' =>200083,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico MasterLab','alias'=>'Laboratorio Clínico MasterLab','type'=>10,'code_deis' =>200084,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'SAPU Dr. Marcelo Lopetegui Adams','alias'=>'SAPU Dr. Marcelo Lopetegui Adams','type'=>20,'code_deis' =>200085,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'SAPU La Floresta','alias'=>'SAPU La Floresta','type'=>20,'code_deis' =>200086,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Vacunatorio Home Nursing','alias'=>'Vacunatorio Home Nursing','type'=>18,'code_deis' =>200087,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Integramédica Florida Vespucio','alias'=>'Integramédica Florida Vespucio','type'=>8,'code_deis' =>200088,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Integramédica Santa Lucía','alias'=>'Integramédica Santa Lucía','type'=>8,'code_deis' =>200089,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Policenter','alias'=>'Clínica Policenter','type'=>6,'code_deis' =>200090,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Mirandes S.P.A.','alias'=>'Mirandes S.P.A.','type'=>6,'code_deis' =>200091,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Posta de Salud Rural Cayumapu','alias'=>'Posta de Salud Rural Cayumapu','type'=>13,'code_deis' =>200093,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Marco Antonio Carvajal Moreno','alias'=>'SAPU Marco Antonio Carvajal Moreno','type'=>20,'code_deis' =>200094,'service' =>1,'dependency' =>6]);
Organization::Create(['name' => 'SAR EU Iris Véliz Hume','alias'=>'SAR EU Iris Véliz Hume','type'=>20,'code_deis' =>200095,'service' =>1,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Huara','alias'=>'SAPU Huara','type'=>20,'code_deis' =>200096,'service' =>3,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Central Oriente de Antofagasta','alias'=>'SAPU Central Oriente de Antofagasta','type'=>20,'code_deis' =>200097,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Centro Sur de Antofagasta','alias'=>'SAPU Centro Sur de Antofagasta','type'=>20,'code_deis' =>200098,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Baquedano','alias'=>'SAPU Baquedano','type'=>20,'code_deis' =>200099,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Bernardo Mellibovsky','alias'=>'SAPU Dr. Bernardo Mellibovsky','type'=>20,'code_deis' =>200100,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Joan Crawford Astudillo','alias'=>'SAPU Joan Crawford Astudillo','type'=>20,'code_deis' =>200101,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Paipote','alias'=>'SAPU Paipote','type'=>20,'code_deis' =>200102,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Rosario Corvalán','alias'=>'SAPU Rosario Corvalán','type'=>20,'code_deis' =>200103,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'SAPU El Palomar','alias'=>'SAPU El Palomar','type'=>20,'code_deis' =>200104,'service' =>7,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Juan Pablo II','alias'=>'SAPU Juan Pablo II','type'=>20,'code_deis' =>200105,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Barrancas','alias'=>'SAPU Barrancas','type'=>20,'code_deis' =>200106,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Diputado Manuel Bustos Huerta','alias'=>'SAPU Diputado Manuel Bustos Huerta','type'=>20,'code_deis' =>200107,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Marcelo Mena','alias'=>'SAPU Marcelo Mena','type'=>20,'code_deis' =>200108,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Reina Isabel II','alias'=>'SAPU Reina Isabel II','type'=>20,'code_deis' =>200109,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Gómez Carreño','alias'=>'SAPU Gómez Carreño','type'=>20,'code_deis' =>200110,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Las Torres','alias'=>'SAPU Las Torres','type'=>20,'code_deis' =>200111,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Pompeya','alias'=>'SAPU Pompeya','type'=>20,'code_deis' =>200112,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Reñaca Alto','alias'=>'SAPU Reñaca Alto','type'=>20,'code_deis' =>200113,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU San Pedro','alias'=>'SAPU San Pedro','type'=>20,'code_deis' =>200114,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Quillota','alias'=>'SAPU Quillota','type'=>20,'code_deis' =>200115,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Centenario','alias'=>'SAPU Centenario','type'=>20,'code_deis' =>200116,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Padre Vicente Irarrázabal','alias'=>'SAPU Padre Vicente Irarrázabal','type'=>20,'code_deis' =>200117,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'SAPU Luis Chavarría','alias'=>'SAPU Luis Chavarría','type'=>20,'code_deis' =>200118,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Alberto Allende Jones','alias'=>'SAPU Dr. Alberto Allende Jones','type'=>20,'code_deis' =>200119,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Arturo Albertz','alias'=>'SAPU Dr. Arturo Albertz','type'=>20,'code_deis' =>200120,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Avendaño','alias'=>'SAPU Dr. Avendaño','type'=>20,'code_deis' =>200121,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Fernando Monckeberg','alias'=>'SAPU Dr. Fernando Monckeberg','type'=>20,'code_deis' =>200122,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Francisco Boris Soler','alias'=>'SAPU Dr. Francisco Boris Soler','type'=>20,'code_deis' =>200123,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Gustavo Molina','alias'=>'SAPU Dr. Gustavo Molina','type'=>20,'code_deis' =>200124,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAR Dr. Raúl Yazigi','alias'=>'SAR Dr. Raúl Yazigi','type'=>20,'code_deis' =>200125,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Garín','alias'=>'SAPU Garín','type'=>20,'code_deis' =>200126,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Isla de Maipo','alias'=>'SAPU Isla de Maipo','type'=>20,'code_deis' =>200127,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Lo Franco','alias'=>'SAPU Lo Franco','type'=>20,'code_deis' =>200128,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Pablo Neruda','alias'=>'SAPU Pablo Neruda','type'=>20,'code_deis' =>200129,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Peñaflor','alias'=>'SAPU Peñaflor','type'=>20,'code_deis' =>200130,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Violeta Parra','alias'=>'SAPU Violeta Parra','type'=>20,'code_deis' =>200131,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU María Pinto','alias'=>'SAPU María Pinto','type'=>20,'code_deis' =>200132,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Bicentenario','alias'=>'SAPU Bicentenario','type'=>20,'code_deis' =>200133,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Adalberto Steeger','alias'=>'SAPU Dr. Adalberto Steeger','type'=>20,'code_deis' =>200134,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Edelberto Elgueta','alias'=>'SAPU Dr. Edelberto Elgueta','type'=>20,'code_deis' =>200135,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU El Monte','alias'=>'SAPU El Monte','type'=>20,'code_deis' =>200136,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Huamachuco','alias'=>'SAPU Huamachuco','type'=>20,'code_deis' =>200137,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAR La Estrella','alias'=>'SAR La Estrella','type'=>20,'code_deis' =>200138,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Pudahuel Poniente','alias'=>'SAPU Pudahuel Poniente','type'=>20,'code_deis' =>200139,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Santa Anita','alias'=>'SAPU Santa Anita','type'=>20,'code_deis' =>200140,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Iván Insunza','alias'=>'SAPU Dr. Iván Insunza','type'=>20,'code_deis' =>200141,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'SAPU La Reina','alias'=>'SAPU La Reina','type'=>20,'code_deis' =>200142,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Aguilucho','alias'=>'SAPU Aguilucho','type'=>20,'code_deis' =>200143,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAPU José Alvo','alias'=>'SAPU José Alvo','type'=>20,'code_deis' =>200144,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Centro','alias'=>'SAPU Centro','type'=>20,'code_deis' =>200145,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Ignacio Caroca','alias'=>'SAPU Ignacio Caroca','type'=>20,'code_deis' =>200146,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Rosario','alias'=>'SAPU Rosario','type'=>20,'code_deis' =>200147,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Valentín Letelier','alias'=>'SAPU Valentín Letelier','type'=>20,'code_deis' =>200148,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Isabel Riquelme','alias'=>'SAPU Isabel Riquelme','type'=>20,'code_deis' =>200149,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'SAR Víctor Manuel Fernández','alias'=>'SAR Víctor Manuel Fernández','type'=>20,'code_deis' =>200150,'service' =>28,'dependency' =>1]);
Organization::Create(['name' => 'SAPU Bellavista','alias'=>'SAPU Bellavista','type'=>20,'code_deis' =>200151,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Amanecer','alias'=>'SAPU Amanecer','type'=>20,'code_deis' =>200152,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Pucón','alias'=>'SAPU Pucón','type'=>20,'code_deis' =>200153,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Pueblo Nuevo','alias'=>'SAPU Pueblo Nuevo','type'=>20,'code_deis' =>200154,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Freire','alias'=>'SAPU Freire','type'=>20,'code_deis' =>200155,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAR Labranza','alias'=>'SAR Labranza','type'=>20,'code_deis' =>200156,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Los Volcanes','alias'=>'SAPU Los Volcanes','type'=>20,'code_deis' =>200157,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Nueva Imperial','alias'=>'SAPU Nueva Imperial','type'=>20,'code_deis' =>200158,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Pedro de Valdivia','alias'=>'SAPU Pedro de Valdivia','type'=>20,'code_deis' =>200159,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Pulmahue','alias'=>'SAPU Pulmahue','type'=>20,'code_deis' =>200160,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Villa Alegre','alias'=>'SAPU Villa Alegre','type'=>20,'code_deis' =>200161,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Villarica','alias'=>'SAPU Villarica','type'=>20,'code_deis' =>200162,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Belarmina Paredes','alias'=>'SAPU Belarmina Paredes','type'=>20,'code_deis' =>200163,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Ranco','alias'=>'SAPU Ranco','type'=>20,'code_deis' =>200164,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Niebla','alias'=>'SAPU Niebla','type'=>20,'code_deis' =>200165,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Panguipulli','alias'=>'SAPU Panguipulli','type'=>20,'code_deis' =>200166,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Carmela Carvajal','alias'=>'SAPU Carmela Carvajal','type'=>20,'code_deis' =>200167,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Frutillar','alias'=>'SAPU Frutillar','type'=>20,'code_deis' =>200168,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Los Muermos','alias'=>'SAPU Los Muermos','type'=>20,'code_deis' =>200169,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Dr. Alejandro Gutiérrez','alias'=>'SAPU Dr. Alejandro Gutiérrez','type'=>20,'code_deis' =>200170,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'SAPU 18 de Septiembre','alias'=>'SAPU 18 de Septiembre','type'=>20,'code_deis' =>200171,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Eleuterio Ramírez','alias'=>'SAPU Eleuterio Ramírez','type'=>20,'code_deis' =>200172,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'SAR Los Álamos','alias'=>'SAR Los Álamos','type'=>20,'code_deis' =>200173,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Huequén','alias'=>'SAPU Huequén','type'=>20,'code_deis' =>200174,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'SAR Victoria','alias'=>'SAR Victoria','type'=>20,'code_deis' =>200175,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Castro','alias'=>'SAPU Castro','type'=>20,'code_deis' =>200176,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'SAPU 2 Septiembre','alias'=>'SAPU 2 Septiembre','type'=>20,'code_deis' =>200177,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Nororiente','alias'=>'SAPU Nororiente','type'=>20,'code_deis' =>200178,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Nuevo Horizonte','alias'=>'SAPU Nuevo Horizonte','type'=>20,'code_deis' =>200179,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico Lifemed','alias'=>'Centro Médico Lifemed','type'=>8,'code_deis' =>200180,'service' =>2,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Ehrlich Ltda','alias'=>'Centro de Diálisis Ehrlich Ltda','type'=>19,'code_deis' =>200181,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'SAPU Tierras Blancas II','alias'=>'SAPU Tierras Blancas II','type'=>20,'code_deis' =>200182,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar El Carmen','alias'=>'Centro de Salud Familiar El Carmen','type'=>12,'code_deis' =>200183,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico Fermín Roca','alias'=>'Centro Médico Fermín Roca','type'=>18,'code_deis' =>200187,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Especialidades Odontológicas Leng','alias'=>'Centro de Especialidades Odontológicas Leng','type'=>12,'code_deis' =>200188,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'SAR Enfermera Sofía Pincheira','alias'=>'SAR Enfermera Sofía Pincheira','type'=>20,'code_deis' =>200189,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Policlínico Centro de Cumplimiento Penitenciario Iquique','alias'=>'Policlínico Centro de Cumplimiento Penitenciario Iquique','type'=>8,'code_deis' =>200190,'service' =>4,'dependency' =>4]);
Organization::Create(['name' => 'Policlínico de Atención Primaria del Centro de Detención Preventiva de Pozo Almonte','alias'=>'Policlínico de Atención Primaria del Centro de Detención Preventiva de Pozo Almonte','type'=>8,'code_deis' =>200191,'service' =>4,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Diálisis Hemosur (Osorno)','alias'=>'Centro de Diálisis Hemosur (Osorno)','type'=>19,'code_deis' =>200192,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Clínica WLK','alias'=>'Clínica WLK','type'=>6,'code_deis' =>200193,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Loncomilla','alias'=>'Laboratorio Clínico Loncomilla','type'=>10,'code_deis' =>200194,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Fundación Betania','alias'=>'Laboratorio Clínico Fundación Betania','type'=>10,'code_deis' =>200195,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Loncomilla (Talca)','alias'=>'Laboratorio Clínico Loncomilla (Talca)','type'=>10,'code_deis' =>200196,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico HTS SpA','alias'=>'Centro Médico HTS SpA','type'=>8,'code_deis' =>200198,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Talca','alias'=>'Laboratorio Clínico Talca','type'=>10,'code_deis' =>200199,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'COSAM San José de Maipo','alias'=>'COSAM San José de Maipo','type'=>14,'code_deis' =>200200,'service' =>21,'dependency' =>1]);
Organization::Create(['name' => 'Laboratorio Clínico Bioanálysis','alias'=>'Laboratorio Clínico Bioanálysis','type'=>10,'code_deis' =>200201,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio - Clínica Bilbao','alias'=>'Vacunatorio - Clínica Bilbao','type'=>18,'code_deis' =>200202,'service' =>40,'dependency' =>3]);
Organization::Create(['name' => 'Crystal Lab Scientific Diagnostics','alias'=>'Crystal Lab Scientific Diagnostics','type'=>10,'code_deis' =>200203,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Renacer','alias'=>'Centro de Diálisis Renacer','type'=>19,'code_deis' =>200204,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Santa Catalina','alias'=>'Centro Médico y Dental Santa Catalina','type'=>17,'code_deis' =>200205,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio y Sala de Procedimientos Margaret Meneses Meneses','alias'=>'Vacunatorio y Sala de Procedimientos Margaret Meneses Meneses','type'=>27,'code_deis' =>200206,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Conun Huenu','alias'=>'Centro de Salud Familiar Conun Huenu','type'=>12,'code_deis' =>200207,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Vacunatorio Sociedad de Enfermería Asistencial E.I.R.L','alias'=>'Vacunatorio Sociedad de Enfermería Asistencial E.I.R.L','type'=>18,'code_deis' =>200208,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'COSAM Rahue','alias'=>'COSAM Rahue','type'=>14,'code_deis' =>200209,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Coñimo','alias'=>'Centro Comunitario de Salud Familiar Coñimo','type'=>16,'code_deis' =>200210,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Vacunatorio Labonort Salud Integral','alias'=>'Vacunatorio Labonort Salud Integral','type'=>18,'code_deis' =>200211,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Talca','alias'=>'Laboratorio Clínico Bionet S.A. - Talca','type'=>10,'code_deis' =>200212,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Medinort Salud Ocupacional e Integral S.A.','alias'=>'Laboratorio Medinort Salud Ocupacional e Integral S.A.','type'=>10,'code_deis' =>200213,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'INMUNIN SpA','alias'=>'INMUNIN SpA','type'=>18,'code_deis' =>200214,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Megasalud Quilicura','alias'=>'Centro Médico y Dental Megasalud Quilicura','type'=>17,'code_deis' =>200215,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Dra. Maria Cristina Rojas Neumann','alias'=>'Centro de Salud Familiar Dra. Maria Cristina Rojas Neumann','type'=>12,'code_deis' =>200216,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Laboratorio Clínico Médicos Asociados de Curicó','alias'=>'Laboratorio Clínico Médicos Asociados de Curicó','type'=>10,'code_deis' =>200217,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Clínica Hospital Profesor','alias'=>'Centro Médico Clínica Hospital Profesor','type'=>8,'code_deis' =>200218,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Raúl Sánchez Bañados','alias'=>'Centro de Salud Familiar Raúl Sánchez Bañados','type'=>12,'code_deis' =>200219,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Policlínico ACHS Curanilahue','alias'=>'Policlínico ACHS Curanilahue','type'=>8,'code_deis' =>200220,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Dental CMPC Maderas S.A.','alias'=>'Clínica Dental CMPC Maderas S.A.','type'=>9,'code_deis' =>200221,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Consultorio Santa María Josefa','alias'=>'Consultorio Santa María Josefa','type'=>8,'code_deis' =>200222,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Megasalud S.A.','alias'=>'Laboratorio Clínico Megasalud S.A.','type'=>10,'code_deis' =>200223,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Integramédica Rancagua','alias'=>'Integramédica Rancagua','type'=>8,'code_deis' =>200224,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Posta de Salud Rural Esmeralda','alias'=>'Posta de Salud Rural Esmeralda','type'=>13,'code_deis' =>200225,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico y Dental ISP','alias'=>'Centro Médico y Dental ISP','type'=>17,'code_deis' =>200226,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Clínica Psiquiátrica Mida','alias'=>'Clínica Psiquiátrica Mida','type'=>6,'code_deis' =>200227,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Servicio de Bienestar MOP','alias'=>'Centro Médico y Dental Servicio de Bienestar MOP','type'=>17,'code_deis' =>200228,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Diálisis Nephrocare Los Ríos','alias'=>'Centro de Diálisis Nephrocare Los Ríos','type'=>19,'code_deis' =>200229,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Valdivia','alias'=>'Centro de Diálisis Valdivia','type'=>19,'code_deis' =>200230,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Instituto Teletón Aysén','alias'=>'Instituto Teletón Aysén','type'=>8,'code_deis' =>200231,'service' =>40,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar San Máximo','alias'=>'Centro Comunitario de Salud Familiar San Máximo','type'=>16,'code_deis' =>200232,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa Francia','alias'=>'Centro Comunitario de Salud Familiar Villa Francia','type'=>16,'code_deis' =>200233,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Clínica MEDS La Dehesa','alias'=>'Clínica MEDS La Dehesa','type'=>6,'code_deis' =>200234,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Guacamayo','alias'=>'Centro Comunitario de Salud Familiar Guacamayo','type'=>16,'code_deis' =>200235,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa Olímpica','alias'=>'Centro Comunitario de Salud Familiar Villa Olímpica','type'=>16,'code_deis' =>200236,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro Clínico San Bernardo','alias'=>'Centro Clínico San Bernardo','type'=>8,'code_deis' =>200237,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico de Nueva Clínica Tarapacá','alias'=>'Laboratorio Clínico de Nueva Clínica Tarapacá','type'=>10,'code_deis' =>200238,'service' =>4,'dependency' =>3]);
Organization::Create(['name' => 'Instituto Teletón Iquique','alias'=>'Instituto Teletón Iquique','type'=>8,'code_deis' =>200239,'service' =>4,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Imagenología Médica Imagensalud','alias'=>'Centro de Imagenología Médica Imagensalud','type'=>8,'code_deis' =>200240,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Oasis','alias'=>'Centro Comunitario de Salud Familiar Oasis','type'=>16,'code_deis' =>200241,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Diálisis Nephrocare Padre Las Casas','alias'=>'Centro de Diálisis Nephrocare Padre Las Casas','type'=>19,'code_deis' =>200242,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Cabrero','alias'=>'Centro Comunitario de Salud Familiar Cabrero','type'=>16,'code_deis' =>200243,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Instituto Teletón Temuco','alias'=>'Instituto Teletón Temuco','type'=>8,'code_deis' =>200244,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Instituto Teletón Antofagasta','alias'=>'Instituto Teletón Antofagasta','type'=>8,'code_deis' =>200245,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico UC Temuco','alias'=>'Laboratorio Clínico UC Temuco','type'=>10,'code_deis' =>200246,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Austral E.I.R.L.','alias'=>'Vacunatorio Austral E.I.R.L.','type'=>18,'code_deis' =>200247,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'CDR de Adultos Mayores con Demencia','alias'=>'CDR de Adultos Mayores con Demencia','type'=>15,'code_deis' =>200248,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Instituto Teletón Del Maule','alias'=>'Instituto Teletón Del Maule','type'=>8,'code_deis' =>200249,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Máfil','alias'=>'Centro Comunitario de Salud Familiar Máfil','type'=>16,'code_deis' =>200250,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Esmeralda','alias'=>'Centro de Salud Esmeralda','type'=>8,'code_deis' =>200251,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud La Araucana Salud','alias'=>'Centro de Salud La Araucana Salud','type'=>8,'code_deis' =>200252,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud La Araucana Salud','alias'=>'Centro de Salud La Araucana Salud','type'=>8,'code_deis' =>200253,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Kausay','alias'=>'Laboratorio Clínico Kausay','type'=>10,'code_deis' =>200254,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Nephrocare Linares','alias'=>'Centro de Diálisis Nephrocare Linares','type'=>19,'code_deis' =>200255,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'COSAM Coyhaique','alias'=>'COSAM Coyhaique','type'=>14,'code_deis' =>200256,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Diálisis Nefrodial','alias'=>'Centro de Diálisis Nefrodial','type'=>19,'code_deis' =>200257,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Copihues','alias'=>'Centro Comunitario de Salud Familiar Los Copihues','type'=>16,'code_deis' =>200258,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Santa Bárbara','alias'=>'Centro Comunitario de Salud Familiar Santa Bárbara','type'=>16,'code_deis' =>200259,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico Vida Rengo','alias'=>'Centro Médico Vida Rengo','type'=>8,'code_deis' =>200260,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Doña Isabel','alias'=>'Centro Comunitario de Salud Familiar Doña Isabel','type'=>16,'code_deis' =>200261,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'Policlínico Universidad Pedro de Valdivia','alias'=>'Policlínico Universidad Pedro de Valdivia','type'=>8,'code_deis' =>200262,'service' =>10,'dependency' =>4]);
Organization::Create(['name' => 'Laboratorio Clínico Cegnos','alias'=>'Laboratorio Clínico Cegnos','type'=>10,'code_deis' =>200263,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Santa Teresa','alias'=>'Centro Comunitario de Salud Familiar Santa Teresa','type'=>16,'code_deis' =>200264,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Andacollo','alias'=>'Centro Comunitario de Salud Familiar Andacollo','type'=>16,'code_deis' =>200265,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Buenos Aires','alias'=>'Centro Comunitario de Salud Familiar Buenos Aires','type'=>16,'code_deis' =>200266,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Laja','alias'=>'Centro Comunitario de Salud Familiar Laja','type'=>16,'code_deis' =>200267,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'SAR Plan de Valparaíso','alias'=>'SAR Plan de Valparaíso','type'=>20,'code_deis' =>200268,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Laboratorio Clínico Megasalud Temuco','alias'=>'Laboratorio Clínico Megasalud Temuco','type'=>10,'code_deis' =>200269,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Santa Mónica','alias'=>'Centro Comunitario de Salud Familiar Santa Mónica','type'=>16,'code_deis' =>200270,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'COSAM La Calera','alias'=>'COSAM La Calera','type'=>14,'code_deis' =>200271,'service' =>13,'dependency' =>1]);
Organization::Create(['name' => 'Policlínico Gendarmería Regional de Antofagasta','alias'=>'Policlínico Gendarmería Regional de Antofagasta','type'=>8,'code_deis' =>200272,'service' =>6,'dependency' =>4]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Punta Mira','alias'=>'Centro Comunitario de Salud Familiar Punta Mira','type'=>16,'code_deis' =>200273,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Policlínico Centro de Cumplimiento Penitenciario Femenino de Talca','alias'=>'Policlínico Centro de Cumplimiento Penitenciario Femenino de Talca','type'=>8,'code_deis' =>200274,'service' =>25,'dependency' =>4]);
Organization::Create(['name' => 'Policlínico Centro de Cumplimiento Penitenciario de Talca','alias'=>'Policlínico Centro de Cumplimiento Penitenciario de Talca','type'=>8,'code_deis' =>200275,'service' =>25,'dependency' =>4]);
Organization::Create(['name' => 'Policlínico de Funcionarios de Gendarmería de Chile - Talca','alias'=>'Policlínico de Funcionarios de Gendarmería de Chile - Talca','type'=>8,'code_deis' =>200276,'service' =>25,'dependency' =>4]);
Organization::Create(['name' => 'Policlínico Centro de Cumplimiento Penitenciario de Cauquenes','alias'=>'Policlínico Centro de Cumplimiento Penitenciario de Cauquenes','type'=>8,'code_deis' =>200277,'service' =>25,'dependency' =>4]);
Organization::Create(['name' => 'Policlínico Centro de Cumplimiento Penitenciario de Curicó','alias'=>'Policlínico Centro de Cumplimiento Penitenciario de Curicó','type'=>8,'code_deis' =>200278,'service' =>25,'dependency' =>4]);
Organization::Create(['name' => 'Policlínico Centro de Cumplimiento Penitenciario de Linares','alias'=>'Policlínico Centro de Cumplimiento Penitenciario de Linares','type'=>8,'code_deis' =>200279,'service' =>25,'dependency' =>4]);
Organization::Create(['name' => 'Laboratorio Clínico DESAM Puerto Montt','alias'=>'Laboratorio Clínico DESAM Puerto Montt','type'=>10,'code_deis' =>200280,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico Docente Asistencial Universidad San Sebastián','alias'=>'Centro Médico Docente Asistencial Universidad San Sebastián','type'=>8,'code_deis' =>200281,'service' =>35,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Referencia de Salud Hospital Provincia Cordillera','alias'=>'Centro de Referencia de Salud Hospital Provincia Cordillera','type'=>25,'code_deis' =>200282,'service' =>21,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Parque Central','alias'=>'Centro Comunitario de Salud Familiar Parque Central','type'=>16,'code_deis' =>200283,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa Centinela','alias'=>'Centro Comunitario de Salud Familiar Villa Centinela','type'=>16,'code_deis' =>200284,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Ríos de Chile','alias'=>'Centro Comunitario de Salud Familiar Ríos de Chile','type'=>16,'code_deis' =>200285,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico Docente Asistencial Universidad Santo Tomás','alias'=>'Centro Médico Docente Asistencial Universidad Santo Tomás','type'=>8,'code_deis' =>200286,'service' =>35,'dependency' =>4]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Punta de Parra','alias'=>'Centro Comunitario de Salud Familiar Punta de Parra','type'=>16,'code_deis' =>200287,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Paniahue','alias'=>'Centro Comunitario de Salud Familiar Paniahue','type'=>16,'code_deis' =>200288,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Norte','alias'=>'COSAM Norte','type'=>14,'code_deis' =>200289,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Alto','alias'=>'Centro Comunitario de Salud Familiar El Alto','type'=>16,'code_deis' =>200290,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Vacunatorio Ad Hominem','alias'=>'Vacunatorio Ad Hominem','type'=>18,'code_deis' =>200291,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Puerta Sur','alias'=>'Centro Comunitario de Salud Familiar Puerta Sur','type'=>16,'code_deis' =>200292,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Ruta Norte','alias'=>'Centro Comunitario de Salud Familiar Ruta Norte','type'=>16,'code_deis' =>200293,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico Manuel Montt ex Centro Clínico Integral Las Lilas','alias'=>'Centro Médico Manuel Montt ex Centro Clínico Integral Las Lilas','type'=>8,'code_deis' =>200294,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Sanitos Vacunatorio y Centro de Salud Integral','alias'=>'Sanitos Vacunatorio y Centro de Salud Integral','type'=>18,'code_deis' =>200295,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Centro Médico Clínica Linares','alias'=>'Vacunatorio Centro Médico Clínica Linares','type'=>18,'code_deis' =>200296,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Puerto Montt','alias'=>'Centro Odontológico Uno Salud Dental Puerto Montt','type'=>9,'code_deis' =>200297,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Medicenter Puerto Montt','alias'=>'Centro Médico Medicenter Puerto Montt','type'=>8,'code_deis' =>200298,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Dr. Alberto Daiber','alias'=>'Centro Comunitario de Salud Familiar Dr. Alberto Daiber','type'=>16,'code_deis' =>200299,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Odontológico Uno Saluld Dental Valdivia','alias'=>'Centro Odontológico Uno Saluld Dental Valdivia','type'=>9,'code_deis' =>200300,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Saluld Dental Valparaíso','alias'=>'Centro Odontológico Uno Saluld Dental Valparaíso','type'=>9,'code_deis' =>200301,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Viña del Mar','alias'=>'Centro Odontológico Uno Salud Dental Viña del Mar','type'=>9,'code_deis' =>200302,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Folilco','alias'=>'Centro Comunitario de Salud Familiar Folilco','type'=>16,'code_deis' =>200303,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Beato Padre Hurtado','alias'=>'Centro Comunitario de Salud Familiar Beato Padre Hurtado','type'=>16,'code_deis' =>200304,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Vacunatorio y Sala de Procedimientos Daniela Alvarez','alias'=>'Vacunatorio y Sala de Procedimientos Daniela Alvarez','type'=>18,'code_deis' =>200305,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Integramédica Viña del Mar','alias'=>'Integramédica Viña del Mar','type'=>8,'code_deis' =>200306,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Laboclin','alias'=>'Laboratorio Clínico Laboclin','type'=>10,'code_deis' =>200307,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico - PDI','alias'=>'Centro Médico - PDI','type'=>8,'code_deis' =>200308,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Policlínico Institucional de Gendarmería de Chile (Puerto Montt)','alias'=>'Policlínico Institucional de Gendarmería de Chile (Puerto Montt)','type'=>8,'code_deis' =>200309,'service' =>37,'dependency' =>4]);
Organization::Create(['name' => 'Integramédica Sucursal Plaza Egaña','alias'=>'Integramédica Sucursal Plaza Egaña','type'=>8,'code_deis' =>200310,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Dr. Juan Damianovic','alias'=>'Centro Comunitario de Salud Familiar Dr. Juan Damianovic','type'=>16,'code_deis' =>200311,'service' =>41,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Entre Ríos','alias'=>'Centro de Salud Familiar Entre Ríos','type'=>12,'code_deis' =>200312,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Vacunatorio Pharmavisan','alias'=>'Vacunatorio Pharmavisan','type'=>18,'code_deis' =>200313,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio RENVAC','alias'=>'Vacunatorio RENVAC','type'=>18,'code_deis' =>200314,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Novalab Chile','alias'=>'Laboratorio Clínico Novalab Chile','type'=>10,'code_deis' =>200315,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Austral','alias'=>'Laboratorio Clínico Austral','type'=>10,'code_deis' =>200316,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Vitacura','alias'=>'Centro Odontológico Uno Salud Dental Vitacura','type'=>9,'code_deis' =>200317,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Las Condes','alias'=>'Centro Odontológico Uno Salud Dental Las Condes','type'=>9,'code_deis' =>200318,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental San Miguel','alias'=>'Centro Odontológico Uno Salud Dental San Miguel','type'=>9,'code_deis' =>200319,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Teatinos','alias'=>'Centro Odontológico Uno Salud Dental Teatinos','type'=>9,'code_deis' =>200320,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Puente Alto','alias'=>'Centro Odontológico Uno Salud Dental Puente Alto','type'=>9,'code_deis' =>200321,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Providencia','alias'=>'Centro Odontológico Uno Salud Dental Providencia','type'=>9,'code_deis' =>200322,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Merced','alias'=>'Centro Odontológico Uno Salud Dental Merced','type'=>9,'code_deis' =>200323,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental La Reina','alias'=>'Centro Odontológico Uno Salud Dental La Reina','type'=>9,'code_deis' =>200324,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Hernando de Aguirre','alias'=>'Centro Odontológico Uno Salud Dental Hernando de Aguirre','type'=>9,'code_deis' =>200325,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Maipú','alias'=>'Centro Odontológico Uno Salud Dental Maipú','type'=>9,'code_deis' =>200326,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental La Concepción','alias'=>'Centro Odontológico Uno Salud Dental La Concepción','type'=>9,'code_deis' =>200327,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental San Bernardo','alias'=>'Centro Odontológico Uno Salud Dental San Bernardo','type'=>9,'code_deis' =>200328,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Santa Lucía','alias'=>'Centro Odontológico Uno Salud Dental Santa Lucía','type'=>9,'code_deis' =>200329,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Moneda','alias'=>'Centro Odontológico Uno Salud Dental Moneda','type'=>9,'code_deis' =>200330,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental La Florida','alias'=>'Centro Odontológico Uno Salud Dental La Florida','type'=>9,'code_deis' =>200331,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Ñuñoa','alias'=>'Centro Odontológico Uno Salud Dental Ñuñoa','type'=>9,'code_deis' =>200332,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Estación Central','alias'=>'Centro Odontológico Uno Salud Dental Estación Central','type'=>9,'code_deis' =>200333,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental La Cisterna','alias'=>'Centro Odontológico Uno Salud Dental La Cisterna','type'=>9,'code_deis' =>200334,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar La Tortuga','alias'=>'CECOSF La Tortuga','type'=>16,'code_deis' =>200335,'service' =>3,'dependency' =>6]);
Organization::Create(['name' => 'Hospital de día Infanto Adolescente','alias'=>'Hospital de día Infanto Adolescente','type'=>29,'code_deis' =>200336,'service' =>38,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Martín Henríquez','alias'=>'Centro Comunitario de Salud Familiar Martín Henríquez','type'=>16,'code_deis' =>200337,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Instituto Teletón Valdivia','alias'=>'Instituto Teletón Valdivia','type'=>8,'code_deis' =>200338,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Referencia de Salud Municipal','alias'=>'Centro de Referencia de Salud Municipal','type'=>25,'code_deis' =>200339,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Chacarillas','alias'=>'Centro Comunitario de Salud Familiar Chacarillas','type'=>16,'code_deis' =>200340,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Domingo Asún Salazar','alias'=>'COSAM Domingo Asún Salazar','type'=>14,'code_deis' =>200341,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Plaza México','alias'=>'Centro Comunitario de Salud Familiar Plaza México','type'=>16,'code_deis' =>200342,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Laboratorio Clínico el Bosque','alias'=>'Laboratorio Clínico el Bosque','type'=>10,'code_deis' =>200343,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Valparaíso Ltda.','alias'=>'Laboratorio Clínico Valparaíso Ltda.','type'=>10,'code_deis' =>200344,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Estación Las Coimas','alias'=>'Centro Comunitario de Salud Familiar Estación Las Coimas','type'=>16,'code_deis' =>200345,'service' =>14,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Buzeta','alias'=>'Centro Comunitario de Salud Familiar Buzeta','type'=>16,'code_deis' =>200346,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Alberto Bachelet','alias'=>'Centro Comunitario de Salud Familiar Alberto Bachelet','type'=>16,'code_deis' =>200347,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SAR Alemania','alias'=>'SAR Alemania','type'=>20,'code_deis' =>200348,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa Longaví','alias'=>'Centro Comunitario de Salud Familiar Villa Longaví','type'=>16,'code_deis' =>200349,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Posta de Salud Rural Quinamávida','alias'=>'Posta de Salud Rural Quinamávida','type'=>13,'code_deis' =>200350,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Yerbas Buenas','alias'=>'Centro Comunitario de Salud Familiar Yerbas Buenas','type'=>16,'code_deis' =>200351,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Carlos Trupp','alias'=>'Centro Comunitario de Salud Familiar Carlos Trupp','type'=>16,'code_deis' =>200352,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Médico Dental Universitario de la Universidad de Los Lagos','alias'=>'Centro de Salud Médico Dental Universitario de la Universidad de Los Lagos','type'=>8,'code_deis' =>200353,'service' =>37,'dependency' =>4]);
Organization::Create(['name' => 'Clínica Milano','alias'=>'Clínica Milano','type'=>6,'code_deis' =>200354,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Polígono','alias'=>'Centro Comunitario de Salud Familiar El Polígono','type'=>16,'code_deis' =>200355,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro Diurno para Personas con Demencia','alias'=>'Centro Diurno para Personas con Demencia','type'=>15,'code_deis' =>200356,'service' =>30,'dependency' =>1]);
Organization::Create(['name' => 'Laboratorio Vidaintegra','alias'=>'Laboratorio Vidaintegra','type'=>10,'code_deis' =>200357,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Integramédica Copiapó','alias'=>'Integramédica Copiapó','type'=>8,'code_deis' =>200358,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Alejandro Gutierrez','alias'=>'Centro Comunitario de Salud Familiar Alejandro Gutierrez','type'=>16,'code_deis' =>200359,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Eduardo Frei Montalva','alias'=>'Centro Comunitario de Salud Familiar Eduardo Frei Montalva','type'=>16,'code_deis' =>200360,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Atacama','alias'=>'Centro Comunitario de Salud Familiar Atacama','type'=>16,'code_deis' =>200361,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'COSAM San Felipe','alias'=>'COSAM San Felipe','type'=>14,'code_deis' =>200362,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'Clínica de Cirugía y Estética Edelweiss','alias'=>'Clínica de Cirugía y Estética Edelweiss','type'=>6,'code_deis' =>200363,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Matucana','alias'=>'Centro Médico y Dental Matucana','type'=>17,'code_deis' =>200364,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa Los Presidentes','alias'=>'Centro Comunitario de Salud Familiar Villa Los Presidentes','type'=>16,'code_deis' =>200365,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Urbano de Illapel','alias'=>'Centro de Salud Familiar Urbano de Illapel','type'=>12,'code_deis' =>200366,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Colonia Limarí','alias'=>'Centro Comunitario de Salud Familiar Colonia Limarí','type'=>16,'code_deis' =>200367,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Vacunatorio Mediclown','alias'=>'Vacunatorio Mediclown','type'=>18,'code_deis' =>200368,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Boca Sur Viejo','alias'=>'Centro Comunitario de Salud Familiar Boca Sur Viejo','type'=>16,'code_deis' =>200369,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Laboratorio Clínico Atenea','alias'=>'Laboratorio Clínico Atenea','type'=>10,'code_deis' =>200370,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Dr. Mejía','alias'=>'Laboratorio Clínico Dr. Mejía','type'=>10,'code_deis' =>200371,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Médico Bioclinic Ltda.','alias'=>'Laboratorio Médico Bioclinic Ltda.','type'=>10,'code_deis' =>200372,'service' =>4,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Imagenología y Diagnóstico','alias'=>'Centro de Imagenología y Diagnóstico','type'=>8,'code_deis' =>200373,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Unidad Oftalmológica Móvil','alias'=>'Unidad Oftalmológica Móvil','type'=>15,'code_deis' =>200374,'service' =>11,'dependency' =>1]);
Organization::Create(['name' => 'Centro Especialidades Primarias San Lazaro','alias'=>'Centro Especialidades Primarias San Lazaro','type'=>30,'code_deis' =>200375,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Mamógrafo Digital - Ecotomógrafo Móvil. Pat. PX1462-2 (SS Aysén)','alias'=>'Mamógrafo Digital - Ecotomógrafo Móvil. Pat. PX1462-2 (SS Aysén)','type'=>15,'code_deis' =>200376,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Las Hortensias','alias'=>'Centro Comunitario de Salud Familiar Las Hortensias','type'=>16,'code_deis' =>200377,'service' =>19,'dependency' =>6]);
Organization::Create(['name' => 'Clínica Dental Móvil Pat. EZE-031 (Valparaíso)','alias'=>'Clínica Dental Móvil Pat. EZE-031 (Valparaíso)','type'=>3,'code_deis' =>200378,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Tuncahue','alias'=>'Centro Comunitario de Salud Familiar Tuncahue','type'=>16,'code_deis' =>200379,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Puerto Aysen','alias'=>'Centro de Salud Familiar Puerto Aysen','type'=>12,'code_deis' =>200380,'service' =>39,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Bosque','alias'=>'Centro Comunitario de Salud Familiar El Bosque','type'=>16,'code_deis' =>200381,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Carahue','alias'=>'Centro Comunitario de Salud Familiar Carahue','type'=>16,'code_deis' =>200382,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Las Villas','alias'=>'Centro Comunitario de Salud Familiar Las Villas','type'=>16,'code_deis' =>200383,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Centro Traumatológico Viña del Mar','alias'=>'Centro Traumatológico Viña del Mar','type'=>8,'code_deis' =>200384,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar San Vicente de Naltagua','alias'=>'Centro Comunitario de Salud Familiar San Vicente de Naltagua','type'=>16,'code_deis' =>200385,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Clínica Dental Móvil Pat. EZE-032 (Valparaíso)','alias'=>'Clínica Dental Móvil Pat. EZE-032 (Valparaíso)','type'=>3,'code_deis' =>200386,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico Imagensalud','alias'=>'Centro Médico Imagensalud','type'=>8,'code_deis' =>200387,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental La Serena IVa. Zona de Carabineros Coquimbo','alias'=>'Centro Médico y Dental La Serena IVa. Zona de Carabineros Coquimbo','type'=>17,'code_deis' =>200388,'service' =>10,'dependency' =>5]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Amapolas','alias'=>'Centro Comunitario de Salud Familiar Amapolas','type'=>16,'code_deis' =>200389,'service' =>20,'dependency' =>6]);
Organization::Create(['name' => 'Laboratorio Clínico Winlop','alias'=>'Laboratorio Clínico Winlop','type'=>10,'code_deis' =>200390,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Biotec','alias'=>'Laboratorio Clínico Biotec','type'=>10,'code_deis' =>200391,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Tecnoanálisis','alias'=>'Laboratorio Clínico Tecnoanálisis','type'=>10,'code_deis' =>200392,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico y Hematológico María Cecilia Besomi','alias'=>'Laboratorio Clínico y Hematológico María Cecilia Besomi','type'=>10,'code_deis' =>200393,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Dr. Rodolfo Castro','alias'=>'Laboratorio Clínico Dr. Rodolfo Castro','type'=>10,'code_deis' =>200394,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico y Centro Médico Dr. Araya','alias'=>'Laboratorio Clínico y Centro Médico Dr. Araya','type'=>10,'code_deis' =>200395,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Santa María','alias'=>'Laboratorio Clínico Santa María','type'=>10,'code_deis' =>200396,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Biomex','alias'=>'Laboratorio Clínico Biomex','type'=>10,'code_deis' =>200397,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Fisher','alias'=>'Laboratorio Clínico Fisher','type'=>10,'code_deis' =>200398,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Ancud','alias'=>'Laboratorio Clínico Bionet S.A. - Ancud','type'=>10,'code_deis' =>200399,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico MasterLab','alias'=>'Laboratorio Clínico MasterLab','type'=>10,'code_deis' =>200400,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico y Hematológico San José','alias'=>'Laboratorio Clínico y Hematológico San José','type'=>10,'code_deis' =>200401,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Arcos de Pinamar','alias'=>'Centro Comunitario de Salud Familiar Arcos de Pinamar','type'=>16,'code_deis' =>200402,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Laboratorio Clínico Alcántara','alias'=>'Laboratorio Clínico Alcántara','type'=>10,'code_deis' =>200403,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínica del Maule','alias'=>'Laboratorio Clínica del Maule','type'=>10,'code_deis' =>200404,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Biomolecular','alias'=>'Laboratorio Clínico Biomolecular','type'=>10,'code_deis' =>200405,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Ximena Gonzalez (LABXG)','alias'=>'Laboratorio Clínico Ximena Gonzalez (LABXG)','type'=>10,'code_deis' =>200406,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico San Francisco','alias'=>'Laboratorio Clínico San Francisco','type'=>10,'code_deis' =>200407,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Alemán','alias'=>'Laboratorio Clínico Alemán','type'=>10,'code_deis' =>200409,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Cauquenes','alias'=>'Laboratorio Clínico Cauquenes','type'=>10,'code_deis' =>200410,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Perquilauquén','alias'=>'Laboratorio Clínico Perquilauquén','type'=>10,'code_deis' =>200411,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Cordillera - Sala Externa de Toma de Muestras','alias'=>'Laboratorio Clínico Cordillera - Sala Externa de Toma de Muestras','type'=>10,'code_deis' =>200412,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa La Granja','alias'=>'Centro Comunitario de Salud Familiar Villa La Granja','type'=>16,'code_deis' =>200413,'service' =>31,'dependency' =>1]);
Organization::Create(['name' => 'Laboratorio Clínico Alexander Fleming','alias'=>'Laboratorio Clínico Alexander Fleming','type'=>10,'code_deis' =>200414,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Tecnoanálisis - Sala Externa de Toma de Muestras','alias'=>'Laboratorio Clínico Tecnoanálisis - Sala Externa de Toma de Muestras','type'=>10,'code_deis' =>200415,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Laboratorio Clínico San Rafael','alias'=>'Centro Médico y Laboratorio Clínico San Rafael','type'=>17,'code_deis' =>200416,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Alto Hospicio','alias'=>'Centro de Diálisis Alto Hospicio','type'=>19,'code_deis' =>200417,'service' =>4,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Thomas Ltda.','alias'=>'Laboratorio Clínico Thomas Ltda.','type'=>10,'code_deis' =>200418,'service' =>40,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Diagnóstico Análisis Coyhaique','alias'=>'Laboratorio Clínico Diagnóstico Análisis Coyhaique','type'=>10,'code_deis' =>200419,'service' =>40,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico INSI S. A.','alias'=>'Laboratorio Clínico INSI S. A.','type'=>10,'code_deis' =>200420,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Aclin Ltda.','alias'=>'Laboratorio Clínico Aclin Ltda.','type'=>10,'code_deis' =>200421,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Llo-Lleo Ltda.','alias'=>'Laboratorio Clínico Llo-Lleo Ltda.','type'=>10,'code_deis' =>200422,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico IDU Solaris','alias'=>'Laboratorio Clínico IDU Solaris','type'=>10,'code_deis' =>200423,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Erna Moraga Romero','alias'=>'Laboratorio Clínico Erna Moraga Romero','type'=>10,'code_deis' =>200424,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico San José Ltda.','alias'=>'Laboratorio Clínico San José Ltda.','type'=>10,'code_deis' =>200425,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Diagnocal','alias'=>'Laboratorio Clínico Diagnocal','type'=>10,'code_deis' =>200426,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Pasteur Ltda.','alias'=>'Laboratorio Clínico Pasteur Ltda.','type'=>10,'code_deis' =>200427,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Labocal','alias'=>'Laboratorio Clínico Labocal','type'=>10,'code_deis' =>200428,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Dr. José García Rosado','alias'=>'Laboratorio Clínico Dr. José García Rosado','type'=>10,'code_deis' =>200429,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Oriana Fernández','alias'=>'Laboratorio Clínico Oriana Fernández','type'=>10,'code_deis' =>200430,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Diagnostico Clinilab','alias'=>'Laboratorio Clínico Diagnostico Clinilab','type'=>10,'code_deis' =>200431,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Cheul Etcheverry','alias'=>'Laboratorio Clínico Cheul Etcheverry','type'=>10,'code_deis' =>200432,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Diagnostika Alemana','alias'=>'Laboratorio Clínico Diagnostika Alemana','type'=>10,'code_deis' =>200433,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Cemeval','alias'=>'Laboratorio Clínico Cemeval','type'=>10,'code_deis' =>200434,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Darvax','alias'=>'Vacunatorio Darvax','type'=>18,'code_deis' =>200435,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y dental Vida Integra Ñuñoa','alias'=>'Centro Médico y dental Vida Integra Ñuñoa','type'=>17,'code_deis' =>200436,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Metropolitano','alias'=>'Laboratorio Clínico Metropolitano','type'=>10,'code_deis' =>200437,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Megasalud','alias'=>'Laboratorio Clínico Megasalud','type'=>10,'code_deis' =>200438,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Omega','alias'=>'Laboratorio Clínico Omega','type'=>10,'code_deis' =>200439,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Alerce Norte','alias'=>'Centro Comunitario de Salud Familiar Alerce Norte','type'=>16,'code_deis' =>200440,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico y Dental Clínica Bilbao','alias'=>'Centro Médico y Dental Clínica Bilbao','type'=>17,'code_deis' =>200441,'service' =>40,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Gamboa','alias'=>'Centro Comunitario de Salud Familiar Gamboa','type'=>16,'code_deis' =>200442,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Consulta Dental La Araucana Salud Calbuco','alias'=>'Consulta Dental La Araucana Salud Calbuco','type'=>9,'code_deis' =>200443,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Consulta Dental La Araucana Salud Osorno','alias'=>'Consulta Dental La Araucana Salud Osorno','type'=>9,'code_deis' =>200444,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'COSAM Oriente','alias'=>'COSAM Oriente','type'=>14,'code_deis' =>200445,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Paris SpA','alias'=>'Clínica Paris SpA','type'=>6,'code_deis' =>200446,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Wallace SpA.','alias'=>'Laboratorio Clínico Wallace SpA.','type'=>10,'code_deis' =>200447,'service' =>4,'dependency' =>3]);
Organization::Create(['name' => 'Unidad de Salud del Establecimiento Penitenciario de La Serena','alias'=>'Unidad de Salud del Establecimiento Penitenciario de La Serena','type'=>8,'code_deis' =>200448,'service' =>10,'dependency' =>4]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Puntra Degañ','alias'=>'Centro Comunitario de Salud Familiar Puntra Degañ','type'=>16,'code_deis' =>200449,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Valdivieso','alias'=>'Centro de Salud Familiar Valdivieso','type'=>12,'code_deis' =>200450,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'Instituto Medico Infantil','alias'=>'Instituto Medico Infantil','type'=>8,'code_deis' =>200451,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Servicio Imagenológico Radiosur Ltda','alias'=>'Servicio Imagenológico Radiosur Ltda','type'=>8,'code_deis' =>200452,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Municipal Diego de Almagro','alias'=>'Centro de Diálisis Municipal Diego de Almagro','type'=>19,'code_deis' =>200453,'service' =>8,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Lo Chacón','alias'=>'Centro Comunitario de Salud Familiar Lo Chacón','type'=>16,'code_deis' =>200454,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Barrio Estación','alias'=>'Centro Comunitario de Salud Familiar Barrio Estación','type'=>16,'code_deis' =>200455,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Laboratorio Clínico Lavoisier','alias'=>'Laboratorio Clínico Lavoisier','type'=>10,'code_deis' =>200456,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Las Condes Peñalolén','alias'=>'Clínica Las Condes Peñalolén','type'=>6,'code_deis' =>200457,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'SAR Barrios Bajos','alias'=>'SAR Barrios Bajos','type'=>20,'code_deis' =>200458,'service' =>34,'dependency' =>1]);
Organization::Create(['name' => 'SAR Lautaro','alias'=>'SAR Lautaro','type'=>20,'code_deis' =>200459,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC Vallenar','alias'=>'Centro de Salud Mutual CChC Vallenar','type'=>8,'code_deis' =>200460,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico de Funcionarios de Gendarmería de Chile La Serena','alias'=>'Policlínico de Funcionarios de Gendarmería de Chile La Serena','type'=>8,'code_deis' =>200461,'service' =>10,'dependency' =>4]);
Organization::Create(['name' => 'COSAM Los Andes','alias'=>'COSAM Los Andes','type'=>14,'code_deis' =>200462,'service' =>14,'dependency' =>1]);
Organization::Create(['name' => 'Instituto Teletón Atacama','alias'=>'Instituto Teletón Atacama','type'=>8,'code_deis' =>200463,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Blanco','alias'=>'Laboratorio Clínico Blanco','type'=>10,'code_deis' =>200464,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Instituto Teletón Calama','alias'=>'Instituto Teletón Calama','type'=>8,'code_deis' =>200465,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Unidad de Imagenología Sorema del Sur','alias'=>'Unidad de Imagenología Sorema del Sur','type'=>8,'code_deis' =>200466,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Unidad de Imagenología Scanner Temuco','alias'=>'Unidad de Imagenología Scanner Temuco','type'=>8,'code_deis' =>200467,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'COSAM CEIF Puente Alto Norte','alias'=>'COSAM CEIF Puente Alto Norte','type'=>14,'code_deis' =>200468,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Clínica Vida Estética','alias'=>'Clínica Vida Estética','type'=>6,'code_deis' =>200469,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Cerro Estanque','alias'=>'Centro Comunitario de Salud Familiar Cerro Estanque','type'=>16,'code_deis' =>200470,'service' =>30,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar El Trigal','alias'=>'Centro Comunitario de Salud Familiar El Trigal','type'=>16,'code_deis' =>200471,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Laboratorio Clínico Biohealth','alias'=>'Laboratorio Clínico Biohealth','type'=>10,'code_deis' =>200472,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico de Agostini y Cia. Ltda.','alias'=>'Laboratorio Clínico de Agostini y Cia. Ltda.','type'=>10,'code_deis' =>200473,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Posta de Salud Rural Pachica','alias'=>'Posta de Salud Rural Pachica','type'=>13,'code_deis' =>200474,'service' =>3,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Las Lomas','alias'=>'Centro Comunitario de Salud Familiar Las Lomas','type'=>16,'code_deis' =>200475,'service' =>21,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico Medicien','alias'=>'Centro Médico Medicien','type'=>8,'code_deis' =>200476,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Unidad de Memoria AYEKAN','alias'=>'Unidad de Memoria AYEKAN','type'=>15,'code_deis' =>200477,'service' =>36,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Ñancul','alias'=>'Centro Comunitario de Salud Familiar Ñancul','type'=>16,'code_deis' =>200478,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'SAR Oriente María Eugenia Torres','alias'=>'SAR Oriente María Eugenia Torres','type'=>20,'code_deis' =>200479,'service' =>17,'dependency' =>6]);
Organization::Create(['name' => 'Vacunatorio y Sala de Procedimientos Patricia Rojas Gajardo','alias'=>'Vacunatorio y Sala de Procedimientos Patricia Rojas Gajardo','type'=>27,'code_deis' =>200480,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Dental Copiapó IIIa Zona Carabineros Atacama','alias'=>'Centro Médico y Dental Copiapó IIIa Zona Carabineros Atacama','type'=>17,'code_deis' =>200481,'service' =>8,'dependency' =>5]);
Organization::Create(['name' => 'Servicio Medicina Preventiva del Ejercito','alias'=>'Servicio Medicina Preventiva del Ejercito','type'=>8,'code_deis' =>200482,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Centro de Vacunación y Servcio de Enfermería SpA','alias'=>'Centro de Vacunación y Servcio de Enfermería SpA','type'=>18,'code_deis' =>200483,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Medisan','alias'=>'Centro Médico Medisan','type'=>8,'code_deis' =>200484,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Chumaquito','alias'=>'Centro Comunitario de Salud Familiar Chumaquito','type'=>16,'code_deis' =>200485,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Clínica Bupa Santiago','alias'=>'Clínica Bupa Santiago','type'=>6,'code_deis' =>200486,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Psiquiatrica Creser','alias'=>'Clínica Psiquiatrica Creser','type'=>6,'code_deis' =>200487,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Alta Imagen','alias'=>'Centro Médico Alta Imagen','type'=>8,'code_deis' =>200488,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio IMEX Limitada - Sala Externa de toma de muestra','alias'=>'Laboratorio IMEX Limitada - Sala Externa de toma de muestra','type'=>10,'code_deis' =>200489,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Posta de Salud Rural Chamilco','alias'=>'Posta de Salud Rural Chamilco','type'=>13,'code_deis' =>200490,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Angostura','alias'=>'Centro Comunitario de Salud Familiar Angostura','type'=>16,'code_deis' =>200491,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Vacunatorio Minimed','alias'=>'Vacunatorio Minimed','type'=>18,'code_deis' =>200492,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Villa Aytue','alias'=>'Centro Comunitario de Salud Familiar Villa Aytue','type'=>16,'code_deis' =>200493,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar El Sauce','alias'=>'Centro de Salud Familiar El Sauce','type'=>12,'code_deis' =>200494,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAR Entre Ríos','alias'=>'SAR Entre Ríos','type'=>20,'code_deis' =>200495,'service' =>31,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar Constitución','alias'=>'Centro de Salud Familiar Constitución','type'=>12,'code_deis' =>200496,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud IST Coquimbo','alias'=>'Centro de Salud IST Coquimbo','type'=>8,'code_deis' =>200497,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Rural Pan de Azúcar','alias'=>'Centro de Salud Familiar Rural Pan de Azúcar','type'=>12,'code_deis' =>200499,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Laboratorio Clínico Austral','alias'=>'Laboratorio Clínico Austral','type'=>10,'code_deis' =>200500,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio y Sala de Procedimientos Carolina Díaz González','alias'=>'Vacunatorio y Sala de Procedimientos Carolina Díaz González','type'=>27,'code_deis' =>200501,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de San Antonio','alias'=>'Policlínico Instituto de Seguridad del Trabajo de San Antonio','type'=>8,'code_deis' =>200502,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Quillota','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Quillota','type'=>8,'code_deis' =>200503,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Medicina Nuclear Bicentenario','alias'=>'Laboratorio Medicina Nuclear Bicentenario','type'=>10,'code_deis' =>200504,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Imagenología Sur Cruz Médica','alias'=>'Centro Médico Imagenología Sur Cruz Médica','type'=>8,'code_deis' =>200505,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Corcovado','alias'=>'Laboratorio Clínico Corcovado','type'=>10,'code_deis' =>200506,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Centro de Cumplimiento Penitenciario de Osorno','alias'=>'Policlínico Centro de Cumplimiento Penitenciario de Osorno','type'=>8,'code_deis' =>200507,'service' =>37,'dependency' =>4]);
Organization::Create(['name' => 'Centro Oncológico del Norte (CON)','alias'=>'Centro Oncológico del Norte (CON)','type'=>8,'code_deis' =>200508,'service' =>5,'dependency' =>1]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Pucón Oriente','alias'=>'Centro Comunitario de Salud Familiar Pucón Oriente','type'=>16,'code_deis' =>200509,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Vacunatorio Inmunosalud Ltda','alias'=>'Vacunatorio Inmunosalud Ltda','type'=>18,'code_deis' =>200510,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Altamira','alias'=>'Laboratorio Clínico Altamira','type'=>10,'code_deis' =>200511,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diagnóstico e Imágenes del Sur - CEDISUR SpA','alias'=>'Centro de Diagnóstico e Imágenes del Sur - CEDISUR SpA','type'=>8,'code_deis' =>200512,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Diagnomed Ltda.','alias'=>'Laboratorio Clínico Diagnomed Ltda.','type'=>10,'code_deis' =>200513,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Servicios de Enfermería y Salud Camila Barrueto','alias'=>'Servicios de Enfermería y Salud Camila Barrueto','type'=>18,'code_deis' =>200514,'service' =>40,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio y Sala de Procedimientos Invasivos Trasmed SpA','alias'=>'Vacunatorio y Sala de Procedimientos Invasivos Trasmed SpA','type'=>27,'code_deis' =>200515,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Escuela Militar','alias'=>'Centro Odontológico Uno Salud Dental Escuela Militar','type'=>9,'code_deis' =>200516,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental La Florida Dos','alias'=>'Centro Odontológico Uno Salud Dental La Florida Dos','type'=>9,'code_deis' =>200517,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Melipilla','alias'=>'Centro Odontológico Uno Salud Dental Melipilla','type'=>9,'code_deis' =>200518,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Macul','alias'=>'Centro Odontológico Uno Salud Dental Macul','type'=>9,'code_deis' =>200519,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Quilpué','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Quilpué','type'=>8,'code_deis' =>200520,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Norprevent','alias'=>'Laboratorio Clínico Norprevent','type'=>10,'code_deis' =>200521,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'SAR Villa Alegre','alias'=>'SAR Villa Alegre','type'=>20,'code_deis' =>200522,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Diálisis Clinidial Illapel','alias'=>'Centro de Diálisis Clinidial Illapel','type'=>19,'code_deis' =>200523,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Antofagasta','alias'=>'Centro Odontológico Uno Salud Dental Antofagasta','type'=>9,'code_deis' =>200524,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Rancagua','alias'=>'Centro Odontológico Uno Salud Dental Rancagua','type'=>9,'code_deis' =>200525,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Rancagua Dos','alias'=>'Centro Odontológico Uno Salud Dental Rancagua Dos','type'=>9,'code_deis' =>200526,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental San Fernando','alias'=>'Centro Odontológico Uno Salud Dental San Fernando','type'=>9,'code_deis' =>200527,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Angamos','alias'=>'Laboratorio Clínico Angamos','type'=>10,'code_deis' =>200528,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Altamira','alias'=>'Vacunatorio Altamira','type'=>27,'code_deis' =>200529,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Dr. Omar Luz','alias'=>'Vacunatorio Dr. Omar Luz','type'=>27,'code_deis' =>200530,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Atacama SH Familia','alias'=>'Vacunatorio Atacama SH Familia','type'=>27,'code_deis' =>200531,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Viña del Mar Dos','alias'=>'Centro Odontológico Uno Salud Dental Viña del Mar Dos','type'=>9,'code_deis' =>200532,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de San Felipe','alias'=>'Policlínico Instituto de Seguridad del Trabajo de San Felipe','type'=>8,'code_deis' =>200533,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico Instituto de Seguridad del Trabajo de Los Andes','alias'=>'Policlínico Instituto de Seguridad del Trabajo de Los Andes','type'=>8,'code_deis' =>200534,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Caupolicán','alias'=>'Centro Comunitario de Salud Familiar Caupolicán','type'=>16,'code_deis' =>200535,'service' =>44,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Especialidades Odontológicas','alias'=>'Centro de Especialidades Odontológicas','type'=>12,'code_deis' =>200536,'service' =>38,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Diagnóstico San Felipe','alias'=>'Centro de Diagnóstico San Felipe','type'=>10,'code_deis' =>200537,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar San Isidro Calingasta','alias'=>'Centro de Salud Familiar San Isidro Calingasta','type'=>12,'code_deis' =>200538,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro Referencia Diagnóstico Médico Osorno','alias'=>'Centro Referencia Diagnóstico Médico Osorno','type'=>12,'code_deis' =>200539,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Iquique','alias'=>'Centro Odontológico Uno Salud Dental Iquique','type'=>9,'code_deis' =>200540,'service' =>4,'dependency' =>3]);
Organization::Create(['name' => 'Clínica IMET','alias'=>'Clínica IMET','type'=>8,'code_deis' =>200541,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Magallanes','alias'=>'Laboratorio Magallanes','type'=>10,'code_deis' =>200542,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Dental Osorno','alias'=>'Centro Odontológico Uno Dental Osorno','type'=>9,'code_deis' =>200543,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Concepción','alias'=>'Centro Odontológico Uno Salud Dental Concepción','type'=>9,'code_deis' =>200544,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Concepción Dos','alias'=>'Centro Odontológico Uno Salud Dental Concepción Dos','type'=>9,'code_deis' =>200545,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Talcahuano','alias'=>'Centro Odontológico Uno Salud Dental Talcahuano','type'=>9,'code_deis' =>200546,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Los Ángeles','alias'=>'Centro Odontológico Uno Salud Dental Los Ángeles','type'=>9,'code_deis' =>200547,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Chillán','alias'=>'Centro Odontológico Uno Salud Dental Chillán','type'=>9,'code_deis' =>200548,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Antonia Urqueta Castillo','alias'=>'Laboratorio Clínico Antonia Urqueta Castillo','type'=>10,'code_deis' =>200549,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico ISSO','alias'=>'Laboratorio Clínico ISSO','type'=>10,'code_deis' =>200550,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Coquimbo','alias'=>'Centro Odontológico Uno Salud Dental Coquimbo','type'=>9,'code_deis' =>200551,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental La Serena','alias'=>'Centro Odontológico Uno Salud Dental La Serena','type'=>9,'code_deis' =>200552,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Tecno Medic','alias'=>'Laboratorio Clínico Tecno Medic','type'=>10,'code_deis' =>200553,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Las Enredaderas','alias'=>'Centro Comunitario de Salud Familiar Las Enredaderas','type'=>16,'code_deis' =>200554,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Hospital Digital','alias'=>'Hospital Digital','type'=>31,'code_deis' =>200556,'service' =>46,'dependency' =>8]);
Organization::Create(['name' => 'Centro de Salud Familiar Dr. Yandry Añazco Montero','alias'=>'CESFAM Dr. Yandry Añazco Montero','type'=>12,'code_deis' =>200557,'service' =>3,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Ñuble','alias'=>'COSAM Ñuble','type'=>14,'code_deis' =>200558,'service' =>26,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Fleming Arica','alias'=>'Clínica Fleming Arica','type'=>6,'code_deis' =>200559,'service' =>2,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio y Sala de Procedimientos Dhilcia Herlitz Maripangui','alias'=>'Vacunatorio y Sala de Procedimientos Dhilcia Herlitz Maripangui','type'=>18,'code_deis' =>200560,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Médico Canales Escartín Ltda.','alias'=>'Laboratorio Médico Canales Escartín Ltda.','type'=>10,'code_deis' =>200561,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'SAR Dr. Rienzi Valencia','alias'=>'SAR Dr. Rienzi Valencia','type'=>20,'code_deis' =>200562,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Hospital Clínico Universidad de Antofagasta','alias'=>'Hospital Clínico Universidad de Antofagasta','type'=>7,'code_deis' =>200563,'service' =>6,'dependency' =>4]);
Organization::Create(['name' => 'Laboratorio Clínico Holanda Ltda.','alias'=>'Laboratorio Clínico Holanda Ltda.','type'=>10,'code_deis' =>200564,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Seres','alias'=>'Vacunatorio Seres','type'=>18,'code_deis' =>200565,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Monteverde SpA','alias'=>'Clínica Monteverde SpA','type'=>6,'code_deis' =>200566,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Prevelab','alias'=>'Laboratorio Prevelab','type'=>10,'code_deis' =>200567,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Mutual CChC de Los Andes','alias'=>'Centro de Salud Mutual CChC de Los Andes','type'=>8,'code_deis' =>200568,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Fray Jorge','alias'=>'Centro de Salud Familiar Fray Jorge','type'=>12,'code_deis' =>200569,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro Clínico DentalBio Spa','alias'=>'Centro Clínico DentalBio Spa','type'=>9,'code_deis' =>200570,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Biovax SpA','alias'=>'Vacunatorio Biovax SpA','type'=>18,'code_deis' =>200571,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Dipreca - Sala Externa de Toma de Muestras','alias'=>'Laboratorio Clínico Dipreca - Sala Externa de Toma de Muestras','type'=>10,'code_deis' =>200572,'service' =>16,'dependency' =>5]);
Organization::Create(['name' => 'Laboratorio Inmunolab SpA','alias'=>'Laboratorio Inmunolab SpA','type'=>10,'code_deis' =>200573,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Puente Alto 2','alias'=>'Centro Odontológico Uno Salud Dental Puente Alto 2','type'=>9,'code_deis' =>200574,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Manquehue','alias'=>'Centro Odontológico Uno Salud Dental Manquehue','type'=>9,'code_deis' =>200575,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Alto Medicen','alias'=>'Centro de Diálisis Alto Medicen','type'=>19,'code_deis' =>200576,'service' =>4,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Salud Asistencia','alias'=>'Centro Médico Salud Asistencia','type'=>8,'code_deis' =>200577,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Calama','alias'=>'Laboratorio Clínico Bionet S.A. - Calama','type'=>10,'code_deis' =>200578,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Policlínico De La Compañía Minera Cerro Colorado S.A.','alias'=>'Policlínico De La Compañía Minera Cerro Colorado S.A.','type'=>8,'code_deis' =>200579,'service' =>4,'dependency' =>3]);
Organization::Create(['name' => 'SAR Chiguayante','alias'=>'SAR Chiguayante','type'=>20,'code_deis' =>200580,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'SAR San Pedro','alias'=>'SAR San Pedro','type'=>20,'code_deis' =>200581,'service' =>28,'dependency' =>6]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Temuco','alias'=>'Centro Odontológico Uno Salud Dental Temuco','type'=>9,'code_deis' =>200582,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Temuco 2','alias'=>'Centro Odontológico Uno Salud Dental Temuco 2','type'=>9,'code_deis' =>200583,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Arica','alias'=>'Centro Odontológico Uno Salud Dental Arica','type'=>9,'code_deis' =>200584,'service' =>2,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Especialidades Odontológicas del Norte CEODEN','alias'=>'Centro de Especialidades Odontológicas del Norte CEODEN','type'=>9,'code_deis' =>200585,'service' =>2,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Suiza - Centro Odontológico','alias'=>'Clínica Suiza - Centro Odontológico','type'=>9,'code_deis' =>200586,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Universidad de Santiago de Chile','alias'=>'Centro de Salud Universidad de Santiago de Chile','type'=>8,'code_deis' =>200587,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental La Dehesa','alias'=>'Centro Odontológico Uno Salud Dental La Dehesa','type'=>9,'code_deis' =>200588,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Manantiales','alias'=>'Clínica Manantiales','type'=>9,'code_deis' =>200589,'service' =>42,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Resolución de Especialidades Ambulatorias (CREA)','alias'=>'Centro de Resolución de Especialidades Ambulatorias (CREA)','type'=>25,'code_deis' =>200590,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Clínica de Implantología Oral Anwandter','alias'=>'Clínica de Implantología Oral Anwandter','type'=>9,'code_deis' =>200591,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Alerces','alias'=>'Clínica Alerces','type'=>9,'code_deis' =>200592,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental San Pedro de la Paz','alias'=>'Centro Odontológico Uno Salud Dental San Pedro de la Paz','type'=>9,'code_deis' =>200593,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Dental Móvil Pat. KBKG-80 (Limache)','alias'=>'Clínica Dental Móvil Pat. KBKG-80 (Limache)','type'=>3,'code_deis' =>200594,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Salud Familiar La Calera','alias'=>'Centro de Salud Familiar La Calera','type'=>12,'code_deis' =>200595,'service' =>13,'dependency' =>6]);
Organization::Create(['name' => 'Santiago Medical Institute SPA','alias'=>'Santiago Medical Institute SPA','type'=>6,'code_deis' =>200596,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Puerto Montt 2','alias'=>'Centro Odontológico Uno Salud Dental Puerto Montt 2','type'=>9,'code_deis' =>200597,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Dental Móvil Pat. TJZ-938 (Talca)','alias'=>'Clínica Dental Móvil Pat. TJZ-938 (Talca)','type'=>3,'code_deis' =>200598,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Clínica Dental Móvil Pat. TJZ-763 (Talca)','alias'=>'Clínica Dental Móvil Pat. TJZ-763 (Talca)','type'=>3,'code_deis' =>200599,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro Odontológico y Médico San Cristóbal','alias'=>'Centro Odontológico y Médico San Cristóbal','type'=>17,'code_deis' =>200600,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Hospital de día','alias'=>'Hospital de día','type'=>29,'code_deis' =>200601,'service' =>1,'dependency' =>1]);
Organization::Create(['name' => 'Clínica Oncológica CIDO SpA','alias'=>'Clínica Oncológica CIDO SpA','type'=>6,'code_deis' =>200602,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Clínica OB','alias'=>'Clínica OB','type'=>6,'code_deis' =>200603,'service' =>33,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico','alias'=>'Laboratorio Clínico','type'=>10,'code_deis' =>200604,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Viña del Mar','alias'=>'Laboratorio Clínico Bionet S.A. - Viña del Mar','type'=>10,'code_deis' =>200605,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Cardiovascular Integral CARDIONORT - Vacunatorio','alias'=>'Centro Cardiovascular Integral CARDIONORT - Vacunatorio','type'=>8,'code_deis' =>200606,'service' =>8,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Lila Cortés Godoy','alias'=>'Centro de Salud Familiar Lila Cortés Godoy','type'=>12,'code_deis' =>200607,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Peñalolen','alias'=>'Centro Odontológico Uno Salud Dental Peñalolen','type'=>9,'code_deis' =>200608,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Dr. Lucas Sierra','alias'=>'Centro Comunitario de Salud Familiar Dr. Lucas Sierra','type'=>16,'code_deis' =>200609,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'Policlínico Centro de Cumplimiento Penitenciario de Copiapó','alias'=>'Policlínico Centro de Cumplimiento Penitenciario de Copiapó','type'=>8,'code_deis' =>200610,'service' =>8,'dependency' =>4]);
Organization::Create(['name' => 'SAPU El Tabo','alias'=>'SAPU El Tabo','type'=>20,'code_deis' =>200611,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Instituto Teletón Coquimbo','alias'=>'Instituto Teletón Coquimbo','type'=>8,'code_deis' =>200612,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico CEMICH','alias'=>'Centro Médico CEMICH','type'=>8,'code_deis' =>200613,'service' =>2,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Bionet S.A. - Los Andes','alias'=>'Laboratorio Clínico Bionet S.A. - Los Andes','type'=>10,'code_deis' =>200614,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Oro Odontología Especializada','alias'=>'Clínica Oro Odontología Especializada','type'=>9,'code_deis' =>200615,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Alcudia','alias'=>'Clínica Alcudia','type'=>17,'code_deis' =>200616,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Atención Odontológica La Unión','alias'=>'Centro de Atención Odontológica La Unión','type'=>9,'code_deis' =>200617,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Varik','alias'=>'Vacunatorio Varik','type'=>18,'code_deis' =>200618,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Posta de Salud Rural Semillero','alias'=>'Posta de Salud Rural Semillero','type'=>13,'code_deis' =>200619,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'Centro de Diálisis y Especialidades Médicas Puerto Varas','alias'=>'Centro de Diálisis y Especialidades Médicas Puerto Varas','type'=>19,'code_deis' =>200620,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Coviefi','alias'=>'Centro Comunitario de Salud Familiar Coviefi','type'=>16,'code_deis' =>200621,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'SAR Coviefi','alias'=>'SAR Coviefi','type'=>20,'code_deis' =>200622,'service' =>5,'dependency' =>6]);
Organization::Create(['name' => 'SAR Santa Cruz','alias'=>'SAR Santa Cruz','type'=>20,'code_deis' =>200623,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'COSAM Los Cerros','alias'=>'COSAM Los Cerros','type'=>14,'code_deis' =>200624,'service' =>30,'dependency' =>1]);
Organization::Create(['name' => 'COSAM Ayelén','alias'=>'COSAM Ayelén','type'=>14,'code_deis' =>200625,'service' =>24,'dependency' =>1]);
Organization::Create(['name' => 'Laboratorio Clínico Novolab','alias'=>'Laboratorio Clínico Novolab','type'=>10,'code_deis' =>200626,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro Vacunatorio Coronel','alias'=>'Centro Vacunatorio Coronel','type'=>18,'code_deis' =>200627,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Concepción','alias'=>'Vacunatorio Concepción','type'=>18,'code_deis' =>200628,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Quilicura','alias'=>'Centro Odontológico Uno Salud Dental Quilicura','type'=>9,'code_deis' =>200629,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Diagnolab Spa','alias'=>'Laboratorio Clínico Diagnolab Spa','type'=>10,'code_deis' =>200630,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Monte Vital','alias'=>'Centro Médico Monte Vital','type'=>8,'code_deis' =>200631,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Salud Familiar Rengo Urbano Oriente','alias'=>'Centro de Salud Familiar Rengo Urbano Oriente','type'=>12,'code_deis' =>200632,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'Policlínico Gendarmería Regional de Atacama','alias'=>'Policlínico Gendarmería Regional de Atacama','type'=>8,'code_deis' =>200633,'service' =>8,'dependency' =>4]);
Organization::Create(['name' => 'Clínica de Enfermería del Centro de Detención Preventiva de Vallenar','alias'=>'Clínica de Enfermería del Centro de Detención Preventiva de Vallenar','type'=>8,'code_deis' =>200634,'service' =>8,'dependency' =>4]);
Organization::Create(['name' => 'Centro Médico CENTROMED','alias'=>'Centro Médico CENTROMED','type'=>8,'code_deis' =>200635,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico CENTROMED','alias'=>'Centro Médico CENTROMED','type'=>8,'code_deis' =>200636,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio RENVAC','alias'=>'Vacunatorio RENVAC','type'=>18,'code_deis' =>200637,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Internacional Immunitas SpA','alias'=>'Vacunatorio Internacional Immunitas SpA','type'=>18,'code_deis' =>200638,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Villa Alemana','alias'=>'Centro Odontológico Uno Salud Dental Villa Alemana','type'=>9,'code_deis' =>200639,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Clínica Dental Móvil Pat. UXU-852-0 (Temuco)','alias'=>'Clínica Dental Móvil Pat. UXU-852-0 (Temuco)','type'=>3,'code_deis' =>200640,'service' =>32,'dependency' =>6]);
Organization::Create(['name' => 'Clínica Cima Salud','alias'=>'Clínica Cima Salud','type'=>6,'code_deis' =>200641,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Centro de Diagnóstico San Martín','alias'=>'Vacunatorio Centro de Diagnóstico San Martín','type'=>18,'code_deis' =>200642,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro Comunitario de Salud Familiar Los Bosquinos','alias'=>'Centro Comunitario de Salud Familiar Los Bosquinos','type'=>16,'code_deis' =>200643,'service' =>18,'dependency' =>6]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Antofagasta 2','alias'=>'Centro Odontológico Uno Salud Dental Antofagasta 2','type'=>9,'code_deis' =>200644,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Talca 1','alias'=>'Centro Odontológico Uno Salud Dental Talca 1','type'=>9,'code_deis' =>200645,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Talca 2','alias'=>'Centro Odontológico Uno Salud Dental Talca 2','type'=>9,'code_deis' =>200646,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Curicó','alias'=>'Centro Odontológico Uno Salud Dental Curicó','type'=>9,'code_deis' =>200647,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Linares','alias'=>'Centro Odontológico Uno Salud Dental Linares','type'=>9,'code_deis' =>200648,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Independencia','alias'=>'Centro Odontológico Uno Salud Dental Independencia','type'=>9,'code_deis' =>200649,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico Clínica Alemana de Chicureo','alias'=>'Centro Médico Clínica Alemana de Chicureo','type'=>8,'code_deis' =>200650,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio San Pedro SpA','alias'=>'Vacunatorio San Pedro SpA','type'=>18,'code_deis' =>200651,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Innovalab de Puerto Montt','alias'=>'Laboratorio Clínico Innovalab de Puerto Montt','type'=>10,'code_deis' =>200652,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio Clínico Instituto de Patología Austral Ltda.','alias'=>'Laboratorio Clínico Instituto de Patología Austral Ltda.','type'=>10,'code_deis' =>200653,'service' =>37,'dependency' =>3]);
Organization::Create(['name' => 'Vacunatorio Clínica El Bosque','alias'=>'Vacunatorio Clínica El Bosque','type'=>18,'code_deis' =>200654,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Centro Metropolitano de Atención Prehospitalaria','alias'=>'Centro Metropolitano de Atención Prehospitalaria','type'=>32,'code_deis' =>200655,'service' =>18,'dependency' =>1]);
Organization::Create(['name' => 'Clínica de Dolor Facial y Trastornos del Sueño CDS','alias'=>'Clínica de Dolor Facial y Trastornos del Sueño CDS','type'=>9,'code_deis' =>200656,'service' =>35,'dependency' =>3]);
Organization::Create(['name' => 'Servicio Médico Legal Arica','alias'=>'Servicio Médico Legal Arica','type'=>33,'code_deis' =>200657,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Iquique','alias'=>'Servicio Médico Legal Iquique','type'=>33,'code_deis' =>200658,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Antofagasta','alias'=>'Servicio Médico Legal Antofagasta','type'=>33,'code_deis' =>200659,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Calama','alias'=>'Servicio Médico Legal Calama','type'=>33,'code_deis' =>200660,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Copiapó','alias'=>'Servicio Médico Legal Copiapó','type'=>33,'code_deis' =>200661,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Vallenar','alias'=>'Servicio Médico Legal Vallenar','type'=>33,'code_deis' =>200662,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal La Serena','alias'=>'Servicio Médico Legal La Serena','type'=>33,'code_deis' =>200663,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Illapel','alias'=>'Servicio Médico Legal Illapel','type'=>33,'code_deis' =>200664,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Ovalle','alias'=>'Servicio Médico Legal Ovalle','type'=>33,'code_deis' =>200665,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Valparaíso','alias'=>'Servicio Médico Legal Valparaíso','type'=>33,'code_deis' =>200666,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Quillota','alias'=>'Servicio Médico Legal Quillota','type'=>33,'code_deis' =>200667,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal San Antonio','alias'=>'Servicio Médico Legal San Antonio','type'=>33,'code_deis' =>200668,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal San Felipe','alias'=>'Servicio Médico Legal San Felipe','type'=>33,'code_deis' =>200669,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Rancagua','alias'=>'Servicio Médico Legal Rancagua','type'=>33,'code_deis' =>200670,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal San Fernando','alias'=>'Servicio Médico Legal San Fernando','type'=>33,'code_deis' =>200671,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Medico Legal Santa Cruz','alias'=>'Servicio Medico Legal Santa Cruz','type'=>33,'code_deis' =>200672,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Talca','alias'=>'Servicio Médico Legal Talca','type'=>33,'code_deis' =>200673,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Parral','alias'=>'Servicio Médico Legal Parral','type'=>33,'code_deis' =>200674,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Curicó','alias'=>'Servicio Médico Legal Curicó','type'=>33,'code_deis' =>200675,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Cauquenes','alias'=>'Servicio Médico Legal Cauquenes','type'=>33,'code_deis' =>200676,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Linares','alias'=>'Servicio Médico Legal Linares','type'=>33,'code_deis' =>200677,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Constitución','alias'=>'Servicio Médico Legal Constitución','type'=>33,'code_deis' =>200678,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Concepción','alias'=>'Servicio Médico Legal Concepción','type'=>33,'code_deis' =>200679,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Los Ángeles','alias'=>'Servicio Médico Legal Los Ángeles','type'=>33,'code_deis' =>200680,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Chillán','alias'=>'Servicio Médico Legal Chillán','type'=>33,'code_deis' =>200681,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Temuco','alias'=>'Servicio Médico Legal Temuco','type'=>33,'code_deis' =>200682,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Nueva Imperial','alias'=>'Servicio Médico Legal Nueva Imperial','type'=>33,'code_deis' =>200683,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Angol','alias'=>'Servicio Médico Legal Angol','type'=>33,'code_deis' =>200684,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Valdivia','alias'=>'Servicio Médico Legal Valdivia','type'=>33,'code_deis' =>200685,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Puerto Montt','alias'=>'Servicio Médico Legal Puerto Montt','type'=>33,'code_deis' =>200686,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Osorno','alias'=>'Servicio Médico Legal Osorno','type'=>33,'code_deis' =>200687,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Ancud','alias'=>'Servicio Médico Legal Ancud','type'=>33,'code_deis' =>200688,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Coyhaique','alias'=>'Servicio Médico Legal Coyhaique','type'=>33,'code_deis' =>200689,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Puerto Aysén','alias'=>'Servicio Médico Legal Puerto Aysén','type'=>33,'code_deis' =>200690,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Punta Arenas','alias'=>'Servicio Médico Legal Punta Arenas','type'=>33,'code_deis' =>200691,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Puerto Natales','alias'=>'Servicio Médico Legal Puerto Natales','type'=>33,'code_deis' =>200692,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Melipilla','alias'=>'Servicio Médico Legal Melipilla','type'=>33,'code_deis' =>200693,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'Servicio Médico Legal Santiago-Sede Central','alias'=>'Servicio Médico Legal Santiago-Sede Central','type'=>33,'code_deis' =>200694,'service' =>46,'dependency' =>9]);
Organization::Create(['name' => 'SAPU El Quisco','alias'=>'SAPU El Quisco','type'=>20,'code_deis' =>200695,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'Centro Médico San Jorge Red de Salud UC CHRISTUS','alias'=>'Centro Médico San Jorge Red de Salud UC CHRISTUS','type'=>8,'code_deis' =>200696,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Centro Médico Alcántara Red de Salud UC CHRISTUS','alias'=>'Centro Médico Alcántara Red de Salud UC CHRISTUS','type'=>8,'code_deis' =>200697,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Centro Médico Lira Red de Salud UC CHRISTUS','alias'=>'Centro Médico Lira Red de Salud UC CHRISTUS','type'=>8,'code_deis' =>200698,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Centro de Cáncer Red de Salud UC CHRISTUS','alias'=>'Centro de Cáncer Red de Salud UC CHRISTUS','type'=>8,'code_deis' =>200699,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Megasalud Magallanes','alias'=>'Megasalud Magallanes','type'=>8,'code_deis' =>200700,'service' =>42,'dependency' =>4]);
Organization::Create(['name' => 'PAME Hospital  Juan Noe Cervani ','alias'=>'PAME Hospital  Juan Noe Cervani ','type'=>34,'code_deis' =>200701,'service' =>1,'dependency' =>8]);
Organization::Create(['name' => 'PAME Hospital de Iquique ','alias'=>'PAME Hospital de Iquique ','type'=>34,'code_deis' =>200702,'service' =>3,'dependency' =>8]);
Organization::Create(['name' => 'Hospital modular de Campaña Hospital San José Antiguo ','alias'=>'Hospital modular de Campaña Hospital San José Antiguo ','type'=>28,'code_deis' =>200703,'service' =>15,'dependency' =>8]);
Organization::Create(['name' => 'Carpas Estacionamiento Urgencia Hospital San José','alias'=>'Carpas Estacionamiento Urgencia Hospital San José','type'=>28,'code_deis' =>200704,'service' =>15,'dependency' =>8]);
Organization::Create(['name' => 'Estadio Municipal de Chillán Nelson Oyarzún Arenas','alias'=>'Estadio Municipal de Chillán Nelson Oyarzún Arenas','type'=>28,'code_deis' =>200705,'service' =>26,'dependency' =>8]);
Organization::Create(['name' => 'PAME Estadio Municipal ','alias'=>'PAME Estadio Municipal ','type'=>34,'code_deis' =>200706,'service' =>44,'dependency' =>8]);
Organization::Create(['name' => 'Buque Talcahuano','alias'=>'Buque Talcahuano','type'=>28,'code_deis' =>200707,'service' =>30,'dependency' =>8]);
Organization::Create(['name' => 'UMAG (pertenece a la Faculta de Ciencias de la Salud)','alias'=>'UMAG (pertenece a la Faculta de Ciencias de la Salud)','type'=>28,'code_deis' =>200708,'service' =>41,'dependency' =>8]);
Organization::Create(['name' => 'Centro Diurno (pertenece a SENAMA)','alias'=>'Centro Diurno (pertenece a SENAMA)','type'=>28,'code_deis' =>200709,'service' =>41,'dependency' =>8]);
Organization::Create(['name' => 'Complejo Miraflores (Salud Mental)','alias'=>'Complejo Miraflores (Salud Mental)','type'=>28,'code_deis' =>200710,'service' =>41,'dependency' =>8]);
Organization::Create(['name' => 'Hospital Sotero del Río (Otro Dispositivo)','alias'=>'Hospital Sotero del Río (Otro Dispositivo)','type'=>28,'code_deis' =>200712,'service' =>21,'dependency' =>8]);
Organization::Create(['name' => 'Ex ELEAM Valdivia','alias'=>'Ex ELEAM Valdivia','type'=>28,'code_deis' =>200713,'service' =>34,'dependency' =>8]);
Organization::Create(['name' => 'Centro Hospitalario de Huechuraba','alias'=>'Centro Hospitalario de Huechuraba','type'=>28,'code_deis' =>200714,'service' =>15,'dependency' =>8]);
Organization::Create(['name' => 'Centro de Especialidadeds Médicas Red de Salud UC CHRISTUS','alias'=>'Centro de Especialidadeds Médicas Red de Salud UC CHRISTUS','type'=>8,'code_deis' =>200715,'service' =>16,'dependency' =>4]);
Organization::Create(['name' => 'Clínica Intermedical','alias'=>'Clínica Intermedical','type'=>6,'code_deis' =>200716,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Complejo Asistencial Padre las Casas','alias'=>'Complejo Asistencial Padre las Casas','type'=>23,'code_deis' =>200717,'service' =>32,'dependency' =>1]);
Organization::Create(['name' => 'SAR Dra. Michelle Bachelet Jeria','alias'=>'SAR Dra. Michelle Bachelet Jeria','type'=>20,'code_deis' =>200718,'service' =>26,'dependency' =>6]);
Organization::Create(['name' => 'SAR San Vicente de Tagua Tagua','alias'=>'SAR San Vicente de Tagua Tagua','type'=>20,'code_deis' =>200719,'service' =>22,'dependency' =>6]);
Organization::Create(['name' => 'SAR Monte Patria','alias'=>'SAR Monte Patria','type'=>20,'code_deis' =>200720,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SAPU Fray Jorge','alias'=>'SAPU Fray Jorge','type'=>20,'code_deis' =>200721,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'Estadio Tierra de Campeones','alias'=>'Estadio Tierra de Campeones','type'=>28,'code_deis' =>200722,'service' =>3,'dependency' =>8]);
Organization::Create(['name' => 'Hospítal Ovalle Antiguo','alias'=>'Hospítal Ovalle Antiguo','type'=>28,'code_deis' =>200723,'service' =>9,'dependency' =>8]);
Organization::Create(['name' => 'Dispostivo Modular de Salud H. Barros Luco','alias'=>'Dispostivo Modular de Salud H. Barros Luco','type'=>28,'code_deis' =>200724,'service' =>19,'dependency' =>8]);
Organization::Create(['name' => 'Dispositivo Modular de Salud Hospital Guillermo Grant Benavente','alias'=>'Dispositivo Modular de Salud Hospital Guillermo Grant Benavente','type'=>28,'code_deis' =>200725,'service' =>28,'dependency' =>8]);
Organization::Create(['name' => 'Hospital de Campaña (Hospital de Laja)','alias'=>'Hospital de Campaña (Hospital de Laja)','type'=>28,'code_deis' =>200726,'service' =>31,'dependency' =>8]);
Organization::Create(['name' => 'Hospital de Campaña Arauco','alias'=>'Hospital de Campaña Arauco','type'=>28,'code_deis' =>200727,'service' =>43,'dependency' =>8]);
Organization::Create(['name' => 'Posta de Salud Rural San Alejo','alias'=>'Posta de Salud Rural San Alejo','type'=>13,'code_deis' =>200728,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Juan Fernández','alias'=>'SUR Juan Fernández','type'=>20,'code_deis' =>200729,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SUR Rocas de Santo Domingo','alias'=>'SUR Rocas de Santo Domingo','type'=>20,'code_deis' =>200730,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SUR Laguna Verde','alias'=>'SUR Laguna Verde','type'=>20,'code_deis' =>200731,'service' =>11,'dependency' =>6]);
Organization::Create(['name' => 'SUR Quemchi','alias'=>'SUR Quemchi','type'=>20,'code_deis' =>200732,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'SUR Chonchi','alias'=>'SUR Chonchi','type'=>20,'code_deis' =>200733,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'SUR Dalcahue','alias'=>'SUR Dalcahue','type'=>20,'code_deis' =>200734,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'SUR Puqueldón','alias'=>'SUR Puqueldón','type'=>20,'code_deis' =>200735,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'SUR Chacao','alias'=>'SUR Chacao','type'=>20,'code_deis' =>200736,'service' =>45,'dependency' =>6]);
Organization::Create(['name' => 'SUR Paihuano','alias'=>'SUR Paihuano','type'=>20,'code_deis' =>200737,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SUR Punitaqui','alias'=>'SUR Punitaqui','type'=>20,'code_deis' =>200738,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SUR Pichasca','alias'=>'SUR Pichasca','type'=>20,'code_deis' =>200739,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SUR La Higuera','alias'=>'SUR La Higuera','type'=>20,'code_deis' =>200740,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SUR Tamaya','alias'=>'SUR Tamaya','type'=>20,'code_deis' =>200741,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SUR Sotaquí','alias'=>'SUR Sotaquí','type'=>20,'code_deis' =>200742,'service' =>9,'dependency' =>6]);
Organization::Create(['name' => 'SUR Batuco','alias'=>'SUR Batuco','type'=>20,'code_deis' =>200743,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SUR Huertos Familiares','alias'=>'SUR Huertos Familiares','type'=>20,'code_deis' =>200744,'service' =>15,'dependency' =>6]);
Organization::Create(['name' => 'SUR Isabel Jiménez','alias'=>'SUR Isabel Jiménez','type'=>20,'code_deis' =>200745,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'SUR Laraquete','alias'=>'SUR Laraquete','type'=>20,'code_deis' =>200746,'service' =>43,'dependency' =>6]);
Organization::Create(['name' => 'SUR Entre Lagos','alias'=>'SUR Entre Lagos','type'=>20,'code_deis' =>200747,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'SUR San Pablo','alias'=>'SUR San Pablo','type'=>20,'code_deis' =>200748,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'SUR Bahía Mansa','alias'=>'SUR Bahía Mansa','type'=>20,'code_deis' =>200749,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'SUR Puaucho','alias'=>'SUR Puaucho','type'=>20,'code_deis' =>200750,'service' =>36,'dependency' =>6]);
Organization::Create(['name' => 'SUR Chanavayita','alias'=>'SUR Chanavayita','type'=>20,'code_deis' =>200751,'service' =>3,'dependency' =>6]);
Organization::Create(['name' => 'SUR Colchane','alias'=>'SUR Colchane','type'=>20,'code_deis' =>200752,'service' =>3,'dependency' =>6]);
Organization::Create(['name' => 'SUR Cariquima','alias'=>'SUR Cariquima','type'=>20,'code_deis' =>200753,'service' =>3,'dependency' =>6]);
Organization::Create(['name' => 'SUR Tarapacá','alias'=>'SUR Tarapacá','type'=>20,'code_deis' =>200754,'service' =>3,'dependency' =>6]);
Organization::Create(['name' => 'SUR Pica','alias'=>'SUR Pica','type'=>20,'code_deis' =>200755,'service' =>3,'dependency' =>6]);
Organization::Create(['name' => 'SUR Camiña','alias'=>'SUR Camiña','type'=>20,'code_deis' =>200756,'service' =>3,'dependency' =>6]);
Organization::Create(['name' => 'SUR Los Niches','alias'=>'SUR Los Niches','type'=>20,'code_deis' =>200757,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Sarmiento','alias'=>'SUR Sarmiento','type'=>20,'code_deis' =>200758,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Morza','alias'=>'SUR Morza','type'=>20,'code_deis' =>200759,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Lontue','alias'=>'SUR Lontue','type'=>20,'code_deis' =>200760,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Iloca','alias'=>'SUR Iloca','type'=>20,'code_deis' =>200761,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Vichuquén','alias'=>'SUR Vichuquén','type'=>20,'code_deis' =>200762,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Rauco','alias'=>'SUR Rauco','type'=>20,'code_deis' =>200763,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Romeral','alias'=>'SUR Romeral','type'=>20,'code_deis' =>200764,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Sagrada Familia','alias'=>'SUR Sagrada Familia','type'=>20,'code_deis' =>200765,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Villa Prat','alias'=>'SUR Villa Prat','type'=>20,'code_deis' =>200766,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Mercedes','alias'=>'SUR Mercedes','type'=>20,'code_deis' =>200767,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Santa Olga','alias'=>'SUR Santa Olga','type'=>20,'code_deis' =>200768,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Putu','alias'=>'SUR Putu','type'=>20,'code_deis' =>200769,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR El Álamo','alias'=>'SUR El Álamo','type'=>20,'code_deis' =>200770,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR El Colorado','alias'=>'SUR El Colorado','type'=>20,'code_deis' =>200771,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Río Claro','alias'=>'SUR Río Claro','type'=>20,'code_deis' =>200772,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Pelarco','alias'=>'SUR Pelarco','type'=>20,'code_deis' =>200773,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR San Rafael','alias'=>'SUR San Rafael','type'=>20,'code_deis' =>200774,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Pencahue','alias'=>'SUR Pencahue','type'=>20,'code_deis' =>200775,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Maule','alias'=>'SUR Maule','type'=>20,'code_deis' =>200776,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Empedrado','alias'=>'SUR Empedrado','type'=>20,'code_deis' =>200777,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Vara Gruesa','alias'=>'SUR Vara Gruesa','type'=>20,'code_deis' =>200778,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Marta Estevez - Retiro','alias'=>'SUR Marta Estevez - Retiro','type'=>20,'code_deis' =>200779,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Yerbas Buenas','alias'=>'SUR Yerbas Buenas','type'=>20,'code_deis' =>200780,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR El Aromo','alias'=>'SUR El Aromo','type'=>20,'code_deis' =>200781,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Colbun','alias'=>'SUR Colbun','type'=>20,'code_deis' =>200782,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Panimavida','alias'=>'SUR Panimavida','type'=>20,'code_deis' =>200783,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Curanipe','alias'=>'SUR Curanipe','type'=>20,'code_deis' =>200784,'service' =>24,'dependency' =>6]);
Organization::Create(['name' => 'SUR Mariquina','alias'=>'SUR Mariquina','type'=>20,'code_deis' =>200785,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SUR Máfil','alias'=>'SUR Máfil','type'=>20,'code_deis' =>200786,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SUR Coñaripe','alias'=>'SUR Coñaripe','type'=>20,'code_deis' =>200787,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'SUR Malalhue','alias'=>'SUR Malalhue','type'=>20,'code_deis' =>200788,'service' =>34,'dependency' =>6]);
Organization::Create(['name' => 'Clínica San Agustín de Melipilla','alias'=>'Clínica San Agustín de Melipilla','type'=>8,'code_deis' =>200789,'service' =>16,'dependency' =>3]);
Organization::Create(['name' => 'Immunissalud Ltda.','alias'=>'Immunissalud Ltda.','type'=>8,'code_deis' =>200790,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Centro Odontológico Uno Salud Dental Calama','alias'=>'Centro Odontológico Uno Salud Dental Calama','type'=>9,'code_deis' =>200791,'service' =>6,'dependency' =>3]);
Organization::Create(['name' => 'Laboratorio de Anatomía Patológica Histomed','alias'=>'Laboratorio de Anatomía Patológica Histomed','type'=>10,'code_deis' =>200792,'service' =>10,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Dialisis Curicó ','alias'=>'Centro de Dialisis Curicó ','type'=>19,'code_deis' =>200793,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Dialisis Los Angeles ','alias'=>'Centro de Dialisis Los Angeles ','type'=>19,'code_deis' =>200794,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Diamar Ltda.','alias'=>'Centro de Diálisis Diamar Ltda.','type'=>19,'code_deis' =>200795,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Cemed Limache','alias'=>'Cemed Limache','type'=>19,'code_deis' =>200796,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Nephrocare Chile S.A. Sucursal Talca','alias'=>'Nephrocare Chile S.A. Sucursal Talca','type'=>19,'code_deis' =>200797,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Los Andes','alias'=>'Centro de Diálisis Los Andes','type'=>19,'code_deis' =>200798,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'ONG Corporación de Dializados y Transplantados Maymuru de Arica','alias'=>'ONG Corporación de Dializados y Transplantados Maymuru de Arica','type'=>19,'code_deis' =>200799,'service' =>2,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Rengodial','alias'=>'Centro de Diálisis Rengodial','type'=>19,'code_deis' =>200800,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Diálisis Nueva Vida S.p.A.','alias'=>'Diálisis Nueva Vida S.p.A.','type'=>19,'code_deis' =>200801,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Coelemu','alias'=>'Centro de Diálisis Coelemu','type'=>19,'code_deis' =>200802,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Servicios Médicos Medinefro Ltda.','alias'=>'Servicios Médicos Medinefro Ltda.','type'=>19,'code_deis' =>200803,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Apumanque Ltda.','alias'=>'Centro de Diálisis Apumanque Ltda.','type'=>19,'code_deis' =>200804,'service' =>2,'dependency' =>3]);
Organization::Create(['name' => 'Nefrodiálisis San Javier','alias'=>'Nefrodiálisis San Javier','type'=>19,'code_deis' =>200805,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Nefrodial Linares','alias'=>'Nefrodial Linares','type'=>19,'code_deis' =>200806,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Servicios Médicos y Diálisis Ltda.','alias'=>'Servicios Médicos y Diálisis Ltda.','type'=>19,'code_deis' =>200807,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Nefrodial Molina','alias'=>'Nefrodial Molina','type'=>19,'code_deis' =>200808,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro Médico y Diálisis Pacífico','alias'=>'Centro Médico y Diálisis Pacífico','type'=>19,'code_deis' =>200809,'service' =>2,'dependency' =>3]);
Organization::Create(['name' => 'Hemodiálisis Curicó S.A.','alias'=>'Hemodiálisis Curicó S.A.','type'=>19,'code_deis' =>200810,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Hemodiálisis Independencia Ltda.','alias'=>'Centro de Hemodiálisis Independencia Ltda.','type'=>19,'code_deis' =>200811,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Los Ángeles Sucursal Mulchén','alias'=>'Centro de Diálisis Los Ángeles Sucursal Mulchén','type'=>19,'code_deis' =>200812,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Diálisis del Valle Sede San Felipe','alias'=>'Diálisis del Valle Sede San Felipe','type'=>19,'code_deis' =>200813,'service' =>12,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis San José','alias'=>'Centro de Diálisis San José','type'=>19,'code_deis' =>200814,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis y Especialidades Médicas Arauco Ltda.','alias'=>'Centro de Diálisis y Especialidades Médicas Arauco Ltda.','type'=>19,'code_deis' =>200815,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Clínica de Diálisis Diasermed','alias'=>'Clínica de Diálisis Diasermed','type'=>19,'code_deis' =>200816,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Sociedad Médica Diálisis Pichilemu Ltda.','alias'=>'Sociedad Médica Diálisis Pichilemu Ltda.','type'=>19,'code_deis' =>200817,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Servicios Médicos CIDIAL Ltda.','alias'=>'Servicios Médicos CIDIAL Ltda.','type'=>19,'code_deis' =>200818,'service' =>29,'dependency' =>3]);
Organization::Create(['name' => 'Diálisis SERHOS','alias'=>'Diálisis SERHOS','type'=>19,'code_deis' =>200819,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Centro de Diálisis Chillán Viejo','alias'=>'Centro de Diálisis Chillán Viejo','type'=>19,'code_deis' =>200820,'service' =>27,'dependency' =>3]);
Organization::Create(['name' => 'Urodial Ltda.','alias'=>'Urodial Ltda.','type'=>19,'code_deis' =>200821,'service' =>23,'dependency' =>3]);
Organization::Create(['name' => 'Intermédica División Diálisis Ltda. Sucursal Longaví','alias'=>'Intermédica División Diálisis Ltda. Sucursal Longaví','type'=>19,'code_deis' =>200822,'service' =>25,'dependency' =>3]);
Organization::Create(['name' => 'Posta de Salud Rural Huara','alias'=>'Posta de Salud Rural Huara','type'=>13,'code_deis' =>102401,'service' =>3,'dependency' =>1]);










    }
}
