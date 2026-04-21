<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuMobileExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_mobile_exceptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobile_in_service_id')->constrained('samu_mobiles_in_service');
            $table->string('exception_type'); // no_crew, unavailable, maintenance, cleaning
            $table->datetime('started_at');
            $table->datetime('ended_at');
            $table->text('observation')->nullable();
            $table->foreignId('creator_id')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes for faster queries
            $table->index('mobile_in_service_id');
            $table->index('exception_type');
            $table->index(['mobile_in_service_id', 'exception_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samu_mobile_exceptions');
    }
}
