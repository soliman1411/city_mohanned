<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landmark extends Model
{
 protected $fillable = ['name', 'latitude', 'longitude', 'type', 'description'];

    public function getLatitudeAttribute()
{
    return $this->location ? explode(',', $this->location)[0] : null;
}

public function getLongitudeAttribute()
{
    return $this->location ? explode(',', $this->location)[1] : null;
}
}
