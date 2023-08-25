<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class DomainOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'domain_price_id',
        'domain',
        'promocode_id',
        'payed_dt'
    ];

    /**
     * Получить все комментарии поста.
     */
    public function price(): HasOne
    {
        return $this->hasOne(DomainPrice::class , 'id' , 'domain_price_id' );
    }



}
