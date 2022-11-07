<?php

use App\Models\Samu\Event;
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
            $table->integer('age_year')->after('birthday')->nullable();
            $table->integer('age_month')->after('age_year')->nullable();
        });

        $events = Event::whereNotNull('birthday')->whereNotNull('date')->get();

        foreach($events as $event)
        {
            $event->update([
                'age_year' => $event->birthday->diff($event->date)->format('%y'),
                'age_month' => $event->birthday->diff($event->date)->format('%m'),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
