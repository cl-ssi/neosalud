<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactPoint extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'system',
        'value',
        'use',
        'rank',
        'period_id',
        'actually',

    ];

    public function getUseValueAttribute()
    {
        switch ($this->use) {
            case 'home':
                return 'Hogar';
                break;
            case 'work':
                return 'Trabajo';
                break;
            case 'old':
                return 'Antiguo';
                break;
            case 'temp':
                return 'Temporal';
                break;
            case 'mobile':
                return 'Móvil';
                break;
            default:
                return '';
                break;
        }
    }

    public function getSystemValueAttribute()
    {
        switch ($this->system) {
            case 'phone':
                return 'Teléfono';
                break;
            case 'email':
                return 'Email';
                break;
            case 'fax':
                return 'Fax';
                break;
            case 'url':
                return 'URL';
                break;
            case 'sms':
                return 'SMS';
                break;
            case 'other':
                return 'Other';
                break;
            default:
                return '';
                break;
        }
    }
}
