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
            if (Schema::hasColumn('samu_events', 'fc')) {
                $table->dropColumn('fc');
            }
            if (Schema::hasColumn('samu_events', 'fr')) {
                $table->dropColumn('fr');
            }
            if (Schema::hasColumn('samu_events', 'pa')) {
                $table->dropColumn('pa');
            }
            if (Schema::hasColumn('samu_events', 'pam')) {
                $table->dropColumn('pam');
            }
            if (Schema::hasColumn('samu_events', 'gl')) {
                $table->dropColumn('gl');
            }
            if (Schema::hasColumn('samu_events', 'soam')) {
                $table->dropColumn('soam');
            }
            if (Schema::hasColumn('samu_events', 'soap')) {
                $table->dropColumn('soap');
            }
            if (Schema::hasColumn('samu_events', 'hgt')) {
                $table->dropColumn('hgt');
            }
            if (Schema::hasColumn('samu_events', 'fill_capillary')) {
                $table->dropColumn('fill_capillary');
            }
            if (Schema::hasColumn('samu_events', 't')) {
                $table->dropColumn('t');
            }
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
            $table->string('fc', 10)->nullable()->after('rau');
            $table->integer('fr')->nullable()->after('fc');
            $table->string('pa')->nullable()->after('fr');
            $table->string('pam')->nullable()->after('pa');
            $table->integer('gl')->nullable()->after('pam');
            $table->integer('soam')->nullable()->after('gl');
            $table->integer('soap')->nullable()->after('soam');
            $table->integer('hgt')->nullable()->after('soap');
            $table->integer('fill_capillary')->nullable()->after('hgt');
            $table->decimal('t', 5, 2)->nullable()->after('fill_capillary');            
        });
    }
};