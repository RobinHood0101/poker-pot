<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashTransaction extends Model
{
    protected $fillable = [
        'cash_account_id',
        'user_id',
        'game_id',
        'amount',
        'description',
        'type',
    ];
}
