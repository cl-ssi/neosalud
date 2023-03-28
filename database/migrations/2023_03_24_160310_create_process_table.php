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
        Schema::create('mp_process', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('mp_activities', function (Blueprint $table) {
            // // $table->unsignedInteger('process_id');
            // // $table->foreign('process_id')->references('id')->on('mp_process');
            // $table->foreignId('process_id')->constrained('mp_process')->after('id')->nullable();
            $table->unsignedBigInteger('process_id')->after('id')->nullable();
            $table->foreign('process_id')->references('id')->on('mp_process');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mp_process');
        Schema::table('mp_activities', function (Blueprint $table) {
            $table->dropColumn('process_id');
        });
    }
};
