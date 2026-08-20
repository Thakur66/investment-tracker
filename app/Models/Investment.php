<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Investment extends Model
{
    protected $fillable = [
        'category_id',
        'investment_type_id',
        'name',
        'provider',
        'invested_amount',
        'current_value',
        'investment_date',
        'notes',
    ];

    protected $casts = [
        'invested_amount' => 'decimal:2',
        'current_value' => 'decimal:2',
        'investment_date' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function investmentType(): BelongsTo
    {
        return $this->belongsTo(InvestmentType::class);
    }
}