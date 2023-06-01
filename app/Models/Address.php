<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'use',
        'type',
        'text',
        'line',
        'city',
        'district',
        'state',
        'postal_code',
        'country',
        'apartment',
        'user_id',
        'suburb',
        'actually',
    ];

    public function getUseValueAttribute(){
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

    public function commune(){
        return $this->belongsTo('App\Models\Commune', 'commune_id');
    }

    public function region(){
        return $this->belongsTo('App\Models\Region', 'region_id');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
