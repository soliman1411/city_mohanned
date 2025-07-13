<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
protected $guarded = [];

// علاقة الأرض مع المباني (كل أرض يمكن أن تحتوي على عدة مباني)
    public function buildings()
    {
        return $this->hasMany(Building::class);
    }
}
