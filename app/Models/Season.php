<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Season extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'status',
    ];

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function gameResults(): HasManyThrough
    {
        return $this->hasManyThrough(GameResult::class, Game::class);
    }
}
