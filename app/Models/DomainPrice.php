<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'valute',
        'amount_domain',
        'default'
    ];

//    public function priceble()
//    {
//        return $this->morphTo();
//    }

}
