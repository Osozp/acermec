<?php

namespace App\Models;

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
