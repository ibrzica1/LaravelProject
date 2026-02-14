<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Forecast extends Model
{
    protected $table = 'forecasts';

    protected $fillable = [
        'city_id','temperature','date',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
