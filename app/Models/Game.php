<?php

namespace App\Models;

use App\Enums\GameStatus;
use App\Enums\TransactionType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $fillable = [
        'season_id',
        'contribution_rule_id',
        'created_by',
        'updated_by',
        'title',
        'notes',
        'played_at',
        'status',
        'location',
    ];

    public function endGame($cashAccount): void
    {
        if ($this->status !== GameStatus::ACTIVE->value) {
            return;
        }

        $cashAccount = CashAccount::findOrFail($cashAccount);
        $results = $this->results;
        $amounts = [];
        $contributionRuleItems = $this->contributionRule->items;
        foreach ($results as $result) {
            foreach ($contributionRuleItems as $contributionRuleItem) {
                // get amount of money
                if ($result->position === $contributionRuleItem->position) {
                    $amounts[$result->user_id] = $contributionRuleItem->amount;
                    break;
                }

                $amounts[$result->user_id] = $contributionRuleItems->last()->amount;
            }
        }

        foreach ($amounts as $userId => $amount) {
            CashTransaction::create([
                'cash_account_id' => $cashAccount->id,
                'user_id' => $userId,
                'game_id' => $this->id,
                'amount' => $amount,
                'description' => 'Game '.$this->title.' end',
                'type' => TransactionType::ACTIVE,
            ]);
        }

        $this->played_at = now();
        $this->status = GameStatus::INACTIVE->value;
        $this->save();
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function contributionRule(): BelongsTo
    {
        return $this->belongsTo(ContributionRule::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(GameResult::class);
    }

    public function cashTransactions(): HasMany
    {
        return $this->hasMany(CashTransaction::class);
    }

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'game_results')
            ->withPivot('position')
            ->withTimestamps();
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
