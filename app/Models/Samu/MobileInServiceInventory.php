<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

use App\Models\Samu\MobileInService;
use App\Models\Samu\MobileInServiceInventoryDetail;
use App\Models\Samu\Medicine;
use App\Models\Samu\Supply;

use App\Models\User;

class MobileInServiceInventory extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table="samu_mobiles_in_serv_inventories";

    protected $fillable = [
        'id',
        'mobile_in_service_id',
        'creation_date',
        'creator_id',
        'approbation_date',
        'approbator_id',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = [
        'creation_date',
        'approbation_date',
    ];

    public function mobileInService()
    {
        return $this->belongsTo(MobileInService::class);
    }

    public function details()
    {
        return $this->hasMany(MobileInServiceInventoryDetail::class, 'inventory_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    public function approbator()
    {
        return $this->belongsTo(User::class,'approbator_id');
    }
}
