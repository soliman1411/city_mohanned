<?php

namespace App\Models;

use App\Models\Land;
use App\Models\BuildingDetail;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
protected $fillable = [
    'name',
    'latitude',
    'longitude',
    'land_id'
];

// علاقة المبنى مع الأرض (كل مبنى ينتمي إلى أرض واحدة)
    public function land()
    {
        return $this->belongsTo(Land::class);
    }

    // علاقة المبنى مع تفاصيل المبنى (One-to-One)
    public function details()
    {
        return $this->hasOne(BuildingDetail::class);
    }

}
