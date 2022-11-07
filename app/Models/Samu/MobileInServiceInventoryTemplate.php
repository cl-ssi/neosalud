<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

use App\Models\Samu\MobileInServiceInventory;
use App\Models\Samu\Medicine;
use App\Models\Samu\Supply;
use App\Models\Samu\MobileType;

class MobileInServiceInventoryTemplate extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table="samu_mobiles_in_serv_inventories_templates";

    protected $fillable = [
        'id',
        'type_id',
        'supply_id',
        'medicine_id',
        'value',
    ];

    public function mobileType()
    {
        return $this->belongsTo(MobileType::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class);
    }
}
