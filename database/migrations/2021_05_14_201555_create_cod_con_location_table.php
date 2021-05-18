<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodConLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cod_con_location', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cod_con_location_id')->nullable();
            $table->foreignId('coding_id')->nullable();
            $table->foreignId('location_id')->nullable();

            $table->string('text');

            $table->foreign('cod_con_location_id')->references('id')->on('cod_con_location');
            $table->foreign('location_id')->references('id')->on('location');
            $table->foreign('coding_id')->references('id')->on('coding');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cod_con_location');
    }
}
