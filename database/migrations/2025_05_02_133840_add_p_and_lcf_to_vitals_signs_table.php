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
        Schema::table('samu_vital_signs', function (Blueprint $table) {
            $table->decimal('p', 5, 2)->nullable()->comment('Patient weight in kilograms')->after('t');
            $table->integer('lcf')->nullable()->comment('Fetal cardiac beats per minute')->after('p');
            $table->integer('eva')->nullable()->after('lcf');
            $table->integer('co2')->nullable()->after('eva');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('samu_vital_signs', function (Blueprint $table) {
            $table->dropColumn(['p', 'lcf', 'eva', 'co2']);
        });
    }
};
