<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('UPDATE `samu_events` SET `run_fixed` = null WHERE `run_fixed` = 1 OR `run_fixed` = 0');
        DB::statement('UPDATE `samu_events` SET `verified_fonasa_at` = null WHERE `verified_fonasa_at` IS NOT null');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
