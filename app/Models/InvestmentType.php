<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvestmentType extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function investments(): HasMany
    {
        return $this->hasMany(Investment::class);
    }
}