<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // PermissionSeeder::class,
            // CodConIdentifiersTypesSeeder::class,
            // CountrySeeder::class,
            // RegionSeeder::class,
            // CodConMaritalSeeder::class,
            // CommuneSeeder::class,
            // CongregationSeeder::class,
            // UserSeeder::class,
            // CodConObservationCategorySeeder::class,
            // CodConAppointmentTypesSeeder::class,
            // SicStatusesSeeder::class,
            // SexSeeder::class,
            // GenderSeeder::class,

            // //Organización
            // OrganizationTypeSeeder::class,
            // OrganizationDependencySeeder::class,
            // OrganizationServiceSeeder::class,
            // OrganizationSeeder::class,

            // //necesita Organization por eso se debe ejecutar después
            // LocationSeeder::class,

            // /* SAMU */
            // SamuMobileTypeSeeder::class,
            // SamuMobileSeeder::class,
            // SamuJobTypeSeeder::class,
            // SamuKeySeeder::class,
            // SamuReceptionPlaceSeeder::class,
            // SamuEstablishmentSeeder::class,

            Alterations::class,
            GlasgowScales::class,
            Medicines::class,
            MorbidHistory::class,
            Procedures::class

        ]);
    }
}
