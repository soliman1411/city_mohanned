<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingDetail extends Model
{
protected $guarded = [];

 // علاقة تفاصيل المبنى مع المبنى (كل تفاصيل تنتمي إلى مبنى واحد)
    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
