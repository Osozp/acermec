<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @mixin Model
 */
trait BelongsToCommerce
{
    protected static function bootBelongsToCommerce(): void
    {
        // 1. Filtrado automático al consultar (SELECT)
        static::addGlobalScope('commerce', function (Builder $builder) {
            /** @var User|null $user */
            $user = Auth::user();

            if ($user && $user->commerce_id) {
                $builder->where('commerce_id', $user->commerce_id);
            }

        });

        // 2. Asignación automática al crear (INSERT)
        static::creating(function ($model) {
            /** @var User|null $user */
            $user = Auth::user();

            if ($user && $user->commerce_id && !$model->commerce_id) {
                $model->commerce_id = $user->commerce_id;
            }
            
        });
    }
}
