<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCounter extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'counter',
        'date'
    ];

    /**
    * The casted attributes.
    *
    * @var array
    */
    protected $casts = [
        'date' => 'date',
    ];

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $table = 'samu_event_counters';

    public static function getNext()
    {
        $counter = EventCounter::whereDate('date',now())->first();
        if($counter) return $counter->counter + 1;
        else return 1;
    }

    public static function useNext()
    {
        $counter = EventCounter::whereDate('date',now())->first();

        if($counter) 
        {
            $counter->counter += 1;
            $counter->save();
            return $counter;
        } 
        else 
        {
            $newCounter = EventCounter::create([
                'date' => now(),
                'counter' => 1,
            ]);
            return $newCounter;
        }
    }
    
}
