<?php

namespace App\Models;

use App\Traits\BelongsToCommerce;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, BelongsToCommerce;

    protected $fillable = [
        'name',
        'commerce_id',
    ];

    /**
     * Productos pertenecientes a esta categoría.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Comercio al que pertenece la categoría.
     */
    public function commerce(): BelongsTo
    {
        return $this->belongsTo(Commerce::class);
    }
}
