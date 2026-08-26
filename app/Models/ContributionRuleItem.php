<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContributionRuleItem extends Model
{
    protected $fillable = [
        'contribution_rule_id',
        'position',
        'amount',
        'description',
    ];

    public function contributionRule(): BelongsTo
    {
        return $this->belongsTo(ContributionRule::class);
    }
}
