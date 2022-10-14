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
        Schema::create('samu_mobiles_in_serv_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobile_in_service_id')->constrained('samu_mobiles_in_service');
            $table->date('creation_date')->nullable();
            $table->foreignId('creator_id')->nullable()->constrained('users');
            $table->date('approbation_date')->nullable();
            $table->foreignId('approbator_id')->nullable()->constrained('users');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('samu_mobiles_in_serv_inventories_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained('samu_mobiles_in_serv_inventories');
            $table->foreignId('supply_id')->nullable()->constrained('samu_supplies');
            $table->foreignId('medicine_id')->nullable()->constrained('samu_medicines');
            $table->decimal('value', 8, 2);
            $table->text('observation')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samu_mobiles_in_serv_inventories_details');
        Schema::dropIfExists('samu_mobiles_in_serv_inventories');
    }
};
