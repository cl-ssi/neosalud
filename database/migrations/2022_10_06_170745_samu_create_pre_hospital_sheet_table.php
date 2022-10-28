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
        Schema::create('samu_prehospital_sheets', function (Blueprint $table) {
            $table->id();
            // $table->string('code');
            // $table->string('name');
            // $table->date('valid_from');
            // $table->date('valid_to')->nullable();
            // $table->integer('value');

            $table->foreignId('mobile_id')->constrained('samu_mobiles');


            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samu_prehospital_sheets');
    }
};
