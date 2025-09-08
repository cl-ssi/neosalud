<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('samu_shifts_reception', function (Blueprint $table) {
            $table->id();
            $table->date('date')->required();
            $table->enum('shift', ['morning', 'afternoon', 'night'])->required();
            $table->string('shift_leader')->required();
            $table->boolean('room_key')->required(); // 1 for YES, 0 for NO

            $table->string('medical_regulator')->nullable();
            $table->string('nursing_regulator')->nullable();
            $table->string('dispatcher_regulator')->nullable();
            $table->string('operators_regulator')->nullable();

            $table->string('handover')->nullable();
            $table->string('receive')->nullable();
            $table->string('signature')->nullable();

            $table->json('absences')->nullable();
            $table->json('cards')->nullable();
            $table->json('radio_loans')->nullable();
            $table->json('mobiles')->nullable();
            $table->json('fuel_status')->nullable();
            $table->json('equipment_loans')->nullable();
            $table->json('portable_oxygen')->nullable();
            $table->json('novelties')->nullable();
            $table->json('secondary_transfers')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samu_shifts_reception');
    }
};
