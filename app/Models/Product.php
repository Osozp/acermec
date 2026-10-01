<?php

namespace App\Models;

use App\Traits\BelongsToCommerce;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory, BelongsToCommerce;

    protected $fillable = [
        'commerce_id',
        'category_id',
        'codigo',
        'description',
        'stock',
        'price',
    ];

    /**
     * Categoría a la que pertenece el producto.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Comercio al que pertenece el producto.
     */
    public function commerce(): BelongsTo
    {
        return $this->belongsTo(Commerce::class);
    }
}