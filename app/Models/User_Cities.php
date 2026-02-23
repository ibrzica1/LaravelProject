<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User_Cities extends Model
{
    protected $table = 'user_cities';

    protected $fillable = [
        'city_id','user_id',
    ];

    public function city(): BelongsTo 
    {
        return $this->belongsTo(City::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
