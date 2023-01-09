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
        Schema::table('mp_sub_activities', function (Blueprint $table) {
            $table->foreignId('establishment_id')->after('id')->nullable()->constrained('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mp_sub_activities', function (Blueprint $table) {
            $table->dropColumn('establishment_id');
        });
    }
};
