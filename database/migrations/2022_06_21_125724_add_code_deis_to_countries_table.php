<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodeDeisToCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('countries', function (Blueprint $table) {
//        });

        Schema::table('countries', function (Blueprint $table) {

            $table->dropForeign('countries_country_id_foreign');
            $table->dropColumn('country_id');
            $table->dropColumn('iso_cod');
            $table->integer('id_minsal')->after('id')->nullable();
            $table->string('code_deis')->after('id_minsal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->foreignId('country_id')->after('id')->nullable();
            $table->string('iso_cod')->after('country_id')->nullable();
            $table->dropColumn('id_minsal');
            $table->dropColumn('code_deis');


            $table->foreign('country_id')->references('id')->on('countries');
        });
    }
}
