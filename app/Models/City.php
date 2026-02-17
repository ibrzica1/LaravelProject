<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
       'name', 
    ];

    public function weather(): HasOne
    {
        return $this->hasOne(Weather::class);
        
    }

    public function forecasts(): HasMany
    {
        return $this->hasMany(Forecast::class)->orderBy('date');
    }

    
}
