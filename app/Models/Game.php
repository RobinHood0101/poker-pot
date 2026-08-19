<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'season_id',
        'contribution_rule_id',
        'notes',
        'played_at',
        'status',
        'location',
    ];
}
