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
        Schema::create('mp_user_aditionals', function (Blueprint $table) {
            $table->id();
            // $table->integer('id_deis')->nullable();
            // $table->integer('cod_estab_sirh')->nullable();
            $table->boolean('risk_group')->default(0);
            $table->boolean('missing_condition')->default(0);
            $table->string('missing_reason')->nullable();
            $table->string('job_title')->nullable();
            $table->string('sis_specialty')->nullable();

            $table->foreignId('user_id')->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('mp_contracts', function (Blueprint $table) {
            $table->foreignId('establishment_id')->after('user_id')->nullable()->constrained('organizations');
            $table->integer('effective_hours')->after('weekly_hours')->nullable();
            $table->integer('covid_permit')->after('training_days')->nullable();
            $table->integer('weekly_union_permit')->after('weekly_collation')->nullable();
            $table->date('departure_date')->after('contract_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mp_user_aditionals');

        Schema::table('mp_contracts', function (Blueprint $table) {
            $table->dropColumn('establishment_id');
            $table->dropColumn('effective_hours');
            $table->dropColumn('covid_permit');
            $table->dropColumn('weekly_union_permit');
            $table->dropColumn('departure_date');
        });
    }
};
