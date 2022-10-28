<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::table('samu_events', function (Blueprint $table) {
            $table->foreignId('gender_id')->nullable()->after('patient_name')->constrained('genders');
            $table->date('birthday')->after('gender_id')->nullable();
            $table->string('prevision')->after('birthday')->nullable();
            $table->timestamp('verified_fonasa_at')->after('prevision')->nullable();
            $table->boolean('run_fixed')->after('verified_fonasa_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('samu_events', function (Blueprint $table) {
            //
        });
    }
};
