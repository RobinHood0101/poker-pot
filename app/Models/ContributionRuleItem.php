<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContributionRuleItem extends Model
{
    protected $fillable = [
        'contribution_rule_id',
        'position',
        'amount',
    ];
}
