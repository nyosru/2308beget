<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'price_id',
        'domain',
        'promocode_id',
        'payed_dt'
    ];

}
