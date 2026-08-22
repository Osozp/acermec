<?php

namespace App\Models;

use App\Traits\BelongsToCommerce;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    use HasFactory, BelongsToCommerce;

    protected $fillable = [
        'commerce_id',
        'name',
        'email',
        'phone',
        'address',
    ];

    /**
     * Compras realizadas a este proveedor.
     */
    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * Comercio al que pertenece el proveedor.
     */
    public function commerce(): BelongsTo
    {
        return $this->belongsTo(Commerce::class);
    }
}