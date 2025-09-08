<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftsReception extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'shift',
        'shift_leader',
        'room_key',
        'medical_regulator',
        'nursing_regulator',
        'dispatcher_regulator',
        'operators_regulator',
        'handover',
        'receive',
        'signature',
        'absences',
        'cards',
        'radio_loans',
        'mobiles',
        'fuel_status',
        'equipment_loans',
        'portable_oxygen',
        'novelties',
        'secondary_transfers'
    ];

    protected $casts = [
        'absences'              => 'array',
        'cards'                 => 'array',
        'radio_loans'           => 'array',
        'mobiles'               => 'array',
        'fuel_status'           => 'array',
        'equipment_loans'       => 'array',
        'portable_oxygen'       => 'array',
        'novelties'             => 'array',
        'secondary_transfers'   => 'array',
        'room_key'              => 'boolean',
        'date'                  => 'date',
    ];

    protected $table = 'samu_shifts_reception';
}
