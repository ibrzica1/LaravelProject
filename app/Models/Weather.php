<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Weather extends Model
{
    protected $table = "weather";

    protected $fillable = [
        'city_id','temperature'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    
}
