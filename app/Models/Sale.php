<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id',
        'customer_id', // Si manejas clientes (puedes dejarlo nullable)
        'total',
        'sale_date',
        // otros campos como payment_method, status, etc.
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sale')
                    ->withPivot('quantity', 'price', 'subtotal')
                    ->withTimestamps();
    }
}
=======
use App\Traits\BelongsToCommerce;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    use HasFactory, BelongsToCommerce;

    protected $fillable = [
        'commerce_id',
        'user_id',
        'customer_id',
        'total',
        'sale_date',
    ];

    /**
     * Productos incluidos en la venta (relación N:M).
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_sale')
            ->withPivot('quantity', 'price', 'subtotal')
            ->withTimestamps();
    }

    /**
     * Vendedor (usuario) que registró la venta.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Comercio al que pertenece la venta.
     */
    public function commerce(): BelongsTo
    {
        return $this->belongsTo(Commerce::class);
    }
}
>>>>>>> 2cdcc04bd7fa5f06f2763c31b37cccf08d72b163
